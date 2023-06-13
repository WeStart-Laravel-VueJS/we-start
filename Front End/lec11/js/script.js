let fname     = document.querySelector('#fname');
let lname     = document.querySelector('#lname');
let email     = document.querySelector('#email');
let education = document.querySelector('#education');
let other     = document.querySelector('#other');
let bio       = document.querySelector('#bio');
let emailerr = false;

email.onblur = () => {
    if(email.value.length > 0) {
        var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

        if (email.value.match(validRegex)) {
            email.style.border = '1px solid #c5c5c5'
            emailerr = false;
            r_email.innerHTML = emailerr ? 'Not valid email' : email.value
        }else {
            email.style.border = '1px solid red'
            emailerr = true;
            r_email.innerHTML = emailerr ? 'Not valid email' : email.value
        }
    }
}

education.onchange = () => {
    if(education.value == 'Other') {
        other.style.display = 'block'
    }else {
        other.style.display = 'none'
    }

    r_education.innerHTML = education.value == 'Other' ? other.value : education.value;
}

bio.onkeyup = (e) => {
    // if(e.keyCode == 32) {
        bio.value = bio.value.replace('  ', ' ')
        let len = bio.value.split(' ').length
        if(len > 5) {
            bio.value = bio.value.split(' ').slice(0, 5).join(' ');

            bio.setAttribute('maxlength', bio.value.length)
        }else {
            bio.removeAttribute('maxlength')
        }
    // }
}

let r_name = document.querySelector('.name');
let r_email = document.querySelector('.email');
let r_education = document.querySelector('.education');
let r_bio = document.querySelector('.bio');
let allInputs = document.querySelectorAll('form input, form textarea')

allInputs.forEach(el => {
    el.onkeyup = () => {
        console.log(emailerr);
        r_name.innerHTML = fname.value + ' ' + lname.value
        r_email.innerHTML = emailerr ? 'Not valid email' : email.value
        r_education.innerHTML = education.value == 'Other' ? other.value : education.value
        r_bio.innerHTML = bio.value
    }
})
