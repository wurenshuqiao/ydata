<?php
namespace Home\Controller;
use Think\Controller;
class TestController extends Controller {
    public function index(){
		$startdate=strtotime('2016-02-10');
		$enddate=strtotime("2016-2-20");
		$date=floor($enddate-$startdate)/86400;
		echo $date;
	}


	public function test(){
		// $begindate=strtotime('2016-02-10');
		// $enddate=strtotime('2016-2-20');
		// $step="1";

		

		// $s=floor($enddate-$begindata)/86400;
		// echo $s;

		 
		$begin_date=strtotime('2016-02-10');
		$end_date=strtotime('2016-02-20');
		// $date=floor($end_date-$begin_date)/86400;
		// echo $date;
		

		// function time_span($begin_date,$end_date,$step){
		//     if((strtotime($end_date)-strtotime($begin_data))/86400>$step){
		//         return false;
		//     }
		//     else{
		//         return true;
	 //    }

		$step='20';
	    
		
    if(time_span($end_date,$begin_date,$step)=='1')
    {
    	echo '1';
    }
    else
    {
    	echo '0';
    }



	    
	// }
}
}