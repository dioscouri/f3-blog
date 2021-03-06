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
				'data-lang' => $this->getOptionsValue( $options, 'lang', 'social.twitter.tweet.lang' ),
				'data-url' => $options['post_url'],
				'data-via' => $this->getOptionsValue( $options, 'via', 'social.twitter.tweet.via' ), // user twitter name (@asingh)
				'data-text' => $this->getOptionsValue( $options, 'text', 'social.twitter.tweet.tweet' ), // actual tweet
				'data-count' => $this->getOptionsValue( $options, 'count_box', 'social.twitter.tweet.count' ),
		);
		if( !empty( $options['hashtags'] ) ){
			if( !is_array( $options['hashtags'] ) ){
				$options['hashtags'] = array( $options['hashtags'] );
			}
			$attributes['data-hashtags'] = implode( ',', $options['hashtags'] );
		}
		$button_text = $this->getOptionsValue( $options, 'button_text', 'social.twitter.tweet.button_text' );
		$result .= '<a href="https://twitter.com/share" class="twitter-share-button"  '.$this->convertArrayToAttributes( $attributes ).'>'.$button_text.'</a>';
		return $result;
	}
	
	/**
	 * This method returnd array of supported tools
	 */
	public function getSupported(){
		return array( 'tweet' );
	}
}