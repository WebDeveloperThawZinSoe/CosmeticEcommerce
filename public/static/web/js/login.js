$(function () {
    $('.sign-select ul li').click(function() {
        $(this).addClass('active').siblings('li').removeClass('active')
        var type = $(this).attr('data-type')
        $('.sign-form[data-type='+type+']').addClass('display').siblings('.sign-form').removeClass('display')
      })
    // 注册
    $('.sign-form.register').on('click', 'button', function () {
        $('.sign-register .input-box').removeClass('required');
        $('.tips').remove();
        var username, pwd, repwd, usernameReq, pwdReq;
        username = $('.sign-form.register .email input').val();
        pwd = $('.sign-form.register .pass input').val();
        repwd = $('.sign-form.register .repass input').val();
        usernameReq = /^[\w\.\-]+@[\w\.\-]+(\.\w+)+$/;
        pwdReq = /^[a-zA-Z0-9]{6,}$/;
        if (username == '') {
            validation($('.sign-form.register .email input'), "This field is required");
            $(".sign .email .username").focus();
            return false;
        } else {
            if (!usernameReq.test(username)) {
                validation($('.sign-form.register .email input'), "Please enter a valid email address");
                $('.sign-form.register .email input').focus();
                return false;
            }
        }
        if (pwd == '') {
            validation($('.sign-form.register .pass input'), "This field is required");
            $('.sign-form.register .pass input').focus();
            return false;
        } else {
            if (pwd.trim().length < 6) {
                validation($('.sign-form.register .pass input'), "Password length should be minimum 6 characters");
                $('.sign-form.register .pass input').focus();
                return false;
            }
        }
        if (pwd !== repwd) {
            validation($('.sign-form.register .repass input'), "Password does not match.");
            $('.sign-form.register .repass input').focus();
            return false;
        }

        let flag = 0;
        $('.sign-form.register .checked').each(function() {
            if(!$(this).find('input').prop('checked')) {
                $(this).after($('<div class="tips">This field is required check</div>'));
                flag++;
                return false;
            }
        })

        if(flag > 0) {
            return false;
        }


        var that = $(this);
        $.ajax({
            url: '/register/index',
            type: 'post',
            dataType: 'json',
            data: {
                email: username,
                password: pwd,
                password_confirm: repwd,
            },
            beforeSend: function () {
                that.find('span').hide();
                that.find('i').css('display', 'block');
                that.attr('disabled', true);
            },
            success: function (res) {
                if (res.code == 0) {
                    location.href = siteUrl;
                    // var h =document.documentElement.clientHeight
                    // $('.main .dialog-box').show();
                    // $('.main .dialog-box').css('height',h)
                    // $('.sign-register .dialog').show();
                    // $('.errorTips').remove()
                    // that.find('span').show()
                    // that.removeClass('error')
                    // that.find('i').css('display', 'none')
                    // localStorage['valid_timestamp']= Math.round(new Date().getTime()/1000) + 600;  //记录十分钟之后的时间戳
                    // calculateTime(); //进行时间的计算  以及倒计时
                    // setTimeout(function (){
                    //   $('.sign-register .dialog').hide();
                    //   $('.main .dialog-box').hide();
                    //   $('.main .dialog-box').css('height',0)
                    // },10000)
                } else {
                    that.find('i').hide();
                    that.addClass('error');
                    that.after('<div class="errorTips"><p><i class="ico"></i>ERROR</p><span>' + res.msg + '</span></div>');
                    setTimeout(() => {
                        $('.errorTips').remove();
                        that.find('span').show();
                        that.removeClass('error');
                        that.attr('disabled', false);
                    }, 2000);
                }
            },
            error: function () {
                setTimeout(() => {
                    that.find('i').hide();
                    $('.errorTips').remove();
                    that.find('span').show();
                    that.removeClass('error');
                    that.attr('disabled', false);
                }, 2000);
            }
        });
    });

    //登录
    $('.sign-form.logining').on('click', 'button', function () {
        $('.tips').remove();
        $('.sign-register .input-box').removeClass('required');
        var username, pwd, usernameReq, pwdReq;
        username = $('.sign-form.logining .email input').val();
        pwd = $('.sign-form.logining .pass input').val();
        usernameReq = /^[\w\.\-]+@[\w\.\-]+(\.\w+)+$/;
        pwdReq = /^[a-zA-Z0-9]{6,}$/;
        if (username == '') {
            validation($('.sign-form.logining .email input'), "This field is required");
            $(".sign .email .username").focus();
            return false;
        } else {
            if (!usernameReq.test(username)) {
                validation($('.sign-form.logining .email input'), "Please enter a valid email address");
                $('.sign-form.logining .email input').focus();
                return false;
            }
        }
        if (pwd == '') {
            validation($('.sign-form.logining .pass input'), "This field is required");
            $('.sign-form.logining .pass input').focus();
            return false;
        } else {
            if (pwd.trim().length < 6) {
                validation($('.sign-form.logining .pass input'), "Password length should be minimum 6 characters");
                $('.sign-form.logining .pass input').focus();
                return false;
            }
        }
        var recaptchaResponse = $('#google_key').val();
        var that = $(this);
        if (!recaptchaResponse) {
            that.find('i').hide();
            that.addClass('error');
            that.after('<div class="errorTips"><p><i class="ico"></i>ERROR</p><span>' + 'Please check the captcha' + '</span></div>');
            setTimeout(() => {
                $('.errorTips').remove();
                that.find('span').show();
                that.removeClass('error');
                that.attr('disabled', false);
            }, 2000);
            return false;
        }
       
        $.ajax({
            url: '/login/index',
            type: 'post',
            dataType: 'json',
            data: {
                email: username,
                password: pwd,
                keep_login: '0',
                recaptchaResponse: recaptchaResponse
            },
            beforeSend: function () {
                that.find('span').hide();
                that.find('i').css('display', 'block');
                that.attr('disabled', true);
            },
            success: function (res) {
                if (res.code == 0) {
                    location.href = siteUrl;
                } else {
                    that.find('i').hide();
                    that.addClass('error');
                    that.after('<div class="errorTips"><p><i class="ico"></i>ERROR</p><span>' + res.msg + '</span></div>');
                    setTimeout(() => {
                        $('.errorTips').remove();
                        that.find('span').show();
                        that.removeClass('error');
                        that.attr('disabled', false);
                    }, 2000);
                }
            },
            error: function () {
                setTimeout(() => {
                    that.find('i').hide();
                    $('.errorTips').remove();
                    that.find('span').show();
                    that.removeClass('error');
                    that.attr('disabled', false);
                }, 2000);
            }
        });
    });

    //绑定
    let isShowPass = false;
    $('.sign-form.bind').on('click', 'button', function () {
        let type = $(this).attr('type');
        $('.sign-register .input-box').removeClass('required');
        $('.tips').remove();
        let username = $('.sign-form.bind .email input').val();
        let pwd = $('.sign-form.bind .pass input').val();
        usernameReq = /^[\w\.\-]+@[\w\.\-]+(\.\w+)+$/;
        if (type == 1) {
            if (username == '') {
                validation($('.sign-form.bind .email input'), "This field is required");
                $(".sign .email .username").focus();
                return false;
            } else {
                if (!usernameReq.test(username)) {
                    validation($('.sign-form.bind .email input'), "Please enter a valid email address");
                    $('.sign-form.bind .email input').focus();
                    return false;
                }
            }
            if (isShowPass) {
                if (pwd == '') {
                    validation($('.sign-form.bind .pass input'), "This field is required");
                    $('.sign-form.bind .pass input').focus();
                    return false;
                }
                if (pwd.trim().length < 6) {
                    validation($('.sign-form.bind .pass input'), "Password length should be minimum 6 characters");
                    $('.sign-form.bind .pass input').focus();
                    return false;
                }

                var data = {
                    email: username,
                    password: pwd
                };
            } else {
                var data = {
                    email: username
                };
            }
        }

        if (type == 2) {
            if (pwd == '') {
                validation($('.sign-form.bind .pass input'), "This field is required");
                $('.sign-form.bind .pass input').focus();
                return false;
            }
            if (pwd.trim().length < 6) {
                validation($('.sign-form.bind .pass input'), "Password length should be minimum 6 characters");
                $('.sign-form.bind .pass input').focus();
                return false;
            }
            var data = {
                password: pwd
            };
        }

        var that = $(this);
        $.ajax({
            url: siteUrl + '/register/bind',
            type: 'post',
            dataType: 'json',
            data: data,
            beforeSend: function () {
                that.find('span').hide();
                that.find('i').css('display', 'block');
                that.attr('disabled', true);
            },
            success: function (res) {
                if (res.code == 0) {
                    location.href = siteUrl;
                } else {
                    isShowPass = true;
                    $('.bind_show').addClass('display');
                    that.find('i').hide();
                    that.addClass('error');
                    that.after('<div class="errorTips"><p><i class="ico"></i>ERROR</p><span>' + res.msg + '</span></div>');
                    setTimeout(() => {
                        $('.errorTips').remove();
                        that.find('span').show();
                        that.removeClass('error');
                        that.attr('disabled', false);
                    }, 2000);
                }
            },
            error: function () {
                setTimeout(() => {
                    that.find('i').hide();
                    $('.errorTips').remove();
                    that.find('span').show();
                    that.removeClass('error');
                    that.attr('disabled', false);
                }, 2000);
            }
        });
    });

    function validation(ele, tip) {
        ele.parents(".input-box").removeClass("required");
        ele.parents(".input-box").addClass("required");
        $(".tips").remove();
        ele.parents(".input-box").append($('<div class="tips">' + tip + "</div>"));
    }
});