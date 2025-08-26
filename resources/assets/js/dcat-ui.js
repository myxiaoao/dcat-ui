/**
 * Dcat UI Theme JavaScript
 */
(function ($) {
    'use strict';

    // 主题初始化
    var DcatUI = {
        init: function() {
            this.initAnimations();
            this.initThemeToggle();
            this.initCustomEffects();
            console.log('Dcat UI Theme loaded successfully!');
        },

        // 初始化动画效果
        initAnimations: function() {
            // 页面加载动画
            $('.content-wrapper').hide().fadeIn(500);

            // 卡片悬停效果
            $('.card').hover(
                function() { $(this).addClass('shadow-lg'); },
                function() { $(this).removeClass('shadow-lg'); }
            );
        },

        // 初始化主题切换
        initThemeToggle: function() {
            // 这里可以添加暗色模式切换逻辑
        },

        // 初始化自定义效果
        initCustomEffects: function() {
            // 平滑滚动
            $('a[href*="#"]').click(function(e) {
                var target = $(this.hash);
                if (target.length) {
                    $('html, body').animate({scrollTop: target.offset().top - 100}, 500);
                }
            });
        }
    };

    // 文档就绪时初始化
    $(document).ready(function() {
        DcatUI.init();

        var minHeight = 600;
        var height = ($(window).height() - 220);
        height = height < minHeight ? minHeight : height;
        $('.table-fixed-right,.table-fixed-left').each(function (k, v) {
            $(v).css({'max-height': (($(v).data('height') || height) - 10) + 'px'});
        });
    });
})(jQuery);
