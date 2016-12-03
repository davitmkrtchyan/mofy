<!DOCTYPE html>
<html lang="ru">
<head>

<meta http-equiv="content-type" content="text/html;charset=UTF-8" >
<script type="text/javascript">window.NREUM||(NREUM={});NREUM.info={"beacon":"bam.nr-data.net","errorBeacon":"bam.nr-data.net","licenseKey":"820613d1e3","applicationID":"216153","transactionName":"dFZXQhFaD1gBQxdQVVtaTFoCQQxGS1BNR1s=","queueTime":0,"applicationTime":28,"agent":""}</script>
<script type="text/javascript">(window.NREUM||(NREUM={})).loader_config={xpid:"UAMBVEVRCQUBUVI="};window.NREUM||(NREUM={}),__nr_require=function(t,e,n){function r(n){if(!e[n]){var o=e[n]={exports:{}};t[n][0].call(o.exports,function(e){var o=t[n][1][e];return r(o||e)},o,o.exports)}return e[n].exports}if("function"==typeof __nr_require)return __nr_require;for(var o=0;o<n.length;o++)r(n[o]);return r}({1:[function(t,e,n){function r(t){try{c.console&&console.log(t)}catch(e){}}var o,i=t("ee"),a=t(15),c={};try{o=localStorage.getItem("__nr_flags").split(","),console&&"function"==typeof console.log&&(c.console=!0,o.indexOf("dev")!==-1&&(c.dev=!0),o.indexOf("nr_dev")!==-1&&(c.nrDev=!0))}catch(s){}c.nrDev&&i.on("internal-error",function(t){r(t.stack)}),c.dev&&i.on("fn-err",function(t,e,n){r(n.stack)}),c.dev&&(r("NR AGENT IN DEVELOPMENT MODE"),r("flags: "+a(c,function(t,e){return t}).join(", ")))},{}],2:[function(t,e,n){function r(t,e,n,r,o){try{d?d-=1:i("err",[o||new UncaughtException(t,e,n)])}catch(c){try{i("ierr",[c,(new Date).getTime(),!0])}catch(s){}}return"function"==typeof f&&f.apply(this,a(arguments))}function UncaughtException(t,e,n){this.message=t||"Uncaught error with no additional information",this.sourceURL=e,this.line=n}function o(t){i("err",[t,(new Date).getTime()])}var i=t("handle"),a=t(16),c=t("ee"),s=t("loader"),f=window.onerror,u=!1,d=0;s.features.err=!0,t(1),window.onerror=r;try{throw new Error}catch(l){"stack"in l&&(t(8),t(7),"addEventListener"in window&&t(5),s.xhrWrappable&&t(9),u=!0)}c.on("fn-start",function(t,e,n){u&&(d+=1)}),c.on("fn-err",function(t,e,n){u&&(this.thrown=!0,o(n))}),c.on("fn-end",function(){u&&!this.thrown&&d>0&&(d-=1)}),c.on("internal-error",function(t){i("ierr",[t,(new Date).getTime(),!0])})},{}],3:[function(t,e,n){t("loader").features.ins=!0},{}],4:[function(t,e,n){function r(t){}if(window.performance&&window.performance.timing&&window.performance.getEntriesByType){var o=t("ee"),i=t("handle"),a=t(8),c=t(7),s="learResourceTimings",f="addEventListener",u="resourcetimingbufferfull",d="bstResource",l="resource",p="-start",h="-end",m="fn"+p,w="fn"+h,v="bstTimer",y="pushState";t("loader").features.stn=!0,t(6);var g=NREUM.o.EV;o.on(m,function(t,e){var n=t[0];n instanceof g&&(this.bstStart=Date.now())}),o.on(w,function(t,e){var n=t[0];n instanceof g&&i("bst",[n,e,this.bstStart,Date.now()])}),a.on(m,function(t,e,n){this.bstStart=Date.now(),this.bstType=n}),a.on(w,function(t,e){i(v,[e,this.bstStart,Date.now(),this.bstType])}),c.on(m,function(){this.bstStart=Date.now()}),c.on(w,function(t,e){i(v,[e,this.bstStart,Date.now(),"requestAnimationFrame"])}),o.on(y+p,function(t){this.time=Date.now(),this.startPath=location.pathname+location.hash}),o.on(y+h,function(t){i("bstHist",[location.pathname+location.hash,this.startPath,this.time])}),f in window.performance&&(window.performance["c"+s]?window.performance[f](u,function(t){i(d,[window.performance.getEntriesByType(l)]),window.performance["c"+s]()},!1):window.performance[f]("webkit"+u,function(t){i(d,[window.performance.getEntriesByType(l)]),window.performance["webkitC"+s]()},!1)),document[f]("scroll",r,!1),document[f]("keypress",r,!1),document[f]("click",r,!1)}},{}],5:[function(t,e,n){function r(t){for(var e=t;e&&!e.hasOwnProperty(u);)e=Object.getPrototypeOf(e);e&&o(e)}function o(t){c.inPlace(t,[u,d],"-",i)}function i(t,e){return t[1]}var a=t("ee").get("events"),c=t(17)(a,!0),s=t("gos"),f=XMLHttpRequest,u="addEventListener",d="removeEventListener";e.exports=a,"getPrototypeOf"in Object?(r(document),r(window),r(f.prototype)):f.prototype.hasOwnProperty(u)&&(o(window),o(f.prototype)),a.on(u+"-start",function(t,e){var n=t[1],r=s(n,"nr@wrapped",function(){function t(){if("function"==typeof n.handleEvent)return n.handleEvent.apply(n,arguments)}var e={object:t,"function":n}[typeof n];return e?c(e,"fn-",null,e.name||"anonymous"):n});this.wrapped=t[1]=r}),a.on(d+"-start",function(t){t[1]=this.wrapped||t[1]})},{}],6:[function(t,e,n){var r=t("ee").get("history"),o=t(17)(r);e.exports=r,o.inPlace(window.history,["pushState","replaceState"],"-")},{}],7:[function(t,e,n){var r=t("ee").get("raf"),o=t(17)(r),i="equestAnimationFrame";e.exports=r,o.inPlace(window,["r"+i,"mozR"+i,"webkitR"+i,"msR"+i],"raf-"),r.on("raf-start",function(t){t[0]=o(t[0],"fn-")})},{}],8:[function(t,e,n){function r(t,e,n){t[0]=a(t[0],"fn-",null,n)}function o(t,e,n){this.method=n,this.timerDuration="number"==typeof t[1]?t[1]:0,t[0]=a(t[0],"fn-",this,n)}var i=t("ee").get("timer"),a=t(17)(i),c="setTimeout",s="setInterval",f="clearTimeout",u="-start",d="-";e.exports=i,a.inPlace(window,[c,"setImmediate"],c+d),a.inPlace(window,[s],s+d),a.inPlace(window,[f,"clearImmediate"],f+d),i.on(s+u,r),i.on(c+u,o)},{}],9:[function(t,e,n){function r(t,e){d.inPlace(e,["onreadystatechange"],"fn-",c)}function o(){var t=this,e=u.context(t);t.readyState>3&&!e.resolved&&(e.resolved=!0,u.emit("xhr-resolved",[],t)),d.inPlace(t,w,"fn-",c)}function i(t){v.push(t),h&&(g=-g,b.data=g)}function a(){for(var t=0;t<v.length;t++)r([],v[t]);v.length&&(v=[])}function c(t,e){return e}function s(t,e){for(var n in t)e[n]=t[n];return e}t(5);var f=t("ee"),u=f.get("xhr"),d=t(17)(u),l=NREUM.o,p=l.XHR,h=l.MO,m="readystatechange",w=["onload","onerror","onabort","onloadstart","onloadend","onprogress","ontimeout"],v=[];e.exports=u;var y=window.XMLHttpRequest=function(t){var e=new p(t);try{u.emit("new-xhr",[e],e),e.addEventListener(m,o,!1)}catch(n){try{u.emit("internal-error",[n])}catch(r){}}return e};if(s(p,y),y.prototype=p.prototype,d.inPlace(y.prototype,["open","send"],"-xhr-",c),u.on("send-xhr-start",function(t,e){r(t,e),i(e)}),u.on("open-xhr-start",r),h){var g=1,b=document.createTextNode(g);new h(a).observe(b,{characterData:!0})}else f.on("fn-end",function(t){t[0]&&t[0].type===m||a()})},{}],10:[function(t,e,n){function r(t){var e=this.params,n=this.metrics;if(!this.ended){this.ended=!0;for(var r=0;r<d;r++)t.removeEventListener(u[r],this.listener,!1);if(!e.aborted){if(n.duration=(new Date).getTime()-this.startTime,4===t.readyState){e.status=t.status;var i=o(t,this.lastSize);if(i&&(n.rxSize=i),this.sameOrigin){var a=t.getResponseHeader("X-NewRelic-App-Data");a&&(e.cat=a.split(", ").pop())}}else e.status=0;n.cbTime=this.cbTime,f.emit("xhr-done",[t],t),c("xhr",[e,n,this.startTime])}}}function o(t,e){var n=t.responseType;if("json"===n&&null!==e)return e;var r="arraybuffer"===n||"blob"===n||"json"===n?t.response:t.responseText;return h(r)}function i(t,e){var n=s(e),r=t.params;r.host=n.hostname+":"+n.port,r.pathname=n.pathname,t.sameOrigin=n.sameOrigin}var a=t("loader");if(a.xhrWrappable){var c=t("handle"),s=t(11),f=t("ee"),u=["load","error","abort","timeout"],d=u.length,l=t("id"),p=t(14),h=t(13),m=window.XMLHttpRequest;a.features.xhr=!0,t(9),f.on("new-xhr",function(t){var e=this;e.totalCbs=0,e.called=0,e.cbTime=0,e.end=r,e.ended=!1,e.xhrGuids={},e.lastSize=null,p&&(p>34||p<10)||window.opera||t.addEventListener("progress",function(t){e.lastSize=t.loaded},!1)}),f.on("open-xhr-start",function(t){this.params={method:t[0]},i(this,t[1]),this.metrics={}}),f.on("open-xhr-end",function(t,e){"loader_config"in NREUM&&"xpid"in NREUM.loader_config&&this.sameOrigin&&e.setRequestHeader("X-NewRelic-ID",NREUM.loader_config.xpid)}),f.on("send-xhr-start",function(t,e){var n=this.metrics,r=t[0],o=this;if(n&&r){var i=h(r);i&&(n.txSize=i)}this.startTime=(new Date).getTime(),this.listener=function(t){try{"abort"===t.type&&(o.params.aborted=!0),("load"!==t.type||o.called===o.totalCbs&&(o.onloadCalled||"function"!=typeof e.onload))&&o.end(e)}catch(n){try{f.emit("internal-error",[n])}catch(r){}}};for(var a=0;a<d;a++)e.addEventListener(u[a],this.listener,!1)}),f.on("xhr-cb-time",function(t,e,n){this.cbTime+=t,e?this.onloadCalled=!0:this.called+=1,this.called!==this.totalCbs||!this.onloadCalled&&"function"==typeof n.onload||this.end(n)}),f.on("xhr-load-added",function(t,e){var n=""+l(t)+!!e;this.xhrGuids&&!this.xhrGuids[n]&&(this.xhrGuids[n]=!0,this.totalCbs+=1)}),f.on("xhr-load-removed",function(t,e){var n=""+l(t)+!!e;this.xhrGuids&&this.xhrGuids[n]&&(delete this.xhrGuids[n],this.totalCbs-=1)}),f.on("addEventListener-end",function(t,e){e instanceof m&&"load"===t[0]&&f.emit("xhr-load-added",[t[1],t[2]],e)}),f.on("removeEventListener-end",function(t,e){e instanceof m&&"load"===t[0]&&f.emit("xhr-load-removed",[t[1],t[2]],e)}),f.on("fn-start",function(t,e,n){e instanceof m&&("onload"===n&&(this.onload=!0),("load"===(t[0]&&t[0].type)||this.onload)&&(this.xhrCbStart=(new Date).getTime()))}),f.on("fn-end",function(t,e){this.xhrCbStart&&f.emit("xhr-cb-time",[(new Date).getTime()-this.xhrCbStart,this.onload,e],e)})}},{}],11:[function(t,e,n){e.exports=function(t){var e=document.createElement("a"),n=window.location,r={};e.href=t,r.port=e.port;var o=e.href.split("://");!r.port&&o[1]&&(r.port=o[1].split("/")[0].split("@").pop().split(":")[1]),r.port&&"0"!==r.port||(r.port="https"===o[0]?"443":"80"),r.hostname=e.hostname||n.hostname,r.pathname=e.pathname,r.protocol=o[0],"/"!==r.pathname.charAt(0)&&(r.pathname="/"+r.pathname);var i=!e.protocol||":"===e.protocol||e.protocol===n.protocol,a=e.hostname===document.domain&&e.port===n.port;return r.sameOrigin=i&&(!e.hostname||a),r}},{}],12:[function(t,e,n){function r(){}function o(t,e,n){return function(){return i(t,[(new Date).getTime()].concat(c(arguments)),e?null:this,n),e?void 0:this}}var i=t("handle"),a=t(15),c=t(16),s=t("ee").get("tracer"),f=NREUM;"undefined"==typeof window.newrelic&&(newrelic=f);var u=["setPageViewName","setCustomAttribute","setErrorHandler","finished","addToTrace","inlineHit"],d="api-",l=d+"ixn-";a(u,function(t,e){f[e]=o(d+e,!0,"api")}),f.addPageAction=o(d+"addPageAction",!0),f.setCurrentRouteName=o(d+"routeName",!0),e.exports=newrelic,f.interaction=function(){return(new r).get()};var p=r.prototype={createTracer:function(t,e){var n={},r=this,o="function"==typeof e;return i(l+"tracer",[Date.now(),t,n],r),function(){if(s.emit((o?"":"no-")+"fn-start",[Date.now(),r,o],n),o)try{return e.apply(this,arguments)}finally{s.emit("fn-end",[Date.now()],n)}}}};a("setName,setAttribute,save,ignore,onEnd,getContext,end,get".split(","),function(t,e){p[e]=o(l+e)}),newrelic.noticeError=function(t){"string"==typeof t&&(t=new Error(t)),i("err",[t,(new Date).getTime()])}},{}],13:[function(t,e,n){e.exports=function(t){if("string"==typeof t&&t.length)return t.length;if("object"==typeof t){if("undefined"!=typeof ArrayBuffer&&t instanceof ArrayBuffer&&t.byteLength)return t.byteLength;if("undefined"!=typeof Blob&&t instanceof Blob&&t.size)return t.size;if(!("undefined"!=typeof FormData&&t instanceof FormData))try{return JSON.stringify(t).length}catch(e){return}}}},{}],14:[function(t,e,n){var r=0,o=navigator.userAgent.match(/Firefox[\/\s](\d+\.\d+)/);o&&(r=+o[1]),e.exports=r},{}],15:[function(t,e,n){function r(t,e){var n=[],r="",i=0;for(r in t)o.call(t,r)&&(n[i]=e(r,t[r]),i+=1);return n}var o=Object.prototype.hasOwnProperty;e.exports=r},{}],16:[function(t,e,n){function r(t,e,n){e||(e=0),"undefined"==typeof n&&(n=t?t.length:0);for(var r=-1,o=n-e||0,i=Array(o<0?0:o);++r<o;)i[r]=t[e+r];return i}e.exports=r},{}],17:[function(t,e,n){function r(t){return!(t&&t instanceof Function&&t.apply&&!t[a])}var o=t("ee"),i=t(16),a="nr@original",c=Object.prototype.hasOwnProperty,s=!1;e.exports=function(t,e){function n(t,e,n,o){function nrWrapper(){var r,a,c,s;try{a=this,r=i(arguments),c="function"==typeof n?n(r,a):n||{}}catch(f){l([f,"",[r,a,o],c])}u(e+"start",[r,a,o],c);try{return s=t.apply(a,r)}catch(d){throw u(e+"err",[r,a,d],c),d}finally{u(e+"end",[r,a,s],c)}}return r(t)?t:(e||(e=""),nrWrapper[a]=t,d(t,nrWrapper),nrWrapper)}function f(t,e,o,i){o||(o="");var a,c,s,f="-"===o.charAt(0);for(s=0;s<e.length;s++)c=e[s],a=t[c],r(a)||(t[c]=n(a,f?c+o:o,i,c))}function u(n,r,o){if(!s||e){var i=s;s=!0;try{t.emit(n,r,o)}catch(a){l([a,n,r,o])}s=i}}function d(t,e){if(Object.defineProperty&&Object.keys)try{var n=Object.keys(t);return n.forEach(function(n){Object.defineProperty(e,n,{get:function(){return t[n]},set:function(e){return t[n]=e,e}})}),e}catch(r){l([r])}for(var o in t)c.call(t,o)&&(e[o]=t[o]);return e}function l(e){try{t.emit("internal-error",e)}catch(n){}}return t||(t=o),n.inPlace=f,n.flag=a,n}},{}],ee:[function(t,e,n){function r(){}function o(t){function e(t){return t&&t instanceof r?t:t?s(t,c,i):i()}function n(n,r,o){if(!l.aborted){t&&t(n,r,o);for(var i=e(o),a=h(n),c=a.length,s=0;s<c;s++)a[s].apply(i,r);var f=u[y[n]];return f&&f.push([g,n,r,i]),i}}function p(t,e){v[t]=h(t).concat(e)}function h(t){return v[t]||[]}function m(t){return d[t]=d[t]||o(n)}function w(t,e){f(t,function(t,n){e=e||"feature",y[n]=e,e in u||(u[e]=[])})}var v={},y={},g={on:p,emit:n,get:m,listeners:h,context:e,buffer:w,abort:a,aborted:!1};return g}function i(){return new r}function a(){(u.api||u.feature)&&(l.aborted=!0,u=l.backlog={})}var c="nr@context",s=t("gos"),f=t(15),u={},d={},l=e.exports=o();l.backlog=u},{}],gos:[function(t,e,n){function r(t,e,n){if(o.call(t,e))return t[e];var r=n();if(Object.defineProperty&&Object.keys)try{return Object.defineProperty(t,e,{value:r,writable:!0,enumerable:!1}),r}catch(i){}return t[e]=r,r}var o=Object.prototype.hasOwnProperty;e.exports=r},{}],handle:[function(t,e,n){function r(t,e,n,r){o.buffer([t],r),o.emit(t,e,n)}var o=t("ee").get("handle");e.exports=r,r.ee=o},{}],id:[function(t,e,n){function r(t){var e=typeof t;return!t||"object"!==e&&"function"!==e?-1:t===window?0:a(t,i,function(){return o++})}var o=1,i="nr@id",a=t("gos");e.exports=r},{}],loader:[function(t,e,n){function r(){if(!b++){var t=g.info=NREUM.info,e=d.getElementsByTagName("script")[0];if(setTimeout(f.abort,3e4),!(t&&t.licenseKey&&t.applicationID&&e))return f.abort();s(v,function(e,n){t[e]||(t[e]=n)}),c("mark",["onload",a()],null,"api");var n=d.createElement("script");n.src="https://"+t.agent,e.parentNode.insertBefore(n,e)}}function o(){"complete"===d.readyState&&i()}function i(){c("mark",["domContent",a()],null,"api")}function a(){return(new Date).getTime()}var c=t("handle"),s=t(15),f=t("ee"),u=window,d=u.document,l="addEventListener",p="attachEvent",h=u.XMLHttpRequest,m=h&&h.prototype;NREUM.o={ST:setTimeout,CT:clearTimeout,XHR:h,REQ:u.Request,EV:u.Event,PR:u.Promise,MO:u.MutationObserver},t(12);var w=""+location,v={beacon:"bam.nr-data.net",errorBeacon:"bam.nr-data.net",agent:"js-agent.newrelic.com/nr-998.min.js"},y=h&&m&&m[l]&&!/CriOS/.test(navigator.userAgent),g=e.exports={offset:a(),origin:w,features:{},xhrWrappable:y};d[l]?(d[l]("DOMContentLoaded",i,!1),u[l]("load",r,!1)):(d[p]("onreadystatechange",o),u[p]("onload",r)),c("mark",["firstbyte",a()],null,"api");var b=0},{}]},{},["loader",2,10,4,3]);</script>
<link rel="shortcut icon" type="image/x-icon" href="/assets/favicon-9d3b07b394e3a85e994db719fcf4177a025e0aecf3eeebd6ece656da6713d541.ico" /><link rel="apple-touch-icon" type="image/png" href="/apple-touch-icon.png" />
<meta name="csrf-param" content="authenticity_token" />
<meta name="csrf-token" content="54XXhju9iatQ+vsP1dOdZCRHMP7//Z3q8w8PE9lxz3ok+dZMLM6TwUdIxlnSAP+aYIDmZq2ZA/dwZbuB4viM1g==" />
<link rel="stylesheet" media="screen" href="{{URL::asset('assets/css/calc.css')}}" />
<script src="{{URL::asset('/assets/js/calc.js')}}"></script>
<script src="{{URL::asset('/assets/js/calc-c.js')}}"></script>

<!--[if lt IE 8]><link rel="stylesheet" media="screen" href="/assets/ie-e88fa195b205177f904ba146de83ff3ffd021dea22202c22b120ac9e5cbbd9fc.css" /><![endif]-->
<!--[if lt IE 9]><script src="/assets/html5-01ba4719c80b6fe911b091a7c05124b64eeece964e09c058ef8f9805daca546b.js"></script><![endif]-->
<style>.money{ text-align: right; }</style>

<link rel="alternate" href="//en.surebet.com/calculator" hreflang="en" />
<link rel="alternate" href="//de.surebet.com/calculator" hreflang="de" />
<link rel="alternate" href="//fr.surebet.com/calculator" hreflang="fr" />


<script src="{{URL::asset('/assets/js/calc-m.js')}}"></script>
<title>Online surebet calculator</title>
<meta name="description" content="Скачать программу для расчёта букмекерских вилок - калькулятор вилок" />



</head>
  
<body id="wide">
<style>
  #wide {
    position: absolute;
    width: 98%;
    margin-left: 5px;
  }

  #wide #main {
    width: 97%;
    margin: auto;

    position: relative;
  }

  table.calc_table {
    width: auto;
  }

  table.calc_table input.stake, 
  table.calc_table input.sum, 
  table.calc_table td.win,
  table.calc_table td.prize,  
  table.calc_table #calculate,
  table.calc_table input.backers_stake {
  width: 100px;
  text-align: right;
  }

  table.calc_table .ct_c {
text-align: right;
}

  table.calc_table #calculate {
  width: auto;
}


  #wide h2.title span {
  font-size: 75%;
  display:block;
  }
  #wide h2.title {
  line-height: 105%;
  }

  table.calc_table input.koefficient,
  table.calc_table input.commission,
  table.calc_table td.koefficient_with_commission,
  table.calc_table input.currency
  {
  width: 4.5em;
  text-align: right;
  }


  #calc #main {
  margin: 4px auto 0 auto;
  width: 100%;
  }

  #calc h2.title span {
  font-size: 90%;
  display:block;
  }
  #calc h2.title {
  line-height: 105%;
  }

   
  table.calc_table tr.rowPattern{
  display:none;
  }

  table.calc_table tr.backersPattern{
    display:none;
  }

  .formula_info {
    padding: 0 0.5em 0.5em 0.5em;
  }

  .formula_info label {
    font-weight: bold;
    margin-left: 1em;
  }

  .lay_tip {
    text-align: right;
  }

  #currencies_info {
    float:right;
    text-align: right;
  }

  #calc_help {
  float: right;
  width: auto;
 }

 #thelp {
  padding: 10px 10px 10px 15px;
}

#calc_table td.bet_c {
  text-align: right;
}

#calc_table tr.backers_prong td{
  border-top:0px solid;
  padding-top:0px;
  font-size: 80%;
}

.calc_turnir {
  font-size: 80%;
}

input.currency_direction {
  width: 75px;
}
</style>
  <script>
//<![CDATA[
var Calculator = {
  currencies: [[1.0, 0.943396144191884, 64.9449, 0.8054122496763217, 1.3354712146853738, 1.97149830459081, 1.3437997239769663, 1.0142997034170294, 6.891297819759577, 25.48597866779685, 7.009998262204237, 112.32507821863861, 1169.9148840351272, 340.5444944916076, 20.280007869073607, 4.171397190589052, 4.255194103194103, 9.199593741235265, 1.4266988275766623, 3.4180087154225083, 26.14002817468304, 0.9127392109061336, 65.6009090909091, 26.553557289679404, 0.9864198852510239], [1.0600000923860071, 1.0, 68.8416, 0.8537370590657228, 1.4155996109453495, 2.0897883850051153, 1.4244278315638752, 1.0751577793291507, 7.304776325604641, 27.01513974241247, 7.430598805562241, 119.06459328902241, 1240.1098851609997, 360.9771956226502, 21.496810214806978, 4.421681407403125, 4.510506142506142, 9.751570215623113, 1.5123008890382703, 3.6230895541240367, 27.70843228013685, 0.9675036478848329, 69.53696969696969, 28.1467731802373, 1.0456051694974797], [0.015397667869224526, 0.01452610049737368, 1.0, 0.01240147031832094, 0.02056314221263523, 0.030356476098828546, 0.02069138183255292, 0.01561784995306836, 0.10610991501656906, 0.3924246348488773, 0.10793762500526195, 1.7295442477952634, 18.013960819635216, 5.243591020874735, 0.31226482555325524, 0.06422978849130649, 0.06552006552006552, 0.1416522889593373, 0.02196783469643748, 0.052629362974190554, 0.4024954719259409, 0.014054055220750723, 1.0101010101010102, 0.4088628558929092, 0.015188565772693834], [1.2416001872356413, 1.171320829266025, 80.6356, 1.0, 1.6581213102011692, 2.447812664114699, 1.6684619888970043, 1.259354701675639, 8.556236663310056, 31.643395885820127, 8.7036151548743, 139.46283814751973, 1452.5665390677773, 422.8201081228468, 25.17966156738207, 5.179207532869594, 5.283249795249795, 11.422217311609538, 1.7713895314480539, 4.24380026104164, 32.455463876031395, 1.1332571751583669, 81.45010101010101, 32.96890170263827, 1.224739114220631], [0.7487993668478972, 0.7064144354576303, 48.6307, 0.6030921826091702, 1.0, 1.4762566822193013, 1.0062363824843312, 0.7595069757126814, 5.160199444196265, 19.083884689945297, 5.249082260343392, 84.10894745125711, 876.0315244314343, 254.99950185885297, 15.18565705203269, 3.1235395751841786, 3.1862866502866503, 6.8886499686948435, 1.068311178772042, 2.5594027619889683, 19.57363654658885, 0.6834585432237621, 49.12191919191919, 19.8832868860713, 0.738630585522142], [0.5072284351812074, 0.478517349974434, 32.9419, 0.40852799507909654, 0.6773889744544084, 1.0, 0.681613431189775, 0.5144816513689825, 3.4954622094843164, 12.92721307872823, 3.555670449160838, 56.97447365644678, 593.4140959243413, 172.73385105055343, 10.286596656892778, 2.115851269501769, 2.158355446355446, 4.666295537669592, 0.7236622137865737, 1.7337112121594878, 13.258965586637151, 0.4629672816764482, 33.27464646464646, 13.468719312538626, 0.500340214827503], [0.744158509752113, 0.7020362687677218, 48.3293, 0.5993543794552283, 0.9938022689371119, 1.4671072403231147, 1.0, 0.7547997557368267, 5.128217915810272, 18.965607905001846, 5.216549860166807, 83.58766281497164, 870.6021166403963, 253.41908352516137, 15.09154043361094, 3.104180716932899, 3.166538902538903, 6.8459559688025005, 1.0616900733945358, 2.543540271988548, 19.452324411350375, 0.6792226509802279, 48.817474747474755, 19.76005562130518, 0.7340527517982521], [0.985901895298938, 0.9300960465764887, 64.0293, 0.7940574634528671, 1.316643601675485, 1.9437039150747228, 1.3248546947710809, 1.0, 6.794143581570407, 25.12667467212922, 6.91117057274942, 110.74150750535728, 1153.421301508669, 335.74346255289475, 19.994098194797047, 4.112588396246411, 4.195203931203932, 9.069896905464097, 1.4065850781286042, 3.3698212706833397, 25.771503320587648, 0.8998713179460143, 64.67606060606062, 26.179202458823855, 0.9725132344295454], [0.14511054755646707, 0.13689673104634406, 9.42419, 0.11687381255921701, 0.1937909592088948, 0.286085198485819, 0.19499951375252692, 0.14718558534920728, 1.0, 3.6982843194964405, 1.0172246861983396, 16.299553604629644, 169.766989416798, 49.41659806301747, 2.9428430463307325, 0.6053137304018857, 0.6174735462735462, 1.3349580850876968, 0.2070290480678191, 0.49598911624773684, 3.7931938015697324, 0.13244808667084673, 9.519383838383838, 3.8532012378773963, 0.14313992966936348], [0.039237261124430094, 0.03701628085343746, 2.54826, 0.03160217075336452, 0.05240023277476985, 0.07735619378360083, 0.05272702066862131, 0.03979834232140598, 0.2703956520401223, 1.0, 0.27505313229590883, 4.407328424886758, 45.90425579824363, 13.362033254854254, 0.7957319643643382, 0.16367420082085668, 0.16696216216216217, 0.36096686186352084, 0.055979754443543764, 0.13411330049261083, 1.025663111289998, 0.03581338675683023, 2.574, 1.0418888611576649, 0.03870441461592479], [0.14265338771789626, 0.1345786559289732, 9.264610000000001, 0.11489478592581938, 0.19050949297460248, 0.281240912029968, 0.19169758303968815, 0.14469328885369667, 0.9830669797616561, 3.6356611962672574, 1.0, 16.023552933566478, 166.89232154920063, 48.57982580790629, 2.8930118254689443, 0.5950639407544431, 0.6070178542178544, 1.312353212815566, 0.20352342100696164, 0.4875905225043156, 3.7289635741597915, 0.13020534053871935, 9.35819191919192, 3.7879549033340063, 0.14071613834335703], [0.00890273139230332, 0.008398802468274997, 0.578187, 0.00717036891893903, 0.011889341506496925, 0.01755171984615338, 0.011963487987618277, 0.009030037810814736, 0.06135137343368502, 0.2268948223493678, 0.06240813158891739, 1.0, 10.415437964422427, 3.031776161586501, 0.18054746269216, 0.037136828718423026, 0.03788285012285012, 0.08190151199653235, 0.012701516439629097, 0.030429613489958315, 0.232717649426444, 0.008125872025920198, 0.5840272727272727, 0.23639918806015353, 0.00878183127841653], [0.0008547630375903266, 0.0008063801538604566, 0.055512500000000006, 0.0006884366210457912, 0.0011415114320789132, 0.00168516387943622, 0.0011486303339795943, 0.0008669858955197073, 0.005890426657357291, 0.0217844725420483, 0.005991887408104604, 0.09601132505573458, 1.0, 0.2910848465463088, 0.017334601128525085, 0.003565556133623652, 0.003637182637182638, 0.007863472690855211, 0.0012194894235859855, 0.0029215875121047534, 0.022343529885288795, 0.0007801757404419245, 0.05607323232323233, 0.022696999287755128, 0.0008431552574566665], [0.0029364738416719403, 0.0027702580997536375, 0.19070900000000002, 0.0023650720029366685, 0.003921576288229452, 0.005789253200331494, 0.003946032737904335, 0.002978464546699714, 0.020236115782894873, 0.07483890968739454, 0.020584676527128504, 0.3298396539527869, 3.4354244539518124, 1.0, 0.05955171261643576, 0.012249198733388571, 0.012495266175266176, 0.02701436637514626, 0.0041894637871228955, 0.010036893183444908, 0.07675950895552426, 0.00268023481709415, 0.19263535353535355, 0.07797382638448083, 0.0028965961899446685], [0.04930964556108331, 0.046518529493794446, 3.2024099999999995, 0.039714592562094156, 0.06585161225316517, 0.09721388262364951, 0.0662622880943858, 0.05001475886820564, 0.3398074529482109, 1.256704574886393, 0.34566052969310085, 5.5387097945820285, 57.688088268408, 16.79212832115946, 1.0, 0.2056901169624448, 0.209822113022113, 0.45362870668627125, 0.07035001351021833, 0.16854079828217755, 1.288955524250352, 0.045006846979484316, 3.2347575757575755, 1.3093464983400114, 0.04864001491613246], [0.23972783082274357, 0.2261583112536606, 15.5691, 0.19307973153297056, 0.3201496174227392, 0.4726230120302715, 0.3221461928891997, 0.2431558677043166, 1.6520358778844655, 6.109698382425655, 1.6804916774694239, 26.927447348349236, 280.4611573969826, 81.63799296310084, 4.861682295521186, 1.0, 1.0200884520884521, 2.2053986520368185, 0.3420194151723048, 0.8193918150814702, 6.266492251962166, 0.21880899113739008, 15.726363636363637, 6.365626689682293, 0.23647229937164757], [0.23500690585403933, 0.2217046088411658, 15.2625, 0.18927744073337335, 0.3138449580203452, 0.46331571645837066, 0.31580221521933893, 0.23836743490870582, 1.6195025779403853, 5.989380989380989, 1.6473980016428105, 26.397169081975207, 274.93807700968244, 80.03030795610064, 4.765941900006558, 0.9803071468485653, 1.0, 2.161968060241885, 0.33528407705437696, 0.8032556523935833, 6.143087140269673, 0.21450001780670788, 15.416666666666666, 6.240269338065527, 0.23181548510573963], [0.10870045222950532, 0.1025475875052294, 7.05954, 0.08754867577099941, 0.1451663249757869, 0.21430275727872408, 0.14607163770218065, 0.1102548364576842, 0.74908718945607, 2.770337406701043, 0.7619899812296469, 12.209786799080574, 127.17027696464758, 37.01734055550603, 2.204446026586228, 0.45343276104591784, 0.4625415233415234, 1.0, 0.15508280775288824, 0.37153909309081723, 2.841432883880057, 0.09921516499309856, 7.130848484848485, 2.8863836856902285, 0.10722428761496303], [0.7009187788417566, 0.661244073350997, 45.5211, 0.5645285705073193, 0.9360568529755895, 1.381860184142384, 0.9418944615378247, 0.71094170949862, 4.830240052460742, 17.863601045419227, 4.91343942162703, 78.73075665831296, 820.0153118666965, 238.6940312203409, 14.214638350492287, 2.923810624891612, 2.9825454545454546, 6.448168010946889, 1.0, 2.3957464948844254, 18.322036627087947, 0.6397560531093156, 45.98090909090909, 18.611886949386708, 0.6914002213953733], [0.2925680076495614, 0.27600753033049785, 19.0008, 0.23563785722435254, 0.3907161525538395, 0.5767973310586215, 0.3931528079239716, 0.2967516433882613, 2.016173273246826, 7.456382001836548, 2.0509012251999814, 32.86272434350825, 342.27966674172484, 99.63242426943668, 5.933281497372293, 1.2204173651656165, 1.2449336609336612, 2.6915068120585763, 0.4174064335000693, 1.0, 7.647735962970418, 0.26703829243844035, 19.192727272727275, 7.76872135224999, 0.28859490053380105], [0.03825550582108833, 0.03609009668572491, 2.4844999999999997, 0.030811453005868374, 0.05108912682729222, 0.07542066486753951, 0.05140773816297773, 0.03880254820839833, 0.2636300838586658, 0.9749790052820355, 0.2681710293255733, 4.2970526836473315, 44.75568565638369, 13.027701891363279, 0.7758219590870625, 0.15957890950665096, 0.16278460278460277, 0.35193511191947346, 0.054579085303298906, 0.13075765230937642, 1.0, 0.03491730019595517, 2.509595959595959, 1.015819765465933, 0.03773599166225783], [1.0956031997433715, 1.0335878342021871, 71.15384024701329, 0.8824122378578853, 1.4631465359744626, 2.1599798507983237, 1.4722712774034237, 1.11127000056245, 7.550127941713113, 27.92251977702954, 7.680176526266436, 123.06371510776495, 1281.7624903762808, 373.10163781999427, 22.218841512177796, 4.570196109409875, 4.662004274988586, 10.07910433923645, 1.563095800563108, 3.744781285367631, 28.639098509564622, 1.0, 71.87256590607403, 29.092162331141683, 1.0807247825715112], [0.015243691190532281, 0.014380839492399945, 0.99, 0.01227745561513773, 0.020357510790508876, 0.03005291133784026, 0.020484468014227392, 0.015461671453537676, 0.10504881586640338, 0.3885003885003885, 0.10685824875520933, 1.7122488053173108, 17.833821211438863, 5.191155110665988, 0.3091421772977227, 0.06358749060639343, 0.06486486486486487, 0.14023576606974392, 0.021748156349473104, 0.05210306934444865, 0.3984705172066815, 0.013913514668543214, 1.0, 0.40477422733398016, 0.015036680114966896], [0.03765973760467382, 0.03552805124752738, 2.445807892761781, 0.03033161398640031, 0.050293495523646196, 0.0742461088389492, 0.05060714499820566, 0.0381982606831838, 0.25952446764780646, 0.9597952692275438, 0.263994695163831, 4.230132972138392, 44.05868755256529, 12.82481630527023, 0.7637397749700323, 0.15709372364245722, 0.16024949338324526, 0.3464542863645196, 0.05372910348743288, 0.1287213113532999, 0.984426602037344, 0.034373519184222025, 2.470513022991698, 1.0, 0.037148314046586015], [1.0137670731825528, 0.9563839479491119, 65.83900119113358, 0.8165004190597401, 1.35385674463114, 1.9986400660293906, 1.3622999131196514, 1.028263641663013, 6.986170821166974, 25.83684600124539, 7.106505421289571, 113.87146579071057, 1186.0211878609964, 345.232795469189, 20.55920422154989, 4.228825120985386, 4.313775671818744, 9.326245221520605, 1.4463402947453725, 3.4650646915463335, 26.499899855557892, 0.9253049584192639, 66.50404160720564, 26.91912205614353, 1.0]],
  formulaName: "bookformula1",
  prongsAmount: 0,
  oddFormat: "eu",
  winBetBehaviours: null,
  calculateBets: null,
  locale: "ru",
  settings: false,
  onInit: function(script){ initFromRemote("https://surebet.com/calculator/data.js?version=2"); }
};

//]]>
</script>

<div id="main">
<div class="block">
<div class="content">
<h1 class="title">Онлайн калькулятор вилок</h1>
<div class="inner">
  <div class="flash">
</div>

  <div class="formula_info">
  <label for="prongs_amount">Число исходов вилки:</label>
  <select class="prongs_amount" id="prongs_amount">
    <option selected="selected" value="2">2</option>
    <option value="3">3</option>
    <option value="4">4 и больше</option>
  </select>
  <label for="fork_type">Тип вилки (формула):</label>
  <select class="fork_type" id="fork_type">
  </select>
</div>

  <form class="form">
    <table class="calc_table table" id="calc_table">
      <tr>
  <th colspan="2" class="coeff_c center first">Коэффициент</th>
  <th colspan="2" class="center comission_c">С комиссией</th>
  <th colspan="2" class="curr_c">Ставка</th>
  <th colspan="2" class="center currency_c">Курсы валют</th>
  <th class="exbet_c"><abbr title="На какие ставки распределять доход">Р</abbr></th>
  <th class="exbet_c"><abbr title="Зафиксировать сумму ставки">Ф</abbr></th>
  <th class="last profit_c">Доход</th>
  <td rowspan="4" id="thelp" class="none">
    <ul>
      <li><a target="_blank" href="http://www.cbr.ru">курсы обмена на 30 ноября 2016</a> | <a target="_blank" href="http://surebet.com/site/calculator">о калькуляторе</a></li>
      <li class="comission_h"><i>Use comission</i> &mdash;  allow to set comission this is just long line of text, of cources it long, very long</li>
      <li class="curr_h"><i>Use currencies</i> - allow to use separate currencies</li>
      <li class="exbet_h"><i>Extended profit settings</i> - ...</li>
    </ul>      
  </td>
</tr>

      <tr class="rowPattern">
  <td class="coeff_c"><span class="koefficient_descr" title=""></span> <input class="button back_lay" id="back_lay" name="back_lay" type="button" value="+"></td> 
  <td class="coeff_c"><input class="koefficient text_field" value="1" type="text"><br class="minor"/><span class="minor">ставка против</span></td>
  <td class="comission_c"><input class="commission text_field" value="0.0" type="text">%</td>
  <td class="comission_c"><span class="koefficient_with_commission">1</span></td>
  <td class="bet_c"><input class="stake text_field" value="0" type="text"/><br class="minor"/><span class="minor">обязательства</span></td>
  <td class="bet_c"><select name="currencies" id="currencies" class="booker-currency"><option value="0">USD</option>
<option value="1">EUR</option>
<option value="2">RUB</option>
<option value="3">GBP</option>
<option value="4">AUD</option>
<option value="5">BYN</option>
<option value="6">CAD</option>
<option value="7">CHF</option>
<option value="8">CNY</option>
<option value="9">CZK</option>
<option value="10">DKK</option>
<option value="11">JPY</option>
<option value="12">KRW</option>
<option value="13">KZT</option>
<option value="14">MDL</option>
<option value="15">PLN</option>
<option value="16">RON</option>
<option value="17">SEK</option>
<option value="18">SGD</option>
<option value="19">TRY</option>
<option value="20">UAH</option>
<option value="21">WME</option>
<option value="22">WMR</option>
<option value="23">WMU</option>
<option value="24">WMZ</option></select></td>
  <td class="currency_c nowrap">
    <input type="button" class="button currency_direction" id="currency_direction" name="currency_direction"/> =
  </td>
  <td class="currency_c">
    <input class="currency text_field" id="currency" name="currency" type="text" value="" />
  </td>
  <td class="exbet_c"><input class="distribution" checked="checked" title="Распределять доход на эту ставку" type="checkbox"/></td>
    <td class="exbet_c"> <input class="fixed-value" type="radio" checked="checked"  value="sum" name="fixed-value" title="Зафиксировать эту сумму ставок при расчетах"/></td>
  <td class="prize profit_c"><span class="prize">0</span></td>
</tr>
<tr class="backersPattern" number="2">
  <td colspan="4">&nbsp;</td>
  <td class="bet_c">
    <input class="backers_stake text_field" value="0.0" type="text">
    <br class="minor">
    <span class="minor">принимаемая ставка</span>
  </td>
</tr>


      <tr class="summarize">
  <td colspan="2">
    </td>
  <td class="comission_c" colspan="2"></td>
  <td class="bet_c">
    <input class="sum text_field" type="text" value="100" title="Сумма ставок для распределения">     
  </td>
  <td class="bet_c">
    <select name="currencies" id="currencies" class="sum-currency"><option value="0">USD</option>
<option value="1">EUR</option>
<option value="2">RUB</option>
<option value="3">GBP</option>
<option value="4">AUD</option>
<option value="5">BYN</option>
<option value="6">CAD</option>
<option value="7">CHF</option>
<option value="8">CNY</option>
<option value="9">CZK</option>
<option value="10">DKK</option>
<option value="11">JPY</option>
<option value="12">KRW</option>
<option value="13">KZT</option>
<option value="14">MDL</option>
<option value="15">PLN</option>
<option value="16">RON</option>
<option value="17">SEK</option>
<option value="18">SGD</option>
<option value="19">TRY</option>
<option value="20">UAH</option>
<option value="21">WME</option>
<option value="22">WMR</option>
<option value="23">WMU</option>
<option value="24">WMZ</option></select>
  </td>
  <td class="currency_c"/>
  <td class="currency_c"/>
  <td class="exbet_c">
    <input id="mass_check" type="checkbox" checked="checked"/>
  </td>
  <td class="exbet_c">
    <input class="fixed-value" type="radio" checked="checked" value="sum" name="fixed-value" title="Зафиксировать эту сумму ставок при расчетах"/>
  </td>
  <td class="ct_c"><input class="button" id="calculate" type="button" value="Рассчитать"></td>
</tr>

    </table>
    <ul>
      <li>
        <input id="editCurrencies" class="editCurrencies checkbox" type="checkbox">
        <label for="editCurrencies">Использовать свои курсы валют</label><br>

        <input id="round" class="round checkbox" type="checkbox">
        <label for="round">Округлять ставки до :</label>
        <input id="roundTo" class="roundTo text_field" style="width:4.5em; text-align: right;" type="text" value="1"><br>
        <input id="roundSmart" class="roundSmart checkbox" type="checkbox">
        <label for="roundSmart">Учитывать курсы валют при округлении</label>
      </li>
      <li class="none">
        <input id="comission_toggle" class="checkbox" type="checkbox">
        <label for="comission_toggle">Use comission</label>
      </li>
      <li class="none">
        <input id="curr_toggle" class="checkbox" type="checkbox">
        <label for="curr_toggle">Use currencies</label>
     </li>
      <li class="none">
        <input id="ex_profit_toggle" class="checkbox" type="checkbox">
        <label for="ex_profit_toggle">Extended profit settings</label>
      </li>
    </ul>
  </form>
</div>
</div>
</div>
</div>
</body>




</html>
