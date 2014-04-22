<?php 

namespace Blog\Lib;

class Social extends \Dsc\Singleton{
	
	/**
	 * Returns script required for social tool
	 * @param $name		Name of the tool (in form "network:part" like "facebook:like")
	 * @param $options	Options passed down to the registration tool
	 * 
	 * @return		Script required to register tool
	 */
	public static function getTool($name, $options){
		
		$name = strtolower( $name );
		$command = explode( ':', $name );
		$result = '';

		// wrong command so quietly leave the room
		if( count( $command ) != 2 ) {
			return '';
		}
		
		$instance = null;
		$supported = array();
		switch( $command[0] ) {
			case 'facebook' : {
				$instance = \Blog\Lib\Tools\Facebook::instance();
				break;
			}
			case 'disqus' : {
				$instance = \Blog\Lib\Tools\Disqus::instance();
			}
		}
		
		if( $instance != null ) {
			$supported = $instance->getSupported();
			if( in_array( $command[1], $supported ) === false ) {
				return '';
			}
			return $instance->$command[1]( $options );
		}
		
		return '';
	}	
}