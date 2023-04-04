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
$feat_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail' );
?>

<div id="post-<?php the_ID(); ?>">
    <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
        <div class="card | relative inline-block float-left w-[--card-size] h-[--card-size]" style="--card-size: 200px">
            <div class="card-content | absolute w-full h-full rounded-lg shadow-lg shadow-neutral-300 transition-transform ease-out duration-1000">
                <div class="card-front | text-center bg-[--card-front-bg] text-[--card-front-text] absolute w-full h-full flex flex-col items-center justify-center rounded-lg px-4">
                    <?php if ( $icon ) : ?>
                    <div class="card-icon | text-[--card-front-icon]">
                        <span class="fa-stack fa-2x">
                            <i class="text-white fa-solid fa-circle fa-stack-2x"></i>
                            <i class="fa-duotone <?php echo $icon; ?> fa-stack-1x "></i>
                        </span>
                    </div>
                    <?php endif; ?>
                    <?php the_title( '<h4 class="my-2 font-light leading-none text-current">', '</h4>' ); ?>
                </div>
                <div class="card-back | absolute w-full h-full flex flex-col items-center justify-center rounded-lg px-4 bg-[--card-back-bg] text-[--card-back-text] bg-no-repeat bg-cover bg-blend-multiply shadow-neutral-900/50" style="background-image: url('<?php echo $feat_image_url[0]; ?>')">
                    <?php
                    the_title( '<h6 class="my-2 leading-none tracking-wide text-center text-current text-shadow">', '</h6>' );
                    echo '<p class="text-center text-shadow">' . ll_no_widows( $message['label'] ) . '</p>';
                    ?>
                </div>
            </div>
        </div>
    </a>
</div>
