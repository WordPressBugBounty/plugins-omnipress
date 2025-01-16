"use strict";(globalThis.webpackChunkomnipress=globalThis.webpackChunkomnipress||[]).push([[563],{4563:(t,e,r)=>{r.r(e),r.d(e,{default:()=>w});var o=r(4467),n=r(42),s=r(7723);const i=JSON.parse('{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":2,"name":"omnipress/dualbutton","version":"1.0.0","title":"Dual Buttons","category":"omnipress","icon":"","description":"Design a dual button together with unique features and capabilities for each button","supports":{"anchor":true},"opSettings":{"wrapper":{"group":"design","selector":"","label":"Wrapper","fields":{}}},"attributes":{"blockId":{"type":"string"},"wrapper":{"type":"object","default":{"justifyContent":"center"}}},"textdomain":"omnipress"}');var p=r(9016),c=r(4182),a=r(4715),u=r(6427),b=r(790);function l(t,e){var r=Object.keys(t);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(t);e&&(o=o.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),r.push.apply(r,o)}return r}function d(t){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{};e%2?l(Object(r),!0).forEach((function(e){(0,o.A)(t,e,r[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(r)):l(Object(r)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(r,e))}))}return t}var f=["omnipress/button","omnipress/icon"],O=[["omnipress/button"],["omnipress/icon",{wrapper:{fontSize:"20px",padding:"1px 7px",backgroundColor:"#fff",borderRadius:"50%"}}],["omnipress/button"]];function g(t,e){var r=Object.keys(t);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(t);e&&(o=o.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),r.push.apply(r,o)}return r}function j(t){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{};e%2?g(Object(r),!0).forEach((function(e){(0,o.A)(t,e,r[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(r)):g(Object(r)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(r,e))}))}return t}function h(t,e){var r=Object.keys(t);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(t);e&&(o=o.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),r.push.apply(r,o)}return r}function y(t){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{};e%2?h(Object(r),!0).forEach((function(e){(0,o.A)(t,e,r[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(r)):h(Object(r)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(r,e))}))}return t}var m=i.description;const w=y(y({example:{attributes:{buttonOneContent:"Button One",buttonTwoContent:"Button Two",buttonOne:{padding:{right:"56px",left:"64px"},backgroundColor:"linear-gradient(135deg,rgb(202,248,128) 0%,rgb(113,206,126) 100%)",background:"#349d8f",Border:{topRight:{radius:"0px"},bottomRight:{radius:"0px"},topLeft:{radius:"22px"},bottomLeft:{radius:"022px"}}},currentButton:"buttonOne",buttonTwo:{padding:{top:"",right:"56px",left:"54px"},background:"#e76f51",Border:{topLeft:{radius:"px"},topRight:{radius:"22px"},bottomLeft:{radius:"0px"},bottomRight:{radius:"22px"}}},wrapper:{padding:{top:"80px",bottom:"80px"},background:"#264653"},content:{seperator:!0,seperatorType:"text",text:"OR",seperatorWidth:"",width:"",backgroundColor:"",color:"",fontSize:""}}},description:(0,s.__)(m,"omnipress"),edit:function(t){var e=t.attributes,r=t.setAttributes,o=t.clientId,n=(t.isSelected,t.children),i=e.blockId,l=(0,a.useInnerBlocksProps)({},{allowedBlocks:f,template:O,templateLock:"all"}).children;return(0,b.jsxs)("div",d(d({},(0,a.useBlockProps)({className:"op-".concat(i," op-block__dual-buttons"),"data-type":"omnipress/dual-button"})),{},{children:[n,(0,b.jsxs)("div",{className:"dual-button__wrapper",children:[l,(0,b.jsx)(c.G,{group:"general",clientId:o,children:(0,b.jsx)(u.PanelBody,{title:(0,s.__)("General","omnipress"),children:(0,b.jsx)(p.j,{children:(0,b.jsx)(p.Jt,{vertical:!1,attributes:e,setAttributes:r,attributeName:"wrapper"})})})})]})]}))},save:function(t){var e=t.attributes.blockId;return(0,b.jsx)("div",j(j({},a.useBlockProps.save({className:"op-block op-".concat(e," op-block__dual-buttons"),"data-type":"omnipress/dualbutton"})),{},{children:(0,b.jsx)("div",{className:"dual-button__wrapper",children:(0,b.jsx)(a.InnerBlocks.Content,{})})}))}},i),{},{icon:n.Ff})}}]);