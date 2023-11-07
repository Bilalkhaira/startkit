<?php

namespace App\Http\Controllers\API;

use Mail;
use File;
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

                $saveUser = User::create([
                    'name' => $request->name ?? '',
                    'email' => $request->email ?? '',
                    'phone_no' => $request->phone_no ?? '',
                    'zip_code' => $request->zip_code ?? '',
                    'password' => $password ?? '',
                    'app_user' => 1,
                ]);

                $success['token'] =  $saveUser->createToken('MyApp')->plainTextToken;
                $success['name'] =  $saveUser->name;

                return response()->json($success);
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

                    $success['token'] =  $user->createToken('MyApp')->plainTextToken;
                    $success['name'] =  $user->name;
                    $success['id'] =  $user->id;
                    $success['email'] =  $user->email;
                    $success['profile_photo_path'] =  $user->profile_photo_path;

                    $user->update(['_token' => $success['token']]);

                    return response()->json($success);
                } else {
                    return response()->json('Your password is not correct.');
                }
            }
        } catch (Exception $e) {

            return response()->json($e->getMessage());
        }
    }

    public function validateToken($token = null, $uid = null)
    {
        try {
            $user = User::where('id', $uid)->where('_token', $token)->first();
            if (empty($user)) {
                $success['status'] =  401;
                $success['message'] =  'Unauthorized';
                return response()->json($success);
            } else {
                $success['status'] =  200;
                $success['message'] =  'Authenticated';
                return response()->json($success);
                
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

                // Mail::send('email.forgetPassword', ['token' => $token], function ($message) use ($request) {
                //     $message->to($request->email);
                //     $message->subject('Reset Password');
                // });

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

        if ($request->password != $request->password_confirmation) {
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

    public function updateUserProfile(Request $request)
    {
        $user = User::find($request->updateId);
        if (!empty($request->new_password)) {
            if (!empty($request->old_password && $request->new_password)) {
                if (Hash::check($request->old_password, $user->password)) {
                    $newpassword = Hash::make($request->new_password);
                } else {
                    return response()->json('Your Current password does not match our records');
                }
            } else {
                return response()->json('Please enter new and old password both');
            }
        }
        
        try {

            $user->update([
                'name' => $request->name ?? '',
                'phone_no' => $request->phone ?? '',
                'zip_code' => $request->zip_code ?? '',
                'password'      => (!empty($newpassword)) ? $newpassword : $user->password,
            ]);
            return response()->json($user);
        } catch (Exception $e) {
            toastr()->error($e->getMessage());
        }
        
    }

    public function updateUserPhoto(Request $request)
    {
        $user = User::find($request->updateId);
       
        $imgpath = public_path('images/profile/');
        if (empty($request->profileImg)) {
            return response()->json('first select image then submit');
        } else {
            $imagePath = $user->profile_photo_path;
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
            $file = $request->profileImg;
            $fileName = time() . '.' . $file->clientExtension();
            $file->move($imgpath, $fileName);
            try {

                $imageAsset = 'https://001cars.mradevelopers.com/images/profile/' . $fileName;
    
                $user->update([
                    'profile_photo_path' => $imageAsset ?? '',
                ]);
                return response()->json($user);
            } catch (Exception $e) {
                toastr()->error($e->getMessage());
            }
        }
       
        
    }

    public function getUser($id)
    {
        try{

           $user = User::find($id);

            return response()->json($user);

        }catch (Exception $e){

            return response()->json($e);
        }
    }
}
