$("#login-div").hide();
$("#register-div").hide();
$("#wyloguj").hide();

function ShowOrHide(value){
    if (value == 0){
        $("#login-div").show();
        $("#register-div").hide();
    }else if (value == 1){
        $("#login-div").hide();
        $("#register-div").show();
    }else if (value == 2){
        $("#login-div").hide();
        $("#register-div").hide();
    }
}

function loggedHide(val){
    if (val == 1){
        $("#akcje").hide();
        $("#wyloguj").show();
    }
}