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

$(document).ready(function () {
    $("ul.sf-menu").supersubs({
        minWidth: 15,
        maxWidth: 20,
        extraWidth: 1
    }).superfish({
        delay: 0,
        animation: {
            height: "show"
        }
    })
});

function equalHeight(b) {
    var a = 0;
    b.each(function () {
        var c = jQuery(this).height();
        if (c > a) {
            a = c
        }
    });
    b.height(a)
}
jQuery(document).ready(function () {
    equalHeight(jQuery(".formee-equal"))
});
jQuery(window).resize(function () {
    equalHeight(jQuery(".formee-equal"))
});
jQuery(document).ready(function () {
    jQuery("#form_id1").validationEngine("attach", {
        promptPosition: "bottomRight",
        autoPositionUpdate: true
    });
    jQuery("#form_id2").validationEngine("attach", {
        promptPosition: "bottomRight",
        autoPositionUpdate: true
    })
});
jQuery(document).ready(function () {
    jQuery(".txt_autogrow").autoGrow()
});
jQuery(function () {
    jQuery(".multiselect1").multiselect({
        sortable: true,
        searchable: true
    })
});
jQuery("#colorpickerHolder").ColorPicker({
    flat: true
});
jQuery("#colorpickerField1, #colorpickerField2, #colorpickerField3").ColorPicker({
    onSubmit: function (a, d, b, c) {
        jQuery(c).val(d);
        jQuery(c).ColorPickerHide()
    },
    onBeforeShow: function () {
        jQuery(this).ColorPickerSetColor(this.value)
    }
}).bind("keyup", function () {
    jQuery(this).ColorPickerSetColor(this.value)
});
jQuery("#colorSelector").ColorPicker({
    color: "#0000ff",
    onShow: function (a) {
        jQuery(a).fadeIn(500);
        return false
    },
    onHide: function (a) {
        jQuery(a).fadeOut(500);
        return false
    },
    onChange: function (a, c, b) {
        jQuery("#colorSelector div").css("backgroundColor", "#" + c)
    }
});

jQuery(document).ready(function () {
    jQuery("#aField1, #aField2, #aField3, #aField4, #aField5").autotab_magic().autotab_filter("all");
    jQuery("#aField6, #aField7, #aField8, #aField9, #aField10").autotab_magic().autotab_filter("text");
    jQuery("#aField11, #aField12, #aField13, #aField14, #aField15").autotab_magic().autotab_filter({
        format: "alpha",
        uppercase: true
    });
    jQuery("#aField16, #aField17, #aField18, #aField19, #aField20").autotab_magic().autotab_filter("numeric");
    jQuery("#aField21, #aField22, #aField23, #aField24, #aField25").autotab_magic().autotab_filter("number");
    jQuery("#aField26, #aField27, #aField28, #aField29, #aField30").autotab_magic().autotab_filter("alphanumeric");
    jQuery("#aField31, #aField32, #aField33").autotab_magic().autotab_filter("numeric")
});
jQuery(document).ready(function () {
    jQuery.spin.imageBasePath = "plugins/spin/img/spin1/";
    jQuery("#spin1").spin();
    jQuery("#spin2").spin({
        interval: 5
    });
    jQuery("#spin3").spin({
        max: 10,
        min: -5
    });
    jQuery("#spin4").spin({
        timeInterval: 250
    });
    jQuery("#spin5").spin({
        interval: 0.01
    });
    jQuery("#spin6").spin({
        lock: true
    });
    jQuery("#spin7").spin({
        beforeChange: function (b, a) {
            jQuery("#spin_console").text(a + " to " + b).show().fadeOut(400)
        }
    })
});
jQuery(document).ready(function () {
    jQuery(".tags_select a").click(function () {
        var b = jQuery(this).text();
        var a = jQuery("#quick_tags");
        a.val(a.val() + b + ", ");
        jQuery(this).fadeTo("slow", 0.33);
        return false
    })
});
jQuery(function () {
    jQuery("#uploader, #uploader2").pluploadQueue({
        runtimes: "gears,flash,silverlight,browserplus,html5",
        url: "plugins/plupload/upload.php",
        max_file_size: "10mb",
        chunk_size: "1mb",
        unique_names: true,
        resize: {
            width: 320,
            height: 240,
            quality: 90
        },
        filters: [{
            title: "Image files",
            extensions: "jpg,gif,png"
        }, {
            title: "Zip files",
            extensions: "zip"
        }],
        flash_swf_url: "plugins/plupload/js/plupload.flash.swf",
        silverlight_xap_url: "plugins/plupload/js/plupload.silverlight.xap"
    })
});
jQuery().ready(function () {
    jQuery("#finder").elfinder({
        url: "plugins/fileexplorer/connectors/php/connector.php",
        lang: "en"
    })
});
jQuery(document).ready(function () {
    $("pre, code").addClass("prettyprint");
    prettyPrint()
});

function showSuccessToast() {
    jQuery().toastmessage("showSuccessToast", "Success Dialog which is fading away")
}
function showStickySuccessToast() {
    jQuery().toastmessage("showToast", {
        text: "Success Dialog which is sticky",
        sticky: true,
        position: "top-right",
        type: "success",
        closeText: "",
        close: function () {
            console.log("toast is closed ...")
        }
    })
}
function showNoticeToast() {
    jQuery().toastmessage("showNoticeToast", "Notice  Dialog which is fading away")
}
function showStickyNoticeToast() {
    jQuery().toastmessage("showToast", {
        text: "Notice Dialog which is sticky",
        sticky: true,
        position: "top-right",
        type: "notice",
        closeText: "",
        close: function () {
            console.log("toast is closed ...")
        }
    })
}
function showWarningToast() {
    jQuery().toastmessage("showWarningToast", "Warning Dialog which is fading away")
}
function showStickyWarningToast() {
    jQuery().toastmessage("showToast", {
        text: "Warning Dialog which is sticky",
        sticky: true,
        position: "top-right",
        type: "warning",
        closeText: "",
        close: function () {
            console.log("toast is closed ...")
        }
    })
}
function showErrorToast() {
    jQuery().toastmessage("showErrorToast", "Error Dialog which is fading away")
}
function showStickyErrorToast() {
    jQuery().toastmessage("showToast", {
        text: "Error Dialog which is sticky",
        sticky: true,
        position: "top-right",
        type: "error",
        closeText: "",
        close: function () {
            console.log("toast is closed ...")
        }
    })
}
$(document).ready(function () {
    var b = new Date();
    var e = b.getDate();
    var a = b.getMonth();
    var f = b.getFullYear();
    var c = $("#full_calendar1").fullCalendar({
        header: {
            left: "prev,next today",
            center: "title",
            right: "month,agendaWeek,agendaDay"
        },
        selectable: true,
        selectHelper: true,
        select: function (i, d, g) {
            var h = prompt("Event Title:");
            if (h) {
                c.fullCalendar("renderEvent", {
                    title: h,
                    start: i,
                    end: d,
                    allDay: g
                }, true)
            }
            c.fullCalendar("unselect")
        },
        editable: true,
        events: [{
            title: "All Day Event",
            start: new Date(f, a, 1)
        }, {
            title: "Long Event",
            start: new Date(f, a, e - 7),
            end: new Date(f, a, e - 5)
        }, {
            id: 999,
            title: "Repeating Event",
            start: new Date(f, a, e - 3, 16, 0),
            allDay: false
        }, {
            id: 999,
            title: "Repeating Event",
            start: new Date(f, a, e + 4, 16, 0),
            allDay: false
        }, {
            title: "Meeting",
            start: new Date(f, a, e, 10, 30),
            allDay: false
        }, {
            title: "Lunch",
            start: new Date(f, a, e, 12, 0),
            end: new Date(f, a, e, 14, 0),
            allDay: false
        }, {
            title: "Birthday Party",
            start: new Date(f, a, e + 1, 19, 0),
            end: new Date(f, a, e + 1, 22, 30),
            allDay: false,
            className: "fc-event-skin-green"
        }, {
            title: "Click for Google",
            start: new Date(f, a, 28),
            end: new Date(f, a, 29),
            url: "http://google.com/"
        }]
    })
});
$(document).ready(function () {
    var b = new Date();
    var e = b.getDate();
    var a = b.getMonth();
    var f = b.getFullYear();
    var c = $("#full_calendar_home").fullCalendar({
        header: false,
        selectable: true,
        selectHelper: true,
        select: function (i, d, g) {
            var h = prompt("Event Title:");
            if (h) {
                c.fullCalendar("renderEvent", {
                    title: h,
                    start: i,
                    end: d,
                    allDay: g
                }, true)
            }
            c.fullCalendar("unselect")
        },
        editable: true,
        events: [{
            title: "All Day Event",
            start: new Date(f, a, 1),
            className: "fc-event-skin-gray"
        }, {
            title: "Long Event",
            start: new Date(f, a, e - 7),
            end: new Date(f, a, e - 5),
            className: "fc-event-skin-gray"
        }, {
            id: 999,
            title: "Repeating Event",
            start: new Date(f, a, e - 3, 16, 0),
            allDay: false,
            className: "fc-event-skin-gray"
        }, {
            id: 999,
            title: "Repeating Event",
            start: new Date(f, a, e + 4, 16, 0),
            allDay: false,
            className: "fc-event-skin-gray"
        }, {
            title: "Meeting",
            start: new Date(f, a, e - 1, 10, 30),
            allDay: false,
            className: "fc-event-skin-gray"
        }, {
            title: "Lunch",
            start: new Date(f, a, e, 12, 0),
            end: new Date(f, a, e, 14, 0),
            allDay: false,
            className: "fc-event-skin-gray"
        }, {
            title: "Birthday Party",
            start: new Date(f, a, e + 11, 19, 0),
            allDay: false,
            className: "fc-event-skin-gray"
        }, {
            title: "Another event",
            start: new Date(f, a, e + 7, 25),
            allDay: false,
            className: "fc-event-skin-gray"
        }, {
            title: "Party start",
            start: new Date(f, a, e + 2, 0),
            end: new Date(f, a, e + 4, 0),
            allDay: false,
            className: "fc-event-skin-gray"
        }]
    })
});