<?php

namespace App\Http\Controllers;

use App\Setting;
use Auth;
use App\User;
use App\Admin;
use App\Deposit;
use App\Gateway;
use App\General;
use App\Wmethod;
use App\Withdraw;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
              

    
    public function gateway()
    {
        $gateways = Gateway::all();
        $pt = 'PAYMENT GATEWAY';
        return view('admin.website.gateway', compact('gateways','pt'));
    }
           
    public function gatewayUpdate(Request $request, Gateway $gateway)
    {

        $this->validate($request, ['gateimg' => 'image|mimes:jpeg,png,jpg|max:2048','name' => 'required']);
        
        if($request->hasFile('gateimg'))
        {
            $imgname = $gateway->id.'.jpg';
            $npath = 'assets/image/gateway/'.$imgname;

            Image::make($request->gateimg)->resize(200, 200)->save($npath);
        }
        
        $gateway['name'] = $request->name;
        $gateway['minamo'] = $request->minamo;
        $gateway['maxamo'] = $request->maxamo;
        $gateway['fixed_charge'] = $request->fixed_charge;
        $gateway['percent_charge'] = $request->percent_charge;
        $gateway['rate'] = $request->rate;
        $gateway['val1'] = $request->val1;
        $gateway['val2'] = $request->val2;
        $gateway['val3'] = $request->val3;
        $gateway['val4'] = $request->val4;
        $gateway['val5'] = $request->val5;
        $gateway['val6'] = $request->val6;
        $gateway['val7'] = $request->val7;
        $gateway['status'] = $request->status;
        $gateway->update();
        
        return back()->with('success','Gateway Information Updated Successfully');
    }



    public function wmethod()
    {
        $gateways = Wmethod::all();
        $pt = 'WITHDRAW METHOD';
        return view('admin.website.wmethod', compact('gateways','pt'));
    }
           
    public function wmethodCreate(Request $request)
    {
        $this->validate($request, ['name' => 'required']);
        
            
        $wmethod['name'] = $request->name;
        $wmethod['minamo'] = $request->minamo;
        $wmethod['maxamo'] = $request->maxamo;
        $wmethod['fixed_charge'] = $request->fixed_charge;
        $wmethod['percent_charge'] = $request->percent_charge;
        $wmethod['rate'] = $request->rate;
        $wmethod['val1'] = $request->val1;
        $wmethod['status'] = $request->status;
        Wmethod::create($wmethod);
        
        return back()->with('success','Withdraw Method Created Successfully');
    }

    public function wmethodUpdate(Request $request, Wmethod $wmethod)
    {
        $this->validate($request,  ['name' => 'required']);
        
        $wmethod['name'] = $request->name;
        $wmethod['minamo'] = $request->minamo;
        $wmethod['maxamo'] = $request->maxamo;
        $wmethod['fixed_charge'] = $request->fixed_charge;
        $wmethod['percent_charge'] = $request->percent_charge;
        $wmethod['rate'] = $request->rate;
        $wmethod['val1'] = $request->val1;
        $wmethod['status'] = $request->status;
        $wmethod->update();
        
        return back()->with('success','Withdraw Method Updated Successfully');
    }
        
    public function deposits()
    {
        $deposits = Deposit::orderBy('id','DESC')->where('status', 1)->paginate(15);
        $pt = 'DEPOSITS';

        return view('admin.user.drequest', compact('deposits','pt'));
    }
    
    public function depoApprove(Request $request, $id)
    {
        $deposit = Deposit::findOrFail($id);
        $deposit['status'] = 1;
        $deposit->update();
        
        $user = User::findOrFail($deposit->user_id);
        $user['balance'] = $user->balance + $deposit->amount;
        $user->save();
        
        $tlog['user_id'] = $user->id;
        $tlog['amount'] = $deposit->amount;
        $tlog['balance'] = $user->balance;
        $tlog['type'] = 1;
        $tlog['details'] = 'Deposit via '.$deposit->gateway->name;
        $tlog['trxid'] = str_random(16);
        Transaction::create($tlog);
        
        return back()->with('success','Deposit Approved Successfully');
        
    }
                
    public function depoCancel(Request $request, $id)
    {
        $deposit = Deposit::findOrFail($id);
        $deposit['status'] = 2;
        $deposit->update();
        
        return back()->with('success','Deposit Canceled Successfully');
        
    }


    public function transactionRequest()
    {
        $reqs = Transaction::where('type',7)->where('status',0)->paginate(20);

        return view('admin.user.TransactionRequest', compact('reqs'));
    }

    public function transactionApproved()
    {
        $approve = Transaction::where('type',7)->where('status',1)->paginate(20);

        return view('admin.user.TransactionApprove', compact('approve'));
    }


    public function transactionOtBankConfirm(Request $request)
    {
        $tran = Transaction::findOrFail($request->transaction);
        $tran['status'] = 1;
        $tran->update();

       $user = User::find($tran->user_id);

        $gnl = Setting::first();

        $msg = 'We Transfer balance in ' . $tran->details . '. Amount ' . $tran->amount . $gnl->cur . '. Transaction fee ' . $tran->fee . $gnl->cur . '. Transaction id : ' .$tran['trxid'] ;
        send_email($user->email, $user->username, 'Other Bank Transaction Approved', $msg);
        $sms = 'We Transfer balance in ' . $tran->details . '. Amount' . $tran->amount . $gnl->cur . '. Truncation fee' . $tran->fee  . '. Transaction id : ' .$tran['trxid'] ;
        send_sms($user->mobile, $sms);


        return back()->with('success','Transaction Approved Successfully');
    }

 public function transactionOtBankReject(Request $request)
    {


        $tran = Transaction::findOrFail($request->transaction);
        $tran->status = 2;
        $tlog['details'] = 'Other Bank Transaction Canceled. '  . $tran->details;
        $tran->update();

       
        $user = User::find($tran->user_id);
        $user['balance'] = $user->balance + $tran->amount + $tran->fee;
        $user->update();

        $gnl = Setting::first();

        $msg = 'We Refund your balance Mr.' . $user->name . '. Amount ' . $tran->amount . $gnl->cur .  '. Fee ' . $tran->fee . $gnl->cur . '. Transaction id : ' . $tran->trxid  .'Your current balance is ' . $user->balance;
        send_email($user->email, $user->username, 'Transaction Successfully', $msg);
        $sms = 'We Refund your balance Mr.' . $user->name . '. Amount' . $tran->amount . $gnl->cur .  '. Fee ' . $tran->fee . $gnl->cur . '. Transaction id : ' . $tran->trxid .'Your current balance is ' . $user->balance;
        send_sms($user->mobile, $sms);


        return back()->with('success','Transaction Approved Successfully');
    }

    public function transactionRejected()

    {
        $reject = Transaction::where('type',7)->where('status',2)->paginate(20);


        return view('admin.user.TransactionReject', compact('reject'));

    }

    public function withdrawRequest()
    {
        $reqs = Withdraw::where('status',0)->paginate(20);

        return view('admin.user.withreqs', compact('reqs'));
    }


    public function withdrawLog()
    {
        $logs = Withdraw::where('status',1)->paginate(20);
        return view('admin.user.withlog', compact('logs','pt'));
    }

    public function withdrawRejected()
    {
        $rejects = Withdraw::where('status',2)->paginate(20);
        return view('admin.user.withRejects', compact('rejects'));
    }


    public function withdrawApprove(Request $request, $id)
    {
        $withd = Withdraw::findOrFail($id);
        $withd['status'] = 1;
        $withd->update();
        
        return back()->with('success','Withdraw Approved Successfully');
    }
    public function withdrawCancel(Request $request)
    {
        $withd = Withdraw::findOrFail($request->withdraw);
        $withd['status'] = 2;
        $withd->update();


        $gnl = Setting::first();

        $user = User::find($withd->user_id);

        $user['balance'] = $user->balance + $withd->amount + $withd->fee;
        $user->update();

        
        $tlog['user_id'] = $user->id;
        $tlog['amount'] = $withd->amount;
        $tlog['fee'] = $withd->fee;
        $tlog['balance'] = $user->balance;
        $tlog['type'] = 1;
        $tlog['details'] = 'Withdraw Canceled';
        $tlog['trxid'] = str_random(16);
        Transaction::create($tlog);

        $msg = 'We refund you balance Mr.' . $user->name . '. Amount ' . $withd->amount . $gnl->cur . '. fee ' . $withd->fee . $gnl->cur . '. Your current balance is ' . $user->balance . $gnl->cur . '. Transaction id : ' .$tlog['trxid'] ;
        send_email($user->email, $user->username, 'Withdraw Canceled', $msg);
        $sms = 'We refund you balance Mr.' . $user->name . '. Amount' . $withd->amount . $gnl->cur . '. Truncation fee' . $withd->fee . '.Your current balance is ' . $user->balance . $gnl->cur . '. Transaction id : ' .$tlog['trxid'] ;
        send_sms($user->mobile, $sms);

        
        return back()->with('success','Withdraw Canceled Successfully');
    }
 
  
   
   public function charges()
   {
       return view('admin.settings.charge');

   }
   public function chargesUpdate(Request $request)
   {
       $charge = Setting::first();
       $charge->bal_trans_fixed_charge =$request->bal_trans_fixed_charge;
       $charge->bal_trans_per_charge =$request->bal_trans_per_charge;
       $charge->update();


       return back()->with('success','Charges Updated Successfully');

   }
    
}
                        