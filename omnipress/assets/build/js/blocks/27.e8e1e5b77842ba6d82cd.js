"use strict";(globalThis.webpackChunkomnipress=globalThis.webpackChunkomnipress||[]).push([[27],{1027:(e,t,o)=>{o.r(t),o.d(t,{default:()=>F});var r=o(4467),n=o(3986),i=o(42),s=o(9394),c=o(3453),a=o(6087),l=o(7723),p=o(6942),d=o.n(p),u=o(8562),m=o(4715),b=o(6427),g=o(7432),f=o(4182),h=o(6161),y=o(2425),j=o(283),x=o(9826),O=o(5178),v=o(9644),k=o(790);function w(e,t){var o=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);t&&(r=r.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),o.push.apply(o,r)}return o}function P(e){for(var t=1;t<arguments.length;t++){var o=null!=arguments[t]?arguments[t]:{};t%2?w(Object(o),!0).forEach((function(t){(0,r.A)(e,t,o[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(o)):w(Object(o)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(o,t))}))}return e}function N(e,t){var o=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);t&&(r=r.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),o.push.apply(o,r)}return o}function A(e){for(var t=1;t<arguments.length;t++){var o=null!=arguments[t]?arguments[t]:{};t%2?N(Object(o),!0).forEach((function(t){(0,r.A)(e,t,o[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(o)):N(Object(o)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(o,t))}))}return e}const C=JSON.parse('{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":3,"name":"omnipress/accordion","version":"1.0.0","title":"Accordion","category":"omnipress","icon":"","description":"Display your schema ready FAQs with Accordion block","example":{},"supports":{"anchor":true},"attributes":{"blockId":{"type":"string"},"lists":{"type":"array","default":[{"header":"FAQ item 1?","key":"Key 1","desc":"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."},{"header":"FAQ item 2?","key":"Key 2","desc":"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."}]},"disableInitialOpen":{"type":"boolean","default":true},"iconClass":{"type":"string","selector":"button i","default":"fas fa-angle-down","source":"attribute","attribute":"class"}},"opSettings":{"accordion":{"group":"design","selector":".accordion","label":"Accordion","fields":{"spacing":{"margin":true,"padding":true},"color":{"background":true},"dimension":{"height":true,"width":true},"border":{"border":true,"borderRadius":true}}},"title":{"group":"design","selector":".accordion .accordion-header","label":"Title","fields":{"spacing":{"padding":true},"color":{"text":true,"background":true},"typography":true,"border":{"border":true,"borderRadius":true}}},"titleActive":{"group":"design","selector":".accordion .accordion-header:has( + .accordion-body.active )","label":"Title Active","fields":{"spacing":{"padding":true},"color":{"background":true},"typography":true,"border":{"border":true,"borderRadius":true}}},"description":{"group":"design","selector":".accordion .accordion-body.active","label":"Description","fields":{"spacing":{"padding":true},"color":{"text":true},"typography":true,"dimension":{"marginBottom":true},"border":{"border":true,"borderRadius":true}}}},"textdomain":"omnipress"}');function S(e,t){var o=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);t&&(r=r.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),o.push.apply(o,r)}return o}function _(e){for(var t=1;t<arguments.length;t++){var o=null!=arguments[t]?arguments[t]:{};t%2?S(Object(o),!0).forEach((function(t){(0,r.A)(e,t,o[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(o)):S(Object(o)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(o,t))}))}return e}var D=C.name,I=C.description,q=C.opSettings,E=C.attributes;const F=_(_({},(0,n.A)(C,["name","description","opSettings","attributes"])),{},{name:D,attributes:E,edit:function(e){var t=e.attributes,o=e.setAttributes,n=e.clientId,i=e.children,p=t.blockId,w=(0,a.useRef)(null),N=function(e){null==e||e.stopPropagation(),e.target.nextElementSibling.classList.toggle("active")},A=(0,m.useBlockProps)({className:d()("op-block__accordion accordions",(0,r.A)({},"op-".concat(p),p)),"data-type":"omnipress/accordion"}),C=t.lists,S=(0,a.useState)(null),_=(0,c.A)(S,2),D=_[0],I=_[1],q=(0,a.useState)(null),E=(0,c.A)(q,2),F=E[0],T=E[1],R=(0,k.jsx)(f.G,{clientId:n,group:"general",children:(0,k.jsxs)(b.PanelBody,{title:(0,l.__)("General","omnipress"),children:[(0,k.jsx)(g.j,{isResponsive:!1,children:(0,k.jsxs)("div",{className:"op-grid op-gap-3",children:[t.lists&&t.lists.map((function(e,t){return(0,k.jsxs)(h.$,{variant:"outline",className:"!op-rounded-sm",children:["".concat(e.header.slice(0,21),"..."),(0,k.jsxs)("div",{className:"op-ml-auto op-flex op-gap-1",children:[(0,k.jsx)(v.pik,{className:"op-text-5 op-flex op-h-5 op-w-5 op-cursor-pointer op-items-center op-justify-center op-rounded-full op-p-1 hover:op-bg-slate-300 hover:op-text-primary",onClick:function(){T(e),I(t)}}),C.length>1&&(0,k.jsx)(x.tW_,{className:"op-text-5 op-flex op-h-5 op-w-5 op-cursor-pointer op-items-center op-justify-center op-rounded-full op-p-1 hover:op-bg-slate-300 hover:op-text-primary",onClick:function(){var t=C.filter((function(t){return t.key!==e.key}));o({lists:t})}}),(0,k.jsx)(O.$G0,{className:"op-text-5 op-flex op-h-5 op-w-5 op-cursor-pointer op-items-center op-justify-center op-rounded-full op-p-1 hover:op-bg-slate-300 hover:op-text-primary",onClick:function(){var t=[].concat((0,s.A)(C),[P(P({},e),{},{key:(0,u.A)()})]);o({lists:t})}})]})]})})),null!==D&&(0,k.jsx)(b.Popover,{onClose:function(){return I(null)},placement:"left",children:(0,k.jsxs)("div",{className:"op-grid op-min-w-[300px] op-gap-4 op-p-4",children:[(0,k.jsxs)("div",{className:"op-grid op-grid-cols-4 op-items-center op-gap-4",children:[(0,k.jsx)(j.J,{htmlFor:"title",className:"text-right",children:(0,l.__)("Title","omnipress")}),(0,k.jsx)(y.p,{id:"title",defaultValue:"Accordion Title",value:F.header,className:"op-col-span-3",onChange:function(e){T(P(P({},F),{},{header:e.target.value}))}})]}),(0,k.jsxs)("div",{className:"op-grid op-grid-cols-4 op-items-center op-gap-4",children:[(0,k.jsx)(j.J,{htmlFor:"desc",className:"op-text-right",children:(0,l.__)("Content","omnipress")}),(0,k.jsx)(y.p,{id:"desc",defaultValue:"Accordion desc",value:F.desc,className:"op-col-span-3",onChange:function(e){T(P(P({},F),{},{desc:e.target.value}))}})]}),(0,k.jsx)(h.$,{type:"button",onClick:function(){var e=[].concat((0,s.A)(C.slice(0,D)),[F],(0,s.A)(C.slice(D+1)));o({lists:(0,s.A)(e)}),I(null),T(null)},children:"Save changes"})]})})]})}),(0,k.jsxs)(g.j,{children:[(0,k.jsx)("p",{className:"op-mb-2",style:{fontSize:"13px",fontWeight:"600"},children:(0,l.__)("Select Icon","omnipress")}),(0,k.jsx)("div",{className:"op-block-setting__icons op-flex op-items-center op-justify-start op-gap-3",children:["fas fa-angle-down","fas fa-caret-down","far fa-square-caret-down","fas fa-circle-down"].map((function(e){return(0,k.jsx)("i",{className:" ".concat(e," ").concat(e===t.iconClass?"op-bg-primary !op-text-card op-ring-1 op-ring-primary":""," op-flex op-h-6 op-w-6 op-cursor-pointer op-items-center op-justify-center op-rounded-sm op-text-card-foreground op-ring-1 op-ring-border"),onClick:function(){return o({iconClass:e})}},e)}))})]}),(0,k.jsx)(g.j,{title:"Open First Accordion Item",children:(0,k.jsx)(g.T_,{checked:!t.disableInitialOpen,label:"Open First Accordion",onChange:function(){o({disableInitialOpen:!t.disableInitialOpen})}})})]})});return(0,k.jsxs)("div",P(P({},A),{},{children:[i,t.lists.map((function(e,o){var r;return(0,k.jsxs)("div",{ref:w,className:"accordion",children:[(0,k.jsxs)("button",{onClick:N,type:"button",className:"accordion-header",children:[(0,k.jsx)("span",{children:e.header}),(0,k.jsx)("i",{className:null!==(r=t.iconClass)&&void 0!==r?r:"fas fa-angle-up"})]}),(0,k.jsx)("div",{className:"accordion-body ".concat(t.disableInitialOpen||0!=o?"":"active"),children:(0,k.jsx)("p",{children:e.desc})})]},e.key)})),R]}))},icon:i.JC,description:I,save:function(e){var t=e.attributes,o=t.blockId,n=m.useBlockProps.save({className:d()("op-block__accordion accordions",(0,r.A)({},"op-".concat(o),o)),"data-type":"omnipress/accordion"});return(0,k.jsx)("div",A(A({},n),{},{children:t.lists.map((function(e,r){var n;return(0,k.jsxs)("section",{className:"accordion",children:[(0,k.jsxs)("h3",{"aria-controls":"accordion-".concat(o,"-").concat(e.key),className:"accordion-header",children:[(0,k.jsx)("span",{children:e.header}),(0,k.jsx)("i",{className:null!==(n=t.iconClass)&&void 0!==n?n:"fas fa-angle-up"})]}),(0,k.jsx)("div",{id:"accordion-".concat(o,"-").concat(e.key),"aria-expanded":!t.disableInitialOpen&&0===r,className:"accordion-body ".concat(t.disableInitialOpen||0!==r?"":"active"),children:(0,k.jsx)("p",{children:e.desc})})]},e.key)}))}))},keywords:["accordion","faqs"],category:"omnipress",opSettings:q})}}]);