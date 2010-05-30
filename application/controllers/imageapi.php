<?php
/**
* 
*/
class ImageAPI extends MY_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_imageprocessor');
        
    }
    
    
    public function process($effect, $format=MODEL_DATA_FORMAT_JSON) {
        
        $this->model_imageprocessor->setDataFormat($format);

        $json = $this->model_imageprocessor->addEffect('imagefile', $effect);
        
        $this->_sendRaw($json);
    }
}



?>