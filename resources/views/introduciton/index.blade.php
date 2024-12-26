@extends('layouts.sbadmin-guest')

@section('content')
<!-- social media section -->
<div id="socialBtns-personal" class="row justify-content-center">
    <div class="col-md-12 w-75 pt-3">
        <div class="row g-2 justify-content-around">
            <button class="col-3">
                <a href="{{ Auth::user()->line }}"><i class="bi bi-line c-socialSection__icon text-white" data-btn_status="show"></i></a>
            </button>
            <button class="col-3">
                <a href="{{ Auth::user()->fb }}"><i class="bi bi-facebook c-socialSection__icon text-white" data-btn_status="show"></i></a>
            </button>
        </div>
    </div>
</div>

<!-- self intro -->
<div class="row justify-content-center">
    <div class="c-sections col-12 mt-3 d-flex flex-column align-items-center justify-content-center">
        <div id="description-display" class="c-sections p-3 animate__animated animate__fadeIn">
            <div class="c-sections__tagline">
                <h5 class="c-sections__title text-center">自我介紹</h5>
            </div>
            <div class="c-sections__textarea">
                {{ Auth::user()->description }}
            </div>
        </div>
    </div>
</div>

<!-- contact info -->
<div class="row justify-content-center">
    <div class="c-sections col-12 mt-3 d-flex flex-column align-items-center justify-content-center">
        <div id="contact-display" class="c-sections p-3 animate__animated animate__fadeIn">
            <div class="c-sections__tagline">
                <h5 class="c-sections__title text-center">聯絡資訊</h5>
            </div>
            <div class="c-sections__textarea d-flex justify-content-center">
                <ul class="w-75 pt-3">
                    <li class="d-flex flex-row fs-1"><i class="bi bi-telephone-fill"></i>
                        <p>phone:</p>
                        <p>{{ Auth::user()->phone }}</p>
                    </li>
                    <li class="d-flex flex-row fs-1"><i class="bi bi-envelope-fill"></i>
                        <p>email:</p>
                        <p class="text-break">{{ Auth::user()->email }}</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- company -->
<div class="row justify-content-center">
    <div class="c-sections col-12 mt-3 d-flex flex-column align-items-center justify-content-center">
        <div id="company-display" class="c-sections p-3 animate__animated animate__fadeIn">
            <div class="c-sections__tagline">
                <h5 class="c-sections__title text-center">營運公司</h5>
            </div>
            <div class="c-sections__textarea d-flex flex-column align-items-center justify-content-center mt-3">
                <h5>公司名稱:</h5>
                <h4 class="c-sections__companyName fs-2 m-2">Company name here</h4>
                <h5>公司簡介:</h5>
                <h4>Company discription here
                </h4>
                <hr class="c-sections__hr">
                <h5>公司社群:</h5>
                <div class="container">
                    <div class="row g-3 justify-content-around">
                        <button class="col-3">
                            <i class="bi bi-plus-circle-dotted c-socialSection__iconDark socialBtns-company"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection