<?php get_header(); ?>
<main style="position:relative; z-index:2; min-height:80vh; padding:40px 20px;">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article class="ast-card" style="max-width:1100px; margin:0 auto; padding:40px;">
            <h1 style="font-family:var(--font-title); color:var(--ast-gold-light); margin-bottom:20px;"><?php the_title(); ?></h1>
            <div style="line-height:1.7;"><?php the_content(); ?></div>
        </article>
    <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>