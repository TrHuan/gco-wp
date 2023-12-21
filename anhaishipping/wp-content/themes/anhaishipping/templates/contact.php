<?php
/**
 * Template Name: Trang Liên Hệ
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

<main class="main main-page main-contacts">
    <section class="lth-contacts">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="module module_address"> 
                        <?php if( have_rows('contacts') ): ?>
                            <?php while( have_rows('contacts') ): the_row(); ?>
                                <?php if (get_sub_field('title')) { ?>
                                <div class="module_title" style="text-align: left;">
                                    <h2 class="title"><?php the_sub_field('title'); ?></h2>
                                </div>    
                                <?php } ?>                    
                                <div class="module_content">
                                    <?php if( have_rows('content') ): ?>
                                        <?php while( have_rows('content') ): the_row(); ?>
                                        <?php if (get_sub_field('title')) { ?>
                                            <h3><?php the_sub_field('title'); ?></h3>
                                        <?php } ?>

                                        <div class="content">
                                            <ul>
                                                <li>
                                                    <i class="icofont-ui-call icon"></i>
                                                    <label><?php echo __('ĐT: '); ?></label>
                                                    <a href="tel: <?php the_sub_field('phone'); ?>" title="<?php the_sub_field('phone'); ?>"><?php the_sub_field('phone'); ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <i class="icofont-envelope icon"></i>
                                                    <label><?php echo __('Email: '); ?></label>
                                                    <a href="mailto: <?php the_sub_field('email'); ?>" title="<?php the_sub_field('email'); ?>"><?php the_sub_field('email'); ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <i class="icofont-ui-user icon"></i>
                                                    <label><?php echo __('Admin: '); ?></label>
                                                    <a href="<?php the_sub_field('admin'); ?>" title="<?php the_sub_field('admin'); ?>"><?php the_sub_field('admin'); ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <i class="icofont-google-map icon"></i>
                                                    <label><?php echo __('Địa chỉ: '); ?></label>
                                                    <?php the_sub_field('address'); ?>
                                                </li>
                                            </ul>
                                        </div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>                      
                </div>

                <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12 col-12">
                    <?php $contact_form_7 = get_field('contact_form_7');
                        if ($contact_form_7) :
                    ?>
                        <div class="module module_contact">
                            <div class="module_title">
                                <h2 class="title">
                                    <?php echo $contact_form_7['title']; ?>
                                </h2>
                            </div>

                            <div class="module_content">
                                <?php echo do_shortcode($contact_form_7['content']); ?>
                            </div>
                        </div>
                    <?php endif; ?>               
                </div>
            </div>
        </div>
    </section>

    <?php if( have_rows('department') ): ?>
        <section class="lth-department">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="module module_department">  
                            <div class="module_title">
                                <h2 class="title">
                                    <?php echo __('Thông tin phòng ban'); ?>
                                </h2>
                            </div>

                            <div class="module_content">
                                <div class="table">
                                    <table style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th scope="col"><?php echo __('Phòng ban'); ?></th>
                                                <th scope="col"><?php echo __('E-Mail'); ?></th>
                                                <th scope="col"><?php echo __('Điện thoại'); ?></th>
                                                <th scope="col"><?php echo __('Fax'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while( have_rows('department') ): the_row(); ?>
                                                <tr>
                                                    <td><?php the_sub_field('title'); ?></td>
                                                    <td class="email">
                                                        <a href="mailto: <?php the_sub_field('email'); ?>" title="<?php the_sub_field('email'); ?>">
                                                            <?php the_sub_field('email'); ?>
                                                        </a>             
                                                    </td>
                                                    <td>
                                                        <a href="tel: <?php the_sub_field('phone'); ?>" title="<?php the_sub_field('phone'); ?>">
                                                            <?php the_sub_field('phone'); ?>
                                                        </a>
                                                    </td>
                                                    <td><?php the_sub_field('fax'); ?></td>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if (get_field('google_map') == 'true') { ?>
        <section class="lth-map">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="module module_map">  
                            <div class="module_title">
                                <h2 class="title">
                                    <?php echo __('Bản đồ'); ?>
                                </h2>
                            </div>

                            <div class="module_content">
                                <?php echo get_field('google_map', 'option'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
</main>

<?php get_footer(); ?>
