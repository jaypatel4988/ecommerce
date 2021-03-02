<?php get_header(); ?>

<main>
    <section class="feature" style="background-image: url(<?php the_post_thumbnail_url(); ?>); min-height: 60vh; background-size: cover; background-position: center;">
    </section>
    <div class="grid-container">
        <article class="post">
            <?php 
                the_content();
            ?>
        </article>
    </div>
</main>

<?php get_footer(  ); ?>