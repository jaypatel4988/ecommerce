<?php get_header(); ?>

<main>
    <!-- Adding a carousel to the site's homepage (static) -->
    <div class="glide">
        <div class="glide__track" data-glide-el="track" >
            <div class="glide__slides">
                <section class="glide__slide feature" style="background-image: url(<?php the_post_thumbnail_url(); ?>); min-height: 60vh; background-size: cover; background-position: center;"></section>
                <section class="glide__slide feature" style="background-image: url('http://test123.local/wp-content/uploads/2021/03/nike-cosmic-unity-basketball-shoe-official-images-release-date-1_hd_1600.jpg'); min-height: 60vh; background-size: cover; background-position: center;"></section>
                <section class="glide__slide feature" style="background-image: url('http://test123.local/wp-content/uploads/2021/03/photo-1582588678413-dbf45f4823e9.jpg'); min-height: 60vh; background-size: cover; background-position: center;"></section>
            </div>
        </div>

        <div class="glide__bullets" data-glide-el="controls[nav]">
            <button class="glide__bullet" data-glide-dir="=0"></button>
            <button class="glide__bullet" data-glide-dir="=1"></button>
            <button class="glide__bullet" data-glide-dir="=2"></button>
        </div>
    </div>
    <div class="grid-container">
        <article class="post">
            <?php 
                the_content();
            ?>
        </article>
    </div>
</main>

<script>
    new Glide('.glide', {
        autoplay: 2000
    }).mount()
</script>

<?php get_footer(  ); ?>