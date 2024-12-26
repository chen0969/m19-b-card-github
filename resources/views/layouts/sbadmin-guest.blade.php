<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Match19 b-card</title>
    <!-- animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- bootstrap icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- bootstrap cdn-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- broccoli style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('scss_convert/broccoli_style.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="container" style="background-color: {{ Auth::user()->bg_color }}">
    <header id="bCards-header" class="row">
        <!-- hero banner & home btn -->
        <div class="col-12 p-0">
            <div class="c-banner__header" style="background-image: url('{{asset('uploads/images/default-banner.jpg')}}') ;">
                <a href="{{url('/')}}"><i class="bi bi-house-door c-banner__white"></i></a>
            </div>
        </div>
        <!-- profile portrait -->
        <div class="col-12 d-flex flex-column align-items-center justify-content-center">
            <a id="avatarEdit" href="#" data-toggle="modal" data-target="#edit-avatar">
                @if(!is_null(Auth::user()->avatar))
                <img class="c-banner__portrait" src="{{ url('/') . '/uploads/' . Auth::user()->avatar }}" alt="avatar">
                @else
                <img class="c-banner__portrait" src="{{ url('/') . '/uploads/images/portrait.png'}}" alt="avatar">
                @endif
            </a>
        </div>
        <!-- user name -->
        <div class="c-section col-12 mt-3 d-flex flex-column align-items-center justify-content-center">
            <div id="name-display" class="c-sections__tagline animate__animated animate__fadeIn">
                <h5 class="c-sections__title text-center">{{ Auth::user()->name }}</h5>
            </div>
        </div>
    </header>
    <main id="bCards-main" class="mt-3">
        @yield('content')
    </main>
    <footer id="bCards-footer" class="sticky-footer row">
        <div class="c-settings col-12 d-flex flex-column-reverse">
            <a class="d-flex" href="{{asset('/user/profile')}}"><i id="settingToggler" class="c-settings__icon p-2 bi bi-bookmarks-fill text-center" data-role="settingToggler"></i></a>
            <div id="settingContent" class="c-settings__content animate__animated animate__slideInUp animate__faster" style="display: none;" data-status="none">
                <i id="profileBtn" class="c-settings__icon p-2 bi bi bi-person-fill-gear text-center"></i>
                <i id="bookmarkBtn" class="c-settings__icon p-2 bi bi-bookmarks-fill text-center"></i>
            </div>
        </div>
        <!-- copy right -->
        <p class="copyright text-center my-auto text-white">
            Copyright &copy; Match19 2024
        </p>
    </footer>
    <!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>

</html>