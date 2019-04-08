<?php
// $AirdropID = $AirdropID;
$Expiration = $Expiration;
$PaymentDetails = $PaymentDetails;

$currentDate = date("Y-m-d h:i:s a");

$cDate = new DateTime($currentDate);
$ExpDate = new DateTime($Expiration);

$difference = $cDate->diff($ExpDate);
if ($PaymentDetails == '24hrs') {
	if ($ExpDate < $cDate) {
		echo '<div style="padding: 9px; position: relative; color: #E52828;"><i class="fas fa-hourglass-end"></i> Expired </div>';
		// $this->Model_Update->ChangetoExpired($AirdropID);
	}
	else
	{
		$total = $difference->format("%H:%I:%S left");
		echo '<div style="padding: 9px; position: relative; color: #21C415;"><i class="fas fa-hourglass-start">&nbsp</i> '.$total.'</div>';
	}
} elseif ($PaymentDetails == '48hrs') {
	if ($ExpDate < $cDate) {
		echo '<div style="padding: 9px; position: relative; color: #E52828;"><i class="fas fa-hourglass-end"></i> Expired </div>';
		// $this->Model_Update->ChangetoExpired($AirdropID);
	}
	else
	{
		if ($difference->format('%d') == 0) {
			$total = $difference->format("%H:%I:%S left");
			echo '<div style="padding: 9px; position: relative; color: #21C415;"><i class="fas fa-hourglass-start">&nbsp</i> '.$total.'</div>';
		}
		else
		{
			$total = $difference->format('%d Day %H hrs left');
			echo '<div style="padding: 9px; position: relative; color: #21C415;"><i class="fas fa-hourglass-start">&nbsp</i> '.$total.'</div>';
		}
	}
} elseif ($PaymentDetails == '1week') {
	if ($ExpDate < $cDate) {
		echo '<div style="padding: 9px; position: relative; color: #E52828;"><i class="fas fa-hourglass-end"></i> Expired </div>';
		// $this->Model_Update->ChangetoExpired($AirdropID);
	}
	else
	{
		if ($difference->format('%d') == 0) {
			$total = $difference->format("%H:%I:%S left");
			echo '<div style="padding: 9px; position: relative; color: #21C415;"><i class="fas fa-hourglass-start">&nbsp</i> '.$total.'</div>';
		}
		else
		{
			$total = $difference->format("%d Days %H hrs left");
			echo '<div style="padding: 9px; position: relative; color: #21C415;"><i class="fas fa-hourglass-start">&nbsp</i> '.$total.'</div>';
		}
	}
}
?>