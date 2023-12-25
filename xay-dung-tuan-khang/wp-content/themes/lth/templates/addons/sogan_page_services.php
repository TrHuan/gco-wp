
<!--Start slogan area-->
<?php $slogan = get_field('sogan_page_services', 'option'); ?>

<?php if( $slogan ): ?>
    <section class="slogan-v2-area" style="background-image:url(<?php echo $slogan['hinh_nen']; ?>);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="slogan-v2">                        
                        <div class="text">
                            <h2><?php echo $slogan['content']; ?></h2>
                        </div>
                        <div class="pull-right">
                            <?php 
                            $button = $slogan['button'];
                            if( $button ): 
                                $button_url = $button['url'];
                                $button_title = $button['title'];
                                $button_target = $button['target'] ? $button['target'] : '_self';
                                ?>

                                <a class="btn" href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>"><?php echo esc_html( $button_title ); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>     
        </div>
    </section>
<?php endif; ?>
<!--End slogan area-->