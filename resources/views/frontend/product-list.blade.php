

<div class="row">
    @forelse ($Products as $Product)
        <div class="col-md-6">
            <article class="card">
                <div class="card-wrapper row">
                    <div class="col-5 card-left-img">
                        <img class="card-img" src="{{it()->url($Product->img)}}" alt="{{$Product->title}}">
                    </div>
                    <section class="col-7 card-bottom">
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
        <div class="col-md-12">
            <h1>No Product In This Category</h1>
        </div>
    @endforelse


</div>


@if ($Products->lastPage() > 1)
<div class="col-12">
    <nav aria-label="pagination" class="ml-auto">
        <ul class="pagination">
            {{-- <li class="page-item {{ ($Products->currentPage() == 1) ? ' disabled' : '' }}">
                <a class="page-link" data-url="{{ $Products->url(1) }}" tabindex="-1" aria-disabled="true">
                    <i class="fas fa-angle-double-left"></i>
                </a>
            </li> --}}
        
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
            {{-- <li class="page-item">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                    <i class="fas fa-angle-double-right"></i>
                </a>
            </li> --}}
        </ul>
    </nav>
</div>
@endif
