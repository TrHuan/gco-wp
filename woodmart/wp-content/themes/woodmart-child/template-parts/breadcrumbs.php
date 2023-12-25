<div class="nav-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                
                <?php if (is_single()) { ?>
                    <h2 class="title">
                        <?php $archive_page = get_pages(
                            array(
                                'meta_key' => '_wp_page_template',
                                'meta_value' => 'templates/tuyen-dung.php'
                            )
                        );
                        echo $archive_name = $archive_page[0]->post_title; ?>
                    </h2>
                <?php } else { ?>
                    <h1 class="title">
                        <?php if (get_post_type() == 'tuyen-dung' || get_queried_object()->taxonomy == 'tuyen-dung-cat') {
                            if (is_tax()) {
                                single_cat_title();
                            } else {
                                $archive_page = get_pages(
                                    array(
                                        'meta_key' => '_wp_page_template',
                                        'meta_value' => 'templates/tuyen-dung.php'
                                    )
                                );
                                echo $archive_name = $archive_page[0]->post_title;
                            }
                        } ?>
                    </h1>
                <?php } ?>
            </div>
        </div>
    </div>
</div>