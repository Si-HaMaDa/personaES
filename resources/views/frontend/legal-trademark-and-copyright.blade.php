@extends('frontend.index')
@section('content')
    <!-- Events details carousel section -->
    <section class="legal-trademark">
        <div class="container">
            {!! setting()->legal_trademark_and_copyright !!}
        </div>
    </section>
@stop