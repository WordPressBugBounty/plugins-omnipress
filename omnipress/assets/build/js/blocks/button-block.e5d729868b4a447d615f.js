"use strict";(globalThis.webpackChunkomnipress=globalThis.webpackChunkomnipress||[]).push([[959],{2806:(t,e,r)=>{r.r(e),r.d(e,{default:()=>E});var n=r(7723),o=r(42),i=r(4467),s=r(9446),a=r(4715),c=r(6942),l=r.n(c),u=r(790);function p(t,e){var r=Object.keys(t);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(t);e&&(n=n.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),r.push.apply(r,n)}return r}function b(t){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{};e%2?p(Object(r),!0).forEach((function(e){(0,i.A)(t,e,r[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(r)):p(Object(r)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(r,e))}))}return t}const d={attributes:{blockId:{type:"string",default:""},css:{type:"string"},productId:{type:"number"},buttonContentType:{type:"string",default:""},content:{type:"string",source:"html",selector:"span",default:"Primary Button"},rel:{type:"string",attribute:"rel",source:"attribute",selector:"a",default:"noopener"},dataTitle:{type:"string",attribute:"data-title",source:"attribute",selector:"a",default:"button"},dataType:{type:"string",attribute:"data-type",source:"attribute",selector:"a",default:"button"},dataId:{type:"string",attribute:"data-id",source:"attribute",selector:"a",default:"button"},type:{type:"string",attribute:"type",source:"attribute",selector:"a",default:"noopener"},newTab:{type:"string",attribute:"target",selector:"a",default:"_blank"},link:{type:"string",source:"attribute",selector:"a",attribute:"href"},wrapper:{type:"object",default:{}},button:{type:"object",default:{borderRadius:"5px",padding:"8px 32px"}},iconPosition:{type:"string"},icon:{type:"string",source:"attribute",attribute:"class",selector:"a i"},icons:{type:"object",default:{}}},save:function(t){var e=t.attributes,r=e.content,n=e.rel,o=e.newTab,c=e.icon,p=e.iconPosition,d=e.blockId,f=a.useBlockProps.save({className:"op-block-button__wrapper op-block-button-".concat(e.blockId," ")}),y={className:l()("op-block-button__link op-block__button-content",(0,i.A)({},"has-text-align-".concat(e.wrapper.textAlign),e.wrapper.textAlign)),href:e.link,target:o,rel:n,"data-title":e.dataTitle,"data-type":e.dataType,"data-id":e.dataId};return(0,u.jsxs)("div",b(b({},f),{},{children:[(0,u.jsxs)("style",{type:"text/css",children:[(0,s.A)(e.button,".op-block-button-".concat(d,".op-block-button__wrapper a.op-block-button__link")),(0,s.A)(e.wrapper,".op-block-button-".concat(d,".op-block-button__wrapper")),(0,s.A)(e.icons,".op-block-button-".concat(d," .op-block-button__link i"))]}),(0,u.jsxs)("a",b(b({},y),{},{children:[p&&c&&(0,u.jsx)("i",{className:c}),(0,u.jsx)(a.RichText.Content,{tagName:"span",value:null!=r?r:"Click Here"}),!p&&c&&(0,u.jsx)("i",{className:c})]}))]}))},migrate:function(t){return{iconClass:t.icon}}},f=JSON.parse('{"UU":"omnipress/button","h_":"Add buttons to redirect user to different webpages","M_":{"link":true},"t3":{"wrapper":{"group":"design","selector":"","label":"Button","fields":{"typography":true,"dimension":{"gap":true}}},"icons":{"group":"design","selector":"i","label":"Icon","fields":{"spacing":{"margin":true,"padding":true},"dimension":{"fontSize":true},"color":{"text":true,"background":true},"border":{"border":true,"borderRadius":true}}}},"uK":{"blockId":{"type":"string","default":""},"css":{"type":"string"},"productId":{"type":"number"},"buttonContentType":{"type":"string","default":""},"content":{"type":"string","source":"html","selector":".op-block__button-content > span","default":"Learn More"},"rel":{"type":"string","attribute":"rel","source":"attribute","selector":"a","default":"noopener norefferer"},"dataTitle":{"type":"string","attribute":"data-title","source":"attribute","selector":".op-block__button","default":"button"},"dataType":{"type":"string","attribute":"data-type","source":"attribute","selector":".op-block__button","default":"button"},"dataId":{"type":"string","attribute":"data-id","source":"attribute","selector":".op-block__button","default":"button"},"type":{"type":"string","attribute":"type","source":"attribute","selector":".op-block__button","default":"noopener"},"newTab":{"type":"string","attribute":"target","selector":"a","default":"_blank"},"link":{"type":"string","source":"attribute","selector":"a","attribute":"href"},"wrapper":{"type":"object","default":{"border":"unset","cursor":"pointer"}},"buttonAlign":{"type":"string","default":"left"},"button":{"type":"object","default":{}},"iconPosition":{"type":"string"},"icon":{"type":"string","source":"attribute","attribute":"class","selector":"i"},"icons":{"type":"object","default":{}}}}');var y=r(7881),g=r(882),x=r(6087),j=r(4182),m=r(2690),h=(r(4811),r(8209)),O=r(6427);const v=(0,x.memo)((function(t){var e,r=t.setAttributes,o=t.attributes,i=(t.context,t.clientId,(0,m.k)());return(0,g.I)("textAlign",i),(0,x.useCallback)((function(t){r({buttonAlign:t})}),[i,o.wrapper]),(0,u.jsx)(O.PanelBody,{initialOpen:!0,title:(0,n.__)("Content","omnipress"),children:(0,u.jsxs)("div",{className:"op-grid op-gap-3",children:[(0,u.jsx)("div",{className:"op-space-y-2",children:(0,u.jsx)(O.TextareaControl,{className:"op-w-full op-text-[12px]",label:(0,n.__)("Button Text","omnipress"),value:o.content,onChange:function(t){return r({content:t})}})}),(null===(e=o.post)||void 0===e?void 0:e.url)&&(0,u.jsx)(u.Fragment,{children:(0,u.jsxs)("div",{className:"op-space-y-2",children:[(0,u.jsx)(h.J,{className:"op-text-[12px]",children:(0,n.__)("Rel Attribute","omnipress")}),(0,u.jsx)(O.TextareaControl,{className:"op-w-full op-text-[12px]",value:o.rel,rows:3,onChange:function(t){r({rel:t.target.value})}})]})})]})})}));var k=r(3453),_=r(1612);const w=(0,x.memo)((function(t){var e=t.setAttributes,r=t.attributes,o=r.icon,i=r.iconPosition,s=(0,x.useState)(!0),a=(0,k.A)(s,2),c=a[0],l=a[1],p=(0,x.useCallback)((function(t){e({icon:t})}),[o]);return(0,u.jsx)("div",{className:"op-button__icon-settings-wrapper",children:(0,u.jsxs)(O.PanelBody,{title:(0,n.__)("Icons Settings","omnipress"),initialOpen:!1,children:[(0,u.jsx)(g.j,{children:(0,u.jsxs)("div",{className:"op-space-y-3",children:[(0,u.jsxs)("div",{className:"op-space-y-2",children:[(0,u.jsx)(h.J,{children:(0,n.__)("Icon Position","omnipress")}),(0,u.jsxs)(O.ButtonGroup,{className:"op-block-flex",children:[(0,u.jsx)(O.Button,{className:"fg-1",variant:"left"===i?"primary":"secondary",style:{textAlign:"center"},onClick:function(){return e({iconPosition:"left"})},children:(0,n.__)("Left","omnipress")}),(0,u.jsx)(O.Button,{style:{textAlign:"center"},className:"fg-1",variant:"left"!==i?"primary":"secondary",onClick:function(){return e({iconPosition:""})},children:(0,n.__)("right","omnipress")})]})]}),r.icon?(0,u.jsxs)("div",{children:[(0,u.jsx)(h.J,{className:"op-text-[12px]",children:(0,n.__)("Icon Position","omnipress")}),(0,u.jsxs)("div",{className:"op-block-flex",children:[(0,u.jsx)(O.Button,{variant:"secondary",className:"op-button__icon-wrapper fg-1",style:{textAlign:"center"},onClick:function(){return l((function(t){return!t}))},children:(0,u.jsx)("i",{style:{width:"100%"},className:r.icon})}),(0,u.jsx)(O.Button,{variant:"secondary",className:"op-button__icon-wrapper",style:{textAlign:"center",fontSize:"12px",padding:"8px"},onClick:function(){return e({icon:void 0})},children:(0,u.jsx)(_.qbC,{})})]})]}):(0,u.jsx)(O.Button,{variant:"secondary",className:"op-w-full op-border-dotted op-border-b-gray-300 op-px-[35%] op-py-4 op-text-center",onClick:function(){return l((function(t){return!t}))},children:(0,n.__)("Add Icon","omnipress")})]})}),(0,u.jsx)(g.I3,{activeIcon:r.icon,onClick:p,setIsClose:l,isClose:c})]})})}));function P(t){var e=t.attributes,r=t.setAttributes,n=t.clientId,o=t.context,i=(0,m.k)();return(0,u.jsxs)(j.G,{group:"general",clientId:n,children:[(0,u.jsx)(v,{attributes:e,setAttributes:r,displaySize:i,context:o}),(0,u.jsx)(w,{attributes:e,setAttributes:r})]})}function A(t,e){var r=Object.keys(t);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(t);e&&(n=n.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),r.push.apply(r,n)}return r}function N(t){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{};e%2?A(Object(r),!0).forEach((function(e){(0,i.A)(t,e,r[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(r)):A(Object(r)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(r,e))}))}return t}function I(t,e){var r=Object.keys(t);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(t);e&&(n=n.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),r.push.apply(r,n)}return r}function C(t){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{};e%2?I(Object(r),!0).forEach((function(e){(0,i.A)(t,e,r[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(r)):I(Object(r)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(r,e))}))}return t}var T=f.UU,S=f.h_,B=f.t3,D=f.M_;const E={name:T,title:(0,n.__)("Button","omnipress"),description:(0,n.__)(S,"omnipress"),example:{attributes:{wrapper:{padding:{top:"100px",right:"0",bottom:"100px",left:"0"},background:"#264653"},icon:"fas fa-fast-forward",button:{padding:{top:"8px",right:"72px",bottom:"8px",left:"72px"},background:"linear-gradient(317deg,rgb(73,160,157) 0%,rgb(95,44,130) 100%)",color:"#ffffff",Border:{topLeft:{radius:"122px"},topRight:{radius:"122px"},bottomLeft:{radius:"122px"},bottomRight:{radius:"122px"}},fontSize:"1.85rem"},icons:{margin:{left:"9px",top:""},padding:{top:""},fontSize:"22px"}}},attributes:f.uK,icon:o.x6,usesContext:["productId","product"],deprecated:[d],edit:function(t){var e=t.attributes,r=t.setAttributes,n=t.clientId,o=t.isSelected,i=t.context,s=t.children,c=e.content,p=e.rel,b=e.target,d=e.icon,f=e.iconPosition,g=(e.blockId,e.dataTitle),j=(e.buttonAlign,e.dataType,e.dataId),m=e.button,h=e.link;return(0,x.useEffect)((function(){e.className&&r({className:void 0}),Boolean(Object.keys(m||{}).length)&&r({wrapper:N(N({},e.wrapper),m),button:void 0})}),[]),(0,u.jsxs)(y.A,{className:l()("op-block__button  op-block__button-content wp-element-button",{"has-icon":d,"icon-left":"left"===f}),href:h,target:b,rel:p,"data-title":g,"data-id":j,onClick:function(t){return t.preventDefault()},tagName:h?"a":"button",attributes:e,setAttributes:r,isSelected:o,context:i,clientId:n,children:[(0,u.jsx)(a.RichText,{tagName:"span",value:c,allowedFormats:[],onChange:function(t){return r({content:t})}}),d&&(0,u.jsx)("i",{className:d}),s,o&&(0,u.jsx)(P,{isSelected:o,attributes:e,setAttributes:r,context:i,clientId:n})]})},save:function(t){var e,r,n,o=t.attributes,i=o.content,s=o.rel,c=void 0===s?"noreferrer noopener":s,p=o.icon,b=o.blockId,d=(o.buttonAlign,o.dataTitle),f=(o.dataType,o.dataId),y=(o.link,o.iconPosition),g=o.post,x=(o.newTab,{});null!==(e=o.post)&&void 0!==e&&e.url&&Object.assign(x,{href:null===(n=o.post)||void 0===n?void 0:n.url,target:g.opensInNewWindow?"_blank":"_self",rel:c});var j=a.useBlockProps.save(C({className:l()("op-block__button op-".concat(b," op-block__button-content wp-element-button"),{"has-icon":p,"icon-left":"left"===y}),"data-title":d,"data-type":"omnipress/button","data-id":f},x)),m=null!==(r=o.post)&&void 0!==r&&r.url?"a":"button";return(0,u.jsxs)(m,C(C({},j),{},{children:[(0,u.jsx)(a.RichText.Content,{tagName:"span",value:i}),p&&(0,u.jsx)("i",{className:p})]}))},opSettings:B,opSupports:D}},7881:(t,e,r)=>{r.d(e,{A:()=>g});var n=r(4467),o=r(3986),i=r(4715),s=r(2619),a=r(6087),c=r(6942),l=r.n(c),u=r(4987),p=r(7143),b=r(790),d=["className","isSelected","context","attributes","clientId","setAttributes","tagName","children"];function f(t,e){var r=Object.keys(t);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(t);e&&(n=n.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),r.push.apply(r,n)}return r}function y(t){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{};e%2?f(Object(r),!0).forEach((function(e){(0,n.A)(t,e,r[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(r)):f(Object(r)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(r,e))}))}return t}const g=function(t){var e,r,c=t.className,f=(t.isSelected,t.context,t.attributes),g=(t.clientId,t.setAttributes,t.tagName),x=t.children,j=(0,o.A)(t,d),m=(0,p.select)(u.n).getMouseState(),h=l()((0,n.A)((0,n.A)((0,n.A)((0,n.A)((0,n.A)({},"op-".concat(f.blockId),f.blockId),"is-layout-flex","flex"===(null===(e=f.layout)||void 0===e?void 0:e.display)),"is-layout-grid","grid"===(null===(r=f.layout)||void 0===r?void 0:r.display)),"is-layout-".concat(f.layoutType),!!f.layoutType),"hover-state","hover"===m)),O=(0,a.useRef)(null),v=(0,i.useBlockEditContext)().name,k=g||"div";return(0,b.jsx)(k,y(y(y({},(0,i.useBlockProps)(y({className:"".concat(c," ").concat(h),ref:O,"data-type":v},(0,s.applyFilters)("omnipress.edit.props.".concat(v.split("/")[1]),{})))),j),{},{children:x}))}}}]);