
const pword = document.getElementById('password');
const email = document.getElementById('uname');
// const uname = document.getElementById('uname');
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

    if (passval.length<=6){
        setError(pword,'Password should be atleast 6 characters long.')
    }else{
        setSuccess(pword);
    }

    if(emval == '' | emval == null){
        setError(uname,'Email should not be empty.')
    }
    else{
        setSuccess(uname)
    }

}