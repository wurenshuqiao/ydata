<?php
namespace Api\Controller;
use Think\Controller;
use Org\WeiChat\WeiChatDataAnalysis;
class DataController extends Controller {
    //getusercumulate 获取累计用户数据
    public function getusercumulate(){
        $type0=convert_weichat_type('0');//开始吧
        $type1=convert_weichat_type('1');//差评
        $type2=convert_weichat_type('2');//二姑娘
        $type3=convert_weichat_type('3');//拇指阅读
        $type4=convert_weichat_type('4');//一人一城
        $begin_date = I('get.begin_date');
        $end_date = I('get.end_date');
        $WeiChatHelper0 = new WeiChatDataAnalysis($type0);
        $WeiChatHelper1 = new WeiChatDataAnalysis($type1);
        $WeiChatHelper2 = new WeiChatDataAnalysis($type2);
        $WeiChatHelper3 = new WeiChatDataAnalysis($type3);
        $WeiChatHelper4 = new WeiChatDataAnalysis($type4);
        if(time_span($begin_date,$end_date,7)){
            $res = res_arr("超出时间","400","");
        }else{
            try {
                $result[0] = $WeiChatHelper0->call('getusercumulate',$begin_date,$end_date);
                $result[1] = $WeiChatHelper1->call('getusercumulate',$begin_date,$end_date);
                //一人一城
                $result[2] = $WeiChatHelper4->call('getusercumulate',$begin_date,$end_date);
                $result[3] = $WeiChatHelper3->call('getusercumulate',$begin_date,$end_date);
                //二姑娘
                $result[4] = $WeiChatHelper2->call('getusercumulate',$begin_date,$end_date);
                $res = res_arr("返回成功","200",$result);
            } catch (Exception $e) {
                $res = res_arr("系统异常","400","");
            }   
        }
        $this->ajaxReturn($res);
    }

    //getusersummary 获取用户增减数据
    public function getusersummary(){
        $type0=convert_weichat_type('0');//开始吧
        $type1=convert_weichat_type('1');//差评
        $type2=convert_weichat_type('2');//二姑娘
        $type3=convert_weichat_type('3');//拇指阅读
        $type4=convert_weichat_type('4');//一人一城
        $begin_date = I('get.begin_date');
        $end_date = I('get.end_date');
        $WeiChatHelper0 = new WeiChatDataAnalysis($type0);
        $WeiChatHelper1 = new WeiChatDataAnalysis($type1);
        $WeiChatHelper2 = new WeiChatDataAnalysis($type2);
        $WeiChatHelper3 = new WeiChatDataAnalysis($type3);
        $WeiChatHelper4 = new WeiChatDataAnalysis($type4);
        if(time_span($begin_date,$end_date,7)){
            $res = res_arr("超出时间","400","");
        }else{
            try {
                $result[0] = $WeiChatHelper0->call('getusersummary',$begin_date,$end_date);
                $result[1] = $WeiChatHelper1->call('getusersummary',$begin_date,$end_date);
                //一人一城
                $result[2] = $WeiChatHelper4->call('getusersummary',$begin_date,$end_date);
                $result[3] = $WeiChatHelper3->call('getusersummary',$begin_date,$end_date);
                //二姑娘
                $result[4] = $WeiChatHelper2->call('getusersummary',$begin_date,$end_date);
                $res = res_arr("返回成功","200",$result);
            } catch (Exception $e) {
                $res = res_arr("系统异常","400","");
            }   
        }
        
        $this->ajaxReturn($res);
    }

    //getupstreammsg 获取消息发送概况数据
    public function getupstreammsg(){
        $type0=convert_weichat_type('0');//开始吧
        $type1=convert_weichat_type('1');//差评
        $type2=convert_weichat_type('2');//二姑娘
        $type3=convert_weichat_type('3');//拇指阅读
        $type4=convert_weichat_type('4');//一人一城
        $begin_date = I('get.begin_date');
        $end_date = I('get.end_date');
        $WeiChatHelper0 = new WeiChatDataAnalysis($type0);
        $WeiChatHelper1 = new WeiChatDataAnalysis($type1);
        $WeiChatHelper2 = new WeiChatDataAnalysis($type2);
        $WeiChatHelper3 = new WeiChatDataAnalysis($type3);
        $WeiChatHelper4 = new WeiChatDataAnalysis($type4);
        if(time_span($begin_date,$end_date,7)){
            $res = res_arr("超出时间","400","");
        }else{
            try {
                $result[0] = $WeiChatHelper0->call('getupstreammsg',$begin_date,$end_date);
                $result[1] = $WeiChatHelper1->call('getupstreammsg',$begin_date,$end_date);
                //一人一城
                $result[2] = $WeiChatHelper4->call('getupstreammsg',$begin_date,$end_date);
                $result[3] = $WeiChatHelper3->call('getupstreammsg',$begin_date,$end_date);
                //二姑娘
                $result[4] = $WeiChatHelper2->call('getupstreammsg',$begin_date,$end_date);
                $res = res_arr("返回成功","200",$result);
            } catch (Exception $e) {
                $res = res_arr("系统异常","400","");
            }   
        }
        
        $this->ajaxReturn($res);
    }

    //getupstreammsg 获取消息发送概况数据
    public function getupstreammsgdist(){
        $type0=convert_weichat_type('0');//开始吧
        $type1=convert_weichat_type('1');//差评
        $type2=convert_weichat_type('2');//二姑娘
        $type3=convert_weichat_type('3');//拇指阅读
        $type4=convert_weichat_type('4');//一人一城
        $begin_date = I('get.begin_date');
        $end_date = I('get.end_date');
        $WeiChatHelper0 = new WeiChatDataAnalysis($type0);
        $WeiChatHelper1 = new WeiChatDataAnalysis($type1);
        $WeiChatHelper2 = new WeiChatDataAnalysis($type2);
        $WeiChatHelper3 = new WeiChatDataAnalysis($type3);
        $WeiChatHelper4 = new WeiChatDataAnalysis($type4);
        if(time_span($begin_date,$end_date,7)){
            $res = res_arr("超出时间","400","");
        }else{
            try {
                $result[0] = $WeiChatHelper0->call('getupstreammsgdist',$begin_date,$end_date);
                $result[1] = $WeiChatHelper1->call('getupstreammsgdist',$begin_date,$end_date);
                //一人一城
                $result[2] = $WeiChatHelper4->call('getupstreammsgdist',$begin_date,$end_date);
                $result[3] = $WeiChatHelper3->call('getupstreammsgdist',$begin_date,$end_date);
                //二姑娘
                $result[4] = $WeiChatHelper2->call('getupstreammsgdist',$begin_date,$end_date);
                $res = res_arr("返回成功","200",$result);
            } catch (Exception $e) {
                $res = res_arr("系统异常","400","");
            }   
        }
        
        $this->ajaxReturn($res);
    }
}