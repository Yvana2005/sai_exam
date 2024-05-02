<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/ico" href="{{asset('/images/logo/'. $setting->favicon)}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">
    <!-- Admin Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.css')}}">
    <link rel="stylesheet" href="{{asset('css/skin-black.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontawesome-iconpicker.min.css')}}">
    <!-- Select 2 -->
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
    <!-- DataTable -->
    <link rel="stylesheet" href="{{asset('css/datatables.min.css')}}">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <!--[if IE]>
    <link rel="shortcut icon" href="/favicon.ico" type="image/vnd.microsoft.icon">
    <![endif]-->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{$setting->welcome_txt}}</title>

    <!-- Styles -->
    @yield('head')

</head>
<body class="hold-transition skin-black sidebar-mini">
    <div id="app" style="position: relative;">
        @yield('top_bar')
        @yield('content')
        <br>
        <br>
    </div>
    @php
     $ct = App\copyrighttext::where('id','=',1)->first();
    @endphp
   <div style="padding:0px;color:#fff;background-color:#8b008b; position:fixed; width: 100%; bottom: 0;">
        <div class="container" >
            <div class="row">
                <div class="col-md-6">
                    {{ $ct->name }}
                </div>
                <div class="col-md-6">
                    @php
                    $si = App\SocialIcons::all();
                    @endphp
                    @foreach($si as $s)
                    @if($s->status==1)
                        <a target="_blank" title="Visit {{ $s->title }}" href="{{ $s->url }}"><img width="32px" src="{{ asset('images/socialicons/'.$s->icon) }}" alt="{{ $s->title }}" title="{{ $s->title }}" style="margin-top:-5px;"></a>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
<script src="{{asset('js/jquery.min.js')}}"></script>

<!-- Bootstrap 3.3.7 -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- DataTable -->
<script src="{{asset('js/datatables.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('js/select2.full.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/adminlte.min.js')}}"></script>

<script src="{{asset('js/fontawesome-iconpicker.min.js')}}"></script>


<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
