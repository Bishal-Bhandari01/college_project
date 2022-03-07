const pword = document.getElementById('password');
const email = document.getElementById('email');
const form = document.getElementById('form');

form.addEventListener('submit', (e) => {
    e.preventDefault();
    validation();
});

const setSuccess=(element) =>{
    const inputControl = element.parentElement;
    inputControl.classList.add('success');
    inputControl.classList.remove('error');

}

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errordis = inputControl.querySelector('email');

    errordis.innerText = message;

    inputControl.classList.add('error');
    inputControl.classList.remove('success');

}

const validation = () => {

    const passval = pword.value.trim();
    const emval = email.value.trim();

    if(passval =='' | passval === null){
        setError(pword,'Password should not be empty.');
    }
    else if (passval.length<=6){
        setError(pword,'Password should be atleast 6-13 characters long.')
    }else{
        setSuccess(pword);
    }

    if(emval == '' | emval == null){
        setError(emval,'Email should not be empty.')
    }
    else{
        setSuccess(emval)
    }

}