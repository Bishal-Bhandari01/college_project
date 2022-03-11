const pword = document.getElementById('password');
const email = document.getElementById('uname');
const form = document.getElementById('form');

form.addEventListener('submit', (e) => {
    e.preventDefault();
    validation();
});
const validation = () => {
    const passwordvalue = pword.value.trim();
    const emailvalue = email.value.trim();
    
    if (passwordvalue.length<=6){
        alert('Password should be atleast 6 characters long.');
    }else if(passwordvalue == '' || passwordvalue == null){
        alert('Password should not be empty.');
    }

    if(emailvalue == '' || emailvalue == null){
        alert('Email should not be empty.');
    }
}