"use strict";(globalThis.webpackChunkomnipress=globalThis.webpackChunkomnipress||[]).push([[889],{4889:(e,a,s)=>{s.d(a,{Ij:()=>c,t9:()=>b,hw:()=>g,_R:()=>m,Vx:()=>i,dK:()=>o,Ze:()=>p});var t=s(2375),l=s(7044);function r(e,a,s,t){return e.params.createElements&&Object.keys(t).forEach((r=>{if(!s[r]&&!0===s.auto){let i=(0,l.e)(e.el,`.${t[r]}`)[0];i||(i=(0,l.c)("div",t[r]),i.className=t[r],e.el.append(i)),s[r]=i,a[r]=i}})),s}function i(e){let{swiper:a,extendParams:s,on:t,emit:i}=e;function n(e){let s;return e&&"string"==typeof e&&a.isElement&&(s=a.el.querySelector(e)||a.hostEl.querySelector(e),s)?s:(e&&("string"==typeof e&&(s=[...document.querySelectorAll(e)]),a.params.uniqueNavElements&&"string"==typeof e&&s&&s.length>1&&1===a.el.querySelectorAll(e).length?s=a.el.querySelector(e):s&&1===s.length&&(s=s[0])),e&&!s?e:s)}function o(e,s){const t=a.params.navigation;(e=(0,l.m)(e)).forEach((e=>{e&&(e.classList[s?"add":"remove"](...t.disabledClass.split(" ")),"BUTTON"===e.tagName&&(e.disabled=s),a.params.watchOverflow&&a.enabled&&e.classList[a.isLocked?"add":"remove"](t.lockClass))}))}function p(){const{nextEl:e,prevEl:s}=a.navigation;if(a.params.loop)return o(s,!1),void o(e,!1);o(s,a.isBeginning&&!a.params.rewind),o(e,a.isEnd&&!a.params.rewind)}function c(e){e.preventDefault(),(!a.isBeginning||a.params.loop||a.params.rewind)&&(a.slidePrev(),i("navigationPrev"))}function d(e){e.preventDefault(),(!a.isEnd||a.params.loop||a.params.rewind)&&(a.slideNext(),i("navigationNext"))}function u(){const e=a.params.navigation;if(a.params.navigation=r(a,a.originalParams.navigation,a.params.navigation,{nextEl:"swiper-button-next",prevEl:"swiper-button-prev"}),!e.nextEl&&!e.prevEl)return;let s=n(e.nextEl),t=n(e.prevEl);Object.assign(a.navigation,{nextEl:s,prevEl:t}),s=(0,l.m)(s),t=(0,l.m)(t);const i=(s,t)=>{s&&s.addEventListener("click","next"===t?d:c),!a.enabled&&s&&s.classList.add(...e.lockClass.split(" "))};s.forEach((e=>i(e,"next"))),t.forEach((e=>i(e,"prev")))}function m(){let{nextEl:e,prevEl:s}=a.navigation;e=(0,l.m)(e),s=(0,l.m)(s);const t=(e,s)=>{e.removeEventListener("click","next"===s?d:c),e.classList.remove(...a.params.navigation.disabledClass.split(" "))};e.forEach((e=>t(e,"next"))),s.forEach((e=>t(e,"prev")))}s({navigation:{nextEl:null,prevEl:null,hideOnClick:!1,disabledClass:"swiper-button-disabled",hiddenClass:"swiper-button-hidden",lockClass:"swiper-button-lock",navigationDisabledClass:"swiper-navigation-disabled"}}),a.navigation={nextEl:null,prevEl:null},t("init",(()=>{!1===a.params.navigation.enabled?g():(u(),p())})),t("toEdge fromEdge lock unlock",(()=>{p()})),t("destroy",(()=>{m()})),t("enable disable",(()=>{let{nextEl:e,prevEl:s}=a.navigation;e=(0,l.m)(e),s=(0,l.m)(s),a.enabled?p():[...e,...s].filter((e=>!!e)).forEach((e=>e.classList.add(a.params.navigation.lockClass)))})),t("click",((e,s)=>{let{nextEl:t,prevEl:r}=a.navigation;t=(0,l.m)(t),r=(0,l.m)(r);const n=s.target;let o=r.includes(n)||t.includes(n);if(a.isElement&&!o){const e=s.path||s.composedPath&&s.composedPath();e&&(o=e.find((e=>t.includes(e)||r.includes(e))))}if(a.params.navigation.hideOnClick&&!o){if(a.pagination&&a.params.pagination&&a.params.pagination.clickable&&(a.pagination.el===n||a.pagination.el.contains(n)))return;let e;t.length?e=t[0].classList.contains(a.params.navigation.hiddenClass):r.length&&(e=r[0].classList.contains(a.params.navigation.hiddenClass)),i(!0===e?"navigationShow":"navigationHide"),[...t,...r].filter((e=>!!e)).forEach((e=>e.classList.toggle(a.params.navigation.hiddenClass)))}}));const g=()=>{a.el.classList.add(...a.params.navigation.navigationDisabledClass.split(" ")),m()};Object.assign(a.navigation,{enable:()=>{a.el.classList.remove(...a.params.navigation.navigationDisabledClass.split(" ")),u(),p()},disable:g,update:p,init:u,destroy:m})}function n(e){return void 0===e&&(e=""),`.${e.trim().replace(/([\.:!+\/])/g,"\\$1").replace(/ /g,".")}`}function o(e){let{swiper:a,extendParams:s,on:t,emit:i}=e;const o="swiper-pagination";let p;s({pagination:{el:null,bulletElement:"span",clickable:!1,hideOnClick:!1,renderBullet:null,renderProgressbar:null,renderFraction:null,renderCustom:null,progressbarOpposite:!1,type:"bullets",dynamicBullets:!1,dynamicMainBullets:1,formatFractionCurrent:e=>e,formatFractionTotal:e=>e,bulletClass:`${o}-bullet`,bulletActiveClass:`${o}-bullet-active`,modifierClass:`${o}-`,currentClass:`${o}-current`,totalClass:`${o}-total`,hiddenClass:`${o}-hidden`,progressbarFillClass:`${o}-progressbar-fill`,progressbarOppositeClass:`${o}-progressbar-opposite`,clickableClass:`${o}-clickable`,lockClass:`${o}-lock`,horizontalClass:`${o}-horizontal`,verticalClass:`${o}-vertical`,paginationDisabledClass:`${o}-disabled`}}),a.pagination={el:null,bullets:[]};let c=0;function d(){return!a.params.pagination.el||!a.pagination.el||Array.isArray(a.pagination.el)&&0===a.pagination.el.length}function u(e,s){const{bulletActiveClass:t}=a.params.pagination;e&&(e=e[("prev"===s?"previous":"next")+"ElementSibling"])&&(e.classList.add(`${t}-${s}`),(e=e[("prev"===s?"previous":"next")+"ElementSibling"])&&e.classList.add(`${t}-${s}-${s}`))}function m(e){const s=e.target.closest(n(a.params.pagination.bulletClass));if(!s)return;e.preventDefault();const t=(0,l.h)(s)*a.params.slidesPerGroup;if(a.params.loop){if(a.realIndex===t)return;const e=(r=a.realIndex,i=t,(i%=o=a.slides.length)==1+(r%=o)?"next":i===r-1?"previous":void 0);"next"===e?a.slideNext():"previous"===e?a.slidePrev():a.slideToLoop(t)}else a.slideTo(t);var r,i,o}function g(){const e=a.rtl,s=a.params.pagination;if(d())return;let t,r,o=a.pagination.el;o=(0,l.m)(o);const m=a.virtual&&a.params.virtual.enabled?a.virtual.slides.length:a.slides.length,g=a.params.loop?Math.ceil(m/a.params.slidesPerGroup):a.snapGrid.length;if(a.params.loop?(r=a.previousRealIndex||0,t=a.params.slidesPerGroup>1?Math.floor(a.realIndex/a.params.slidesPerGroup):a.realIndex):void 0!==a.snapIndex?(t=a.snapIndex,r=a.previousSnapIndex):(r=a.previousIndex||0,t=a.activeIndex||0),"bullets"===s.type&&a.pagination.bullets&&a.pagination.bullets.length>0){const i=a.pagination.bullets;let n,d,m;if(s.dynamicBullets&&(p=(0,l.f)(i[0],a.isHorizontal()?"width":"height",!0),o.forEach((e=>{e.style[a.isHorizontal()?"width":"height"]=p*(s.dynamicMainBullets+4)+"px"})),s.dynamicMainBullets>1&&void 0!==r&&(c+=t-(r||0),c>s.dynamicMainBullets-1?c=s.dynamicMainBullets-1:c<0&&(c=0)),n=Math.max(t-c,0),d=n+(Math.min(i.length,s.dynamicMainBullets)-1),m=(d+n)/2),i.forEach((e=>{const a=[...["","-next","-next-next","-prev","-prev-prev","-main"].map((e=>`${s.bulletActiveClass}${e}`))].map((e=>"string"==typeof e&&e.includes(" ")?e.split(" "):e)).flat();e.classList.remove(...a)})),o.length>1)i.forEach((e=>{const r=(0,l.h)(e);r===t?e.classList.add(...s.bulletActiveClass.split(" ")):a.isElement&&e.setAttribute("part","bullet"),s.dynamicBullets&&(r>=n&&r<=d&&e.classList.add(...`${s.bulletActiveClass}-main`.split(" ")),r===n&&u(e,"prev"),r===d&&u(e,"next"))}));else{const e=i[t];if(e&&e.classList.add(...s.bulletActiveClass.split(" ")),a.isElement&&i.forEach(((e,a)=>{e.setAttribute("part",a===t?"bullet-active":"bullet")})),s.dynamicBullets){const e=i[n],a=i[d];for(let e=n;e<=d;e+=1)i[e]&&i[e].classList.add(...`${s.bulletActiveClass}-main`.split(" "));u(e,"prev"),u(a,"next")}}if(s.dynamicBullets){const t=Math.min(i.length,s.dynamicMainBullets+4),l=(p*t-p)/2-m*p,r=e?"right":"left";i.forEach((e=>{e.style[a.isHorizontal()?r:"top"]=`${l}px`}))}}o.forEach(((e,l)=>{if("fraction"===s.type&&(e.querySelectorAll(n(s.currentClass)).forEach((e=>{e.textContent=s.formatFractionCurrent(t+1)})),e.querySelectorAll(n(s.totalClass)).forEach((e=>{e.textContent=s.formatFractionTotal(g)}))),"progressbar"===s.type){let l;l=s.progressbarOpposite?a.isHorizontal()?"vertical":"horizontal":a.isHorizontal()?"horizontal":"vertical";const r=(t+1)/g;let i=1,o=1;"horizontal"===l?i=r:o=r,e.querySelectorAll(n(s.progressbarFillClass)).forEach((e=>{e.style.transform=`translate3d(0,0,0) scaleX(${i}) scaleY(${o})`,e.style.transitionDuration=`${a.params.speed}ms`}))}"custom"===s.type&&s.renderCustom?(e.innerHTML=s.renderCustom(a,t+1,g),0===l&&i("paginationRender",e)):(0===l&&i("paginationRender",e),i("paginationUpdate",e)),a.params.watchOverflow&&a.enabled&&e.classList[a.isLocked?"add":"remove"](s.lockClass)}))}function f(){const e=a.params.pagination;if(d())return;const s=a.virtual&&a.params.virtual.enabled?a.virtual.slides.length:a.grid&&a.params.grid.rows>1?a.slides.length/Math.ceil(a.params.grid.rows):a.slides.length;let t=a.pagination.el;t=(0,l.m)(t);let r="";if("bullets"===e.type){let t=a.params.loop?Math.ceil(s/a.params.slidesPerGroup):a.snapGrid.length;a.params.freeMode&&a.params.freeMode.enabled&&t>s&&(t=s);for(let s=0;s<t;s+=1)e.renderBullet?r+=e.renderBullet.call(a,s,e.bulletClass):r+=`<${e.bulletElement} ${a.isElement?'part="bullet"':""} class="${e.bulletClass}"></${e.bulletElement}>`}"fraction"===e.type&&(r=e.renderFraction?e.renderFraction.call(a,e.currentClass,e.totalClass):`<span class="${e.currentClass}"></span> / <span class="${e.totalClass}"></span>`),"progressbar"===e.type&&(r=e.renderProgressbar?e.renderProgressbar.call(a,e.progressbarFillClass):`<span class="${e.progressbarFillClass}"></span>`),a.pagination.bullets=[],t.forEach((s=>{"custom"!==e.type&&(s.innerHTML=r||""),"bullets"===e.type&&a.pagination.bullets.push(...s.querySelectorAll(n(e.bulletClass)))})),"custom"!==e.type&&i("paginationRender",t[0])}function b(){a.params.pagination=r(a,a.originalParams.pagination,a.params.pagination,{el:"swiper-pagination"});const e=a.params.pagination;if(!e.el)return;let s;"string"==typeof e.el&&a.isElement&&(s=a.el.querySelector(e.el)),s||"string"!=typeof e.el||(s=[...document.querySelectorAll(e.el)]),s||(s=e.el),s&&0!==s.length&&(a.params.uniqueNavElements&&"string"==typeof e.el&&Array.isArray(s)&&s.length>1&&(s=[...a.el.querySelectorAll(e.el)],s.length>1&&(s=s.find((e=>(0,l.a)(e,".swiper")[0]===a.el)))),Array.isArray(s)&&1===s.length&&(s=s[0]),Object.assign(a.pagination,{el:s}),s=(0,l.m)(s),s.forEach((s=>{"bullets"===e.type&&e.clickable&&s.classList.add(...(e.clickableClass||"").split(" ")),s.classList.add(e.modifierClass+e.type),s.classList.add(a.isHorizontal()?e.horizontalClass:e.verticalClass),"bullets"===e.type&&e.dynamicBullets&&(s.classList.add(`${e.modifierClass}${e.type}-dynamic`),c=0,e.dynamicMainBullets<1&&(e.dynamicMainBullets=1)),"progressbar"===e.type&&e.progressbarOpposite&&s.classList.add(e.progressbarOppositeClass),e.clickable&&s.addEventListener("click",m),a.enabled||s.classList.add(e.lockClass)})))}function h(){const e=a.params.pagination;if(d())return;let s=a.pagination.el;s&&(s=(0,l.m)(s),s.forEach((s=>{s.classList.remove(e.hiddenClass),s.classList.remove(e.modifierClass+e.type),s.classList.remove(a.isHorizontal()?e.horizontalClass:e.verticalClass),e.clickable&&(s.classList.remove(...(e.clickableClass||"").split(" ")),s.removeEventListener("click",m))}))),a.pagination.bullets&&a.pagination.bullets.forEach((a=>a.classList.remove(...e.bulletActiveClass.split(" "))))}t("changeDirection",(()=>{if(!a.pagination||!a.pagination.el)return;const e=a.params.pagination;let{el:s}=a.pagination;s=(0,l.m)(s),s.forEach((s=>{s.classList.remove(e.horizontalClass,e.verticalClass),s.classList.add(a.isHorizontal()?e.horizontalClass:e.verticalClass)}))})),t("init",(()=>{!1===a.params.pagination.enabled?y():(b(),f(),g())})),t("activeIndexChange",(()=>{void 0===a.snapIndex&&g()})),t("snapIndexChange",(()=>{g()})),t("snapGridLengthChange",(()=>{f(),g()})),t("destroy",(()=>{h()})),t("enable disable",(()=>{let{el:e}=a.pagination;e&&(e=(0,l.m)(e),e.forEach((e=>e.classList[a.enabled?"remove":"add"](a.params.pagination.lockClass))))})),t("lock unlock",(()=>{g()})),t("click",((e,s)=>{const t=s.target,r=(0,l.m)(a.pagination.el);if(a.params.pagination.el&&a.params.pagination.hideOnClick&&r&&r.length>0&&!t.classList.contains(a.params.pagination.bulletClass)){if(a.navigation&&(a.navigation.nextEl&&t===a.navigation.nextEl||a.navigation.prevEl&&t===a.navigation.prevEl))return;const e=r[0].classList.contains(a.params.pagination.hiddenClass);i(!0===e?"paginationShow":"paginationHide"),r.forEach((e=>e.classList.toggle(a.params.pagination.hiddenClass)))}}));const y=()=>{a.el.classList.add(a.params.pagination.paginationDisabledClass);let{el:e}=a.pagination;e&&(e=(0,l.m)(e),e.forEach((e=>e.classList.add(a.params.pagination.paginationDisabledClass)))),h()};Object.assign(a.pagination,{enable:()=>{a.el.classList.remove(a.params.pagination.paginationDisabledClass);let{el:e}=a.pagination;e&&(e=(0,l.m)(e),e.forEach((e=>e.classList.remove(a.params.pagination.paginationDisabledClass)))),b(),f(),g()},disable:y,render:f,update:g,init:b,destroy:h})}function p(e){let{swiper:a,extendParams:s,on:i,emit:o}=e;const p=(0,t.g)();let c,d,u,m,g=!1,f=null,b=null;function h(){if(!a.params.scrollbar.el||!a.scrollbar.el)return;const{scrollbar:e,rtlTranslate:s}=a,{dragEl:t,el:l}=e,r=a.params.scrollbar,i=a.params.loop?a.progressLoop:a.progress;let n=d,o=(u-d)*i;s?(o=-o,o>0?(n=d-o,o=0):-o+d>u&&(n=u+o)):o<0?(n=d+o,o=0):o+d>u&&(n=u-o),a.isHorizontal()?(t.style.transform=`translate3d(${o}px, 0, 0)`,t.style.width=`${n}px`):(t.style.transform=`translate3d(0px, ${o}px, 0)`,t.style.height=`${n}px`),r.hide&&(clearTimeout(f),l.style.opacity=1,f=setTimeout((()=>{l.style.opacity=0,l.style.transitionDuration="400ms"}),1e3))}function y(){if(!a.params.scrollbar.el||!a.scrollbar.el)return;const{scrollbar:e}=a,{dragEl:s,el:t}=e;s.style.width="",s.style.height="",u=a.isHorizontal()?t.offsetWidth:t.offsetHeight,m=a.size/(a.virtualSize+a.params.slidesOffsetBefore-(a.params.centeredSlides?a.snapGrid[0]:0)),d="auto"===a.params.scrollbar.dragSize?u*m:parseInt(a.params.scrollbar.dragSize,10),a.isHorizontal()?s.style.width=`${d}px`:s.style.height=`${d}px`,t.style.display=m>=1?"none":"",a.params.scrollbar.hide&&(t.style.opacity=0),a.params.watchOverflow&&a.enabled&&e.el.classList[a.isLocked?"add":"remove"](a.params.scrollbar.lockClass)}function v(e){return a.isHorizontal()?e.clientX:e.clientY}function w(e){const{scrollbar:s,rtlTranslate:t}=a,{el:r}=s;let i;i=(v(e)-(0,l.b)(r)[a.isHorizontal()?"left":"top"]-(null!==c?c:d/2))/(u-d),i=Math.max(Math.min(i,1),0),t&&(i=1-i);const n=a.minTranslate()+(a.maxTranslate()-a.minTranslate())*i;a.updateProgress(n),a.setTranslate(n),a.updateActiveIndex(),a.updateSlidesClasses()}function E(e){const s=a.params.scrollbar,{scrollbar:t,wrapperEl:l}=a,{el:r,dragEl:i}=t;g=!0,c=e.target===i?v(e)-e.target.getBoundingClientRect()[a.isHorizontal()?"left":"top"]:null,e.preventDefault(),e.stopPropagation(),l.style.transitionDuration="100ms",i.style.transitionDuration="100ms",w(e),clearTimeout(b),r.style.transitionDuration="0ms",s.hide&&(r.style.opacity=1),a.params.cssMode&&(a.wrapperEl.style["scroll-snap-type"]="none"),o("scrollbarDragStart",e)}function C(e){const{scrollbar:s,wrapperEl:t}=a,{el:l,dragEl:r}=s;g&&(e.preventDefault&&e.cancelable?e.preventDefault():e.returnValue=!1,w(e),t.style.transitionDuration="0ms",l.style.transitionDuration="0ms",r.style.transitionDuration="0ms",o("scrollbarDragMove",e))}function x(e){const s=a.params.scrollbar,{scrollbar:t,wrapperEl:r}=a,{el:i}=t;g&&(g=!1,a.params.cssMode&&(a.wrapperEl.style["scroll-snap-type"]="",r.style.transitionDuration=""),s.hide&&(clearTimeout(b),b=(0,l.n)((()=>{i.style.opacity=0,i.style.transitionDuration="400ms"}),1e3)),o("scrollbarDragEnd",e),s.snapOnRelease&&a.slideToClosest())}function $(e){const{scrollbar:s,params:t}=a,l=s.el;if(!l)return;const r=l,i=!!t.passiveListeners&&{passive:!1,capture:!1},n=!!t.passiveListeners&&{passive:!0,capture:!1};if(!r)return;const o="on"===e?"addEventListener":"removeEventListener";r[o]("pointerdown",E,i),p[o]("pointermove",C,i),p[o]("pointerup",x,n)}function L(){const{scrollbar:e,el:s}=a;a.params.scrollbar=r(a,a.originalParams.scrollbar,a.params.scrollbar,{el:"swiper-scrollbar"});const t=a.params.scrollbar;if(!t.el)return;let i,o;if("string"==typeof t.el&&a.isElement&&(i=a.el.querySelector(t.el)),i||"string"!=typeof t.el)i||(i=t.el);else if(i=p.querySelectorAll(t.el),!i.length)return;a.params.uniqueNavElements&&"string"==typeof t.el&&i.length>1&&1===s.querySelectorAll(t.el).length&&(i=s.querySelector(t.el)),i.length>0&&(i=i[0]),i.classList.add(a.isHorizontal()?t.horizontalClass:t.verticalClass),i&&(o=i.querySelector(n(a.params.scrollbar.dragClass)),o||(o=(0,l.c)("div",a.params.scrollbar.dragClass),i.append(o))),Object.assign(e,{el:i,dragEl:o}),t.draggable&&a.params.scrollbar.el&&a.scrollbar.el&&$("on"),i&&i.classList[a.enabled?"remove":"add"](...(0,l.i)(a.params.scrollbar.lockClass))}function S(){const e=a.params.scrollbar,s=a.scrollbar.el;s&&s.classList.remove(...(0,l.i)(a.isHorizontal()?e.horizontalClass:e.verticalClass)),a.params.scrollbar.el&&a.scrollbar.el&&$("off")}s({scrollbar:{el:null,dragSize:"auto",hide:!1,draggable:!1,snapOnRelease:!0,lockClass:"swiper-scrollbar-lock",dragClass:"swiper-scrollbar-drag",scrollbarDisabledClass:"swiper-scrollbar-disabled",horizontalClass:"swiper-scrollbar-horizontal",verticalClass:"swiper-scrollbar-vertical"}}),a.scrollbar={el:null,dragEl:null},i("changeDirection",(()=>{if(!a.scrollbar||!a.scrollbar.el)return;const e=a.params.scrollbar;let{el:s}=a.scrollbar;s=(0,l.m)(s),s.forEach((s=>{s.classList.remove(e.horizontalClass,e.verticalClass),s.classList.add(a.isHorizontal()?e.horizontalClass:e.verticalClass)}))})),i("init",(()=>{!1===a.params.scrollbar.enabled?M():(L(),y(),h())})),i("update resize observerUpdate lock unlock changeDirection",(()=>{y()})),i("setTranslate",(()=>{h()})),i("setTransition",((e,s)=>{!function(e){a.params.scrollbar.el&&a.scrollbar.el&&(a.scrollbar.dragEl.style.transitionDuration=`${e}ms`)}(s)})),i("enable disable",(()=>{const{el:e}=a.scrollbar;e&&e.classList[a.enabled?"remove":"add"](...(0,l.i)(a.params.scrollbar.lockClass))})),i("destroy",(()=>{S()}));const M=()=>{a.el.classList.add(...(0,l.i)(a.params.scrollbar.scrollbarDisabledClass)),a.scrollbar.el&&a.scrollbar.el.classList.add(...(0,l.i)(a.params.scrollbar.scrollbarDisabledClass)),S()};Object.assign(a.scrollbar,{enable:()=>{a.el.classList.remove(...(0,l.i)(a.params.scrollbar.scrollbarDisabledClass)),a.scrollbar.el&&a.scrollbar.el.classList.remove(...(0,l.i)(a.params.scrollbar.scrollbarDisabledClass)),L(),y(),h()},disable:M,updateSize:y,setTranslate:h,init:L,destroy:S})}function c(e){let a,s,{swiper:l,extendParams:r,on:i,emit:n,params:o}=e;l.autoplay={running:!1,paused:!1,timeLeft:0},r({autoplay:{enabled:!1,delay:3e3,waitForTransition:!0,disableOnInteraction:!1,stopOnLastSlide:!1,reverseDirection:!1,pauseOnMouseEnter:!1}});let p,c,d,u,m,g,f,b,h=o&&o.autoplay?o.autoplay.delay:3e3,y=o&&o.autoplay?o.autoplay.delay:3e3,v=(new Date).getTime();function w(e){l&&!l.destroyed&&l.wrapperEl&&e.target===l.wrapperEl&&(l.wrapperEl.removeEventListener("transitionend",w),b||e.detail&&e.detail.bySwiperTouchMove||S())}const E=()=>{if(l.destroyed||!l.autoplay.running)return;l.autoplay.paused?c=!0:c&&(y=p,c=!1);const e=l.autoplay.paused?p:v+y-(new Date).getTime();l.autoplay.timeLeft=e,n("autoplayTimeLeft",e,e/h),s=requestAnimationFrame((()=>{E()}))},C=e=>{if(l.destroyed||!l.autoplay.running)return;cancelAnimationFrame(s),E();let t=void 0===e?l.params.autoplay.delay:e;h=l.params.autoplay.delay,y=l.params.autoplay.delay;const r=(()=>{let e;if(e=l.virtual&&l.params.virtual.enabled?l.slides.find((e=>e.classList.contains("swiper-slide-active"))):l.slides[l.activeIndex],e)return parseInt(e.getAttribute("data-swiper-autoplay"),10)})();!Number.isNaN(r)&&r>0&&void 0===e&&(t=r,h=r,y=r),p=t;const i=l.params.speed,o=()=>{l&&!l.destroyed&&(l.params.autoplay.reverseDirection?!l.isBeginning||l.params.loop||l.params.rewind?(l.slidePrev(i,!0,!0),n("autoplay")):l.params.autoplay.stopOnLastSlide||(l.slideTo(l.slides.length-1,i,!0,!0),n("autoplay")):!l.isEnd||l.params.loop||l.params.rewind?(l.slideNext(i,!0,!0),n("autoplay")):l.params.autoplay.stopOnLastSlide||(l.slideTo(0,i,!0,!0),n("autoplay")),l.params.cssMode&&(v=(new Date).getTime(),requestAnimationFrame((()=>{C()}))))};return t>0?(clearTimeout(a),a=setTimeout((()=>{o()}),t)):requestAnimationFrame((()=>{o()})),t},x=()=>{v=(new Date).getTime(),l.autoplay.running=!0,C(),n("autoplayStart")},$=()=>{l.autoplay.running=!1,clearTimeout(a),cancelAnimationFrame(s),n("autoplayStop")},L=(e,s)=>{if(l.destroyed||!l.autoplay.running)return;clearTimeout(a),e||(f=!0);const t=()=>{n("autoplayPause"),l.params.autoplay.waitForTransition?l.wrapperEl.addEventListener("transitionend",w):S()};if(l.autoplay.paused=!0,s)return g&&(p=l.params.autoplay.delay),g=!1,void t();const r=p||l.params.autoplay.delay;p=r-((new Date).getTime()-v),l.isEnd&&p<0&&!l.params.loop||(p<0&&(p=0),t())},S=()=>{l.isEnd&&p<0&&!l.params.loop||l.destroyed||!l.autoplay.running||(v=(new Date).getTime(),f?(f=!1,C(p)):C(),l.autoplay.paused=!1,n("autoplayResume"))},M=()=>{if(l.destroyed||!l.autoplay.running)return;const e=(0,t.g)();"hidden"===e.visibilityState&&(f=!0,L(!0)),"visible"===e.visibilityState&&S()},T=e=>{"mouse"===e.pointerType&&(f=!0,b=!0,l.animating||l.autoplay.paused||L(!0))},k=e=>{"mouse"===e.pointerType&&(b=!1,l.autoplay.paused&&S())};i("init",(()=>{l.params.autoplay.enabled&&(l.params.autoplay.pauseOnMouseEnter&&(l.el.addEventListener("pointerenter",T),l.el.addEventListener("pointerleave",k)),(0,t.g)().addEventListener("visibilitychange",M),x())})),i("destroy",(()=>{l.el&&"string"!=typeof l.el&&(l.el.removeEventListener("pointerenter",T),l.el.removeEventListener("pointerleave",k)),(0,t.g)().removeEventListener("visibilitychange",M),l.autoplay.running&&$()})),i("_freeModeStaticRelease",(()=>{(u||f)&&S()})),i("_freeModeNoMomentumRelease",(()=>{l.params.autoplay.disableOnInteraction?$():L(!0,!0)})),i("beforeTransitionStart",((e,a,s)=>{!l.destroyed&&l.autoplay.running&&(s||!l.params.autoplay.disableOnInteraction?L(!0,!0):$())})),i("sliderFirstMove",(()=>{!l.destroyed&&l.autoplay.running&&(l.params.autoplay.disableOnInteraction?$():(d=!0,u=!1,f=!1,m=setTimeout((()=>{f=!0,u=!0,L(!0)}),200)))})),i("touchEnd",(()=>{if(!l.destroyed&&l.autoplay.running&&d){if(clearTimeout(m),clearTimeout(a),l.params.autoplay.disableOnInteraction)return u=!1,void(d=!1);u&&l.params.cssMode&&S(),u=!1,d=!1}})),i("slideChange",(()=>{!l.destroyed&&l.autoplay.running&&(g=!0)})),Object.assign(l.autoplay,{start:x,stop:$,pause:L,resume:S})}function d(e){const{effect:a,swiper:s,on:t,setTranslate:l,setTransition:r,overwriteParams:i,perspective:n,recreateShadows:o,getEffectParams:p}=e;let c;t("beforeInit",(()=>{if(s.params.effect!==a)return;s.classNames.push(`${s.params.containerModifierClass}${a}`),n&&n()&&s.classNames.push(`${s.params.containerModifierClass}3d`);const e=i?i():{};Object.assign(s.params,e),Object.assign(s.originalParams,e)})),t("setTranslate",(()=>{s.params.effect===a&&l()})),t("setTransition",((e,t)=>{s.params.effect===a&&r(t)})),t("transitionEnd",(()=>{if(s.params.effect===a&&o){if(!p||!p().slideShadows)return;s.slides.forEach((e=>{e.querySelectorAll(".swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left").forEach((e=>e.remove()))})),o()}})),t("virtualUpdate",(()=>{s.params.effect===a&&(s.slides.length||(c=!0),requestAnimationFrame((()=>{c&&s.slides&&s.slides.length&&(l(),c=!1)})))}))}function u(e,a){const s=(0,l.g)(a);return s!==a&&(s.style.backfaceVisibility="hidden",s.style["-webkit-backface-visibility"]="hidden"),s}function m(e){let{swiper:a,extendParams:s,on:t}=e;s({fadeEffect:{crossFade:!1}}),d({effect:"fade",swiper:a,on:t,setTranslate:()=>{const{slides:e}=a;a.params.fadeEffect;for(let s=0;s<e.length;s+=1){const e=a.slides[s];let t=-e.swiperSlideOffset;a.params.virtualTranslate||(t-=a.translate);let l=0;a.isHorizontal()||(l=t,t=0);const r=a.params.fadeEffect.crossFade?Math.max(1-Math.abs(e.progress),0):1+Math.min(Math.max(e.progress,-1),0),i=u(0,e);i.style.opacity=r,i.style.transform=`translate3d(${t}px, ${l}px, 0px)`}},setTransition:e=>{const s=a.slides.map((e=>(0,l.g)(e)));s.forEach((a=>{a.style.transitionDuration=`${e}ms`})),function(e){let{swiper:a,duration:s,transformElements:t,allSlides:r}=e;const{activeIndex:i}=a;if(a.params.virtualTranslate&&0!==s){let e,s=!1;e=r?t:t.filter((e=>{const s=e.classList.contains("swiper-slide-transform")?(e=>e.parentElement?e.parentElement:a.slides.find((a=>a.shadowRoot&&a.shadowRoot===e.parentNode)))(e):e;return a.getSlideIndex(s)===i})),e.forEach((e=>{(0,l.k)(e,(()=>{if(s)return;if(!a||a.destroyed)return;s=!0,a.animating=!1;const e=new window.CustomEvent("transitionend",{bubbles:!0,cancelable:!0});a.wrapperEl.dispatchEvent(e)}))}))}}({swiper:a,duration:e,transformElements:s,allSlides:!0})},overwriteParams:()=>({slidesPerView:1,slidesPerGroup:1,watchSlidesProgress:!0,spaceBetween:0,virtualTranslate:!a.params.cssMode})})}function g(e){let{swiper:a,extendParams:s,on:t}=e;s({cubeEffect:{slideShadows:!0,shadow:!0,shadowOffset:20,shadowScale:.94}});const r=(e,a,s)=>{let t=s?e.querySelector(".swiper-slide-shadow-left"):e.querySelector(".swiper-slide-shadow-top"),r=s?e.querySelector(".swiper-slide-shadow-right"):e.querySelector(".swiper-slide-shadow-bottom");t||(t=(0,l.c)("div",("swiper-slide-shadow-cube swiper-slide-shadow-"+(s?"left":"top")).split(" ")),e.append(t)),r||(r=(0,l.c)("div",("swiper-slide-shadow-cube swiper-slide-shadow-"+(s?"right":"bottom")).split(" ")),e.append(r)),t&&(t.style.opacity=Math.max(-a,0)),r&&(r.style.opacity=Math.max(a,0))};d({effect:"cube",swiper:a,on:t,setTranslate:()=>{const{el:e,wrapperEl:s,slides:t,width:i,height:n,rtlTranslate:o,size:p,browser:c}=a,d=(0,l.o)(a),u=a.params.cubeEffect,m=a.isHorizontal(),g=a.virtual&&a.params.virtual.enabled;let f,b=0;u.shadow&&(m?(f=a.wrapperEl.querySelector(".swiper-cube-shadow"),f||(f=(0,l.c)("div","swiper-cube-shadow"),a.wrapperEl.append(f)),f.style.height=`${i}px`):(f=e.querySelector(".swiper-cube-shadow"),f||(f=(0,l.c)("div","swiper-cube-shadow"),e.append(f))));for(let e=0;e<t.length;e+=1){const a=t[e];let s=e;g&&(s=parseInt(a.getAttribute("data-swiper-slide-index"),10));let l=90*s,i=Math.floor(l/360);o&&(l=-l,i=Math.floor(-l/360));const n=Math.max(Math.min(a.progress,1),-1);let c=0,f=0,h=0;s%4==0?(c=4*-i*p,h=0):(s-1)%4==0?(c=0,h=4*-i*p):(s-2)%4==0?(c=p+4*i*p,h=p):(s-3)%4==0&&(c=-p,h=3*p+4*p*i),o&&(c=-c),m||(f=c,c=0);const y=`rotateX(${d(m?0:-l)}deg) rotateY(${d(m?l:0)}deg) translate3d(${c}px, ${f}px, ${h}px)`;n<=1&&n>-1&&(b=90*s+90*n,o&&(b=90*-s-90*n)),a.style.transform=y,u.slideShadows&&r(a,n,m)}if(s.style.transformOrigin=`50% 50% -${p/2}px`,s.style["-webkit-transform-origin"]=`50% 50% -${p/2}px`,u.shadow)if(m)f.style.transform=`translate3d(0px, ${i/2+u.shadowOffset}px, ${-i/2}px) rotateX(89.99deg) rotateZ(0deg) scale(${u.shadowScale})`;else{const e=Math.abs(b)-90*Math.floor(Math.abs(b)/90),a=1.5-(Math.sin(2*e*Math.PI/360)/2+Math.cos(2*e*Math.PI/360)/2),s=u.shadowScale,t=u.shadowScale/a,l=u.shadowOffset;f.style.transform=`scale3d(${s}, 1, ${t}) translate3d(0px, ${n/2+l}px, ${-n/2/t}px) rotateX(-89.99deg)`}const h=(c.isSafari||c.isWebView)&&c.needPerspectiveFix?-p/2:0;s.style.transform=`translate3d(0px,0,${h}px) rotateX(${d(a.isHorizontal()?0:b)}deg) rotateY(${d(a.isHorizontal()?-b:0)}deg)`,s.style.setProperty("--swiper-cube-translate-z",`${h}px`)},setTransition:e=>{const{el:s,slides:t}=a;if(t.forEach((a=>{a.style.transitionDuration=`${e}ms`,a.querySelectorAll(".swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left").forEach((a=>{a.style.transitionDuration=`${e}ms`}))})),a.params.cubeEffect.shadow&&!a.isHorizontal()){const a=s.querySelector(".swiper-cube-shadow");a&&(a.style.transitionDuration=`${e}ms`)}},recreateShadows:()=>{const e=a.isHorizontal();a.slides.forEach((a=>{const s=Math.max(Math.min(a.progress,1),-1);r(a,s,e)}))},getEffectParams:()=>a.params.cubeEffect,perspective:()=>!0,overwriteParams:()=>({slidesPerView:1,slidesPerGroup:1,watchSlidesProgress:!0,resistanceRatio:0,spaceBetween:0,centeredSlides:!1,virtualTranslate:!0})})}function f(e,a,s){const t=`swiper-slide-shadow${s?`-${s}`:""}${e?` swiper-slide-shadow-${e}`:""}`,r=(0,l.g)(a);let i=r.querySelector(`.${t.split(" ").join(".")}`);return i||(i=(0,l.c)("div",t.split(" ")),r.append(i)),i}function b(e){let{swiper:a,extendParams:s,on:t}=e;s({coverflowEffect:{rotate:50,stretch:0,depth:100,scale:1,modifier:1,slideShadows:!0}}),d({effect:"coverflow",swiper:a,on:t,setTranslate:()=>{const{width:e,height:s,slides:t,slidesSizesGrid:r}=a,i=a.params.coverflowEffect,n=a.isHorizontal(),o=a.translate,p=n?e/2-o:s/2-o,c=n?i.rotate:-i.rotate,d=i.depth,m=(0,l.o)(a);for(let e=0,a=t.length;e<a;e+=1){const a=t[e],s=r[e],l=(p-a.swiperSlideOffset-s/2)/s,o="function"==typeof i.modifier?i.modifier(l):l*i.modifier;let g=n?c*o:0,b=n?0:c*o,h=-d*Math.abs(o),y=i.stretch;"string"==typeof y&&-1!==y.indexOf("%")&&(y=parseFloat(i.stretch)/100*s);let v=n?0:y*o,w=n?y*o:0,E=1-(1-i.scale)*Math.abs(o);Math.abs(w)<.001&&(w=0),Math.abs(v)<.001&&(v=0),Math.abs(h)<.001&&(h=0),Math.abs(g)<.001&&(g=0),Math.abs(b)<.001&&(b=0),Math.abs(E)<.001&&(E=0);const C=`translate3d(${w}px,${v}px,${h}px)  rotateX(${m(b)}deg) rotateY(${m(g)}deg) scale(${E})`;if(u(0,a).style.transform=C,a.style.zIndex=1-Math.abs(Math.round(o)),i.slideShadows){let e=n?a.querySelector(".swiper-slide-shadow-left"):a.querySelector(".swiper-slide-shadow-top"),s=n?a.querySelector(".swiper-slide-shadow-right"):a.querySelector(".swiper-slide-shadow-bottom");e||(e=f("coverflow",a,n?"left":"top")),s||(s=f("coverflow",a,n?"right":"bottom")),e&&(e.style.opacity=o>0?o:0),s&&(s.style.opacity=-o>0?-o:0)}}},setTransition:e=>{a.slides.map((e=>(0,l.g)(e))).forEach((a=>{a.style.transitionDuration=`${e}ms`,a.querySelectorAll(".swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left").forEach((a=>{a.style.transitionDuration=`${e}ms`}))}))},perspective:()=>!0,overwriteParams:()=>({watchSlidesProgress:!0})})}}}]);