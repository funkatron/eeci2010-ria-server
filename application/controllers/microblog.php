<?php
/**
* 
*/
class Microblog extends MY_Controller
{
    
    function __construct() {
        parent::__construct();
        
        $this->load->model('model_microblog');
        $this->model_microblog->setDataFormat(MODEL_DATA_FORMAT_JSON);
    }
    
    public function getAll($since_id=0) {
        $resp = $this->model_microblog->getAll();
        $this->_sendRaw($resp);
    }
    
    public function post() {
        $text = $this->input->post('text');
        $resp = $this->model_microblog->addPost($text);
        $this->_sendRaw($resp);
    }
    
    
}




?>