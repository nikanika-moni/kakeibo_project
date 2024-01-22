<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserDetails;
use App\Http\Requests\AddLabelRecordRequest;
use App\Http\Requests\RecordDetailRequest;
use Illuminate\Support\Facades\DB;
use App\Models\SpendingCategory;
use App\Models\AddLabelRecord;
use App\Models\RecordDetail;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;


class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($userId)
    {
        $record_details = RecordDetail::whereHas('spending_label_intermediate', function ($query) use ($userId) {
            $query->where('user_details_id', $userId);
        })
        ->latest('updated_at')
        ->paginate(5);

        return view('records.index', compact('userId', 'record_details'));
    }

    public function create($userId, $year, $month, $day)
    {
        // ユーザーに紐づくラベルの表示
        $spending_label_intermediate = AddLabelRecord::where('user_details_id', $userId)->get();

        // $spending_label_intermediateに格納されてたidをids[]に格納する
        $date = "{$year}-{$month}-{$day}";
        $ids = [];
        $records = [];

        foreach ($spending_label_intermediate as $record) {
            $ids[] = $record->id;
        }

        // 対象のテーブルとカラムでデータが存在するか検索
        $hasExistingData = false;

        $record_details = RecordDetail::whereIn('spending_label_intermediate_id', $ids)
        ->where('date', $date)
        ->get();

        $record_details->toArray();
        Log::info($record_details);
        // sessionにデータを保存
        session(['record_details' => $record_details]);
        $record_ids = $record_details->pluck('id')->toArray();
        // Log::info($record_ids);

        // // sessionにデータを保存
        // session(['spending_ids' => $record_ids]);

        if ($record_details->isEmpty()) {
            $spending_categories = SpendingCategory::all();

            // ユーザーに紐づくラベルの表示
            $spending_label_intermediate = AddLabelRecord::where('user_details_id', $userId)->get();

            $existingLabels = AddLabelRecord::where('user_details_id', $userId)
            ->pluck('spending_category_id')
            ->toArray();

            // ドロップダウンリストから既存の組み合わせを除外
            $spending_categories = $spending_categories->reject(function ($category) use ($existingLabels) {
            return in_array($category->id, $existingLabels);
            });

            return view('records.create', compact('spending_categories', 'userId', 'year', 'month', 'day', 'spending_label_intermediate'));

        } else {
            return view('records.edit',compact('userId', 'year', 'month', 'day', 'spending_label_intermediate', 'record_details'));
        }


    // 保留---------------------------------------------
        // $spending_categories = SpendingCategory::all();

        // // ユーザーに紐づくラベルの表示
        // $spending_label_intermediate = AddLabelRecord::where('user_details_id', $userId)->get();

        // $existingLabels = AddLabelRecord::where('user_details_id', $userId)
        // ->pluck('spending_category_id')
        // ->toArray();

        // // ドロップダウンリストから既存の組み合わせを除外
        // $spending_categories = $spending_categories->reject(function ($category) use ($existingLabels) {
        // return in_array($category->id, $existingLabels);
        // });

        // return view('records.create', compact('spending_categories', 'userId', 'year', 'month', 'day', 'spending_label_intermediate'));
    // 保留---------------------------------------------
    }

    /**
     * Store a newly created resource in storage.
     */
    public function add_label($userId, $year, $month, $day, AddLabelRecordRequest $request)
    {
        // 既存の組み合わせを検証
        $existingLabel = AddLabelRecord::where('user_details_id', $userId)
        ->where('spending_category_id', $request->input('spending_category_id'))
        ->first();

        // 既存の組み合わせが存在しない場合のみ新規登録
        if (!$existingLabel) {
        $add_label = new AddLabelRecord($request->validated());
        $add_label->user_details_id = $userId;
        $add_label->save();
        // 支出カテゴリーを取得
        $spending_category = SpendingCategory::find($request->input('spending_category_id'));
        // ラベルと支出カテゴリーを関連付ける
        $add_label->spending_category()->associate($spending_category);

        return redirect()->route('record.create', ['userId' => $userId, 'year' => $year, 'month' => $month, 'day' => $day]);
        } else {
        // 既に存在する場合は何らかの処理（メッセージ表示等）を行うか、何もしない
        return redirect()->back()->with('error', '既に同じラベルが存在します。');
        }
    }

    public function add_spending($userId, RecordDetailRequest $request)
    {
        // リクエストの検証
        $validatedData = $request->validated();
        $spending_detail = new RecordDetail($validatedData);

        // フォームからのデータを取得
        $amounts = $request->input('amounts');
        $memos = $request->input('memos');
        $spendingLabelIntermediateIds = $request->input('spending_label_intermediate_ids');
        $spending_detail->date = "{$request->year}-{$request->month}-{$request->day}";
        $date = $spending_detail->date;

        foreach ($amounts as $key => $amount) {
            // $spendingLabelIntermediateIds[$key] または $dates[$key] が存在しない場合はスキップ
            if (!isset($spendingLabelIntermediateIds[$key]) || !isset($date[$key])) {
                continue;
            }
            $spending_detail = new RecordDetail($validatedData);
            $spending_detail->amount = $amount;
            $spending_detail->memo = $memos[$key] ?? null;
            $spending_detail->date = $date;
            $spending_detail->spending_label_intermediate_id = $spendingLabelIntermediateIds[$key];

            $existingRecords = RecordDetail::whereIn('spending_label_intermediate_id', $spendingLabelIntermediateIds)
                ->whereIn('date', [$date])
                ->get();

            // 既存のデータと突合して、一致するものがあればそれを表示するなどの処理
            // ここでの例ではログに表示していますが、実際の処理は要件に合わせて変更してください
            foreach ($existingRecords as $existingRecord) {
                Log::info("Duplicate record found: {$existingRecord->date}, {$existingRecord->spending_label_intermediate_id}");
                // return redirect()->route('records.edit_spending', ['userId' => $userId, 'year' => $year, 'month' => $month, 'day' => $day]);
            }
            Log::info('セーブ前ログ',$spending_detail->toArray());
            $spending_detail->save();
        }
        // リダイレクト
        return redirect()->route('record.index', ['userId' => $userId]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update_spending(RecordDetailRequest $request)
    {
        $record_details = session('record_details');
        Log::info('変数引き継ぎ後'.$record_details);
        $record = RecordDetail::findOrFail($record_details);
        $updateData = $request->validated();
        $record->update($updateData);

        return redirect()->route('records.index');
        // $record_detail = RecordDetail::findOrFail($id);
        // Log::info('セーブ前ログ'.$record_detail);
        // Log::info('セーブ前ログ'.$ids);
        // // 既存データが存在するときに使用する変数
        // $record_detail = RecordDetail::findOrFail($id);
        // Log::info('セーブ前ログ'.$record_detail);
        // $updateData = $request->validated();
        // $record_detail->amount()->associate($updateData['amount']);
        // $record_detail->memo()->associate($updateData['memo']);
        // $record_detail->update($updateData);

        // return redirect()->route('record.index', ['userId' => $userId, 'record_detail' => $record_detail]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
