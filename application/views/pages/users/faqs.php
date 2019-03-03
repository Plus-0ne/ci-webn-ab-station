<?php $user_header;?>
<body>
<div class="wrapper">
	<div class="header-container">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 pt-5 pb-5">
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
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 p-5">


				</div>
			</div>
			<div class="row mt-5">
				<div class="col-lg-12 title-page-here">
					<h4 class="text-center">
						<i class="fas fa-question" style="color: #EA861B;"></i> &nbsp Frequently Asked Questions
					</h4>
					<br>
					<div id="accordion1" role="tablist">
					 	<div class="card">
					    	<div class="card-header" role="tab" id="headingOne">
					      		<h5 class="mb-0">
					      	  		<a id="toglepanel" data-toggle="collapse" href="#c1" aria-expanded="true" aria-controls="c1">
					      	  			What is Airdrops ?
					      	  		</a>
					     	 	</h5>
							</div>
							<div id="c1" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion1">
						    	<div class="card-body">
						        	What Is Airdrop in Crypto World? An airdrop for a cryptocurrency is a procedure of distributing new tokens/coins by awarding them in a certain proportion to existing holders of a particular blockchain currency, such as Bitcoin or Ethereum etc.
						    	</div>
							</div>
						</div>
					</div>
					<br>
					<div id="accordion2" role="tablist">
					 	<div class="card">
					    	<div class="card-header" role="tab" id="headingOne">
					      		<h5 class="mb-0">
					      	  		<a id="toglepanel" data-toggle="collapse" href="#c2" aria-expanded="true" aria-controls="c2">
					      	  			What is Bounties ? 
					      	  		</a>
					     	 	</h5>
							</div>
							<div id="c2" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion2">
						    	<div class="card-body">
						        	Bounty programs are incentives offered to an array of participants for various activities associated with an initial coin offering
						    	</div>
							</div>
						</div>
					</div>
					<br>
					<div id="accordion3" role="tablist">
					 	<div class="card">
					    	<div class="card-header" role="tab" id="headingOne">
					      		<h5 class="mb-0">
					      	  		<a id="toglepanel" data-toggle="collapse" href="#c3" aria-expanded="true" aria-controls="c2">
					      	  			What is Bounties ? 
					      	  		</a>
					     	 	</h5>
							</div>
							<div id="c3" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion3">
						    	<div class="card-body">
						        	Bounty programs are incentives offered to an array of participants for various activities associated with an initial coin offering
						    	</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('pages/users/_template/_footer'); ?>
<?php $user_jsscripts;?>
</body>
</html>