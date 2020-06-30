@extends('frontend.index')
@section('content')


        <!-- Header -->
        <header class="disc-payment-header" style="background-image: url('{{it()->url(setting()->cart_img)}}')">
            <div class="overlay"></div>
            <div class="container">
                <div class="header-wrapper">
                    <h1 class="section-title"><span class="title">payment details</span></h1>
                </div>
                <div class=" social-links">
                    <a class="facebook"  target="_blank" href="{{setting()->facebook}}"><i class="fab fa-facebook-f"></i></a>
                    <a class="twitter"  target="_blank" href="{{setting()->twitter}}"><i class="fab fa-twitter"></i></a>
                    <a class="instagram"  target="_blank" href="{{setting()->instagram}}"><i class="fab fa-instagram"></i></a>
                    <a class="youtube"  target="_blank" href="{{setting()->youtube}}"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </header>
    
        <main class="banner-title">
            <h1>Everything DiSC Workplace® Profile</h1>
        </main>
    
        <!-- disc payment form -->
    
        <form class="disc-payment">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="table-wrapper overflow-auto">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>product name</th>
                                        <th>product quantity</th>
                                        <th>unit price</th>
                                        <th>sub total</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($Cart as $Cart)
                                    <tr>
                                        <td>{{$Cart->Product->title}}</td>
                                        <td>{{$Cart->count}}</td>
                                        <td>$ {{$Cart->price}}</td>
                                        <td>$ {{$Cart->price * $Cart->count}} </td>
                                        <td><button type="button" data-product-id="{{$Cart->Product->id}}" data-url="{{route('delete.cart' , $Cart->id)}}" class="delete-btn"><i class="fas fa-times"></i></button></td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5">No Product In Cart</td>
                                    </tr>
                                    @endforelse
                                   
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-2 buttons-holder">
                        <button type="button" onclick="func()" class="main-btn cancel">cancel</a>
                            @if($Cart->count() != 0)
                                <button type="button" onclick="window.location.replace('{{url('/register').'?type=product'}}')" class="main-btn buy-now">buy now</button>
                            @else
                                <button type="button" disabled class="main-btn buy-now disabled">buy now</button>
                            @endif
                    </div>
                </div>
            </div>
        </form>






@stop