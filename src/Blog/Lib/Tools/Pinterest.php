<?php 

namespace Blog\Lib\Tools;

class Pinterest extends \Blog\Lib\Tools\Tool{
	
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
			return '<script type="text/javascript" async src="//assets.pinterest.com/js/pinit.js"></script>';
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
	public function pinit($options){
		$result = '';
		if( $this->requiresAdding( 'base' ) ) {
			$result = $this->base( $options );
		}
	
		$attributes = array(
				'data-pin-do' => 'buttonPin',
				'data-pin-config' => $options['position'],
				'data-pin-color' => $options['color'],
				'data-pin-shape' => $options['shape'],
		);
		if( $options['size'] == 'large' ){
			$attributes['data-pin-height'] = '32';
		}
		
		$url = urlencode($options['post_url']);
		$image = urlencode($options['image']);
		$desc = urlencode($options['desc']);
		$img_link = 'pinit_fg_en_';
		if( $options['shape'] == 'round' ){

			unset( $attributes['data-pin-color'] );
			unset( $attributes['data-pin-config'] );
			
			$img_link .= 'round_red_';
			if( $options['size'] == 'large' ){
				$img_link .= '32';
			} else {
				$img_link .= '16';
			}
		} else {
			unset( $attributes['data-pin-shape'] );
			$img_link .= 'rect_'.$options['color'].'_';
			if( $options['size'] == 'large' ){
				$img_link .= '28';
			} else {
				$img_link .= '20';
			}
		}
		
		$result = '<a href="//www.pinterest.com/pin/create/button/?url='.$url.'&media='.$image.'&description='.$desc.'" '.$this->convertArrayToAttributes( $attributes ).'><img src="//assets.pinterest.com/images/pidgets/'.$img_link.'.png" /></a>';
		return $result;
	}
	
	/**
	 * This method returnd array of supported tools
	 */
	public function getSupported(){
		return array( 'pinit' );
	}
}