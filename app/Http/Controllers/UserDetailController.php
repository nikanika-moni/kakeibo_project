<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\UserDetailRequest;
use App\Models\UserDetails;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Employment;
use Illuminate\Support\Facades\Log;

class UserDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($email_token, $id)
    {
        // // 仮登録ユーザーを取得
        // $user = DB::table('users')->where('email_token', $email_token)->first();
        // $userId = DB::table('users')->where('id', $id)->first();
        // Log::info('User ID:', [$userId]);

        // if($user !== null) {
        //     // 本登録処理（例: ユーザーを認証して verified カラムを更新）
        //     DB::table('users')
        //     ->where('email_token', $email_token)
        //     ->update([
        //         'verified' => 1,
        //         'email_verified_at' => now(),
        //         'email_token' => null,
        //     ]);
        //     return redirect()->route('user.detail.create', ['email_token' => $email_token, 'userId' => $userId]);
        // } else {
        //     return redirect()->route('user.detail.error')->with('error', 'Invalid registration link.');
        // }
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create($email_token,$id)
    public function create($userId,$email_token)
    {
        // 仮登録ユーザーを取得
        $user = DB::table('users')->where('email_token', $email_token)->first();
        // Log::info('User ID:', [$user]);

        if($user !== null) {
            // // 本登録処理（例: ユーザーを認証して verified カラムを更新）
            // DB::table('users')
            // ->where('email_token', $email_token)
            // ->update([
            //     'verified' => 1,
            //     'email_verified_at' => now(),
            //     'email_token' => null,
            // ]);

            $employments = Employment::all();
            // $user_id = $user -> id;
            // Log::info('User ID:', [$userId]);
            return view('users.create.detail', compact('employments', 'userId'));
            // return redirect()->route('users.create.detail',['email_token' => $email_token, 'userId' => $userId]);
        } else {
            return redirect()->route('user.detail.error')->with('error', 'Invalid registration link.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($userId, UserDetailRequest $request)
    {
        $user_detail = new UserDetails($request->validated());
        // User モデルとの関連を設定
        $user_detail->users_id = $userId;
        Log::info(['テスト:',$user_detail]);
        $user_detail->save();

        $employment = Employment::find($request->input('employment_id'));
        $user_detail->employment()->associate($employment);

        // return redirect()->route('home.index');
        return redirect()->route('record.index', ['userId' => $userId]);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(userdetails $userdetails)
    // {
    //     $employment = Employment::all();
    //     return view('users.edit.detail', ['userdetails' => $userdetails, 'employment' => $employment]);
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
