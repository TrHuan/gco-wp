<?php
global $post;
$mcal_down_payment = '';
$currency_symbol = currency_maker();
$currency_symbol = $currency_symbol['currency'];
$mcal_terms = houzez_option('mcal_terms', 12);
$mcal_down_payment = houzez_option('mcal_down_payment', 15);
$mcal_interest_rate = houzez_option('mcal_interest_rate', 3.5);
$mcal_prop_tax_enable = houzez_option('mcal_prop_tax_enable', 1);
$mcal_prop_tax = houzez_option('mcal_prop_tax', 3000);
$mcal_hi_enable = houzez_option('mcal_hi_enable', 1);
$mcal_hi = houzez_option('mcal_hi', 1000);
$mcal_pmi_enable = houzez_option('mcal_pmi_enable', 1);
$mcal_pmi = houzez_option('mcal_pmi', 1000);
$property_price = get_post_meta($post->ID, 'fave_property_price', true); 
$property_price = intval($property_price);

if ( class_exists( 'FCC_Rates' ) && houzez_currency_switcher_enabled() && isset( $_COOKIE[ "houzez_set_current_currency" ] ) ) {

    $currency_data = Fcc_get_currency($_COOKIE['houzez_set_current_currency']);
    $currency_symbol = $currency_data['symbol'];

    if( function_exists('houzez_get_plain_price') ) {
        $property_price = houzez_get_plain_price($property_price );
    }
}

if($property_price != 0 ) {
    $mcal_down_payment = ($mcal_down_payment / 100) * $property_price;
}

if($property_price == 0) {
    $mcal_terms = $mcal_down_payment = $mcal_interest_rate = $mcal_prop_tax = $mcal_hi = $mcal_pmi = $property_price = '';
}

?>
<div class="d-flex align-items-center sm-column">
    <div class="mortgage-calculator-data flex-fill">
        <form method="post">
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="form-group">
                        <label>
                            <?php echo houzez_option('price_total', 'Giá trị nhà đất (tỷ VNĐ)'); ?></label>
                        <div class="input-group range-slider">
                            <input id="total_amount" type="text" class="form-control" placeholder="<?php echo houzez_option('spc_total_amt', 'Total Amount'); ?>" value="6000000000">
                            <input id="total_amount1" type="range" value="6" min="0.1" max="25" step="0.1" class=" range-slider__range">
                            <p class="range-slider__value"> </p>
                            <span class="range-slider-label"> tỷ</span>
                            <div class="kq_total"> </div>
                        </div><!-- input-group -->
                        
                    </div><!-- form-group -->
                </div><!-- col-md-4 -->
                <div class="col-md-12 col-12">
                    <div class="form-group">
                        <label>
                            <?php echo houzez_option('spc_down__payment', 'Trả trước (tỷ VNĐ)'); ?></label>
                        <div class="input-group  range-slider">
                            <input id="down_payment" type="text" class="form-control" placeholder="<?php echo houzez_option('spc_down_payment', 'Down Payment'); ?>" value="1000000000">
                            <input id="down_payment1" type="range" value="1" min="0.1" max="25" step="0.1" class=" range-slider__range">
                            <span class="range-slider__value">0 </span>
                            <span class="range-slider-label"> tỷ</span>
                            <!-- <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <?php //echo esc_attr($currency_symbol);?>
                                </div>
                            </div> -->
                            <!-- input-group-prepend -->
                        </div><!-- input-group -->
                    </div><!-- form-group -->
                </div><!-- col-md-4 -->
                
                <div class="col-md-12 col-12">
                    <div class="form-group">
                        <label>
                            <?php echo houzez_option('spc_load__term', 'Thời hạn vay (năm)'); ?></label>
                        <div class="input-group range-slider">
                            <input id="loan_term" type="text" class="form-control1" placeholder="<?php echo houzez_option('spc_load_term', 'Loan Terms (Years)'); ?>" value="5">
                            <input id="interest_rate1" type="range" value="5" min="1" max="35" step="1" class=" range-slider__range">
                            <span class="range-slider__value year">0 </span>
                            <span class="range-slider-label year">năm</span>
                            <!-- input-group-prepend -->
                        </div><!-- input-group -->
                    </div><!-- form-group -->
                </div><!-- col-md-4 -->

                <div class="col-md-12 col-12">
                    <div class="form-group">
                        <label>
                            <?php echo houzez_option('spc__ir', 'Lãi suất (%/năm)'); ?></label>
                        <div class="input-group range-slider">
                            <input id="interest_rate" type="text" class="form-control1" placeholder="<?php echo houzez_option('spc_ir', 'Interest Rate'); ?>" value="12">
                            <input id="interest_rate1" type="range" value="12" min="0.1" max="20" step="0.1" class=" range-slider__range">
                            <span class="range-slider__value">0 </span>
                            <span class="range-slider-label">%</span>
                            <!-- input-group-prepend -->
                        </div><!-- input-group -->
                    </div><!-- form-group -->
                </div><!-- col-md-4 -->

                <?php if($mcal_prop_tax_enable) { ?>
                <div class="col-md-12 col-12">
                    <div class="form-group">
                        <label>
                            <?php echo houzez_option('spc_prop_tax', 'Property Tax'); ?></label>
                        <div class="input-group">
                            <input id="property_tax" type="text" class="form-control" placeholder="<?php echo houzez_option('spc_prop_tax', 'Property Tax'); ?>" value="1000000000">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <?php echo esc_attr($currency_symbol);?>
                                </div>
                            </div><!-- input-group-prepend -->
                        </div><!-- input-group -->
                    </div><!-- form-group -->
                </div><!-- col-md-4 -->
                <?php } ?>
                <?php if($mcal_hi_enable) { ?>
                <div class="col-md-12 col-12">
                    <div class="form-group">
                        <label>
                            <?php echo houzez_option('spc_hi', 'Home Insurance'); ?></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <?php echo esc_attr($currency_symbol);?>
                                </div>
                            </div><!-- input-group-prepend -->
                            <input id="home_insurance" type="text" class="form-control" placeholder="<?php echo houzez_option('spc_hi', 'Home Insurance'); ?>" value="<?php echo esc_attr($mcal_hi); ?>">
                        </div><!-- input-group -->
                    </div><!-- form-group -->
                </div><!-- col-md-4 -->
                <?php } ?>
                <?php if($mcal_pmi_enable) { ?>
                <div class="col-md-12 col-12">
                    <div class="form-group">
                        <label>
                            <?php echo houzez_option('spc_pmi', 'PMI'); ?></label>
                        <div class="input-group">
                            <input id="pmi" type="text" class="form-control" placeholder="<?php echo houzez_option('spc_pmi', 'PMI'); ?>" value="<?php echo esc_attr($mcal_pmi); ?>">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <?php echo esc_attr($currency_symbol);?>
                                </div>
                            </div><!-- input-group-prepend -->
                        </div><!-- input-group -->
                    </div><!-- form-group -->
                </div><!-- col-md-4 -->
                <?php } ?>
                <div class="col-md-12 col-12">
                    <div class="mortgage-option-group">
                        <div class="view-sum option">
                            <button id="calculate_loan" type="submit" class="btn">Tính đều <br> hàng tháng</button>
                        </div>
                        <div class="view-sum option1">
                            <button id="calculate_healer" type="submit" class="btn">Tính theo <br> dư nợ giảm dần</button>
                        </div>
                        
                    </div>
                    <div class="number-moneys"> </div>
                </div><!-- col-md-12 -->
                
                
            </div><!-- row -->
        </form>
    </div><!-- mortgage-calculator-data -->
    <div class="mortgage-calculator-chart flex-fill">
        <h3 class="kq">Kết quả</h3>
        <div class="mortgage-calculator-monthly-payment-wrap">
            <div id="m_monthly_val" class="mortgage-calculator-monthly-payment"></div>

            <div id="m_debt_val" class="mortgage-calculator-monthly-payment"> </div> 

            <!-- <div class="mortgage-calculator-monthly-requency">
                <?php //echo houzez_option('spc_monthly', 'Monthly'); ?>
            </div> -->
        </div>
        <canvas id="mortgage-calculator-chart" width="250" height="250"></canvas>
        
        <div class="instruct-page">
            <a href="/huong-dan-vay-mua-nha/" target="=_blank"><i class="fa fa-file-alt"></i> Hướng dẫn vay mua nhà</a>
        </div>

    </div><!-- mortgage-calculator-chart -->
</div><!-- d-flex -->



