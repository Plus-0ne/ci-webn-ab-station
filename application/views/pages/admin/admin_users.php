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
                </div>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb"  style="background-color: transparent;">
                    <li class="breadcrumb-item"><a href="#"> <i class="fas fa-home"></i> </a></li>
                    <li class="breadcrumb-item" aria-current="page"> Option </li>
                    <li class="breadcrumb-item active" aria-current="page"> Users </li>
                  </ol>
                </nav>
                <div class="row">
                    <div class="col-sm-12" style="border: 1px solid #D6D6D6; padding: 21px;">
                        <h3>
                            <i class="fas fa-users" style="color: #272CF1;">&nbsp</i> Users
                        </h3>
                        <br>
                        <br>
                        <table id="dtPop" class="table">
                            <thead>
                                <tr>
                                    <th>Email Address</th>
                                    <th>Telegram</th>
                                    <th>Subscriber</th>
                                    <th>Hydro Authentication</th>
                                    <th>Email Verification</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($GetUsers->result() as $row) { ?>
                                    <tr>
                                        <td><?php echo $row->Email_Address; ?></td>
                                        <td><?php if ($row->Is_Telegram_Member == 0) {
                                            echo '<strong style="color: #bc1010;">Not a Member</strong>';
                                        }
                                        else {
                                            echo '<strong style="color: #0caf14;">Member</strong>';
                                        } ?></td>
                                        <td><?php if ($row->Is_Subscriber == 0) {
                                            echo '<strong style="color: #bc1010;">Not a subsciber</strong>';
                                        } else 
                                        {
                                            echo '<strong style="color: #0caf14;">Subsciber</strong>';
                                        }?></td>
                                        <td><?php if ($row->Hydro_Auth == 1) {
                                            echo '<strong style="color: #0caf14;">Active</strong>';
                                        } else {
                                            echo '<strong style="color: #bc1010;">Not Active</strong>';
                                        } ?></td>
                                        <td><?php if ($row->VerifyStatus == 1) {
                                            echo '<strong style="color: #0caf14;">Verified</strong>';
                                        } else {
                                            echo '<strong style="color: #bc1010;">Unverified</strong>';
                                        }?></td>
                                        <td>
                                            <a href="<?=base_url()?>RemoveUser?aide=<?php echo $row->User_No; ?>">
                                                Remove
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php $this->load->view('pages/admin/_template/admin_jsscripts'); ?>