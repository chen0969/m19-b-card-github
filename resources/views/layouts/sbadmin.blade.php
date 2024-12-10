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
</head>

<body id="bCard" class="l-bg container">
    <header class="row">
        <!-- hero banner & home btn -->
        <div class="col-12">
            <div class="c-banner__header pt-3 pl-3" style="background-image: url('{{asset('uploads/images/hero-banner.jpg')}}') ;">
                <i class="bi bi-house-door o-whiteBtn"></i>
            </div>
            <div class="c-banner__footer pr-3">
                <i class="bi bi-pencil text-white c-sections__edit"></i>
            </div>
        </div>
        <!-- profile portrait -->
        <div class="col-12 d-flex flex-column align-items-center justify-content-center">
            <a href="#" data-toggle="modal" data-target="#edit-avatar">
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
                <i class="bi bi-pencil c-sections__btn" data-section="name"></i>
            </div>
            <!-- input -->
            <form style="display: none;" id="name-input" class="c-sections__tagline animate__animated animate__bounce" method="POST" action="{{ route('update-name') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input class="c-sections__title__edit text-center" type="text" name="name" value="{{ Auth::User()->name }}" required>
                <button type="submit"><i class="bi bi-check2-circle c-sections__btn__edit" data-section="name-edit"></i></button>
            </form>
        </div>
    </header>
    <main class="mt-3">
        @yield('content')
    </main>
    <footer class="sticky-footer bg-white row">
        <div class="copyright text-center my-auto">
            Copyright &copy; 行家在線有限公司 2024
        </div>
    </footer>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('sb-admin/vendor/jquery/jquery.min.js') }}"></script>
    <!-- TinyMce editor-->
    <!-- <script src="{{ asset('vendor/laravel-admin-ext/tinymce/tinymce/tinymce.min.js')  }}"></script> -->
    <!-- custome js -->
    <script src="{{ asset('js/b-card.js') }}"></script>
</body>

</html>