<?php

/**
* 
*/
class Model_imageprocessor extends MY_Model
{
    
    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }
    
    
    public function addEffect($file_key, $effect)
    {
        
        $tmpname = escapeshellcmd($_FILES[$file_key]['tmp_name']);
        $filename= escapeshellcmd($_FILES[$file_key]['name']);

        $image = new Imagick($tmpname);

        switch($effect) {

        	case 'sepia':
        		$image->sepiaToneImage(80);
        		break;
        	case 'emboss':
        		$image->embossImage(10, 1);
        		break;
        	case 'blur':
        		$image->blurImage(50, 1);
        		break;
        }

        $filename = time()."-".$filename;

        $image->SetImageFilename(getcwd().'/files/'.$filename);
        $image->writeImage();

        $response->new_img_url = base_url().'files/'.$filename;
        
        return $this->format($response, 'json');
    }
    
}



?>