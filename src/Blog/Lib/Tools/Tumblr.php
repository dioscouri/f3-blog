<?php 

namespace Blog\Lib\Tools;

class Tumblr extends \Blog\Lib\Tools\Tool{
	
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
			return '<script src="http://platform.tumblr.com/v1/share.js"></script>';
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
	public function share($options){
		$result = '';
		if( $this->requiresAdding( 'base' ) ) {
			$result = $this->base( $options );
		}
		$source = urlencode( $options['post_url'] );
		$caption = urlencode( $options['title'] );
		$click_through = urlencode( $options['post_url'] );
		$text = $this->getOptionsValue( $options, 'text', 'social.tumblr.share.text' );
		
		$type = $this->getOptionsValue( $options, 'type', 'social.tumblr.share.type' );
		$color = $this->getOptionsValue( $options, 'color', 'social.tumblr.share.color' );
		$img = 'share_'.$type.$color;
		switch( $type ) {
			case '1':
				{
					$css_style = '81';
					break;
				}
			case '2':
				{
					$css_style = '61';
					break;
				}
			case '3':
				{
					$css_style = '129';
					break;
				}
			case '4':
				{
					$css_style = '20';
					break;
				}
		}
		
		$result .= '<a href="http://www.tumblr.com/share/photo?source='.$source.'&caption='.$caption.'&clickthru='.$click_through.'" title="Share on Tumblr" style="display:inline-block; text-indent:-9999px; overflow:hidden; width:'.$css_style.'px; height:20px; background:url(\'http://platform.tumblr.com/v1/'.$img.'.png\') top left no-repeat transparent;">'.$text.'</a>';
		return $result;
	}
	
	/**
	 * This method returnd array of supported tools
	 */
	public function getSupported(){
		return array( 'share' );
	}
}