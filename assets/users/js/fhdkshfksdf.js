$(document).ready(function(){
    $("#submit").click(function(){
        var Email_Address = $('#Email_Address').val();
        var Password = $('#Password').val();
        // Returns successful data submission message when the entered information is stored in database.
        var dataString = 'Email_Address1='+ Email_Address + '&Password1='+ Password ;
            if(Email_Address==""||Password=="")
            {

               var response = $('<div class="alert alert-warning alert-dismissible fade show animated bounceInDown" role="alert"><strong> Opsss! </strong> Input Email and Password! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                                        $("#message").html(response).show();
  
            }
            else
            {
                        $.ajax(
                        {
                            type: "POST",
                            url: 'Login_Validation',
                            data: dataString,
                            cache: false,
                            success: function(result)
                            {
                                if (result == 'OK')
                                {
                                   var response = $('<div class="alert alert-success alert-dismissible fade animated bounceInDown show" role="alert"><strong> Yesss! </strong> User exist. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                                        $("#message").html(response).show();
                                    window.location.replace("Home");
                                }
                                else
                                {
	                                   var response = $('<div class="alert alert-danger alert-dismissible fade animated bounceInDown show" role="alert"><strong>Awww!</strong> Wrong credentials. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                                        $("#message").html(response).show();
                                }
                            }
                        });
                    }
                return false;
    });
});