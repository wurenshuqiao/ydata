<?php
	function time_span($end_date,$begin_date,$step){
        if(floor($end_date-$begin_date)/86400>$step){
            return '1';
        }
        else{
        	return '0';
        }
    }