<?php

namespace App\Http\Controllers;


use App\Setting;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SettingsController extends Controller
{
    public function index()
    {
        $data = Setting::where('id', 1)->first();

        return view('admin.settings.settings', compact('data'));
    }



    public function generalUpdate(Request $request)
    {

        $this->validate($request,[
            'title'=>'required|max:100',
        ]);

        $data = Setting::first();
        $data->title = $request->title;
        $data->color1 = $request->color1;
        $data->cur = $request->currency;
        $data->cur_symbol = $request->currency_symbol;
        $data->email_notification = isset($request->email_notification)?1:0;
        $data->sms_notification = isset($request->sms_notification)?1:0;
        $data->sms_verification = isset($request->sms_verification)?1:0;
        $data->email_verification = isset($request->email_verification)?1:0;
        $data->registration = isset($request->registration)?1:0;
        $data->branding = $request->branding;

        $data->save();
        return redirect()->back()->with('success','Successfully Updated');

    }
    public function changeCoverImage()
    {
        $data = Setting::where('id', 1)->first();

        return view('admin.InterfaceControl.coverImageChange', compact('data'));
    }

    public function updateCoverImage(Request $request)   {

        $this->validate($request,[
            'cover_image' => 'mimes:jpg,jpeg,bmp,gif,png,svg',
        ]);
        $data = Setting::first();
        $data->cover_title = $request->cover_title;
        $data->description = $request->description;

        if($request->hasFile('cover_image')) {
            @unlink('assets/image/cover/' . $data->cover_image);
            $image = $request->file('cover_image');
            $filename = $image->hashName();
            $location = 'assets/image/cover/' . $filename;
            Image::make($image)->save($location);
            $data->cover_image = $filename;
        }
        $data->save();
        return redirect()->back()->with('success','Successfully Updated');
    }

    public function changeFooterImage()
    {
        $data = Setting::where('id', 1)->first();

        return view('admin.InterfaceControl.footerImageChange', compact('data'));
    }

    public function updateFooterImage(Request $request)   {

        $this->validate($request,[
            'footer_image' => 'mimes:jpg,jpeg,gif,png',
        ]);
        $data = Setting::first();


        if($request->hasFile('footer_image')) {
            @unlink('assets/image/footer/' . $data->footer_image);
            $image = $request->file('footer_image');
            $filename = $image->hashName();
            $location = 'assets/image/footer/' . $filename;
            Image::make($image)->save($location);
            $data->footer_image = $filename;
        }
        $data->save();
        return redirect()->back()->with('success','Successfully Updated');
    }


    public function email()
    {
        $data = Setting::where('id', 1)->first();
        return view('admin.settings.settingsEmail', compact('data'));
    }
    public function emailUpdate(Request $request)
    {
        $data = Setting::first();
        $data->email_from = $request->email_from;
        $data->email_body = $request->email_body;
        $data->save();
        return redirect()->back()->with('success','Successfully Updated');
    }


    public function smsApi()    {

        $data = Setting::first();
        return view('admin.settings.settingsSmsApi', compact('data'));
    }

    public function smsApiUpdate(Request $request)
    {

        $data = Setting::first();
        $data->sms_api = $request->sms_api;
        $data->save();
        return redirect()->back()->with('success','Successfully Updated');

    }


    public function logo()
    {

        return view('admin.InterfaceControl.logo');
    }

    public function logoUpdate(Request $request)
    {


        $this->validate($request,[
            'logo' => 'mimes:png',
            'favicon' => 'mimes:png',
        ]);


        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $filename = 'logo.png';
            $location = 'assets/image/' . $filename;
            Image::make($image)->save($location);
        }
        if ($request->hasFile('favicon')) {
            $image = $request->file('favicon');
            $filename = 'favicon.png';
            $location = 'assets/image/' . $filename;
            Image::make($image)->save($location);
        }
        return redirect()->back()->with('success','Successfully Updated');

    }


    public function facebookApi()
    {
        $data = Setting::first();

        return view('admin.settings.facebookApi', compact('data'));


    }
    public function facebookUpdate(Request $request)
    {

        $data = Setting::first();
        $data->facebook_api = $request->facebook_api;
        $data->save();
        return redirect()->back()->with('success','Successfully Updated');

    }





}
