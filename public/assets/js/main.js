
function Call(action, data, success, error) {
    $.ajax({
        type: "POST",
        url: action,
        data: data,
        success: success,
        error: error
    });
}

function SaveFilter(action, data, success, error) { Call("/account/filtersave" + action, data, success, error);}
function RemoveFilter(data, success, error) { Call("/account/filterremove", data, success, error);}
function BindFilterEvents() {
    $(".btn-filter li a").on("click", function () {
        $("#f_FilterId").val($(this).parent().data("id"));
        var form = $(this).parents("form");
        if (form)form.submit();
        return false;        
    });

    $(".btn-filter .delete-filter").on("click", function () {
        var This = $(this).parent();
        var val = This.data("id");
        var success = function (data) {
            if (data.state == "ok") {
                This.remove();
                ShowModal("Remove Filter.", "Filter has be removed.");             
            } else if (data.state == "error") {
                ShowModal("Error", data.msg);
            }
        };
        RemoveFilter({ id: val }, success);
    });
}
function ShowModal(title, text) {
    var source = $('#modal_template').html().replace("{{title}}", title).replace("{{body}}", text);
    $(source).modal();
}
function initGMT_Slider(curGMT, tz) {

    if (!curGMT) {
        curGMT = -1 * (new Date().getTimezoneOffset() / 60);
        // ace.cookie.set('gmt', curGMT);
        ace.cookie.set('gmt', "+06:05");
    }

    var indexGMT = 0;
    for (var i = 0; i < tz.length; i++) {
        if (tz[i].v == curGMT) { indexGMT = i; break; }
    }

    $('#timezone').on('show.bs.dropdown', function () {
        var gmt = tz[indexGMT];
        $('#slider-text').html(calcTime(gmt.v) + " GMT" + gmt.n);
        $('#slider-desc').html("<li>" + gmt.d.join("</li><li>") + "</li>");
    });

    $('#btnGMT').click(function () {
        var gmt = tz[indexGMT];
        $.ajax({
            type: "POST",
            url: "/account/setgmt",
            data: { "gmt": gmt.v },
            success: function (data) {
                location.href = location.href;
            },
            error: function () {}
        });        
    });

    $("#slider-gmt").slider({
        value: indexGMT,
        range: "min",
        min: 0,
        max: tz.length-1,
        step: 1,
        slide: function (event, ui) {
            indexGMT = parseInt(ui.value);
            var gmt = tz[indexGMT];
            $('#slider-text').html(calcTime(gmt.v) + " GMT" + gmt.n);
            $('#slider-desc').html("<li>" + gmt.d.join("</li><li>") + "</li>");
        }
    });
    function calcTime(offset) {
        d = new Date();
        utc = d.getTime() + (d.getTimezoneOffset() * 60000);
        nd = new Date(utc + (3600000 * offset));

        return nd.getFullYear() + '-' + ('0' + (nd.getMonth() + 1)).slice(-2) + '-' + ('0' + nd.getDate()).slice(-2) + ' ' +('0' + nd.getHours()).slice(-2)  + ":" +('0' + nd.getMinutes()).slice(-2);
        //return nd.toLocaleString();
    }
}

$(function () {
    $('.easy-pie-chart').each(function () {
        var size = parseInt($(this).data('size')) || 50;
        $(this).easyPieChart({
            barColor: $(this).data('color') || '#9abc32',
            trackColor: $(this).data('bkcolor') || '#EEEEEE',
            scaleColor: false,
            lineCap: 'butt',
            lineWidth: parseInt(size / 15),
            animate: false, // /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ? false : 1000,
            size: size
        });
    });
    $(".text-scroll").mouseover(function () {
        $(this).addClass("no-ellipsis");
        var maxscroll = $(this).width();
        var speed = maxscroll * 15;
        $(this).animate({
            scrollLeft: maxscroll
        }, speed, "linear");
    });
    $(".text-scroll").mouseout(function () {
        $(this).stop();
        $(this).animate({
            scrollLeft: 0
        }, 'fast', 'linear', function () {
            $(this).removeClass("no-ellipsis");
        });
    });
    //$(".table-title a").click(function (e) {
    //    e.preventDefault();
    //    $(this).closest('.main-table-wrapper').toggleClass('collapsed');
    //    $(this).closest('.main-table-wrapper').find('.table-wrapper').slideToggle(300);
    //});

    $('a[data-role="modal-dlg"]').click(function () {
        var src = $(this).attr("href");
        $.ajax({
            type: "POST",
            url: src,
            data: null,
            success: function (data) {               
                ShowModal("Help", data);
            },
            error: function () {
               
            }
        });
        return false;
    });
    $('a[data-role="calculator-window"]').click(function () {
        var src = $(this).attr("href");
        window.open(src, '_blank', "width=500,height=500,scrollbars=yes,resizable=yes,status=no,toolbar=no,menubar=no,location=no");
        return false;
    });

   /* $(".logo-container img").error(function () {       
        var p = $(this).attr('src');
        p = p.replace(/\d+.png/g, "0.png");
        $(this).attr('src', p);
    });*/
    $("#cheackall").click(function () { $(".user-bookmakers  input:checkbox").each(function () { if (!this.disabled) this.checked = true; }); });
    $("#uncheackall").click(function () { $(".user-bookmakers  input:checkbox").each(function () { if (!this.disabled) this.checked = false; }); });
});

$(function () {
    function Loading(options) {
        var s = {
            content_url: false,
            default_url: false,
            loading_icon: 'fa fa-spin fa-spinner fa-2x orange',
            loading_text: '',
            loading_overlay: "body",
            update_breadcrumbs: true,
            update_title: true,
            update_active: true,
            close_active: false,
            max_load_wait: 50
        }
        this.settings = $.extend({}, s, options);       

        var $overlay = $();//empty set
        var self = this;
        var working = false;
       
        ///////////////////////
        var fixPos = false;
        var loadTimer = null;
        this.start = function (content) {
            if (working) {
                self.stop();
            }
            working = true;

            if (!content) content = "body";

            var $contentArea = $(content);
            this.contentArea = $contentArea;

            if (!content && $contentArea.css('position') == 'static') {
                $contentArea.css('position', 'relative');//for correct icon positioning
                fixPos = true;
            }

            $overlay.remove();
            $overlay = $('<div class="ajax-loading-overlay"><i class="ajax-loading-icon ' + (this.settings.loading_icon || '') + '"></i> ' + this.settings.loading_text + '</div>')

            if (content == 'body') $('body').append($overlay.addClass('ajax-overlay-body'));
            else if (content) $(content).append($overlay);
            else $contentArea.append($overlay);


            if (this.settings.max_load_wait !== false)
                loadTimer = setTimeout(function () {
                    loadTimer = null;
                    if (!working) return;

                    var event
                    $contentArea.trigger(event = $.Event('ajaxloadlong'))
                    if (event.isDefaultPrevented()) return;
                    self.stop(true);

                }, this.settings.max_load_wait * 1000);
        }

        this.stop = function () {          
            working = false;
            $overlay.remove();
            if (fixPos) {
                if (this.contentArea) this.contentArea.css('position', '');//restore previous 'position' value
                fixPos = false;
            }

            if (loadTimer != null) {
                clearTimeout(loadTimer);
                loadTimer = null;
            }
        }

        this.working = function () {
            return working;
        }
        ///////////////////////
    }
    window.loader = new Loading();
});

/*Custom cookie Save*/
    var text = "";
    var size = "";
    function setCookie(key, value) {
        var expires = new Date();
        expires.setTime(expires.getTime() + (1 * 24 * 60 * 60 * 1000));
        document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
    }

    function getCookie(key) {
        var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
        return keyValue ? keyValue[2] : null;
    }

    $("#btnGMT").click(function(){
        str = $("#slider-text").text();
        text = str.slice(-6);
        ace.cookie.set('gmt', text);
        setCookie('text', text);
        $("#timezone a span").text("GMT " + ace.cookie.get('gmt'));
        // $("#timezone a span").text("GMT " + getCookie("text"));
    });

if(ace.cookie.get('gmt')){
    $("#timezone a span").text("GMT " + ace.cookie.get('gmt'));
}else{
    ace.cookie.set('gmt', "+00:00");
    $("#timezone a span").text("GMT " + ace.cookie.get('gmt'));
}

// $("#timezone a span").text("GMT " + getCookie("text"));





