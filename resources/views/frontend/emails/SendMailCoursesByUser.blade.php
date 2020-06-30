@component('mail::message')
<center>
	 <p><bdi>{{ trans('admin.welcome',['name'=>$data['name']]) }}</bdi></p><br>



<h1>
<center>{{ trans('admin.or') }}</center>
</h1>,

<h1>
<center>{{$data['phone']}}</center>
</h1>,

<h1>
<center>{{$data['city']}}</center>
</h1>,

<h1>
<center>{{$data['country']}}</center>
</h1>,

<h1>
<center>{{$data['address']}}</center>
</h1>,
{{-- {{ trans('admin.copy_reset_link') }} --}}
{{-- <a href="{{ $data['url'] }}">
	{{ $data['url'] }}
</a> --}}
<br>
{!! $data['massege'] !!}

{{ trans('admin.thanks') }},<br>
{{ config('app.name') }}

</center>
@endcomponent

