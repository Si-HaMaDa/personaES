@extends('frontend.index')
@section('content')

    <!-- Events details carousel section -->

    <section class="refund-policy">
        <div class="container">
            {!! setting()->refund_policy !!}
        </div>
    </section>




@stop