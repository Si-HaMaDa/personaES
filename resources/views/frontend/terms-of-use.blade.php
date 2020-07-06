@extends('frontend.index')
@section('content')
    <!-- Events details carousel section -->
    <section class="terms-of-use">
        <div class="container">
            {!! setting()->terms_of_use !!}
        </div>
    </section>
@stop

