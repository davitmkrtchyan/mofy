(function(){function b(a,b,e,f){var c=a%10;return 1==c&&(1==a||20<a)?b:1<c&&5>c&&(20<a||10>a)?e:f}jQuery.timeago.settings.strings={prefixAgo:null,prefixFromNow:"\u0447\u0435\u0440\u0435\u0437",suffixAgo:"\u043d\u0430\u0437\u0430\u0434",suffixFromNow:null,seconds:function(a){return b(a,"%d \u0441\u0435\u043a\u0443\u043d\u0434\u0443","%d \u0441\u0435\u043a\u0443\u043d\u0434\u044b","%d \u0441\u0435\u043a\u0443\u043d\u0434")},minute:"\u043c\u0438\u043d\u0443\u0442\u0443",minutes:function(a){return b(a,
"%d \u043c\u0438\u043d\u0443\u0442\u0443","%d \u043c\u0438\u043d\u0443\u0442\u044b","%d \u043c\u0438\u043d\u0443\u0442")},hour:"\u0447\u0430\u0441",hours:function(a){return b(a,"%d \u0447\u0430\u0441","%d \u0447\u0430\u0441\u0430","%d \u0447\u0430\u0441\u043e\u0432")},day:"\u0434\u0435\u043d\u044c",days:function(a){return b(a,"%d \u0434\u0435\u043d\u044c","%d \u0434\u043d\u044f","%d \u0434\u043d\u0435\u0439")},month:"\u043c\u0435\u0441\u044f\u0446",months:function(a){return b(a,"%d \u043c\u0435\u0441\u044f\u0446",
"%d \u043c\u0435\u0441\u044f\u0446\u0430","%d \u043c\u0435\u0441\u044f\u0446\u0435\u0432")},year:"\u0433\u043e\u0434",years:function(a){return b(a,"%d \u0433\u043e\u0434","%d \u0433\u043e\u0434\u0430","%d \u043b\u0435\u0442")}}})();
(function(b){var a=b.cultures,d=a.en;b=a.ru=b.extend(!0,{},d,{name:"ru",englishName:"Russian",nativeName:"\u0440\u0443\u0441\u0441\u043a\u0438\u0439",language:"ru",numberFormat:{",":"\u00a0",".":",",percent:{pattern:["-n%","n%"],",":"\u00a0",".":","},currency:{pattern:["-n$","n$"],",":"\u00a0",".":",",symbol:"\u0440."}},calendars:{standard:b.extend(!0,{},d.calendars.standard,{"/":".",firstDay:1,days:{names:"\u0432\u043e\u0441\u043a\u0440\u0435\u0441\u0435\u043d\u044c\u0435 \u043f\u043e\u043d\u0435\u0434\u0435\u043b\u044c\u043d\u0438\u043a \u0432\u0442\u043e\u0440\u043d\u0438\u043a \u0441\u0440\u0435\u0434\u0430 \u0447\u0435\u0442\u0432\u0435\u0440\u0433 \u043f\u044f\u0442\u043d\u0438\u0446\u0430 \u0441\u0443\u0431\u0431\u043e\u0442\u0430".split(" "),
namesAbbr:"\u0412\u0441 \u041f\u043d \u0412\u0442 \u0421\u0440 \u0427\u0442 \u041f\u0442 \u0421\u0431".split(" "),namesShort:"\u0412\u0441 \u041f\u043d \u0412\u0442 \u0421\u0440 \u0427\u0442 \u041f\u0442 \u0421\u0431".split(" ")},months:{names:"\u042f\u043d\u0432\u0430\u0440\u044c \u0424\u0435\u0432\u0440\u0430\u043b\u044c \u041c\u0430\u0440\u0442 \u0410\u043f\u0440\u0435\u043b\u044c \u041c\u0430\u0439 \u0418\u044e\u043d\u044c \u0418\u044e\u043b\u044c \u0410\u0432\u0433\u0443\u0441\u0442 \u0421\u0435\u043d\u0442\u044f\u0431\u0440\u044c \u041e\u043a\u0442\u044f\u0431\u0440\u044c \u041d\u043e\u044f\u0431\u0440\u044c \u0414\u0435\u043a\u0430\u0431\u0440\u044c ".split(" "),
namesAbbr:"\u044f\u043d\u0432 \u0444\u0435\u0432 \u043c\u0430\u0440 \u0430\u043f\u0440 \u043c\u0430\u0439 \u0438\u044e\u043d \u0438\u044e\u043b \u0430\u0432\u0433 \u0441\u0435\u043d \u043e\u043a\u0442 \u043d\u043e\u044f \u0434\u0435\u043a ".split(" ")},monthsGenitive:{names:"\u044f\u043d\u0432\u0430\u0440\u044f \u0444\u0435\u0432\u0440\u0430\u043b\u044f \u043c\u0430\u0440\u0442\u0430 \u0430\u043f\u0440\u0435\u043b\u044f \u043c\u0430\u044f \u0438\u044e\u043d\u044f \u0438\u044e\u043b\u044f \u0430\u0432\u0433\u0443\u0441\u0442\u0430 \u0441\u0435\u043d\u0442\u044f\u0431\u0440\u044f \u043e\u043a\u0442\u044f\u0431\u0440\u044f \u043d\u043e\u044f\u0431\u0440\u044f \u0434\u0435\u043a\u0430\u0431\u0440\u044f ".split(" "),
namesAbbr:"\u044f\u043d\u0432 \u0444\u0435\u0432 \u043c\u0430\u0440 \u0430\u043f\u0440 \u043c\u0430\u0439 \u0438\u044e\u043d \u0438\u044e\u043b \u0430\u0432\u0433 \u0441\u0435\u043d \u043e\u043a\u0442 \u043d\u043e\u044f \u0434\u0435\u043a ".split(" ")},AM:null,PM:null,patterns:{d:"dd.MM.yyyy",D:"d MMMM yyyy '\u0433.'",t:"H:mm",T:"H:mm:ss",f:"d MMMM yyyy '\u0433.' H:mm",F:"d MMMM yyyy '\u0433.' H:mm:ss",Y:"MMMM yyyy"}})}},a.ru);b.calendar=b.calendars.standard})(jQuery);
var Texts={addr_suggest:"\u0412\u043e\u0437\u043c\u043e\u0436\u043d\u043e, \u0432\u044b \u0438\u043c\u0435\u043b\u0438 \u0432 \u0432\u0438\u0434\u0443 %{addr}?",autoupdating:"\u041f\u0440\u043e\u0432\u0435\u0440\u043a\u0430 \u043e\u0431\u043d\u043e\u0432\u043b\u0435\u043d\u0438\u0439 (%{key} \u0434\u043b\u044f \u043f\u0430\u0443\u0437\u044b) ...",autoupdating_pause:"\u041f\u0430\u0443\u0437\u0430",fullscreen_text:"\u041f\u043e\u043b\u043d\u043e\u044d\u043a\u0440\u0430\u043d\u043d\u044b\u0439 \u0440\u0435\u0436\u0438\u043c",
fullscreen_tip:"\u0434\u043b\u044f \u0438\u0437\u043c\u0435\u043d\u0435\u043d\u0438\u044f \u043d\u0430\u0436\u043c\u0438\u0442\u0435 %{key}",hiddes_by_event:"\u0441\u043e\u0431\u044b\u0442\u0438\u0435 %{booker}",hiddes_by_odd:"\u0441\u0442\u0430\u0432\u043a\u0443 %{booker}: %{coeff}",hiddes_menu_only_it_middle:"\u0442\u043e\u043b\u044c\u043a\u043e \u044d\u0442\u043e\u0442 \u043a\u043e\u0440\u0438\u0434\u043e\u0440",hiddes_menu_only_it_surebet:"\u0442\u043e\u043b\u044c\u043a\u043e \u044d\u0442\u0443 \u0432\u0438\u043b\u043a\u0443",
hiddes_menu_restore:"\u043f\u0435\u0440\u0435\u0441\u0442\u0430\u0442\u044c \u0441\u043a\u0440\u044b\u0432\u0430\u0442\u044c",hiddes_menu_title_hidde:"\u0421\u043a\u0440\u044b\u0442\u044c",hiddes_menu_with:"\u0432\u0441\u0451 \u0441 \u0443\u0447\u0430\u0441\u0442\u0438\u0435\u043c %{coeff} \u043e\u0442 %{booker}",internal_error:"\u041f\u0440\u0438 \u043e\u0431\u0440\u0430\u0431\u043e\u0442\u043a\u0435 \u0437\u0430\u043f\u0440\u043e\u0441\u0430 \u043f\u0440\u043e\u0438\u0437\u043e\u0448\u043b\u0430 \u043e\u0448\u0438\u0431\u043a\u0430, \u043f\u043e\u043f\u0440\u043e\u0431\u0443\u0439\u0442\u0435 \u043e\u0431\u043d\u043e\u0432\u0438\u0442\u044c \u0441\u0442\u0440\u0430\u043d\u0438\u0446\u0443",
new_data:"\u0434\u043e\u0441\u0442\u0443\u043f\u043d\u044b \u043d\u043e\u0432\u044b\u0435 \u0434\u0430\u043d\u043d\u044b\u0435",new_data_off:"\u043e\u0442\u043a\u043b\u044e\u0447\u0438\u0442\u044c",new_data_refresh:"\u043f\u0435\u0440\u0435\u0439\u0442\u0438",new_data_sound_settings:"\u043d\u0430\u0441\u0442\u0440\u043e\u0439\u043a\u0438 \u0441\u0438\u0433\u043d\u0430\u043b\u0430",table_time_format:"dd'/'MM'<br>'HH':'mm",updated:"\u041e\u0431\u043d\u043e\u0432\u043b\u0435\u043d\u043e!"};
$.culture=$.cultures.ru;