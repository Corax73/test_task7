const Reg = document.getElementById('regBtn');
const Login = document.getElementById('loginBtn');
const FormReg = document.getElementById('formReg');

const ControlRegForm = () => {
    let click = false;
    Reg.addEventListener('click', function(e) {
        if (!click) {
            FormReg.style.display = 'block';
            click = true;
            e.preventDefault();
        } else if (click) {
            FormReg.style.display = 'none';
            click = false;
            e.preventDefault();
        }
    });
}

const init = () => {
    ControlRegForm();
}

init();