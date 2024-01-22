<?php
// app/Http/Controllers/VerificationController.php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function verify(Request $request, $id)
    {
        if (! $request->hasValidSignature() || ! $user = User::find($id)) {
            abort(403);
        }

        if (! $user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
            event(new Verified($user));
        }

        return redirect('user.index');
    }
}

