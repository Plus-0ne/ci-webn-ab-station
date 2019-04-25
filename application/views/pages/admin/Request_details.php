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
                    <li class="breadcrumb-item active" aria-current="page"> Details </li>
                  </ol>
                </nav>
                <div class="row p-5" style="box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);">
                    <div class="col-sm-12" style="padding: 21px;">
                    </div>
                    <!-- Airdrop details -->
                    <div class="col-sm-12">
                        <h3>
                            <i class="fas fa-info-circle"  style="color: #1B6BB6;">&nbsp</i> Information
                        </h3>
                        <br>
                        <br>
                        
                    </div>
                    <div class="col-sm-12 col-md-5 pt-5 pb-5">
                        <div class="text-center">
                            <img width="200" height="200" src="<?php echo $GetAirdopDetails->TokenImage;?>" style="background-image: url('');" />
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-7 pt-5 pb-5">
                        <h3>
                            <?php echo $GetAirdopDetails->ProjectName;?> is Airdropping
                        </h3>
                        <p class="text-justify" style="font-size: 18px; color: #3E3E3E;">
                            <?php echo $GetAirdopDetails->Description;?>
                        </p>
                    </div>
                    <style type="text/css">
                        .tableairdrops
                        {
                            width: 100%;
                        }
                        .tableairdrops > tr > td
                        {
                            text-overflow: ellipsis;
                            word-wrap: break-word;
                        }
                    </style>
                    <div class="col-sm-12 col-md-12 p-5 table-responsive">
                        <table class="table tableairdrops">
                            <tr>
                                <td>
                                    Rate
                                </td>
                                <td>
                                    &nbsp<i class="fas fa-chevron-right"></i>&nbsp 
                                    <?php if ($GetAirdopDetails->Rate == 1) { 
                                        echo '&nbsp 
                                        <span id="span1" class="fa fa-star ratebutton" style="color: red;"></span>
                                        <span id="span2" class="fa fa-star ratebutton"></span>
                                        <span id="span3" class="fa fa-star ratebutton"></span>
                                        <span id="span4" class="fa fa-star ratebutton"></span>
                                        <span id="span5" class="fa fa-star ratebutton"></span>
                                        ';
                                    }
                                    elseif ($GetAirdopDetails->Rate == 2) {
                                        echo '&nbsp 
                                        <span id="span1" class="fa fa-star ratebutton" style="color: red;"></span>
                                        <span id="span2" class="fa fa-star ratebutton" style="color: red;"></span>
                                        <span id="span3" class="fa fa-star ratebutton"></span>
                                        <span id="span4" class="fa fa-star ratebutton"></span>
                                        <span id="span5" class="fa fa-star ratebutton"></span>
                                        ';
                                    }
                                    elseif ($GetAirdopDetails->Rate == 3) {
                                        echo '&nbsp 
                                        <span id="span1" class="fa fa-star ratebutton" style="color: red;"></span>
                                        <span id="span2" class="fa fa-star ratebutton" style="color: red;"></span>
                                        <span id="span3" class="fa fa-star ratebutton" style="color: red;"></span>
                                        <span id="span4" class="fa fa-star ratebutton"></span>
                                        <span id="span5" class="fa fa-star ratebutton"></span>
                                        ';
                                    }
                                    elseif ($GetAirdopDetails->Rate == 4) {
                                        echo '&nbsp 
                                        <span id="span1" class="fa fa-star ratebutton" style="color: red;"></span>
                                        <span id="span2" class="fa fa-star ratebutton" style="color: red;"></span>
                                        <span id="span3" class="fa fa-star ratebutton" style="color: red;"></span>
                                        <span id="span4" class="fa fa-star ratebutton" style="color: red;"></span>
                                        <span id="span5" class="fa fa-star ratebutton"></span>
                                        ';
                                    }
                                    elseif ($GetAirdopDetails->Rate == 5) {
                                        echo '&nbsp 
                                        <span id="span1" class="fa fa-star ratebutton" style="color: red;"></span>
                                        <span id="span2" class="fa fa-star ratebutton" style="color: red;"></span>
                                        <span id="span3" class="fa fa-star ratebutton" style="color: red;"></span>
                                        <span id="span4" class="fa fa-star ratebutton" style="color: red;"></span>
                                        <span id="span5" class="fa fa-star ratebutton" style="color: red;"></span>
                                        ';
                                    }
                                    else
                                    {
                                        echo '&nbsp 
                                        <span id="span1" class="fa fa-star ratebutton"></span>
                                        <span id="span2" class="fa fa-star ratebutton"></span>
                                        <span id="span3" class="fa fa-star ratebutton"></span>
                                        <span id="span4" class="fa fa-star ratebutton"></span>
                                        <span id="span5" class="fa fa-star ratebutton"></span>
                                        ';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Date Start
                                </td>
                                <td>
                                    &nbsp<i class="fas fa-chevron-right"></i>&nbsp <?php echo $GetAirdopDetails->DateStart;?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Date End
                                </td>
                                <td>
                                    &nbsp<i class="fas fa-chevron-right"></i>&nbsp <?php echo $GetAirdopDetails->DateEnd;?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Link
                                </td>
                                <td>
                                    &nbsp<i class="fas fa-chevron-right"></i>&nbsp <a href="<?php echo $GetAirdopDetails->Link;?>"> <?php echo $GetAirdopDetails->Link;?> </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Website
                                </td>
                                <td>
                                    &nbsp<i class="fas fa-chevron-right"></i>&nbsp <a href="<?php echo $GetAirdopDetails->WebsiteUrl;?>"> <?php echo $GetAirdopDetails->WebsiteUrl;?> </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Days Remaining
                                </td>
                                <td>
                                    <?php
                                    date_default_timezone_set("Asia/Manila");

                                    $today = date("Y-m-d h:i:s a");
                                    $endDate = $GetAirdopDetails->DateEnd;
                                    $datetime1 = new DateTime($today);

                                    $datetime2 = new DateTime($endDate);

                                    $difference = $datetime1->diff($datetime2);

                                    if ($datetime2 < $datetime1) {
                                        echo '&nbsp<i class="fas fa-chevron-right"></i>&nbsp <span style="color: red;"><strong> Expired </strong></span>';
                                    }
                                    else
                                    {
                                        echo '&nbsp<i class="fas fa-chevron-right"></i>&nbsp '.$difference->days;
                                    }
                                    ?>

                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-sm-12 col-md-4 p-5 text-center">
                        <h3>
                            <i class="fas fa-users" style="color: #BA45F1;"></i> Max Participants
                            <br>
                            <br>
                            <?php echo $GetAirdopDetails->MaxParticipants;?>
                        </h3>
                    </div>
                    <div class="col-sm-12 col-md-4 p-5 text-center">
                        <h3>
                            <i class="fas fa-dollar-sign" style="color: #F1C245;"></i> Token to be distributed
                            <br>
                            <br>
                            <?php echo $GetAirdopDetails->ToBeDistributed;?>
                        </h3>
                    </div>
                    <div class="col-sm-12 col-md-4 p-5 text-center">
                        <h3>
                            <i class="fas fa-hand-holding-usd" style="color: #1FDC35;"></i> Reward
                            <br>
                            <br>
                            <?php echo $GetAirdopDetails->RewardQuantity;?>
                        </h3>
                    </div>
                    <div class="col-sm-12 col-md-12 p-5 text-justify">
                        <h3 class="pb-4">
                            How to join <i class="fas fa-question-circle"></i>
                        </h3>
                        <p> <?php echo $GetAirdopDetails->CompleteInstruction;?><p>
                    </div>
                    <!-- Payment details -->
                    <div class="col-sm-12 p-5">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <th>TXID</th>
                                    <th>Email Address</th>
                                    <th>Payment Details</th>
                                    <th>Priority</th>
                                    <th>Request Date</th>
                                </thead>
                                <tbody>
                                    <?php foreach ($GetRequestDetails->result_array() as $row) { ?>
                                        <tr>
                                            <td><?php echo $row['TxID'];?></td>
                                            <td><?php echo $row['EmailAddress'];?></td>
                                            <td><?php echo $row['PaymentDetails'];?></td>
                                            <td><?php echo $row['ListAsHot'];?></td>
                                            <td><?php echo $row['Date'];?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-1 ml-auto">
                        <a href="<?php echo $_SERVER['HTTP_REFERER'];?>"> <h4><i class="fas fa-chevron-circle-left">&nbsp</i> Back</h4> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php $this->load->view('pages/admin/_template/admin_jsscripts'); ?>