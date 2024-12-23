@extends('layouts.sbadmin')

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
            <button class="col-3">
                <a href="#"><i class="bi bi-plus-circle-dotted c-socialSection__icon text-white" data-btn_status="show"></i></a>
            </button>
        </div>
    </div>
</div>

<!-- scoial picker personal -->
<form id="socialPicker-personal" style="display: none;" class="container c-socialBtnPicker animate__animated animate__slideInUp animate__faster" data-status="none" method="POST" action="" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row c-socialBtnPicker__card">
        <label for="bg_color" class="col-12 fs-3 text-center">Arrange your social media accounts</label>
        <div class="row">
            <i class="col bi bi-line c-socialSection__icon" data-btn_status="pick"></i>
            <i class="col bi bi-facebook c-socialSection__icon" data-btn_status="pick"></i>
            <i class="col bi bi-instagram c-socialSection__icon c-socialSection__icon__hide" data-btn_status="hide"></i>
            <i class="col bi bi-twitter-x c-socialSection__icon c-socialSection__icon__hide" data-btn_status="hide"></i>
            <i class="col bi bi-linkedin c-socialSection__icon c-socialSection__icon__hide" data-btn_status="hide"></i>
            <i class="col bi bi-discord c-socialSection__icon c-socialSection__icon__hide" data-btn_status="hide"></i>
            <i class="col bi bi-pinterest c-socialSection__icon c-socialSection__icon__hide" data-btn_status="hide"></i>
            <i class="col bi bi-threads-fill c-socialSection__icon c-socialSection__icon__hide" data-btn_status="hide"></i>
            <i class="col bi bi-tiktok c-socialSection__icon c-socialSection__icon__hide" data-btn_status="hide"></i>
            <i class="col bi bi-youtube c-socialSection__icon c-socialSection__icon__hide" data-btn_status="hide"></i>
            <i class="col bi bi-wechat c-socialSection__icon c-socialSection__icon__hide" data-btn_status="hide"></i>
            <i class="col bi bi-whatsapp c-socialSection__icon c-socialSection__icon__hide" data-btn_status="hide"></i>
        </div>
        <input type="text" id="bg-color" class="col-12 c-socialBtnPicker__input" name="bg_color" value="test">
        <div class="row justify-content-evenly p-3">
            <button class="col-4 btn btn-secondary" type="button" data-role="cancel">關閉</button>
            <button class="col-4 btn btn-secondary" type="submit">更新</button>
        </div>
    </div>
</form>

<!-- self intro -->
<div class="row justify-content-center">
    <div class="c-sections col-12 mt-3 d-flex flex-column align-items-center justify-content-center">
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
    <div class="c-sections col-12 mt-3 d-flex flex-column align-items-center justify-content-center">
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
                        <p class="text-break">{{ Auth::user()->email }}</p>
                    </li>
                </ul>
            </div>
        </div>
        <!-- input -->
        <div id="contact-input" class="c-sections p-3 animate__animated animate__bounce" style="display: none;">
            <form class="c-sections" method="POST" action="{{ route('update-contact') }}" enctype="multipart/form-data">
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
    <div class="c-sections col-12 mt-3 d-flex flex-column align-items-center justify-content-center">
        <div id="company-display" class="c-sections p-3 animate__animated animate__fadeIn">
            <div class="c-sections__tagline">
                <h5 class="c-sections__title text-center">營運公司</h5>
                <i class="bi bi-pencil c-sections__btn" data-section="company"></i>
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
                            <i id="socialBtn-company" class="bi bi-plus-circle-dotted c-socialSection__iconDark"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- input -->
        <div id="company-input" class="c-sections p-3 animate__animated animate__bounce" style="display: none;">
            <form class="c-sections" method="POST" action="{{ route('update-name') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="c-sections__tagline">
                    <h5 class="c-sections__title__edit text-center">營運公司</h5>
                    <button type="submit"><i class="bi bi-check2-circle c-sections__btn__edit" data-section="company-edit"></i></button>
                </div>
                <div class="c-sections__textarea__edit d-flex flex-column align-items-center justify-content-center mt-3">
                    <h5>公司名稱:</h5>
                    <input type="text" value="{{ Auth::user()->company_name }}" name="company_name">
                    <h5>公司簡介:</h5>
                    <input type="text" value="{{ Auth::user()->company_description }}" name="company_description">
                    <hr class="c-sections__hr">
                    <h5>公司社群:</h5>
                    <div class="container">
                        <div class="row g-3 justify-content-around">
                            <button class="col-3">
                                <i id="socialBtn-company" class="bi bi-plus-circle-dotted c-socialSection__iconDark"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- scoial picker company -->
<form id="socialPicker-company" style="display: none;" class="container c-socialBtnPicker animate__animated animate__slideInUp animate__faster" data-status="none" method="POST" action="" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row c-socialBtnPicker__card">
        <label for="bg_color" class="col-12 fs-3 text-center">Arrange your social media accounts</label>
        <div class="row">
            <i class="col bi bi-line c-socialSection__icon" data-btn_status="pick"></i>
            <i class="col bi bi-facebook c-socialSection__icon" data-btn_status="pick"></i>
            <i class="col bi bi-instagram c-socialSection__icon c-socialSection__icon__hide" data-btn_status="hide"></i>
            <i class="col bi bi-twitter-x c-socialSection__icon c-socialSection__icon__hide" data-btn_status="hide"></i>
            <i class="col bi bi-linkedin c-socialSection__icon c-socialSection__icon__hide" data-btn_status="hide"></i>
            <i class="col bi bi-discord c-socialSection__icon c-socialSection__icon__hide" data-btn_status="hide"></i>
            <i class="col bi bi-pinterest c-socialSection__icon c-socialSection__icon__hide" data-btn_status="hide"></i>
            <i class="col bi bi-threads-fill c-socialSection__icon c-socialSection__icon__hide" data-btn_status="hide"></i>
            <i class="col bi bi-tiktok c-socialSection__icon c-socialSection__icon__hide" data-btn_status="hide"></i>
            <i class="col bi bi-youtube c-socialSection__icon c-socialSection__icon__hide" data-btn_status="hide"></i>
            <i class="col bi bi-wechat c-socialSection__icon c-socialSection__icon__hide" data-btn_status="hide"></i>
            <i class="col bi bi-whatsapp c-socialSection__icon c-socialSection__icon__hide" data-btn_status="hide"></i>
        </div>
        <input type="text" id="bg-color" class="col-12 c-socialBtnPicker__input" name="bg_color" value="test">
        <div class="row justify-content-evenly p-3">
            <button class="col-4 btn btn-secondary" type="button" data-role="cancel">關閉</button>
            <button class="col-4 btn btn-secondary" type="submit">更新</button>
        </div>
    </div>
</form>

<!-- add company -->
<div id="newCompany" class="c-sections p-3 animate__animated animate__bounce" style="display: none;" data-status="none">
    <form class="c-sections" method="POST" action="{{ route('update-name') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="c-sections__tagline">
            <h5 class="c-sections__title__edit text-center">營運公司</h5>
            <button type="submit"><i class="bi bi-check2-circle c-sections__btn__edit" data-section="company-edit"></i></button>
        </div>
        <div class="c-sections__textarea__edit d-flex flex-column align-items-center justify-content-center mt-3">
            <h5>公司名稱:</h5>
            <input type="text" value="{{ Auth::user()->company_name }}" name="company_name">
            <h5>公司簡介:</h5>
            <input type="text" value="{{ Auth::user()->company_description }}" name="company_description">
            <hr class="c-sections__hr">
            <h5>公司社群:</h5>
            <div class="container">
                <div class="row g-3 justify-content-around">
                    <button class="col-3">
                        <i id="socialBtn-company" class="bi bi-plus-circle-dotted c-socialSection__iconDark"></i>
                    </button>
                </div>
            </div>
            <div class="container">
                <div class="row justify-content-evenly p-3">
                    <button class="col-4 btn btn-secondary" type="button" data-role="cancel">關閉</button>
                    <button class="col-4 btn btn-secondary" type="submit">更新</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- add section -->
<div class="row justify-content-center">
    <div class="col-12 mt-3 p-3 animate__animated animate__fadeIn d-flex flex-column align-items-center justify-content-center">
        <div class="c-addSection">
            <h6 class="col-12 text-center fs-2 mt-3">營運公司</h6>
            <div class="col-12 text-center">
                <i id="newCompanyBtn" class="bi bi-plus text-center c-addSection__icon"></i>
            </div>
        </div>
    </div>
</div>
@endsection