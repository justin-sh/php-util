<?php
class HttpClient{
    protected $_useragent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1';
    protected $_url; 
    protected $_conn_timeout = 10;
    protected $_read_timeout = 60;
    protected $_post;
    protected $_status;
    protected $_debug = false;

    public function __construct($url){
        $this->_url = $url;
    }

    public function setDebug($debug=false){
        $this->_debug = $debug === true;
    }

    public function get(){
        return $this->execute();
    }

    public function post(){
        return $this->execute();
    }

    protected function execute(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->_url);
        curl_setopt($ch, CURLOPT_USERAGENT, $this->_useragent);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $this->_conn_timeout);
        curl_setopt($ch, CURLOPT_TIMEOUT, $this->_read_timeout);
        if($this->_debug){
            curl_setopt($ch, CURLOPT_VERBOSE, 1);
        }
        $data = curl_exec($ch);
        if($data === false){
            echo "curl error:" .curl_error($ch) .PHP_EOL;
            return false;
        }
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        echo "http code:" . $httpcode;
        return ($httpcode>=200 && $httpcode<300) ? $data : false;
    }
}

// sample
// $http = new HttpClient("http:/www.baidu.com/432");
// $http->setDebug(true);
// $http->get();


// $http = new HttpClient("https://api.trello.com/1/boards/560bf4298b3dda300c18d09c?fields=name,url&key=k&token=t");
// $http->setDebug(true);
// $http->get();

?>
