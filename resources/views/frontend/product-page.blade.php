@extends('frontend.index')
@section('content')


    

    <!-- Header -->
    <header class="products-list-header">
        <div class="overlay"></div>
        <div class="container">
            <video autoplay loop>
                <source src="{{it()->url(setting()->product_video)}}" type="video/mp4">
                Your browser does not support the HTML5 video.
            </video>
            <div class="header-wrapper">
                <h1 class="section-title"><span class="title">disc products</span></h1>
            </div>
            <div class=" social-links">
                <a class="facebook"  target="_blank" href="{{setting()->facebook}}"><i class="fab fa-facebook-f"></i></a>
                <a class="twitter"  target="_blank" href="{{setting()->twitter}}"><i class="fab fa-twitter"></i></a>
                <a class="instagram"  target="_blank" href="{{setting()->instagram}}"><i class="fab fa-instagram"></i></a>
                <a class="youtube"  target="_blank" href="{{setting()->youtube}}"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </header>

    <!-- products list Sections -->

    <section class="products-list">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <aside class="filter-products">
                        <h3>category</h3>
                        <form>
                            <input type="hidden" name="cat_id" value="0">
                            <input type="hidden" name="url" value="{{url('product-list')}}?cat=0">
                            <div class="form-check">
                                <input type="radio" name="productCategory" value="0" data-url="{{url('product-list')}}?cat=0" id="allCategories" class="form-check-input" checked>
                                <label for="allCategories" class="form-check-label">all categories</label>
                            </div>
                            @foreach ($categories as $category)
                                <div class="form-check">
                                    <input type="radio" name="productCategory" value="{{$category->id}}" data-url="{{url('product-list')}}?cat={{$category->id}}" id="{{$category->name}}" class="form-check-input" >
                                    <label for="{{$category->name}}" class="form-check-label">{{$category->name}}</label>
                                </div>
                            @endforeach
                            
                        </form>
                    </aside>
                </div>
                <div class="col-lg-9">
                    <section class="view-products">
                   
                    </section>
                </div>
            </div>
        </div>
    </section>




        <!-- Header -->



    <main>

    <!-- Free Lessons carousel section -->






@stop