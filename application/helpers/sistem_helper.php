<?php
if (!function_exists('konversi_uang')) {
	function konversi_uang($a)
	{
		if (isset($a)) {
			if ($a == '') {
				$a = 0;
			}
			$p 			= strlen($a);
			$hasil 		= number_format($a, 0);
			return "Rp. " . $hasil;
		}
	}
}

if (!function_exists('create_double')) {
	function create_double($data, $par1, $par2)
	{
		$output[''] = '--- Choose One ---';
		foreach ($data as $key => $val) {
			$output[$val[$par1]] = $val[$par2];
		}
		return $output;
	}
}
if (!function_exists('uangtodb')) {
	function uangtodb($a)
	{
		if (isset($a)) {
			if ($a == '') {
				$a = 0;
			}
			$p 			= preg_replace("/[^0-9]/", "", $a);
			return $p;
		}
	}
}
if (!function_exists('konversi_uang')) {
	function konversi_uang($a)
	{
		if (isset($a)) {
			if ($a == '') {
				$a = 0;
			}
			$p 			= strlen($a);
			$hasil 		= number_format($a, 2);
			return "Rp. " . $hasil;
		}
	}
}
