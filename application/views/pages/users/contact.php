<?php $user_header;?>
<body>
	<div class="wrapper">
		<div id="header-container" class="header-container">
			<div class="container">
				<div class="row">
					<div id="cccc" class="cccc col-lg-12 col-sm-12 pt-5 pb-5">
						<?php $this->load->view('pages/users/_template/_navbar'); ?>
					</div>	
				</div>
			</div>
		</div>
		<div class="ads-container">
			<div class="container">

			</div>
		</div>
		<div class="content-container">
			<div class="container animated fadeIn">
				<div class="row">
					<div class="col-lg-12 col-sm-12 p-5">


					</div>
				</div>
				<div class="row mt-5">
					<div class="col-lg-12 title-page-here">
						<h3 class="text-center pb-4">
							<i class="fas fa-phone" style="color: #1BDDE4;"></i> &nbsp Contact us
						</h3>
						<style type="text/css">
							.ul-contacts > .li-contacts { display: inline-block; padding: 20px; text-decoration: none; }
							.li-heading > a > i { font-size: 80px; }
							.li-contacts { padding: 10px; }
						</style>
						<div class="text-center">
							<ul class="ul-contacts">
								<li class="li-contacts">
									<h1 class="li-heading">
										<a href="https://www.facebook.com/webnproject/" target="_blank" data-toggle="tooltip" title="Facebook" data-placement="top">
											<i class="fab fa-facebook-square contact-img" style="color: #4267b2;"></i>
										</a>
									</h1>
								</li>
								<li class="li-contacts">
									<h1 class="li-heading">
										<a href="https://twitter.com/WebnProject" target="_blank" data-toggle="tooltip" title="Twitter" data-placement="top">
											<i class="fab fa-twitter-square contact-img" style="color: #1da1f2;"></i>
										</a>
									</h1>
								</li>
								<li class="li-contacts">
									<h1 class="li-heading">
										<a href="https://github.com/Webinnovationph" data-toggle="tooltip" title="Github" data-placement="top">
											<i class="fab fa-github-square contact-img" style="color: #000000;"></i>
										</a>
									</h1>
								</li>
								<li class="li-contacts">
									<h1 class="li-heading">
										<a href="https://discordapp.com/invite/NkBtY4X" data-toggle="tooltip" title="Discord" data-placement="top">
											<i class="fab fa-discord contact-img" style="color: #7289da;"></i>
										</a>
									</h1>
								</li>
								<li class="li-contacts">
									<h1 class="li-heading">
										<a href="https://bitcointalk.org/index.php?topic=4640928.0" data-toggle="BitCoinTalk" title="Like us on Facebook" data-placement="top">
											<i class="fab fa-bitcoin contact-img" style="color: #ffb629;"></i>
										</a>
									</h1>
								</li>
								<li class="li-contacts">
									<h1 class="li-heading">
										<a href="https://t.me/WEBN_EngOfficial_GroupChat" data-toggle="tooltip" title="Telegram" data-placement="top">
											<i class="fab fa-telegram contact-img" style="color: #37aee2;"></i>
										</a>
									</h1>
								</li>
							</ul>
						</div>
						<blockquote class="blockquote text-center">
							<p class="pb-1">Company Address : 19/F Marco Polo Ortigas Manila, Sapphire Road, Ortigas Center, Pasig City, 1600 Metro Manila</p>
							<p class="pb-1">Email Address : info@webinnovationph.com</p>
							<p class="pb-1">Tel. # : (02) 240 8841</p>
						</blockquote>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('pages/users/_template/_footer'); ?>
	<?php $this->load->view('pages/users/_template/_jsscripts'); ?>
</body>
</html>