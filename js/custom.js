'use strict';
let name = document.querySelector('#name'),
    surname = document.querySelector('#surname'),
    line = document.querySelectorAll('.line'),
    mail = document.querySelector('#email'),
    wrongName = document.createElement('span'),
    wrongSurname = document.createElement('span'),
    wrongMail = document.createElement('span');

wrongName.style.fontWeight = '700';
wrongSurname.style.fontWeight = '700';
wrongMail.style.fontWeight = '700';

    name.addEventListener('input', () => {
    if( name.value.length < 2) {
        wrongName.style.color = 'red';
        wrongName.textContent = 'Very short name';
        line[0].appendChild(wrongName);
    } else {
        wrongName.style.color = 'green';
        wrongName.textContent = 'ok';
        line[0].appendChild(wrongName);
    }
});
surname.addEventListener('input', () => {
    if( surname.value.length < 2) {
        wrongSurname.style.color = 'red';
        wrongSurname.textContent = 'Very short surname';
        line[1].appendChild(wrongSurname);
    } else {
        wrongSurname.style.color = 'green';
        wrongSurname.textContent = 'ok';
        line[1].appendChild(wrongSurname);
    }
});

mail.addEventListener("input", () => {
    let symbols = /^[\w-\.]+@[\w-]+\.[a-z]{2,4}$/i;
    if (symbols.test(mail.value) === false) {
        wrongMail.style.color = 'red';
        wrongMail.textContent = 'Are you sure?';
        line[11].appendChild(wrongMail);
    } else {
        wrongMail.style.color = 'green';
        wrongMail.textContent = 'ok';
        line[11].appendChild(wrongMail);
    }
});
