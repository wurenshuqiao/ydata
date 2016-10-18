<?php
namespace Org\WeiChat;
// 引用系统异常类
use Think\Exception;
// 微信公众平台数据分析助手
class WeiChatDataAnalysis{
    /**
     * 申请应用时分配的app_key
     * @var string
     */
    protected $AppKey = '';
    /**
     * 公众号类别  是哪个公众号
     * @var string
     */
    protected $Type = '';
    /**
     * 申请应用时分配的 app_secret
     * @var string
     */
    protected $AppSecret = '';

    /**
     * 获取access_token请求的URL
     * @var string
     */
    // protected $GetAccessTokenURL = 'https://api.weixin.qq.com/cgi-bin/token';

    /**
     * API根路径
     * @var string
     */
    protected $ApiBase = 'https://api.weixin.qq.com/datacube/';

    /**
     * 授权后获取到的TOKEN信息
     * @var array
     */
    protected $Token = null;

    public function __construct($type = 'KAISHIBA'){

        $this->Type = $type;
        //获取应用配置
        $config = C("KAISHI_WEICHAT_{$this->Type}");
        if(empty($config['APP_KEY']) || empty($config['APP_SECRET'])){
            throw new Exception('请配置您申请的APP_KEY和APP_SECRET');
        } else {
            $this->AppKey    = $config['APP_KEY'];
            $this->AppSecret = $config['APP_SECRET'];
        }
        // if(cookie($this->Type.'_token')==null){
            $this->getToken();
        // }else{
            // $this->Token = cookie($this->Type.'_token');
        // }
    }
    /**
     * 合并默认参数和额外参数
     * @param array $params  默认参数
     * @param array/string $param 额外参数
     * @return array:
     */
    protected function param($params, $param){
        if(is_string($param))
            parse_str($param, $param);
        return array_merge($params, $param);
    }
    /**
     * 拼接请求的URL
     * @param  string $api 接口名称
     * @return string      返回的完整请求地址
     */
    protected function url($api){
        return $this->ApiBase . $api . '?access_token='.$this->Token;
    }
    protected function getToken(){
        $params = array(
            'grant_type'        => 'client_credential',
            'appid'             =>  $this->AppKey,
            'secret'       => $this->AppSecret,
        );
        $data = $this->http("https://api.weixin.qq.com/cgi-bin/token", $params);
        $res = json_decode($data, true);
        cookie($this->Type.'_token',$res['access_token'],7200);
        $this->Token = $res['access_token'];

    }

    
    /**
     * 获取数据分析的数据
     * @param  string $api   接口类型
     * @param  string $begin_date 开始时间
     * @param  string $end_date   结束时间
     * @return array             返回数据
     */

    public function call($api,$begin_date,$end_date){
        $params = array(
            'begin_date'     => $begin_date,
            'end_date'       => $end_date,
        );
        $params_string = json_encode($params);
        $data = $this->http($this->url($api), $params_string,'POST',array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($params_string)),true
        );
        return json_decode($data, true);
    }
   
    /**
     * 发送HTTP请求方法，目前只支持CURL发送请求
     * @param  string $url    请求URL
     * @param  array  $params 请求参数
     * @param  string $method 请求方法GET/POST
     * @return array  $data   响应数据
     */
    protected function http($url, $params, $method = 'GET', $header = array(), $multi = false){
        $opts = array(
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_HTTPHEADER     => $header
        );
        
        /* 根据请求类型设置特定参数 */
        switch(strtoupper($method)){
            case 'GET':
                $opts[CURLOPT_URL] = $url . '?' . http_build_query($params);
                break;
            case 'POST':
                //判断是否传输文件
                $params = $multi ? $params : http_build_query($params);
                $opts[CURLOPT_URL] = $url;
                $opts[CURLOPT_POST] = 1;
                $opts[CURLOPT_POSTFIELDS] = $params;
                break;
            default:
                throw new Exception('不支持的请求方式！');
        }
        /* 初始化并执行curl请求 */
        $ch = curl_init();

        curl_setopt_array($ch, $opts);
        $data  = curl_exec($ch);

        $error = curl_error($ch);
        curl_close($ch);
        if($error) throw new Exception('请求发生错误：' . $error);
        return  $data;
    }
}