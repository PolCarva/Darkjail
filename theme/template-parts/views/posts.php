<main role="main">
  <h1>
    <?php echo $args['title']; ?>
  </h1>

<?php if (count($args['posts']) > 0): ?>
  <ul class="wp-block-latest-posts is-grid columns-3 alignwide">
  <?php foreach ($args['posts'] as $post): ?>
    <?php setup_postdata($post); ?>

    <li>
      <?php if (has_post_thumbnail()): ?>
        <div class="wp-block-latest-posts__featured-image">
          <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('medium'); ?>
          </a>
        </div>
      <?php endif; ?>

      <a href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
      </a>

      <div class="wp-block-latest-posts__post-author">
        by <?php the_author(); ?>
      </div>
      <time datetime="{{ post.post_date }}">
        <?php echo get_the_date(); ?>
      </time>
      <div class="wp-block-latest-posts__post-excerpt">
        <?php the_excerpt(); ?>
      </div>
    </li>
  <?php endforeach; ?>
  </ul>

<?php else: ?>
  <h1 class="has-text-align-center">
    No Posts Found
  </h1>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
</main>