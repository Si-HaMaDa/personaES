<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Testimonial;
use Carbon\Carbon;
use App\Model\Event;

class HomeController extends Controller
{
    //
    public function Home()
    {
        $Testimonials = Testimonial::all();
        $Events = Event::all();
        return view('frontend.home', ['title' => trans('frontend.Home') , 'Testimonials' => $Testimonials , 'Events' => $Events]);
    }

    public function EventsDetails()
    {
        $Events = Event::all();
        return view('frontend.events-details', ['title' => trans('frontend.events-details')  , 'Events' => $Events]);
    }


    public function PrivacyPolicy()
    {
        return view('frontend.privacy-policy', []);
    }



    
    
}
