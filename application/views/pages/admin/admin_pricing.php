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
                    <div class="col-sm-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb"  style="background-color: transparent;">
                                <li class="breadcrumb-item"><a href="#"> <i class="fas fa-home"></i> </a></li>
                                <li class="breadcrumb-item"><a href="#"> Option </a></li>
                                <li class="breadcrumb-item active" aria-current="page"> Admins </li>
                            </ol>
                        </nav>
                    </div>
                    <div style="border: 1px solid #D6D6D6; padding: 21px; width: 100%;">
                        <div class="col-sm-12">
                            <h3>
                                <i class="fas fa-barcode" style="color: #D0CA1A;">&nbsp</i> Payment
                            </h3>
                        </div>
                        <?php if ($priceforday->num_rows() !== 3) { ?>
                            <div class="col-sm-12 pt-5 pl-5 pr-5">
                                <button class="btn btn-primary getID" data-toggle="modal" data-target="#AddPrice">Add Payment</button>
                            </div>
                        <?php } ?>
                        <?php foreach ($priceforday->result_array() as $row) { ?>
                            <div class="col-sm-12 col-md-4 price-card p-5" style="float: left;">
                                <div style="padding: 25px;background-color: <?php echo $row['color'];?>; color: #FFFFFF;">
                                    <h1 class="Days">
                                        <?php echo $row['Days'];?>
                                    </h1>
                                    <h6 class="Price">
                                        <?php echo $row['Price'];?> WEBN Tokens
                                    </h6>
                                    <br>
                                </div>
                                <br>
                                <button id="<?php echo $row['PriceNo'];?>" class="btn btn-primary getID" data-toggle="modal" data-target="#UpdatePriceModal">Update Price</button>
                                <a href="<?=base_url()?>RemovePayment?aide=<?php echo $row['PriceNo'];?>" class="btn btn-info">Remove</a>
                            </div>
                        <?php } ?>
                    </div>
                    <div style="border: 1px solid #D6D6D6;margin-top: 10px; padding: 21px; width: 100%;">
                        <div class="col-sm-12">
                            <h3>
                                <i class="fas fa-barcode" style="color: #D0CA1A;">&nbsp</i> Additional Payment
                            </h3>
                        </div>
                        <div class="col-sm-12 pt-5 pl-5 pr-5">
                            <button class="btn btn-primary getID" data-toggle="modal" data-target="#AddAddPay">Add Additional Price</button>
                        </div>
                        <?php foreach ($addPricefor->result_array() as $row) { ?>
                            <div class="col-sm-12 col-md-4 price-card p-5" style="float: left;">
                                <div style="padding: 25px;background-color: <?php echo $row['color'];?>; color: #FFFFFF;">
                                    <h1 class="Days">
                                        <?php echo $row['AdditionalFor'];?>
                                    </h1>
                                    <h6 class="Price">
                                        <?php echo $row['AdPrice'];?> WEBN Tokens per day
                                    </h6>
                                    <br>
                                </div>
                                <br>
                                <button id="<?php echo $row['ad_PriceNo'];?>" class="btn btn-primary getAddid" data-toggle="modal" data-target="#UpdateAdPrice">Update Price</button>
                                <a href="<?=base_url()?>RemovaAddPayment?aide=<?php echo $row['ad_PriceNo'];?>" class="btn btn-info">Remove</a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="UpdatePriceModal" tabindex="-1" role="dialog" aria-labelledby="UpdatePriceModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="UpdatePriceModal"> Update Price </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <?php echo form_open(base_url().'UpdatePrices', 'method="POST"');?>
        <div class="form-group">
            <input id="pID" class="form-control" type="hidden" name="PriceNo" value="">
        </div>
        <div class="form-group">
            <input id="Prices" class="form-control" type="text" name="Price" value="" placeholder="Price">
        </div>
        
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
    <?php echo form_close(); ?>
</div>
</div>
</div>

<!-- Add Payment -->
<div class="modal fade" id="AddPrice" tabindex="-1" role="dialog" aria-labelledby="AddPriceModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AddPriceModal"> Add Payment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
    <?php echo form_open(base_url().'addPayment', 'method="POST"');?>
    <div class="form-group">
        <input class="form-control" type="number" name="Days" value="" placeholder="Days">
    </div>
    <div class="form-group">
        <input class="form-control" type="text" name="Price" value="" placeholder="Price">
    </div>
    <div class="form-group">
        <label> Color </label>
        <input class="form-control" type="color" name="color" value="">
    </div>
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-primary"> Save </button>
</div>
<?php echo form_close(); ?>
</div>
</div>
</div>

<!-- Add Additional Price -->
<div class="modal fade" id="AddAddPay" tabindex="-1" role="dialog" aria-labelledby="AddPriceModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AddPriceModal"> Add Additional Payment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
    <?php echo form_open(base_url().'AddAddPayment', 'method="POST"');?>
    <div class="form-group">
        <input class="form-control" type="text" name="AdditionalFor" value="" placeholder="For">
    </div>
    <div class="form-group">
        <input class="form-control" type="text" name="adPrice" value="" placeholder="Price">
    </div>
    <div class="form-group">
        <label> Color </label>
        <input class="form-control" type="color" name="color" value="">
    </div>
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-primary"> Save </button>
</div>
<?php echo form_close(); ?>
</div>
</div>
</div>

<!-- Update Additional Price -->
<div class="modal fade" id="UpdateAdPrice" tabindex="-1" role="dialog" aria-labelledby="UpdateAdPriceModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="UpdateAdPriceModal"> Update Additional Price</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
    <?php echo form_open(base_url().'UpdateAdPrice', 'method="POST"');?>
    <div class="form-group">
        <input id="paId" class="form-control" type="hidden" name="ad_PriceNo" value="">
    </div>
    <div class="form-group">
        <input class="form-control" type="text" name="AdPrice" value="" placeholder="Price">
    </div>
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-primary"> Update </button>
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
