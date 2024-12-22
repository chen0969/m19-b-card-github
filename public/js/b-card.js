// consts
// cards editors
const $bCardsHeader = document.getElementById('bCards-header');
const $bCardsMain = document.getElementById('bCards-main');
const $bCardsFooter = document.getElementById('bCards-footer')

// socail btns
const $socialBtns = document.getElementById('socialBtns');
const $socialPicker = document.getElementById('socialPicker');

// img btns
const $avatarPicker = document.getElementById('avatarPicker');
const $avatarEdit = document.getElementById('avatarEdit');

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

function socialPicker_lunch() {
    $socialBtns.addEventListener('click', (e) => {
        if (e.target.classList.contains('bi')) {
            e.preventDefault();
            $socialPicker.style.display = 'flex';
            $socialPicker.setAttribute('data-status', 'show');
        } else {
            $socialPicker.style.display = 'none';
            $socialPicker.setAttribute('data-status', 'none');
        }
    })
}
socialPicker_lunch();

function avatorPicker_lunch(){
    $avatarEdit.addEventListener('click', (e)=>{
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
        }
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