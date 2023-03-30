<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

$icon = get_field( 'll_page_icon' );
$message = get_field( 'll_brand_message', $post->ID );
$feat_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium' );
?>

<div id="post-<?php the_ID(); ?>">
    <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
        <div class="card">
            <div class="card-content">
                <div class="card-front">
                    <div class="card-icon">
                        <span class="fa-stack fa-2x">
                            <i class="fa-solid fa-circle fa-stack-2x text-neutral-100"></i>
                            <i class="fa-duotone <?php echo $icon; ?> fa-stack-1x text-brand-blue"></i>
                        </span>
                    </div>
                    <?php the_title( '<h3 class="my-2 font-light tracking-wide text-current">', '</h3>' ); ?>
                </div>
                <div class="card-back bg-blend-overlay" style="background-image: url('<?php echo $feat_image_url[0]; ?>')">
                    <?php
                    the_title( '<h6 class="my-2 tracking-wide text-center text-current">', '</h6>' );
                    echo '<p class="text-center">' . ll_no_widows( $message['label'] ) . '</p>';
                    ?>
                </div>
            </div>
        </div>
    </a>
</div>
