<?php $admin_header;?>
<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <?php $admin_nav;?>
        <!-- Page Content  -->
        <div id="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <div class="container-fluid">
                                <button type="button" id="sidebarCollapse" class="btn btn-info">
                                    <i class="fas fa-align-left"></i>
                                </button>
                                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <i class="fas fa-align-justify"></i>
                                </button>

                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="nav navbar-nav ml-auto">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"> </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?=base_url()?>aLogout"> Logout </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb"  style="background-color: transparent;">
                    <li class="breadcrumb-item"><a href="#"> <i class="fas fa-home"></i> </a></li>
                    <li class="breadcrumb-item"><a href="#"> Airdrops </a></li>
                    <li class="breadcrumb-item active" aria-current="page"> New Entry </li>
                  </ol>
                </nav>
                <div class="row" style="border: 1px solid #D6D6D6; ">
                    <div class="col-sm-12" style="padding: 21px;">
                    </div>
                      <div class="col-sm-12 col-lg-12">
                        <?php echo $this->session->flashdata('promptInfo');?>
                        <?php echo form_open_multipart(base_url().'AddAirdrops', 'method="POST"');?>
                          <div class="form-group col-md-6 col-lg-3">
                            <img id="img-preview" src="<?=base_url()?>assets/img/3744.png" style="padding: 13px; border: 1px solid #A0A0A0; width: 150px; height: 150px;"/>
                            <br>
                            <br>
                            <label for=""> Token Image </label>
                            <input id="image-input" class="" type="file" placeholder="" name="TokenImage">
                          </div>
                          <div class="form-group col-md-6 col-lg-3">
                            <label for=""> Project Name </label>
                            <input class="form-control" type="text" placeholder="" name="ProjectName">
                          </div>
                          <div class="form-group col-sm-12 col-md-12 col-lg-4">
                            <label for=""> Description </label>
                            <textarea style="min-height: 300px;" class="form-control" name="Description"></textarea>
                          </div>
                          <div class="form-group col-md-6 col-lg-2">
                            <label for=""> Date Start </label>
                            <input class="form-control" type="date" placeholder="Default input" name="DateStart">
                          </div>
                          <div class="form-group col-md-6 col-lg-2">
                            <label for=""> Date End </label>
                            <input class="form-control" type="date" placeholder="Default input" name="DateEnd">
                          </div>
                          <div class="form-group col-md-6 col-lg-3">
                            <label for=""> Link </label>
                            <input class="form-control" type="url" placeholder="Paste url" name="AirdropsLink">
                          </div>
                          <div class="form-group col-md-6 col-lg-3">
                            <label for=""> Website </label>
                            <input class="form-control" type="url" placeholder="Paste url" name="WebsiteSource">
                          </div>
                          <div class="form-group col-md-6 col-lg-3">
                            <label for=""> Max Participants </label>
                            <input class="form-control" type="number" placeholder="" name="MaxParticipant">
                          </div>
                          <div class="form-group col-md-6 col-lg-3">
                            <label for=""> Token to be distributed </label>
                            <input class="form-control" type="number" placeholder="" name="ToBeDistributed">
                          </div>
                          <div class="form-group col-md-6 col-lg-3">
                            <label for=""> Reward Quantity </label>
                            <input class="form-control" type="number" placeholder="" name="RewardQuantity">
                          </div>
                          <div class="form-group col-md-12 col-lg-12">
                            <label for=""> Instruction </label>
                            <textarea style="min-height: 300px;" id="summernote" class="form-control" name="CompleteInstruction"></textarea>
                          </div>
                          <div class="form-group col-md-12 col-lg-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        <?php echo form_close();?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<?php $admin_jsscript;?>
<?php $this->load->view('admin/_template/admin_summernote');?>
<script type="text/javascript">
$(document).ready(function(){
  function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#img-preview').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#image-input").change(function(){
        readURL(this);
    });
});
</script>