"use strict"

function validateInfoConn(event){
    event.preventDefault()
    let isValid = true;

    let username = document.getElementById("user");
    let password = document.getElementById("pass");

    let msgErr= document.getElementById("pass");
    //reset
    msgErr.innerText = "";

    if( username.innerText === "" && username.innerText === undefined ){
        msgErr.innerText =  msgErr.innerText + "unvalid username";
        isValid = false;
    }

    if( password.innerText === "" && password.innerText === undefined ){
        msgErr.innerText =  msgErr.innerText + "  unvalid password";
        isValid = false;
    }

    if(isValid){
        msgErr.innerText = "";
        return true;
    }else {

        return false;
    }

}

function validateInfoRegister(event){

    event.preventDefault()
    let isValid = true;

    let username = document.getElementById("user1");
    let password1 = document.getElementById("pass1");
    let password2 = document.getElementById("pass2");

    let msgErr= document.getElementById("pass");
    //reset
    msgErr.innerText = "";

    if( username.innerText === "" && username.innerText === undefined ){
        msgErr.innerText =  msgErr.innerText + " unvalid username";
        isValid = false;
    }

    if( password1.innerText === "" && password1.innerText === undefined ){
        msgErr.innerText =  msgErr.innerText + " unvalid password";
        isValid = false;
    }

    if( password2.innerText === "" && password2.innerText === undefined ){
        msgErr.innerText =  msgErr.innerText + " unvalid password";
        isValid = false;
    }

    if( password1.innerText ===  password2.innerText){
        msgErr.innerText =  msgErr.innerText + " passwords are different";
        isValid = false;
    }

    if(isValid){
        msgErr.innerText = "";
        return true;
    }else {

        return false;
    }

}