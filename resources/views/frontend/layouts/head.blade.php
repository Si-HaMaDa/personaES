<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
{{-- <html lang="{{app('l')}}" dir="{{app('dir')}}"> --}}
  <html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>@if(!empty(setting()->sitename_en)){{setting()->sitename_en}}||@endif{{!empty($title)?$title:trans('admin.dashboard')}}</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

          <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Roboto:wght@400;700&display=swap">
        <!-- Font Awesome Stylesheet -->
        <link rel="stylesheet" href="{{url('frontend')}}/dist/css/vendor/all.min.css">
        <!-- Bootstrap Stylesheet -->
        <link rel="stylesheet" href="{{url('frontend')}}/dist/css/vendor/bootstrap.min.css">
        <!-- Slick css Stylesheet -->
        <link rel="stylesheet" href="{{url('frontend')}}/dist/css/vendor/slick.css">
        <link rel="stylesheet" href="{{url('frontend')}}/dist/css/vendor/slick-theme.css">
        <!-- Main stylesheet -->
        <link rel="stylesheet" href="{{url('frontend')}}/dist/css/scss/main.css">

        @if(!empty(setting()->icon))
        <link rel="shortcut icon" href="{{ it()->url(setting()->icon) }}" />
        @endif
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <!-- END CORE PLUGINS -->
    </head>
    <!-- END HEAD -->
    <body>
      
