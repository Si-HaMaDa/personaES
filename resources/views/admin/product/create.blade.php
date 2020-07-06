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
								<a  href="{{aurl('product')}}"
										class="btn btn-circle btn-icon-only btn-default"
										tooltip="{{trans('admin.show_all')}}"
										title="{{trans('admin.show_all')}}">
										<i class="fa fa-list"></i>
								</a>
								<a class="btn btn-circle btn-icon-only btn-default fullscreen"
										href="#"
										data-original-title="{{trans('admin.fullscreen')}}"
										title="{{trans('admin.fullscreen')}}">
								</a>
						</div>
				</div>
				<div class="portlet-body form">
								<div class="col-md-12">
								
{!! Form::open(['url'=>aurl('/product'),'id'=>'product','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="form-group">
    {!! Form::label('title',trans('admin.title'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('title',old('title'),['class'=>'form-control','placeholder'=>trans('admin.title')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('img',trans('admin.img'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::file('img',['class'=>'form-control','placeholder'=>trans('admin.img')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('min_des',trans('admin.min_des'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::textarea('min_des',old('min_des'),['class'=>'form-control','placeholder'=>trans('admin.min_des')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('des',trans('admin.des'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::textarea('des',old('des'),['class'=>'form-control','placeholder'=>trans('admin.des')]) !!}
    </div>
</div>
<br>
<div class="form-group">
		{!! Form::label('category_id',trans('admin.category_id'),['class'=>'col-md-3 control-label']) !!}
		<div class="col-md-9">
{!! Form::select('category_id',App\Model\Category::pluck("name","id"),old('category_id'),['class'=>'form-control','placeholder'=>trans('admin.category_id')]) !!}
		</div>
</div>
<br>

<div class="form-group">
    {!! Form::label('type',trans('admin.type'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
    {!! Form::select('type',['online' => 'Online', 'shipping' => 'Shipping'],old('type'),['class'=>'form-control','placeholder'=>trans('admin.type')]) !!}
    </div>
</div>
<br>



<div class="form-group">
    {!! Form::label('piece_price',trans('admin.piece_price'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::number('piece_price',old('piece_price'),['class'=>'form-control','placeholder'=>trans('admin.piece_price')]) !!}
    </div>
</div>
<br>

<div class="form-group">
    {!! Form::label('features_workplace_img',trans('admin.features_workplace_img'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::file('features_workplace_img',['class'=>'form-control','placeholder'=>trans('admin.features_workplace_img')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('features_workplace_des',trans('admin.features_workplace_des'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::textarea('features_workplace_des',old('features_workplace_des'),['class'=>'form-control','placeholder'=>trans('admin.features_workplace_des')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('examine_memorable_pdf',trans('admin.examine_memorable_pdf'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::file('examine_memorable_pdf',['class'=>'form-control','placeholder'=>trans('admin.examine_memorable_pdf')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('examine_memorable_des',trans('admin.examine_memorable_des'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::textarea('examine_memorable_des',old('examine_memorable_des'),['class'=>'form-control','placeholder'=>trans('admin.examine_memorable_des')]) !!}
    </div>
</div>
<br>



<div class="form-group-item">
    <label class="control-label">{{__('Pdf Files')}}</label>
    <div class="g-items-header">
        <div class="row">
            <div class="col-md-11">{{__("Files")}}</div>

            <div class="col-md-1"></div>
        </div>
    </div>
    <div class="g-items">
        <div class="item" data-number="0">
            <div class="row">
                <div class="col-md-11">
                    <input type="file" name="pdf_files[0]" class="form-control" placeholder="{{trans('admin.pdf')}}">
                </div>
                <div class="col-md-1">
                    <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                </div>
            </div>
        </div>
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
{!! Form::submit(trans('admin.add'),['class'=>'btn btn-success']) !!}
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
	
