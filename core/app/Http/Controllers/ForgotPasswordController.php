<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\PasswordReset as PS;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ForgotPasswordController extends Controller
{


    public function sendResetPassMail(Request $request)
    {
        $this->validate($request, [
            'resetEmail' => 'required',
        ]);
        $emp = User::where('email', $request->resetEmail)->first();
        if ($emp == null) {
            return back()->withErrors('Invalid email');
        } else {
            $to = $emp->email;
            $name = $emp->name;
            $subject = 'Password Reset';
            $code = str_random(30);
            $message = 'Use This Link to Reset Password: ' . url('/') . '/user/password/reset/' . $code;

            DB::table('password_resets')->insert(
                ['email' => $to, 'token' => $code, 'status' => 0, 'created_at' => date("Y-m-d h:i:s")]
            );

            send_email($to, $name, $subject, $message);

            return back()->with('success', 'Password Reset Email Sent Successfully');

        }
    }


    public function resetPasswordForm($code)
    {

        $ps = ps::where('token', $code)->first();


        if ($ps == null) {
            return redirect()->route('login');
        } else {

            if ($ps->status == 0) {
                $emp = User::where('email', $ps->email)->first();
                $data['email'] = $emp->email;
                $data['code'] = $code;
                return view('ForgotPassword.resetPassForm', compact('ps'));
            } else {
                return redirect()->route('login')->withErrors('token not found');;
            }
        }
    }

    public function resetForm($code)
    {

        $ps = PS::where('token', $code)->first();

        if ($ps == null) {
            return redirect()->route('login');
        } else {
            if ($ps->status == 0) {
                $emp = User::where('email', $ps->email)->first();
                $data['email'] = $emp->email;
                $data['code'] = $code;
                return view('ForgotPassword.resetPassForm', $data);
            } else {
                return redirect()->route('login')->withErrors('token not found');
            }
        }
    }

    public function resetPassword(Request $request)

    {

        $messages = [
            'password_confirmation.confirmed' => 'Password doesnot match'
        ];

         $request->validate([
            'password' => 'required|confirmed|min:6',
        ], $messages);

        $emp = User::where('email', $request->email)->first();
        $emp->password = bcrypt($request->password);
        $emp->save();
        $ps = PS::where('token', $request->code)->first();
        $ps->status = 1;
        $ps->save();

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('user.dashboard')->withSuccess('Password changed successfully');
        }
    }



}
