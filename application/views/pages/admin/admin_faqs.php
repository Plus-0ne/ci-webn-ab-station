<?php $admin_header;?>
<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <?php $this->load->view('pages/admin/_template/admin_nav'); ?>
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
                    <li class="breadcrumb-item"><a href="#"> Option </a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Faqs </li>
                  </ol>
                </nav>
                <div class="row p-4" style="box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);">
                    <div class="col-sm-12" style="padding: 21px;">
                    </div>
                    <div class="col-sm-12 col-lg-12">
                        <h3>
                            <i class="fas fa-question" style="color: #E48D1C;">&nbsp</i> Frequently Asked Questions
                        </h3>
                        <br>
                        <br>
                        <table id="dtPop" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($GetFaqs->result_array() as $row) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['Question'];?>
                                        </td>
                                        <td>
                                            <?php echo $row['Answer'];?>
                                        </td>
                                        <td>
                                            <a href="<?=base_url()?>removeFAQs?aide=<?php echo $row['FaqNo'];?>">Remove</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#ModalAdd_Faqs">
                            Add FAQ
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
<div class="modal fade lg" id="ModalAdd_Faqs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Add </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php echo form_open(base_url().'AddFaqs','method="POST"');?>
      <div class="modal-body">
            <div class="form-group">
                <label>Question</label>
                <input class="form-control" type="text" name="Question">
            </div>
            <div class="form-group">
                <label>Answer</label>
                <textarea class="form-control" rows="6" name="Answer"></textarea>
            </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      <?php echo form_close();?>
    </div>
  </div>
</div>
</body>
<?php $this->load->view('pages/admin/_template/admin_jsscripts'); ?>