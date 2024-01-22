<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddSavingsGoalRequest;
use App\Http\Requests\RecordDetailRequest;
use Illuminate\Support\Facades\DB;
use App\Models\SpendingCategory;
use App\Models\AddLabelRecord;
use App\Models\AddSavingsGoal;
use App\Models\AddSavingsGoal_temporary;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class AssetsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($userId)
    {
        $savingsGoal = AddSavingsGoal::where('user_id', $userId)->first();
        if($savingsGoal){
             $savingsAmount = $savingsGoal->savings;
        }
        return view('assets.index',  ['savingsGoal' => $savingsGoal, 'userId' => $userId, 'savingsAmount' => $savingsAmount]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($userId, AddSavingsGoalRequest $request)
    {
        $add_savings_goal = new AddSavingsGoal($request->validated());
        $add_savings_goal->user_id = $userId;
        Log::info($add_savings_goal);
        $add_savings_goal->save();

        // $add_savings_goal_temporary = new AddSavingsGoal_temporary($request->validated());
        // $add_savings_goal_temporary->user_id = $userId;
        // Log::info($add_savings_goal);
        // $add_savings_goal_temporary->save();

        return redirect()->route('assets.index', ['userId' => $userId]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($userId, AddSavingsGoalRequest $request)
    {
        // $add_savings_goal = new AddSavingsGoal($request->validated());
        // $add_savings_goal->user_id = $userId;
        // Log::info($add_savings_goal);
        // // $add_savings_goal->save();

        // $add_savings_goal_temporary = new AddSavingsGoal_temporary($request->validated());
        // $add_savings_goal_temporary->user_id = $userId;
        // $add_savings_goal_temporary->save();

        // return redirect()->route('assets.index', ['userId' => $userId]);
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
    public function edit(string $id)
    {
        //
    }

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
