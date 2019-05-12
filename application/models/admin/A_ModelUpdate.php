<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_ModelUpdate extends CI_Model {
	
	public function Approve_Airdrop($data)
	{
		extract($data);
		$data = array(
			'RequestStatus' => 'Approved' ,
			'ExpirationDate' => $ExpirationDate,
			'ApproveDate' => $ApproveDate,
		);
		$this->db->where('airdrop_id', $airdrop_id);
		$result = $this->db->update('ab_airdrops', $data);
		return $result;
	}
	public function UpdateThisPrices($data)
	{
		extract($data);

		if ($Days <= 1) {
			$dayss = $Days . ' Day';
		}
		elseif ($Days < 7) {
			$dayss = $Days . ' Days';
		}
		elseif ($Days >= 7) {
			$remainder = $Days % 7;
			if ($remainder < 1) {
				$rema = '';
			}
			else
			{
				$rema = '.'.$remainder;
			}
			$divv = $Days / 7;
			if ($divv <= 1) {
				$dayss = round($divv) .''.$rema. ' Week';
			}
			else
			{
				$dayss = round($divv) .''.$rema. ' Weeks';
			}
		}

		$data = array(
			'Price' => $Price,
		);
		$this->db->where('PriceNo', $PriceNo);
		$result = $this->db->update('ab_prices', $data);
		return $result;
	}
	public function updatethisaddPrice($data)
	{
		extract($data);
		
		$data = array(
			'AdPrice' => $AdPrice,
		);
		$this->db->where('ad_PriceNo', $ad_PriceNo);
		$result = $this->db->update('ab_adprices', $data);
		return $result;
	}
}