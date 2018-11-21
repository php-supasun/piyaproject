// validation script here
const inputs = document.querySelectorAll('input');

const patterns = {
    username: /^[A-Za-z_]{1}[\w]{4,11}$/,
    name: /^[A-Za-z_]{1}[\w]{4,50}$/,
    password: /^[\w@-]{8,20}$/,
    confirmPassword: /^[\w@-]{8,20}$/
};

function validate(field, regex) {
    if (regex.test(field.value)) {
        field.classList.remove("invalid");
        field.classList.remove("valid");
        field.className += ' valid';
    } else {
        field.classList.remove("invalid");
        field.classList.remove("valid");
        field.className += ' invalid';
    }
}
inputs.forEach((input) => {
    input.addEventListener('keyup', (e) => {
        console.log(e.target.attributes.name.value);
        validate(e.target, patterns[e.target.attributes.name.value])
    });
});