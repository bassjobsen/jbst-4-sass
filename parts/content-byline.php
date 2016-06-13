<p class="byline">
	<?php echo __('Posted on', 'jbst-4').' '?><time itemprop="dataPublished"><?php the_time('F j, Y') ?></time> <span itemprop="author" itemscope itemtype="https://schema.org/Person"> <?php echo __('by', 'jbst-4').' ' ?><?php the_author_posts_link(); ?></span>  - <?php the_category(', ') ?>
</p>	
