<?php
/**
 * Template Name: Trang Bảng Giá
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

<main class="main main-page main-price-list">
    <section class="lth-price-list">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">                    
                    <?php if( have_rows('standard') ): ?>
                        <?php while( have_rows('standard') ): the_row(); ?>
                            <div class="module module_standard"> 
                                <div class="module_title">
                                    <h2 class="title">
                                        <?php the_sub_field('title'); ?>
                                    </h2>
                                </div>

                                <div class="module_content">
                                    <?php the_sub_field('content'); ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>  

                    <?php if( have_rows('rates') ): ?>
                        <?php while( have_rows('rates') ): the_row(); ?>
                            <div class="module module_rates"> 
                                <div class="module_title">
                                    <h2 class="title">
                                        <?php the_sub_field('title'); ?>
                                    </h2>
                                </div>

                                <?php if( have_rows('table') ): ?>
                                    <div class="module_table">
                                        <div class="table">
                                            <table style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" rowspan="2"><?php echo __('Trọng lượng (Gram)'); ?></th>
                                                        <th scope="col" rowspan="2"><?php echo __('Nội - Ngoại thành'); ?><span>Giao trong 12H</span></th>
                                                        <th scope="col" colspan="3"><?php echo __('Liên Tỉnh'); ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col"><?php echo __('Miền Nam'); ?></th>
                                                        <th scope="col"><?php echo __('Miền Trung'); ?></th>
                                                        <th scope="col"><?php echo __('Miền Bắc'); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php while( have_rows('table') ): the_row(); ?>
                                                        <tr>
                                                            <td><?php the_sub_field('weight'); ?></td>
                                                            <td><?php the_sub_field('inner_outer_city'); ?></td>
                                                            <td><?php the_sub_field('south'); ?></td>
                                                            <td><?php the_sub_field('central'); ?></td>
                                                            <td><?php the_sub_field('northern'); ?></td>
                                                        </tr>
                                                    <?php endwhile; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="module_describe">
                                    <?php the_sub_field('describe'); ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>  

                    <?php if( have_rows('extra_service') ): ?>
                        <?php while( have_rows('extra_service') ): the_row(); ?>
                            <div class="module module_extra_service"> 
                                <div class="module_title">
                                    <h2 class="title">
                                        <?php the_sub_field('title'); ?>
                                    </h2>
                                </div>

                                <div class="module_describe">
                                    <?php the_sub_field('describe'); ?>
                                </div>

                                <?php if( have_rows('table') ): ?>
                                    <div class="module_table">
                                        <div class="table">
                                            <table style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" rowspan="2"><?php echo __('Trọng lượng (Gram)'); ?></th>
                                                        <th scope="col" rowspan="2"><?php echo __('Nội - Ngoại thành'); ?><span>Giao trong 12H</span></th>
                                                        <th scope="col" colspan="3"><?php echo __('Liên Tỉnh'); ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col"><?php echo __('Miền Nam'); ?></th>
                                                        <th scope="col"><?php echo __('Miền Trung'); ?></th>
                                                        <th scope="col"><?php echo __('Miền Bắc'); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php while( have_rows('table') ): the_row(); ?>
                                                        <tr>
                                                            <td><?php the_sub_field('weight'); ?></td>
                                                            <td><?php the_sub_field('inner_outer_city'); ?></td>
                                                            <td><?php the_sub_field('south'); ?></td>
                                                            <td><?php the_sub_field('central'); ?></td>
                                                            <td><?php the_sub_field('northern'); ?></td>
                                                        </tr>
                                                    <?php endwhile; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>  

                    <?php if( have_rows('delivery_area') ): ?>
                        <?php while( have_rows('delivery_area') ): the_row(); ?>
                            <div class="module module_delivery_area"> 
                                <div class="module_title">
                                    <h2 class="title">
                                        <?php the_sub_field('title'); ?>
                                    </h2>
                                </div>

                                <div class="module_describe">
                                    <?php the_sub_field('describe'); ?>
                                </div>

                                <?php if( have_rows('table') ): ?>
                                    <div class="module_table">
                                        <div class="table">
                                            <table style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" rowspan="2"><?php echo __('Trọng lượng (Gram)'); ?></th>
                                                        <th scope="col" rowspan="2"><?php echo __('Nội - Ngoại thành'); ?><span>Giao trong 12H</span></th>
                                                        <th scope="col" colspan="3"><?php echo __('Liên Tỉnh'); ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col"><?php echo __('Miền Nam'); ?></th>
                                                        <th scope="col"><?php echo __('Miền Trung'); ?></th>
                                                        <th scope="col"><?php echo __('Miền Bắc'); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php while( have_rows('table') ): the_row(); ?>
                                                        <tr>
                                                            <td><?php the_sub_field('weight'); ?></td>
                                                            <td><?php the_sub_field('inner_outer_city'); ?></td>
                                                            <td><?php the_sub_field('south'); ?></td>
                                                            <td><?php the_sub_field('central'); ?></td>
                                                            <td><?php the_sub_field('northern'); ?></td>
                                                        </tr>
                                                    <?php endwhile; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="module_note">
                                    <?php the_sub_field('note'); ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>  

                    <?php if( have_rows('delivery_time') ): ?>
                        <?php while( have_rows('delivery_time') ): the_row(); ?>
                            <div class="module module_delivery_time"> 
                                <div class="module_title">
                                    <h2 class="title">
                                        <?php the_sub_field('title'); ?>
                                    </h2>
                                </div>

                                <div class="module_content">
                                    <?php the_sub_field('content'); ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>  

                    <?php if( have_rows('policy') ): ?>
                        <?php while( have_rows('policy') ): the_row(); ?>
                            <div class="module module_policy"> 
                                <div class="module_title">
                                    <h2 class="title">
                                        <?php the_sub_field('title'); ?>
                                    </h2>
                                </div>

                                <div class="module_content">
                                    <?php the_sub_field('content'); ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>                    
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
