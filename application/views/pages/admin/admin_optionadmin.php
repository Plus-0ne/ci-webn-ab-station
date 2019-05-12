<?php $admin_header;?>
<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <?php $this->load->view('pages/admin/_template/admin_nav');?>
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
                        <?php echo $this->session->flashdata('promptInfo');?>
                    </div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb"  style="background-color: transparent;">
                            <li class="breadcrumb-item"><a href="#"> <i class="fas fa-home"></i> </a></li>
                            <li class="breadcrumb-item"><a href="#"> Option </a></li>
                            <li class="breadcrumb-item active" aria-current="page"> Admins </li>
                        </ol>
                    </nav>
                <div class="col-sm-12" style="border: 1px solid #D6D6D6; padding: 21px;">
                    <h3>
                        <i class="fas fa-user-tie" style="color: #1684A8;">&nbsp</i> Admins
                    </h3>
                    <div class="table-responsive">
                        <table id="dtPop" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email Address</th>
                                    <th>Level</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($GetAdmins->result() as $row) { ?>
                                    <tr>
                                        <td><?php echo $row->FName; ?> <?php echo $row->LName; ?></td>
                                        <td><?php echo $row->EmailAddress; ?></td>
                                        <td><?php
                                        if ($row->is_Admin == 1) {
                                            echo "SUPERUSER";
                                        }elseif ($row->is_Admin == 2) {
                                            echo "Admin 1";
                                        }else
                                        {
                                            echo "error";
                                        }
                                        ?></td>
                                        <td>
                                            <a href="<?=base_url()?>Removeadmin?aide=<?php echo $row->No; ?>">
                                                Remove
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <a href="#" class="btnn-entry" data-toggle="modal" data-target="#addAdmin">
                        New Entry
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- Add Admin -->
<div class="modal fade" id="addAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
    <?php echo form_open(base_url().'AddAdmin', 'method="POST"');?>
    <div class="form-group">
        <label for="exampleFormControlInput1">First Name</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="fname">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Last Name</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="lname">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Email Address</label>
        <input type="email" class="form-control" id="" name="emailaddress">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Password</label>
        <input type="text" class="form-control" id="passInput" name="password">
        <br>
        <button class="genBtn" type="button" id="generatePass"> Generate </button>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1"> Admin Level</label>
        <select class="form-control" name="al_value">
            <option value="1">
                SUPERUSER
            </option>
            <option value="2">
                Admin 1
            </option>
            <option>
                Admin 2
            </option>
        </select>
    </div>
    
</div>
<div class="modal-footer">
    <button class="saveBTN" type="submit">
        SAVE
    </button>
</div>
<?php echo form_close(); ?>
</div>
</div>
</div>
</body>
<style type="text/css">
    .saveBTN
    {
        background-color: #216DEC;
        color: #FFFFFF;
        border: 1px solid #216DEC;
        padding: 10px;
    }
    .genBtn
    {
        background-color: #EC8121;
        color: #FFFFFF;
        border: 1px solid #EC8121;
        padding: 10px;
    }
</style>
<?php $this->load->view('pages/admin/_template/admin_jsscripts'); ?>
