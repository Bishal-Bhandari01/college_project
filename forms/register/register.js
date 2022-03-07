const pword = document.getElementById('password');
const email = document.getElementById('email');
const uname = document.getElementById('username');
const form = document.getElementById('form');

form.addEventListener('submit', (e) => {
    e.preventDefault();
    validation();
});

const setSuccess=(element) =>{
    const inputControl = element.parentElement;
    const errordisplay = inputControl.querySelector('.em');

    errordisplay.innerText = '';

    inputControl.classList.add('success');
    inputControl.classList.remove('error');

}

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errordis = inputControl.querySelector('.em');

    errordis.innerText = message;

    inputControl.classList.add('error');
    inputControl.classList.remove('success');

}

const validation = () => {

    const passval = pword.value.trim();
    const emval = email.value.trim();
    const unval = uname.value.trim();

    if(unval == '' | unval === null){
        setError(uname,'Fill the username field')
    }
    else{
        setSuccess(uname)
    }

    if (passval == '' || passval === null){
        setError(pword,'Fill the password field');
    }
    else if (passval.length<=6){
        setError(pword,'Password should be atleast 6 characters long.')
    }
    else{
        setSuccess(pword);
    }

    if(emval == '' | emval === null){
        setError(uname,'Email should not be empty.')
    }
    else{
        setSuccess(uname)
    }

}