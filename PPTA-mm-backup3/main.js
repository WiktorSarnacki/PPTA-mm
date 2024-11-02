$("#login-div").hide();
$("#register-div").hide();
$("#wyloguj").hide();
$("#addProduct-div").hide();


function ShowOrHide(value){
    if (value == 0){
        $("#login-div").show();
        $("#register-div").hide();
        $("#addProduct-div").hide();
    }else if (value == 1){
        $("#login-div").hide();
        $("#register-div").show();
        $("#addProduct-div").hide();
    }else if (value == 2){
        $("#login-div").hide();
        $("#register-div").hide();
        $("#addProduct-div").hide();
    }else if (value == 3){
        $("#addProduct-div").show();
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
