			<nav class="navbar navbar-expand-xl navbar-light">
				<a class="navbar-brand" href="#">
					<img class="logo" src="<?=base_url()?>assets/users/img/logo.png" width="250"></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<i class="fas fa-bars"></i>
				</button>
				<div class="collapse navbar-collapse" id="navbar1">
					<ul class="navbar-nav ml-auto"> 
						<li class="nav-item">
				            <a class="nav-link" href="<?=base_url()?>Home"> Home <span class="sr-only">(current)</span></a>
				        </li>
				        <li class="nav-item">
				            <a class="nav-link" href="<?=base_url()?>Airdrops"> Airdrops </a>
				        </li>
				        <li class="nav-item">
				            <a class="nav-link" href="<?=base_url()?>Bounties"> Bounty </a>
				        </li>
				        <li class="nav-item">
				            <a class="nav-link" href="#"> List Your Coin/Token </a>
				        </li>
				        <li class="nav-item">
				            <a class="nav-link" href="#"> Buy WEBN token </a>
				        </li>
				        <li class="nav-item">
					        <a class="nav-link" href="<?=base_url()?>Contact"> Contact </a>
					    </li>
					    <li class="nav-item">
					        <a class="nav-link" href="<?=base_url()?>FAQs"> FAQs </a>
					    </li>

					    <?php

					    	if ($this->session->userdata('isActive') == 1) {
					    		echo '<li class="nav-item dropdown">
								        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								          '.$this->session->userdata('Fname').'
								        </a>
								        <div id="dropdown-menu" class="dropdown-menu zoomIn animated faster" aria-labelledby="navbarDropdown">
								          <a class="dropdown-item" href="#"><i class="fas fa-cog" style="color: #2A7AF3;"></i> Settings </a>
								          
								          <div class="dropdown-divider"></div>
								          <a class="dropdown-item" href="'.base_url().'Logout"><i class="fas fa-sign-out-alt" style="color: #FF0000;"></i> Log-out</a>
								        </div>
								      </li>';
					    	}
					    	else
					    	{
					    		echo '<li class="nav-item">
								    <a class="nav-link" href="'.base_url().'Login"> Login </a>
								</li>';
					    	}

					    ?>
					    <script type="text/javascript">
					    </script>
					</ul>
				</div>
			</nav>

