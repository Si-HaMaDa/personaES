<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Testimonial;
use Carbon\Carbon;
use App\Model\Event;
use App\Model\News;
use App\Model\FreeLesson;
use App\Model\Course;
use App\Model\CoursesGroup;
use App\Model\Clients;
use App\Mail\SendMailCourses;
use App\Mail\onlineProductThanks;
use App\Mail\shippingProductThanks;

use App\Model\OurClient;
use App\Model\ExpertsIn;
use App\Model\Category;
use App\Model\Product;
use App\Model\EventCheck;
use App\Model\Cart;
use Mail;

class HomeController extends Controller
{
    
    public function Home()
    {
        $Testimonials = Testimonial::all();
        
        $Events = Event::all();
        $News = News::all();
        $Courses = Course::all();
        
        return view('frontend.home', ['title' => trans('frontend.Home') , 'Testimonials' => $Testimonials , 'Events' => $Events , 'News' => $News , 'Courses' => $Courses]);
    }

    public function EventsDetails()
    {
        $Events = Event::with('Checks')->get();
        return view('frontend.events-details', ['title' => trans('frontend.events-details')  , 'Events' => $Events]);
    }


    public function PrivacyPolicy()
    {
        return view('frontend.privacy-policy', []);
    }

    public function RefundPolicy()
    {
        return view('frontend.refund-policy', []);
    }

    

    public function AboutUs()
    {
        return view('frontend.about-us', []);
    }

    public function FreeLessons()
    {
        $FreeLessons = FreeLesson::all();
        return view('frontend.free-lessons', ['title' => trans('frontend.free-lessons')  , 'FreeLessons' => $FreeLessons]);
    }


    public function ourCourses()
    {
        $Courses = Course::all();
        return view('frontend.our-courses', ['title' => trans('frontend.our-courses')  , 'Courses' => $Courses]);
    }
    
    
    public function Course($id)
    {
        $Course = Course::findOrFail($id);
        $Courses = Course::all();
        return view('frontend.course', ['title' => trans('frontend.course')  , 'Course' => $Course  , 'Courses' => $Courses]);
    }


    public function CourseRegister()
    {
        // $Course = Course::findOrFail($id);
        $type = request()->type ? request()->type : "product";
        $id = request()->id ? request()->id : 0;
        $group_id = request()->group_id ? request()->group_id : 0;
        return view('frontend.register', ['title' => trans('frontend.course')  ,'type' => $type ,'id' => $id ,'group_id' => $group_id ]);
    }

    public function getInTouch()
    {
        $rules = [
            'name'=>'required|max:50',
            'email'=>'required|email',
            'phone'=>'required|min:10|numeric',
            'Subject'=>'required',
            'message'=>'required',
            ];
            $data = $this->validate(request(),$rules,[],[
            'name'=>trans('admin.name'),
            'email'=>trans('admin.email'),
            'phone'=>trans('admin.phone'),
            'Subject'=>trans('admin.Subject'),
            'message'=>trans('admin.message'),
        ]);

        Mail::to(request()->email)->send(new getInTouch($data));

        session()->flash('success',trans('admin.added'));
        return redirect(url('/'));
    }


    public function Registered()
    {
        $rules = [
            'name'=>'required|max:50',
            'email'=>'required|email',
            'phone'=>'required|min:10|numeric',
            'city'=>'required',
            'country'=>'required',
            'address'=>'required',
            'cardOwnerName'=>'required',
            'cardNumber'=>'required|min:12',
            'expireDate'=>'required',
            'cvc'=>'required|min:5|numeric',

            ];
            $data = $this->validate(request(),$rules,[],[
            'name'=>trans('admin.name'),
            'email'=>trans('admin.email'),
            'phone'=>trans('admin.phone'),
            'city'=>trans('admin.city'),
            'country'=>trans('admin.country'),
            'address'=>trans('admin.address'),
            'cardOwnerName'=>trans('admin.cardOwnerName'),
            'cardNumber'=>trans('admin.cardNumber'),
            'expireDate'=>trans('admin.expireDate'),
            'cvc'=>trans('admin.cvc'),
        ]);
        if(request()->type == "courses"){

            // $Course = Course::findOrFail(request()->id);
            $group_id = request()->group_id;
            $Course = Course::where('id' , request()->id)->whereHas('Groups', function ($q) use($group_id) {
                $q->where('id', $group_id);
            })->get();
            
            if($Course->count() == 0 ){
                return redirect()->back()->with('error', 'error');   
            }else{
                $Group = CoursesGroup::find($group_id);
                $Course->first();
                
                $now = Carbon::now();
                if($Group->strat_at < $now || count($Group->Clients) == $Group->attends ){
                     return redirect()->back()->with('error', 'error');   
                }else{
                    Clients::create([
                        'name'=>request()->name,
                        'email'=>request()->email,
                        'phone'=>request()->phone,
                        'city'=>request()->city,
                        'country'=>request()->country,
                        'address'=>request()->address,
                        'type'=>request()->type,
                        'course_id'=>$Course->first()->id,
                        'group_id'=>$Group->id,
                        'price'=>$Group->price,
                        'count'=> 1 ,
                        // 'cardOwnerName'=>,
                        // 'cardNumber'=>,
                        // 'expireDate'=>,
                        // 'cvc'=>,
                    ]); 
                    Mail::to(request()->email)->send(new SendMailCourses($data));
                }

            }

        }else if(request()->type == "product"){
            $Cart = Cart::where('ip' , $this->getUserIP() )->with('Product')->get();
            if($Cart->count() != 0){
                foreach ($Cart as $key => $Cart) {
                    Clients::create([
                        'name'=>request()->name,
                        'email'=>request()->email,
                        'phone'=>request()->phone,
                        'city'=>request()->city,
                        'country'=>request()->country,
                        'address'=>request()->address,
                        'type'=>request()->type,
                        'pro_id'=>$Cart->Product->id,
                        'price'=>$Cart->price,
                        'count'=>$Cart->count,
                        // 'cardOwnerName'=>,
                        // 'cardNumber'=>,
                        // 'expireDate'=>,
                        // 'cvc'=>,
                    ]); 
                    $data['product'] = $Cart->Product;
                    $data['price'] = $Cart->price;
                    $data['count'] = $Cart->count;
                    if($Cart->Product->type == "online"){
                        Mail::to(request()->email)->send(new onlineProductThanks($data));
                    }else if($Cart->Product->type == "shipping"){
                        Mail::to(request()->email)->send(new shippingProductThanks($data));
                    }
                }
                Cart::where('ip' , $this->getUserIP() )->delete();
            }
        }
        session()->flash('success',trans('admin.added'));
        return redirect(url('/'));
    }
    

    public function ourClients()
    {
        $clients = OurClient::all();
        return view('frontend.our-clients', ['title' => trans('frontend.our-clients')  , 'clients' => $clients]);
    }

    
    public function expertsIn(Request $request)
    {
        $Experts = ExpertsIn::paginate(10);
        return view('frontend.experts-in', ['title' => trans('frontend.experts-in')  , 'Experts' => $Experts]);
    }


    public function ProductPage(Request $request)
    {
        $categories = Category::all();
        return view('frontend.product-page', ['title' => trans('frontend.product-list')  ,'categories' => $categories]);
    }
    
    public function ProductList(Request $request)
    {
        $category  = $request->cat;
        $Products = Product::Where(function($query) use($category) {
            if($category != 0){
                $query->where('category_id', $category);
            }
        })->paginate(6);
        return view('frontend.product-list', ['title' => trans('frontend.product-list')  , 'Products' => $Products]);
    }

    public function ProductView($id)
    {
        $Product = Product::find($id);
        // $RelatedProduct = Product::whereNot('id' , $id)->get(3);

        $RelatedProducts =  Product::where('id' , '!=', $id)->inRandomOrder()->limit(5)->get(); // The amount of items you wish to receive
        return view('frontend.product', ['title' => trans('frontend.product')  , 'Product' => $Product , 'RelatedProducts' => $RelatedProducts]);
    }
    
    
    public function EventCheck($id)
    {
        $Event = Event::findOrFail($id);
        $EventCheck = EventCheck::where('ip' , $this->getUserIP() )->where( 'event_id' , $Event->id)->get();
        if($EventCheck->count() == 0){
            EventCheck::create([
                'ip'=>$this->getUserIP(),
                'event_id'=>$Event->id,
            ]); 
        }else{
            $EventCheck->first()->delete();
        }
        return response()->json('done',200);
    }
    
    public function cart()
    {
        // $Product = Product::find($id);
        $Cart = Cart::where('ip' , $this->getUserIP() )->with('Product')->get();
        // dd($Cart);
        return view('frontend.cart', ['title' => trans('frontend.cart')  , 'Cart' => $Cart]);
    }
     
    public function AddCart($id)
    {
        $Product = Product::findOrFail($id);
        $Cart = Cart::where('ip' , $this->getUserIP() )->where( 'product_id' , $Product->id)->get();
        if($Cart->count() == 0){
            Cart::create([
                'ip'=>$this->getUserIP(),
                'product_id'=>$Product->id,
                'price'=>request()->price,
                'count'=>request()->quntity,
            ]); 
        }else{
            return response()->json([
                'error' => 'Product Added To Cart'], 404);
        }
        return response()->json([
            'success' => 'Product Added To Cart'], 200);
    }


    public function deleteCart($id)
    {
        $Product = Product::findOrFail(request()->product_id);
        $Cart = Cart::where('ip' , $this->getUserIP() )->where( 'product_id' , request()->product_id)->where('id', $id)->get();
        if($Cart->count() != 0){
            $Cart->first()->delete();
        
        }else{
            return response()->json([
                'error' => 'Not found Product'], 404);
        }
        return response()->json([
            'success' => 'Product Removed From Cart'], 200);
    }

    function getUserIP()
    {
        // Get real visitor IP behind CloudFlare network
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
                $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
                $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }

        return $ip;
    }

    
}
