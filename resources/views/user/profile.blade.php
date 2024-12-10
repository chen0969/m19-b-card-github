@extends('layouts.sbadmin')

@section('content')
<!-- details -->
<div class="row justify-content-center">
    <!-- social media section -->
    <div class="col-md-12 w-75 pt-3">
        <div class="row g-2">
            <button class="col">
                <a href="{{ Auth::user()->line }}"><i class="bi bi-line c-socialSection__icon text-white"></i></a>
            </button>
            <button class="col">
                <a href="{{ Auth::user()->fb }}"><i class="bi bi-facebook c-socialSection__icon text-white"></i></a>
            </button>
            <button class="col">
                <a href="{{ Auth::user()->ig }}"><i class="bi bi-instagram c-socialSection__icon text-white"></i></a>
            </button>
            <button class="col">
                <a href="{{ Auth::user()->fb }}"><i class="bi bi-twitter-x c-socialSection__icon text-white"></i></a>
            </button>
        </div>
    </div>
</div>

<!-- self intro -->
<div class="row justify-content-center">
    <div class="c-section col-12 mt-3 d-flex flex-column align-items-center justify-content-center">
        <div id="description-display" class="c-sections p-3 animate__animated animate__fadeIn">
            <div class="c-sections__tagline">
                <h5 class="c-sections__title text-center">自我介紹</h5>
                <i class="bi bi-pencil c-sections__btn" data-section="description"></i>
            </div>
            <div class="c-sections__textarea">
                {{ Auth::user()->description }}
            </div>
        </div>
        <!-- input -->
        <div id="description-input" class="c-sections p-3 animate__animated animate__bounce" style="display: none;">
            <form class="c-sections" method="POST" action="{{ route('update-description') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="c-sections__tagline">
                    <h5 class="c-sections__title__edit text-center">自我介紹</h5>
                    <button type="submit"><i class="bi bi-check2-circle c-sections__btn__edit" data-section="description-edit"></i></button>
                </div>
                <textarea class="c-sections__textarea__edit" rows="13" name="description">{{ Auth::user()->description }}</textarea>
            </form>
        </div>
    </div>
</div>

<!-- contact info -->
<div class="row justify-content-center">
    <div class="c-section col-12 mt-3 d-flex flex-column align-items-center justify-content-center">
        <div id="contact-display" class="c-sections p-3 animate__animated animate__fadeIn">
            <div class="c-sections__tagline">
                <h5 class="c-sections__title text-center">聯絡資訊</h5>
                <i class="bi bi-pencil c-sections__btn" data-section="contact"></i>
            </div>
            <div class="c-sections__textarea d-flex justify-content-center">
                <ul class="w-75 pt-3">
                    <li class="d-flex flex-row fs-1"><i class="bi bi-telephone-fill"></i>
                        <p>phone:</p>
                        <p>{{ Auth::user()->phone }}</p>
                    </li>
                    <li class="d-flex flex-row fs-1"><i class="bi bi-envelope-fill"></i>
                        <p>email:</p>
                        <p>{{ Auth::user()->email }}</p>
                    </li>
                </ul>
            </div>
        </div>
        <!-- input -->
        <div id="contact-input" class="c-sections p-3 animate__animated animate__bounce" style="display: none;">
            <form class="c-sections" method="POST" action="{{ route('update-name') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="c-sections__tagline">
                    <h5 class="c-sections__title__edit text-center">聯絡資訊</h5>
                    <button type="submit"><i class="bi bi-check2-circle c-sections__btn__edit" data-section="contact-edit"></i></button>
                </div>
                <div class="c-sections__textarea__edit d-flex justify-content-center">
                    <ul class="w-75 pt-3">
                        <li class="d-flex flex-row fs-1"><i class="bi bi-telephone-fill"></i>
                            <p>phone:</p>
                            <input type="text" value="{{ Auth::user()->phone }}" name="phone">
                        </li>
                        <li class="d-flex flex-row fs-1"><i class="bi bi-envelope-fill"></i>
                            <p>email:</p>
                            <input type="text" value="{{ Auth::user()->email }}" name="email">
                        </li>
                    </ul>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- company -->
<div class="row justify-content-center">
    <div class="c-section col-12 mt-3 d-flex flex-column align-items-center justify-content-center">
        <div id="contact-display" class="c-sections p-3 animate__animated animate__fadeIn">
            <div class="c-sections__tagline">
                <h5 class="c-sections__title text-center">營運公司</h5>
                <i class="bi bi-pencil c-sections__btn" data-section="company"></i>
            </div>
            <div class="c-sections__textarea d-flex flex-column align-items-center justify-content-center mt-3">
                <h5>公司名稱:</h5>
                <h4 class="c-sections__companyName fs-2 m-2">{{ Auth::user()->company_name }}</h4>
                <h5>公司簡介:</h5>
                <h4>{{ Auth::user()->company_description }}</h4>
                <hr class="c-sections__hr">
                <h5>公司社群:</h5>
                <div class="container">
                    <div class="row g-3">
                        <button class="col">
                            <a href="{{ Auth::user()->line }}"><i class="bi bi-line c-socialSection__icon text-white"></i></a>
                        </button>
                        <button class="col">
                            <a href="{{ Auth::user()->fb }}"><i class="bi bi-facebook c-socialSection__icon text-white"></i></a>
                        </button>
                        <button class="col">
                            <a href="{{ Auth::user()->ig }}"><i class="bi bi-instagram c-socialSection__icon text-white"></i></a>
                        </button>
                        <button class="col">
                            <a href="{{ Auth::user()->fb }}"><i class="bi bi-twitter-x c-socialSection__icon text-white"></i></a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- input -->
        <div id="contact-input" class="c-sections p-3 animate__animated animate__bounce" style="display: none;">
            <form class="c-sections" method="POST" action="{{ route('update-name') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="c-sections__tagline">
                    <h5 class="c-sections__title__edit text-center">營運公司</h5>
                    <button type="submit"><i class="bi bi-check2-circle c-sections__btn__edit" data-section="company-edit"></i></button>
                </div>
                <div class="c-sections__textarea__edit d-flex justify-content-center">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- add section -->
<div class="row justify-content-center">
    <div class="col-12 mt-3 p-3 animate__animated animate__fadeIn d-flex flex-column align-items-center justify-content-center">
        <div class="c-addSection">
            <h6 class="col-12 text-center fs-2 mt-3">營運公司</h6>
            <div class="col-12 text-center">
                <i class="bi bi-plus text-center c-addSection__icon"></i>
            </div>
        </div>
    </div>
</div>
@endsection