(()=>{"use strict";var o={n:e=>{var t=e&&e.__esModule?()=>e.default:()=>e;return o.d(t,{a:t}),t},d:(e,t)=>{for(var r in t)o.o(t,r)&&!o.o(e,r)&&Object.defineProperty(e,r,{enumerable:!0,get:t[r]})},o:(o,e)=>Object.prototype.hasOwnProperty.call(o,e)};const e=window.wp.domReady;o.n(e)()((function(){document.querySelectorAll(".op-block__tabs").forEach((function(o){var e=o.querySelectorAll(".op-block__tab-labels--wrapper button");e.forEach((function(t,r){t.addEventListener("click",(function(c){c.stopPropagation();var n=o.querySelectorAll(".op-block___tab-contents > .op-block-innercolumn__wrapper");e.forEach((function(o){return o.classList.remove("op-block__tab--active")})),n.forEach((function(o,e){o.style.visibility=r===e?"visible":"hidden"})),t.classList.add("op-block__tab--active")}))}))}))}))})();