<?php
$old_date = $ApproveDate;
$old_date_timestamp = strtotime($old_date);
$new_date = date('F j, Y, g:i a', $old_date_timestamp);

echo '<br>
<i class="far fa-calendar-check" style="color: #353535;"></i>&nbsp '.$new_date;

$currentDate = date("Y-m-d h:i:s a");

$dateApproved = $ApproveDate;

$cDate = new DateTime($currentDate);
$aDate = new DateTime($old_date);

$interval = $aDate->diff($cDate);

if ($interval->format('%d') >= 1) {
	if ($interval->format('%d') == 1) {
		echo '<br><i class="fas fa-clock" style="color: #353535;">&nbsp</i> '.$interval->format('%d').' day ago';
	}
	else
	{
		echo '<br><i class="fas fa-clock" style="color: #353535;">&nbsp</i> '.$interval->format('%d').' days ago';
	}
} elseif ($interval->format('%h') >= 1) {
	if ($interval->format('%h') == 1) {
		echo '<br><i class="fas fa-clock" style="color: #353535;">&nbsp</i> '.$interval->format('%h').' hour ago';
	}
	else
	{
		echo '<br><i class="fas fa-clock" style="color: #353535;">&nbsp</i> '.$interval->format('%h').' hours ago';
	}
} elseif ($interval->format('%i') >= 1) {
	if ($interval->format('%i') == 1) {
		echo '<br><i class="fas fa-clock" style="color: #353535;">&nbsp</i> '.$interval->format('%i').' min ago';
	}
	else
	{
		echo '<br><i class="fas fa-clock" style="color: #353535;">&nbsp</i> '.$interval->format('%i').' mins ago';
	}
} elseif ($interval->format('%s') >= 0) {
	echo '<br><i class="fas fa-clock" style="color: #353535;">&nbsp</i> '.$interval->format('%s').' seconds ago';
}
else
{
	echo '<br><i class="fas fa-clock" style="color: #353535;">&nbsp</i> '.$interval->format('%s').' seconds ago';
}
?>