<?php
namespace Org\YouMeng;
// 引用系统异常类
use Think\Exception;
// 友盟平台数据分析基类
class YouMengDataAnalysis{
     /**
     * API根路径
     * @var string
     */
    protected $ApiBase = 'http://api.umeng.com/';
     /**
     * 授权后获取到的TOKEN信息
     * @var array
     */
    protected $Token = null;

    public function __construct(){
        $config = C("YOUMENG_KEY");
        $this->Token = base64_encode($config['KEY'].":".$config['PASSWORD']);
        // echo $this->Token;
    }
    /**
     * 获取数据的方法
     * @param  string $api    api接口地址 如'apps'
     * @param  array $params 参数数组 如'array('a'=>'1')'
     * @return json         返回的json格式的数据 
     */
    public function call($api,$params){
        $data = $this->http($this->ApiBase.$api, $params,'GET',array(
            'Content-Type: application/json',
            'Authorization: Basic '.$this->Token
            ),true);
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