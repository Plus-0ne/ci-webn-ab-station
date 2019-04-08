<div class="footer">
	<div class="container">
		<div class="row">
		<div class="col-sm-12 col-md-3 mr-auto pt-5 pb-5 footernav">
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
				<li class="f-nav-item">
					<a class="f-nav-link" href="<?=base_url()?>ApplyToList"><i class="fas fa-angle-right"></i> Appy to list </a>
				</li>
				<li class="f-nav-item">
					<a class="f-nav-link" href="#"><i class="fas fa-angle-right"></i> Buy WEBN token </a>
				</li>
				<li class="f-nav-item">
					<a class="f-nav-link" href="#"><i class="fas fa-angle-right"></i> Contact </a>
				</li>
				<li class="f-nav-item">
					<a class="f-nav-link" href="<?=base_url()?>FAQs"><i class="fas fa-angle-right"></i> FAQs </a>
				</li>
				<?php if (!isset($_SESSION['isActive'])) {
					echo '<li class="f-nav-item">
					<a class="f-nav-link" href="'.base_url().'Login"><i class="fas fa-angle-right"></i> Login </a>
					</li>';
				}
				?>
				<?php if (!isset($_SESSION['isActive'])) {
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
		<div class="col-sm-12 col-md-4 ml-auto pt-5 pb-5 webn-grouplinks">
			<!-- Follow Us -->
			<p style="color: #898989;">
				<strong>
					Join Us
				</strong>
			</p>
			<h3>
				<a class="slinks" href="https://www.facebook.com/webnproject/" target="_blank"><i class="fab fa-facebook"></i></a>
				<a class="slinks" href="https://twitter.com/WebnProject" target="_blank"><i class="fab fa-twitter"></i></a>
				<a class="slinks" href="https://github.com/Webinnovationph" target="_blank"><i class="fab fa-github"></i></a>
				<a class="slinks" href="https://discordapp.com/invite/NkBtY4X" target="_blank"><i class="fab fa-discord"></i></a>
				<a class="slinks" href="https://bitcointalk.org/index.php?topic=4640928.0" target="_blank"><i class="fab fa-bitcoin"></i></a>
				<a class="slinks" href="https://t.me/WEBN_EngOfficial_GroupChat" target="_blank"><i class="fab fa-telegram"></i></a>
			</h3>
			<br>
		</div>
	</div>
	<div class="row">
		<div class="col-12 copyr-webn">
			&copy; 2019 WEBN Airdrops And Bounty Station.
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 mb-5" style="border-bottom: 1px solid #727272;"></div>
	</div>
	
</div>
</div>
