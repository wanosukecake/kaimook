<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        <title></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css" integrity="sha512-f8mUMCRNrJxPBDzPJx3n+Y5TC5xp6SmStstEfgsDXZJTcxBakoB5hvPLhAfJKa9rCvH+n3xpJ2vQByxLk4WP2g==" crossorigin="anonymous" />
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/components.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    </head>

    <body class="sidebar-gone">
    <div id="app">
        <div class="main-wrapper">
            <!-- <div class="navbar-bg"></div> -->
            <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                </ul>
                <!-- <div class="search-element">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                </div> -->
            </form>
            <!-- <ul class="navbar-nav navbar-right">
                <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
                <div class="dropdown-menu dropdown-list dropdown-menu-right">
                    <div class="dropdown-header">Notifications
                    <div class="float-right">
                        <a href="#">Mark All As Read</a>
                    </div>
                    </div>
                    <div class="dropdown-list-content">
                    <a href="#" class="dropdown-item dropdown-item-unread">
                        <img alt="image" src="../dist/img/avatar/avatar-1.png" class="rounded-circle dropdown-item-img">
                        <div class="dropdown-item-desc">
                        <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                        <div class="time">10 Hours Ago</div>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item dropdown-item-unread">
                        <img alt="image" src="../dist/img/avatar/avatar-2.png" class="rounded-circle dropdown-item-img">
                        <div class="dropdown-item-desc">
                        <b>Ujang Maman</b> has moved task <b>Fix bug footer</b> to <b>Progress</b>
                        <div class="time">12 Hours Ago</div>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item dropdown-item-unread">
                        <img alt="image" src="../dist/img/avatar/avatar-3.png" class="rounded-circle dropdown-item-img">
                        <div class="dropdown-item-desc">
                        <b>Agung Ardiansyah</b> has moved task <b>Fix bug sidebar</b> to <b>Done</b>
                        <div class="time">12 Hours Ago</div>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item">
                        <img alt="image" src="../dist/img/avatar/avatar-4.png" class="rounded-circle dropdown-item-img">
                        <div class="dropdown-item-desc">
                        <b>Ardian Rahardiansyah</b> has moved task <b>Fix bug navbar</b> to <b>Done</b>
                        <div class="time">16 Hours Ago</div>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item">
                        <img alt="image" src="../dist/img/avatar/avatar-5.png" class="rounded-circle dropdown-item-img">
                        <div class="dropdown-item-desc">
                        <b>Alfa Zulkarnain</b> has moved task <b>Add logo</b> to <b>Done</b>
                        <div class="time">Yesterday</div>
                        </div>
                    </a>
                    </div>
                    <div class="dropdown-footer text-center">
                    <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                </li>
                <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="../dist/img/avatar/avatar-1.png" width="30" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, Ujang Maman</div></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-title">Logged in 5 min ago</div>
                    <a href="features-profile.html" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                    </a>
                    <a href="features-activities.html" class="dropdown-item has-icon">
                    <i class="fas fa-bolt"></i> Activities
                    </a>
                    <a href="features-settings.html" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Settings
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </div>
                </li>
            </ul> -->
            </nav>

            <!-- サイドバー　-->
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                    <a href="index.html">メニュー</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                    <a href="index.html">St</a>
                    </div>
                    <ul class="sidebar-menu">
                    <li class="menu-header">Dashboard</li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>ダッシュボード</span></a>
                        <ul class="dropdown-menu">
                        <li><a class="nav-link" href="dashboard-general.html">General Dashboard</a></li>
                        <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
                        </ul>
                    </li>
                    <li class="menu-header">Starter</li>
                    <li class="dropdown active">
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Layout</span></a>
                        <ul class="dropdown-menu">
                        <li class=active><a class="nav-link" href="layout-default.html">Default Layout</a></li>
                        <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
                        <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
                        </ul>
                    </li>

                    <li class="menu-header">Stisla</li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Components</span></a>
                        <ul class="dropdown-menu">
                        <li><a class="nav-link" href="components-article.html">Article</a></li>
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
                @yield('content')
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright © 2021 <div class="bullet"></div> kaimook All rights received.</a>
                </div>
            </footer>
        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{ asset('/js/stisla.js') }}"></script>
    <script src="{{ asset('/js/scripts.js') }}"></script>
    <script src="{{ asset('/js/custom.js') }}"></script>
    </body>
</html>