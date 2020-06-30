@extends('admin.index')
	@section('content')
	<div class="row">
		<div class="col-md-12">
				<div class="widget-extra body-req portlet light bordered">
						<div class="portlet-title">
								<div class="caption">
										<span class="caption-subject bold uppercase font-dark">{{$title}}</span>
								</div>
								<div class="actions">
										<a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('product/create')}}"
												data-toggle="tooltip" title="{{trans('admin.add')}}  {{trans('admin.product')}}">
												<i class="fa fa-plus"></i>
										</a>
										<span data-toggle="tooltip" title="{{trans('admin.delete')}}  {{trans('admin.product')}}">
												<a data-toggle="modal" data-target="#myModal{{$product->id}}" class="btn btn-circle btn-icon-only btn-default" href="">
														<i class="fa fa-trash"></i>
												</a>
										</span>
										<div class="modal fade" id="myModal{{$product->id}}">
												<div class="modal-dialog">
														<div class="modal-content">
																<div class="modal-header">
																		<button class="close" data-dismiss="modal">x</button>
																		<h4 class="modal-title">{{trans('admin.delete')}}؟</h4>
																</div>
																<div class="modal-body">
																		<i class="fa fa-exclamation-triangle"></i>   {{trans('admin.ask_del')}} {{trans('admin.id')}} ({{$product->id}}) ؟
																</div>
																<div class="modal-footer">
																		{!! Form::open([
																		'method' => 'DELETE',
																		'route' => ['product.destroy', $product->id]
																		]) !!}
																		{!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger']) !!}
																		<a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
																		{!! Form::close() !!}
																</div>
														</div>
												</div>
										</div>
										<a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('product')}}"
												data-toggle="tooltip" title="{{trans('admin.show_all')}}   {{trans('admin.product')}}">
												<i class="fa fa-list"></i>
										</a>
										<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"
												data-original-title="{{trans('admin.fullscreen')}}"
												title="{{trans('admin.fullscreen')}}">
										</a>
								</div>
						</div>
						<div class="portlet-body form">
								<div class="col-md-12">
										
{!! Form::open(['url'=>aurl('/product/'.$product->id),'method'=>'put','id'=>'product','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="form-group">
    {!! Form::label('title',trans('admin.title'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('title', $product->title ,['class'=>'form-control','placeholder'=>trans('admin.title')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('img',trans('admin.img'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::file('img',['class'=>'form-control','placeholder'=>trans('admin.img')]) !!}
        @if(!empty($product->img))
        <img src="{{it()->url($product->img)}}" style="width:150px;height:150px;" />
        @endif
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('min_des',trans('admin.min_des'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::textarea('min_des', $product->min_des ,['class'=>'form-control','placeholder'=>trans('admin.min_des')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('des',trans('admin.des'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::textarea('des', $product->des ,['class'=>'form-control','placeholder'=>trans('admin.des')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('category_id',trans('admin.category_id'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
{!! Form::select('category_id',App\Model\Category::pluck("name","id"), $product->category_id ,['class'=>'form-control','placeholder'=>trans('admin.category_id')]) !!}
    </div>
</div>
<br>
<div class="form-group">
	{!! Form::label('type',trans('admin.type'),['class'=>'col-md-3 control-label']) !!}
	<div class="col-md-9">
	{!! Form::select('type',['online' => 'Online', 'shipping' => 'Shipping'],$product->type,['class'=>'form-control','placeholder'=>trans('admin.type')]) !!}
	</div>
</div>
<br>
<div class="form-group">
	{!! Form::label('piece_price',trans('admin.piece_price'),['class'=>'col-md-3 control-label']) !!}
	<div class="col-md-9">
			{!! Form::number('piece_price',$product->piece_price,['class'=>'form-control','placeholder'=>trans('admin.piece_price')]) !!}
	</div>
</div>
<br>


<div class="form-group">
    {!! Form::label('features_workplace_img',trans('admin.features_workplace_img'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::file('features_workplace_img',['class'=>'form-control','placeholder'=>trans('admin.features_workplace_img')]) !!}
        @if(!empty($product->features_workplace_img))
        <img src="{{it()->url($product->features_workplace_img)}}" style="width:150px;height:150px;" />
        @endif
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('features_workplace_des',trans('admin.features_workplace_des'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::textarea('features_workplace_des', $product->features_workplace_des ,['class'=>'form-control','placeholder'=>trans('admin.features_workplace_des')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('examine_memorable_pdf',trans('admin.examine_memorable_pdf'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::file('examine_memorable_pdf',['class'=>'form-control','placeholder'=>trans('admin.examine_memorable_pdf')]) !!}
				@if(!empty($product->examine_memorable_pdf))
				<a href="{{it()->url(json_decode($product->examine_memorable_pdf, true)['url'])}}" class="pdf-link"><i class="far fa-file-pdf"></i>{{json_decode($product->examine_memorable_pdf, true)['name']}}</a>
				
        @endif
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('examine_memorable_des',trans('admin.examine_memorable_des'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::textarea('examine_memorable_des', $product->examine_memorable_des ,['class'=>'form-control','placeholder'=>trans('admin.examine_memorable_des')]) !!}
    </div>
</div>
<br>

<div class="form-group-item">
	<label class="control-label">{{__('Prices')}}</label>
	<div class="g-items-header">
			<div class="row">
					<div class="col-md-3">{{__("From")}}</div>
					<div class="col-md-3">{{__('To')}}</div>
					<div class="col-md-5">{{__('Price')}}</div>
					<div class="col-md-1"></div>
			</div>
	</div>
	<div class="g-items">
			@if(!empty($product->prices))
					@php if(!is_array($product->prices)) $product->prices = json_decode($product->prices); @endphp
					@foreach($product->prices as $key=>$prices)
								<div class="item" data-number="{{$key}}">
										<div class="row">
												<div class="col-md-3">
														<input type="number" name="prices[{{$key}}][from]" value="{{$prices->from}}" class="form-control" placeholder="{{trans('admin.from')}}">
												</div>
												<div class="col-md-3">
														<input type="number" name="prices[{{$key}}][to]" value="{{$prices->to}}" class="form-control" placeholder="{{trans('admin.to')}}">
												</div>
												<div class="col-md-5">
														<input type="number" name="prices[{{$key}}][price]" value="{{$prices->price}}" class="form-control" placeholder="{{trans('admin.price')}}">
												</div>
												<div class="col-md-1">
														<span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
												</div>
										</div>
								</div>
					@endforeach
			@endif
	</div>
	<div class="text-right">
			<span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> {{__('Add item')}}</span>
	</div>
	<div class="g-more hide">
			<div class="item" data-number="__number__">
					<div class="row">
							<div class="col-md-3">
									<input type="number" __name__="prices[__number__][from]" class="form-control" placeholder="{{trans('admin.from')}}">
							</div>
							<div class="col-md-3">
									<input type="number" __name__="prices[__number__][to]" class="form-control" placeholder="{{trans('admin.to')}}">
							</div>
							<div class="col-md-5">
									<input type="number" __name__="prices[__number__][price]" class="form-control" placeholder="{{trans('admin.price')}}">
							</div>
							<div class="col-md-1">
									<span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
							</div>
					</div>
			</div>
	</div>
</div>



<div class="form-group-item">
	<label class="control-label">{{__('Pdf Files')}}</label>
	<div class="g-items-header">
			<div class="row">
					<div class="col-md-11">{{__("Files")}}</div>

					<div class="col-md-1"></div>
			</div>
	</div>
	<div class="g-items">

		@if(!empty($product->pdf_files))
					@php if(!is_array($product->pdf_files)) $product->pdf_files = json_decode($product->pdf_files); @endphp
					@foreach($product->pdf_files as $key=>$pdf_files)
								<div class="item" data-number="{{$key}}">
										<div class="row">
											<div class="col-md-11">
												<input type="hidden" name="pdf_files_old[{{$key}}][url]" value="{{$pdf_files->url}}">
												<input type="hidden" name="pdf_files_old[{{$key}}][name]" value="{{$pdf_files->name}}">
												<a href="{{it()->url($pdf_files->url)}}"><i class="far fa-file-pdf"></i>{{$pdf_files->name}}</a>
											</div>
												<div class="col-md-1">
														<span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
												</div>
										</div>
								</div>
						
					@endforeach
			@endif
			
	</div>
	<div class="text-right">
			<span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> {{__('Add item')}}</span>
	</div>
	<div class="g-more hide">
			<div class="item" data-number="__number__">
					<div class="row">
							<div class="col-md-11">
									<input type="file" __name__="pdf_files[__number__]" class="form-control" placeholder="{{trans('admin.pdf')}}">
							</div>
							<div class="col-md-1">
									<span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
							</div>
					</div>
			</div>
	</div>
</div>


<div class="form-actions">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-offset-3 col-md-9">
{!! Form::submit(trans('admin.save'),['class'=>'btn btn-success']) !!}
         </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}

												</div>
												<div class="clearfix"></div>
								</div>
						</div>
				</div>
		</div>
		@stop
		
