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
				            <a class="f-nav-link" href="<?=base_url()?>Airdrops"><i class="fas fa-angle-right"></i> Airdrops </a>
				        </li>
				        <li class="f-nav-item">
				            <a class="f-nav-link" href="<?=base_url()?>Bounties"><i class="fas fa-angle-right"></i> Bounty </a>
				        </li>
				        <li class="f-nav-item">
				            <a class="f-nav-link" href="#"><i class="fas fa-angle-right"></i> List Your Coin/Token </a>
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
					    <li class="f-nav-item">
					        <a class="f-nav-link" href="<?=base_url()?>Login"><i class="fas fa-angle-right"></i> Login </a>
					    </li>
					    <li class="f-nav-item">
					        <a class="f-nav-link" href="<?=base_url()?>Sign-Up"><i class="fas fa-angle-right"></i> Sign-up </a>
					    </li>
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
			<div class="col-lg-12 pb-2">
				<?php
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, 'https://api.coinmarketcap.com/v1/ticker/');
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					$json_object= curl_exec($ch);
					curl_close($ch);

					$json_decoded = json_decode($json_object,true);

					$assocArray= new RecursiveIteratorIterator(
				    new RecursiveArrayIterator($json_decoded),
				    RecursiveIteratorIterator::LEAVES_ONLY);

					
				    foreach ($assocArray as $key => $val) {
				    	if ($key == 'symbol') {
					    	echo '<h4>'.$val.'</h4>';
					    }
					    if ($key == 'rank') {
					    	echo '<span style="font-size:14px;"><i class="fas fa-angle-right"></i> Rank : '.$val.' </span>';
					    }
					    if ($key == 'price_usd') {
					    	echo '<span style="font-size:14px;"><i class="fas fa-angle-right"></i> USD : '.$val.' </span>';
					    }
					    if ($key == '24h_volume_usd') {
					    	echo '<span style="font-size:14px;"><i class="fas fa-angle-right"></i> 24h Volume : '.$val.' </span>';
					    }
					    if ($key == 'market_cap_usd') {
					    	echo '<span style="font-size:14px;"><i class="fas fa-angle-right"></i> Market Cap : '.$val.' </span>';
					    }
					    if ($key == 'percent_change_1h') {
					    	echo '<span style="font-size:14px;"><i class="fas fa-angle-right"></i> Change : '.$val.'% </span>';
					    }
					}
					?> 
			</div>
		</div>
	</div>
</div>
