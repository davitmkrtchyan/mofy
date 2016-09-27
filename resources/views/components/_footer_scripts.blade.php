<script type="text/javascript">
    try { ace.settings.check('main-container', 'fixed') } catch (e) { }
</script>
<a href="index.html#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
    <i class="ace-icon fa fa-angle-double-up bigger-110"></i>
</a>
<!-- basic scripts -->
<!--[if !IE]> -->
<script type="text/javascript">
    window.jQuery || document.write("<script src='assets/js/jquery.js'>" + "<" + "/script>");
</script>

<!-- <![endif]-->
<!--[if IE]>
<script type="text/javascript">
    window.jQuery || document.write("<script src='/assets/js/jquery1x.js'>"+"<"+"/script>");
</script>
<![endif]-->
<script type="text/javascript">
    if ('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.js'>" + "<" + "/script>");
</script>
<script src="{{ URL::asset('assets/js/bootstrap.js') }}"></script>

<!-- page specific plugin scripts -->
<!-- ace scripts -->
<script src="{{ URL::asset('assets/js/jquery-ui.custom.js') }}"></script>
<script src="{{ URL::asset('assets/js/jquery.easypiechart.js') }}"></script>
<script src="{{ URL::asset('assets/js/jquery.raty.js') }}"></script>

<script src="{{ URL::asset('assets/js/ace/elements.scroller.js') }}"></script>
<script src="{{ URL::asset('assets/js/ace/elements.colorpicker.js') }}"></script>
<script src="{{ URL::asset('assets/js/ace/elements.fileinput.js') }}"></script>
<script src="{{ URL::asset('assets/js/ace/elements.wysiwyg.js') }}"></script>
<script src="{{ URL::asset('assets/js/ace/elements.spinner.js') }}"></script>
<script src="{{ URL::asset('assets/js/ace/elements.treeview.js') }}"></script>
<script src="{{ URL::asset('assets/js/ace/elements.wizard.js') }}"></script>
<script src="{{ URL::asset('assets/js/ace/elements.aside.js') }}"></script>
<script src="{{ URL::asset('assets/js/ace/ace.js') }}"></script>
<script src="{{ URL::asset('assets/js/ace/ace.ajax-content.js') }}"></script>
<script src="{{ URL::asset('assets/js/ace/ace.touch-drag.js') }}"></script>
<script src="{{ URL::asset('assets/js/ace/ace.sidebar.js') }}"></script>
<script src="{{ URL::asset('assets/js/ace/ace.sidebar-scroll-1.js') }}"></script>
<script src="{{ URL::asset('assets/js/ace/ace.submenu-hover.js') }}"></script>
<script src="{{ URL::asset('assets/js/ace/ace.widget-box.js') }}"></script>
<script src="{{ URL::asset('assets/js/ace/ace.settings.js') }}"></script>
<script src="{{ URL::asset('assets/js/ace/ace.settings-rtl.js') }}"></script>
<script src="{{ URL::asset('assets/js/ace/ace.settings-skin.js') }}"></script>
<script src="{{ URL::asset('assets/js/ace/ace.widget-on-reload.js') }}"></script>


<script src="{{ URL::asset('assets/js/date-time/bootstrap-datepicker.js') }}"></script>
<script src="{{ URL::asset('assets/js/date-time/daterangepicker.js') }}"></script>




<script src="{{ URL::asset('assets/js/jquery.bmbets.typeahead.js') }}"></script>
<script src="{{ URL::asset('assets/js/jquery.multiple.select.js') }}"></script>
<script src="{{ URL::asset('assets/js/main.js') }}"></script>
<script src="{{ URL::asset('assets/js/jqcloud.js') }}"></script>


<!-- inline scripts related to this page -->
<script type="text/javascript">
    jQuery(function ($) {

        $('[data-toggle="tooltip"]').tooltip();

        var tz = [{"n":"-12:00","v":-12,"d":[" International Date Line West"]},{"n":"-11:00","v":-11,"d":[" Coordinated Universal Time-11"]},{"n":"-10:00","v":-10,"d":[" Hawaii"]},{"n":"-09:00","v":-9,"d":[" Alaska"]},{"n":"-08:00","v":-8,"d":[" Baja California"," Pacific Time (US \u0026 Canada)"]},{"n":"-07:00","v":-7,"d":[" Arizona"," Chihuahua, La Paz, Mazatlan"," Mountain Time (US \u0026 Canada)"]},{"n":"-06:00","v":-6,"d":[" Central America"," Central Time (US \u0026 Canada)"," Guadalajara, Mexico City, Monterrey"," Saskatchewan"]},{"n":"-05:00","v":-5,"d":[" Bogota, Lima, Quito, Rio Branco"," Eastern Time (US \u0026 Canada)"," Indiana (East)"]},{"n":"-04:30","v":-4.5,"d":[" Caracas"]},{"n":"-04:00","v":-4,"d":[" Asuncion"," Atlantic Time (Canada)"," Cuiaba"," Georgetown, La Paz, Manaus, San Juan"," Santiago"]},{"n":"-03:30","v":-3.5,"d":[" Newfoundland"]},{"n":"-03:00","v":-3,"d":[" Brasilia"," Buenos Aires"," Cayenne, Fortaleza"," Greenland"," Montevideo"," Salvador"]},{"n":"-02:00","v":-2,"d":[" Coordinated Universal Time-02"," Mid-Atlantic - Old"]},{"n":"-01:00","v":-1,"d":[" Azores"," Cabo Verde Is."]},{"n":"+00:00","v":0,"d":[" Casablanca"," Coordinated Universal Time"," Dublin, Edinburgh, Lisbon, London"," Monrovia, Reykjavik"]},{"n":"+01:00","v":1,"d":[" Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna"," Belgrade, Bratislava, Budapest, Ljubljana, Prague"," Brussels, Copenhagen, Madrid, Paris"," Sarajevo, Skopje, Warsaw, Zagreb"," West Central Africa"," Windhoek"]},{"n":"+02:00","v":2,"d":[" Amman"," Athens, Bucharest"," Beirut"," Cairo"," Damascus"," E. Europe"," Harare, Pretoria"," Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius"," Istanbul"," Jerusalem"," Kaliningrad (RTZ 1)"," Tripoli"]},{"n":"+03:00","v":3,"d":[" Baghdad"," Kuwait, Riyadh"," Minsk"," Moscow, St. Petersburg, Volgograd (RTZ 2)"," Nairobi"]},{"n":"+03:30","v":3.5,"d":[" Tehran"]},{"n":"+04:00","v":4,"d":[" Abu Dhabi, Muscat"," Baku"," Izhevsk, Samara (RTZ 3)"," Port Louis"," Tbilisi"," Yerevan"]},{"n":"+04:30","v":4.5,"d":[" Kabul"]},{"n":"+05:00","v":5,"d":[" Ashgabat, Tashkent"," Ekaterinburg (RTZ 4)"," Islamabad, Karachi"]},{"n":"+05:30","v":5.5,"d":[" Chennai, Kolkata, Mumbai, New Delhi"," Sri Jayawardenepura"]},{"n":"+05:45","v":5.75,"d":[" Kathmandu"]},{"n":"+06:00","v":6,"d":[" Astana"," Dhaka"," Novosibirsk (RTZ 5)"]},{"n":"+06:30","v":6.5,"d":[" Yangon (Rangoon)"]},{"n":"+07:00","v":7,"d":[" Bangkok, Hanoi, Jakarta"," Krasnoyarsk (RTZ 6)"]},{"n":"+08:00","v":8,"d":[" Beijing, Chongqing, Hong Kong, Urumqi"," Irkutsk (RTZ 7)"," Kuala Lumpur, Singapore"," Perth"," Taipei"," Ulaanbaatar"]},{"n":"+09:00","v":9,"d":[" Osaka, Sapporo, Tokyo"," Seoul"," Yakutsk (RTZ 8)"]},{"n":"+09:30","v":9.5,"d":[" Adelaide"," Darwin"]},{"n":"+10:00","v":10,"d":[" Brisbane"," Canberra, Melbourne, Sydney"," Guam, Port Moresby"," Hobart"," Magadan"," Vladivostok, Magadan (RTZ 9)"]},{"n":"+11:00","v":11,"d":[" Chokurdakh (RTZ 10)"," Solomon Is., New Caledonia"]},{"n":"+12:00","v":12,"d":[" Anadyr, Petropavlovsk-Kamchatsky (RTZ 11)"," Auckland, Wellington"," Coordinated Universal Time+12"," Fiji"," Petropavlovsk-Kamchatsky - Old"]},{"n":"+13:00","v":13,"d":[" Nuku\u0027alofa"," Samoa"]},{"n":"+14:00","v":14,"d":[" Kiritimati Island"]}]
        var curGMT = ace.cookie.get('gmt');// 0;
        initGMT_Slider(curGMT,tz);

        $('a[data-call="oddsFormat"]').click(function () {
            var num = $(this).data("num");
            $.ajax({
                type: "POST",
                url: "/account/setoddsformat",
                data: {"of":num},
                success: function (data) {
                    location.href = location.href;
                },
                error: function () {}
            });
            return false;
        });

        $('.easy-pie-chart').each(function () {
            var size = parseInt($(this).data('size')) || 50;
            $(this).easyPieChart({
                barColor: $(this).data('color') || '#9abc32',
                trackColor: $(this).data('bkcolor') || '#EEEEEE',
                scaleColor: false,
                lineCap: 'butt',
                lineWidth: parseInt(size / 10),
                animate: false,// /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ? false : 1000,
                size: size
            });
        });

        $('a[data-type="submit"]').click(function () {
            var form = $(this).parents("form");
            if (form) {
                form.submit();
                return false;
            }
        });

        $('a[data-call="bk"]').click(function () {
            var src = $(this).attr("href");
            window.loader.start();
            $.ajax({
                type: "POST",
                url: src,
                data: null,
                success: function (data) {
                    var title = data.title;
                    var html = data.html;
                    window.loader.stop();
                    $("#pagebody").html(html);
                    $("#btn-scroll-up").click();
                    window.history.pushState({ "html": html, "pageTitle": title }, "", src);
                    document.title=title
                },
                error: function () {
                    window.loader.stop();
                    //  location.href = src;
                }
            });
            return false;
        });

        window.onpopstate = function (e) {
            if (e.state) {
                $("#pagebody").html(e.state.html);
                document.title = e.state.pageTitle;
            }
        };

        $(".singleselect").multipleSelect({
            single: true,
            multipleWidth: 100,
            width: '100%'
        });
        $(".multiselect").multipleSelect({
            multiple: true,
            filter: true,
            multipleWidth: 100,
            width: '100%'
        });
        $(".multiselect165").multipleSelect({
            multiple: true,
            multipleWidth: 165,
            width: '100%'
        });

        $('#search').bs_typeahead({
            source: function(query, process) {
                $.ajax({
                    type: "POST",
                    url: '/suggest?q='+encodeURIComponent(query)
                }).done(function(result_items){
                    process(result_items);
                })
            },
            minLength:3
        });


        $('.dialogs').ace_scroll({size: 300});



    })
</script>
<script src="{{ URL::asset('assets/js/responsiveslides.min.js') }}"></script>
<script type="text/javascript">
    // Slideshow 1
    $("#slider1").responsiveSlides({
        maxwidth: 800,
        speed: 800
    });
</script>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-67097205-1', 'auto');
    ga('send', 'pageview');

</script>
<script id="modal_template" type="text/template">
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{--<h4 class="modal-title blue">{{title}}</h4>--}}
                </div>
                <div class="modal-body">
{{--                    <p>{{body}}</p>--}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</script>