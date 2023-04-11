<?php

namespace App\Http\Controllers;

use App\Advertisement;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AdsController extends Controller
{
    public function ads()
    {
        return view('admin.advertisement.advertiseAdd');
    }




    public function allAds()
    {
        $ads = Advertisement::orderBy('id', 'DECS')->paginate(10);
        return view('admin.advertisement.index', compact('ads'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function adsPost(Request $request)
    {
        if ($request->type == 1) {
            $this->validate($request, [
                'type' => 'required',
                'size' => 'required',

                'redirect_url' => 'required',
                'banner' => 'mimes:jpg,jpeg,gif,png',
            ]);
        } else {
            $this->validate($request, [
                'type' => 'required',
                'size' => 'required',
                'script' => 'required',
            ]);
        }



        $ads = new Advertisement();
        $ads->type = $request->type;
        $ads->size = $request->size;
        $ads->url = $request->redirect_url;
        $ads->script = $request->script;
        $ads->type = $request->type;

        if ($request->hasFile('banner')) {
            $ads['image'] = uniqid() . '.' . $request->banner->getClientOriginalExtension();
            $request->banner->move('assets/image/ads', $ads['image']);
        }

        $ads->save();
        return redirect()->back()->with('success', 'Successfully added');
    }

    public function adsUpadte(Request $request)
    {

        $this->validate($request, [
            'type' => 'required',
            'size' => 'required',
            'banner' => 'mimes:jpg,jpeg,gif,png',
        ]);

        $ads = new Advertisement();
        $ads->type = $request->type;
        $ads->size = $request->size;
        $ads->url = $request->redirect_url;
        $ads->script = $request->script;
        $ads->type = $request->type;

        if ($request->hasFile('banner')) {
            @unlink('assets/image/ads/' . $ads->image);
            $image = $request->file('banner');
            $filename = $image->hashName();
            $location = 'assets/image/ads' . $filename;
            Image::make($image)->save($location);
            $ads->image = $filename;
        }


        $ads->save();
        return redirect()->back()->with('success', 'Successfully added');
    }

    public function adsDeactivate($id)
    {
        $ads = Advertisement::findOrfail($id);

        $ads->status = 0;
        $ads->save();

        return redirect()->back()->with('success', 'Successfully deactivated');
    }

    public function adsActive($id)
    {
        $ads = Advertisement::findOrfail($id);

        $ads->status = 1;
        $ads->save();

        return redirect()->back()->with('success', 'Successfully deactivated');
    }
}
