"use strict";(globalThis.webpackChunkomnipress=globalThis.webpackChunkomnipress||[]).push([[827],{1827:(e,t,o)=>{o.r(t),o.d(t,{default:()=>l});var n=o(3453),r=o(6087),i=o(3367),c=o(1785),a=o(2582),s=o(790);const l=(0,r.memo)((function(e){var t=e.attributes,o=e.setAttributes,l=t.countdownEndDate,d=t.isSeparator,u=t.separatorType,p=t.timezone,b=(0,r.useState)([]),v=(0,n.A)(b,2),m=v[0],g=v[1];return(0,r.useEffect)((function(){}),[]),(0,r.useEffect)((function(){var e,n=(0,i.ZM)(l,p);return g((0,i.ZI)(n)),t.isPreview&&n>0?(e=setInterval((function(){(n-=1e3)>0?(g((0,i.ZI)(n)),o({isCountdownStart:!0})):(o({isPreview:!1}),o({isCountdownStart:!1}),clearInterval(e))}),1e3),setTimeout((function(){clearInterval(e),o({isPreview:!1})}),5e3)):(o({isPreview:!1}),o({isCountdownStart:!1}),clearInterval(e)),function(){clearInterval(e)}}),[t.isPreview,t.countdownType,t.countdownEndDate,p]),(0,s.jsx)(s.Fragment,{children:m.length>0&&m.map((function(e,n){return(0,s.jsxs)(s.Fragment,{children:[(0,s.jsx)(c.A,{digit:e.digit,digitType:e.digitType,attributes:t,setAttributes:o},e.digitType),n<m.length-1&&d?(0,s.jsx)(a.A,{separatorType:u},"".concat(n,"separator")):""]})}))})}))},1785:(e,t,o)=>{o.d(t,{A:()=>l});var n=o(4467),r=o(4715),i=o(6087),c=o(790);function a(e,t){var o=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),o.push.apply(o,n)}return o}function s(e){for(var t=1;t<arguments.length;t++){var o=null!=arguments[t]?arguments[t]:{};t%2?a(Object(o),!0).forEach((function(t){(0,n.A)(e,t,o[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(o)):a(Object(o)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(o,t))}))}return e}const l=(0,i.memo)((function(e){var t,o,i=e.attributes,a=e.setAttributes,l=e.digit,d=void 0===l?0:l,u=e.digitType,p=void 0===u?"Hours":u;return(0,c.jsxs)("div",{className:"op-block-countdown__content-container op-block__content-container",children:[i.contentContainer.backgroundImage&&(0,c.jsx)("div",{className:"op-content-container--has-overlay op-block--has-overlay",style:{opacity:Number.isNaN(i.contentContainer.bgOverlayOpacity)?.5:i.contentContainer.bgOverlayOpacity/10,backgroundColor:null!==(t=i.contentContainer.backgroundColor)&&void 0!==t?t:"#0005"}}),i.contentContainer.backgroundImage&&i.contentContainer.backgroundImage.includes(".mp4")?(0,c.jsx)("video",{className:"op-content-container--has-video-overlay op-block--has-video-overlay",style:{objectFit:i.contentContainer.backgroundSize||"contain"},muted:!0,loop:!0,autoPlay:!0,children:(0,c.jsx)("source",{src:i.contentContainer.backgroundImage,type:"video/mp4"})}):"",(0,c.jsxs)("div",{className:"op-block-countdown__content-wrapper",children:[(0,c.jsx)("div",{className:"op-block-countdown__digit op-block__countdown-digits op-block-countdown__digit-".concat(p.toLowerCase()," has-text-color"),children:d}),i.isLabel&&(0,c.jsx)(r.RichText,{className:"op-block-countdown__label-minute op-block-countdown__label op-block__countdown-label",onChange:function(e){return function(e){if((null==e?void 0:e.toLowerCase())===p.toLowerCase()){var t=s({},i.digitType);delete t[p.toLowerCase()],a({digitType:s({},t)})}else a({digitType:s(s({},i.digitType),{},(0,n.A)({},p.toLowerCase(),e))})}(e)},value:null!==(o=i.digitType[p.toLowerCase()])&&void 0!==o?o:p,tagName:"p"})]})]})}))},2582:(e,t,o)=>{o.d(t,{A:()=>i});var n=o(6087),r=o(790);const i=(0,n.memo)((function(e){var t=e.separatorType,o=void 0===t?"colon":t;return(0,r.jsx)("div",{className:"op-block-countdown__divider-wrapper",children:"colon"===o?(0,r.jsxs)("div",{className:"op-block-countdown__divider-colon op-block__divider",children:[" ",":"," "]}):(0,r.jsx)("div",{className:"op-block-countdown__divider-line op-block__divider"})})}))},3367:(e,t,o)=>{o.d(t,{XZ:()=>r,ZI:()=>c,ZM:()=>i});var n=o(6285),r=function(e,t){var o=arguments.length>2&&void 0!==arguments[2]?arguments[2]:"UTC";!Object.values(t).every((function(e){return 0===e}))&&Object.keys(t).length||(t={days:1,hours:23,minutes:59,seconds:59});var r=n.c9.now();e||(e=r.toISO()),o&&(e=n.c9.fromISO(e).setZone(o,{keepLocalTime:!0}).toString());var i,c,a=n.c9.fromISO(e).toMillis(),s=n.c9.fromISO(r).toMillis(),l=!1,d=n.dw.fromObject(t).as("milliseconds");return a>s?(l=!1,c=n.c9.fromISO(e).toFormat("x")-s):(l=!0,i=r.diff(n.c9.fromISO(e)).toObject().milliseconds%d),i=n.dw.fromMillis(i).toObject(),i=n.dw.fromObject(i).shiftTo("days","hours","minutes","seconds").toObject(),{remainingTime:i=n.dw.fromObject(t).minus(n.dw.fromObject(i)).shiftTo("milliseconds").toObject(),isStarted:l,startsIn:c}};function i(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"",o=n.c9.now().toFormat("x");t&&(e=n.c9.fromISO(e).setZone(t,{keepLocalTime:!0}).toString());var r=n.c9.fromISO(e).toFormat("x")-o;return r<0?0:r}var c=function(e){var t=Math.floor(e/1e3),o=Math.floor(t/60),n=Math.floor(o/60);return[{digit:Math.floor(n/24),digitType:"Days"},{digit:n%24,digitType:"Hours"},{digit:o%60,digitType:"Minutes"},{digit:t%60,digitType:"Seconds"}]}}}]);