<?php


/**
* 
*/
class MY_Controller extends Controller
{
	/**
	 * takes a php structure (an array or object) and serves it as JSON
	 *
	 * @param string $response required
	 * @param string $format default is MY_Model::FORMAT_JSON
	 * @param string $status default is '200 OK' 
	 * @return void
	 * @author Ed Finkler
	 */
	protected function _sendRaw($response, $format=null, $status = '200 OK')
	{
		$this->output->set_header("HTTP/1.0 ".$status);
		$this->output->set_header("HTTP/1.1 ".$status);

		switch($format) {
			case MODEL_DATA_FORMAT_JSON:
				$this->output->set_header('Content-Type: application/json');
				break;
			case MODEL_DATA_FORMAT_SERIALPHP:
				$this->output->set_header('Content-Type: text/php');
				break;
			case MODEL_DATA_FORMAT_PHP:
				$response = serialize($response);
				$this->output->set_header('Content-Type: text/php');
				break;
			default:
				$this->output->set_header('Content-Type: application/json');
				break;
		}

		$this->output->set_output($response);
		return;
	}
	
}



