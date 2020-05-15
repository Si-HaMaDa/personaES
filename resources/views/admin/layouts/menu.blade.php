<li class="nav-item start {{ active_link(null,'active open') }} ">
    <a href="{{aurl('')}}" class="nav-link nav-toggle">
        <i class="fa fa-home"></i>
        <span class="title">{{trans('admin.dashboard')}}</span>
        <span class="selected"></span>
    </a>
</li>
<li class="nav-item start {{active_link('settings','active open')}}  ">
    <a href="{{aurl('settings')}}" class="nav-link nav-toggle">
        <i class="fa fa-cog"></i>
        <span class="title">{{trans('admin.settings')}}</span>
        <span class="selected"></span>
    </a>
</li>
<li class="nav-item start {{active_link('testimonials','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-vcard-o"></i>
        <span class="title">{{trans('admin.testimonials')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('testimonials','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}"> 
        <li class="nav-item start {{active_link('testimonials','active open')}}  "> 
            <a href="{{aurl('testimonials')}}" class="nav-link "> 
                <i class="fa fa-vcard-o"></i>
                <span class="title">{{trans('admin.testimonials')}}  </span>
                <span class="selected"></span>
            </a>
        </li> 
        <li class="nav-item start"> 
            <a href="{{ aurl('testimonials/create') }}" class="nav-link "> 
                <i class="fa fa-plus"></i> 
                <span class="title"> {{trans('admin.create')}}  </span> 
                <span class="selected"></span> 
            </a> 
        </li> 
    </ul> 
</li>
<li class="nav-item start {{active_link('partners','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa "></i>
        <span class="title">{{trans('admin.partners')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('partners','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}"> 
        <li class="nav-item start {{active_link('partners','active open')}}  "> 
            <a href="{{aurl('partners')}}" class="nav-link "> 
                <i class="fa "></i>
                <span class="title">{{trans('admin.partners')}}  </span>
                <span class="selected"></span>
            </a>
        </li> 
        <li class="nav-item start"> 
            <a href="{{ aurl('partners/create') }}" class="nav-link "> 
                <i class="fa fa-plus"></i> 
                <span class="title"> {{trans('admin.create')}}  </span> 
                <span class="selected"></span> 
            </a> 
        </li> 
    </ul> 
</li>

<li class="nav-item start {{active_link('events','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-weixin"></i>
        <span class="title">{{trans('admin.events')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('events','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}"> 
        <li class="nav-item start {{active_link('events','active open')}}  "> 
            <a href="{{aurl('events')}}" class="nav-link "> 
                <i class="fa fa-weixin"></i>
                <span class="title">{{trans('admin.events')}}  </span>
                <span class="selected"></span>
            </a>
        </li> 
        <li class="nav-item start"> 
            <a href="{{ aurl('events/create') }}" class="nav-link "> 
                <i class="fa fa-plus"></i> 
                <span class="title"> {{trans('admin.create')}}  </span> 
                <span class="selected"></span> 
            </a> 
        </li> 
    </ul> 
</li>