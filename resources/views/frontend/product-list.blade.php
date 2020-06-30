<section class="all-products">
    <div class="row no-gutters">
        @forelse ($Products as $Product)
            <div class="col-md-6 col-xl-4">
                <article class="card">
                    <div class="card-wrapper">
                        <div class="card-left-img">
                            <img class="card-img" src="{{it()->url($Product->img)}}" alt="productTitle">
                        </div>
                        <section class="card-bottom">
                            <a href="{{url('product')}}/{{$Product->id}}">
                                <h5 class="card-title">{{$Product->title}}</h5>
                                <p class="card-text">{{$Product->min_des}}</p>
                            </a>
                        </section>
                    </div>
                    <footer class="card-footer">
                        <span class="product-price">$ {{$Product->piece_price}}</span>
                    </footer>
                </article>
            </div> 
        @empty
            
        @endforelse
      
    </div>
</section>
<div class="d-flex justify-content-end">
    @if ($Products->lastPage() > 1)
    <ul class="pagination">
        <li class="page-item {{ ($Products->currentPage() == 1) ? ' disabled' : '' }}">
            <a href="#" data-url="{{ $Products->url(1) }}" class="a-link page-link">Previous</a>
        </li>
        @for ($i = 1; $i <= $Products->lastPage(); $i++)
            <li class="page-item {{ ($Products->currentPage() == $i) ? ' active' : '' }}">
                <a href="#" data-url="{{ $Products->url($i) }}"class="a-link page-link">{{ $i }}</a>
            </li>
        @endfor
        <li class="page-item {{ ($Products->currentPage() == $Products->lastPage()) ? ' disabled' : '' }}">
            <a href="#" data-url="{{ $Products->url($Products->currentPage()+1) }}" class="a-link page-link">Next</a>
        </li>
    </ul>
    @endif
  

</div>