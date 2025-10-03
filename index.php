<?php get_header(); ?>
<main id="main-content">
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <?php get_template_part('content', get_post_format()); ?>
<?php endwhile; else: ?>
    <p><?php _e('No news found.', 'infonepalonline-theme'); ?></p>
<?php endif; ?>
</main>
<?php get_footer(); ?>
