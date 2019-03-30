<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>
		Hydro Authentication Error
	</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<style type="text/css">
		.btn
		{
			border-radius: 1px;
			padding: 13px;
		}
	</style>
</head>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 p-5 text-center" style="height: 300px; background-color: #102026;">
			<div class="" style="color: white;">
				<!-- <a href="<?=base_url()?>Home">
					<img class="logo" src="<?=base_url()?>assets/users/img/logo.png" width="350"></a>
				</a> -->
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 col-md-4 m-auto p-5 text-center" style="color: #C72020;">
			<h1>
				<i class="fas fa-exclamation-triangle"></i>
			</h1>
			<br>
			<h3>
				Signature Error : Signature Expired.
			</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 col-md-4 m-auto p-5 text-center">
			<?php echo '<a style="color: #FFFFFF;" class="btn btn-info" href="'.$_SERVER['HTTP_REFERER'].'"><h4><i class="fas fa-chevron-left"></i> Back </h4></a>'; ?>
		</div>
	</div>
</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>