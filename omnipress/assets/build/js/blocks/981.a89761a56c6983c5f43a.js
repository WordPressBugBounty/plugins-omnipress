"use strict";(globalThis.webpackChunkomnipress=globalThis.webpackChunkomnipress||[]).push([[981],{9981:(e,t,o)=>{o.r(t),o.d(t,{default:()=>L});var r=o(4467),n=o(42),i=o(7723);const a=JSON.parse('{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":2,"name":"omnipress/slider","version":"1.0.0","title":"Slider","category":"omnipress","icon":"","description":"Create a captivating visual experience & impress your audience","supports":{"html":false,"className":true,"dimensions":{"minHeight":false,"html":false},"interactivity":true},"providesContext":{"omnipress/parentId":"blockId","classNames":"classNames"},"opSettings":{"navigation":{"group":"design","selector":"[class^=\'swiper-button\']","label":"Navigation","fields":{"spacing":{"margin":true,"padding":true},"color":{"text":true,"background":true},"dimension":{"width":true,"fontSize":true},"border":{"border":true,"borderRadius":true}}},"pagination":{"group":"design","selector":".swiper-pagination-bullet","label":"Pagination","fields":{"spacing":{"margin":true,"padding":true},"color":{"background":true},"dimension":{"width":true},"border":{"border":true,"borderRadius":true}}},"paginationActive":{"group":"design","selector":".swiper-pagination-bullet-active","label":"Pagination Active","fields":{"color":{"background":true},"border":{"border":true,"borderRadius":true}}},"scrollbar":{"group":"design","selector":".swiper-scrollbar","label":"Scrollbar","fields":{"spacing":{"margin":true,"padding":true},"color":{"text":true,"background":true},"dimension":{"width":true,"fontSize":true},"border":{"border":true,"borderRadius":true}}},"scrollbarActive":{"group":"design","selector":"swiper-scrollbar-drag","label":"Scrollbar Active","fields":{"color":{"background":true},"border":{"border":true,"borderRadius":true}}}},"attributes":{"slideToggleOptions":{"type":"object","default":{"fade":false,"loop":true,"autoplay":true}},"sliderType":{"type":"string"},"classNames":{"type":"string","default":"swiper-slide"},"showNavigation":{"type":"boolean","default":true},"showPagination":{"type":"string","default":"true"},"showProgress":{"type":"string","default":"true"},"showScrollbar":{"type":"string","default":"true"},"loop":{"type":"string","default":"false"},"autoplay":{"type":"string","default":"false"},"paginationType":{"type":"string","default":"bullets"},"effect":{"type":"string","default":"slide"},"speed":{"type":"number","default":1000},"autoplayDelay":{"type":"number","default":2000},"autoplayDisableOnInteraction":{"type":"boolean","default":true},"autoplayStopOnLast":{"type":"string","default":"true"},"slidePerView":{"type":"number","default":1},"smSlidePerView":{"type":"number","default":1},"mdSlidePerView":{"type":"number","default":1},"spaceBetween":{"type":"number","default":20},"smSpaceBetween":{"type":"number","default":20},"mdSpaceBetween":{"type":"number","default":20},"blockId":{"type":"string","default":""},"arrowIconNext":{"type":"string","default":"fas fa-angle-right"},"arrowIconPrev":{"type":"string","default":"fas fa-angle-left"},"navigation":{"type":"object","default":{}},"pagination":{"type":"object","default":{}},"scrollbar":{"type":"object","default":{}},"paginationActive":{"type":"object","default":{"background":"#9b51e0"}},"scrollbarActive":{"type":"object","default":{}},"sliderWrapper":{"type":"object","default":{}}},"textdomain":"omnipress","viewScript":["omnipress-slider-script"],"style":["omnipress-slider-style"]}');var s=o(3986),l=o(9394),c=o(4715),u=o(4997),p=o(6427),d=o(7143),g=o(6087),b=o(1236),f=o(4889),m=o(1296),h=o(3453),v=o(9016),w=o(4182),y=o(2900),x=o(283),j=o(790);function _(e){var t=e.attributes,o=e.setAttributes,r=(e.isSelected,e.clientId);return(0,j.jsx)(P,{clientId:r,attributes:t,setAttributes:o})}function P(e){var t=e.attributes,o=e.setAttributes,n=e.clientId,a=(0,g.useState)("next"),s=(0,h.A)(a,2),l=s[0],c=s[1],u=(0,y.k)(),d=function(e,t){var o=(0,g.useState)(!0),n=(0,h.A)(o,2);return{isCloseIconLib:n[0],setIsCloseIconLib:n[1],iconUploader:(0,g.useCallback)((function(o){t((0,r.A)({},"next"===e?"arrowIconNext":"arrowIconPrev",o))}),[e])}}(l,o),b=d.iconUploader,f=d.isCloseIconLib,m=d.setIsCloseIconLib;return(0,j.jsxs)(w.G,{clientId:n,group:"general",children:[(0,j.jsx)(p.PanelBody,{initialOpen:!0,title:(0,i.__)("General","omnipress"),children:(0,j.jsxs)(v.j,{children:[(0,j.jsx)(p.RangeControl,{label:(0,i.__)("slide Per View","omnipress"),value:t[(0,v.I)("slidePerView",u)],onChange:function(e){return o((0,r.A)({},(0,v.I)("slidePerView",u),e))},min:1,max:6}),(0,j.jsx)(p.RangeControl,{label:(0,i.__)("Space Between","omnipress"),value:t[(0,v.I)("spaceBetween",u)],onChange:function(e){return o((0,r.A)({},(0,v.I)("spaceBetween",u),e))},min:0,max:100}),(0,j.jsx)(p.RangeControl,{label:(0,i.__)("Speed","omnipress"),min:100,max:2e4,initiaPosition:1e3,value:t.speed,onChange:function(e){o({speed:e})}})]})}),(0,j.jsxs)(p.PanelBody,{initialOpen:!1,title:(0,i.__)("Navigation","omnipress"),children:[(0,j.jsxs)(v.j,{children:[(0,j.jsx)(p.ToggleControl,{label:(0,i.__)("Navigation","omnipress"),checked:t.showNavigation,onChange:function(){return o({showNavigation:!t.showNavigation})},help:(0,i.__)("Toggle Navigation: Enable or disable navigation arrows for easy sliding through content","omnipress"),className:"op-advanced-setting__toggle-control",id:"op-advanced-setting__toggle-control",value:t.showNavigation,disabled:!1,labelPosition:"left"}),t.showNavigation&&(0,j.jsxs)(j.Fragment,{children:[(0,j.jsxs)(p.Flex,{children:[(0,j.jsx)(x.J,{className:"op-grow",children:(0,i.__)("Prev Button","omnipress")}),(0,j.jsx)(x.J,{className:"op-grow",children:(0,i.__)("Next Button","omnipress")})]}),(0,j.jsxs)(p.Flex,{children:[(0,j.jsx)(p.Button,{className:"op-slider__prev op-grow op-text-center op-text-20",variant:"secondary",onClick:function(){c("prev"),m(!1)},children:(0,j.jsx)("i",{className:t.arrowIconPrev,style:{width:"100%"}})}),(0,j.jsx)(p.Button,{className:"op-slider__next op-grow op-text-center op-text-20",variant:"secondary",onClick:function(){c("next"),m(!1)},children:(0,j.jsx)("i",{className:t.arrowIconNext,style:{width:"100%"}})})]})]}),(0,j.jsx)(v.fN,{attributes:t,setAttributes:o,min:0,label:"Arrow Size",max:100,attributeObj:"navigation",propertyName:"fontSize"})]}),!f&&(0,j.jsx)(v.I3,{activeIcon:t.arrowIconNext,onClick:b,setIsClose:m,isClose:f})]}),(0,j.jsx)(p.PanelBody,{initialOpen:!1,title:(0,i.__)("Pagination And Scrollbar","omnipress"),children:(0,j.jsxs)(v.j,{children:[(0,j.jsx)(p.ToggleControl,{label:(0,i.__)("Scrollbar","omnipress"),checked:"true"===t.showScrollbar,onChange:function(){o({showScrollbar:"true"===t.showScrollbar?"false":"true"})},help:(0,i.__)("Enable Scrollbar: Show or hide the scrollbar for easy navigation.","omnipress"),labelPosition:"left"}),(0,j.jsx)(p.ToggleControl,{label:(0,i.__)("Pagination","omnipress"),checked:"true"===t.showPagination,onChange:function(){return o({showPagination:"true"===t.showPagination?"false":"true"})},help:(0,i.__)("Toggle Pagination: Show or hide pagination bullets for quick navigation between slides.","omnipress"),labelPosition:"left"}),"true"===t.showPagination&&(0,j.jsx)(p.SelectControl,{label:(0,i.__)("Pagination Type","omnipress"),options:[{label:"Bullets",value:"bullets"},{label:"Dots",value:"dots"},{label:"Progressbar",value:"progressbar"},{label:"Fraction",value:"fraction"}],value:t.paginationType,onChange:function(e){return o({paginationType:e})}})]})}),(0,j.jsx)(p.PanelBody,{initialOpen:!1,title:(0,i.__)("Autoplay/Loop/Effect","omnipress"),children:(0,j.jsxs)(v.j,{children:[(0,j.jsx)(p.ToggleControl,{label:(0,i.__)("Loop","omnipress"),checked:"true"===t.loop,onChange:function(){return o({loop:"true"===t.loop?"false":"true"})},help:(0,i.__)("Toggle Loop: Enable or disable the looping of slides for continuous scrolling","omnipress"),className:"op-advanced-setting__toggle-control",id:"op-advanced-setting__toggle-control",value:t.loop,disabled:!1,labelPosition:"left"}),(0,j.jsx)(p.ToggleControl,{label:(0,i.__)("Autoplay","omnipress"),checked:"true"===t.autoplay,onChange:function(){return o({autoplay:"true"===t.autoplay?"false":"true"})},help:(0,i.__)("Toggle Autoplay: Activate or deactivate automatic slideshow for hands-free viewing.","omnipress"),className:"op-advanced-setting__toggle-control",id:"op-advanced-setting__toggle-control",value:t.autoplay,disabled:!1,labelPosition:"left"}),"true"===t.autoplay&&(0,j.jsx)(j.Fragment,{children:(0,j.jsx)(p.RangeControl,{label:(0,i.__)("Autoplay Delay","omnipress"),min:0,max:2e4,initiaPosition:2e3,value:t.autoplayDelay,onChange:function(e){o({autoplayDelay:e})}})}),(0,j.jsx)(p.SelectControl,{value:t.effect,label:(0,i.__)("Effect Type","omnipress"),options:[{label:(0,i.__)("Slide","omnipress"),value:"slide"},{label:(0,i.__)("Coverflow","omnipress"),value:"coverflow"},{label:"Fade",value:"fade"},{label:(0,i.__)("Cube","omnipress"),value:"cube"}],onChange:function(e){return o({effect:e})}})]})})]})}var I=["clientId","nextIcon","prevIcon","blockId","showPagination","showNavigation","paginationType","showScrollbar","children"];function k(e,t){var o=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);t&&(r=r.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),o.push.apply(o,r)}return o}function S(e){for(var t=1;t<arguments.length;t++){var o=null!=arguments[t]?arguments[t]:{};t%2?k(Object(o),!0).forEach((function(t){(0,r.A)(e,t,o[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(o)):k(Object(o)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(o,t))}))}return e}var N={},C={},O=[["omnipress/container",{variationType:"slide",preview:!1,flex:{flexDirection:"column",alignItems:"center"}},[["omnipress/icon-box"]]],["omnipress/container",{variationType:"slide",preview:!1,flex:{flexDirection:"column",alignItems:"center"}},[["omnipress/icon-box"]]]],B=["omnipress/slide","omnipress/container"],A=function(e){var t=e.clientId,o=e.nextIcon,r=void 0===o?"arrow-right-alt2":o,n=e.prevIcon,i=void 0===n?"arrow-left-alt2":n,a=e.blockId,l=void 0===a?"":a,u=e.showPagination,p=void 0===u?"false":u,d=e.showNavigation,f=void 0===d||d,h=e.paginationType,v=void 0===h?"bullets":h,w=e.showScrollbar,y=void 0===w?"true":w,x=e.children,_=(0,s.A)(e,I),P=(0,g.useRef)(null),k=(0,g.useRef)(null),O=(0,g.useRef)(null),B=(0,g.useRef)(null),A=(0,g.useRef)(null);(0,g.useEffect)((function(){if(P.current)return Object.assign(_,{pagination:"true"===p?{clickable:!0,el:k.current,type:v}:"",navigation:!!f&&{prevEl:B.current,nextEl:O.current},scrollbar:"true"===y&&{el:A.current},initialSlide:C[t]||0,on:{slideChange:function(){C[t]=this.realIndex},init:function(){N[t]=this}},simulateTouch:!0}),new b.A(P.current,_),function(){N[t]&&N[t].destroy(!1,!0)}}),[_,p,f,v,y]);var T=(0,m.ue)(t),D=(0,g.useMemo)((function(){var e;return 1!=T.length?{className:"swiper-wrapper"}:{className:"swiper-wrapper op-".concat(null!==(e=T[0].attributes.blockId)&&void 0!==e?e:T[0].clientId.substring(0,8)),"data-type":T[0].name}}),[T.length]);return(0,j.jsxs)("div",{ref:P,className:"swiper",children:[(0,j.jsx)("div",S(S({},D),{},{children:(0,j.jsx)(c.BlockContextProvider,{value:{classNames:"swiper-slide"},children:x})})),f&&(0,j.jsxs)(j.Fragment,{children:[(0,j.jsx)("button",{ref:O,className:"swiper-button-".concat(l," swiper-button-next"),children:(0,j.jsx)("i",{className:r})}),(0,j.jsx)("button",{ref:B,className:"swiper-button-".concat(l," swiper-button-prev"),children:(0,j.jsx)("i",{className:i})})]}),"true"===p&&(0,j.jsx)("div",{ref:k,className:"swiper-pagination"}),"true"===y&&(0,j.jsx)("div",{ref:A,className:"swiper-scrollbar"})]})};function T(e,t){var o=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);t&&(r=r.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),o.push.apply(o,r)}return o}function D(e){for(var t=1;t<arguments.length;t++){var o=null!=arguments[t]?arguments[t]:{};t%2?T(Object(o),!0).forEach((function(t){(0,r.A)(e,t,o[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(o)):T(Object(o)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(o,t))}))}return e}var R=a.name,V=a.title,E=a.description;const L=D(D({name:R,edit:function(e){var t=e.attributes,o=e.setAttributes,r=e.clientId,n=e.isSelected,a=e.children,s=t.blockId,b=t.arrowIconNext,m=t.arrowIconPrev,h=t.mdSlidePerView,v=t.smSlidePerView,w=t.mdSpaceBetween,y=t.slidePerView,x=t.spaceBetween,P=t.smSpaceBetween,I=t.autoplay,k=t.autoplayDelay,T=t.speed,D=t.loop,R=t.showNavigation,V=t.showScrollbar,E=t.paginationType,L=t.effect,F=void 0===L?"slide":L,z=t.showPagination,J=(0,d.useDispatch)("core/block-editor").replaceInnerBlocks,G=(0,d.useSelect)((function(e){var t=e("core/block-editor");if(t){var o=t.getBlocks(r);if(o&&o.length){var n=t.getSelectedBlockClientId(),i=o.findIndex((function(e){return e.clientId===n}));-1<i&&C&&C[r]!==i&&N[r]&&N[r].slideTo(i)}return{innerBlocks:o}}}),[]).innerBlocks,M=(0,g.useMemo)((function(){var e=[f.Vx,f.dK,f.Ze,f.Ij];switch(F){case"cube":e=[].concat((0,l.A)(e),[f.hw]);break;case"coverflow":e=[].concat((0,l.A)(e),[f.t9]);break;case"fade":e=[].concat((0,l.A)(e),[f._R])}return{modules:e,slidesPerView:v||y||1,spaceBetween:P||x||20,speed:T,grabCursor:!0,autoplay:"true"===I&&{delay:k||500,disableOnInteraction:!0},loop:"true"===D,breakpoints:{680:{slidesPerView:h,spaceBetween:w||20},1024:{slidesPerView:y,spaceBetween:x||30}},effect:F}}),[y,x,w,P,h,v,V,E,F,I,k,D,T]),U=(0,c.useBlockProps)({className:"op-block__slider op-".concat(s),"data-type":"omnipress/slider",onClick:function(e){e.stopPropagation(),e.target.classList.contains("op-container-innerblocks-wrapper")&&wp.data.dispatch("core/block-editor").selectBlock(r)}}),q=(0,c.useInnerBlocksProps)({},{allowedBlocks:B,templateLock:!1,template:O}).children;return(0,j.jsxs)("div",S(S({},U),{},{children:[a,(0,j.jsx)(c.BlockControls,{group:"other",children:!t.sliderType&&(0,j.jsx)(p.Tooltip,{placement:"top",delay:200,text:(0,i.__)("Add Slide","omnipress"),children:(0,j.jsx)(p.ToolbarButton,{onClick:function(){var e=[(0,u.createBlock)("omnipress/container",{variationType:"slide",preview:!1})];J(r,[].concat((0,l.A)(G),e))},children:(0,j.jsx)("i",{className:"fas fa-plus"})})})}),(0,j.jsx)(A,S(S({clientId:r,showNavigation:R,nextIcon:b,prevIcon:m,showPagination:z,showScrollbar:V},M),{},{children:q})),(0,j.jsx)(_,{clientId:r,attributes:t,setAttributes:o,isSelected:n})]}))},save:function(){return(0,j.jsx)(c.InnerBlocks.Content,{})}},a),{},{title:(0,i.__)(V,"omnipress"),description:(0,i.__)(E,"omnipress"),icon:n.aw})}}]);