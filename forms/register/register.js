const pword = document.getElementById('password');
const email = document.getElementById('email');
const uname = document.getElementById('username');
const form = document.getElementById('form');

form.addEventListener('submit', (e) => {
    e.preventDefault();
    validation();
});
const validation = () => {

    const passval = pword.value.trim();
    const emval = email.value.trim();
    const unval = uname.value.trim();

    if(unval == '' | unval === null){
        alert("Username should not be empty.");
    }

    if (passval == '' || passval === null){
        alert("Password field should not be empty.");
    }
    else if (passval.length<=6){
        alert("Password should be more than 6 characters long.");
    }

    if(emval == '' | emval === null){
        alert("Email should not be empty.");
    }
}