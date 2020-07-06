<li class="nav-item start {{ active_link(null,'active open') }} ">
    <a href="{{aurl('')}}" class="nav-link nav-toggle">
        <i class="fa fa-home"></i>
        <span class="title">{{trans('admin.dashboard')}}</span>
        <span class="selected"></span>
    </a>
</li>
<li class="nav-item start {{ active_link(null,'active open') }} ">
    <a href="{{aurl('translate')}}" class="nav-link nav-toggle">
        <i class="fa fa-home"></i>
        <span class="title">{{trans('admin.translate')}}</span>
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
<li class="nav-item start {{active_link('news','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-rss-square"></i>
        <span class="title">{{trans('admin.news')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('news','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}"> 
        <li class="nav-item start {{active_link('news','active open')}}  "> 
            <a href="{{aurl('news')}}" class="nav-link "> 
                <i class="fa fa-rss-square"></i>
                <span class="title">{{trans('admin.news')}}  </span>
                <span class="selected"></span>
            </a>
        </li> 
        <li class="nav-item start"> 
            <a href="{{ aurl('news/create') }}" class="nav-link "> 
                <i class="fa fa-plus"></i> 
                <span class="title"> {{trans('admin.create')}}  </span> 
                <span class="selected"></span> 
            </a> 
        </li> 
    </ul> 
</li>

<li class="nav-item start {{active_link('course','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-wpexplorer"></i>
        <span class="title">{{trans('admin.course')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('course','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}"> 
        <li class="nav-item start {{active_link('course','active open')}}  "> 
            <a href="{{aurl('course')}}" class="nav-link "> 
                <i class="fa fa-wpexplorer"></i>
                <span class="title">{{trans('admin.course')}}  </span>
                <span class="selected"></span>
            </a>
        </li> 
        <li class="nav-item start"> 
            <a href="{{ aurl('course/create') }}" class="nav-link "> 
                <i class="fa fa-plus"></i> 
                <span class="title"> {{trans('admin.create')}}  </span> 
                <span class="selected"></span> 
            </a> 
        </li> 
    </ul> 
</li>
<li class="nav-item start {{active_link('freelesson','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa "></i>
        <span class="title">{{trans('admin.freelesson')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('freelesson','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}"> 
        <li class="nav-item start {{active_link('freelesson','active open')}}  "> 
            <a href="{{aurl('freelesson')}}" class="nav-link "> 
                <i class="fa "></i>
                <span class="title">{{trans('admin.freelesson')}}  </span>
                <span class="selected"></span>
            </a>
        </li> 
        <li class="nav-item start"> 
            <a href="{{ aurl('freelesson/create') }}" class="nav-link "> 
                <i class="fa fa-plus"></i> 
                <span class="title"> {{trans('admin.create')}}  </span> 
                <span class="selected"></span> 
            </a> 
        </li> 
    </ul> 
</li>
<li class="nav-item start {{active_link('categories','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa "></i>
        <span class="title">{{trans('admin.categories')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('categories','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}"> 
        <li class="nav-item start {{active_link('categories','active open')}}  "> 
            <a href="{{aurl('categories')}}" class="nav-link "> 
                <i class="fa "></i>
                <span class="title">{{trans('admin.categories')}}  </span>
                <span class="selected"></span>
            </a>
        </li> 
        <li class="nav-item start"> 
            <a href="{{ aurl('categories/create') }}" class="nav-link "> 
                <i class="fa fa-plus"></i> 
                <span class="title"> {{trans('admin.create')}}  </span> 
                <span class="selected"></span> 
            </a> 
        </li> 
    </ul> 
</li>
<li class="nav-item start {{active_link('ourclients','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa "></i>
        <span class="title">{{trans('admin.ourclients')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('ourclients','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}"> 
        <li class="nav-item start {{active_link('ourclients','active open')}}  "> 
            <a href="{{aurl('ourclients')}}" class="nav-link "> 
                <i class="fa "></i>
                <span class="title">{{trans('admin.ourclients')}}  </span>
                <span class="selected"></span>
            </a>
        </li> 
        <li class="nav-item start"> 
            <a href="{{ aurl('ourclients/create') }}" class="nav-link "> 
                <i class="fa fa-plus"></i> 
                <span class="title"> {{trans('admin.create')}}  </span> 
                <span class="selected"></span> 
            </a> 
        </li> 
    </ul> 
</li>
<li class="nav-item start {{active_link('expertsin','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa "></i>
        <span class="title">{{trans('admin.expertsin')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('expertsin','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}"> 
        <li class="nav-item start {{active_link('expertsin','active open')}}  "> 
            <a href="{{aurl('expertsin')}}" class="nav-link "> 
                <i class="fa "></i>
                <span class="title">{{trans('admin.expertsin')}}  </span>
                <span class="selected"></span>
            </a>
        </li> 
        <li class="nav-item start"> 
            <a href="{{ aurl('expertsin/create') }}" class="nav-link "> 
                <i class="fa fa-plus"></i> 
                <span class="title"> {{trans('admin.create')}}  </span> 
                <span class="selected"></span> 
            </a> 
        </li> 
    </ul> 
</li>
<li class="nav-item start {{active_link('product','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa "></i>
        <span class="title">{{trans('admin.product')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('product','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}"> 
        <li class="nav-item start {{active_link('product','active open')}}  "> 
            <a href="{{aurl('product')}}" class="nav-link "> 
                <i class="fa "></i>
                <span class="title">{{trans('admin.product')}}  </span>
                <span class="selected"></span>
            </a>
        </li> 
        <li class="nav-item start"> 
            <a href="{{ aurl('product/create') }}" class="nav-link "> 
                <i class="fa fa-plus"></i> 
                <span class="title"> {{trans('admin.create')}}  </span> 
                <span class="selected"></span> 
            </a> 
        </li> 
    </ul> 
</li>
<li class="nav-item start {{active_link('orders','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa "></i>
        <span class="title">{{trans('admin.orders')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('orders','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}"> 
        <li class="nav-item start {{active_link('orders','active open')}}  "> 
            <a href="{{aurl('orders')}}" class="nav-link "> 
                <i class="fa "></i>
                <span class="title">{{trans('admin.orders')}}  </span>
                <span class="selected"></span>
            </a>
        </li> 
    </ul> 
</li>
