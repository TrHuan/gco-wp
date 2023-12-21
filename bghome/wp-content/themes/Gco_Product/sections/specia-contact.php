<?php global $vz_options;?>
<div class="container tit-tabs_information">
    <h2 class="title-alls__mains"><?php echo $vz_options['opt-title-tabs_information'];?></h2>
</div>
<section id="wrapper_contact_information">
    <div class="background-overlay">
        <div class="container">
            <div class="box__contact_information">
                <div class="navigation-tabs_information">
                    <?php if (isset($vz_options['opt-slides-tabs_information']) && !empty($vz_options['opt-slides-tabs_information'])) : ?>
                        <ul class="nav nav-tabs">
                            <?php 
                            $tabs_information = $vz_options['opt-slides-tabs_information']; 
                            $i=0; foreach ($tabs_information as $key => $value) : ?>
                            <?php if ($i==0): ?>
                                <li class="active">
                                    <a data-toggle="tab" href="#tabs_information<?php echo $i;?>">
                                        <h3><?php echo $value['title']?></h3>
                                        <p><?php echo $value['url']?></p>
                                    </a>
                                </li>
                            <?php else: ?>
                                <li>
                                    <a data-toggle="tab" href="#tabs_information<?php echo $i;?>">
                                        <h3><?php echo $value['title']?></h3>
                                        <p><?php echo $value['url']?></p>
                                    </a>
                                </li>
                            <?php endif ?>
                            <?php $i++; endforeach; ?>
                        </ul>
                    <?php endif;?>
                </div>
                <div class="content-tabs_information">
                <?php if (isset($vz_options['opt-slides-tabs_information']) && !empty($vz_options['opt-slides-tabs_information'])) : ?>
                    <div class="tab-content">
                        <?php 
                        $tabs_information = $vz_options['opt-slides-tabs_information']; 
                        $i=0; foreach ($tabs_information as $key => $value) : ?>
                        <?php if ($i==0): ?>
                            <div id="tabs_information0" class="tab-pane fade in active">
                                <div class="box-tabs-goolemaps">
                                    <?php echo $value['description']?>
                                </div>
                            </div>
                            <?php else: ?>
                            <div id="tabs_information<?php echo $i;?>" class="tab-pane fade">
                                <div class="box-tabs-goolemaps">
                                    <?php echo $value['description']?>
                                </div>
                            </div>  
                        <?php endif ?>
                        <?php $i++; endforeach; ?>
                    </div>
                <?php endif;?>
                </div>
            </div>
        </div>  
    </div>  
</section>