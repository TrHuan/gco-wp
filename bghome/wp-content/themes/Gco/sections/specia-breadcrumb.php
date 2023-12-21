<section id="section-breadcrumb">
    <div class="background-overlay">
        <div class="container">
            <div class="page-breadcrumb">
                <?php
                if ( function_exists('yoast_breadcrumb') ) {
                  yoast_breadcrumb( '<p>','</p>' );
                }
                ?>
            </div>
        </div>
    </div>
</section>