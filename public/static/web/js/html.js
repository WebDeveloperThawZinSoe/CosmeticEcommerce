$(function () {
    $('body').on('click', function (e) {
        if (!$('.sell_to_us .input_box input').is(e.target) && $('.sell_to_us .input_box input').has(e.target).length === 0) {
            $('.sell_to_us .input_box>ul').hide();
        }

        if (!$('.sell_to_us .sell_contact .select_title').is(e.target) && $('.sell_to_us .sell_contact .select_title').has(e.target).length === 0) {
            $('.sell_to_us .sell_contact .selltous_down_select').hide();
        }
    });


    // sell to us
    $('.sell_to_us .input_box').on('focus', 'input', function () {
        $(this).siblings('ul').show();
        $(this).parents('.input_box').siblings('.input_box').find('ul').hide();
    });
    // 选择游戏
    $('.sell_to_us .sell_game').on('click', 'ul li', function () {
        $('.sell_game .tips').remove();
        $(this).addClass('active').siblings('li').removeClass('active');
        $(this).parents('ul').siblings('input').val($(this).text());
        var game_sku = $(this).attr('value');
        $('.sell_product[gamesku=' + game_sku + ']').addClass('display').siblings('.sell_product')
            .removeClass('display');
        $('.sell_to_us .sell_platForm, .sell_to_us .sell_server').removeClass('display');
        $('.sell_to_us .sell_product li').removeClass('active');
        $('.sell_to_us .sell_product input, .sell_to_us .sell_platForm input, .sell_to_us .sell_server input')
            .val('');
        $('.sell_coins').removeClass('display');
    });

    // 选择模版
    $('.sell_to_us .sell_product').on('click', 'ul li', function () {
        $('.sell_product .tips').remove();
        $(this).addClass('active').siblings('li').removeClass('active');
        $(this).parents('ul').siblings('input').val($(this).text());
        var type = $(this).attr('value');
        if (type == 'Gold' || type == 'Rune') {
            $('.sell_coins').addClass('display');
        } else {
            $('.sell_coins').removeClass('display');
            $('.sell_coins input').val('');
        }
        var game_sku = $(this).parents('.sell_product').attr('gamesku');
        $('.sell_to_us .sell_platForm li').removeClass('active');
        $('.sell_platForm input, .sell_to_us .sell_server input').val('');
        $('.sell_to_us .sell_platForm, .sell_to_us .sell_server').removeClass('display');
        if ($('.sell_platForm').length > 0) {
            $('.sell_platForm').each(function () {
                if ($(this).attr('gamesku') == game_sku && $(this).attr('productType') ==
                    type) {
                    $(this).addClass('display');
                } else {
                    $(this).removeClass('display');
                }
            });
        }
    });

    // 选择设备
    $('.sell_to_us .sell_platForm').on('click', 'ul li', function () {
        $('.sell_platForm .tips').remove();
        $(this).addClass('active').siblings('li').removeClass('active');
        $(this).parents('ul').siblings('input').val($(this).text());
        var deviceid = $(this).attr('deviceid');
        var type = $(this).parents('.sell_platForm').attr('productType');
        var game_sku = $(this).parents('.sell_platForm').attr('gamesku');
        $('.sell_to_us .sell_server li').removeClass('active');
        $('.sell_to_us .sell_server input').val('');
        $('.sell_to_us .sell_server').removeClass('display');
        if ($('.sell_server').length > 0) {
            $('.sell_server').each(function () {
                if ($(this).attr('gamesku') == game_sku && $(this).attr('productType') ==
                    type && $(this).attr('deviceid') == deviceid) {
                    $(this).addClass('display');
                } else {
                    $(this).removeClass('display');
                }
            });
        }
    });

    // 选择服务器
    $('.sell_to_us .sell_server').on('click', 'ul li', function () {
        $('.sell_server .tips').remove();
        $(this).addClass('active').siblings('li').removeClass('active');
        $(this).parents('ul').siblings('input').val($(this).text());
    });

    // 选择contact
    $('.sell_to_us .sell_contact').on('click', '.select_title', function () {
        console.log($('.sell_to_us .sell_contact .selltous_down_select'));
        $('.sell_to_us .sell_contact .selltous_down_select').show();
    });

    $('.sell_to_us .sell_contact').on('click', 'ul li', function () {
        $(this).addClass('active').siblings('li').removeClass('active');
        $(this).parents('ul').siblings('.select_title').find('span').text($(this).text());
    });

    // 提交sell to us
    $('.sell_to_us .your_info .submit button').click(function () {
        $('.tips').remove();
        var game_sku = $('.sell_game .selltous_down_select li.active').attr('value');
        var paypal_email = $('.paypal_email input').val();
        var email = $('.sell_email input').val();
        var contact = $('.sell_contact input').val();
        var contact_type = $('.sell_contact .selltous_down_select li.active').attr('value');
        var server = $('.sell_server.display .selltous_down_select li.active').text();
        var server_id = $('.sell_server.display .selltous_down_select li.active').attr('value');
        var platform = $('.sell_platForm.display .selltous_down_select li.active').text();
        var platform_id = $('.sell_platForm.display .selltous_down_select li.active').attr('deviceid');
        var product = $('.sell_product.display .selltous_down_select li.active').attr('value');
        var coins = $('.sell_coins.display input').val();
        var game = $('.sell_game input').val(); //游戏
        let usernameReq = /^[\w\.\-]+@[\w\.\-]+(\.\w+)+$/;
        if (game == '') {
            validate($('.sell_game input'));
            return false;
        }
        var inputs = $('.sell_common.display');
        vidateFlag = 0;
        inputs.each(function () {
            if ($(this).find('input').val() == '') {
                vidateFlag++;
                validate($(this).find('input'));
                return false;
            }
        });
        if (vidateFlag > 0) {
            return false;
        }

        if (coins == '') {
            validate($('.sell_coins.display input'));
            return false;
        }
        if (paypal_email == '') {
            validate($('.paypal_email input'));
            return false;
        }
        if (!usernameReq.test(paypal_email)) {
            validate($('.paypal_email input'), 'Please enter a valid paypal email address');
            return false;
        }
        if (email == '') {
            validate($('.sell_email input'));
            return false;
        }
        if (!usernameReq.test(email)) {
            validate($('.sell_email input'), 'Please enter a valid email address');
            return false;
        }
        if (contact == '') {
            validate($('.sell_contact input'));
            return false;
        }
        var that = $(this);
        $.ajax({
            url: siteUrl + '/selltous',
            type: 'post',
            dataType: 'json',
            data: {
                game_sku: game_sku,
                product: product,
                platform_id: platform_id,
                platform: platform,
                server_id: server_id,
                server: server,
                coins: coins,
                paypal_email: paypal_email,
                email: email,
                contact_type: contact_type,
                contact: contact
            },
            beforeSend: function () {
                that.attr('disabled', true).find('i').css('display', 'block');
                that.find('span').hide();
            },
            success: function (res) {
                if (res.code == 200) {
                    that.attr('disabled', false).find('i').hide();
                    that.find('span').show();
                    $('.modal').show();
                    $('.sell_to_us .sell-tips').show().find('p span').text(res.data.sell_no);
                }
            }
        });

    });

    function validate(ele, txt = 'This field is required', isFocus = false) {
        if (isFocus) {
            ele.focus();
        }
        ele.parents('.input_box').append('<div class="tips">' + txt + '</div>');
    }

});