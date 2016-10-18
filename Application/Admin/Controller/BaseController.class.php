<?php
 namespace Admin\Controller;
 use Think\Controller;
 class BaseController extends Controller {
    public function _initialize(){
       if(!session('user')){
            $this->error('111');
       }

    }
 }