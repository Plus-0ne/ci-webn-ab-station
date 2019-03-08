$(document).ready(function(){
    $("#submit").click(function(){


        var Email_Address = $('#Email_Address').val();
        var Password = $('#Password').val();
        var csrf = $("input[name=csrf_test_name]").val();
        // var dataString = 'Email_Address1='+ Email_Address + '&Password1='+ Password ;
        if(Email_Address==""||Password=="")
        {

         var response = $('<div class="alert alert-warning alert-dismissible fade show animated heartBeat" role="alert"><strong> Opsss! </strong> Input Email and Password! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
         $("#loginMessage").html(response).show();
         window.location.reload();
     }
     else
     {
        $.ajax(
        {
            type: "POST",
            url: 'Login_Validation',
            data: {
                Email_Address1 : Email_Address ,
                Password1 : Password ,
                'csrf_test_name' : csrf
            },
            cache: false,
            success: function(result)
            {
                if (result == 'OK')
                {
                 var response = $('<div class="alert alert-success alert-dismissible fade animated heartBeat show" role="alert"><strong> Welcome! </strong> User validation successful. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                 $("#loginMessage").html(response).show();
                 window.location.replace("Home");
             }else if (result == 'WRONG PASSWORD') 
             {
                var response = $('<div class="alert alert-danger alert-dismissible fade animated heartBeat show" role="alert"><strong>Awww!</strong> Wrong password. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                $("#loginMessage").html(response).show();
                window.location.reload();
            }
            else if (result == 'EMAIL NOT FOUND') 
            {
                var response = $('<div class="alert alert-danger alert-dismissible fade animated heartBeat show" role="alert"><strong>Awww!</strong> Incorrect Email. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                $("#loginMessage").html(response).show();
                window.location.reload();
            }
            else
            {
             var response = $('<div class="alert alert-danger alert-dismissible fade animated heartBeat show" role="alert"><strong>Awww!</strong> Wrong credentials. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
             $("#loginMessage").html(response).show();
             window.location.reload();
         }
     }
 });
    }
    return false;
});
});
