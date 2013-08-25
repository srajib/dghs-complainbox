/*
_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-
Theme Name: DULCET
Theme URI: http://themeforest.net/user/Smartik/portfolio
Description: Complete admin template based on HTML5, CSS3 and JQuery.
Version: 1.0
Tags: html5, css3, jquery, 960gs, widgets, unlimited columns, fluid-width, light
Author: Smartik
Author URI: http://a-smartik.com
-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_
*/

jQuery(function ()
{
    jQuery("#datepicker").datepicker(
    {
        showAnim: "slide"
    })
});
jQuery(function ()
{
    jQuery("#multiple_datepicker").datepicker(
    {
        numberOfMonths: 2,
        showButtonPanel: true,
        showAnim: "slide"
    })
});
jQuery(function ()
{
    var a = jQuery("#datepicker_from, #datepicker_to").datepicker(
    {
        defaultDate: "+1w",
        showAnim: "slide",
        numberOfMonths: 2,
        onSelect: function (d)
        {
            var e = this.id == "datepicker_from" ? "minDate" : "maxDate",
                b = jQuery(this).data("datepicker"),
                c = jQuery.datepicker.parseDate(b.settings.dateFormat || jQuery.datepicker._defaults.dateFormat, d, b.settings);
            a.not(this).datepicker("option", e, c)
        }
    })
});
jQuery(function ()
{
    jQuery("#datepicker2").datepicker()
});
jQuery(function ()
{
    jQuery(".ui_tabs, .ui_tabs_right").tabs()
});
jQuery(function ()
{
    jQuery(".ui_tabs_right_ajax").tabs(
    {
        ajaxOptions: {
            error: function (d, a, c, b)
            {
                jQuery(b.hash).html("Couldn't load this tab. We'll try to fix this as soon as possible. If this wouldn't be a demo.")
            }
        }
    })
});
jQuery(function ()
{
    jQuery(".ui_accordion").accordion(
    {
        active: false,
        collapsible: true,
        autoHeight: false,
        navigation: true
    })
});
jQuery(function ()
{
    jQuery("#simple_slider").slider()
});
jQuery(function ()
{
    jQuery("#slider_snap_increments").slider(
    {
        value: 100,
        min: 0,
        max: 500,
        step: 50,
        slide: function (a, b)
        {
            jQuery("#amount_increments").val("$" + b.value)
        }
    });
    jQuery("#amount_increments").val("$" + jQuery("#slider_snap_increments").slider("value"))
});
jQuery(function ()
{
    jQuery("#multiple_vertical_slider > span").each(function ()
    {
        var a = parseInt(jQuery(this).text(), 10);
        jQuery(this).empty().slider(
        {
            value: a,
            range: "min",
            animate: true,
            orientation: "vertical"
        })
    })
});
jQuery(function ()
{
    jQuery("#slider-range").slider(
    {
        range: true,
        min: 0,
        max: 500,
        values: [75, 300],
        slide: function (a, b)
        {
            jQuery("#range_amount").val("$" + b.values[0] + " - $" + b.values[1])
        }
    });
    jQuery("#range_amount").val("$" + jQuery("#slider-range").slider("values", 0) + " - $" + jQuery("#slider-range").slider("values", 1))
});
jQuery(function ()
{
    jQuery("#slider-range-min").slider(
    {
        range: "min",
        value: 285,
        min: 1,
        max: 700,
        slide: function (a, b)
        {
            jQuery("#range_amount_min").val("$" + b.value)
        }
    });
    jQuery("#range_amount_min").val("$" + jQuery("#slider-range-min").slider("value"))
});
jQuery(function ()
{
    jQuery("#progressbar").progressbar(
    {
        value: 59
    })
});
jQuery(function ()
{
    jQuery("#progressbar2").progressbar(
    {
        value: 35
    })
});
jQuery(function ()
{
    jQuery("#progressbar3").progressbar(
    {
        value: 90
    })
});
jQuery(function ()
{
    jQuery("#progressbar4").progressbar(
    {
        value: 45
    })
});
jQuery(function ()
{
    jQuery("#progressbar5").progressbar(
    {
        value: 23
    })
});
jQuery(document).ready(function ()
{
    jQuery.fn.anim_progressbar = function (i)
    {
        var e = 1000;
        var h = 60 * e;
        var f = 3600 * e;
        var j = 24 * 3600 * e;
        var c = {
            start: new Date(),
            finish: new Date().setTime(new Date().getTime() + 60 * e),
            interval: 100
        };
        var d = jQuery.extend(c, i);
        var g = this;
        return this.each(function ()
        {
            var k = d.finish - d.start;
            jQuery(g).children(".pbar").progressbar();
            var l = setInterval(function ()
            {
                var r = d.finish - new Date();
                var m = new Date() - d.start,
                    s = parseInt(r / j),
                    n = parseInt((r - (s * j)) / f),
                    p = parseInt((r - (s * j) - (n * f)) / h),
                    q = parseInt((r - (s * j) - (p * h) - (n * f)) / e),
                    o = (m > 0) ? m / k * 100 : 0;
                jQuery(g).children(".percent").html("<b>" + o.toFixed(1) + "%</b>");
                jQuery(g).children(".elapsed").html(s + " days " + n + "h:" + p + "m:" + q + "s</b>");
                jQuery(g).children(".pbar").children(".ui-progressbar-value").css("width", o + "%");
                if (o >= 100)
                {
                    clearInterval(l);
                    jQuery(g).children(".percent").html("<b>100%</b>");
                    jQuery(g).children(".elapsed").html("Finished")
                }
            }, d.interval)
        })
    };
    jQuery("#progress1").anim_progressbar();
    var b = new Date().setTime(new Date().getTime() + 2 * 1000);
    var a = new Date().setTime(new Date().getTime() + 15 * 1000);
    jQuery("#progress2").anim_progressbar(
    {
        start: b,
        finish: a,
        interval: 100
    });
    jQuery("#progress3").anim_progressbar(
    {
        interval: 1000
    })
});