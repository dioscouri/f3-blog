<?php 

namespace Blog\Lib\Tools;

class Facebook extends \Blog\Lib\Tools\Tool{
	
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

			return '
				<div id="fb-root"></div>
				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, \'script\', \'facebook-jssdk\'));</script>
					';
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
	public function count_comments($options){
		$result = '';
		if( $this->requiresAdding( 'base' ) ) {
			$result = $this->base( $options );
		}
		$result .= '<div class="fb-comments-count" data-href="'.$options['post_url'].'"></div>';
		return $result;
	}
		
	/**
	 * Returns script required to register a social tool
	 * 
	 * @param $options		Additional options
	 * 
	 * @return		Script required to register tool
	 */
	public function like($options){
		$result = '';
		if( $this->requiresAdding( 'base' ) ) {
			$result = $this->base( $options );
		}

		$attributes = array(
			'data-action' => $options['action'],
			'data-href' => $options['post_url'],
			'data-colorscheme' => $options['theme'],
			'data-layout' => $options['layout'],
			'data-show-faces' => $options['show_faces'],
		);
			
		if( !empty( $options['width'] ) ){
			$attributes = array( 'data-width' => $options['width'] ) + $attributes;
		}
		
		$result .= '<div class="fb-like" '.$this->convertArrayToAttributes( $attributes ).'></div>';
		return $result;
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
	
		$attributes = array(
				'data-href' => $options['post_url'],
				'data-type' => $options['layout'],
		);

		if( !empty( $options['width'] ) ){
			$attributes = array( 'data-width' => $options['width'] ) + $attributes;
		}
	
		$result .= '<div class="fb-share-button" '.$this->convertArrayToAttributes( $attributes ).'></div>';
		return $result;
	}
	
	/**
	 * Returns script required to register a social tool
	 *
	 * @param $options		Additional options
	 *
	 * @return		Script required to register tool
	 */
	public function comments($options){
		$result = '';
		if( $this->requiresAdding( 'base' ) ) {
			$result = $this->base( $options );
		}
		
		$attributes = array(
			'data-href' => $options['post_url'],
			'data-numposts' => $options['num_posts'],
			'data-colorscheme' => $options[ 'theme' ], 
			'data-order-by' => $options[ 'order'],
			'data-mobile' => $options['mobile'],
		);
		
		$result .= '<div class="fb-comments" '.$this->convertArrayToAttributes( $attributes ).' ></div>';
		return $result;
	}
	
	/**
	 * This method returnd array of supported tools
	 */
	public function getSupported(){
		return array( 'share', 'like', 'comments', 'count_comments' );
	}
}