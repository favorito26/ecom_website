function send_message(){
    var name = $("#name").val();
    var email = $("#email").val();
    var mobile = $("#mobile").val();
    var comment = $("#comment").val();

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
    else if(comment == ""){
        alert("Please enter the comment");
        return;
    }
    else{
        $.ajax({
            url: 'send_message.php',
            type: 'POST',
            data: 'name=' + name + '&email=' + email + '&mobile=' + mobile + '&comment=' + comment,
            success: function(result){
                alert(result);
            }
        });
    }
}
