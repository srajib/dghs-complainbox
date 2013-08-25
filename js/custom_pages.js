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
$(function ()
{
    var b = $("#gallery"),
        a = $("#trash");
    $("li", b).draggable(
    {
        cancel: "a.ui-icon",
        revert: "invalid",
        containment: $("#demo-frame").length ? "#demo-frame" : "document",
        helper: "clone",
        cursor: "move"
    });
    a.droppable(
    {
        accept: "#gallery > li",
        activeClass: "ui-state-highlight",
        drop: function (g, h)
        {
            d(h.draggable)
        }
    });
    b.droppable(
    {
        accept: "#trash li",
        activeClass: "custom-state-active",
        drop: function (g, h)
        {
            c(h.draggable)
        }
    });
    $(function ()
    {
        $(".gallery li img").hover(function ()
        {
            $(this).animate(
            {
                opacity: "0.6"
            }, {
                queue: true,
                duration: 200
            })
        }, function ()
        {
            $(this).animate(
            {
                opacity: "1"
            }, {
                queue: true,
                duration: 300
            })
        })
    });
    var e = "<a href='#' title='Recycle this image' class='ui-icon ui-icon-refresh'>Recycle image</a>";

    function d(g)
    {
        g.fadeOut(function ()
        {
            var h = $("ul", a).length ? $("ul", a) : $("<ul class='gallery ui-helper-reset'/>").appendTo(a);
            g.find("a.ui-icon-trash").remove();
            g.append(e).appendTo(h).fadeIn(function ()
            {
                g.animate(
                {
                    width: "53px"
                }).find("img").animate(
                {
                    height: "40px"
                })
            })
        })
    }
    var f = "<a href='#' title='Delete this image' class='ui-icon ui-icon-trash'>Delete image</a>";

    function c(g)
    {
        g.fadeOut(function ()
        {
            g.find("a.ui-icon-refresh").remove().end().css("width", "122px").append(f).find("img").css("height", "100px").end().appendTo(b).fadeIn()
        })
    }
    $("ul.gallery > li").click(function (i)
    {
        var h = $(this),
            g = $(i.target);
        if (g.is("a.ui-icon-trash"))
        {
            d(h)
        }
        else
        {
            if (g.is("a.ui-icon-zoomin"))
            {
                viewLargerImage(g)
            }
            else
            {
                if (g.is("a.ui-icon-refresh"))
                {
                    c(h)
                }
            }
        }
        return false
    })
});
$(function ()
{
    $(".gallery2").sortable()
});
$(function ()
{
    $(".gallery2 li img").hover(function ()
    {
        $(this).animate(
        {
            opacity: "0.6"
        }, {
            queue: true,
            duration: 200
        })
    }, function ()
    {
        $(this).animate(
        {
            opacity: "1"
        }, {
            queue: true,
            duration: 300
        })
    })
});
$(function ()
{
    var a = "<p>Are you sure do you want to delete this image?</p><p>Click <strong>OK</strong> to confirm deletion or <strong>Cancel</strong> to prevent this to happen. </p>";
    $(".dialog_confirm").html(a);
    $(".gallery2 .ui-icon-trash").click(function ()
    {
        var b = $(this).parent(".gallery2 li");
        $(".dialog_confirm").dialog(
        {
            modal: true,
            show: "fade",
            hide: "fade",
            buttons: {
                OK: function ()
                {
                    $(this).dialog("close");
                    $(b).hide("fold", 500)
                },
                Cancel: function ()
                {
                    $(this).dialog("close")
                }
            }
        });
        return false
    })
});
jQuery(document).ready(function ()
{
    jQuery("#datatable_1docs, #datatable_2docs").dataTable(
    {
        bPaginate: false,
        bLengthChange: false,
        bFilter: true,
        bSort: false,
        bInfo: false,
        bAutoWidth: false
    })
});
jQuery(document).ready(function ()
{
    jQuery("#datatable_req_docs").dataTable(
    {
        bPaginate: false,
        bLengthChange: false,
        bFilter: true,
        bSort: true,
        bInfo: false,
        bAutoWidth: false
    })
});
$(function ()
{
    $("#dialog").dialog(
    {
        autoOpen: false,
        show: "blind",
        hide: "explode",
        buttons: {
            OK: function ()
            {
                $(this).dialog("close")
            }
        }
    });
    $("#opener").click(function ()
    {
        $("#dialog").dialog("open");
        return false
    })
});
(function ()
{
    var a = document.getElementById("graph_show_home1"),
        e = [
            [0, 2],
            [1, 0],
            [2, 12],
            [3, 10],
            [4, 9],
            [4.5, 11],
            [5, 9],
            [7, 12],
            [8, 8],
            [9, 16],
            [10, 14],
            [11, 17],
            [12, 12],
            [14, 13],
            [14.5, 12],
            [15, 13.5],
            [15.5, 11],
            [16, 14.5],
            [16.5, 12],
            [17, 15.5],
            [17.5, 13],
            [18, 17.5],
            [18.5, 10],
            [20, 20],
            [21, 10]
        ],
        c = [
            [0, 0],
            [1, 5],
            [2, 3],
            [3, 6],
            [4, 3.5],
            [5, 8],
            [6, 3.9],
            [7, 9],
            [8, 6],
            [9, 10],
            [10, 5],
            [11, 7],
            [12, 10],
            [13, 5],
            [14, 15],
            [15, 2],
            [17, 17],
            [18, 10],
            [21, 20]
        ],
        b, d;
    d = Flotr.draw(a, [
    {
        data: e,
        label: "Visits",
        lines: {
            fill: true
        }
    }, {
        data: c,
        label: "Activity",
        lines: {
            show: true
        },
        points: {
            show: true
        }
    }], {
        xaxis: {
            minorTickFreq: 4
        },
        grid: {
            minorVerticalLines: true
        },
        mouse: {
            track: true,
            radius: 13,
        },
        colors: ["#2C93E1", "#1C7F8E", "#C71585", "#CD5C5C", "#9440ED"],
        shadowSize: 0,
    })
})();
(function ()
{
    var c = document.getElementById("graph_show_home2"),
        b = (b = false),
        f = [],
        e = [],
        a, d;
    for (d = 0; d < 4; d++)
    {
        if (b)
        {
            a = [Math.ceil(Math.random() * 10), d]
        }
        else
        {
            a = [d, Math.ceil(Math.random() * 10)]
        }
        f.push(a);
        if (b)
        {
            a = [Math.ceil(Math.random() * 10), d + 0.5]
        }
        else
        {
            a = [d + 0.5, Math.ceil(Math.random() * 10)]
        }
        e.push(a)
    }
    Flotr.draw(c, [f, e], {
        bars: {
            show: true,
            horizontal: b,
            shadowSize: 0,
            barWidth: 0.44,
            lineWidth: 1,
        },
        grid: {
            outlineWidth: 0
        },
        mouse: {
            track: true,
            relative: true
        },
        yaxis: {
            min: 0,
            autoscaleMargin: 1
        },
        colors: ["#6495ED", "#82B23F"],
        shadowSize: 0
    })
})();