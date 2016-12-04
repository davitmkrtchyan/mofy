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
    width: 100%;
  }

  #wide #main {
    width: 100%;
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
  currencies: [[1.0, 0.9369434630781522, 64.1528, 0.7927703488408016, 1.3469838536964327, 1.9670024069049044, 1.3300989392846183, 1.0106002057344134, 6.882203067086482, 25.3714791935267, 6.975200249639295, 113.96493621617397, 1170.6159926718806, 337.14946394786637, 20.248782443193832, 4.21198870724181, 4.232887739347313, 9.208994131765408, 1.4235994301412664, 3.48939086542907, 25.845033256654354, 0.9043478949613477, 64.80080808080808, 26.274922596597797, 0.9834201433017523], [1.0673002581337057, 1.0, 68.4703, 0.8461239979585354, 1.4376362147521362, 2.099382176639225, 1.4196149412418413, 1.0786138604503157, 7.345377110029983, 27.078986292484988, 7.444633026974309, 121.63480584171377, 1249.3987511541422, 359.83970990119826, 21.611530728514026, 4.4954566344954365, 4.517762176856385, 9.828761813985, 1.5194080392687699, 3.724227771401841, 27.5844106663014, 0.9652107417349198, 69.16191919191918, 28.043231669791968, 1.049604572799846], [0.015587784165305334, 0.014604872477555963, 1.0, 0.012357533090384232, 0.020996493585571208, 0.030661208971469744, 0.020733295184070195, 0.015753017884401203, 0.10727829599154647, 0.39548514162322923, 0.10872791600116122, 1.7764608281505088, 18.247309434223922, 5.255413075467732, 0.31563365033472945, 0.06565557087518877, 0.06598134047691313, 0.14354781290552257, 0.02219076065489373, 0.05439187167869633, 0.4028668001498665, 0.014096779797005706, 1.0101010101010102, 0.4095678223958705, 0.015329340937601356], [1.261399346560088, 1.1818598720905271, 80.9223, 1.0, 1.6990845528796692, 2.4811755507519666, 1.6777859328738836, 1.2747704391468797, 8.681206451716722, 32.003567275977446, 8.798513037020768, 143.75529607384394, 1476.6142482290988, 425.28011351692254, 25.54180094248208, 5.3129998030332874, 5.339361828474908, 11.616219180284569, 1.795727390943507, 4.401515357544969, 32.60090806176754, 1.140743843767235, 81.73969696969698, 33.14317019426535, 1.2404855261548584], [0.7423993964409972, 0.695586261488558, 47.627, 0.5885522284957299, 1.0, 1.4603013996841896, 0.9874646497317112, 0.7502689827803761, 5.109343403189384, 18.835770840089538, 5.178384455387306, 84.60749986232429, 869.0646064237828, 250.2995585453017, 15.03268386449216, 3.1269778740726153, 3.142493302893942, 6.836751685251324, 1.0568793577106237, 2.5905216724412705, 19.187337090737692, 0.6713873313919908, 48.108080808080814, 19.506486677248123, 0.7300905208351398], [0.5083877866593508, 0.476330613419249, 32.6145, 0.4030347629763365, 0.6847901400466122, 1.0, 0.6762060557808574, 0.5137768017908031, 3.4988279846162924, 12.89855015147081, 3.5461066164198725, 57.93838167971477, 595.1268735424961, 171.40266974984235, 10.294233688842034, 2.141323616308844, 2.151948428984283, 4.681740144007166, 0.7237405633790315, 1.7739636988648415, 13.13929925348782, 0.45975942468944264, 32.943939393939395, 13.357849743530117, 0.4999587900093994], [0.7518237707473407, 0.7044163673884882, 48.2316, 0.5960235930021761, 1.0126944800218363, 1.4788391666283403, 1.0, 0.7597932573932851, 5.174203860945872, 19.07488115671494, 5.244121353401607, 85.68154807902408, 880.0969297077146, 253.47698129072947, 15.223515969484538, 3.1666732322237543, 3.1823856213462833, 6.923540692934002, 1.0702958916025724, 2.62340699805821, 19.4309103581083, 0.6799102444572604, 48.71878787878788, 19.754111382668665, 0.7393586403660136], [0.989510980035166, 0.9271158443880048, 63.4799, 0.784454964824282, 1.3328553131627017, 1.9463704793880023, 1.3161475049552576, 1.0, 6.810015501713771, 25.105357241728427, 6.902037234962114, 112.76955572491148, 1158.3373781535913, 333.61309648938413, 20.03639255988359, 4.167809073599895, 4.188488895340398, 9.112400808461281, 1.4086672672965883, 3.452790574976475, 25.573944186833508, 0.8948621718359426, 64.12111111111112, 25.99932440890762, 0.9731050297848404], [0.14530230948610193, 0.1361400490431618, 9.32155, 0.11519136257867114, 0.1957198647825813, 0.2858099924880038, 0.19326644772306953, 0.14684254386034004, 1.0, 3.6865345218980123, 1.0135127054006243, 16.559368432646377, 170.09320725659003, 48.98859575362624, 2.9421948532776976, 0.6120116866916158, 0.6150483643225696, 1.338088115389474, 0.20685228498262465, 0.5070165514465518, 3.755343020936988, 0.13140383771677855, 9.415707070707072, 3.8178069348542265, 0.14289321801689792], [0.03941433577334115, 0.03692900425439936, 2.52854, 0.031246516720360145, 0.053090473890860225, 0.07752809333272011, 0.05242496620472885, 0.03983213584142382, 0.27125746254646493, 1.0, 0.2749228847255762, 4.491852262411688, 46.13905179681256, 13.28852217784318, 0.7980923102173768, 0.1660127371807498, 0.16683645864949392, 0.36296638684413, 0.05611022594632499, 0.13753202321445082, 1.0186648188509433, 0.035644271587920814, 2.554080808080808, 1.0356086216408542, 0.038760851734362535], [0.1433650596700378, 0.13432495549165113, 9.19727, 0.11365556836619818, 0.1931104205597665, 0.28199941743702955, 0.19068971379759328, 0.14488475879766666, 0.9866674533741705, 3.6373836284970773, 1.0, 16.33858988092383, 167.82543164010465, 48.33545301660711, 2.902967903214097, 0.6038520123432473, 0.6068482033280989, 1.3202479932015754, 0.20409441724843444, 0.5002567296343234, 3.7052747350143624, 0.12965188992360668, 9.290171717171717, 3.766905845886867, 0.14098808752517283], [0.008774628698981183, 0.00822133100044837, 0.562917, 0.00695626545463982, 0.011819283179708987, 0.017259715770592834, 0.011671124325131241, 0.008867641568433473, 0.06038877654467336, 0.22262530946712333, 0.06120479229162567, 1.0, 10.271720684785029, 2.9583613622030693, 0.1776755475454749, 0.03695863699034863, 0.03714201823724251, 0.08080550419733805, 0.012491556415570813, 0.030618109229756704, 0.2267805705399624, 0.007935316992991062, 0.5686030303030303, 0.23055268987961622, 0.008629146612571742], [0.0008542511004975621, 0.0008003849844385085, 0.0548026, 0.0006772249429390909, 0.0011506624393726247, 0.0016803139707798679, 0.0011362384826545252, 0.0008633063379116854, 0.005879129543906325, 0.02167361402232118, 0.0059585724894452375, 0.09735467218080107, 1.0, 0.28801030060962796, 0.017297544685834044, 0.0035980959884446195, 0.0036159490096200797, 0.007866793371536191, 0.001216111379865879, 0.0029808159868589235, 0.022078148101893073, 0.000772540184503385, 0.055356161616161616, 0.02244538154363193, 0.000840087739666992], [0.0029660435709742985, 0.0027790151350293485, 0.19027999999999998, 0.0023513913964383114, 0.003995212799462489, 0.0058342148430912625, 0.003945131407624876, 0.0029974842430438606, 0.02041291416127146, 0.07525291274806804, 0.020688747856700954, 0.3380249663804788, 3.472098039144128, 1.0, 0.06005877098569231, 0.012492942026130915, 0.012554929465947029, 0.02731427783966283, 0.004222457937413178, 0.010349685343022337, 0.07665749473251658, 0.0026823352597742456, 0.19220202020202018, 0.07793256524548622, 0.0029168669936067856], [0.04938568542604532, 0.046271595129567133, 3.1682300000000003, 0.03915150706294804, 0.06652172087261428, 0.0971417620996796, 0.06568784780102672, 0.04990918385189643, 0.3398823157092973, 1.2529878902449636, 0.34447504531235906, 5.628236489571287, 57.811673168791266, 16.650357368089136, 1.0, 0.2080119493138993, 0.20904406233917053, 0.45479248728166377, 0.07030543362965397, 0.1723259596085961, 1.2763746822388116, 0.044661840656267396, 3.2002323232323238, 1.2976050619492687, 0.04856687783873675], [0.23741754062176554, 0.2224468127056549, 15.231, 0.18821758649964224, 0.3197975938018351, 0.4670008738444557, 0.31578881894857314, 0.23993421539731474, 1.6339557262472442, 6.023634192063404, 1.6560348886136864, 27.0572748735604, 277.9247699926646, 80.04519655244903, 4.807416128248264, 1.0, 1.004961796803864, 2.186376738364014, 0.3379874755346864, 0.8284425975382238, 6.1360642330826165, 0.21470805308819393, 15.384848484848485, 6.238127502911503, 0.23348119182060625], [0.23624533925253458, 0.22134852629534266, 15.1558, 0.18728830001124533, 0.3182186574842001, 0.4646951509298011, 0.314229675150731, 0.23874958845240776, 1.6258883983886798, 5.993893709413337, 1.6478585493303992, 26.923685019283482, 276.55257232321094, 79.64998948917385, 4.783680477743093, 0.9950627010701858, 1.0, 2.1755819428335186, 0.33631873033343834, 0.8243523287879858, 6.105768649711346, 0.2136479752474591, 15.308888888888887, 6.207328002667333, 0.23232842538209864], [0.10858949258644986, 0.10174221523784767, 6.9663200000000005, 0.08608652991820549, 0.14626829319503643, 0.21359579328212913, 0.14443476890669188, 0.1097405635484618, 0.74733493893183, 2.7550760517927344, 0.7574334557972094, 12.375394596361454, 127.11659665782281, 36.61088921589238, 2.1988050109998327, 0.457377716499245, 0.45964713179112954, 1.0, 0.15458793976539928, 0.37891118351273584, 2.806499047220018, 0.0982026790354768, 7.0366868686868695, 2.8531805125128007, 0.10678909436043109], [0.7024447880684865, 0.6581510523540864, 45.0638, 0.556877399678457, 0.9461817876414639, 1.3817105888485184, 0.9343210675159025, 0.709890847339079, 4.834367674903851, 17.822063325080876, 4.899693061093129, 80.0540754676089, 822.2931028819801, 236.8288837502628, 14.223651691954181, 2.9586895148053314, 2.973369930983518, 6.468809931211887, 1.0, 2.4511044269544358, 18.154708908593552, 0.6352544654163058, 45.5189898989899, 18.456682434883028, 0.69079835414388], [0.2865829706575551, 0.2685120409871142, 18.3851, 0.22719448162002315, 0.38602263422008526, 0.5637093930613685, 0.381183705288649, 0.2896208091065046, 1.972322199634181, 7.271033877257232, 1.9989736084729492, 32.660409971629925, 335.4786086791503, 96.62129493378181, 5.8029562247690345, 1.207084236097433, 1.2130735428020958, 2.639140895049323, 0.4079793537162867, 1.0, 7.40674640743531, 0.25917070624592964, 18.57080808080808, 7.529945371530318, 0.28183146607189474], [0.03869215373296255, 0.03625236051251419, 2.48221, 0.03067399221228264, 0.05211770634304071, 0.07610755952107191, 0.05146439263885087, 0.03910229852283951, 0.2662872590931765, 0.9816771733885957, 0.2698855203772424, 4.409548832243474, 45.29365395072496, 13.045038890056759, 0.7834690031973688, 0.16297091458210228, 0.16377954314519852, 0.3563158166722171, 0.05508212800518376, 0.13501204779957682, 1.0, 0.03499116777992553, 2.507282828282828, 1.0166333444292535, 0.03805064336872346], [1.1057691465547566, 1.0360431735379863, 70.93818690509798, 0.8766209920516097, 1.4894531863249412, 2.1750505727543876, 1.4707823689261392, 1.1174905270030038, 7.610127811908747, 28.05499889465778, 7.712961227092168, 126.01891025692593, 1294.4310471601343, 372.80947501102577, 22.39047888098338, 4.657487158105048, 4.680596663000171, 10.183021581709996, 1.5741723269031458, 3.8584607592614657, 28.57864036688998, 1.0, 71.65473424757371, 29.053998735432234, 1.087435652563535], [0.01543190632365228, 0.014458823752780403, 0.99, 0.012233957759480388, 0.020786528649715495, 0.03035459688175505, 0.02052596223222949, 0.015595487705557192, 0.106205513031631, 0.3915302902069969, 0.1076406368411496, 1.7586962198690037, 18.064836339881683, 5.202858944713055, 0.31247731383138216, 0.06499901516643687, 0.065321527072144, 0.14211233477646734, 0.02196885304834479, 0.05384795296190937, 0.39883813214836783, 0.01395581199903565, 1.0, 0.40547214417191174, 0.015176047528225343], [0.03805910355486584, 0.03565922828634601, 2.441598058534597, 0.03017212880175918, 0.05126499797456478, 0.0748623482970641, 0.050622373268450496, 0.038462537882614764, 0.2619304792158597, 0.9656157539665566, 0.265469868616948, 4.337403309075045, 44.55259528808117, 12.831606361859352, 0.7706505078654633, 0.1603045143808415, 0.16109991280794134, 0.3504860612970115, 0.05418091813239445, 0.1328030882907679, 0.9836387970939595, 0.03441867018395887, 2.4662606651864616, 1.0, 0.03742808907186239], [1.0168593828499204, 0.952739751630917, 65.23437661609437, 0.8061359676639734, 1.3696931701785617, 2.0001648535496286, 1.3525235865302907, 1.0276383015110981, 6.9982327634453885, 25.79922667471915, 7.092797821102824, 115.88631470730918, 1190.3518558625753, 342.8335958382088, 20.59016441864838, 4.28300023741674, 4.304251614305703, 9.36425208949551, 1.4476004379589462, 3.548219841942353, 26.28076456709721, 0.9195946423520206, 65.89330971322663, 26.71790157600586, 1.0]],
  formulaName: "bookformula1",
  prongsAmount: 0,
  oddFormat: "eu",
  winBetBehaviours: null,
  calculateBets: null,
  locale: "en",
  settings: false,
  onInit: function(script){ initFromRemote("https://surebet.com/calculator/data.js?version=2"); }
};

//]]>
</script>

<div id="main">

<div class="block">
<div class="content">
<h1 class="title">Online surebets calculator</h1>
<div class="inner">
  <div class="flash">
</div>

  <div class="formula_info">
  <label for="prongs_amount">Surebet outcome number:</label>
  <select class="prongs_amount" id="prongs_amount">
    <option selected="selected" value="2">2</option>
    <option value="3">3</option>
    <option value="4">4 or more</option>
  </select>
  <label for="fork_type">Surebet type (formula):</label>
  <select class="fork_type" id="fork_type">
  </select>
</div>

  <form class="form">
    <table class="calc_table table" id="calc_table">
      <tr>
  <th colspan="2" class="coeff_c center first">Odds</th>
  <th colspan="2" class="center comission_c">With commission</th>
  <th colspan="2" class="curr_c">Bet</th>
  <th colspan="2" class="center currency_c">Exchange rates</th>
  <th class="exbet_c"><abbr title="The bets on which the profit will be distributed">D</abbr></th>
  <th class="exbet_c"><abbr title="Fix bet amount">F</abbr></th>
  <th class="last profit_c">Profit</th>
  <td rowspan="4" id="thelp" class="none">
    <ul>
      <li><a target="_blank" href="http://www.cbr.ru">rate of exchange on 03 December, 2016</a> | <a target="_blank" href="http://surebet.com/site/calculator">about calculator</a></li>
      <li class="comission_h"><i>Use comission</i> &mdash;  allow to set comission this is just long line of text, of cources it long, very long</li>
      <li class="curr_h"><i>Use currencies</i> - allow to use separate currencies</li>
      <li class="exbet_h"><i>Extended profit settings</i> - ...</li>
    </ul>      
  </td>
</tr>

      <tr class="rowPattern">
  <td class="coeff_c"><span class="koefficient_descr" title=""></span> <input class="button back_lay" id="back_lay" name="back_lay" type="button" value="+"></td> 
  <td class="coeff_c"><input class="koefficient text_field" value="1" type="text"><br class="minor"/><span class="minor">lay odd</span></td>
  <td class="comission_c"><input class="commission text_field" value="0.0" type="text">%</td>
  <td class="comission_c"><span class="koefficient_with_commission">1</span></td>
  <td class="bet_c"><input class="stake text_field" value="0" type="text"/><br class="minor"/><span class="minor">liabilities</span></td>
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
  <td class="exbet_c"><input class="distribution" checked="checked" title="Distribute profit on this bet" type="checkbox"/></td>
    <td class="exbet_c"> <input class="fixed-value" type="radio" checked="checked"  value="sum" name="fixed-value" title="Fix this amount of of bets while calculation"/></td>
  <td class="prize profit_c"><span class="prize">0</span></td>
</tr>
<tr class="backersPattern" number="2">
  <td colspan="4">&nbsp;</td>
  <td class="bet_c">
    <input class="backers_stake text_field" value="0.0" type="text">
    <br class="minor">
    <span class="minor">backer&#39;s bet</span>
  </td>
</tr>


      <tr class="summarize">
  <td colspan="2">
    </td>
  <td class="comission_c" colspan="2"></td>
  <td class="bet_c">
    <input class="sum text_field" type="text" value="100" title="Amount of bets for distribution">     
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
    <input class="fixed-value" type="radio" checked="checked" value="sum" name="fixed-value" title="Fix this amount of of bets while calculation"/>
  </td>
  <td class="ct_c"><input class="button" id="calculate" type="button" value="Calculate"></td>
</tr>

    </table>
    <ul>
      <li>
        <input id="editCurrencies" class="editCurrencies checkbox" type="checkbox">
        <label for="editCurrencies">Use own exchange rates</label><br>

        <input id="round" class="round checkbox" type="checkbox">
        <label for="round">Round bets up to :</label>
        <input id="roundTo" class="roundTo text_field" style="width:4.5em; text-align: right;" type="text" value="1"><br>
        <input id="roundSmart" class="roundSmart checkbox" type="checkbox">
        <label for="roundSmart">Take the currency exchange rates into account when rounding</label>
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
