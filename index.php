<?php get_header();?>
<!-- PAGE INDEX -->
<main>
<?php
if (have_posts()): the_post(); the_content(); endif; ?>
</main>
<?php get_footer(); ?>