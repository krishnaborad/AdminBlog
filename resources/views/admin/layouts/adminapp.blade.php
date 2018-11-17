<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CRM</title>
    <link rel="shortcut icon" type="image/png" href="{{url('favicon.png')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Muhammad Usman">

    <!-- The styles -->
    <link  href="{{url('css/bootstrap-cerulean.min.css')}}" rel="stylesheet">
    <link href="{{url('css/charisma-app.css')}}" rel="stylesheet">
    <link href="{{url('bower_components/fullcalendar/dist/fullcalendar.css')}}" rel='stylesheet'>
    <link href="{{url('bower_components/fullcalendar/dist/fullcalendar.print.css')}}" rel='stylesheet' media='print'>
    <link href="{{url('bower_components/chosen/chosen.min.css')}}" rel='stylesheet'>
    <link href="{{url('bower_components/colorbox/example3/colorbox.css')}}" rel='stylesheet'>
    <link href="{{url('bower_components/responsive-tables/responsive-tables.css')}}" rel='stylesheet'>
    <link href="{{url('bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css')}}" rel='stylesheet'>
    <link href="{{url('css/jquery.noty.css')}}" rel='stylesheet'>
    <link href="{{url('css/noty_theme_default.css')}}" rel='stylesheet'>
    <link href="{{url('css/elfinder.min.css')}}" rel='stylesheet'>
    <link href="{{url('css/elfinder.theme.css')}}" rel='stylesheet'>
    <link href="{{url('css/jquery.iphone.toggle.css')}}" rel='stylesheet'>
    <link href="{{url('css/uploadify.css')}}" rel='stylesheet'>
    <link href="{{url('css/animate.min.css')}}" rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script  src="https://code.jquery.com/jquery-3.3.1.js"  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="  crossorigin="anonymous"></script>
    <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Sweet Alert start -->
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js" ></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" type="text/css">
    <!-- Sweet Alert end -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.0/semantic.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/1.10.16/css/dataTables.semanticui.min.css" rel="stylesheet" type="text/css">
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
    <link rel="shortcut icon" href="{{ url('img/favicon.ico')}}">
    <!-- The fav icon -->
</head>
<body>
    <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/')}}">
                <span><font color="white" size="6">Blog</font></span></a>
            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> {{ Auth::user()->name }}</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="{{ url('admin/profile')}}" class="">Profile</a></li>
                    <li class="divider"></li>
                    <li>

                        <a href="{{ route('logout') }}" class="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                          </form>
                    </li>
                </ul>
            </div>
            <!-- user dropdown ends -->
        </div>
    </div>
    <!-- topbar ends -->
<div class="ch-container">
    <div class="row">
        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">

                    </div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header">Main</li>
                        <li><a class="ajax-link" href="{{ url('admin/university')}}"><span>University</span></a></li>
                        <li>

                            <?php
                                $company = App\setting::where('key','company_options')->first();
                            ?>
                            @if($company->value == 1)
                            <a class="ajax-link"  href="{{ url('admin/companys')}}"> <span>Company</span></a>
                            @endif

                        </li>
                        <li><a class="ajax-link"  href="{{ url('admin/categorys')}}"><span>Category</span></a> </li>
                        <li><a class="ajax-link"  href="{{ url('admin/products')}}"><span> Products</span></a></li>
                        <li><a class="ajax-link"  href="{{ url('admin/type_users')}}"><span> User role</span></a></li>
                        <li><a class="ajax-link"  href="{{ url('admin/users')}}"><span> Customers</span></a></li>
                        <li><a class="ajax-link"  href="{{ url('admin/calendar')}}"><span>Calendar</span></a></li>
                        <li><a class="ajax-link"  href="{{ url('admin/Nationality')}}"><span> Add Nationality</span></a></li>
                        <li><a class="ajax-link"  href="{{ url('admin/upload')}}"><span> Article Upload</span></a></li>

                        <li><a class="ajax-link"  href="{{ url('admin/general')}}"></i><span> General Setting</span></a></li>
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-plus"></i><span> Testing</span></a>
                            <ul class="nav nav-pills nav-stacked">
                              <li><a class="ajax-link"  href="{{ url('admin/pos')}}"><span> POS</span></a></li>
                              <li><a class="ajax-link" href="{{ url('admin/payment')}}"><span>Payment</span></a></li>
                            </ul>
                        </li>

                    </ul>
                    <label id="for-is-ajax" for="is-ajax"><input id="is-ajax" type="checkbox"> Ajax on menu</label>
                </div>
            </div>
        </div>
        <!--/span-->
        <!-- left menu ends -->
        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            @yield('content')
        </div>

    </div>

    </div><!--/#content.col-md-0-->
    </div><!--/fluid-row-->
    <hr>

</div><!--/.fluid-container-->

  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <!-- external javascript -->

  <script src="https://cdn.datatables.net/1.10.16/js/dataTables.semanticui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.0/semantic.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
  <script src="{{asset('bower_components/fullcalendar/dist/fullcalendar.min.js')}}"></script>
  <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('js/jquery.cookie.js')}}"></script>
  <script src="{{ asset('bower_components/moment/min/moment.min.js')}}"></script>
  <script src="{{ asset('bower_components/fullcalendar/dist/fullcalendar.min.js')}}"></script>
  <!-- <script src="{{ asset('js/jquery.dataTables.min.js')}}"></script> -->
  <script src="{{ asset('bower_components/chosen/chosen.jquery.min.js')}}"></script>
  <script src="{{ asset('bower_components/colorbox/jquery.colorbox-min.js')}}"></script>
  <script src="{{ asset('js/jquery.noty.js')}}"></script>
  <script src="{{ asset('bower_components/responsive-tables/responsive-tables.js')}}"></script>
  <script src="{{ asset('bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js')}}"></script>
  <script src="{{ asset('js/jquery.raty.min.js')}}"></script>
  <script src="{{ asset('js/jquery.iphone.toggle.js')}}"></script>
  <script src="{{ asset('js/jquery.autogrow-textarea.js')}}"></script>
  <script src="{{ asset('js/jquery.uploadify-3.1.min.js')}}"></script>
  <script src="{{ asset('js/jquery.history.js')}}"></script>
  <script src="{{ asset('js/charisma.js')}}"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>


         <script type="text/javascript">
             $(document).ready(function()
             {
                 $(".remove").click(function()
                 {
                     if(!confirm("ARE YOU SURE ???"))
                     {
                         return false;
                     }
                 });
             });

           </script>

           <script>
              function goBack() {
                  window.history.back();
              }
            </script>
</body>
</html>
