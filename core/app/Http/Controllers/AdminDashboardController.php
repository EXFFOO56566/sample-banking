<?php

namespace App\Http\Controllers;


use App\Deposit;
use App\Transaction;
use App\Withdraw;
use Session;
use App\Admin;
use App\Advertisement;
use App\Hyip;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminDashboardController extends Controller
{



    public function loginPage()
    {
        if (Auth::user()){
            return  redirect()->route('admin.dashboard');
        }
        return redirect()->route('admin.login');
    }

    public function loginForm()
    {
        return view('admin.page-login');
    }

    public function login(Request $request)
    {

        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
        if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->route('admin.dashboard')->with('success', 'Successfully logged in');
        }
        return redirect()->back()->withErrors('Invalid Input');
    }

    public function profile()
    {
        $admin = Admin::first();
        return view('admin.profile.index', compact('admin'));
    }

    public function profilePost(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'username' => 'required|alpha_num|string',
            'email' => 'required|string',
        ]);
        $admin = Admin::first();

        $admin->name = $request->name;
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->save();
        return redirect()->back()->with('success', 'Successfully Updated');
    }

    public function ChangePass()
    {

        return view('admin.profile.passwordChange');
    }

    public function ChangePassPost(Request $request)
    {

        $request->validate([
            'old_password' => 'required|string',
            'new_password' => 'required|string|min:5|confirmed',
        ]);


        $oldpassword = $request->old_password;
        $newpassword = $request->new_password;

        if (Hash::check($oldpassword,  Auth::guard('admin')->user()->password)) {
            $request->user()->fill(['password' => Hash::make($newpassword)])->save();
            return redirect()->back()->with('success','Your password has been changed Successfully');
        }
        return back()->withErrors('invalid password');
    }




    public function dashboard(){


        $verifiedUser = User::where('email_verified', 1)->where('sms_verified', 1)->count();
        $emailUnverified = User::where('email_verified', 0)->count();
        $mobileUnverified = User::where('sms_verified', 0)->count();
        $totalUser = User::count();
        $bannedUser = User::where('user_banned', 1)->count();

        $totalNumDep = Deposit::where('status', 1)->count();
        $dep = Deposit::where('status', 1)->sum('amount');
        $depCharge = Deposit::where('status', 1)->sum('charge');
        $totalDepAmount = $dep + $depCharge;
        $totalUserBal = User::sum('balance');

        $witTotal = Withdraw::count();
        $witTotalAmount = Withdraw::where('status', 1)->sum('amount');
        $witTotalCharge = Withdraw::where('status', 1)->sum('amount');
        $witPending = Withdraw::where('status', 0)->count();
        $witApprove = Withdraw::where('status', 1)->count();
        $witReject = Withdraw::where('status', 2)->count();
        
        $trOtBankTotal = Transaction::where('type', 7)->count();
        $trOtBankTotalAmount = Transaction::where('type', 7)->where('status', 1)->sum('amount');

        $trOtBankTotalCharge = Transaction::where('type', 7)->where('status', 1)->sum('fee');
        $trOtBankPending = Transaction::where('type', 7)->where('status', 0)->count();
        $trOtBankApprove = Transaction::where('type', 7)->where('status', 1)->count();
        $trOtBankReject = Transaction::where('type', 7)->where('status', 2)->count();





        $total_chart = $this->chartData();

        return view('admin.index' ,compact('verifiedUser', 'bannedUser', 'emailUnverified',
            'mobileUnverified', 'total_chart', 'totalUser', 'totalDepAmount', 'totalUserBal' ,'witPending','witApprove','witReject',
            'witTotal', 'witTotalAmount', 'witTotalCharge', 'dep', 'depCharge', 'totalNumDep', 
             'trOtBankTotalAmount', 'trOtBankTotal', 'trOtBankTotalCharge', 'trOtBankApprove', 'trOtBankReject', 'trOtBankPending'));


    }

    public function chartData() {

        $companyIncomeStatistics = User::whereYear('created_at', '=', date('Y'))->get()->groupBy(function($d) {
            return $d->created_at->format('F');
        });

        $monthly_chart = collect([]);

        foreach (month_arr() as $key => $value) {

            $monthly_chart->push([
                'month' => Carbon::parse(date('Y') . '-' . $key)->format('Y-m'),
                'user' => $companyIncomeStatistics->has($value) ? $companyIncomeStatistics[$value]->count('created_at') : 0,
            ]);
        }

        return response()->json($monthly_chart->toArray())->content();
    }


    public function logout(Request $request)    {

        Auth::guard('admin')->logout();
        return redirect()->route('homePage')->with('success', 'Log out successfully');

    }

    public function allUser()
    {
        $title = "All User";
        $data = User::orderBy('id', 'DESC')->paginate(15);
        return view('admin.user.userIndex', compact('data', 'title'));
    }

    public function bannedUser()
    {
        $title = "Banned user";
        $data = User::where('user_banned', 1)->orderBy('id', 'DESC')->paginate(15);
       return view('admin.user.userIndex', compact('data', 'title'));
    }

    public function verifiedUser()
    {
        $title = "Verified User";
        $data = User::where('email_verified', 1)->where('sms_verified', 1)->orderBy('id', 'DESC')->paginate(15);
        return view('admin.user.userIndex', compact('data', 'title'));
    }

    public function mobileUnverifiedUser()
    {
        $title = "Mobile unverified user ";
        $data = User::where('sms_verified', 0)->orderBy('id', 'DESC')->paginate(15);
      return view('admin.user.userIndex', compact('data', 'title'));
    }

    public function emailUnverifiedUser()
    {
        $title = "Email unverified user";
        $data = User::where('email_verified', 0)->orderBy('id', 'DESC')->paginate(15);
        return view('admin.user.userIndex', compact('data', 'title'));
    }

    public function UserDetails($id)
    {

        $data= User::find($id);
        $totaldepo = Deposit::where('user_id',$data->id)->where('status', 1)->sum('amount');
        $userToUser = Transaction::where('user_id',$data->id)->where('type', 6)->where('status', 1)->sum('amount');
        $userToBank = Transaction::where('user_id',$data->id)->where('type', 7)->where('status', 7)->sum('amount');
        $totalwithd = $userToUser + $userToBank;

        return view('admin.user.userDetails', compact('data', 'totaldepo', 'totalwithd'));
    }
    public function UserDetailsUpdate(Request $request)    {

        $this->validate($request,[
            'first_name'=>'required',
            'last_name'=>'required',
            'username'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'account_number'=>'required',

        ]);
        $data= User::find($request->id);
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->username = $request->username;
        $data->account_number = $request->account_number;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->email_verified = isset($request->email_verified)?1:0;
        $data->sms_verified = isset($request->sms_verified)?1:0;
        $data->user_banned = isset($request->user_banned)?0:1;
        $data->save();
        return redirect()->back()->with('success','Successfully Updated');
    }


    public function withdrawReport($id)
    {

        $data = Withdraw::where('user_id', $id)->latest()->paginate(15);
        return view('admin.user.wReport', compact('data'));

    }
    public function transactionReport($id)
    {

        $data = Transaction::where('user_id', $id)->latest()->paginate(15);
        return view('admin.user.trReport', compact('data'));

    }






}
