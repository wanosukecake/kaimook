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
        @stack('css')
        <script src="{{ asset('/js/libraries/jquery-3.6.0.js') }}"></script>
        <script src="{{ asset('/js/libraries/jquery.nicescroll.min.js') }}"></script>
        <script src="{{ asset('/js/libraries/bootstrap.min.js') }}"></script>
        <script src="{{ mix('/js/app.js') }}"></script>
        <script src="{{ asset('/js/common.js') }}"></script>
        @stack('js')
    </head>

    <body>
        <div id="app">
            <div class="main-wrapper">
                <!-- サイドバー　-->
                <div class="main-sidebar">
                    <aside id="sidebar-wrapper">
                        <div class="sidebar-brand">
                            <a href="{{ route('back.dashboard') }}">kaimook</a>
                        </div>
                        <div class="sidebar-brand sidebar-brand-sm">
                            <a href="index.html">St</a>
                        </div>
                        <ul class="sidebar-menu">
                            <li class="menu-header">ダッシュボード</li>
                            <li class="dropdown active">
                                <ul>
                                    <li><a class="nav-link" href="{{ route('back.dashboard') }}">ダッシュボード</a></li>
                                </ul>
                            </li>
                            <li class="menu-header">レポート</li>
                            <li class="dropdown active">
                                <ul>
                                    <li><a class="nav-link" href="{{ route('back.reports.index') }}">一覧</a></li>
                                    <li><a class="nav-link" href="{{ route('back.reports.create') }}">新規作成</a></li>
                                </ul>
                            </li>
                            <li class="menu-header">目標</li>
                            <li class="dropdown active">
                                <ul class="">
                                    <li class=active><a class="nav-link" href="{{ route('back.goals.index') }}">週間目標</a></li>
                                </ul>
                            </li>
                        </ul>
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
        <div class="loading">
            <i class="fas fa-spinner fa-5x fa-spin"></i>
        </div>
    </body>
</html>