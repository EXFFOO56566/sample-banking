<?php

namespace App\Http\Controllers;



use App\Bank;
use App\Blog;
use App\Branch;
use App\Contact;
use App\Faq;
use App\Service;
use App\Setting;
use App\Slider;
use App\SocialIcon;
use App\Subscribe;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class GeneralController extends Controller
{


    public function sliders()
    {
        $sliders = Slider::all();
        return view('admin.InterfaceControl.slider', compact('sliders'));
    }

    public function sliderAdd()
    {

        return view('admin.InterfaceControl.sliderAdd');
    }

    public function sliderStore(Request $request)
    {


        $this->validate($request,[
            'title'=>  'required|max:191',
            'btn_link'=>  'required|max:191',
            'btn_name'=>  'max:191',
            'banner'=>  'required|mimes:jpg,jpeg,gif,png|max:5120',

        ]);

        $slider = new  Slider();
        $slider->title = $request->title;
        $slider->subtitle = $request->subtitle;
        $slider->btn_name = $request->btn_name;
        $slider->btn_link = $request->btn_link;

        if ($request->hasFile('banner')) {
            $image = $request->file('banner');
            $filename = $image->hashName();
            $location = 'assets/image/banner/' . $filename;
            Image::make($image)->save($location);
            $slider->banner = $filename;
        }
        $slider->save();

        return redirect()->back()->with('success', 'Successfully added');


    }


    public function sliderEdit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.InterfaceControl.sliderEdit', compact('slider'));
    }

    public function sliderUpdate(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>  'required|max:191',
            'btn_link'=>  'required|max:191',
            'btn_name'=>  'max:191',
            'banner'=>  'mimes:jpg,jpeg,gif,png|max:5120',

        ]);

        $slider = Slider::findOrfail($id);
        $slider->title = $request->title;
        $slider->subtitle = $request->subtitle;
        $slider->btn_name = $request->btn_name;
        $slider->btn_link = $request->btn_link;

        if ($request->hasFile('banner')) {
            @unlink('assets/image/banner/' . $slider->banner);
            $image = $request->file('banner');
            $filename = $image->hashName();
            $location = 'assets/image/banner/' . $filename;
            Image::make($image)->save($location);
            $slider->banner = $filename;
        }
        $slider->save();

        return redirect()->back()->with('success', 'Successfully updated');


    }



    public function sliderDelete($id)
    {
        $data = Slider::findOrFail($id);
        @unlink('assets/image/banner/' . $data->banner);
        $data->delete();
        return redirect()->back()->with('success', 'Successfully Deleted');
    }


    public function otherBank()
    {
        $banks = Bank::all();
        return view('admin.OtherBank', compact('banks'));
    }

    public function otherBankCreate(Request $request)
    {


        $this->validate($request,[
            'name'=>  'required|max:191',
            'processing_time'=>  'required',
            'min_amount'=>  'numeric',
            'max_amount'=>  'numeric',
            'fixed_charge'=>  'numeric',
            'percent_charge'=>  'numeric',


        ]);

        $banks = new Bank();
        $banks->name = $request->name;
        $banks->min_amount = $request->min_amount;
        $banks->max_amount = $request->max_amount;
        $banks->fixed_charge = $request->fixed_charge;
        $banks->fixed_charge = $request->fixed_charge;
        $banks->percent_charge = $request->percent_charge;
        $banks->status = $request->status;
        $banks->save();

        return redirect()->back()->with('success', 'Successfully added');
    }

 public function otherBankUpdate(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>  'required|max:191',
            'processing_time'=>  'required',
            'min_amount'=>  'numeric',
            'max_amount'=>  'numeric',
            'fixed_charge'=>  'numeric',
            'percent_charge'=>  'numeric',

        ]);

        $banks = Bank::findOrfail($id);
        $banks->name = $request->name;
        $banks->min_amount = $request->min_amount;
        $banks->max_amount = $request->max_amount;
        $banks->fixed_charge = $request->fixed_charge;
        $banks->fixed_charge = $request->fixed_charge;
        $banks->percent_charge = $request->percent_charge;
        $banks->status = $request->status;
        $banks->update();
        return redirect()->back()->with('success', 'Successfully updated');
    }


    public function branch()
    {
          $branches = Branch::all();

        return view('admin.branchAll', compact('branches'));
    }

    public function branchAdd()
    {
        return view('admin.branchAdd');
    }

    public function branchStore(Request $request)
    {
        $this->validate($request,[
            'name'=>  'required|max:191',
            'description'=>  'required',

        ]);

        $branch = new Branch();
        $branch->name = $request->name;
        $branch->description = $request->description;
        $branch->save();
        return redirect()->back()->with('success', 'Successfully added');

    }

    public function branchEdit ($id)
    {
        $branch = Branch::findOrfail($id);
        return view('admin.branchEdit', compact('branch'));

    }

     public function branchUpdate(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>  'required|max:191',
            'description'=>  'required',
            'status'=>  'required',

        ]);

        $branch =  Branch::findOrfail($id);
        $branch->name = $request->name;
        $branch->status = $request->status;
        $branch->description = $request->description;
        $branch->update();
        return redirect()->back()->with('success', 'Successfully updated');

    }

    public function branchDelete($id)
    {

        $branch =  Branch::findOrfail($id);
        $branch->delete();
        return redirect()->back()->with('success', 'Successfully Deleted');

    }



    public function faq()
    {
        $faq = Faq::paginate(10);
        return view('admin.faq', compact('faq'));
    }

    public function faqAdd()
    {
        return view('admin.faqAdd');
    }

    public function faqStore(Request $request)
    {
        $this->validate($request,[
            'title'=>  'required|max:191',
            'description'=>  'required',

        ]);

        $faq = new Faq();
        $faq->title = $request->title;
        $faq->description = $request->description;
        $faq->save();
        return redirect()->back()->with('success', 'Successfully added');

    }

    public function faqEdit ($id)
    {
        $faq = Faq::findOrfail($id);
        return view('admin.faqEdit', compact('faq'));

    }

    public function faqUpdate(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>  'required|max:191',
            'description'=>  'required',

        ]);

        $faq =  Faq::findOrfail($id);
        $faq->title = $request->title;
        $faq->description = $request->description;
        $faq->update();
        return redirect()->back()->with('success', 'Successfully updated');

    }

    public function faqDelete($id)
    {

        $faq =  Faq::findOrfail($id);
        $faq->delete();
        return redirect()->back()->with('success', 'Successfully Deleted');

    }




    public function blog()
    {
        $blog = Blog::latest()->paginate(10);
        return view('admin.blog.blogIndex', compact('blog'));
    }

    public function blogAdd()
    {
        return view('admin.blog.blogAdd', compact('blogCategories'));
    }

    public function blogStore(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|max:191',
            'image' => 'required|mimes:jpg,jpeg,gif,png|max:2048',
        ]);

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->description = $request->description;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $image->hashName();
            $location = 'assets/image/blog/' . $filename;
            $thumbnail = 'assets/image/blog/thumbnail/' . $filename;
            Image::make($image)->fit(800, 600)->save($location);
            Image::make($image)->fit(400, 250)->save($thumbnail);
            $blog->image = $filename;
        }

        $blog->save();

        return redirect()->back()->with('success', 'Successfully added');

    }

    public function blogEdit($id)
    {

        $blog = Blog::findORfail($id);
        return view('admin.blog.blogEdit', compact('blog', 'blogCategories'));
    }


    public function blogUpdate(Request $request, $id)
    {


        $this->validate($request,[
            'title' => 'required|max:191',
            'image' => 'mimes:jpg,jpeg,gif,png|max:2048',
        ]);

        $blog = Blog::findORfail($id);
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->status = $request->status;
        if ($request->hasFile('image')) {
            @unlink('assets/image/blog/thumbnail/' . $blog->image);
            @unlink('assets/image/blog/' . $blog->image);
            $image = $request->file('image');
            $filename = $image->hashName();
            $location = 'assets/image/blog/' . $filename;
            $thumbnail = 'assets/image/blog/thumbnail/' . $filename;
            Image::make($image)->fit(800, 600)->save($location);
            Image::make($image)->fit(400, 250)->save($thumbnail);
            $blog->image = $filename;
        }

        $blog->save();

        return redirect()->back()->with('success', 'Successfully Updated');

    }

    protected function blogDelete(Request $request)
    {

        $blog = Blog::findOrfail($request->blog);
        @unlink('assets/image/blog/thumbnail/' . $blog->image);
        @unlink('assets/image/blog/' . $blog->image);
        $blog->delete();
        return redirect()->back()->with('success', 'Successfully deleted');

    }

    public function services()
    {
        $services = Service::all();

        return view('admin.InterfaceControl.serviceSection', compact('services'));
    }

    public function serviceStore(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string',
            'icon' => 'required|string',
        ]);
        $service = new Service();
        $service->name = $request->name;
        $service->icon = $request->icon;
        $service->description = $request->description;
        $service->save();

        return redirect()->back()->with('success','Successfully added');
    }

    public function serviceUpdate(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|string',
            'icon' => 'required|string',
        ]);
        $service = Service::findOrfail($id);
        $service->name = $request->name;
        $service->icon = $request->icon;
        $service->description = $request->description;
        $service->save();

        return redirect()->back()->with('success','Successfully Updated');
    }

    public function serviceDelete($id)
    {
        $service = Service::findOrfail($id);
        $service->delete();

        return redirect()->back()->withE('success','Successfully deleted');
    }
    public function contactsIndex()
    {
        $thumbnail = Setting::first();
        $contracts = Contact::orderBy('id', 'DESC')->paginate(10);

        return view('admin.InterfaceControl.contact', compact('contracts', 'thumbnail'));
    }

    public function contactsAdd(Request $request)
    {

        $this->validate($request,[
            'name'=>'required',
            'icon'=>'required',
            'title'=>'required',
        ]);
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->icon = $request->icon;
        $contact->title = $request->title;

        $contact->save();
        return redirect()->back()->with('success','Successfully added');
    }

    public function contactsUpdate(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'icon'=>'required',
            'title'=>'required',
        ]);

        $contact= Contact::find($request->id);
        $contact->name = $request->name;
        $contact->icon = $request->icon;
        $contact->title = $request->title;

        $contact->save();
        return redirect()->back()->with('success','Successfully Updated');
    }

    public function contactsDelete($id)
    {
        $data = Contact::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success','Successfully Deleted');
    }


    public function BreadcrumbIndex()
    {
        $breadcrumb = Setting::first();

        return view('admin.InterfaceControl.breadcrumb' , compact('breadcrumb'));
    }

    public function breadcrumb(Request $request)
    {
        $this->validate($request, [
            'breadcrumb' => 'mimes:jpg,jpeg,gif,png|max:2024',

        ]);

        $thumbnail = Setting::first();
        if ($request->hasFile('breadcrumb')) {
            @unlink('assets/image/' . $thumbnail->breadcrumb);
            $image = $request->file('breadcrumb');
            $filename = 'breadcrumb.jpg';
            $location = 'assets/image/' . $filename;
            Image::make($image)->save($location);
        }

        return redirect()->back()->with('success', 'Successfully Updated');
    }




    public function socialindex()
    {
        $icons = SocialIcon::orderBy('id', 'DESC')->paginate(10);

        return view('admin.InterfaceControl.socialIcon', compact('icons'));
    }

    public function socialAdd(Request $request)
    {

        $this->validate($request,[
            'name'=>'required',
            'icon'=>'required',
            'link'=>'required',
        ]);

        $icon = new SocialIcon();
        $icon->name = $request->name;
        $icon->icon = $request->icon;
        $icon->link = $request->link;

        $icon->save();
        return redirect()->back()->with('success','Successfully added');
    }

    public function socialUpdate(Request $request)
    {

        $this->validate($request,[
            'name'=>'required',
            'icon'=>'required',
            'link'=>'required',
        ]);

        $icon= SocialIcon::find($request->id);
        $icon->name = $request->name;
        $icon->icon = $request->icon;
        $icon->link = $request->link;

        $icon->save();
        return redirect()->back()->with('success','Successfully Updated');
    }


    public function socialDelete($id)
    {
        $data = SocialIcon::find($id);
        $data->delete();
        return redirect()->back()->with('success','Successfully Deleted');
    }









    public function subscribe()
    {
        $subscribe = Subscribe::orderBy('id', 'DESC')->paginate(10);

        return view('admin.subscribe.index', compact('subscribe'));
    }

    public function subscribeDelete($id)
    {
        $subscribe = Subscribe::findOrFail($id);
        $subscribe->delete();

        return redirect()->back()->with('success','Successfully Deleted');
    }



    public function subscribeMailSendForm()
    {
        $subscribe = Subscribe::all();
        $mail = count($subscribe);
        if ($mail >= 1 ){
            return view('admin.subscribe.emailToAllSubscribe');
        }
        return redirect()->back()->withErrors('No subscriber found');
    }



        public function subscribeMailSendAll(Request $request)
    {
        $this->validate($request,[
            'subject'=>'required',
            'message'=>'required',
        ]);
        $subscribe = Subscribe::all();

        $mail = count($subscribe);
        if ($mail >= 1){
            foreach ($subscribe as $data) {
                $to = $data->email;
                $name = substr($data->email, 0, strpos($data->email, "@"));
                $subject = $request->subject;
                $message = $request->message;
                send_email($to, $name, $subject, $message);
            }
            return redirect()->back()->with('success','Successfully Send');
        }else {
            return redirect()->back()->withErrors('No subscriber found');
        }



    }



    public function subscribeUpdate(Request $request)
    {

        $subscribe = Setting::first();

        $subscribe->subscribe_title = $request->title;
        $subscribe->subscribe_subtitle = $request->subtitle;

        if($request->hasFile('image')) {
            @unlink('assets/image/subscribe/' . $subscribe->subscribe_img);
            $image = $request->file('image');
            $filename = $image->hashName();
            $location = 'assets/image/subscribe/' . $filename;
            Image::make($image)->save($location);
            $subscribe ->subscribe_img = $filename;
        }
        $subscribe->save();

        return redirect()->back()->with('success','Successfully Update');
    }


    public function HomePage()
    {

        return view('admin.home');

    }



    public function HomePageUpdate(Request $request)
    {







        $this->validate($request, [
            'about_title' => 'required|max:191',
            'service_title' => 'required|max:191',
            'blog_title' => 'required|max:191',
            'faq_title' => 'required|max:191',
            'video_section_banner' => 'mimes:jpg,jpeg,gif,png|max:5120',



        ]);

        $data = Setting::first();
        $data->service_title = $request->service_title;
        $data->service_subtitle = $request->service_subtitle;
        $data->blog_title = $request->blog_title;
        $data->blog_subtitle = $request->blog_subtitle;
        $data->faq_title = $request->faq_title;
        $data->faq_subtitle = $request->faq_subtitle;
        $data->about_title = $request->about_title;
        $data->about_subtitle = $request->about_subtitle;
        $data->video_section_title = $request->video_section_title;
        $data->video_link = $request->video_link;
        $data->video_section_dec = $request->video_section_dec;




        if ($request->hasFile('video_section_banner')) {
            $image = $request->file('video_section_banner');
            $filename = 'video-banner.jpg';
            $location = 'assets/image/' . $filename;
            Image::make($image)->save($location);
        }

        $data->update();

        return redirect()->back()->with('success', 'Successfully updated');

    }


}
