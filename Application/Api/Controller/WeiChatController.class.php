<?php
 namespace Api\Controller;
 use Think\Controller;
 use Org\WeiChat\WeiChatDataAnalysis;
 class WeiChatController extends Controller {
    // 获取用户增减数据
    public function getusersummary(){
        $type = convert_weichat_type(I('get.type'));
        $begin_date = I('get.begin_date');
        $end_date = I('get.end_date');
        $WeiChatHelper = new WeiChatDataAnalysis($type);
        // 判断时间跨度,如果超出时间跨度,返回错误信息
        // 最大时间跨度7天
        // 请求数据
        if(time_span($begin_date,$end_date,7)){
            $res = res_arr("超出时间","400","");
        }else{
            try {
            $result = $WeiChatHelper->call('getusersummary',$begin_date,$end_date);
            // 得到的数据 有时候需要处理
            $res = res_arr("返回成功","200",$result);
        } catch (Exception $e) {
            $res = res_arr("系统异常","400","");
        }   
    }
        
        $this->ajaxReturn($res);
    }

    // 获取累计用户数据
    public function getusercumulate(){
        $type = convert_weichat_type(I('get.type'));
        $begin_date = I('get.begin_date');
        $end_date = I('get.end_date');
        $WeiChatHelper = new WeiChatDataAnalysis($type);
        // 判断时间跨度,如果超出时间跨度,返回错误信息(判断时间跨度的方法,如果)
        if(time_span($begin_date,$end_date,7)){
            $res = res_arr("超出时间","400","");
        }
        else{
            try {
            $result = $WeiChatHelper->call('getusercumulate',$begin_date,$end_date);
            // 得到的数据 有时候需要处理
            $res = res_arr("返回成功","200",$result);
        } catch (Exception $e) {
            $res = res_arr("系统异常","400","");
        }
    }
        $this->ajaxReturn($res);
    }

     // 获取图文群发每日数据
    public function getarticlesummary(){
        $type = convert_weichat_type(I('get.type'));
        $begin_date = I('get.begin_date');
        $end_date = I('get.end_date');
        $WeiChatHelper = new WeiChatDataAnalysis($type);
        // 判断时间跨度,如果超出时间跨度,返回错误信息(判断时间跨度的方法,如果)
        if(time_span($begin_date,$end_date,1)){
            $res = res_arr("超出时间","400","");
        }
        else{
            try {
            $result = $WeiChatHelper->call('getarticlesummary',$begin_date,$end_date);
            // 得到的数据 有时候需要处理
            $res = res_arr("返回成功","200",$result);
        } catch (Exception $e) {
            $res = res_arr("系统异常","400","");
        }
    }
        $this->ajaxReturn($res);
    }

    //获取图文群发总数据
    public function getarticletotal(){
        $type = convert_weichat_type(I('get.type'));
        $begin_date = I('get.begin_date');
        $end_date = I('get.end_date');
        $WeiChatHelper = new WeiChatDataAnalysis($type);
        // 判断时间跨度,如果超出时间跨度,返回错误信息(判断时间跨度的方法,如果)
        if(time_span($begin_date,$end_date,1)){
            $res = res_arr("超出时间","400","");
        }
        else{
            try {
            $result = $WeiChatHelper->call('getarticletotal',$begin_date,$end_date);
            // 得到的数据 有时候需要处理
            $res = res_arr("返回成功","200",$result);
        } catch (Exception $e) {
            $res = res_arr("系统异常","400","");
        }
    }
        $this->ajaxReturn($res);
    }

    //获取图文统计数据
    public function getuserread(){
        $type = convert_weichat_type(I('get.type'));
        $begin_date = I('get.begin_date');
        $end_date = I('get.end_date');
        $WeiChatHelper = new WeiChatDataAnalysis($type);
        // 判断时间跨度,如果超出时间跨度,返回错误信息(判断时间跨度的方法,如果)
        if(time_span($begin_date,$end_date,3)){
            $res = res_arr("超出时间","400","");
        }
        else{
            try {
            $result = $WeiChatHelper->call('getuserread',$begin_date,$end_date);
            // 得到的数据 有时候需要处理
            $res = res_arr("返回成功","200",$result);
        } catch (Exception $e) {
            $res = res_arr("系统异常","400","");
        }
    }
        $this->ajaxReturn($res);
    }

    //获取图文统计分时数据
    public function getuserreadhour(){
        $type = convert_weichat_type(I('get.type'));
        $begin_date = I('get.begin_date');
        $end_date = I('get.end_date');
        $WeiChatHelper = new WeiChatDataAnalysis($type);
        // 判断时间跨度,如果超出时间跨度,返回错误信息(判断时间跨度的方法,如果)
        if(time_span($begin_date,$end_date,1)){
            $res = res_arr("超出时间","400","");
        }
        else{
            try {
            $result = $WeiChatHelper->call('getuserreadhour',$begin_date,$end_date);
            // 得到的数据 有时候需要处理
            $res = res_arr("返回成功","200",$result);
        } catch (Exception $e) {
            $res = res_arr("系统异常","400","");
        }
    }
        $this->ajaxReturn($res);
    }

    //获取图文分享转发数据
    public function getusershare(){
        $type = convert_weichat_type(I('get.type'));
        $begin_date = I('get.begin_date');
        $end_date = I('get.end_date');
        $WeiChatHelper = new WeiChatDataAnalysis($type);
        // 判断时间跨度,如果超出时间跨度,返回错误信息(判断时间跨度的方法,如果)
        if(time_span($begin_date,$end_date,7)){
            $res = res_arr("超出时间","400","");
        }
        else{
            try {
            $result = $WeiChatHelper->call('getusershare',$begin_date,$end_date);
            // 得到的数据 有时候需要处理
            $res = res_arr("返回成功","200",$result);
        } catch (Exception $e) {
            $res = res_arr("系统异常","400","");
        }
    }
        $this->ajaxReturn($res);
    }

    //获取图文分享转发分时数据
    public function getusersharehour(){
        $type = convert_weichat_type(I('get.type'));
        $begin_date = I('get.begin_date');
        $end_date = I('get.end_date');
        $WeiChatHelper = new WeiChatDataAnalysis($type);
        // 判断时间跨度,如果超出时间跨度,返回错误信息(判断时间跨度的方法,如果)
        if(time_span($begin_date,$end_date,7)){
            $res = res_arr("超出时间","400","");
        }
        else{
            try {
            $result = $WeiChatHelper->call('getusersharehour',$begin_date,$end_date);
            // 得到的数据 有时候需要处理
            $res = res_arr("返回成功","200",$result);
        } catch (Exception $e) {
            $res = res_arr("系统异常","400","");
        }
    }
        $this->ajaxReturn($res);
    }

    // 获取消息发送概况数据
    public function getupstreammsg(){
        $type = convert_weichat_type(I('get.type'));
        $begin_date = I('get.begin_date');
        $end_date = I('get.end_date');
        $WeiChatHelper = new WeiChatDataAnalysis($type);
        // 判断时间跨度,如果超出时间跨度,返回错误信息(判断时间跨度的方法,如果)
        if(time_span($begin_date,$end_date,7)){
            $res = res_arr("超出时间","400","");
        }
        else{
            try {
            $result = $WeiChatHelper->call('getupstreammsg',$begin_date,$end_date);
            // 得到的数据 有时候需要处理
            $res = res_arr("返回成功","200",$result);
        } catch (Exception $e) {
            $res = res_arr("系统异常","400","");
        }
    }
        $this->ajaxReturn($res);
    }
    // 获取消息分送分时数据
    public function getupstreammsghour(){
        $type = convert_weichat_type(I('get.type'));
        $begin_date = I('get.begin_date');
        $end_date = I('get.end_date');
        $WeiChatHelper = new WeiChatDataAnalysis($type);
        // 判断时间跨度,如果超出时间跨度,返回错误信息(判断时间跨度的方法,如果)
        if(time_span($begin_date,$end_date,1)){
            $res = res_arr("超出时间","400","");
        }
        else{
            try {
            $result = $WeiChatHelper->call('getupstreammsghour',$begin_date,$end_date);
            // 得到的数据 有时候需要处理
            $res = res_arr("返回成功","200",$result);
        } catch (Exception $e) {
            $res = res_arr("系统异常","400","");
        }
    }
        $this->ajaxReturn($res);
    }
    // 获取消息发送周数据
    public function getupstreammsgweek(){
        $type = convert_weichat_type(I('get.type'));
        $begin_date = I('get.begin_date');
        $end_date = I('get.end_date');
        $WeiChatHelper = new WeiChatDataAnalysis($type);
        // 判断时间跨度,如果超出时间跨度,返回错误信息(判断时间跨度的方法,如果)
        if(time_span($begin_date,$end_date,30)){
            $res = res_arr("超出时间","400","");
        }
        else{
            try {
            $result = $WeiChatHelper->call('getupstreammsgweek',$begin_date,$end_date);
            // 得到的数据 有时候需要处理
            $res = res_arr("返回成功","200",$result);
        } catch (Exception $e) {
            $res = res_arr("系统异常","400","");
        }
    }
        $this->ajaxReturn($res);
    }
    // 获取消息发送月数据
    public function getupstreammsgmonth(){
        $type = convert_weichat_type(I('get.type'));
        $begin_date = I('get.begin_date');
        $end_date = I('get.end_date');
        $WeiChatHelper = new WeiChatDataAnalysis($type);
        // 判断时间跨度,如果超出时间跨度,返回错误信息(判断时间跨度的方法,如果)
        if(time_span($begin_date,$end_date,30)){
            $res = res_arr("超出时间","400","");
        }
        else{
            try {
            $result = $WeiChatHelper->call('getupstreammsgmonth',$begin_date,$end_date);
            // 得到的数据 有时候需要处理
            $res = res_arr("返回成功","200",$result);
        } catch (Exception $e) {
            $res = res_arr("系统异常","400","");
        }
    }
        $this->ajaxReturn($res);
    }
    // 获取消息发送分布数据
    public function getupstreammsgdist(){
        $type = convert_weichat_type(I('get.type'));
        $begin_date = I('get.begin_date');
        $end_date = I('get.end_date');
        $WeiChatHelper = new WeiChatDataAnalysis($type);
        // 判断时间跨度,如果超出时间跨度,返回错误信息(判断时间跨度的方法,如果)
        if(time_span($begin_date,$end_date,15)){
            $res = res_arr("超出时间","400","");
        }
        else{
            try {
            $result = $WeiChatHelper->call('getupstreammsgdist',$begin_date,$end_date);
            // 得到的数据 有时候需要处理
            $res = res_arr("返回成功","200",$result);
        } catch (Exception $e) {
            $res = res_arr("系统异常","400","");
        }
    }
        $this->ajaxReturn($res);
    }
    // 获取消息发送分布周数据
    public function getupstreammsgdistweek(){
        $type = convert_weichat_type(I('get.type'));
        $begin_date = I('get.begin_date');
        $end_date = I('get.end_date');
        $WeiChatHelper = new WeiChatDataAnalysis($type);
        // 判断时间跨度,如果超出时间跨度,返回错误信息(判断时间跨度的方法,如果)
        if(time_span($begin_date,$end_date,30)){
            $res = res_arr("超出时间","400","");
        }
        else{
            try {
            $result = $WeiChatHelper->call('getupstreammsgdistweek',$begin_date,$end_date);
            // 得到的数据 有时候需要处理
            $res = res_arr("返回成功","200",$result);
        } catch (Exception $e) {
            $res = res_arr("系统异常","400","");
        }
    }
        $this->ajaxReturn($res);
    }
    // 获取消息发送分布月数据
    public function getupstreammsgdistmonth(){
        $type = convert_weichat_type(I('get.type'));
        $begin_date = I('get.begin_date');
        $end_date = I('get.end_date');
        $WeiChatHelper = new WeiChatDataAnalysis($type);
        // 判断时间跨度,如果超出时间跨度,返回错误信息(判断时间跨度的方法,如果)
        if(time_span($begin_date,$end_date,30)){
            $res = res_arr("超出时间","400","");
        }
        else{
            try {
            $result = $WeiChatHelper->call('getupstreammsgdistmonth',$begin_date,$end_date);
            // 得到的数据 有时候需要处理
            $res = res_arr("返回成功","200",$result);
        } catch (Exception $e) {
            $res = res_arr("系统异常","400","");
        }
    }
        $this->ajaxReturn($res);
    }

    // 获取接口分析数据
    public function getinterfacesummary(){
        $type = convert_weichat_type(I('get.type'));
        $begin_date = I('get.begin_date');
        $end_date = I('get.end_date');
        $WeiChatHelper = new WeiChatDataAnalysis($type);
        // 判断时间跨度,如果超出时间跨度,返回错误信息(判断时间跨度的方法,如果)
        if(time_span($begin_date,$end_date,30)){
            $res = res_arr("超出时间","400","");
        }
        else{
            try {
            $result = $WeiChatHelper->call('getinterfacesummary',$begin_date,$end_date);
            // 得到的数据 有时候需要处理
            $res = res_arr("返回成功","200",$result);
        } catch (Exception $e) {
            $res = res_arr("系统异常","400","");
        }
    }
        $this->ajaxReturn($res);
    }
    // 获取接口分析分时数据
    public function getinterfacesummaryhour(){
        $type = convert_weichat_type(I('get.type'));
        $begin_date = I('get.begin_date');
        $end_date = I('get.end_date');
        $WeiChatHelper = new WeiChatDataAnalysis($type);
        // 判断时间跨度,如果超出时间跨度,返回错误信息(判断时间跨度的方法,如果)
        if(time_span($begin_date,$end_date,1)){
            $res = res_arr("超出时间","400","");
        }
        else{
            try {
            $result = $WeiChatHelper->call('getinterfacesummaryhour',$begin_date,$end_date);
            // 得到的数据 有时候需要处理
            $res = res_arr("返回成功","200",$result);
        } catch (Exception $e) {
            $res = res_arr("系统异常","400","");
        }
    }
        $this->ajaxReturn($res);
    }
 }