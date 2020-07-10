@extends('frontend.index')
@section('content')


    

    <!-- Header -->
    <header class="product-header">
        <div class="overlay"></div>
        <div class="container">
            <video autoplay loop>
                <source src="{{it()->url(setting()->product_video)}}" type="video/mp4">
                Your browser does not support the HTML5 video.
            </video>
        
            <div class=" social-links">
                <a class="facebook"  target="_blank" href="{{setting()->facebook}}"><i class="fab fa-facebook-f"></i></a>
                <a class="twitter"  target="_blank" href="{{setting()->twitter}}"><i class="fab fa-twitter"></i></a>
                <a class="instagram"  target="_blank" href="{{setting()->instagram}}"><i class="fab fa-instagram"></i></a>
                <a class="youtube"  target="_blank" href="{{setting()->youtube}}"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </header>

    <!-- Free Lessons carousel section -->

    <main class="banner-title">
        <h1>{{$Product->title}}</h1>
    </main>

    <!-- products list Sections -->

    <section class="product-details">
        <div class="container">
            <div class="row">
                
                
                
                <!-- Card Details section -->

                <article class="col-12 card product-card">
                    <div class="row">
                        <div class="col-md-2">
                            <section class="card-left-img">
                                <img class="card-img" src="{{it()->url($Product->img)}}" alt="{{$Product->title}}">
                            </section>
                        </div>
                        <div class="col-md-6">
                            <section class="card-body">
                                <h5 class="card-title">{{$Product->title}}</h5>
                                <p class="card-text">
                                    {!!Product->des!!}
                                </p>
                            </section>
                        </div>
                        <div class="col-md-4">
                            <footer class="card-footer">
                                <span class="product-price">$ {{$Product->piece_price}}</span>
                                    <article class="form-group">
                                        <label for="productQuantity">quantity</label>
                                        <input type="hidden" name="productPrice" id="productPrice" value="{{$Product->piece_price}}">
                                        <input type="number" name="productQuantity" min="1" id="productQuantity" class="form-control" value="1">
                                    </article>
                                    @if($Product->Checked())
                                        <button type="submit" data-url="{{route('add.cart' , $Product->id)}}" style="background-color: #3DB166;" disabled class="main-btn add-to-cart active">This In Cart</button>
                                    @else
                                        <button type="submit" data-url="{{route('add.cart' , $Product->id)}}" class="main-btn add-to-cart btn-hover">add to cart</button>
                                    @endif
                            </footer>
                        </div>
                    </div>
                </article>

                <!-- more product details section -->

                <section class="col-md-7 product-more-details">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Features of the Workplace Profile</h3>
                            <p>
                                {!!$Product->features_workplace_des!!}
                            </p>
                        </div>
                        <div class="col-md-5">
                            <img src="{{it()->url($Product->features_workplace_img)}}" alt="product-features">
                        </div>
                        <div class="col-12">
                            <h3>Examine this memorable and research-backed profile</h3>
                            <embed src="https://drive.google.com/viewerng/viewer?embedded=true&url={{it()->url(json_decode($Product->examine_memorable_pdf, true)['url'])}}" width="640" height="480">
                            <a href="{{it()->url(json_decode($Product->examine_memorable_pdf, true)['url'])}}" class="pdf-link"><i class="far fa-file-pdf"></i>{{json_decode($Product->examine_memorable_pdf, true)['name']}}</a>
                            <p>
                                {!!$Product->examine_memorable_des!!}
                            </p>
                        </div>
                    </div>
                </section>

                <!-- related-products section -->
                
                <aside class="col-md-5 related-products">
                    <h3>related products</h3>
                    @forelse ($RelatedProducts as $RelatedProduct)

                    <article class="card">
                        <section class="card-body">
                            <h5 class="card-title">{{$Product->title}}</h5>
                            <p class="card-text">{{$Product->min_des}}</p>
                        </section>
                        <section class="card-left-img">
                            <img class="card-img" src="{{it()->url($Product->img)}}" alt="{{$Product->title}}">
                            <span class="product-price">$ {{$Product->piece_price}}</span>
                        </section>
                    </article>
                    @empty
                        
                    @endforelse
                   
                </aside>

                <!-- Bloockquote Section -->

                <section class="col-12 blockquote-section">
                    <blockquote>
                        “Everything DiSC Workplace has been an instrumental component of our organizational development strategy. Our
                        team has
                        learned about their personal style and how to communicate and work more effectively with colleagues, clients,
                        prospects
                        and other business partners. It’s great to hear references to their DiSC style in conversations, meetings and
                        even our
                        Holiday Party! It’s certainly been impactful for our organization.”
                    </blockquote>
                </section>


                <!-- purchase reports -->

                <section class="col-md-5 purchase-reports mr-auto">
                    <h3>Additional reports available for purchase</h3>
                    <ul class="purchase-reports-list">
                        @if(!empty($Product->pdf_files))
                        @php if(!is_array($Product->pdf_files)) $Product->pdf_files = json_decode($Product->pdf_files); @endphp
                        @foreach($Product->pdf_files as $key=>$pdf_files)
                            <li>
                                <a href="{{it()->url($pdf_files->url)}}"><i class="far fa-file-pdf"></i>{{$pdf_files->name}}</a>
                            </li>
                        @endforeach
                        @endif
                    </ul>
                </section>
            </div>
        </div>
    </section>



@stop