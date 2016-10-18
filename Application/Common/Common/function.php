<?php

function res_arr($msg,$code,$data){
    $res['msg'] = $msg;
    $res['code'] = $code;
    $res['data'] = $data;
    return $res;
}
function convert_weichat_type($type){
    switch ($type) {
        case '0':
            $weichat_type = 'KAISHIBA';
            break;
        case '1':
            $weichat_type = 'CHAPING';
            break;
        case '2':
            $weichat_type = 'ERGUNIANG';
            break;
        case '3':
            $weichat_type = 'MUZHI';
            break;
        case '4':
            $weichat_type = 'YIRENYICHENG';
            break;
        default:
            $weichat_type = 'YIRENYICHENG';
            break;
    }
    return $weichat_type;
}

function time_span($begin_date,$end_date,$step){
    if(ceil((strtotime($end_date)-strtotime($begin_date))/86400)>=$step){
        return true;
    }
    else{
        return false;
    }
}