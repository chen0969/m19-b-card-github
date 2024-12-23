// consts
// cards editors
const $bCardsHeader = document.getElementById('bCards-header');
const $bCardsMain = document.getElementById('bCards-main');
const $bCardsFooter = document.getElementById('bCards-footer')

// socail btns
const $socialBtnP = document.getElementById('socialBtns-personal');
const $socialPickerP = document.getElementById('socialPicker-personal');
const $socialBtnC = document.querySelectorAll('.socialBtns-company');
const $socialPickerC = document.getElementById('socialPicker-company');

// new company
const $newCompanyBtn = document.getElementById('newCompanyBtn');
const $newCompany = document.getElementById('newCompany');

// img btns
const $avatarPicker = document.getElementById('avatarPicker');
const $avatarEdit = document.getElementById('avatarEdit');
const $bannerPicker = document.getElementById('bannerPicker');
const $bannerEdit = document.getElementById('bannerEdit');

// footer btns
const $settingToggler = document.getElementById('settingToggler');
const $profileBtn = document.getElementById('profileBtn');
const $bookmarkBtn = document.getElementById('bookmarkBtn');
const $settingContent = document.getElementById('settingContent');

// array
const forms = ['name', 'description', 'contact', 'company']

// main functions

//single form for single string
function stringEditor($form) {
    // header
    $bCardsHeader.addEventListener('click', (event) => {
        const section = event.target.dataset.section;
        if (section && section.includes($form)) {
            console.log(event.target);
            const form_display = document.getElementById($form + '-display');
            const form_input = document.getElementById($form + '-input');
            form_display.style.display = 'none';
            form_input.style.display = 'flex';
        } else if (section && section.includes($form + '-edit')) {
            console.log(event.target);
            const form_display = document.getElementById($form + '-display');
            const form_input = document.getElementById($form + '-input');
            form_display.style.display = 'flex';
            form_input.style.display = 'none';
        }
    });
    // main
    $bCardsMain.addEventListener('click', (event) => {
        const section = event.target.dataset.section;
        if (section && section.includes($form)) {
            console.log(event.target);
            const form_display = document.getElementById($form + '-display');
            const form_input = document.getElementById($form + '-input');
            form_display.style.display = 'none';
            form_input.style.display = 'flex';
        } else if (section && section.includes($form + '-edit')) {
            console.log(event.target);
            const form_display = document.getElementById($form + '-display');
            const form_input = document.getElementById($form + '-input');
            form_display.style.display = 'flex';
            form_input.style.display = 'none';
        }
    });
}

for (i = 0; i < forms.length; i++) {
    stringEditor(forms[i]);
}


// pickers

// cancel form
function cancelForm($form){
    $form.addEventListener('click', (e)=>{
        if(e.target.dataset.role.includes('cancel')){
            $form.style.display = 'none';
            $form.setAttribute('data-status', 'none');
        }
    })
}

// social btn functions

function socialPicker_personal_lunch() {
    $socialBtnP.addEventListener('click', (e) => {
        if (e.target.classList.contains('bi')) {
            e.preventDefault();
            $socialPickerP.style.display = 'flex';
            $socialPickerP.setAttribute('data-status', 'show');
        } else {
            $socialPickerP.style.display = 'none';
            $socialPickerP.setAttribute('data-status', 'none');
        };
        cancelForm($socialPickerP);
    })
}
socialPicker_personal_lunch();

function socialPicker_company_lunch() {
    $socialBtnC.forEach(button => {
        button.addEventListener('click', (e) => {
            if (e.target.classList.contains('bi')) {
                e.preventDefault();
                $socialPickerC.style.display = 'flex';
                $socialPickerC.setAttribute('data-status', 'show');
            } else {
                $socialPickerC.style.display = 'none';
                $socialPickerC.setAttribute('data-status', 'none');
            }
            cancelForm($socialPickerC);
        });
    });
}
socialPicker_company_lunch();

function avatorPicker_lunch(){
    $avatarEdit.addEventListener('click', ()=>{
        if ($avatarPicker.dataset.status.includes('none')) {
            $avatarPicker.style.display = 'flex';
            $avatarPicker.setAttribute('data-status', 'show');
        } else if ($avatarPicker.dataset.status.includes('show')) {
            $avatarPicker.style.display = 'none';
            $avatarPicker.setAttribute('data-status', 'none');
        };
        cancelForm($avatarPicker);
    })
}
avatorPicker_lunch();

function bannerPicker_lunch(){
    $bannerEdit.addEventListener('click', ()=>{
        if ($bannerPicker.dataset.status.includes('none')) {
            $bannerPicker.style.display = 'flex';
            $bannerPicker.setAttribute('data-status', 'show');
        } else if ($bannerPicker.dataset.status.includes('show')) {
            $bannerPicker.style.display = 'none';
            $bannerPicker.setAttribute('data-status', 'none');
        };
        cancelForm($bannerPicker);
    })
}
bannerPicker_lunch();

function newCompany_lunch(){
    $newCompanyBtn.addEventListener('click', ()=>{
        if ($newCompany.dataset.status.includes('none')) {
            $newCompany.style.display = 'flex';
            $newCompany.setAttribute('data-status', 'show');
        } else if ($newCompany.dataset.status.includes('show')) {
            $newCompany.style.display = 'none';
            $newCompany.setAttribute('data-status', 'none');
        };
        cancelForm($newCompany);
    })
}
newCompany_lunch();

// footer setting btns
function footerSetting() {
    $settingToggler.addEventListener('click', () => {
        if ($settingContent.dataset.status.includes('none')) {
            $settingContent.style.display = 'flex';
            $settingContent.setAttribute('data-status', 'show');
            bg_color_change();
        } else {
            $settingContent.style.display = 'none';
            $settingContent.setAttribute('data-status', 'none');
        }
    })
}
footerSetting();

// sub functions
function bg_color_change() {
    const $bgBtn = document.getElementById('bgBtn');
    const $bgColorPicker = document.getElementById('bgColorPicker');
    $bgBtn.addEventListener('click', () => {
        if ($bgColorPicker.dataset.status.includes('none')) {
            $bgColorPicker.style.display = 'flex';
            $bgColorPicker.setAttribute('data-status', 'show');
        } else {
            $bgColorPicker.style.display = 'none';
            $bgColorPicker.setAttribute('data-status', 'none');
        };
        cancelForm($bgColorPicker);
    })
}

// fetch test (use bookmark btn)
function fetchtest() {
    $bookmarkBtn.addEventListener('click', async function () {
        const response = await fetch('http://127.0.0.1:8000/user/get');
        const [userInfo] = await response.json();
        const test = unserialize(userInfo.companies_array);
        console.log(test);
    })
}
fetchtest();