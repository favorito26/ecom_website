function user_register(){
    var name = $("#name").val();
    var email = $("#email").val();
    var mobile = $("#mobile").val();
    var password = $("#password").val();

    if(name == ""){
        alert("Please enter the name");
        return;
    }
    else if(email == ""){
        alert("Please enter the email");
        return;
    }
    else if(mobile == ""){
        alert("Please enter the mobile number");
        return;
    }
    else if(password == ""){
        alert("Please enter the password");
        return;
    }
    else{
        $.ajax({
            url: 'register_submit.php',
            type: 'POST',
            data: 'name=' + name + '&email=' + email + '&mobile=' + mobile + '&password=' + password,
            success: function(result){
                if(result == 'email_present'){
                    alert("Email already exists");
                }
                else{
                    $("#form-message").html('<div class="text-green-600 font-medium">Thank you for registering</div>');
                    // window.location.href = "login.php";
                }
            }
        });
    }
}