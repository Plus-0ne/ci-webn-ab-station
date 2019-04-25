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
                                            <a class="nav-link" href="#"> Profile </a>
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
                    <li class="breadcrumb-item active" aria-current="page"> Requests </li>
                  </ol>
                </nav>
                <style type="text/css">
                    .btnn-entry
                    {
                        border: 1px solid #3E68F0;
                        background-color: #3E68F0;
                        color: white !important;
                        padding: 12px 18px 12px 18px;
                        width: 150px;
                        cursor: pointer;
                        font-size: 21px
                        border-radius: 1px;
                        -webkit-transition: all 0.2s ease-in-out;
                        transition: all 0.2s ease-in-out;
                    }
                    .btnn-entry:hover
                    {
                        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                        background-color: #4B73F6;
                    }
                    .btnn-entry:focus
                    {
                        outline-color: #3E68F0;
                    }
                </style>
                <div class="row p-4" style="box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);">
                    <div class="col-sm-12" style="padding: 21px;"></div>
                    <div class="col-sm-12">
                        <h3>
                            <i class="fas fa-book-open" style="color: #25CDAF;">&nbsp</i> For Approval
                        </h3>
                        <?php echo $this->session->flashdata('promptInfo');?>
                        <br>
                        <br>
                        <div class="table-responsive">
                            <table id="dtPop" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Token Image</th>
                                        <th>Project Name</th>
                                        <th>Request BY</th>
                                        <th>Status</th>
                                        <th>Payment Details</th>
                                        <th>Priority</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($GetRequest->result() as $row) { ?>
                                        <tr>
                                            <td style="width: 150px; text-align: center;vertical-align: middle;"><img src="<?php echo $row->TokenImage;?>" width="50" height="50"></td>
                                            <td style="text-align: center; vertical-align: middle;"><?php echo $row->ProjectName;?></td>
                                            <td style="text-align: center; vertical-align: middle;"><?php echo $row->AddedBy;?></td>
                                            <td style="text-align: center; vertical-align: middle;"><?php echo '<span style="color: #F1980D;">'.$row->RequestStatus.'</span>';?></td>
                                            <td style="text-align: center; vertical-align: middle;"><?php echo $row->PaymentDetails;?></td>
                                            <td style="text-align: center; vertical-align: middle;"><?php if ($row->PostPrio == 'hot') {
                                                echo '<span style="color: #D24717;"> Hot </span>';
                                            } else {
                                                echo '<span style="color: #359B15;"> Latest </span>';
                                            } ?></td>
                                            <td style="vertical-align: middle;">
                                                <a href="<?=base_url()?>Admin-Details?aide=<?php echo $row->airdrop_id;?>">Details</a>
                                                <br>
                                                <a href="<?=base_url()?>Approve_Request?aide=<?php echo $row->airdrop_id;?>">Approve</a>
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
    </div>
</body>
<?php $this->load->view('pages/admin/_template/admin_jsscripts'); ?>