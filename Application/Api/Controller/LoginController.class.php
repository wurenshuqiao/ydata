<?php
 namespace Api\Controller;
 use Think\Controller;
 class LoginController extends Controller {
     // public function index(){
     //   $name=I('username');
     //   $pwd=I('password');
     //   if($name=='admin' && $pwd=='admin')
     //   {
     //           $res = res_arr("正在登录中...","200","");
     //   }
     //   else
     //   {
     //     $res = res_arr("登陆失败","404","");
     //   }
     //      $this->ajaxReturn($res);
     // }
     public function index(){
        // 引用Hessian协议
        // 
        Vendor('Hessian.dist.HessianClient');
        // 定义接口的类
        $url = JAVAURL . 'managerService';
        // 实例化这个类
        $proxy = new \HessianClient($url);
        // 传递过来的参数
        // $name = 'admin';
        // $password = md5('admin.!@#$%^');

         $name=I('username');
         $psd=I('password');
         $password=md5($psd);
        // 调用managerService这个类下的findByUsernameAndPass
        // 其中findByUsernameAndPass有两个参数
         try{
          $result = $proxy->findByUsernameAndPass($name, $password);

     }catch  (Exception $e){
          $this->error("");
     }
         // var_dump($result);
        // 如果有返回信息,说明登陆成功,如果为空 说明登陆失败
         if(empty($result)){
          $res = res_arr("登陆失败","404","");
     }
     else{
          $res = res_arr("登录成功","200","");
     }
     $this->ajaxReturn($res);
}

     
        // 实际引用中 需要try catch一下 将异常抛出  直接提示 $this->error("系统异常")
        // 
        // 得到数据后 进行逻辑判断和给前端返回数据
}