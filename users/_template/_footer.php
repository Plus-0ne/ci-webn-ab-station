<div class="footer">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-lg-3 pt-5 pb-5 text-center footernav">
				<p style="color: #898989; text-transform: uppercase;font-size: 14px;">
					<strong>
						Links
					</strong>
				</p>
				<ul> 
					<li class="f-nav-item">
						<a class="f-nav-link" href="<?=base_url()?>Home"> Home </a>
					</li>
					
					<li class="f-nav-item">
						<a class="f-nav-link" href="<?=base_url()?>Contact"> Contact </a>
					</li>
					<li class="f-nav-item">
						<a class="f-nav-link" href="<?=base_url()?>FAQs"> FAQs </a>
					</li>
					<?php if (!isset($_SESSION['isActive'])) {
						echo '<li class="f-nav-item">
						<a class="f-nav-link" href="'.base_url().'Login"> Login </a>
						</li>';
					}
					?>
					<?php if (!isset($_SESSION['isActive'])) {
						echo '<li class="f-nav-item">
						<a class="f-nav-link" href="'.base_url().'Sign-Up"> Sign-up </a>
						</li>';
					}
					?>
				</ul>
			</div>
			<div class="col-sm-12 col-lg-3 pt-5 pb-5 text-center">
				<p style="color: #898989;text-transform: uppercase;font-size: 14px;">
					<strong>
						Protected by Hydro 
					</strong>
				</p>
				<a href="https://projecthydro.org/" target="_blank"><img src="<?=base_url()?>assets/users/img/hydro.png"></a>
			</div>
			<div class="col-sm-12 col-lg-3 pt-5 pb-5 text-center">
				<p style="color: #898989;text-transform: uppercase;font-size: 14px;">
					<strong>
						Powered by:
					</strong>
				</p>
				<a href="https://webinnovationph.com" target="_blank"><img src="<?=base_url()?>assets/users/img/webn.png" style="width: 230px;"></a>
			</div>
			<div class="col-sm-12 col-lg-3 pt-5 pb-5 webn-grouplinks text-center">
				<!-- Follow Us -->
				<p style="color: #898989;text-transform: uppercase;font-size: 14px;">
					<strong>
						Get in touch
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
			<div class="col-md-12 text-center" style="padding: 25px 0;border-top: 1px solid #2d2d2d;">
				<p>&copy; 2019 WEBN Airdrops And Bounty Station.</p>
			</div>
		</div>
	</div>
</div>
