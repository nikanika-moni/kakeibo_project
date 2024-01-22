<?php
namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\AccountVerification;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        // $validated = $request->validated();
        // $validated['password'] = Hash::make($validated['password']);
        // User::create($validated);
        // Log::info('User created with data:', $validated);

        // Mail::to('koash100@yahoo.co.jp')->send(new AccountVerification());
        // return redirect()->route('user.index');

        // メール送信テスト
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);

        // ユーザーを保存
        $user = User::create($validated);
        Log::info('User created with data:', $validated);

        // メール送信
        Mail::to($validated['email'])->send(new AccountVerification($user));

        return redirect()->route('user.index');
    }


    public function complete()
    {
        return redirect()->route('user.index');
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
