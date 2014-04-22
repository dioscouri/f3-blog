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
	 * This method turns array with attributes into a string with HTML attributes
	 * 
	 * @param $attr 	Array with attributes
	 * 
	 * @return	HTML string with attributes
	 */
	protected function convertArrayToAttributes( $attr ){
		$joined_attributes = array();
		foreach( $attr as $name => $val ){
			$joined_attributes []= $name.'="'.$val.'"';
		}
		
		return implode( ' ', $joined_attributes );
		
	}
	
	/**
	 * This method returnd array of supported tools
	 */
	abstract public function getSupported();
}