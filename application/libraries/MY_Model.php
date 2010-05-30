<?php


/**
 * php data format constants
 */
define('MODEL_DATA_FORMAT_PHP', 'php');
define('MODEL_DATA_FORMAT_JSON', 'json');
define('MODEL_DATA_FORMAT_SERIALPHP', 'sphp');
define('MODEL_DATA_FORMAT_XML', 'xml');

/**
* 
*/
class MY_Model extends Model
{
	/**
	 * format determines the format returned by the model
	 * see MODEL_DATA_FORMAT_xxx class constants for options
	 *
	 * @var string
	 **/
	protected $format = MODEL_DATA_FORMAT_PHP;
	
	/**
	 * a protected function used to convert the data before returning in public functons
	 * 
	 * @param mixed $data 
	 * @return mixed
	 * @author Ed Finkler
	 */
	protected function format($data) {
	    
		switch($this->format) {
			case MODEL_DATA_FORMAT_PHP:
				// don't do anything
				$return_data = $data;
				break;
			case MODEL_DATA_FORMAT_JSON:
				$return_data = json_encode($data);
				break;
			case MODEL_DATA_FORMAT_SERIALPHP:
				$return_data = serialize($data);
				break;
			default:
				// don't do anything
				$return_data = $data;
		}
		return $return_data;
	}
	
	/**
	 * sets the data format for the model
	 *
	 * @param string $format one of the constants of MODEL_DATA_FORMAT_*
	 * @return void
	 * @author Ed Finkler
	 */
	public function setDataFormat($format) {
		$this->format = $format;
	}

	/**
	 * get the current data format for the model
	 * 
	 * @return string
	 * @author Ed Finkler
	 */
	public function getDataFormat() {
		return $this->format;
	}
}
