<?php
 namespace Api\Controller;
 use Think\Controller;
 use Org\YouMeng\YouMengDataAnalysis;
 class YouMengController extends Controller {
    // 获取apps列表
    public function apps(){
        // 实例化友盟数据助手
        $YouMengHelper = new YouMengDataAnalysis();
        // 这里接收前端传过来的一些参数
        $per_page = I('get.per_page');
        $page = I('get.page');
        $q = I('get.q');
        //把这些参数拼成一个数组 map map的键值 参考
        //api文档
        $map['per_page'] = $per_page;
        $map['page'] = $page;
        $map['q'] = $q;

        // try一下 免得有异常
        try {
            // 这里调用
            $result = $YouMengHelper->call('apps',$map);
            // 得到的数据 有时候需要处理
            $res = res_arr("返回成功","200",$result);
        } catch (Exception $e) {
            $res = res_arr("系统异常","400","");
        }   
        $this->ajaxReturn($res);
    }

    // 获取apps数量
    public function appsCount(){
        $YouMengHelper = new YouMengDataAnalysis();
        try {
            $result = $YouMengHelper->call('apps/count',null);
            $res = res_arr("返回成功","200",$result);
        } catch (Exception $e) {
            $res = res_arr("系统异常","400","");
        }   
        $this->ajaxReturn($res);
    }

    //获取apps的基本数据
    public function appsBaseData(){
        $YouMengHelper = new YouMengDataAnalysis();
        try {
            $result = $YouMengHelper->call('apps/base_data',null);
            $res = res_arr("返回成功","200",$result);
        } catch (Exception $e) {
            $res = res_arr("系统异常","400","");
        }   
        $this->ajaxReturn($res);
    }

    
    // public function channels(){
    //     $type = I('get.type'); //ios or  android
    //     var_dump($type);
    //     $config = C('YOUMENG_APP_KEY');
    //     var_dump($config);
    //     $appkey = $config[strtoupper($type)];
    //     var_dump($ios);
    //     $map['appkey'] = $appkey;
    //     $map['page'] = $page;
    //     $map['q'] = $q;
    // }
     
    //渠道列表
    public function channels(){
        $YouMengHelper = new YouMengDataAnalysis();
        $type = I('get.type');
        $config = C('YOUMENG_APP_KEY');
        $appkey = $config[strtoupper($type)];
        // $date = I('get.date');
        // $per_page = I('get.per_page');
        $page = I('get.page');
        $map['appkey'] = $appkey;
        // $map['date'] = $date;
        // $map['per_page'] = $per_page;
        $map['page'] = $page;
        try {
            $result = $YouMengHelper->call('channels',$map);
            $res = res_arr("返回成功","200",$result);
        } catch (Exception $e) {
            $res = res_arr("系统异常","400","");
        }   
        $this->ajaxReturn($res);
    }

    //版本列表
    public function versions(){
        $YouMengHelper = new YouMengDataAnalysis();
        $type = I('get.type');
        $config = C('YOUMENG_APP_KEY');
        $appkey = $config[strtoupper($type)];
        $date = I('get.date');
        $map['appkey'] = $appkey;
        $map['date'] = $date;
        try {
            $result = $YouMengHelper->call('versions',$map);
            $res = res_arr("返回成功","200",$result);
        } catch (Exception $e) {
            $res = res_arr("系统异常","400","");
        }   
        $this->ajaxReturn($res);
    }

    //今日数据
    public function todayData(){
        $YouMengHelper = new YouMengDataAnalysis();
        $type = I('get.type');
        $config = C('YOUMENG_APP_KEY');
        $appkey = $config[strtoupper($type)];
        $map['appkey'] = $appkey;
        try {
            $result = $YouMengHelper->call('today_data',$map);
            $res = res_arr("返回成功","200",$result);
        } catch (Exception $e) {
            $res = res_arr("系统异常","400","");
        }   
        $this->ajaxReturn($res);
    }

    //昨日数据
    public function yesterdayData(){
        $YouMengHelper = new YouMengDataAnalysis();
        $type = I('get.type');
        $config = C('YOUMENG_APP_KEY');
        $appkey = $config[strtoupper($type)];
        $map['appkey'] = $appkey;
        try {
            $result = $YouMengHelper->call('yesterday_data',$map);
            $res = res_arr("返回成功","200",$result);
        } catch (Exception $e) {
            $res = res_arr("系统异常","400","");
        }   
        $this->ajaxReturn($res);
    }

    //任意日期数据
    public function baseData(){
        $YouMengHelper = new YouMengDataAnalysis();
        $type = I('get.type');
        $config = C('YOUMENG_APP_KEY');
        $appkey = $config[strtoupper($type)];
        $date = I('get.date');
        $map['appkey'] = $appkey;
        $map['date'] = $date;
        try {
            $result = $YouMengHelper->call('base_data',$map);
            $res = res_arr("返回成功","200",$result);
        } catch (Exception $e) {
            $res = res_arr("系统异常","400","");
        }   
        $this->ajaxReturn($res);
    }

    //用户群列表-没有群数据
    public function segmentations(){
        $YouMengHelper = new YouMengDataAnalysis();
        $type = I('get.type');
        $config = C('YOUMENG_APP_KEY');
        $appkey = $config[strtoupper($type)];
        $map['appkey'] = $appkey;
        try {
            $result = $YouMengHelper->call('segmentations',$map);
            $res = res_arr("返回成功","200",$result);
        } catch (Exception $e) {
            $res = res_arr("系统异常","400","");
        }   
        $this->ajaxReturn($res);
    }

    //新增用户
    public function newUsers(){
        $YouMengHelper = new YouMengDataAnalysis();
        $type = I('get.type');
        $config = C('YOUMENG_APP_KEY');
        $appkey = $config[strtoupper($type)];
        $start_date = I('get.start_date');
        $end_date = I('get.end_date');
        // $period_type = I('get.period_type');
        // $channels = I('get.channels');
        // $versions = I('get.versions');
        // $segments = I('get.segments');
        $map['appkey'] = $appkey;
        $map['start_date'] = $start_date;
        $map['end_date'] = $end_date;
        // $map['period_type'] = $period_type;
        // $map['channels'] = $channels;
        // // $map['versions'] = $versions;
        // $map['segments'] = $segments;
        try {
            $result = $YouMengHelper->call('new_users',$map);
            $res = res_arr("返回成功","200",$result);
        } catch (Exception $e) {
            $res = res_arr("系统异常","400","");
        }   
        $this->ajaxReturn($res);
    }

    //活跃用户
    public function activeUsers(){
        $YouMengHelper = new YouMengDataAnalysis();
        $type = I('get.type');
        $config = C('YOUMENG_APP_KEY');
        $appkey = $config[strtoupper($type)];
        $start_date = I('get.start_date');
        $end_date = I('get.end_date');
        // $period_type = I('get.period_type');
        $channels = I('get.channels');
        // $versions = I('get.versions');
        // $segments = I('get.segments');
        $map['appkey'] = $appkey;
        $map['start_date'] = $start_date;
        $map['end_date'] = $end_date;
        // if($channels != null){
        //     $map['channels'] = $channels;
        // }
        // $map['period_type'] = $period_type;
        // 
        // $map['versions'] = $versions;
        // $map['segments'] = $segments;
        // var_dump($map);
        try {
            $result = $YouMengHelper->call('active_users',$map);
            $res = res_arr("返回成功","200",$result);
        } catch (Exception $e) {
            $res = res_arr("系统异常","400","");
        }   
        $this->ajaxReturn($res);
    }

    //启动次数
    public function launches(){
        $YouMengHelper = new YouMengDataAnalysis();
        $type = I('get.type');
        $config = C('YOUMENG_APP_KEY');
        $appkey = $config[strtoupper($type)];
        $start_date = I('get.start_date');
        $end_date = I('get.end_date');
        $period_type = I('get.period_type');
        $channels = I('get.channels');
        // $versions = I('get.versions');
        $segments = I('get.segments');
        $map['appkey'] = $appkey;
        $map['start_date'] = $start_date;
        $map['end_date'] = $end_date;
        // $map['period_type'] = $period_type;
        // $map['channels'] = $channels;
        // // $map['versions'] = $versions;
        // $map['segments'] = $segments;
        try {
            $result = $YouMengHelper->call('launches',$map);
            $res = res_arr("返回成功","200",$result);
        } catch (Exception $e) {
            $res = res_arr("系统异常","400","");
        }   
        $this->ajaxReturn($res);
    }

    //使用时长
    public function durations(){
        $YouMengHelper = new YouMengDataAnalysis();
        $type = I('get.type');
        $config = C('YOUMENG_APP_KEY');
        $appkey = $config[strtoupper($type)];
        $start_date = I('get.start_date');
        $end_date = I('get.end_date');
        $period_type = I('get.period_type');
        $channels = I('get.channels');
        $versions = I('get.versions');
        $segments = I('get.segments');
        $map['appkey'] = $appkey;
        $map['start_date'] = $start_date;
        $map['end_date'] = $end_date;
        $map['period_type'] = $period_type;
        // $map['channels'] = $channels;
        // $map['versions'] = $versions;
        // $map['segments'] = $segments;
        try {
            $result = $YouMengHelper->call('durations',$map);
            $res = res_arr("返回成功","200",$result);
        } catch (Exception $e) {
            $res = res_arr("系统异常","400","");
        }   
        $this->ajaxReturn($res);
    }

    //留存用户
    public function retentions(){
        $YouMengHelper = new YouMengDataAnalysis();
        $type = I('get.type');
        $config = C('YOUMENG_APP_KEY');
        $appkey = $config[strtoupper($type)];
        $start_date = I('get.start_date');
        $end_date = I('get.end_date');
        $period_type = I('get.period_type');
        $channels = I('get.channels');
        $versions = I('get.versions');
        $segments = I('get.segments');
        $map['appkey'] = $appkey;
        $map['start_date'] = $start_date;
        $map['end_date'] = $end_date;
        $map['period_type'] = $period_type;
        // $map['channels'] = $channels;
        // $map['versions'] = $versions;
        // $map['segments'] = $segments;
        try {
            $result = $YouMengHelper->call('retentions',$map);
            $res = res_arr("返回成功","200",$result);
        } catch (Exception $e) {
            $res = res_arr("系统异常","400","");
        }   
        $this->ajaxReturn($res);
    }

    // //创建自定义事件Group
    // public function getEvents(){
    //     $YouMengHelper = new YouMengDataAnalysis();
    //     $type = I('get.type');
    //     $config = C('YOUMENG_APP_KEY');
    //     $appkey = $config[strtoupper($type)];
    //     $event_name = I('get.event_name');
    //     $event_display_name = I('get.event_display_name');
    //     $map['appkey'] = $appkey;
    //     $map['event_name'] = $event_name;
    //     // $map['event_display_name'] = $event_display_name;
    //     try {
    //         $result = $YouMengHelper->call('events',$map);
    //         $res = res_arr("返回成功","200",$result);
    //     } catch (Exception $e) {
    //         $res = res_arr("系统异常","400","");
    //     }   
    //     $this->ajaxReturn($res);
    // }

    //事件Group列表
    public function getEventsGroupList(){
        $YouMengHelper = new YouMengDataAnalysis();
        $type = I('get.type');
        $config = C('YOUMENG_APP_KEY');
        $appkey = $config[strtoupper($type)];
        $start_date = I('get.start_date');
        $end_date = I('get.end_date');
        $period_type = I('get.period_type');
        $versions = I('get.versions');
        $map['appkey'] = $appkey;
        $map['start_date'] = $start_date;
        $map['end_date'] = $end_date;
        $map['period_type'] = $period_type;
        $map['versions'] = $versions;
        try {
            $result = $YouMengHelper->call('events/group_list',$map);
            $res = res_arr("返回成功","200",$result);
        } catch (Exception $e) {
            $res = res_arr("系统异常","400","");
        }   
        $this->ajaxReturn($res);
    }

    //事件列表
    public function getEventsEventList(){
        $YouMengHelper = new YouMengDataAnalysis();
        $type = I('get.type');
        $config = C('YOUMENG_APP_KEY');
        $appkey = $config[strtoupper($type)];
        $start_date = I('get.start_date');
        $end_date = I('get.end_date');
        $period_type = I('get.period_type');
        $group_id = I('get.group_id');
        $map['appkey'] = $appkey;
        $map['start_date'] = $start_date;
        $map['end_date'] = $end_date;
        $map['period_type'] = $period_type;
        $map['group_id'] = $group_id;
        try {
            $result = $YouMengHelper->call('events/event_list',$map);
            $res = res_arr("返回成功","200",$result);
        } catch (Exception $e) {
            $res = res_arr("系统异常","400","");
        }   
        $this->ajaxReturn($res);
    }

    //事件消息数
    public function getEventsDailyData(){
        $YouMengHelper = new YouMengDataAnalysis();
        $type = I('get.type');
        $config = C('YOUMENG_APP_KEY');
        $appkey = $config[strtoupper($type)];
        $start_date = I('get.start_date');
        $end_date = I('get.end_date');
        $period_type = I('get.period_type');
        $group_id = I('get.group_id');
        $type2 = I('get.type2');
        $map['appkey'] = $appkey;
        $map['start_date'] = $start_date;
        $map['end_date'] = $end_date;
        $map['period_type'] = $period_type;
        $map['group_id'] = $group_id;
        $map['type'] = $type2;
        try {
            $result = $YouMengHelper->call('events/daily_data',$map);
            $res = res_arr("返回成功","200",$result);
        } catch (Exception $e) {
            $res = res_arr("系统异常","400","");
        }   
        $this->ajaxReturn($res);
    }

    //参数列表
    public function getEventsParameterList(){
        $YouMengHelper = new YouMengDataAnalysis();
        $type = I('get.type');
        $config = C('YOUMENG_APP_KEY');
        $appkey = $config[strtoupper($type)];
        $start_date = I('get.start_date');
        $end_date = I('get.end_date');
        $period_type = I('get.period_type');
        $event_id = I('get.event_id');
        $type2 = I('get.type2');
        $map['appkey'] = $appkey;
        $map['start_date'] = $start_date;
        $map['end_date'] = $end_date;
        $map['period_type'] = $period_type;
        $map['event_id'] = $event_id;
        $map['type'] = $type2;
        try {
            $result = $YouMengHelper->call('events/parameter_list',$map);
            $res = res_arr("返回成功","200",$result);
        } catch (Exception $e) {
            $res = res_arr("系统异常","400","");
        }   
        $this->ajaxReturn($res);
    }

    //参数消息数
    public function getEventsParameterData(){
        $YouMengHelper = new YouMengDataAnalysis();
        $type = I('get.type');
        $config = C('YOUMENG_APP_KEY');
        $appkey = $config[strtoupper($type)];
        $start_date = I('get.start_date');
        $end_date = I('get.end_date');
        $period_type = I('get.period_type');
        $event_id = I('get.event_id');
        $map['appkey'] = $appkey;
        $map['start_date'] = $start_date;
        $map['end_date'] = $end_date;
        $map['period_type'] = $period_type;
        $map['event_id'] = $event_id;
        try {
            $result = $YouMengHelper->call('events/parameter_data',$map);
            $res = res_arr("返回成功","200",$result);
        } catch (Exception $e) {
            $res = res_arr("系统异常","400","");
        }   
        $this->ajaxReturn($res);
    }

    //反馈列表
    public function getfeedbacks(){
        $YouMengHelper = new YouMengDataAnalysis();
        $type = I('get.type');
        $config = C('YOUMENG_APP_KEY');
        $appkey = $config[strtoupper($type)];
        $per_page = I('get.per_page');
        $page = I('get.page');
        $map['appkey'] = $appkey;
        $map['per_page'] = $per_page;
        $map['page'] = $page;
        try {
            $result = $YouMengHelper->call('feedbacks',$map);
            $res = res_arr("返回成功","200",$result);
        } catch (Exception $e) {
            $res = res_arr("系统异常","400","");
        }   
        $this->ajaxReturn($res);
    }
 }