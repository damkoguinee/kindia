(self.webpackChunk=self.webpackChunk||[]).push([[487],{8579:(e,t,n)=>{var r={"./hello_controller.js":2748};function o(e){var t=i(e);return n(t)}function i(e){if(!n.o(r,e)){var t=new Error("Cannot find module '"+e+"'");throw t.code="MODULE_NOT_FOUND",t}return r[e]}o.keys=function(){return Object.keys(r)},o.resolve=i,e.exports=o,o.id=8579},2882:(e,t,n)=>{"use strict";var r=n(1132),o=n(1225),i=r.lg.start(),a=n(8579);i.load((0,o.Ux)(a));var c=n(4692);n.g.$=n.g.jQuery=c,n(9336),c((function(){console.log("chargement du js")})),"serviceWorker"in navigator&&window.addEventListener("load",(function(){navigator.serviceWorker.register("/build/service-worker.js").then((function(e){console.log("Service Worker enregistré avec succès:",e)})).catch((function(e){console.error("Échec de l'enregistrement du Service Worker:",e)}))}))},2748:(e,t,n)=>{"use strict";n.r(t),n.d(t,{default:()=>s});n(2675),n(9463),n(2259),n(5700),n(6280),n(6918),n(3792),n(9572),n(4170),n(2892),n(9904),n(4185),n(875),n(3548),n(287),n(6099),n(825),n(7764),n(2953);function r(e){return r="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},r(e)}function o(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,i(r.key),r)}}function i(e){var t=function(e,t){if("object"!=r(e)||!e)return e;var n=e[Symbol.toPrimitive];if(void 0!==n){var o=n.call(e,t||"default");if("object"!=r(o))return o;throw new TypeError("@@toPrimitive must return a primitive value.")}return("string"===t?String:Number)(e)}(e,"string");return"symbol"==r(t)?t:t+""}function a(e,t,n){return t=u(t),function(e,t){if(t&&("object"==r(t)||"function"==typeof t))return t;if(void 0!==t)throw new TypeError("Derived constructors may only return object or undefined");return function(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e}(e)}(e,c()?Reflect.construct(t,n||[],u(e).constructor):t.apply(e,n))}function c(){try{var e=!Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){})))}catch(e){}return(c=function(){return!!e})()}function u(e){return u=Object.setPrototypeOf?Object.getPrototypeOf.bind():function(e){return e.__proto__||Object.getPrototypeOf(e)},u(e)}function l(e,t){return l=Object.setPrototypeOf?Object.setPrototypeOf.bind():function(e,t){return e.__proto__=t,e},l(e,t)}var s=function(e){function t(){return function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,t),a(this,t,arguments)}return function(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function");e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,writable:!0,configurable:!0}}),Object.defineProperty(e,"prototype",{writable:!1}),t&&l(e,t)}(t,e),n=t,(r=[{key:"connect",value:function(){this.element.textContent="Hello Stimulus! Edit me in assets/controllers/hello_controller.js"}}])&&o(n.prototype,r),i&&o(n,i),Object.defineProperty(n,"prototype",{writable:!1}),n;var n,r,i}(n(2891).xI)},5097:(e,t,n)=>{var r=n(4692);r(document).ready((function(){r("#search_product").keyup((function(){r("#result-search-product").html("");var e=r(this).val(),t=window.location.pathname;""!=e&&r.ajax({type:"GET",url:t,data:{search_product:e},success:function(e){if(console.log(e),e.length>0)for(var n=0;n<e.length;n++){var o='<a href="'+t+"?id_product_search="+encodeURIComponent(e[n].id)+'">'+e[n].nom+"</a>";r("#result-search-product").append('<div style="text-decoration: underline; ">'+o+"</div>")}else r("#result-search-product").html("<div style='font-size: 20px; text-align: center; margin-top: 10px'>Aucun utilisateur</div>")}})}))}))},1166:(e,t,n)=>{var r=n(4692);r(document).ready((function(){r("#search_client").keyup((function(){r("#result-search").html("");var e=r(this).val(),t=window.location.pathname;""!=e&&r.ajax({type:"GET",url:t,data:{search:e},success:function(e){if(e.length>0)for(var n=0;n<e.length;n++){var o='<a href="'+t+"?id_client_search="+encodeURIComponent(e[n].id)+'">'+e[n].nom+"</a>";r("#result-search").append('<div style="text-decoration: underline; ">'+o+"</div>")}else r("#result-search").html("<div style='font-size: 20px; text-align: center; margin-top: 10px'>Aucun collaborateur trouvé</div>")}})})),r("#search_client_vente").keyup((function(){r("#result-search_vente").html("");var e=r(this).val(),t=window.location.pathname;""!=e&&r.ajax({type:"GET",url:t,data:{search_client:e},success:function(e){if(e.length>0)for(var n=0;n<e.length;n++){var o='<a href="'+t+"?id_client_search="+encodeURIComponent(e[n].id)+'">'+e[n].nom+"</a>";r("#result-search_vente").append('<div style="text-decoration: underline; ">'+o+"</div>")}else r("#result-search_vente").html("<div style='font-size: 20px; text-align: center; margin-top: 10px'>Aucun collaborateur trouvé</div>")}})})),r("#search_all_user").keyup((function(){r("#result_search_all_user").html("");var e=r(this).val(),t=window.location.pathname;""!=e&&r.ajax({type:"GET",url:t,data:{search_all_user:e},success:function(e){if(e.length>0)for(var n=0;n<e.length;n++){var o='<a href="'+t+"?id_user="+encodeURIComponent(e[n].id)+'">'+e[n].nom+"</a>";r("#result_search_all_user").append('<div style="text-decoration: underline; ">'+o+"</div>")}else r("#result_search_all_user").html("<div style='font-size: 20px; text-align: center; margin-top: 10px'>Aucun collaborateur trouvé</div>")}})})),r("#search_personnel").keyup((function(){r("#result_search_personnel").html("");var e=r(this).val(),t=window.location.pathname;""!=e&&r.ajax({type:"GET",url:t,data:{search_personnel:e},success:function(e){if(e.length>0)for(var n=0;n<e.length;n++){var o='<a href="'+t+"?id_personnel="+encodeURIComponent(e[n].id)+'">'+e[n].nom+"</a>";r("#result_search_personnel").append('<div style="text-decoration: underline; ">'+o+"</div>")}else r("#result_search_personnel").html("<div style='font-size: 20px; text-align: center; margin-top: 10px'>Aucun collaborateur trouvé</div>")}})}))}))},6700:()=>{},613:(e,t,n)=>{n(7495),n(5440)},7314:(e,t,n)=>{var r=n(4692);n(6031),r(document).ready((function(){var e=!1;function t(){var t=r(".carousel"),n=function(){var e=70;return r("nav .navbar-nav").children().each((function(){if(r(this).hasClass("nav-item")&&(e+=r(this).outerHeight(!0),r(this).children(".dropdown-menu").length)){var t=r(this).children(".dropdown-menu"),n=0;t.is(":visible")&&t.children().each((function(){n+=r(this).outerHeight(!0)})),e+=n}})),e}();e?t.css("margin-top",n+"px"):t.css("margin-top","5px")}r(".navbar-toggler").click((function(){e=!e,t()})),r("nav .dropdown").on("shown.bs.dropdown",(function(){e=!0,t()})),r("nav .dropdown").on("hidden.bs.dropdown",(function(){e=!1,t()}));var n=r(".promo");setTimeout((function(){n.addClass("show")}),500)})),window.onscroll=function(){var e;e=document.getElementById("scrollButton"),document.body.scrollTop>20||document.documentElement.scrollTop>20?e.style.display="block":e.style.display="none"}},5045:()=>{},2422:(e,t,n)=>{n(2762),document.addEventListener("DOMContentLoaded",(function(){document.getElementById("addOptionDimensionBtn").addEventListener("click",(function(e){e.preventDefault();var t=document.getElementById("newOptionDimension"),n=t.value.trim();if(""!==n){var r=document.getElementById("dimension"),o=document.createElement("option");o.value=n,o.text=n,r.add(o),t.value=""}}))})),document.addEventListener("DOMContentLoaded",(function(){document.getElementById("addOptionEpaisseurBtn").addEventListener("click",(function(e){e.preventDefault();var t=document.getElementById("newOptionEpaisseur"),n=t.value.trim();if(""!==n){var r=document.getElementById("epaisseur"),o=document.createElement("option");o.value=n,o.text=n,r.add(o),t.value=""}}))}))}},e=>{var t=t=>e(e.s=t);e.O(0,[992],(()=>(t(2882),t(5097),t(1166),t(6700),t(613),t(7314),t(5045),t(2422),t(8736),t(8654))));e.O()}]);