<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ isset($title) ? $title . ' | ' : '' }}KAIMOOK</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css" integrity="sha512-f8mUMCRNrJxPBDzPJx3n+Y5TC5xp6SmStstEfgsDXZJTcxBakoB5hvPLhAfJKa9rCvH+n3xpJ2vQByxLk4WP2g==" crossorigin="anonymous" />
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/components.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        <link rel="stylesheet" href="{{ asset('css/common.css') }}">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
        <script src="{{ asset('/js/common.js') }}"></script>
    </head>

    <!-- <body class="sidebar-gone"> -->
    <body>
        <div id="app">
            <div class="main-wrapper">
                <!-- <div class="navbar-bg"></div> -->
                <!-- <nav class="navbar navbar-expand-lg main-navbar">
                    <form class="form-inline mr-auto">
                        <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                        </ul>
                    </form>
                </nav> -->

                <!-- サイドバー　-->
                <div class="main-sidebar">
                    <aside id="sidebar-wrapper">
                        <div class="sidebar-brand">
                            <a href="index.html">kaimook</a>
                        </div>
                        <div class="sidebar-brand sidebar-brand-sm">
                            <a href="index.html">St</a>
                        </div>
                        <ul class="sidebar-menu">
                            <li class="menu-header">Dashboard</li>
                            <li class="dropdown">
                                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>ダッシュボード</span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="/admin/goals">General Dashboard</a></li>
                                    <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
                                </ul>
                            </li>
                            <li class="menu-header">レポート</li>
                            <li class="dropdown active">
                                <!-- <a href="#" class="nav-link"><i class="fas fa-columns"></i> <span>目標の確認と編集</span></a> -->
                                <ul class="">
                                    <li class=active><a class="nav-link" href="{{ route('back.reports.index') }}">一覧</a></li>
                                    <li class=active><a class="nav-link" href="{{ route('back.reports.create') }}">新規作成</a></li>
                                </ul>
                            </li>

                            <li class="menu-header">目標</li>
                            <li class="dropdown active">
                                <!-- <a href="#" class="nav-link"><i class="fas fa-columns"></i> <span>目標の確認と編集</span></a> -->
                                <ul class="">
                                    <li class=active><a class="nav-link" href="{{ route('back.goals.index') }}">週間目標</a></li>
                                </ul>
                            </li>

                            <li class="menu-header">Stisla</li>
                            <li class="dropdown">
                                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Components</span></a>
                                <ul class="dropdown-menu">
                                <li><a class="nav-link" href="/admin/goals">Article</a></li>
                                <li><a class="nav-link" href="components-chat-box.html">Chat Box</a></li>
                                <li><a class="nav-link" href="components-gallery.html">Gallery</a></li>
                                <li><a class="nav-link" href="components-multiple-upload.html">Multiple Upload</a></li>
                                <li><a class="nav-link" href="components-statistic.html">Statistic</a></li>
                                <li><a class="nav-link" href="components-tab.html">Tab</a></li>
                                <li><a class="nav-link" href="components-table.html">Table</a></li>
                                <li><a class="nav-link" href="components-user.html">User</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Forms</span></a>
                                <ul class="dropdown-menu">
                                <li><a class="nav-link" href="forms-advanced-form.html">Advanced Form</a></li>
                                <li><a class="nav-link" href="forms-editor.html">Editor</a></li>
                                <li><a class="nav-link" href="forms-validation.html">Validation</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="nav-link has-dropdown"><i class="fas fa-map-marker-alt"></i> <span>Google Maps</span></a>
                                <ul class="dropdown-menu">
                                <li><a href="gmaps-advanced-route.html">Advanced Route</a></li>
                                <li><a href="gmaps-draggable-marker.html">Draggable Marker</a></li>
                                <li><a href="gmaps-geocoding.html">Geocoding</a></li>
                                <li><a href="gmaps-geolocation.html">Geolocation</a></li>
                                <li><a href="gmaps-marker.html">Marker</a></li>
                                <li><a href="gmaps-multiple-marker.html">Multiple Marker</a></li>
                                <li><a href="gmaps-route.html">Route</a></li>
                                <li><a href="gmaps-simple.html">Simple</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="nav-link has-dropdown"><i class="fas fa-plug"></i> <span>Modules</span></a>
                                <ul class="dropdown-menu">
                                <li><a class="nav-link" href="modules-calendar.html">Calendar</a></li>
                                <li><a class="nav-link" href="modules-chartjs.html">ChartJS</a></li>
                                <li><a class="nav-link" href="modules-datatables.html">DataTables</a></li>
                                <li><a class="nav-link" href="modules-flag.html">Flag</a></li>
                                <li><a class="nav-link" href="modules-font-awesome.html">Font Awesome</a></li>
                                <li><a class="nav-link" href="modules-ion-icons.html">Ion Icons</a></li>
                                <li><a class="nav-link" href="modules-owl-carousel.html">Owl Carousel</a></li>
                                <li><a class="nav-link" href="modules-sparkline.html">Sparkline</a></li>
                                <li><a class="nav-link" href="modules-sweet-alert.html">Sweet Alert</a></li>
                                <li><a class="nav-link" href="modules-toastr.html">Toastr</a></li>
                                <li><a class="nav-link" href="modules-vector-map.html">Vector Map</a></li>
                                <li><a class="nav-link" href="modules-weather-icon.html">Weather Icon</a></li>
                                </ul>
                            </li>
                            <li class="menu-header">Pages</li>
                            <li class="dropdown">
                                <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Auth</span></a>
                                <ul class="dropdown-menu">
                                <li><a href="auth-forgot-password.html">Forgot Password</a></li> 
                                <li><a href="auth-login.html">Login</a></li> 
                                <li><a href="auth-register.html">Register</a></li> 
                                <li><a href="auth-reset-password.html">Reset Password</a></li> 
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="nav-link has-dropdown"><i class="fas fa-exclamation"></i> <span>Errors</span></a>
                                <ul class="dropdown-menu">
                                <li><a class="nav-link" href="errors-503.html">503</a></li> 
                                <li><a class="nav-link" href="errors-403.html">403</a></li> 
                                <li><a class="nav-link" href="errors-404.html">404</a></li> 
                                <li><a class="nav-link" href="errors-500.html">500</a></li> 
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="nav-link has-dropdown"><i class="fas fa-bicycle"></i> <span>Features</span></a>
                                <ul class="dropdown-menu">
                                <li><a class="nav-link" href="features-activities.html">Activities</a></li>
                                <li><a class="nav-link" href="features-post-create.html">Post Create</a></li>
                                <li><a class="nav-link" href="features-posts.html">Posts</a></li>
                                <li><a class="nav-link" href="features-profile.html">Profile</a></li>
                                <li><a class="nav-link" href="features-settings.html">Settings</a></li>
                                <li><a class="nav-link" href="features-setting-detail.html">Setting Detail</a></li>
                                <li><a class="nav-link" href="features-tickets.html">Tickets</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i> <span>Utilities</span></a>
                                <ul class="dropdown-menu">
                                <li><a href="utilities-contact.html">Contact</a></li>
                                <li><a class="nav-link" href="utilities-invoice.html">Invoice</a></li>
                                <li><a href="utilities-subscribe.html">Subscribe</a></li>
                                </ul>
                            </li>
                            <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i> <span>Credits</span></a></li>
                        </ul>
                        <div class="p-3 mt-4 mb-4 hide-sidebar-mini">
                        <a href="documentation.html" class="btn btn-primary btn-lg btn-icon-split btn-block">
                            <i class="far fa-question-circle"></i> <div>Documentation</div>
                        </a>
                        </div>
                    </aside>
                </div>
                <!-- Main Content -->
                <div class="main-content">
                    <section class="section">
                        <div class="section-body">
                            <x-back.alert />
                            @yield('content')
                        </div>
                    </section>
                </div>
                <footer class="main-footer">
                    <div class="footer-left">
                        Copyright © 2021 <div class="bullet"></div> kaimook All rights received.</a>
                    </div>
                </footer>   
            </div>
        </div>
        <!-- <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ route('back.dashboard') }}">
                        管理画面
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false">
                        <span class="navbar-toggler-icon"></span>
                    </button>
        
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item"><a class="nav-link" href="{{ route('back.dashboard') }}">ダッシュボード</a></li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" onClick="(function(){
                                    document.getElementById('logout-form').submit();
                                    return false;
                                })();">ログアウト</a>
                                {{ Form::open(['route' => 'logout', 'id' => 'logout-form']) }}
                                {{ Form::close() }}
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <main class="py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <x-back.alert />

                                @yield('content')

                        </div>
                    </div>
                </div>
            </main>
        </div> -->
        <input type="hidden" id="loading" name="loading" value="{{ asset('/img/loading.gif') }}">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
        <script src="{{ asset('/js/stisla.js') }}"></script>
        <script src="{{ asset('/js/scripts.js') }}"></script>
        <script src="{{ asset('/js/custom.js') }}"></script>    
    </body>
    </html>