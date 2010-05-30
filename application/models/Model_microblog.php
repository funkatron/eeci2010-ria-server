<?php
/**
* 
*/
class Model_microblog extends MY_Model
{
    
    function __construct() {
        parent::__construct();
        $this->mongo = new Mongo();
        $this->mdb = $this->mongo->microblog;
        $this->posts = $this->mdb->posts;
    }
    
    public function getAll($value='') {
        $data = array('posts'=>array());
        $cursor = $this->posts->find();

        while( $cursor->hasNext() ) {
            $data['posts'][] = $cursor->getNext();
        };
        
        $data['posts'] = array_reverse($data['posts']);
        
        return $this->format($data);
    }


    public function addPost($text) {
        $newpost = array('text'=>$text);
        $this->posts->insert($newpost);
        $result = $this->posts->findOne(array("_id" => $newpost['_id']));
        $result['_id'] = $result['_id']."";
        return $this->format($result);
    }
}



?>