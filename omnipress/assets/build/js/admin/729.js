"use strict";(globalThis.webpackChunkomnipress=globalThis.webpackChunkomnipress||[]).push([[729],{729:(o,e,r)=>{r.r(e),r.d(e,{default:()=>O});var t=r(4467),p=r(467),s=r(296),n=r(9280),a=r.n(n),i=r(6293),l=r(6454),c=r(7358),d=r(2159),u=r(1455),m=r.n(u),x=r(6087),h=r(7723),b=r(4263),f=r(6710),g=r(1612),y=r(9644),v=r(9584),j=r(4976),w=r(790);function k(o,e){var r=Object.keys(o);if(Object.getOwnPropertySymbols){var t=Object.getOwnPropertySymbols(o);e&&(t=t.filter((function(e){return Object.getOwnPropertyDescriptor(o,e).enumerable}))),r.push.apply(r,t)}return r}function N(o){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{};e%2?k(Object(r),!0).forEach((function(e){(0,t.A)(o,e,r[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(o,Object.getOwnPropertyDescriptors(r)):k(Object(r)).forEach((function(e){Object.defineProperty(o,e,Object.getOwnPropertyDescriptor(r,e))}))}return o}function O(){var o=(0,x.useState)({sync:!1,loading:!0}),e=(0,s.A)(o,2),r=e[0],t=e[1],n=(0,x.useState)({}),u=(0,s.A)(n,2),k=u[0],O=u[1],A=(0,x.useState)([]),P=(0,s.A)(A,2),S=P[0],C=P[1],D=(0,x.useState)(!0),F=(0,s.A)(D,2),E=F[0],z=F[1],L=(0,x.useState)(!1),T=(0,s.A)(L,2),q=T[0],J=T[1],K=function(){var o=(0,p.A)(a().mark((function o(e,p){var s;return a().wrap((function(o){for(;;)switch(o.prev=o.next){case 0:return o.next=2,m()({path:e?"/omnipress/v1/demos?sync=true":p?"/omnipress/v1/demos?filter=".concat(p):"/omnipress/v1/demos"});case 2:return s=o.sent,O(s),C((null==s?void 0:s.demos)||[]),t(N(N({},r),e?{sync:!1}:{loading:!1})),o.abrupt("return",s);case 7:case"end":return o.stop()}}),o)})));return function(_x,e){return o.apply(this,arguments)}}();return(0,x.useEffect)((function(){t(N(N({},r),{loading:!0})),m()({path:"/omnipress/v1/demos"}).then((function(o){O(o),C((null==o?void 0:o.demos)||[]),t(N(N({},r),{loading:!1}))}))}),[]),(0,w.jsxs)("div",{className:"op-flex op-items-start",children:[(0,w.jsx)(l.A,{total:null==k?void 0:k.total,openFilter:E,setOpenFilter:z,categories:null==k?void 0:k.categories,onClick:function(o){J(!1),K(!1,(null==o?void 0:o.key)||null)}}),(0,w.jsxs)("div",{className:"demo-content-wrap op-h-full op-flex-1 op-bg-white dark:op-bg-gray-800",children:[(0,w.jsxs)("div",{className:"demos-content-header op-flex op-h-[60px] op-flex-wrap op-items-center op-justify-between op-border-b op-border-b-border op-px-6",children:[(0,w.jsx)("div",{className:"op-relative",children:(0,w.jsxs)("div",{className:"op-flex op-items-center op-gap-xxsmall",children:[!1===E?(0,w.jsx)(i.A,{text:(0,h.__)("Filter by categories","omnipress"),position:"top",children:(0,w.jsx)("button",{type:"button",onClick:function(){return z(!E)},className:"op-flex op-h-8 op-w-8 op-items-center op-justify-center op-rounded-md op-bg-primary hover:op-bg-primary/80",children:(0,w.jsx)(g.YsJ,{className:"op-text-white"})})}):(0,w.jsx)(i.A,{text:(0,h.__)("Close filter","omnipress"),position:"top",children:(0,w.jsx)("button",{type:"button",onClick:function(){return z(!E)},className:"op-flex op-h-8 op-w-8 op-items-center op-justify-center op-rounded-md op-bg-primary/10 op-text-black op-duration-200 hover:op-text-primary dark:op-bg-gray-900 dark:op-text-light-text dark:hover:op-bg-primary",children:(0,w.jsx)(b.nXt,{className:"op-h-5 op-w-6"})})}),(0,w.jsx)(i.A,{text:r.sync?(0,h.__)("Syncing","omnipress"):(0,h.__)("Sync library","omnipress"),position:"top",children:(0,w.jsx)("button",{type:"button",disabled:!!r.sync,onClick:function(){J(!1),t(N(N({},r),{sync:!0})),K(!0)},className:"op-flex op-h-8 op-w-8 op-items-center op-justify-center op-rounded-md op-bg-primary/10 op-text-black op-duration-200 hover:op-text-primary dark:op-bg-gray-900 dark:op-text-light-text dark:hover:op-bg-primary",children:(0,w.jsx)(b.Qh9,{className:r.sync?"op-h-5 op-w-5 op-animate-spin":"op-h-5 op-w-5"})})}),(0,w.jsx)("div",{className:"pattern-count-wrap",children:(0,w.jsx)("h2",{className:"op-font-poppins op-text-18 op-font-semibold dark:op-text-light-text",children:q?(0,h.__)("Favorites","omnipress"):(0,h.__)("Demos","omnipress")})})]})}),(0,w.jsx)("div",{className:"my-favorite-btn-wrap",children:(0,w.jsxs)("button",{type:"button",className:"op-flex op-items-center op-gap-[5px] op-rounded-[5px] op-bg-primary/10 op-px-xxsmall op-py-[5px] op-duration-200 hover:op-text-primary dark:op-bg-gray-900 dark:op-text-light-text dark:hover:op-bg-primary",onClick:function(){K().then((function(o){var e=q?o.demos:Object.values(o.favorites);C(e||[]),J(!q)}))},children:[q?(0,w.jsx)(f.u8u,{size:18}):(0,w.jsx)(y.OGi,{size:18}),(0,w.jsx)("span",{className:"op-font-poppins op-font-normal",children:q?(0,h.__)("View Demos","omnipress"):(0,h.__)("My Favorites","omnipress")})]})})]}),(0,w.jsx)("div",{className:"op-relative op-h-[calc(100vh-36vh)] op-overflow-hidden op-overflow-y-auto op-p-6 op-scrollbar-thin op-scrollbar-track-gray-300 op-scrollbar-thumb-gray-500 op-scrollbar-track-rounded-full op-scrollbar-thumb-rounded-full",children:(0,w.jsx)("div",{className:"demos-grid-wrap op-grid op-grid-cols-1 op-gap-y-medium md:op-grid-cols-3 lg:op-grid-cols-3",children:(0,w.jsx)(d.q,{className:"op-mx-6",isLoading:r.loading||r.sync,height:"20em",width:"10px",children:S.length?S.map((function(o){var e;return(0,w.jsxs)("div",{className:"demos-item-wrap op-group op-relative op-flex op-flex-col op-flex-wrap op-items-center op-justify-center op-gap-xsmall op-overflow-hidden",children:[(0,w.jsx)(j.N_,{to:"".concat(o.key),className:"demos-item-frame op-group op-relative op-flex op-w-full op-justify-center focus:op-ring-0",children:o.pages.map((function(o,e){if(e>2)return null;var r="";switch(e){case 1:r="op-w-[280px] op-h-[350px] op-rounded-[5px] op-m-0 op-p-0 op-overflow-hidden op-absolute op-top-xsmall op-left-xlarge group-hover:op-left-small op-opacity-50 group-hover:op-opacity-100 op-z-20 op-shadow-xl op-shadow-primary/20 op-rotate-0  op-duration-500";break;case 2:r="op-w-[280px] op-h-[350px] op-rounded-[5px] op-m-0 op-p-0 op-overflow-hidden op-absolute op-top-xsmall op-right-xlarge group-hover:op-right-small op-opacity-50 group-hover:op-opacity-100 op-z-10 op-shadow-xl op-shadow-primary/20 op-rotate-0  op-duration-500";break;default:r="op-w-[320px] op-h-[400px] op-rounded-[5px] op-m-0 op-p-0 op-overflow-hidden op-z-30 op-shadow-xl op-shadow-primary/20 op-rotate-0 group-hover:op-w-[260px] op-duration-500"}return(0,w.jsx)("div",{className:r,children:(0,w.jsx)(c.A,{gradient:o.gradient,src:o.thumbnails.low,className:"op-width-auto op-object-cover"})},o.key)}))}),(0,w.jsx)("div",{className:"demo-action-wrap op-flex op-items-center op-justify-center",children:(0,w.jsx)(j.N_,{to:"/op-app/demos/".concat(o.key),className:"op-font-poppins op-text-16 op-font-semibold op-text-gray-600 hover:op-text-primary dark:op-text-light-text",children:o.title})}),(0,w.jsxs)("div",{className:"op-absolute op-bottom-0 op-z-50 op-flex op-gap-xxsmall op-rounded-full op-bg-primary op-px-xsmall op-py-[8px] op-opacity-0 op-duration-500 group-hover:op-bottom-[28px] group-hover:op-opacity-100",children:["pro"===(null==o?void 0:o.type)&&(0,w.jsx)(i.A,{text:(0,h.__)("Premium","omnipress"),children:(0,w.jsx)("button",{type:"button",children:(0,w.jsx)(v._cd,{className:"op-h-5 op-w-5 op-text-card"})})}),(0,w.jsx)(_,{isFavorite:!(null==k||null===(e=k.favorites)||void 0===e||!e[o.key]),demoKey:o.key})]})]},o.key)})):(0,w.jsxs)("div",{className:"op-flex op-items-center op-justify-start op-gap-4",children:[(0,w.jsx)("h2",{className:"op-font-poppins op-text-18 op-font-semibold dark:op-text-light-text",children:(0,h.__)("No items found","omnipress")}),(0,w.jsxs)("button",{type:"button",disabled:!!r.sync,onClick:function(){J(!1),t(N(N({},r),{sync:!0})),K(!0)},className:"op-flex op-h-8 op-items-center op-justify-center op-rounded-md op-bg-primary op-px-5 op-text-white op-duration-200 hover:op-bg-primary/10 hover:op-text-black dark:op-bg-gray-900 dark:op-text-light-text dark:hover:op-bg-primary",children:[(0,h.__)("Sync Now","omnipress"),(0,w.jsx)(b.Qh9,{className:r.sync?"op-h-5 op-w-5 op-animate-spin":"op-h-5 op-w-5"})]})]})})})})]})]})}function _(o){var e=o.isFavorite,r=o.demoKey,t=(0,x.useState)(e||!1),p=(0,s.A)(t,2),n=p[0],a=p[1];return(0,w.jsx)(i.A,{text:n?(0,h.__)("Remove from favorites","omnipress"):(0,h.__)("Add to favorites","omnipress"),position:"right",children:(0,w.jsx)("button",{type:"button",onClick:function(){a(!n),m()({method:n?"DELETE":"POST",path:"/omnipress/v1/demos/favorites",data:{key:r}})},children:n?(0,w.jsx)(b.Sxb,{className:"op-h-5 op-w-5 op-text-red-500"}):(0,w.jsx)(b.DTR,{className:"op-h-5 op-w-5 op-text-card"})})})}},6454:(o,e,r)=>{r.d(e,{A:()=>u});var t=r(4467),p=r(296),s=r(6293),n=r(6087),a=r(7723),i=r(1612),l=r(790);function c(o,e){var r=Object.keys(o);if(Object.getOwnPropertySymbols){var t=Object.getOwnPropertySymbols(o);e&&(t=t.filter((function(e){return Object.getOwnPropertyDescriptor(o,e).enumerable}))),r.push.apply(r,t)}return r}function d(o){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{};e%2?c(Object(r),!0).forEach((function(e){(0,t.A)(o,e,r[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(o,Object.getOwnPropertyDescriptors(r)):c(Object(r)).forEach((function(e){Object.defineProperty(o,e,Object.getOwnPropertyDescriptor(r,e))}))}return o}const u=function(o){var e=o.openFilter,r=o.setOpenFilter,t=o.total,c=o.categories,u=o.onClick,m=(0,n.useState)(""),x=(0,p.A)(m,2),h=x[0],b=x[1];return(0,l.jsxs)("div",{className:"filter-sidebar-wrap op-absolute op-z-10 op-bg-card lg:op-relative ".concat(e?"op-w-80 md:op-w-60":"op-hidden op-overflow-hidden"," op-z-50 op-border-r op-border-r-border op-shadow-2xl op-duration-200 md:op-shadow-none"),children:[(0,l.jsxs)("div",{className:"".concat(e?"op-flex":"op-hidden"," op-h-[60px] op-items-center op-gap-3 op-border-b op-border-b-border op-px-6"),children:[(0,l.jsx)(s.A,{text:(0,a.__)("Close filter","omnipress"),position:"top",children:(0,l.jsx)("button",{onClick:function(){return r(!e)},className:"op-flex op-h-8 op-w-8 op-items-center op-justify-center op-rounded-md op-bg-primary hover:op-bg-primary/80",children:(0,l.jsx)(i.YsJ,{className:"op-text-card"})})}),(0,l.jsx)("h2",{className:"".concat(!e&&"op-hidden"," op-font-poppins op-text-18 op-font-semibold op-text-card-foreground"),children:(0,a.__)("Categories","omnipress")})]}),(0,l.jsxs)("div",{className:"op-relative op-flex op-h-[calc(100vh-36vh)] op-flex-col op-gap-2 op-overflow-hidden op-overflow-y-auto op-scrollbar-thin op-scrollbar-track-gray-300 op-scrollbar-thumb-gray-500 op-scrollbar-track-rounded-full op-scrollbar-thumb-rounded-full",children:[(0,l.jsx)("div",{onClick:function(){b(""),u(null)},className:"op-cursor-pointer op-border-b op-border-b-border op-px-5 op-py-[10px] op-font-poppins op-text-14",children:(0,l.jsxs)("a",{className:"".concat(h?"":"op-font-bold op-text-primary dark:op-text-primary"," op-group op-flex op-items-center op-justify-between op-gap-2 op-font-semibold op-text-card-foreground hover:op-text-primary focus:op-ring-0"),children:[(0,a.__)("All","omnipress"),(0,l.jsx)("span",{className:"op-cursor-pointer op-rounded-[20px] op-bg-muted op-px-[12px] op-py-[2px] op-text-[12px] op-font-semibold op-text-card-foreground group-hover:!op-bg-primary group-hover:!op-text-card",children:t})]})}),!!c&&Object.keys(c).map((function(o){return(0,l.jsx)("div",{onClick:function(){b(o),u(d(d({},c[o]),{key:o}))},className:"op-cursor-pointer op-border-b op-border-b-border op-px-5 op-py-[10px] op-font-poppins op-text-14",children:(0,l.jsxs)("a",{className:"".concat(o===h?"op-font-bold op-text-primary":""," op-group op-flex op-items-center op-justify-between op-gap-2 op-font-semibold op-text-card-foreground hover:op-text-primary focus:op-ring-0"),children:[(0,l.jsx)("span",{children:c[o].label}),(0,l.jsx)("span",{className:"op-cursor-pointer op-rounded-[20px] op-bg-muted op-px-[12px] op-py-[2px] op-text-[12px] op-font-semibold op-text-card-foreground group-hover:!op-bg-primary group-hover:!op-text-card",children:c[o].count})]})},o)}))]})]})}},7358:(o,e,r)=>{r.d(e,{A:()=>c});var t=r(4467),p=r(296),s=r(6087),n=r(790);function a(o,e){var r=Object.keys(o);if(Object.getOwnPropertySymbols){var t=Object.getOwnPropertySymbols(o);e&&(t=t.filter((function(e){return Object.getOwnPropertyDescriptor(o,e).enumerable}))),r.push.apply(r,t)}return r}function i(o){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{};e%2?a(Object(r),!0).forEach((function(e){(0,t.A)(o,e,r[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(o,Object.getOwnPropertyDescriptors(r)):a(Object(r)).forEach((function(e){Object.defineProperty(o,e,Object.getOwnPropertyDescriptor(r,e))}))}return o}var l={};function c(o){var e,r=o.gradient,a=o.height,c=o.width,d=o.className,u=o.src,m={background:r,height:null!=a?a:"100%",width:null!=c?c:"100%",filter:"blur(15px)"},x=(0,s.useState)(!(null===(e=l)||void 0===e||!e[u])),h=(0,p.A)(x,2),b=h[0],f=h[1];return(0,s.useEffect)((function(){var o;null!==(o=l)&&void 0!==o&&o[u]||f(!1)}),[u]),(0,n.jsxs)(n.Fragment,{children:[!b&&(0,n.jsx)("div",{className:"op-animate-pulse",style:m}),(0,n.jsx)("img",{style:b?{}:{position:"absolute",visibility:"hidden"},className:d,src:u,alt:u,onLoad:function(){f(!0),l=i(i({},l),(0,t.A)({},u,!0))},loading:"lazy"})]})}},2159:(o,e,r)=>{r.d(e,{E:()=>s,q:()=>n});var t=r(9394),p=r(790);function s(o){var e=o.children,r=o.isLoading,t=o.className,s=o.height,n=o.width;return(0,p.jsx)(p.Fragment,{children:r?(0,p.jsx)(p.Fragment,{children:s||n?(0,p.jsx)("div",{className:"skeleton-wrap op-animate-pulse op-rounded-[5px] op-bg-slate-300 dark:op-bg-slate-600 ".concat(t),children:(0,p.jsx)("div",{style:{height:s,width:n}})}):(0,p.jsx)("div",{className:"skeleton-wrap op-animate-pulse op-rounded-[5px] op-bg-slate-300 dark:op-bg-slate-600 ".concat(t)})}):(0,p.jsx)(p.Fragment,{children:e})})}function n(o){var e=o.total,r=o.isLoading,n=o.children,a=o.height,i=o.width,l=o.className;return r?(0,t.A)(Array(e||6).keys()).map((function(o){return(0,p.jsx)(s,{className:l,height:a,width:i,isLoading:!0},o)})):n}}}]);