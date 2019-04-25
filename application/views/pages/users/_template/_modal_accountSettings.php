<?php if ($this->session->userdata('VerifyStatus') == 0) { ?>
  <!-- Verify Email -->
<div class="modal fade animated fadeInUp faster" id="modalVerifyEmail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"> Verify Email Address </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="fas fa-times"></i>
        </button>
      </div>
      <div class="modal-body">
        <a href="<?=base_url()?>ResendCode" class="btn btn-warning" style="color: white;"><i class="far fa-paper-plane"></i>&nbsp Resend Code </a>
        <?php echo form_open(base_url().'VerifyUserEmail', 'method="POST"'); ?>
        <p>
          <div>
            Check your Email Address for your Verification Code.
          </div>
        </p>
        <br><br>
        <div class="form-group">
          <label>CODE</label>
          <input id="email_vcode" class="form-control" type="text" name="email_vcode" placeholder="Paste Code">
        </div>
      </div>
      <div class="modal-footer">
        <input type="submit" name="VerifyEmail" class="btn btn-primary" value="Verify">
      </div>
    </div>
    <?php echo form_close(); ?>
  </div>
</div>
<?php } ?>
<?php if (isset($_SESSION['isActive'])) { ?>
      <!-- Change Password -->
      <div class="modal fade animated fadeInDownBig faster" id="modalChangepass" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle"> Change Password </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="fas fa-times"></i>
              </button>
            </div>
            <div class="modal-body text-center pl-5 pr-5">
              <?php echo form_open(base_url().'ChangePassword','method="POST"');?>
              <div class="form-group">
                <label>Current Password</label>
                <input class="text-center form-control" type="password" name="cpass" autocomplete="off">
              </div>
              <div class="form-group">
                <label>New Password</label>
                <input class="text-center form-control" type="password" name="npass" autocomplete="off">
              </div>
              <div class="form-group">
                <label>Re-type Password</label>
                <input class="text-center form-control" type="password" name="retypepass" autocomplete="off">
              </div>
            </div>
            <div class="modal-footer">
              <input class="btn btn-primary" type="submit" name="cp_submit" value="Change Password">
              <?php echo form_close();?>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>