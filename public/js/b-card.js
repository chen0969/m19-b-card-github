// consts
// cards editors
const $bCardsHeader = document.getElementById('bCards-header');
const $bCardsMain = document.getElementById('bCards-main');
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
// footer setting btns
function footerSetting() {
    $settingToggler.addEventListener('click', (event) => {
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
