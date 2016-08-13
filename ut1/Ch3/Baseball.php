<?php

/**
 * Nicole Bassen
 * 7/24/16
 * IT 355 - Unit Testing I
 */

namespace stats;

class Baseball
{
	/**
	*
	* Add two given values together and divide by 2
	*
	*/
   	private function calc_avg($ab,$hits)
	{
		if (!is_numeric($ab)) {
			$avg = 'Not a number';
			return $avg;
			exit();
		}
		
		if ($ab == 0)
		{
			$avg = "0.000";
		}
		else
		{
			$avg = number_format($hits/$ab, 3);
		}
		return $avg;
	}

	/**
	* 
	* On Base Percentage
	*
	*
	*/

	private function calc_obp($ab,$bb,$hp,$sac,$hits)
  	{
	if (!($total=$ab + $bb + $hp + $sac))
	{
		$obp = "0.000";
	}
	else
	{
		$obp = number_format(($hits + $bb + $hp + $sac) / $total,3);
	}
	return $obp;
 	 }	// end calc_obp

	//
	// calculate slugging percentage 
	//
	private function calc_slg($ab,$singles,$doubles,$triples,$hr)
	{
		if ($ab == 0)
		{
			$slg = "0.000";
		}
		else
		{
			$slg = number_format((($singles*1)+($doubles*2)+($triples*3)+($hr*4))/$ab, 3);
		}
		return $slg;
	}//end calc_slg
	
	private function calc_ops($slg, $obp)
	{
	 $ops = $slg + $obp;
	 return $ops;
	}


}
?>