<?php //echo \Dsc\Debug::dump( $state, false ); ?>
<?php //echo \Dsc\Debug::dump( $list, false ); ?>

<div>

    <div>
    
        <?php if (!empty($list['subset'])) { ?>
    
        <?php foreach ($list['subset'] as $item) { $item->_url = './blog/post/' . $item->{'metadata.slug'}; ?>
        <article id="post-<?php echo $item->id; ?>" class="post-<?php echo $item->id; ?>">

            <header class="entry-header">
                <?php if ($item->{'details.featured_image.slug'}) { ?>
                <img class="entry-featured img-responsive"
                    src="./asset/<?php echo $item->{'details.featured_image.slug'} ?>">
                <?php } ?>
            
                <?php if ($item->{'metadata.creator.image'}) { ?>
                <img class="entry-avatar" alt="<?php echo $item->{'metadata.creator.name'}; ?>" height="52" width="52"
                    src="<?php echo $item->{'metadata.creator.image'}; ?>">
                <?php } ?>
                
                <h2 class="entry-title">
                    <a href="<?php echo $item->_url; ?>">
                    <?php echo $item->{'metadata.title'}; ?>
                    </a>
                </h2>
                <div class="entry-meta">
                    <a href="<?php echo $item->_url; ?>" title="<?php echo date( 'g:i a', $item->{'publication.start.time'} ); ?>"
                        rel="bookmark">
                        <time class="entry-date"
                            datetime="<?php echo str_replace( ' ', 'T', $item->{'publication.start.local'} ) . $item->{'publication.start.offset'}; ?>"><?php echo date( 'F j, Y', $item->{'publication.start.time'} ); ?></time>
                    </a>
                    <span class="byline">
                        by
                        <span class="author vcard">
                            <a class="url fn n" href="./blog/author/<?php echo $item->{'metadata.creator.id'}; ?>" title="View all posts by <?php echo $item->{'metadata.creator.name'}; ?>" rel="author"><?php echo $item->{'metadata.creator.name'}; ?></a>
                        </span>
                    </span>
                    <span class="sep"> - </span>
                    <span class="comments-link">
                        <a href="<?php echo $item->_url; ?>#respond" title="Comment on <?php echo $item->{'metadata.title'}; ?>">0 comments</a>
                    </span>
                </div>
            </header>

            <div class="entry-description">
                <?php echo $item->{'details.copy'}; ?>
            </div>

            <footer class="entry-meta">
                <?php if (!empty($item->{'metadata.tags'})) { ?>
                <div class="tag-links">
                    <?php foreach ($item->{'metadata.tags'} as $tag) { ?>
                    <a class="label label-danger" href="./blog/tag/<?php echo $tag; ?>" rel="tag"><?php echo $tag; ?></a>
                    <?php } ?>
                </div>
                <?php } ?>
                
                <?php if (!empty($item->{'metadata.categories'})) { ?>
                <div class="cat-links">
                    <?php foreach ($item->{'metadata.categories'} as $category) { ?>
                    <a class="label label-danger" href="./blog/category/<?php echo $category['slug']; ?>" title="View all posts in <?php echo $category['title']; ?>" rel="category tag"><?php echo $category['title']; ?></a>
                    <?php } ?>
                </div>
                <?php } ?>
                
            </footer>
        </article>
        <?php } ?>
        
        <?php } else { ?>
            
                <div class="">No items found.</div>
            
        <?php } ?>

    
    </div>

    <div class="row datatable-footer">
        <?php if (!empty($list['count']) && $list['count'] > 1) { ?>
        <div class="col-sm-10">
            <?php echo (!empty($list['count']) && $list['count'] > 1) ? $pagination->serve() : null; ?>
        </div>
        <?php } ?>
        <div class="col-sm-2 pull-right">
            <div class="datatable-results-count pull-right">
            <?php echo $pagination ? $pagination->getResultsCounter() : null; ?>
            </div>
        </div>
    </div>

</div>