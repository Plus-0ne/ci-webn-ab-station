<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>
		Hydro Authentication Errror
	</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12" style="height: 300px; background-color: #102026;">
			
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 col-md-4 m-auto p-5 text-center">
			<h3>
				<?php echo $hydromessage;?>
			</h3>
			<br>
			<h5>
				<li>
					Use this Code in your Hydro APP
				</li>
			</h5>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 col-md-4 m-auto p-5 text-center">
			<?php echo form_open(base_url().'VerifyHydroAuth', 'method="POST"');?>
			<input type="hidden" name="hydromessage" value="<?php echo $hydromessage;?>">
			<input class="btn btn-primary" type="submit" value="Authenticate" style="font-size: 24px; padding: 16px;">
			<?php echo form_close()?>
		</div>
	</div>
</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>