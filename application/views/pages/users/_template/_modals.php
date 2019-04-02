<!-- Subscribe -->
<div class="modal fade animated fadeInUp faster" id="modalSubscribe" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"> Subscribe </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>
          Subscribe to Web Innovation PH INC.
          <br>
          <a class="" href="#" target="_blank">
            Click Me <i class="fas fa-external-link-alt"></i>
          </a>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- telegram -->
<?php
        $idid = $this->session->userdata('Is_Telegram_Member');
        $botToken = '600810082:AAEUjCkkz8-ExUtIxS7jlslOhhUqVEX3J1I';
        $website="https://api.telegram.org/bot".$botToken;
        $chatId='-1001489662009';  //Receiver Chat Id 
                        
        $params=[
            'chat_id'=>$chatId,
            'user_id'=>$idid,
        ];

        $ch = curl_init($website . '/getChatMember?');
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
                        

        $getUserData = json_decode($result ,true);

        if (is_array($getUserData)) {
          if ($getUserData['ok'] == true) {

            $chkID = $getUserData['result']['user']['id'];
            $chkStatus = $getUserData['result']['status'];

            if ($chkID == $idid && $chkStatus == "member") {
              echo '';
            }
            elseif ($chkID == $idid && $chkStatus == "left") {
                echo '<div class="modal fade animated fadeInUp faster" id="modalJoinTelegram" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle"> Join our Telegram Channel </h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">';
                          echo form_open(base_url().'BOT/getUserinChannel', 'method="POST"');
                          echo '<div>
                              <a href="https://t.me/WEBN_Airdrop_Station" target="_blank">
                                Click Me <i class="fas fa-external-link-alt"></i>
                              </a>
                            </div>
                            <p>
                              <div>
                                To get your Telgram ID forward a message to Nadam\'s Userinfobot.
                              </div>
                            </p>
                            <div class="form-group">
                            <label>Telegram ID</label>
                              <input id="user_id" type="text" name="user_id" class="form-control">
                            </div>
                            <br>
                            <input id="telesubmit" type="submit" name="" class="btn btn-primary" value="Verify">';
                          echo form_close();
                        echo '</div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                    <div id="message" class="message">
                  </div>
                  </div>';
            }
          }
          else
          {
              echo '<div class="modal fade animated fadeInUp faster" id="modalJoinTelegram" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle"><i class="fab fa-telegram-plane" style="color: #247CDF;"></i> Join our Telegram Channel </h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">';
                          echo form_open(base_url().'BOT/getUserinChannel', 'method="POST"');
                          echo '<div>
                              <a href="https://t.me/WEBN_Airdrop_Station" target="_blank">
                                Click Me <i class="fas fa-external-link-alt"></i>
                              </a>
                            </div>
                            <p>
                              <div>
                                To get your Telgram ID forward a message to Nadam\'s Userinfobot.
                              </div>
                            </p>
                            <div class="form-group">
                              <label>Telegram ID</label>
                              <input id="user_id" type="text" name="user_id" class="form-control">
                            </div>
                            <br>
                            <input id="telesubmit" type="submit" name="" class="btn btn-primary" value="Verify">';
                          echo form_close();
                        echo '</div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                    <div id="message" class="message">
                  </div>
                  </div>';
            }
          }
          else
           {
            echo '';
          }

          curl_close($ch);
?>

<script type="text/javascript">
  $(document).ready(function(){
    $("#telesubmit").click(function(){
      var User_Idto = $('#user_id').val();
      var csrf = $("input[name=csrf_test_name]").val();

        // var dataString = 'User_ID='+ User_Idto ;
        if(User_Idto=="")
        {

         var response = $('<div class="alert alert-warning alert-dismissible fade show animated bounceInDown" role="alert"><strong> Opsss! </strong> Please! We need your telegram ID. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
         $("#message").html(response).show();
         window.location.reload();
         
       }
       else
       {
        $.ajax(
        {
          type: "POST",
          url: 'BOT/getUserinChannel',
          data: {
            User_ID : User_Idto,
            'csrf_test_name' : csrf
          },
          cache: false,
          success: function(result)
          {
            if (result == 'member')
            {
              var response = $('<div class="alert alert-success alert-dismissible fade animated bounceInDown show" role="alert"><strong> Verified Member! </strong>. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
              $("#message").html(response).show();
              window.location.reload();
            }
            else if (result == 'left') 
            {
              var response = $('<div class="alert alert-danger alert-dismissible fade animated bounceInDown show" role="alert"><strong>Awww!</strong> You Left the Channel. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
              $("#message").html(response).show();
              window.location.reload();
            }
            else
            {
              var response = $('<div class="alert alert-danger alert-dismissible fade animated bounceInDown show" role="alert"><strong>Awww!</strong> Not a Member. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
              $("#message").html(response).show();
              window.location.reload();
            }
          }
        });
      }
      return false;
    });
  });
</script>