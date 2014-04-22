<?php 

namespace Blog\Lib\Tools;

class Disqus extends \Blog\Lib\Tools\Tool{
	
	
	/**
	 * Common part for all scripts
	 */
	private function common( $options, $script ) {
		
		$shortname = $options['shortname'];
		$title = $options['title'];
		$identifier = $options['id'];
		
		$js = '
			    <script type="text/javascript">
			        var disqus_shortname = "'.$shortname.'"; // required: replace example with your forum shortname
			        var disqus_identifier = "'.$identifier.'";
			        var disqus_title = "'.$title.'";
			        			
			        (function() {
			            var dsq = document.createElement(\'script\'); dsq.type = \'text/javascript\'; dsq.async = true;
			            dsq.src = \'//\' + disqus_shortname + \'.disqus.com/'.$script.'\';
			            (document.getElementsByTagName(\'head\')[0] || document.getElementsByTagName(\'body\')[0]).appendChild(dsq);
			        })();
			    </script>
			    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
				';

		return $js;
	}

	/**
	 * Returns script required to register a social tool
	 *
	 * @param $options		Additional options
	 *
	 * @return		Script required to register tool
	 */
	public function count_comments($options){
		$result = '<a href="'.$options['post_url'].'#disqus_thread" data-disqus-identifier="'.$options['id'].'"></a>'.
					$this->common( $options, 'count.js');
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
		$result = '<div id="disqus_thread"></div>'.$this->common( $options, 'embed.js');
		return $result;
	}
	
	/**
	 * This method returnd array of supported tools
	 */
	public function getSupported(){
		return array( 'comments', 'count_comments' );
	}
}