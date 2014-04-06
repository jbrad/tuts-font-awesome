<article class="blog-post <?php echo is_sticky() ? 'jumbotron' : ''; ?>">
    <h1 class="blog-post-title">
        <?php if( is_single() || is_page() ) { ?>
            <?php the_title(); ?>
        <?php } else { ?>
            <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf( esc_attr__( '%s', TRANSLATION_KEY ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a>
        <?php } // end if ?>
    </h1>
    <?php if ( ! is_page() ) { ?>
        <p class="blog-post-meta">
            <?php if ( ! get_the_title() ) { ?>
                <a href="<?php the_permalink()?>"><?php the_time( get_option( 'date_format' ) ); ?></a>
            <?php } else { ?>
                <?php the_time( get_option( 'date_format' ) ); ?>
            <?php } // end if ?>
            &middot;&nbsp; <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php echo get_the_author_meta( 'display_name' ); ?>"><?php echo the_author_meta( 'display_name' ); ?></a>
            &middot;&nbsp;<?php comments_popup_link( __( '<span class="fa fa-comment"></span> Add New', 'standard' ), __( '<span class="fa fa-comment"></span> 1', 'standard' ), __( '<span class="fa fa-comment"></span> %', 'standard' ), '', ''); ?>
        </p>
    <?php } // end if ?>

    <div class="blog-content">
        <?php if( ( is_category() || is_archive() || is_home() ) && has_excerpt() ) { ?>
            <?php the_excerpt( ); ?>
            <a href="<?php echo get_permalink(); ?>"><?php _e( 'Continue Reading...', TRANSLATION_KEY ); ?></a>
        <?php } else { ?>
            <?php the_content( __( 'Continue Reading...', TRANSLATION_KEY ) ); ?>
        <?php } // end if/else ?>
        <?php
            wp_link_pages(
                array(
                    'before'            => '<ul class="pager"><li>',
                    'after'             => '</li></ul>',
                    'separator'         => '</li><li>',
                    'next_or_number'    => 'next',
                    'previouspagelink'  => __( '&laquo; Prev Page' ),
                    'nextpagelink'      => __( 'Next Page &raquo;' ),
                )
            );
        ?>
    </div><!-- /.blog-content -->

    <div class="blog-post-footer">
        <?php $category_list = get_the_category_list( __( ', ', 'standard' ) ); ?>
        <?php if( $category_list ) { ?>
            <?php printf( __( 'In %1$s', 'standard' ), $category_list ); ?>
        <?php } // end if ?>

        <?php $tag_list = get_the_tag_list( '', __( ', ', 'standard' ) ); ?>
        <?php if( $tag_list ) { ?>
            <?php printf( '<span class="fa fa-tags">&nbsp;' . __( '%1$s', 'standard' ) . '</span>', $tag_list ); ?>
        <?php } // end if ?>

        <a class="fa fa-link pull-right" href="<?php the_permalink(); ?>"></a>
    </div>

</article><!-- /.blog-post -->