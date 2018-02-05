function validate() {
    let fname=document.forms["register"]["username"].value;
    let fsurname=document.forms["register"]["usersurname"].value;
    let flogin=document.forms["register"]["login"].value;
    let fpassword=document.forms["register"]["password"].value;
    let fpasswordConfirm = document.forms["register"]["passwordconfirm"].value; // !!!
    //let checkLogin = "<?php echo $phpVar ?>";

    if (fname.length === 0) {
        document.getElementById("nameError").innerHTML="*Required field";
        document.getElementById("userName").style.borderColor = 'red';
        return false;
    } else if (fsurname.length === 0) {
        document.getElementById("surnameError").innerHTML="*Required field";
        document.getElementById("userSurname").style.borderColor = 'red';
        return false;
    } else if (flogin.length === 0) {
        document.getElementById("loginError").innerHTML="*Required field";
        document.getElementById("userLogin").style.borderColor = 'red';
        return false;
    } else if (fpassword.length === 0) {
        document.getElementById("passwordError").innerHTML="*Required field";
        document.getElementById("userPassword").style.borderColor = 'red';
        return false;
    } else if (fpasswordConfirm.length === 0) {
        document.getElementById("passwordConfirmError").innerHTML="*Required field";
        document.getElementById("userPasswordConfirm").style.borderColor = 'red';
        return false;
    }
    // else if (flogin === checkLogin){ // !!!
    //     document.getElementById("loginError").innerHTML="*The selected login is already in use. Please select another one.";
    //     document.getElementById("userLogin").style.borderColor = 'red';
    //     return false;
    // }
    else if (fpassword !== fpasswordConfirm) {
        document.getElementById("passwordConfirmError").innerHTML="*Password confirmation does not match";
        document.getElementById("userPasswordConfirm").style.borderColor = 'red';
        return false;
    }
}

function clearForm() {
    document.getElementById("userName").style.borderColor = '#4d6a79';
    document.getElementById("userSurname").style.borderColor = '#4d6a79';
    document.getElementById("userLogin").style.borderColor = '#4d6a79';
    document.getElementById("userPassword").style.borderColor = '#4d6a79';
    document.getElementById("userPasswordConfirm").style.borderColor = '#4d6a79';

    document.getElementById("nameError").innerHTML="";
    document.getElementById("surnameError").innerHTML="";
    document.getElementById("loginError").innerHTML="";
    document.getElementById("passwordError").innerHTML="";
    document.getElementById("passwordConfirmError").innerHTML="";

}

function clearNameField() {
    document.getElementById("userName").style.borderColor = '#4d6a79';
    document.getElementById("nameError").innerHTML="";
}

function clearSurnameField() {
    document.getElementById("userSurname").style.borderColor = '#4d6a79';
    document.getElementById("surnameError").innerHTML="";
}

function clearLoginField() {
    document.getElementById("userLogin").style.borderColor = '#4d6a79';
    document.getElementById("loginError").innerHTML="";
}

function clearPasswordField() {
    document.getElementById("userPassword").style.borderColor = '#4d6a79';
    document.getElementById("passwordError").innerHTML="";
}

function clearPasswordConfirmField() {
    document.getElementById("userPasswordConfirm").style.borderColor = '#4d6a79';
    document.getElementById("passwordConfirmError").innerHTML="";
}

function validateLoginForm() {
    let flogin=document.forms["login"]["login"].value;
    let fpassword=document.forms["login"]["password"].value;

    if (flogin.length === 0) {
        document.getElementById("loginError").innerHTML="*Required field";
        document.getElementById("userLogin").style.borderColor = 'red';
        return false;
    } else if (fpassword.length === 0) {
        document.getElementById("passwordError").innerHTML="*Required field";
        document.getElementById("userPassword").style.borderColor = 'red';
        return false;
    }
}