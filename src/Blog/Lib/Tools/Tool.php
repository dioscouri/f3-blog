<?php 

namespace Blog\Lib\Tools;

/**
 * Base class for all social networks
 */
abstract class Tool extends \Dsc\Singleton {
	
	/**
	 * List of already registered social tools
	 *
	 * @var unknown
	 */
	protected $tools = array();
	
	/**
	 * Determines, if the tool needs to be added, or it is already there
	 * 
	 * @param	$tool	Name of tool
	 * 
	 * @return	Whether the code should be added
	 * 
	 */
	protected function requiresAdding($tool){
		return empty( $this->tools[$tool] );
	}
	
	/**
	 * Sets this tool as added
	 * 
	 * @param	$tool	Name of tool
	 * 
	 */
	protected function setAdded( $tool ) {
		$this->tools[$tool] = true;
	}
	
	/**
	 * This method returnd array of supported tools
	 */
	abstract public function getSupported();
}