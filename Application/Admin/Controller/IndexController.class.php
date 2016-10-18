<?php
 namespace Admin\Controller;
 use Think\Controller;
 class IndexController extends Controller {
     public function index(){
     	$this->display();
     }
     public function error(){
          	$this->display('404');
          }
     public function float(){
        $this->display('500');
    }
    public function test(){
    	$this->display();
    }
 }