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
            <button id="bannerEdit" class="c-banner__footer">
                <i class="bi bi-pencil text-white c-banner__edit"></i>
            </button>
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
    <main id="bCards-main" class="mt-3">
        @yield('content')
    </main>
    <footer id="bCards-footer" class="sticky-footer row">
        <div class="c-settings col-12 d-flex flex-column-reverse">
            <i id="settingToggler" class="c-settings__icon p-2 bi bi-gear-fill text-center" data-role="settingToggler"></i>
            <div id="settingContent" class="c-settings__content animate__animated animate__slideInUp animate__faster" style="display: none;" data-status="none">
                <i id="profileBtn" class="c-settings__icon p-2 bi bi bi-person-fill-gear text-center"></i>
                <i id="bookmarkBtn" class="c-settings__icon p-2 bi bi-bookmarks-fill text-center"></i>
                <i id="bgBtn" class="c-settings__icon p-2 bi bi-back text-center"></i>
            </div>
        </div>
        <!-- input bg color picker -->
        <form id="bgColorPicker" style="display: none;" class="container c-bgColorPicker animate__animated animate__slideInUp animate__faster" method="POST" action="{{ route('update-bgColor') }}" enctype="multipart/form-data" data-status="none">
            {{ csrf_field() }}
            <div class="row c-bgColorPicker__card">
                <label for="bg_color" class="fs-3 text-center">Select your background color</label>
                <input type="color" id="bg-color" class="c-bgColorPicker__input" name="bg_color" value="{{ Auth::User()->bg_color }}">
                <button type="submit"><i class="bi bi-check2-circle c-sections__btn__edit" data-section="bgColor-edit"></i></button>
                <div class="row justify-content-evenly p-3">
                    <button class="col-4 btn btn-secondary" type="button" data-role="cancel">關閉</button>
                    <button class="col-4 btn btn-secondary" type="submit">更新</button>
                </div>
            </div>
        </form>
        <!-- input portrait-->
        <form id="avatarPicker" style="display: none;" class="c-imgPicker animate__animated animate__slideInUp animate__faster" method="POST" action="{{ route('update-avatar') }}" enctype="multipart/form-data" data-status="none">
            {{ csrf_field() }}
            <div class="c-imgPicker__card container flex-column">
                <div class="row">
                    <h5 class="col-12 text-center">編輯您的頭像</h5>
                    <input style="display: none;" type="text" value="{{ Auth::user()->id }}" name="uid" readonly>
                </div>
                <div class="row align-items-center justify-content-center p-5 g-3">
                    <input class="col-12" type="file" id="imgInp" name="avatar">
                    <img class="col-12" id="blah" src="{{ url('/') . '/uploads/' . Auth::user()->avatar }}" alt="your image" />
                </div>
                <div class="row justify-content-evenly p-3">
                    <button class="col-4 btn btn-secondary" type="button" data-role="cancel">關閉</button>
                    <button class="col-4 btn btn-secondary" type="submit">更新</button>
                </div>
            </div>
        </form>
        <!-- input banner-->
        <form id="bannerPicker" style="display: none;" class="c-imgPicker animate__animated animate__slideInUp animate__faster" method="POST" action="{{ route('update-banner') }}" enctype="multipart/form-data" data-status="none">
            {{ csrf_field() }}
            <div class="c-imgPicker__card container flex-column">
                <div class="row">
                    <h5 class="col-12 text-center">編輯您的背景圖</h5>
                    <input style="display: none;" type="text" value="{{ Auth::user()->id }}" name="uid" readonly>
                </div>
                <div class="row align-items-center justify-content-center p-5 g-3">
                    <input class="col-12" type="file" id="imgInp" name="avatar">
                    <img class="col-12" id="blah" src="{{ url('/') . '/uploads/' . Auth::user()->avatar }}" alt="your image" />
                </div>
                <div class="row justify-content-evenly p-3">
                    <button class="col-4 btn btn-secondary" type="button" data-role="cancel">關閉</button>
                    <button class="col-4 btn btn-secondary" type="submit">更新</button>
                </div>
            </div>
        </form>
        <!-- copy right -->
        <p class="copyright text-center my-auto text-white">
            Copyright &copy; Match19 2024
        </p>
    </footer>
    <!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- custome js -->
    <script src="{{ asset('js/b-card.js') }}"></script>
</body>

</html>