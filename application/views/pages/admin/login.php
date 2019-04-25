<div class="wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 text-center p-5" style="border: 1px solid #102026; background-color: #102026;">
				<img src="<?=base_url()?>assets/admin/img/logo.png">
			</div>
		</div>
		<style type="text/css">
			body
			{
				background: #FFFFFF;
			}
			div.width
			{
				width: 100%;
				
				margin-top: 20px;
				margin-bottom: 20px;
			}
			div.width input[type="text"] , div.width input[type="password"]
			{
				width: 100%;
				border: none;
				padding: 10px;
				border-bottom: 1px solid gray;
				background-color: transparent;
				transition: all 0.3s ease;
			}
			div.width input[type="text"]:focus ,div.width input[type="password"]:focus
			{
				outline: none;
				box-shadow: none;
				font-size: 21px;
				
			}
			div.width input[type="submit"]
			{
				width: 100%;
				border: #1188D3;
				padding: 15px;
				background-color: #1188D3;
				color: white;
				border-radius: 3px;
				cursor: pointer;
				transition: all 0.3s ease;
			}
			div.width input[type="submit"]:hover
			{
				box-shadow: 0px 0px 10px 4px rgb(0,0,0,0.1);
			}
		</style>
		<div class="row">
			<div class="col-sm-12 col-md-5 col-lg-4 col-xl-2 m-auto pt-5">
				<?php echo $this->session->flashdata('promptInfo');?>
				<div class="login-container">
					<?php echo form_open(base_url().'Admin_Validation', 'method="POST"');?>
					<div class="width div-style">
						<input type="text" name="emailaddress" placeholder="Email Address">
					</div>
					<div class="width div-style">
						<input type="password" name="password" placeholder="Password">
					</div>
					<div class="width div-style">
						<input type="submit" name="Checkadmin" value="Check">
					</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="footer">
	<div class="container">
		<div class="p-5">
			<p>
				&copy; 2019 WEBN Airdrops And Bounty Station.
			<p>
		</div>
	</div>
</div>