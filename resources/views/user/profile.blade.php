@extends('layouts.sbadmin')

@section('content')
<!-- social media section -->
<div id="socialBtns-personal" class="row justify-content-center">
    <div class="col-md-12 w-75 pt-3">
        <div class="row g-2 justify-content-around">
            @forelse ($Data['user']->socialbtns as $key => $value)
            @foreach ($value->getAttributes() as $column => $columnValue)
            @if (!in_array($column, ['id', 'user_id', 'created_at', 'updated_at']))
            {!! $columnValue !!}
            @endif
            @endforeach
            @empty
            @endforelse
            <button class="col-3">
                <a href="#"><i class="bi bi-plus-circle-dotted c-socialSection__icon text-white" data-btn_status="show"></i></a>
            </button>
        </div>
    </div>
</div>

<!-- scoial picker personal -->
<form id="socialPicker-personal" style="display: none;" class="container c-socialBtnPicker animate__animated animate__slideInUp animate__faster" data-status="none" method="POST" action="{{ route('update-social-btn') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row c-socialBtnPicker__card overflow-scroll h-75">
        <label for="bg_color" class="col-12 fs-3 text-center">Arrange your social media accounts</label>
        <div class="row gy-3">
            @forelse ($Data['user']->socialbtns as $key => $value)
            @foreach ($value->getAttributes() as $column => $columnValue)
            @if (!in_array($column, ['id', 'user_id', 'other', 'created_at', 'updated_at']))
            @php
            preg_match('/href=["\']?([^"\'>]+)["\']?/', $columnValue, $matches);
            $href = $matches[1] ?? null;
            @endphp
            <i class="col-2 bi bi-{{ $column }} c-socialSection__icon"></i>
            <input type="text" class="col-10 c-socialBtnPicker__input" name="{{ $column }}" value="{{ $href }}">
            @elseif($column == 'other')
            @php
            preg_match('/href=["\']?([^"\'>]+)["\']?/', $columnValue, $matches);
            $href = $matches[1] ?? null;
            @endphp
            <i class="col-2 bi bi-wordpress c-socialSection__icon"></i>
            <input type="text" class="col-10 c-socialBtnPicker__input" name="{{ $column }}" value="{{ $href }}">
            @endif
            @endforeach
            @empty
            <p>empty</p>
            @endforelse
        </div>
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
                    <button type="submit" class="c-sections__btn__edit"><i class="bi bi-check2-circle" data-section="description-edit"></i></button>
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
                    <button type="submit" class="c-sections__btn__edit"><i class="bi bi-check2-circle" data-section="contact-edit"></i></button>
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
@forelse ($Data['user']->companies as $key => $value)
<div class="row justify-content-center">
    <div class="c-sections col-12 mt-3 d-flex flex-column align-items-center justify-content-center">
        <div id="company-show-{{$value->id}}" class="c-sections p-3 animate__animated animate__fadeIn" data-status="show">
            <div class="c-sections__tagline">
                <h5 class="c-sections__title text-center">營運公司</h5>
                <i onclick="cInfoLuncher('{{ $value->id }}')" class="bi bi-pencil c-sections__btn" data-section="company"></i>
            </div>
            <div class="c-sections__textarea d-flex flex-column align-items-center justify-content-center mt-3">
                <h5>公司名稱:</h5>
                <h4 class="c-sections__companyName fs-2 m-2">{{$value->company_name}}</h4>
                <h5>公司簡介:</h5>
                <h4>{{$value->company_description}}</h4>
                <hr class="c-sections__hr">
                <!-- company social media show -->
                <div id="company-social-show-{{$value->id}}" class="container" style="display: block;" data-status="show">
                    <div class="row">
                        <h5 class="col-12 text-center">公司社群:</h5>
                    </div>
                    <div class="row g-3 justify-content-around">
                        @foreach ($value->getAttributes() as $column => $columnValue)
                        @if (!in_array($column, ['id', 'user_id', 'company_name', 'company_description', 'created_at', 'updated_at']))
                        {!! $columnValue !!}
                        @endif
                        @endforeach
                        <button class="col-3">
                            <i onclick="cSLuncher('{{ $value->id }}')" class="bi bi-plus-circle-dotted c-socialSection__iconDark socialBtns-company"></i>
                        </button>
                    </div>
                </div>
                <!-- social picker -->
                <form id="company-social-form-{{$value->id}}" style="display: none;" class="container flex-column animate__animated animate__slideInUp" data-status="none" method="POST" action="{{ route('update-company-social') }}" enctype="multipart/form-data">
                    <div class="row g-2">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $value->id }}">
                        @foreach ($value->getAttributes() as $column => $columnValue)
                        @if (!in_array($column, ['id', 'user_id', 'company_name', 'company_description', 'other', 'created_at', 'updated_at']))
                        @php
                        preg_match('/href=["\']?([^"\'>]+)["\']?/', $columnValue, $matches);
                        $href = $matches[1] ?? null;
                        @endphp
                        <i class="col-2 bi bi-{{ $column }} c-socialSection__icon"></i>
                        <input type="text" class="col-10 c-socialBtnPicker__input" name="{{ $column }}" value="{{ $href }}">
                        @elseif($column == 'other')
                        @php
                        preg_match('/href=["\']?([^"\'>]+)["\']?/', $columnValue, $matches);
                        $href = $matches[1] ?? null;
                        @endphp
                        <i class="col-2 bi bi-wordpress c-socialSection__icon"></i>
                        <input type="text" class="col-10 c-socialBtnPicker__input" name="{{ $column }}" value="{{ $href }}">
                        @endif
                        @endforeach
                    </div>
                    <div class="row pt-5 justify-content-evenly">
                        <button class="col-5 btn btn-secondary" type="button" data-role="cancel">關閉</button>
                        <button class="col-5 btn btn-secondary" type="submit">更新</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- company input -->
        <div id="company-input-{{$value->id}}" class="c-sections p-3 animate__animated animate__bounce" style="display: none;" data-status="none">
            <form class="c-sections" method="POST" action="{{ route('update-company') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $value->id }}">
                <div class="c-sections__tagline">
                    <h5 class="c-sections__title__edit text-center">營運公司</h5>
                    <button type="submit" class="c-sections__btn__edit"><i class="bi bi-check2-circle" data-section="company-edit"></i></button>
                </div>
                <div class="c-sections__textarea__edit d-flex flex-column align-items-center justify-content-center mt-3">
                    <h5>公司名稱:</h5>
                    <input type="text" value="{{$value->company_name}}" name="company_name">
                    <h5>公司簡介:</h5>
                    <input type="text" value="{{$value->company_description}}" name="company_description">
                    <hr class="c-sections__hr">
                </div>
            </form>
        </div>
    </div>
</div>
@empty
@endforelse

<!-- add company -->
<div id="newCompany" class="c-sections p-3 animate__animated animate__bounce" style="display: none;" data-status="none">
    <form class="c-sections" method="POST" action="{{ route('add-company') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <!-- connect the user -->
        <div class="mb-3" style="display:none">
            <input type="text" value="{{ Auth::user()->id }}" name="uid" class="form-control" readonly>
        </div>
        <div class="c-sections__tagline">
            <h5 class="c-sections__title__edit text-center">營運公司</h5>
            <button type="submit" class="c-sections__btn__edit"><i class="bi bi-check2-circle" data-section="company-edit"></i></button>
        </div>
        <div class="c-sections__textarea__edit d-flex flex-column align-items-center justify-content-center mt-3">
            <h5>公司名稱:</h5>
            <input type="text" value="{{ old('company_name') }}" name="company_name">
            <h5>公司簡介:</h5>
            <input type="text" value="{{ old('company_description') }}" name="company_description">
            <hr class="c-sections__hr">
            <div class="container">
                <div class="row justify-content-evenly p-3">
                    <button class="col-4 btn btn-secondary" type="button" data-role="cancel">關閉</button>
                    <button class="col-4 btn btn-secondary" type="submit">更新</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- add section btn-->
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


<!-- company js function -->
<script>
    const cSLuncher = (csfNumber) => {
        const cSShow = document.getElementById(`company-social-show-${csfNumber}`);
        const cSForm = document.getElementById(`company-social-form-${csfNumber}`);
        if (cSForm.dataset.status.includes('none') && cSShow.dataset.status.includes('show')) {
            cSForm.style.display = 'flex';
            cSForm.setAttribute('data-status', 'show');
            cSShow.style.display = 'none';
            cSShow.setAttribute('data-status', 'none');
            const cancelForm_company = ($form) => {
                $form.addEventListener('click', (e) => {
                    if (e.target.dataset.role.includes('cancel')) {
                        cSForm.style.display = 'none';
                        cSForm.setAttribute('data-status', 'none');
                        cSShow.style.display = 'block';
                        cSShow.setAttribute('data-status', 'show');
                    }
                })
            }
            cancelForm_company(cSForm);
        }
    };
    const cInfoLuncher = (csfNumber) => {
        const cInfoShow = document.getElementById(`company-show-${csfNumber}`);
        const cInfoForm = document.getElementById(`company-input-${csfNumber}`);
        if (cInfoForm.dataset.status.includes('none') && cInfoShow.dataset.status.includes('show')) {
            cInfoForm.style.display = 'flex';
            cInfoForm.setAttribute('data-status', 'show');
            cInfoShow.style.display = 'none';
            cInfoShow.setAttribute('data-status', 'none');
        }
    };
</script>
@endsection