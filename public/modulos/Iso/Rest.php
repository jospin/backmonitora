<?php
namespace Iso;

class Rest {
    private $_code = 200;
    private $_text = 'Ok';
    private $_content;
    private $_contentType;

    public function __construct($server){
        if ($this->_valida($server)) {

            $this->_contentType = $server['HTTP_ACCEPT'] == '*/*'?'application/json':$server['HTTP_ACCEPT'];
        }
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
        header("HTTP/1.0 {$this->_code} {$this->_text}");
        header("Content-Type: {$this->_contentType}");
        header("Cache-Control: no-cache, must-revalidate");
        switch ($this->_contentType) {
            case 'application/json' :
                echo json_encode($this->_content);
                break;
            default :
                echo json_encode($this->_content);
                break;
        }
    }

    private function _valida($server)
    {
        if ($server['REQUEST_METHOD'] != 'POST') {
            $this->_code = 400;
            $this->_text = 'request method invalid';
            return false;
        }

        if (
                $server['HTTP_ACCEPT'] != 'application/json' &&
                $server['HTTP_ACCEPT'] != '*/*'
            ) {
            $this->_code = 406;
            $this->_text = 'Server are return only application/json';
            return false;
        }
        return true;

    }
}