// consts
const $bCard = document.getElementById('bCard');

// array

const forms = ['name', 'description', 'contact']

//single form for single string
function stringEditor($form) {
    $bCard.addEventListener('click', (event) => {
        if (event.target.dataset.section.includes($form)) {
            console.log(event.target);
            const form_dispaly = document.getElementById($form + '-display');
            const form_input = document.getElementById($form + '-input');
            form_dispaly.style.display = 'none';
            form_input.style.display = 'flex';
        }
        else if (event.target.dataset.section.includes($form + '-edit')) {
            console.log(event.target);
            const form_dispaly = document.getElementById($form + '-display');
            const form_input = document.getElementById($form + '-input');
            form_dispaly.style.display = 'flex';
            form_input.style.display = 'none';
        }
    })
}
stringEditor(forms[0]);
stringEditor(forms[1]);
stringEditor(forms[2]);
