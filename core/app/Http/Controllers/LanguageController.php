<?php

namespace App\Http\Controllers;

use App\Language;
use Auth;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class LanguageController extends Controller
{
//    public function langManage($lang = false)
//    {
//        if (Auth::guard('admin')->user()->can('langManage', Auth::guard('admin')->user())) {
//            $page_title = 'Language Manager';
//            $social = Language::all();
//            return view('admin.lang.lang', compact('page_title', 'social'));
//        }else{
//            $redirect = authorize_admin(Auth::guard('admin')->user()->access);
//            return $redirect;
//        }
//
//
//    }



    public function langManage($lang = false)
    {
        $page_title = 'Language Manager';
        $social = Language::all();
        return view('admin.lang.lang', compact( 'page_title', 'social'));
    }


    public function langStore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'code' => 'required',
            'icon' => 'mimes:png,jpg,jpeg'
        ]);

        if ($request->code == 'en' || $request->code == 'EN' || $request->code == 'En' || $request->code == 'eN') {
            return back()->with('alert', 'Default Language');
        }

        $data = file_get_contents(resource_path('lang/') . 'default.json');
        $json_file = trim(strtolower($request->code)) . '.json';
        $path = resource_path('lang/') . $json_file;

        File::put($path, $data);

        if ($request->hasFile('icon')) {
            $image = $request->file('icon');
            $filename = trim(strtolower($request->code)) . '.' . $image->getClientOriginalExtension();
            $location = 'assets/image/lang/' . $filename;
            Image::make($image)->resize(20, 10)->save($location);
            $in['icon'] = $filename;
        }

        $in['name'] = $request->name;
        $in['code'] = $request->code;
        Language::create($in);

        return back()->with('success', 'Create Successfully');
    }

    public function langDel($id)
    {
        $la = Language::findOrFail($id);
        @unlink('assets/image/lang/' . $la->icon);
        @unlink(resource_path('lang/') . $la->code . '.json');
        $la->delete();
        return back()->with('success', 'Delete Successfully');
    }

    public function langEdit($id)
    {
        $la = Language::findOrFail($id);
        $page_title = "Update " . $la->name . " Keywords";
        $json = file_get_contents(resource_path('lang/') . strtolower($la->code) . '.json');
        $list_lang = Language::all();

        if (empty($json)) {
            return back()->with('alert', 'File Not Found.');
        }

        return view('admin.lang.edit-lang', compact('page_title', 'json', 'la', 'list_lang'));
    }



    public function langUpdate(Request $request, $id)
    {
        $lang = Language::findOrFail($id);
        $content = json_encode($request->keys);
        if ($content === 'null') {
            return back()->with('alert', 'At Least One Field Should Be Fill-up');
        }
        file_put_contents(resource_path('lang/') . $lang->code  . '.json', $content);
        return back()->with('success', 'Update Successfully');
    }


    public function langUpdatepp(Request $request,$id)
    {
        $this->validate($request,[
            'name' => 'required',
            'icon' => 'mimes:png,jpg,jpeg'
        ]);
        $la = Language::whereId($id)->first();
        if($request->hasFile('icon')){
            @unlink('assets/image/lang/'.$la->icon);
            $image = $request->file('icon');
            $filename = trim(strtolower($la->code)).'.'.$image->getClientOriginalExtension();
            $location = 'assets/image/lang/' . $filename;
            Image::make($image)->resize(20, 10)->save($location);
            $in['icon'] = $filename;
        }
        $in['name'] = $request->name;
        Language::whereId($id)->update($in);
        return back()->with('success', 'Update Successfully');
    }


    public function langImport(Request $request)
    {
        $lang = Language::findOrFail($request->code);
        $json = file_get_contents(resource_path('lang/'). strtolower($lang->code).'.json');
        return $json;
    }
}
