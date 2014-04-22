<?php 

namespace Blog\Lib\Tools;

class Twitter extends \Blog\Lib\Tools\Tool{
	
	/**
	 * This method will return script required for all (or at least majority) tools from facebook
	 * 
	 * @param $options		Additional options for initialization
	 * 
	 * @return	String with javascript code
	 */
	public function base( $options ){
		if( $this->requiresAdding( 'base' ) ) {
			$this->setAdded( 'base' );
			return '<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';
		}
		return '';
	}

	/**
	 * Returns script required to register a social tool
	 *
	 * @param $options		Additional options
	 *
	 * @return		Script required to register tool
	 */
	public function tweet($options){
		$result = '';
		if( $this->requiresAdding( 'base' ) ) {
			$result = $this->base( $options );
		}
	
		$attributes = array(
				'data-lang' => $options['lang'],
				'data-url' => $options['post_url'],
				'data-via' => $options['via'], // user twitter name (@asingh)
				'data-text' => $options['text'], // actual tweet
				'data-count' => $options['count_box'],
		);

		if( !empty( $options['hashtags'] ) ){
			if( !is_array( $options['hashtags'] ) ){
				$options['hashtags'] = array( $options['hashtags'] );
			}
			$attributes['data-hashtags'] = implode( ',', $options['hashtags'] );
		}
		$result .= '<a href="https://twitter.com/share" class="twitter-share-button"  '.$this->convertArrayToAttributes( $attributes ).'>'.$options['button_text'].'</a>';
		return $result;
	}
	
	/**
	 * This method returnd array of supported tools
	 */
	public function getSupported(){
		return array( 'tweet', 'mention', 'follow' );
	}
}