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
                           data-toggle="tooltip" title="{{trans('admin.product')}}">
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
                                {{trans('admin.ask_del')}} {{trans('admin.id')}} {{$product->id}} ؟

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

                        <a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('/product')}}"
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
<div class="col-md-12 col-lg-12 col-xs-12">
<b>{{trans('admin.id')}} :</b> {{$product->id}}
</div>
<div class="clearfix"></div>
<hr />

<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.category_id')}} :</b>
 {!! $product->category_id !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.title')}} :</b>
 {!! $product->title !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.img')}} :</b>
 {!! $product->img !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.min_des')}} :</b>
 {!! $product->min_des !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.des')}} :</b>
 {!! $product->des !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.piece_price')}} :</b>
 {!! $product->piece_price !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.category_id')}} :</b>
 {!! $product->category_id !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.features_workplace_img')}} :</b>
 {!! $product->features_workplace_img !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.features_workplace_des')}} :</b>
 {!! $product->features_workplace_des !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.examine_memorable_pdf')}} :</b>
 {!! $product->examine_memorable_pdf !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.examine_memorable_des')}} :</b>
 {!! $product->examine_memorable_des !!}
</div>

			</div>
			<div class="clearfix"></div>
           </div>
         </div>
       </div>
   </div>
@stop