<h4 class="">Newest Posts</h4>
							<ul>
							<?php $posts = (new \Blog\Models\Posts)->setState('filter.publication_status', 'published')
                ->setState('filter.published_today', true)->setParam('limit',5)->getList(); ?>
							
							<?php foreach($posts as $post) : ?>
								<li><a href="/blog/post/<?php echo  $post->slug; ?>"><?php echo  $post->title; ?></a></li>
								<?php endforeach;?>
								
							</ul>
