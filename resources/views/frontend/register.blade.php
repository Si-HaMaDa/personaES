@extends('frontend.index')
@section('content')
    <!-- Header -->
    <header class="register-header" style="background-image: url('{{it()->url(setting()->register_img)}}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="header-wrapper">
                <h1 class="section-title"><span class="title">registeration</span></h1>
            </div>
            <div class=" social-links">
                <a class="facebook"  target="_blank" href="{{setting()->facebook}}"><i class="fab fa-facebook-f"></i></a>
                <a class="twitter"  target="_blank" href="{{setting()->twitter}}"><i class="fab fa-twitter"></i></a>
                <a class="instagram"  target="_blank" href="{{setting()->instagram}}"><i class="fab fa-instagram"></i></a>
                <a class="youtube"  target="_blank" href="{{setting()->youtube}}"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </header>


    <!-- BEGIN PAGE BASE CONTENT -->
    @if(count($errors->all()) > 0)
    <div class="alert alert-danger">
    <ol>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ol>
    </div>
    @endif
    @if(session()->has('error'))
    <div class="alert alert-danger">
        <button class="close" data-close="alert"></button>

        <span> {{ session('error') }} </span>
    </div>
    @endif

    @if(session()->has('success'))
    <div class="alert alert-success">
        <button class="close" data-close="alert"></button>
        @if(session()->has('success'))
        <span> {{ session('success') }} </span>
        @endif
    </div>
    @endif
    <!-- Registration Section -->
    <section class="registeration-section">
        <div class="container">
            {!! Form::open(['url'=>url('/register')."?type=".$type,'id'=>'registerationForm','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
                <fieldset>
                    <div class="row">
                        <div class="col-12">
                            <legend>your info</legend>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row no-gutters">
                                    <div class="col-lg-2">
                                        <label for="#name">name</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <input type="hidden" name="id" value="{{$id}}">
                                        <input type="hidden" name="group_id" value="{{$group_id}}">
                                        <input type="text" id="name" class="form-control" name="name" placeholder="full name">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row no-gutters">
                                    <div class="col-lg-2">
                                        <label for="#email">email</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <input type="email" id="email" class="form-control" name="email" placeholder="example@domain.com">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="row no-gutters">
                                    <div class="col-lg-3">
                                        <label for="#phone">phone</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <input type="tel" id="phone" class="form-control" name="phone" placeholder="01234567891">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="row no-gutters">
                                    <div class="col-lg-3">
                                        <label for="#city">city</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <input type="text" id="city" class="form-control" name="city">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="row no-gutters">
                                    <div class="col-lg-3">
                                        <label for="#country">country</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <input type="text" id="country" class="form-control" name="country" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="row no-gutters">
                                    <div class="col-lg-1">
                                        <label for="#address">address</label>
                                    </div>
                                    <div class="col-lg-11">
                                        <input type="text" id="address" class="form-control" name="address" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="row">
                        <div class="col-12">
                            <legend>card info</legend>
                        </div>
                        <div class="col-lg-8 order-2 order-lg-1">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row no-gutters">
                                            <div class="col-xl-4">
                                                <label for="#cardOwnerName">card owner name</label>
                                            </div>
                                            <div class="col-xl-8">
                                                <input type="text" id="cardOwnerName" class="form-control" name="cardOwnerName">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row no-gutters">
                                            <div class="col-xl-4">
                                                <label for="#cardNumber">card number</label>
                                            </div>
                                            <div class="col-xl-8">
                                                <input type="text" id="cardNumber" class="form-control" name="cardNumber" placeholder="enter a valid card number">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row no-gutters">
                                            <div class="col-xl-4">
                                                <label for="#expireDate">expire date</label>
                                            </div>
                                            <div class="col-xl-8">
                                                <input type="text" id="expireDate" class="form-control" name="expireDate" placeholder="MM/YY">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row no-gutters">
                                            <div class="col-xl-4">
                                                <label for="#cvc">CVC</label>
                                            </div>
                                            <div class="col-xl-8">
                                                <input type="text" id="cvc" class="form-control" name="cvc" placeholder="CVC">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <button id="confirmPaymentBtn" type="submit" class="main-btn btn-hover">confirm payment</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 order-1 order-lg-2 card-container"></div> 
                    </div>
                </fieldset>
                <section class="payment-modal modal fade" tabindex="-1" role="dialog" aria-labelledby="attention"
                    aria-hidden="true">
                    <section class="modal-dialog" role="document">
                        <section class="modal-content">
                            <section class="modal-header">
                                <h5 class="modal-title" id="attention">attention!</h5>
                            </section>
                            <section class="modal-body">
                                <h6>check our</h6>
                                <p>
                                    <a href="#">privacy policy</a> - <a href="#">refund policy</a>
                                </p>
                            </section>
                            <footer class="modal-footer">
                                <button id="confirmPaymentBtn2" type="submit" class="main-btn">submit</button>
                            </footer>
                        </section>
                    </section>
                </section>
            {!! Form::close() !!}
        </div>
    </section>







        <!-- Header -->



    <main>

    <!-- Free Lessons carousel section -->






@stop