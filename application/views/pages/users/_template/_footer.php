<div class="footer">
	<div class="container">
		<div class="row">
			<style type="text/css">
			.f-nav-item
			{
				list-style: none;
			}
			.f-nav-link
			{
				
				color: #898989;
			}
			.f-nav-link:hover
			{
				text-decoration: none;
				color: rgb(241, 196, 15);
			}
		</style>
		<div class="col-lg-3 mr-auto pt-5 pb-5">
			<ul> 
				<li class="f-nav-item">
					<a class="f-nav-link" href="<?=base_url()?>Home"><i class="fas fa-angle-right"></i> Home </a>
				</li>
				<li class="f-nav-item">
					<a class="f-nav-link" href="<?=base_url()?>HOT"><i class="fas fa-angle-right"></i> Hot </a>
				</li>
				<li class="f-nav-item">
					<a class="f-nav-link" href="<?=base_url()?>LATEST"><i class="fas fa-angle-right"></i> Latest </a>
				</li>
				
				<?php
				if ($this->session->userdata('isActive') == 3) {
					echo '<li class="f-nav-item">
							<a class="f-nav-link" href="#"><i class="fas fa-angle-right"></i> List Your Coin/Token </a>
						</li>';
				}
				?>
				<li class="f-nav-item">
					<a class="f-nav-link" href="#"><i class="fas fa-angle-right"></i> Buy WEBN token </a>
				</li>
				<li class="f-nav-item">
					<a class="f-nav-link" href="#"><i class="fas fa-angle-right"></i> Contact </a>
				</li>
				<li class="f-nav-item">
					<a class="f-nav-link" href="<?=base_url()?>FAQs"><i class="fas fa-angle-right"></i> FAQs </a>
				</li>
				<?php if ($this->session->userdata('isActive')) {

				}
				else
				{
					echo '<li class="f-nav-item">
					<a class="f-nav-link" href="'.base_url().'Login"><i class="fas fa-angle-right"></i> Login </a>
					</li>';
				}
				?>
				<?php if ($this->session->userdata('isActive')) {

				}
				else
				{
					echo '<li class="f-nav-item">
					<a class="f-nav-link" href="'.base_url().'Sign-Up"><i class="fas fa-angle-right"></i> Sign-up </a>
					</li>';
				}
				?>
				<li class="f-nav-item">
					<a id="btt-scrolltop" class="f-nav-link" href="#"><i class="fas fa-angle-right"></i> Top </a>
				</li>
			</ul>
		</div>
		<div class="col-lg-3 ml-auto pt-5 pb-5">
			<!-- Follow Us -->
			<p style="color: #898989;">
				<strong>
					Follow Us : 
				</strong>
			</p>
			<h3>
				<a class="slinks" href=""><i class="fab fa-facebook"></i></a>
				<a class="slinks" href=""><i class="fab fa-twitter"></i></a>
				<a class="slinks" href=""><i class="fab fa-github"></i></a>
				<a class="slinks" href=""><i class="fab fa-discord"></i></a>
				<a class="slinks" href=""><i class="fab fa-bitcoin"></i></a>
				<a class="slinks" href=""><i class="fab fa-telegram"></i></a>
			</h3>
			<br>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			&copy; 2019 WEBN Airdrops And Bounty Station.
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 mb-5" style="border-bottom: 1px solid #727272;"></div>
	</div>
	
</div>
</div>
