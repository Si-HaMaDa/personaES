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
                                        <input type="text" id="name" class="form-control" value="{{old('name')}}" name="name" placeholder="full name">
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
                                        <input type="email" id="email" class="form-control" value="{{old('email')}}" name="email" placeholder="example@domain.com">
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
                                        <input type="tel" id="phone" class="form-control" value="{{old('phone')}}" name="phone" placeholder="01234567891">
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
                                        <input type="text" id="city" class="form-control" value="{{old('city')}}" name="city">
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
                                        <input type="text" id="country" class="form-control" value="{{old('country')}}" name="country" >
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
                                        <input type="text" id="address" class="form-control" value="{{old('address')}}" name="address" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                {{-- <fieldset>
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
                                                <input type="text" id="cardOwnerName" class="form-control" value="{{old('cardOwnerName')}}" name="cardOwnerName">
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
                                                <input type="text" id="cardNumber" class="form-control" value="{{old('cardNumber')}}" name="cardNumber" placeholder="enter a valid card number">
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
                                                <input type="text" id="expireDate" class="form-control" value="{{old('expireDate')}}" name="expireDate" placeholder="MM/YY">
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
                                                <input type="text" id="cvc" class="form-control" value="{{old('cvc')}}" name="cvc" placeholder="CVC">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                        <div class="col-lg-4 order-1 order-lg-2 card-container"></div> 
                    </div>
                </fieldset> --}}
                <div class="col-12">
                    <div class="form-group">
                        <button id="confirmPaymentBtn" type="submit" class="main-btn btn-hover">confirm payment</button>
                    </div>
                </div>
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
                                    <a href="{{url('/privacy-policy')}}" target="_blank">privacy policy</a> - <a href="{{url('/refund-policy')}}" target="_blank">refund policy</a>
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

@section('js')

<script src="https://cibpaynow.gateway.mastercard.com/checkout/version/54/checkout.js"
		
data-error="errorCallback"
data-cancel="cancelCallback"
data-complete="completeCallback">
</script>


<script>
$(document).ready(function(){

    const registerationFormSubmet = $('form#registerationForm');
    registerationFormSubmet.submit(function(e) {

        e.preventDefault(); // avoid to execute the actual submit of the form.
        console.log($('meta[name="csrf-token"]').attr('content'));

        
        var form = $(this);

        if(form.valid()){
            Checkout.showLightbox();
        }
        // loading = form.find('.spinner-load'),
        // submit = form.find(':submit');


        // if(form.valid()){
        //     var post_url = form.attr("action"); //get form action url
        //     var request_method = form.attr("method"); //get form GET/POST method
        //     var form_data =new FormData(this);

        //     submit.parent().hide(200);
        //     loading.removeClass('hidden');
        //     $.ajax({
        //         url : post_url,
        //         type: request_method,
        //         data : form_data,
        //         processData: false,
        //         contentType: false,
        //         cache: false,
        //         xhr: function() {
        //             var xhr = new window.XMLHttpRequest();
        //             xhr.upload.addEventListener("progress", function(evt) {
        //                 if (evt.lengthComputable) {
        //                     var percentComplete = evt.loaded / evt.total;
        //                     console.log(percentComplete);
        //                     $('.progress-bar').css("width", Math.round(percentComplete * 100)+'%').html('' + (Math.round(percentComplete * 100)) + '%');
        //                 }
        //             }, false);
        //             return xhr;
        //         },
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         success: function (data) {
        //             submit.parent().show(500);
        //             loading.addClass('hidden');
        //             console.log(data);
        //             // error2.hide(100);
        //             // success2.hide(100);
        //             // success2.html(`<button class="close" data-close="alert"></button> ${data.message}`)
        //             // success2.show(100);
        //             // App.scrollTo(success2, -200);
        //             form[0].reset();
        //             $('.g-items tr:not(".add")').remove();
                    
        //             $.each($('#brands_store input'), function( e , element ) {
        //                 var icon = $(element).parent('.input-icon').children('i');
        //                     $(element).closest('.form-group').removeClass('has-error').removeClass('has-success'); // set success class to the control group
        //                     icon.attr("data-original-title", null).tooltip({'container': 'body'});
        //                     icon.removeClass("fa-warning").removeClass("fa-check");
        //             });

        //             $.each($('#brands_store .fileinput-exists'), function( e , element ) {
        //                 $(element).click();
        //             });
        //         },
        //         error: function (error) {
        //             submit.parent().show(500);
        //             loading.addClass('hidden');
        //             console.log(error.responseJSON);
        //             success2.hide(200);
        //             error2.show(200);
        //             App.scrollTo(error2, -200);
        //             error2.html(`<button class="close" data-close="alert"></button> ${error.responseJSON.message}`)
        //             if(error.responseJSON.errors){
        //                 $.each(error.responseJSON.errors, function( index, value ) {
        //                     var icon =$('input[name='+index+']').parent('.input-icon').children('i');
        //                     icon.removeClass('fa-check').addClass("fa-warning");  
        //                     icon.attr("data-original-title", value).tooltip({'container': 'body'});
        //                     $('input[name='+index+']').closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group   
        //                 });
        //             }
        //         }
        //     });
        // }else{
        //     return false;
        // }   

    });
});
</script>
<script type="text/javascript">




    function errorCallback(error) {
          console.log(JSON.stringify(error));
    }
    function cancelCallback() {
          console.log('Payment cancelled');
    }
    function completeCallback(resultIndicator, sessionVersion) {
        console.log(resultIndicator);
        console.log(sessionVersion);
    }


function CREATE_CHECKOUT_SESSION() {

    var sessionId = "";
    var username = "merchant.TESTCIB229300";
    var password = "8036f634fcd6a5ba6bc9c966ce3de8e3";
    var orderId = "4564";

        $.ajax({
            type: 'POST',
            crossDomain: true,
            data: '{"apiOperation": "CREATE_CHECKOUT_SESSION", "interaction" :{"operation":"PURCHASE"}, "order":{"id":"'+orderId+'","currency":"EGP"} }',
            contentType: "application/json; charset=utf-8",
            dataType: 'json',

            headers: {
                'Authorization': 'Basic ' + btoa(username + ":" + password)
            },
            url: "https://cibpaynow.gateway.mastercard.com/api/rest/version/55/merchant/TESTCIB229300/session",
            success: function (jsonData) {
                sessionId = jsonData.session.id;
                    console.log(jsonData);
                return sessionId;
            },
            error: function (request, textStatus, errorThrown) {
                return 0;
            }
        });

}


Checkout.configure({
        merchant: 'TESTCIB229300',
        order: {
            amount: function() {
            var chars = "0123456789",
                length = 3;
            var result = '';
            for (var i = length; i > 0; --i) result += chars[Math.round(Math.random() * (chars.length - 1))];
            console.log(result);                    
            return result;
        },
            currency: 'EGP',
             description: 'Order goods',
            id:'4564'
         },
    interaction: {

        operation: 'PURCHASE', // set this field to 'PURCHASE' for Hosted Checkout to perform a Pay Operation.

        merchant: {

            name: 'Test',

            address: {

                line1: 'Test',

                line2: 'Test Street'

            }

        }

    },


    session: {

          id: CREATE_CHECKOUT_SESSION()

    }

});

</script>


@stop
