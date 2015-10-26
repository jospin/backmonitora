<?php
namespace Iso;

class Rest {
    private $_code = 200;
    private $_text = 'Ok';
    private $_content;
    private $_contentType;

    public function __construct($server, array $contentType){

        $headers = apache_request_headers();
        if ($server['REQUEST_METHOD'] != 'POST') {
            $this->_code = 400;
            $this->_text = 'request method invalid';
            return false;
        }
        $this->_setContentType($headers['Accept'], $contentType);
    }

    public function getCode()
    {
        return $this->_code;
    }

    public function getText()
    {
        return $this->_text;
    }

    public function setContent(array $content) {

        $this->_content = $content;
    }

    public function response()
    {
        $origin=isset($_SERVER['HTTP_ORIGIN'])?$_SERVER['HTTP_ORIGIN']:$_SERVER['HTTP_HOST'];
        header("HTTP/1.1 {$this->_code} {$this->_text}");
        header('Access-Control-Allow-Origin: '.$origin);
        header("Content-Type: {$this->_contentType}");
        header("Cache-Control: no-cache, must-revalidate");
        if ($this->_code == 200 ) {
            switch ($this->_contentType) {
                case 'application/json' :
                    echo json_encode($this->_content);
                    break;
                default :
                    echo json_encode($this->_content);
                    break;
            }
        }
    }

    private function _setContentType($accept, $contentSend)
    {
        if ($accept == '*/*') {
            $this->_contentType = 'application/json';
            return true;
        }
        preg_match('/^[a-zA-Z]+\/(\w+)/', $accept, $contentType);

        switch($contentType[1]) {
            case 'json' :
            case 'xml' :
            case 'text' :
            case 'html' :
                if (!in_array($contentType[0], $contentSend)) {
                    $this->_code = 406;
                    $this->_text = 'Content Type not acceptable';
                    return false;
                }
                $this->_contentType = $contentType[0];
                return true;
                break;
            default :
                $this->_code = 406;
                $this->_text = 'Content Type not acceptable';
        }
        return false;
    }

}