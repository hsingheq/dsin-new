<?php

namespace App\Http\Controllers\Admin\APi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Password;

class PasswordResetApiController extends Controller
{
    //
    public function resetPasswordSendLink(Request $request) {
        $request->validate([
            'email'=> ['required', 'email'],
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if($status!=Password::RESET_LINK_SENT) {
            throw ValidationException::withMessages([
                'email'=>[__($status)], 
            ]);
        }

        return response()->json(['status'=> __($status)]);
    }

    public function resetPassword(Request $request) {
        /*$request->validate([
            'token' => ['required'],
            'email'=> ['required', 'email'],
            'password'=> ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function($user) use ($request) {
                $user->forceFill({
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                })->save();
                event(new PasswordReset($user));
            }
        );

        if($status!=Password::PASSWORD_RESET) {
            throw ValidationException::withMessages([
                'email'=>[__($status)], 
            ]);
        }
        
        return response()->json(['status'=> __($status)]);
        */
    }
}
