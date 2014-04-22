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
			
		$result .= '';
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
		$mobile = $options['mobile'];
		$num_posts = $options['num_posts'];
		$theme = $options[ 'theme' ];
		$order = $options[ 'order'];
		$url = $options['post_url'];
				
		$result .= '<div class="fb-comments"
						data-href="'.$url.'" data-numposts="'.$num_posts.
						'" data-colorscheme="'.$theme.'" data-order-by="'.$order.
						'" data-mobile="'.$mobile.'"></div>';
		return $result;
	}
	
	/**
	 * This method returnd array of supported tools
	 */
	public function getSupported(){
		return array( 'like', 'comments', 'count_comments' );
	}
}