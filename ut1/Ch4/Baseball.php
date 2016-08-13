<?php
namespace stats;

class Baseball
{
	public function calc_avg($ab,$hits)
	{
		if($ab == 0)
		{
			$avg = "0.000";
		}
		else
		{
			$avg = number_format($hits/$ab,3);
		}
		return $avg;
	}
	
	 public function submitAtBat($playerid,$result)
	{
		//insert into database
		return true;
	}
}
?>