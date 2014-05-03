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
				<div id="fb-root" style="position:absolute;bottom:0px;left:0px;"></div>
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
		$result .= '<span class="fb-comments-count" data-href="'.$options['post_url'].'"></span>';
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
			'data-action' => $this->getOptionsValue( $options, 'action', 'social.facebook.like.action' ),
			'data-href' => $options['post_url'],
			'data-colorscheme' => $this->getOptionsValue( $options, 'theme', 'social.facebook.like.theme' ),
			'data-layout' => $this->getOptionsValue( $options, 'layout', 'social.facebook.like.layout' ),
			'data-show-faces' => $this->getOptionsValue( $options, 'show_faces', 'social.facebook.like.show_faces' ),
		);
			
		if( !empty( $this->getOptionsValue( $options, 'width', 'social.facebook.like.width' ) ) ){
			$attributes['data-width'] = $this->getOptionsValue( $options, 'width', 'social.facebook.like.width' );
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
				'data-type' => $this->getOptionsValue( $options, 'layout', 'social.facebook.share.layout' ),
		);

		if( !empty( $this->getOptionsValue( $options, 'width', 'social.facebook.share.width' ) ) ){
			$attributes['data-width'] = $this->getOptionsValue( $options, 'width', 'social.facebook.share.width' );
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
			'data-numposts' => $this->getOptionsValue( $options, 'num_posts', 'social.facebook.comments.num_posts' ),
			'data-colorscheme' => $this->getOptionsValue( $options, 'theme', 'social.facebook.comments.theme' ), 
			'data-order-by' => $this->getOptionsValue( $options, 'order', 'social.facebook.comments.order' ),
			'data-mobile' => $this->getOptionsValue( $options, 'mobile', 'social.facebook.comments.mobile' ),
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