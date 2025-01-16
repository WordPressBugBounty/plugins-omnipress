"use strict";(globalThis.webpackChunkomnipress=globalThis.webpackChunkomnipress||[]).push([[737],{2737:(t,e,r)=>{r.r(e),r.d(e,{default:()=>q});var n=r(7723),o=r(42),a=r(4467),i=r(4122),s=r(4715),c=r(6942),l=r.n(c),u=r(790);function p(t,e){var r=Object.keys(t);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(t);e&&(n=n.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),r.push.apply(r,n)}return r}function b(t){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{};e%2?p(Object(r),!0).forEach((function(e){(0,a.A)(t,e,r[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(r)):p(Object(r)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(r,e))}))}return t}const d={attributes:{blockId:{type:"string",default:""},css:{type:"string"},productId:{type:"number"},buttonContentType:{type:"string",default:""},content:{type:"string",source:"html",selector:"span",default:"Primary Button"},rel:{type:"string",attribute:"rel",source:"attribute",selector:"a",default:"noopener"},dataTitle:{type:"string",attribute:"data-title",source:"attribute",selector:"a",default:"button"},dataType:{type:"string",attribute:"data-type",source:"attribute",selector:"a",default:"button"},dataId:{type:"string",attribute:"data-id",source:"attribute",selector:"a",default:"button"},type:{type:"string",attribute:"type",source:"attribute",selector:"a",default:"noopener"},newTab:{type:"string",attribute:"target",selector:"a",default:"_blank"},link:{type:"string",source:"attribute",selector:"a",attribute:"href"},wrapper:{type:"object",default:{}},button:{type:"object",default:{borderRadius:"5px",padding:"8px 32px"}},iconPosition:{type:"string"},icon:{type:"string",source:"attribute",attribute:"class",selector:"a i"},icons:{type:"object",default:{}}},save:function(t){var e=t.attributes,r=e.content,n=e.rel,o=e.newTab,c=e.icon,p=e.iconPosition,d=e.blockId,f=s.useBlockProps.save({className:"op-block-button__wrapper op-block-button-".concat(e.blockId," ")}),g={className:l()("op-block-button__link op-block__button-content",(0,a.A)({},"has-text-align-".concat(e.wrapper.textAlign),e.wrapper.textAlign)),href:e.link,target:o,rel:n,"data-title":e.dataTitle,"data-type":e.dataType,"data-id":e.dataId};return(0,u.jsxs)("div",b(b({},f),{},{children:[(0,u.jsxs)("style",{type:"text/css",children:[(0,i.A)(e.button,".op-block-button-".concat(d,".op-block-button__wrapper a.op-block-button__link")),(0,i.A)(e.wrapper,".op-block-button-".concat(d,".op-block-button__wrapper")),(0,i.A)(e.icons,".op-block-button-".concat(d," .op-block-button__link i"))]}),(0,u.jsxs)("a",b(b({},g),{},{children:[p&&c&&(0,u.jsx)("i",{className:c}),(0,u.jsx)(s.RichText.Content,{tagName:"span",value:null!=r?r:"Click Here"}),!p&&c&&(0,u.jsx)("i",{className:c})]}))]}))},migrate:function(t){return{iconClass:t.icon}}},f=JSON.parse('{"UU":"omnipress/button","h_":"Add buttons to redirect user to different webpages","M_":{"link":true},"t3":{"wrapper":{"group":"design","selector":"","label":"Button","fields":{"typography":true,"dimension":{"gap":true}}},"icons":{"group":"design","selector":"i","label":"Icon","fields":{"spacing":{"margin":true,"padding":true},"dimension":{"fontSize":true},"color":{"text":true,"background":true},"border":{"border":true,"borderRadius":true}}}},"uK":{"blockId":{"type":"string","default":""},"css":{"type":"string"},"productId":{"type":"number"},"buttonContentType":{"type":"string","default":""},"content":{"type":"string","source":"html","selector":".op-block__button-content > span","default":"Learn More"},"rel":{"type":"string","attribute":"rel","source":"attribute","selector":"a","default":"noopener norefferer"},"dataTitle":{"type":"string","attribute":"data-title","source":"attribute","selector":".op-block__button","default":"button"},"dataType":{"type":"string","attribute":"data-type","source":"attribute","selector":".op-block__button","default":"button"},"dataId":{"type":"string","attribute":"data-id","source":"attribute","selector":".op-block__button","default":"button"},"type":{"type":"string","attribute":"type","source":"attribute","selector":".op-block__button","default":"noopener"},"newTab":{"type":"string","attribute":"target","selector":"a","default":"_blank"},"link":{"type":"string","source":"attribute","selector":"a","attribute":"href"},"wrapper":{"type":"object","default":{"border":"unset","cursor":"pointer"}},"buttonAlign":{"type":"string","default":"left"},"button":{"type":"object","default":{}},"iconPosition":{"type":"string"},"icon":{"type":"string","source":"attribute","attribute":"class","selector":"i"},"icons":{"type":"object","default":{}}}}');var g=r(3453),y=r(3986),m=r(2619),x=r(6087),j=r(1182),h=r(2900),v=r(1296),O=r(7887),k=r(8468);function w(t,e){var r=Object.keys(t);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(t);e&&(n=n.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),r.push.apply(r,n)}return r}function _(t){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{};e%2?w(Object(r),!0).forEach((function(e){(0,a.A)(t,e,r[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(r)):w(Object(r)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(r,e))}))}return t}const P=function(t){var e=t.isHovered,r=(0,O.MX)(),n=r.attributes,o=r.setAttributes,i=(n.wrapper||{}).margin,s=void 0===i?{top:"0",right:"0",bottom:"0",left:"0"}:i,c=(0,h.k)(),l=function(t){var e=(0,O.MX)(),r=(e.attributes,e.setAttributes),n=((0,h.k)(),(0,x.useState)(null)),o=(0,g.A)(n,2),a=o[0],i=o[1],s=(0,x.useState)(null),c=(0,g.A)(s,2),l=c[0],u=c[1],p=(0,x.useState)(0),b=(0,g.A)(p,2),d=b[0],f=b[1],y=function(){(0,v.YE)(),i(null),u(null)},m=(0,x.useCallback)((0,k.debounce)((function(e){if(a&&l){var r="right"===l?e.x-a.x:a.x-e.x,n="bottom"===l?e.y-a.y:a.y-e.y,o=["top","bottom"].includes(l)?n+parseInt(t[l]||"0",10):r+parseInt(t[l]||"0",10);f(Math.round(o/2))}}),10),[a,l,t,r]);return(0,x.useEffect)((function(){var t=(0,v.YE)();return l&&(t.addEventListener("mousemove",m),t.addEventListener("mouseup",y)),function(){t.removeEventListener("mousemove",m),t.removeEventListener("mouseup",y)}}),[l,m]),{startAdjustment:function(t,e){(0,v.YE)(),i({x:e.clientX,y:e.clientY}),u(t)},value:d,activeSide:l}}(s),p=(l.startAdjustment,l.value),b=l.activeSide;return(0,x.useEffect)((function(){if(b){var t=setTimeout((function(){o({wrapper:_(_({},n.wrapper),{},(0,a.A)({},(0,j.A)("margin",c),_(_({},n.wrapper[(0,j.A)("margin",c)]),{},(0,a.A)({},b,"".concat(Math.round(p),"px")))))})}),300);return function(){t&&clearTimeout(t)}}}),[p]),(e||b)&&(0,u.jsx)("div",{className:"op-block-spacing__controllers",children:b&&(0,u.jsxs)("span",{className:"visual-value",children:[p,"PX"]})})};var A=["className","isSelected","context","attributes","clientId","setAttributes","tagName","children"];function N(t,e){var r=Object.keys(t);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(t);e&&(n=n.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),r.push.apply(r,n)}return r}function I(t){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{};e%2?N(Object(r),!0).forEach((function(e){(0,a.A)(t,e,r[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(r)):N(Object(r)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(r,e))}))}return t}function S(t,e){(null==e||e>t.length)&&(e=t.length);for(var r=0,n=Array(e);r<e;r++)n[r]=t[r];return n}function C(t){if(isNaN(parseInt(t)))return"0";var e=t.match(/^(-?\d+(\.\d+)?)([a-z%]+)$/i),r=e?e[3]:"px",n=e?Math.max(0,parseFloat(e[1])):0;return"".concat(n).concat(r)}const T=function(t){var e,r,n=t.className,o=(t.isSelected,t.context,t.attributes),i=(t.clientId,t.setAttributes,t.tagName),c=t.children,p=(0,y.A)(t,A),b=l()((0,a.A)((0,a.A)((0,a.A)({},"op-".concat(o.blockId),o.blockId),"has-flex-layout","flex"===(null===(e=o.layout)||void 0===e?void 0:e.display)),"has-grid-layout","grid"===(null===(r=o.layout)||void 0===r?void 0:r.display))),d=(0,x.useRef)(null),f=(0,x.useState)(!1),v=(0,g.A)(f,2),O=v[0],k=v[1],w=(0,s.useBlockEditContext)().name;(0,h.P1)(d,(function(t){var e,r=function(t,e){var r="undefined"!=typeof Symbol&&t[Symbol.iterator]||t["@@iterator"];if(!r){if(Array.isArray(t)||(r=function(t,e){if(t){if("string"==typeof t)return S(t,e);var r={}.toString.call(t).slice(8,-1);return"Object"===r&&t.constructor&&(r=t.constructor.name),"Map"===r||"Set"===r?Array.from(t):"Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r)?S(t,e):void 0}}(t))||e&&t&&"number"==typeof t.length){r&&(t=r);var _n=0,n=function(){};return{s:n,n:function(){return _n>=t.length?{done:!0}:{done:!1,value:t[_n++]}},e:function(t){throw t},f:n}}throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}var o,a=!0,i=!1;return{s:function(){r=r.call(t)},n:function(){var t=r.next();return a=t.done,t},e:function(t){i=!0,o=t},f:function(){try{a||null==r.return||r.return()}finally{if(i)throw o}}}}(t);try{for(r.s();!(e=r.n()).done;){var n=e.value;if("attributes"===n.type&&"class"===n.attributeName){var o=n.target;k(o.classList.contains("is-hovered"))}}}catch(t){r.e(t)}finally{r.f()}}),{attributes:!0});var _=i||"div",N=(0,h.k)(),T=(0,x.useMemo)((function(){return{margin:o.wrapper[(0,j.A)("margin",N)]||{},padding:o.wrapper[(0,j.A)("padding",N)]||{}}}),[o.wrapper]),E=T.margin,D=T.padding;return(0,u.jsxs)(_,I(I({},(0,s.useBlockProps)(I(I({className:"".concat(n," ").concat(b),ref:d,"data-type":w},p),(0,m.applyFilters)("omnipress.edit.props.".concat(w.split("/")[1]),{})))),{},{children:[c,O&&(0,u.jsxs)(u.Fragment,{children:[(0,u.jsx)("div",{style:{top:E.top?"calc( -1 * ".concat(E.top):"0",left:E.left?"calc( -1 * ".concat(E.left):"0",borderTopWidth:C(E.top),borderRightWidth:C(E.right),borderBottomWidth:C(E.bottom),borderLeftWidth:C(E.left),borderColor:"var(--op-clr-margin)",borderStyle:"solid"},className:"block-visual-guide margin"}),(0,u.jsx)(P,{isHovered:O}),(0,u.jsx)("div",{style:{borderTopWidth:C(D.top||""),borderRightWidth:C(D.right||""),borderBottomWidth:C(D.bottom||""),borderLeftWidth:C(D.left||""),borderColor:"var(--op-clr-padding)",borderStyle:"solid"},className:"block-visual-guide padding"})]})]}))};var E=r(9016),D=r(4182),B=r(2425),L=r(283),R=r(6427);const M=(0,x.memo)((function(t){var e,r=t.setAttributes,o=t.attributes,a=(t.context,t.clientId,(0,h.k)());return(0,E.I)("textAlign",a),(0,x.useCallback)((function(t){r({buttonAlign:t})}),[a,o.wrapper]),(0,u.jsx)(R.PanelBody,{initialOpen:!0,title:(0,n.__)("Content","omnipress"),children:(0,u.jsx)(E.j,{children:(0,u.jsxs)("div",{className:"op-grid op-gap-3",children:[(0,u.jsx)("div",{className:"op-space-y-2",children:(0,u.jsx)(R.TextareaControl,{className:"op-w-full op-text-[12px]",label:(0,n.__)("Button Text","omnipress"),value:o.content,onChange:function(t){return r({content:t})}})}),(null===(e=o.link)||void 0===e?void 0:e.length)>0&&(0,u.jsxs)(u.Fragment,{children:[(0,u.jsxs)("div",{className:"op-space-y-2",children:[(0,u.jsx)(L.J,{className:"op-text-[12px]",children:(0,n.__)("Link","omnipress")}),(0,u.jsx)(B.p,{className:"op-w-full op-text-[12px]",value:o.link,onChange:function(t){return r({link:t.target.value})}})]}),(0,u.jsxs)("div",{className:"op-space-y-2",children:[(0,u.jsx)(L.J,{className:"op-text-[12px]",children:(0,n.__)("Rel","omnipress")}),(0,u.jsx)(B.p,{className:"op-w-full op-text-[12px]",value:o.rel,onChange:function(t){return r({rel:t.target.value})}})]}),(0,u.jsxs)("div",{className:"op-flex op-items-center op-justify-between",children:[(0,u.jsx)(L.J,{className:"op-text-[12px]",children:(0,n.__)("Open in new tab","omnipress")}),(0,u.jsx)(R.ToggleControl,{checked:"_blank"===o.newTab,onChange:function(){return r({newTab:"_blank"===o.newTab?"_self":"_blank"})}})]})]})]})})})}));var W=r(1612);const z=(0,x.memo)((function(t){var e=t.setAttributes,r=t.attributes,o=r.icon,a=r.iconPosition,i=(0,x.useState)(!0),s=(0,g.A)(i,2),c=s[0],l=s[1],p=(0,x.useCallback)((function(t){e({icon:t})}),[o]);return(0,u.jsx)("div",{className:"op-button__icon-settings-wrapper",children:(0,u.jsxs)(R.PanelBody,{title:(0,n.__)("Icons Settings","omnipress"),initialOpen:!1,children:[(0,u.jsx)(E.j,{children:(0,u.jsxs)("div",{className:"op-space-y-3",children:[(0,u.jsxs)("div",{className:"op-space-y-2",children:[(0,u.jsx)(L.J,{children:(0,n.__)("Icon Position","omnipress")}),(0,u.jsxs)(R.ButtonGroup,{className:"op-block-flex",children:[(0,u.jsx)(R.Button,{className:"fg-1",variant:"left"===a?"primary":"secondary",style:{textAlign:"center"},onClick:function(){return e({iconPosition:"left"})},children:(0,n.__)("Left","omnipress")}),(0,u.jsx)(R.Button,{style:{textAlign:"center"},className:"fg-1",variant:"left"!==a?"primary":"secondary",onClick:function(){return e({iconPosition:""})},children:(0,n.__)("right","omnipress")})]})]}),r.icon?(0,u.jsxs)("div",{children:[(0,u.jsx)(L.J,{className:"op-text-[12px]",children:(0,n.__)("Icon Position","omnipress")}),(0,u.jsxs)("div",{className:"op-block-flex",children:[(0,u.jsx)(R.Button,{variant:"secondary",className:"op-button__icon-wrapper fg-1",style:{textAlign:"center"},onClick:function(){return l((function(t){return!t}))},children:(0,u.jsx)("i",{style:{width:"100%"},className:r.icon})}),(0,u.jsx)(R.Button,{variant:"secondary",className:"op-button__icon-wrapper",style:{textAlign:"center",fontSize:"12px",padding:"8px"},onClick:function(){return e({icon:void 0})},children:(0,u.jsx)(W.qbC,{})})]})]}):(0,u.jsx)(R.Button,{variant:"secondary",className:"op-w-full op-border-dotted op-border-b-gray-300 op-px-[35%] op-py-4 op-text-center",onClick:function(){return l((function(t){return!t}))},children:(0,n.__)("Add Icon","omnipress")})]})}),(0,u.jsx)(E.I3,{activeIcon:r.icon,onClick:p,setIsClose:l,isClose:c})]})})}));function J(t){var e=t.attributes,r=t.setAttributes,n=t.clientId,o=t.context,a=(0,h.k)();return(0,u.jsxs)(D.G,{group:"general",clientId:n,children:[(0,u.jsx)(M,{attributes:e,setAttributes:r,displaySize:a,context:o}),(0,u.jsx)(z,{attributes:e,setAttributes:r})]})}function F(t,e){var r=Object.keys(t);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(t);e&&(n=n.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),r.push.apply(r,n)}return r}function U(t){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{};e%2?F(Object(r),!0).forEach((function(e){(0,a.A)(t,e,r[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(r)):F(Object(r)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(r,e))}))}return t}function X(t,e){var r=Object.keys(t);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(t);e&&(n=n.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),r.push.apply(r,n)}return r}function Y(t){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{};e%2?X(Object(r),!0).forEach((function(e){(0,a.A)(t,e,r[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(r)):X(Object(r)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(r,e))}))}return t}var H=f.UU,$=f.h_,G=f.t3,K=f.M_;const q={name:H,title:(0,n.__)("Button","omnipress"),description:(0,n.__)($,"omnipress"),example:{attributes:{wrapper:{padding:{top:"100px",right:"0",bottom:"100px",left:"0"},background:"#264653"},icon:"fas fa-fast-forward",button:{padding:{top:"8px",right:"72px",bottom:"8px",left:"72px"},background:"linear-gradient(317deg,rgb(73,160,157) 0%,rgb(95,44,130) 100%)",color:"#ffffff",Border:{topLeft:{radius:"122px"},topRight:{radius:"122px"},bottomLeft:{radius:"122px"},bottomRight:{radius:"122px"}},fontSize:"1.85rem"},icons:{margin:{left:"9px",top:""},padding:{top:""},fontSize:"22px"}}},attributes:f.uK,icon:o.x6,usesContext:["productId","product"],deprecated:[d],edit:function(t){var e=t.attributes,r=t.setAttributes,n=t.clientId,o=t.isSelected,a=t.context,i=t.children,c=e.content,p=e.rel,b=e.target,d=e.icon,f=e.iconPosition,g=e.blockId,y=e.dataTitle,m=(e.buttonAlign,e.dataType),j=e.dataId,h=e.button,v=e.link;return(0,x.useEffect)((function(){e.className&&r({className:void 0}),Boolean(Object.keys(h||{}).length)&&r({wrapper:U(U({},e.wrapper),h),button:void 0})}),[]),(0,u.jsxs)(T,{className:l()("op-block__button  op-block__button-content wp-element-button",{"has-icon":d,"icon-left":"left"===f}),href:v,target:b,rel:p,"data-title":y,"data-type":m,"data-id":j,onClick:function(t){return t.preventDefault()},tagName:v?"a":"button",attributes:e,setAttributes:r,isSelected:o,context:a,clientId:n,children:[(0,u.jsx)(E.u4,{attributes:e.wrapper,className:".op-block__button.op-".concat(g,".wp-block")}),(0,u.jsx)(E.u4,{attributes:e.button,className:".op-block__button.op-${blockId}.wp-block"}),(0,u.jsx)(s.RichText,{tagName:"span",value:c,allowedFormats:[],onChange:function(t){return r({content:t})}}),d&&(0,u.jsx)("i",{className:d}),i,o&&(0,u.jsx)(J,{isSelected:o,attributes:e,setAttributes:r,context:a,clientId:n})]})},save:function(t){var e=t.attributes,r=e.content,n=e.rel,o=void 0===n?"noreferrer noopener":n,a=e.icon,i=e.blockId,c=(e.buttonAlign,e.dataTitle),p=(e.dataType,e.dataId),b=e.link,d=e.iconPosition,f=e.newTab,g=void 0===f?"_self":f,y={};b&&Object.assign(y,{href:b,target:g,rel:o});var m=s.useBlockProps.save(Y({className:l()("op-block__button op-".concat(i," op-block__button-content wp-element-button"),{"has-icon":a,"icon-left":"left"===d}),"data-title":c,"data-type":"omnipress/button","data-id":p},y)),x=b?"a":"button";return(0,u.jsxs)(x,Y(Y({},m),{},{children:[(0,u.jsx)(s.RichText.Content,{tagName:"span",value:r}),a&&(0,u.jsx)("i",{className:a})]}))},opSettings:G,opSupports:K}}}]);