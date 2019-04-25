<nav class="navbar navbar-expand-xl navbar-light">
	<a class="navbar-brand" href="<?=base_url()?>Home">
		<img class="logo" src="<?=base_url()?>assets/users/img/logo.png" width="250">
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<i class="fas fa-bars"></i>
	</button>
	<div class="collapse navbar-collapse" id="navbar1">
		<ul class="navbar-nav ml-auto"> 
			<li class="nav-item">
				<a class="nav-link" href="<?=base_url()?>Home"> Home <span class="sr-only">(current)</span></a>
			</li>
			<li class="dropdown">
				<a class="nav-link dropdown-toggle newdt" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Airdrops
				</a>
				<div id="dropdown-menu" class="dropdown-menu zoomIn animated faster" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="<?=base_url()?>Featured_Airdrops"><i class="far fa-star" style="color: #12DF17; margin-right: 5px;"></i> Featured </a>
					<a class="dropdown-item" href="<?=base_url()?>HOT"><i class="fas fa-fire-alt" style="color: #FF4E00	; margin-right: 5px;"></i> Hot </a>
					<a class="dropdown-item" href="<?=base_url()?>LATEST"><i class="fas fa-parachute-box" style="color: #25910C; margin-right: 5px;"></i> Latest </a>
				</div>
			</li>
			<li class="dropdown">
				<a class="nav-link dropdown-toggle newdt" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Apply to list
				</a>
				<div id="dropdown-menu" class="dropdown-menu zoomIn animated faster" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="<?=base_url()?>atl_regular"><i class="fas fa-parachute-box" style="color: #25910C; margin-right: 5px;"></i>
						Regular
					</a>
					<a class="dropdown-item" href="<?=base_url()?>atl_hot"><i class="fas fa-fire-alt" style="color: #FF4E00	; margin-right: 5px;"></i>
						Hot
					</a>
					<a class="dropdown-item" href="<?=base_url()?>atl_featured"><i class="far fa-star" style="color: #12DF17; margin-right: 5px;"></i>
						Featured
					</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?=base_url()?>BuyWEBN_Token"> Buy WEBN token </a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="https://freewebn.com/" target="_blank"> WEBN faucet </a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?=base_url()?>Contact"> Contact </a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?=base_url()?>FAQs"> FAQs </a>
			</li>
			<?php if (isset($_SESSION['isActive'])) { ?>
				<li class="dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-user" style="margin-right: 5px;"></i> Account
					</a>
					<div id="dropdown-menu" class="dropdown-menu zoomIn animated faster" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="<?=base_url()?>AccountSettings">
							<i class="fas fa-cog" style="color: #1B58B4; margin-right: 5px;"></i> Settings 
						</a>
					<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="<?=base_url()?>Logout">
							<i class="fas fa-sign-out-alt" style="color: #FF0000; margin-right: 5px;"></i> Logout 
						</a>
					</div>
				</li>
			<?php } else { ?>
				<li class="nav-item">
					<a class="nav-link" href="<?=base_url()?>Login"> Login </a>
				</li>
			<?php } ?>
		</ul>
	</div>
</nav>

