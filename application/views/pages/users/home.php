<?php $user_header;?>
<body>
<div class="wrapper">
	<div class="header-container">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 pt-4 pb-4">
					<div class="col-lg-12 col-sm-12 pt-5 pb-5">
						<?php $this->load->view('pages/users/_template/_navbar'); ?>
					</div>	
				</div>
			</div>
		</div>
	</div>
	<div class="ads-container">
		<div class="container">

		</div>
	</div>
	<div class="content-container">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 pt-4 pb-4">
					<a class="fx-widget" data-widget="header-ticker" data-width="100%" data-instruments="bch-usd_pair,btc-usd_pair,eos-usd_pair,eth-usd_pair,ltc-usd_pair,trx-usd_pair,usdt-usd_pair,xlm-usd_pair,xrp-usd_pair,bnb-usd_pair" data-text-color="#333333" data-divider-color="#585858" data-background-color="#ffffff" data-url="//www.fxempire.com" href="https://www.fxempire.com" rel="nofollow" style="font-family:Helvetica;font-size:16px;line-height:1.5;text-decoration:none;"> <span style="color:#999999;display:inline-block;margin-top:10px;font-size:12px;">Powered By </span> <img style="width:87px; height:14px;" src="https://www.fxempire.com/logo-full.svg" alt="FX Empire logo" /> </a> <script async charset="utf-8" src="https://widgets.fxempire.com/widget.js" ></script>
					<!-- 
					<?php
						$json = file_get_contents('https://min-api.cryptocompare.com/data/price?tryConversion=true&fsym=BTC&tsyms=USD,JPY,EUR');
						$json = json_decode($json,true);
						echo '|';
						echo '1 BTC = $ '.$json['USD'];
						echo '&nbsp <i class="fas fa-dot-circle"></i> &nbsp';
						$json = file_get_contents('https://min-api.cryptocompare.com/data/price?tryConversion=true&fsym=ETH&tsyms=USD,JPY,EUR');
						$json = json_decode($json,true);
						echo '1 ETH = $ '.$json['USD'];
						echo '&nbsp <i class="fas fa-dot-circle"></i> &nbsp';
						$json = file_get_contents('https://min-api.cryptocompare.com/data/price?tryConversion=true&fsym=XRP&tsyms=USD,JPY,EUR');
						$json = json_decode($json,true);
						echo '1 XRP = $ '.$json['USD'];
						echo '&nbsp <i class="fas fa-dot-circle"></i> &nbsp';
						$json = file_get_contents('https://min-api.cryptocompare.com/data/price?tryConversion=true&fsym=EOS&tsyms=USD,JPY,EUR');
						$json = json_decode($json,true);
						echo '1 EOS = $ '.$json['USD'];
						echo '&nbsp <i class="fas fa-dot-circle"></i> &nbsp';
					?>
				-->
				</div>
			</div>
			<div class="row mt-5">
				<div class="col-lg-12 title-page-here">
					<h4 class="text-center">
						TOP RATED
					</h4>
				</div>
				<div class="col-lg-3 col-sm-12 pt-4 pb-4">
					<div class="content-widget animated fadeIn">
						<div class="content-image">
							<img class="ratio rounded-circle" src="" style="background-image: url(https://airdrops.io/wp-content/uploads/2019/02/Cryptomood-logo.png);">
						</div>
						<div class="content-details">
							Ferum Network
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-12 pt-4 pb-4">
					<div class="content-widget animated fadeIn">
						<div class="content-image">
							<img class="ratio rounded-circle" src="" style="background-image: url(https://airdrops.io/wp-content/uploads/2019/02/Cryptomood-logo.png);">
						</div>
						<div class="content-details">
							WEBN Token
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-12 pt-4 pb-4">
					<div class="content-widget animated fadeIn">
						<div class="content-image">
							<img class="ratio rounded-circle" src="" style="background-image: url(https://airdrops.io/wp-content/uploads/2019/02/Cryptomood-logo.png);">
						</div>
						<div class="content-details">
							body
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-12 pt-4 pb-4">
					<div class="content-widget animated fadeIn">
						<div class="content-image">
							<img class="ratio rounded-circle" src="" style="background-image: url(https://airdrops.io/wp-content/uploads/2019/02/Cryptomood-logo.png);">
						</div>
						<div class="content-details">
							body
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-5">
				<div class="col-lg-12 title-page-here">
					<h4 class="text-center">
						LATEST AIRDROP
					</h4>
				</div>
				<div class="col-lg-4 col-sm-12 pt-4 pb-4">
					<div class="content-widget animated fadeIn">
						<div class="content-image">
							<img class="ratio rounded-circle" src="" style="background-image: url(https://airdrops.io/wp-content/uploads/2019/02/Cryptomood-logo.png);">
						</div>
						<div class="content-details">
							body
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-12 pt-4 pb-4">
					<div class="content-widget animated fadeIn">
						<div class="content-image">
							<img class="ratio rounded-circle" src="" style="background-image: url(https://airdrops.io/wp-content/uploads/2019/02/Cryptomood-logo.png);">
						</div>
						<div class="content-details">
							body
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-12 pt-4 pb-4">
					<div class="content-widget animated fadeIn">
						<div class="content-image">
							<img class="ratio rounded-circle" src="" style="background-image: url(https://airdrops.io/wp-content/uploads/2019/02/Cryptomood-logo.png);">
						</div>
						<div class="content-details">
							body
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-5">
				<div class="col-lg-12 title-page-here">
					<h4 class="text-center">
						LATEST BOUNTY
					</h4>
				</div>
				<div class="col-lg-4 col-sm-12 pt-4 pb-4">
					<div class="card">
						<div class="card-title">
							<label id=""></label>
						</div>
						<div class="card-body">
							body
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-12 pt-4 pb-4">
					<div class="card">
						<div class="card-title">
							title
						</div>
						<div class="card-body">
							body
						</div>
					</div>				</div>
				<div class="col-lg-4 col-sm-12 pt-4 pb-4">
					<div class="card">
						<div class="card-title">
							title
						</div>
						<div class="card-body">
							body
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 pt-5 pb-5">
				<?php $this->load->view('pages/users/_template/_footer'); ?>
			</div>
		</div>
	</div>
</div>
<?php $user_jsscripts;?>
</body>
</html>