<?php

namespace App\Http\Controllers\API;

use Mail;
use Exception;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        try {
            $user = User::where('email', $request->email)->first();
            if (!empty($user)) {
                return response()->json('This email already exist try with other email');
            }
            if (!empty($request->password != $request->confirmpassword)) {
                return response()->json('Your password and confirm password does not match to each other.');
            } else {

                $password = Hash::make($request->password);
                $generate_token = Str::random(32);

                User::create([
                    'name' => $request->name ?? '',
                    'phone' => $request->phone ?? '',
                    'zip_code' => $request->zip_code ?? '',
                    'password' => $password ?? '',
                    'remember_token' => $generate_token ?? '',
                ]);

                return response()->json('Record register successfully');
            }
        } catch (Exception $e) {

            return response()->json($e->getMessage());
        }
    }

    public function login(Request $request)
    {
        try {
            $user = User::where('email', $request->email)->first();
            if (empty($user)) {
                return response()->json('First registor then login');
            } else {

                if (Hash::check($request->password, $user->password)) {
                    return response()->json(['user' => $user, 'access_token' => $user->remember_token]);
                } else {
                    return response()->json('Your password is not correct.');
                }
            }
        } catch (Exception $e) {

            return response()->json($e->getMessage());
        }
    }

    public function submitForgetPasswordForm(Request $request)
    {

        try {
            $user = User::where('email', $request->email)->first();
            if (empty($user)) {
                return response()->json('This user is not exit please registor');
            } else {

                $token = Str::random(64);

                PasswordReset::create([
                    'email' => $request->email,
                    'token' => $token,
                    'created_at' => Carbon::now()
                ]);

                Mail::send('email.forgetPassword', ['token' => $token], function ($message) use ($request) {
                    $message->to($request->email);
                    $message->subject('Reset Password');
                });

                return response()->json($token);
            }
        } catch (Exception $e) {

            return response()->json($e->getMessage());
        }
    }

    public function submitResetPasswordForm(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (empty($user)) {
            return response()->json('This user is not exit please registor');
        }

        if ($request->password == $request->password_confirmation) {
            return response()->json('Password and confirm password are not same');
        }

        $updatePassword = PasswordReset::where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();

        if (!$updatePassword) {
            return response()->json('invalid token');
        }

        $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        PasswordReset::where(['email' => $request->email])->delete();

        return response()->json('true');
    }
}
