<?php
/*
Template Name: All Posts
*/
get_header();

function custom_post_classes($classes)
{
    // Add custom classes here
    $classes[] = 'blog-articles';
    return $classes;
}

add_filter('post_class', 'custom_post_classes');
?>

<section id="primary">
    <main id="main">

        <?php //<h1 class="mb-6 page-title container-mid max-content-inner-big">Welcome to our Blog</h1>
        ?>
        <?php
        //show the content of the page
        the_content();
        ?>
        <section class="flex flex-col items-center my-12 text-black container-mid max-content-inner-big">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // Get the current page number

            $args = array(
                'post_type' => 'post', // Include only posts
                'posts_per_page' => 2, // Display 2 posts per page
                'paged' => $paged, // Pagination
            );



            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) :
                    $query->the_post();
                    get_template_part('template-parts/content/content', 'excerpt');
                endwhile;

                // Restore the global post data.
                wp_reset_postdata();

                // Previous/next page navigation.
                previous_posts_link('Previous Page');
                next_posts_link('Next Page', $query->max_num_pages);

            else :

                // If no content, include the "No posts found" template.
                get_template_part('template-parts/content/content', 'none');

            endif;
            ?>
        </section>
    </main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
?>
