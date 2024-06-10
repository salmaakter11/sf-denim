<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\CareerPost;
use App\Models\Client;
use App\Models\ContactPost;
use App\Models\Facility;
use App\Models\Order;
use App\Models\People;
use App\Models\Product;
use App\Models\Purpose;
use App\Models\Site;
use App\Models\Story;
use App\Models\Sustailability;
use App\Rules\Recapcha;
use Closure;
use Gloudemans\Shoppingcart\Facades\Cart;
// use GoogleMaps\GoogleMaps;
use GoogleMaps\GoogleMaps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

// use GoogleMaps\Facade\GoogleMapsFacade as GoogleMaps;
class IndexController extends Controller
{
    public function index()
    {
        $site = Site::find(1);
        $banner = Banner::find(1);
        return view('frontend/index', compact('site', 'banner'));
    }
    public function cart()
    {
        $site = Site::find(1);
        return view('frontend/shoping/cart', compact('site'));
    }
    public function checkout()
    {
        $site = Site::find(1);
        return view('frontend/shoping/checkout', compact('site'));
    }
    public function ProductDetail($id)
    {
        $site = Site::find(1);
        return view('frontend/product/detail', compact('site', 'id'));
    }

    public function saveLocation(Request $request)
    {
        session()->forget('google_given_address');
        Session::put('google_given_address', $request->input('address'));
        session()->forget('google_given_latitude');
        Session::put('google_given_latitude', $request->input('latitude'));
        session()->forget('google_given_longitude');
        Session::put('google_given_longitude', $request->input('longitude'));

        return response()->json(['message' => 'Location saved successfully']);
    }

    public function Term()
    {
        $site = Site::find(1);
        return view('frontend/about/term', compact('site'));
    }
    public function Policy()
    {
        $site = Site::find(1);
        return view('frontend/about/policy', compact('site'));
    }
    public function Blog()
    {
        $site = Site::find(1);
        return view('frontend/blog/blog_page', compact('site'));
    }
    public function BlogDetail($id)
    {
        $site = Site::find(1);
        return view('frontend/blog/blog_detail', compact('site', 'id'));
    }
    public function About()
    {
        $site = Site::find(1);
        return view('frontend/about/about_page', compact('site'));
    }
    public function Contact()
    {
        $site = Site::find(1);
        return view('frontend/home/contact', compact('site'));
    }
    
    public function ContactPost(Request $request)
    {
        $validator = $request->validate([
            'full_name'=>['required','string','max:250'],
            'company_name'=>['required','string','max:250'],
            'message'=>['required','string','max:250'],
            'business_mail'=>['required','string','max:250','email'],
            'phone_number'=>['required','numeric','min:7'],
            'g-recaptcha-response'=>['required', new Recapcha],
        ]);
        $contactPost = new ContactPost();
        $contactPost->full_name = $request->full_name;
        $contactPost->company_name = $request->company_name;
        $contactPost->business_mail = $request->business_mail;
        $contactPost->phone_number = $request->phone_number;
        $contactPost->message = $request->message;
        if ($contactPost->save()) {
            $notification = array(
                'message' => 'Your application has been submitted successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('welcome')->with($notification);
        } else {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    }
    public function Career()
    {
        $site = Site::find(1);
        $facility = Facility::find(2);
        return view('frontend/home/career', compact('site','facility'));
    }
    public function CareerPost(Request $request)
    {
       
        $validator = $request->validate([
            'fullname'=>['required','string','max:250'],
            'email'=>['required','string','max:250','email'],
            'address'=>['required','string','max:250','max:250'],
            'tel'=>['required','numeric','min:7'],
            'date_of_birth'=>['required', 'date', 'before_or_equal:today'],
            'file' => ['required','file','mimes:pdf','max:2048'],
        ]);
       
        $filename = null;
        if ($request->hasFile('file')) {
            $pdffile = $request->file('file');
            $filename = time() . '.' . $request->file('file')->getClientOriginalExtension();
            Storage::putFileAs('public/career/cv', $request->file('file'), $filename);
        }
        $careerPost = new CareerPost();

        $careerPost->job_post_id = $request->job_post_id;
        $careerPost->fullname = $request->fullname;
        $careerPost->email = $request->email;
        $careerPost->address = $request->address;
        $careerPost->tel = $request->tel;
        $careerPost->date_of_birth = $request->date_of_birth;
        $careerPost->file = $filename; 
        if ($careerPost->save()) {
            $notification = array(
                'message' => 'Your application has been submitted successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('welcome')->with($notification);
        } else {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput($request->all());
        }
    }

    public function Tellus(Request $request)
    {
        $site = Site::find(1);
        return view('frontend/shoping/shoping_page', compact('site'));
    }

    public function Story()
    {
        $site = Site::find(1);

        return view('frontend/home/story', compact('site'));
    }
    public function Purpose()
    {
        $site = Site::find(1);
        return view('frontend/home/purpose', compact('site'));
    }
    public function People()
    {
        $site = Site::find(1);
       
        return view('frontend/home/people', compact('site'));
    }
    public function Sustailability()
    {
        $site = Site::find(1);
        $sustailability = Sustailability::find(1);
        return view('frontend/home/sustailability', compact('site', 'sustailability'));
    }
    public function Facility()
    {
        $site = Site::find(1);
        $facility = Facility::find(1);
        return view('frontend/home/facility', compact('site', 'facility'));
    }
    public function Aboutus()
    {
        $site = Site::find(1);
        return view('frontend/home/aboutus', compact('site'));
    }
    public function Gallery()
    {
        $site = Site::find(1);
        return view('frontend/home/gallery', compact('site'));
    }
}
