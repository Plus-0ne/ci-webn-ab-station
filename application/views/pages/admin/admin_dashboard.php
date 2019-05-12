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
                <style type="text/css">
                    .card-header
                    {
                        background-color: #f1c40f;
                    }
                    .card-body
                    {
                        background-color: #434343;
                        color: white;
                    }
                    .card-footer
                    {
                        background-color: #434343;
                        color: white;
                    }
                    .dt-cell { vertical-align: middle !important; }
                </style>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb"  style="background-color: transparent;">
                    <li class="breadcrumb-item"><a href="#"> <i class="fas fa-home"></i> </a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Dashboard </li>
                  </ol>
                </nav>
                <div class="row p-5" style="box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);">
                    <div class="col-sm-12 col-md-12 col-lg-3 p-2" style="">
                        <div  class="card text-right" style="width: 100%; display: inline-block;">
                            <a href="<?=base_url()?>Admin-Requests">
                                <div class="card-body" style="background-color: #14B5CD;">
                                    <h5 class="card-title"><i class="fab fa-leanpub"></i> Requests </h5>
                                    <p class="card-text">
                                        <h1>
                                            <?php echo $GetAirdropRequest->num_rows();?>
                                        </h1>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-3 p-2" style="">
                        <div  class="card text-right" style="width: 100%; display: inline-block;">
                            <a href="<?=base_url()?>Admin-Expired-Airdrops">
                                <div class="card-body" style="background-color: #DE7121;">
                                    <h5 class="card-title"><i class="fas fa-calendar-times"></i> Expired </h5>
                                    <p class="card-text">
                                        <h1>
                                            <?php echo $GetAirdropExpired->num_rows();?>
                                        </h1>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-3 p-2" style="">
                        <div  class="card text-right" style="width: 100%; display: inline-block;">
                            <a href="<?=base_url()?>Admin-AAirdrops">
                                <div class="card-body" style="background-color: #24B532;">
                                    <h5 class="card-title"><i class="fas fa-check"></i> Aprroved </h5>
                                    <p class="card-text">
                                        <h1>
                                            <?php echo $GetAirdropApproved->num_rows();?>
                                        </h1>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-3 p-2" style="">
                        <div  class="card text-right" style="width: 100%; display: inline-block;">
                            <a href="<?=base_url()?>Admin-FeaturedAirdrops">
                                <div class="card-body" style="background-color: #E5AF2D;">
                                    <h5 class="card-title"><i class="far fa-star"></i> Featured </h5>
                                    <p class="card-text">
                                        <h1>
                                            <?php echo $getFeaturedairdrops->num_rows();?>
                                        </h1>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row p-5" style="box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);">
                    <div class="col-sm-12">
                        <h3>
                            New Airdrops
                        </h3>
                        <br>
                        <div class="table-responsive">
                            <table id="dtPop" class="table table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Token</th>
                                        <th>Project Name</th>
                                        <th>Link</th>
                                        <th>Start At</th>
                                        <th>End At</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($GetAirdropTopRated->result_array() as $row) { ?>
                                        <tr>
                                            <td class="dt-cell text-center" width="100"> <img src="<?php echo $row['TokenImage'];?>" width="50"> </td>
                                            <td class="dt-cell text-center"><strong><?php echo $row['ProjectName'];?></strong></td>
                                            <td class="dt-cell text-center"> <a href="<?php echo $row['WebsiteUrl'];?>" target="_blank"><?php echo $row['WebsiteUrl'];?></a> </td>
                                            <td class="dt-cell text-center"> <?php echo $row['DateStart'];?> </td>
                                            <td class="dt-cell text-center"> <?php echo $row['DateEnd'];?> </td>
                                            <td class="dt-cell text-center">
                                                <a href="<?=base_url()?>Admin-Details?aide=<?php echo $row['airdrop_id'];?>"> Details </a>
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