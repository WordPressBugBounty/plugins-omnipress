"use strict";(globalThis.webpackChunkomnipress=globalThis.webpackChunkomnipress||[]).push([[777],{8697:(e,t,n)=>{n.d(t,{A:()=>r});const r=(0,n(6203).A)("X",[["path",{d:"M18 6 6 18",key:"1bl5f8"}],["path",{d:"m6 6 12 12",key:"d8bk6v"}]])},2309:(e,t,n)=>{n.d(t,{UC:()=>te,B8:()=>Q,bL:()=>J,l9:()=>ee});var r=n(1609),o=n(9957),s=n(790);function a(...e){const t=e[0];if(1===e.length)return t;const n=()=>{const n=e.map((e=>({useScope:e(),scopeName:e.scopeName})));return function(e){const o=n.reduce(((t,{useScope:n,scopeName:r})=>({...t,...n(e)[`__scope${r}`]})),{});return r.useMemo((()=>({[`__scope${t.scopeName}`]:o})),[o])}};return n.scopeName=t.scopeName,n}var i=n(2133),c=n(1071),u=n(3362),l=n(8723),d=n(2579),f=n(263),p=n(1351),m=r.createContext(void 0);function v(e){const t=r.useContext(m);return e||t||"ltr"}var w="rovingFocusGroup.onEntryFocus",E={bubbles:!1,cancelable:!0},y="RovingFocusGroup",[h,T,b]=function(e){const t=e+"CollectionProvider",[n,o]=(0,i.A)(t),[a,l]=n(t,{collectionRef:{current:null},itemMap:new Map}),d=e=>{const{scope:t,children:n}=e,o=r.useRef(null),i=r.useRef(new Map).current;return(0,s.jsx)(a,{scope:t,itemMap:i,collectionRef:o,children:n})};d.displayName=t;const f=e+"CollectionSlot",p=r.forwardRef(((e,t)=>{const{scope:n,children:r}=e,o=l(f,n),a=(0,c.s)(t,o.collectionRef);return(0,s.jsx)(u.DX,{ref:a,children:r})}));p.displayName=f;const m=e+"CollectionItemSlot",v="data-radix-collection-item",w=r.forwardRef(((e,t)=>{const{scope:n,children:o,...a}=e,i=r.useRef(null),d=(0,c.s)(t,i),f=l(m,n);return r.useEffect((()=>(f.itemMap.set(i,{ref:i,...a}),()=>{f.itemMap.delete(i)}))),(0,s.jsx)(u.DX,{[v]:"",ref:d,children:o})}));return w.displayName=m,[{Provider:d,Slot:p,ItemSlot:w},function(t){const n=l(e+"CollectionConsumer",t);return r.useCallback((()=>{const e=n.collectionRef.current;if(!e)return[];const t=Array.from(e.querySelectorAll(`[${v}]`));return Array.from(n.itemMap.values()).sort(((e,n)=>t.indexOf(e.ref.current)-t.indexOf(n.ref.current)))}),[n.collectionRef,n.itemMap])},o]}(y),[g,C]=(0,i.A)(y,[b]),[R,N]=g(y),x=r.forwardRef(((e,t)=>(0,s.jsx)(h.Provider,{scope:e.__scopeRovingFocusGroup,children:(0,s.jsx)(h.Slot,{scope:e.__scopeRovingFocusGroup,children:(0,s.jsx)(M,{...e,ref:t})})})));x.displayName=y;var M=r.forwardRef(((e,t)=>{const{__scopeRovingFocusGroup:n,orientation:a,loop:i=!1,dir:u,currentTabStopId:l,defaultCurrentTabStopId:m,onCurrentTabStopIdChange:y,onEntryFocus:h,preventScrollOnEntryFocus:b=!1,...g}=e,C=r.useRef(null),N=(0,c.s)(t,C),x=v(u),[M=null,A]=(0,p.i)({prop:l,defaultProp:m,onChange:y}),[P,S]=r.useState(!1),_=(0,f.c)(h),D=T(n),F=r.useRef(!1),[L,O]=r.useState(0);return r.useEffect((()=>{const e=C.current;if(e)return e.addEventListener(w,_),()=>e.removeEventListener(w,_)}),[_]),(0,s.jsx)(R,{scope:n,orientation:a,dir:x,loop:i,currentTabStopId:M,onItemFocus:r.useCallback((e=>A(e)),[A]),onItemShiftTab:r.useCallback((()=>S(!0)),[]),onFocusableItemAdd:r.useCallback((()=>O((e=>e+1))),[]),onFocusableItemRemove:r.useCallback((()=>O((e=>e-1))),[]),children:(0,s.jsx)(d.sG.div,{tabIndex:P||0===L?-1:0,"data-orientation":a,...g,ref:N,style:{outline:"none",...e.style},onMouseDown:(0,o.m)(e.onMouseDown,(()=>{F.current=!0})),onFocus:(0,o.m)(e.onFocus,(e=>{const t=!F.current;if(e.target===e.currentTarget&&t&&!P){const t=new CustomEvent(w,E);if(e.currentTarget.dispatchEvent(t),!t.defaultPrevented){const e=D().filter((e=>e.focusable));I([e.find((e=>e.active)),e.find((e=>e.id===M)),...e].filter(Boolean).map((e=>e.ref.current)),b)}}F.current=!1})),onBlur:(0,o.m)(e.onBlur,(()=>S(!1)))})})})),A="RovingFocusGroupItem",P=r.forwardRef(((e,t)=>{const{__scopeRovingFocusGroup:n,focusable:a=!0,active:i=!1,tabStopId:c,...u}=e,f=(0,l.B)(),p=c||f,m=N(A,n),v=m.currentTabStopId===p,w=T(n),{onFocusableItemAdd:E,onFocusableItemRemove:y}=m;return r.useEffect((()=>{if(a)return E(),()=>y()}),[a,E,y]),(0,s.jsx)(h.ItemSlot,{scope:n,id:p,focusable:a,active:i,children:(0,s.jsx)(d.sG.span,{tabIndex:v?0:-1,"data-orientation":m.orientation,...u,ref:t,onMouseDown:(0,o.m)(e.onMouseDown,(e=>{a?m.onItemFocus(p):e.preventDefault()})),onFocus:(0,o.m)(e.onFocus,(()=>m.onItemFocus(p))),onKeyDown:(0,o.m)(e.onKeyDown,(e=>{if("Tab"===e.key&&e.shiftKey)return void m.onItemShiftTab();if(e.target!==e.currentTarget)return;const t=function(e,t,n){const r=function(e,t){return"rtl"!==t?e:"ArrowLeft"===e?"ArrowRight":"ArrowRight"===e?"ArrowLeft":e}(e.key,n);return"vertical"===t&&["ArrowLeft","ArrowRight"].includes(r)||"horizontal"===t&&["ArrowUp","ArrowDown"].includes(r)?void 0:S[r]}(e,m.orientation,m.dir);if(void 0!==t){if(e.metaKey||e.ctrlKey||e.altKey||e.shiftKey)return;e.preventDefault();let o=w().filter((e=>e.focusable)).map((e=>e.ref.current));if("last"===t)o.reverse();else if("prev"===t||"next"===t){"prev"===t&&o.reverse();const s=o.indexOf(e.currentTarget);o=m.loop?(r=s+1,(n=o).map(((e,t)=>n[(r+t)%n.length]))):o.slice(s+1)}setTimeout((()=>I(o)))}var n,r}))})})}));P.displayName=A;var S={ArrowLeft:"prev",ArrowUp:"prev",ArrowRight:"next",ArrowDown:"next",PageUp:"first",Home:"first",PageDown:"last",End:"last"};function I(e,t=!1){const n=document.activeElement;for(const r of e){if(r===n)return;if(r.focus({preventScroll:t}),document.activeElement!==n)return}}var _=x,D=P,F=n(8200),L=e=>{const{present:t,children:n}=e,o=function(e){const[t,n]=r.useState(),o=r.useRef({}),s=r.useRef(e),a=r.useRef("none"),i=e?"mounted":"unmounted",[c,u]=function(e,t){return r.useReducer(((e,n)=>t[e][n]??e),e)}(i,{mounted:{UNMOUNT:"unmounted",ANIMATION_OUT:"unmountSuspended"},unmountSuspended:{MOUNT:"mounted",ANIMATION_END:"unmounted"},unmounted:{MOUNT:"mounted"}});return r.useEffect((()=>{const e=O(o.current);a.current="mounted"===c?e:"none"}),[c]),(0,F.N)((()=>{const t=o.current,n=s.current;if(n!==e){const r=a.current,o=O(t);u(e?"MOUNT":"none"===o||"none"===t?.display?"UNMOUNT":n&&r!==o?"ANIMATION_OUT":"UNMOUNT"),s.current=e}}),[e,u]),(0,F.N)((()=>{if(t){let e;const n=t.ownerDocument.defaultView??window,r=r=>{const a=O(o.current).includes(r.animationName);if(r.target===t&&a&&(u("ANIMATION_END"),!s.current)){const r=t.style.animationFillMode;t.style.animationFillMode="forwards",e=n.setTimeout((()=>{"forwards"===t.style.animationFillMode&&(t.style.animationFillMode=r)}))}},i=e=>{e.target===t&&(a.current=O(o.current))};return t.addEventListener("animationstart",i),t.addEventListener("animationcancel",r),t.addEventListener("animationend",r),()=>{n.clearTimeout(e),t.removeEventListener("animationstart",i),t.removeEventListener("animationcancel",r),t.removeEventListener("animationend",r)}}u("ANIMATION_END")}),[t,u]),{isPresent:["mounted","unmountSuspended"].includes(c),ref:r.useCallback((e=>{e&&(o.current=getComputedStyle(e)),n(e)}),[])}}(t),s="function"==typeof n?n({present:o.isPresent}):r.Children.only(n),a=(0,c.s)(o.ref,function(e){let t=Object.getOwnPropertyDescriptor(e.props,"ref")?.get,n=t&&"isReactWarning"in t&&t.isReactWarning;return n?e.ref:(t=Object.getOwnPropertyDescriptor(e,"ref")?.get,n=t&&"isReactWarning"in t&&t.isReactWarning,n?e.props.ref:e.props.ref||e.ref)}(s));return"function"==typeof n||o.isPresent?r.cloneElement(s,{ref:a}):null};function O(e){return e?.animationName||"none"}L.displayName="Presence";var k="Tabs",[U,K]=function(e,t=[]){let n=[];const o=()=>{const t=n.map((e=>r.createContext(e)));return function(n){const o=n?.[e]||t;return r.useMemo((()=>({[`__scope${e}`]:{...n,[e]:o}})),[n,o])}};return o.scopeName=e,[function(t,o){const a=r.createContext(o),i=n.length;n=[...n,o];const c=t=>{const{scope:n,children:o,...c}=t,u=n?.[e]?.[i]||a,l=r.useMemo((()=>c),Object.values(c));return(0,s.jsx)(u.Provider,{value:l,children:o})};return c.displayName=t+"Provider",[c,function(n,s){const c=s?.[e]?.[i]||a,u=r.useContext(c);if(u)return u;if(void 0!==o)return o;throw new Error(`\`${n}\` must be used within \`${t}\``)}]},a(o,...t)]}(k,[C]),j=C(),[$,V]=U(k),G=r.forwardRef(((e,t)=>{const{__scopeTabs:n,value:r,onValueChange:o,defaultValue:a,orientation:i="horizontal",dir:c,activationMode:u="automatic",...f}=e,m=v(c),[w,E]=(0,p.i)({prop:r,onChange:o,defaultProp:a});return(0,s.jsx)($,{scope:n,baseId:(0,l.B)(),value:w,onValueChange:E,orientation:i,dir:m,activationMode:u,children:(0,s.jsx)(d.sG.div,{dir:m,"data-orientation":i,...f,ref:t})})}));G.displayName=k;var B="TabsList",q=r.forwardRef(((e,t)=>{const{__scopeTabs:n,loop:r=!0,...o}=e,a=V(B,n),i=j(n);return(0,s.jsx)(_,{asChild:!0,...i,orientation:a.orientation,dir:a.dir,loop:r,children:(0,s.jsx)(d.sG.div,{role:"tablist","aria-orientation":a.orientation,...o,ref:t})})}));q.displayName=B;var W="TabsTrigger",X=r.forwardRef(((e,t)=>{const{__scopeTabs:n,value:r,disabled:a=!1,...i}=e,c=V(W,n),u=j(n),l=z(c.baseId,r),f=Z(c.baseId,r),p=r===c.value;return(0,s.jsx)(D,{asChild:!0,...u,focusable:!a,active:p,children:(0,s.jsx)(d.sG.button,{type:"button",role:"tab","aria-selected":p,"aria-controls":f,"data-state":p?"active":"inactive","data-disabled":a?"":void 0,disabled:a,id:l,...i,ref:t,onMouseDown:(0,o.m)(e.onMouseDown,(e=>{a||0!==e.button||!1!==e.ctrlKey?e.preventDefault():c.onValueChange(r)})),onKeyDown:(0,o.m)(e.onKeyDown,(e=>{[" ","Enter"].includes(e.key)&&c.onValueChange(r)})),onFocus:(0,o.m)(e.onFocus,(()=>{const e="manual"!==c.activationMode;p||a||!e||c.onValueChange(r)}))})})}));X.displayName=W;var H="TabsContent",Y=r.forwardRef(((e,t)=>{const{__scopeTabs:n,value:o,forceMount:a,children:i,...c}=e,u=V(H,n),l=z(u.baseId,o),f=Z(u.baseId,o),p=o===u.value,m=r.useRef(p);return r.useEffect((()=>{const e=requestAnimationFrame((()=>m.current=!1));return()=>cancelAnimationFrame(e)}),[]),(0,s.jsx)(L,{present:a||p,children:({present:n})=>(0,s.jsx)(d.sG.div,{"data-state":p?"active":"inactive","data-orientation":u.orientation,role:"tabpanel","aria-labelledby":l,hidden:!n,id:f,tabIndex:0,...c,ref:t,style:{...e.style,animationDuration:m.current?"0s":void 0},children:n&&i})})}));function z(e,t){return`${e}-trigger-${t}`}function Z(e,t){return`${e}-content-${t}`}Y.displayName=H;var J=G,Q=q,ee=X,te=Y},1461:(e,t,n)=>{n.d(t,{rc:()=>se,bm:()=>ae,VY:()=>oe,Kq:()=>ee,bL:()=>ne,hE:()=>re,LM:()=>te});var r=n(8168),o=n(1609),s=n(5795);function a(e,t,{checkForDefaultPrevented:n=!0}={}){return function(r){if(null==e||e(r),!1===n||!r.defaultPrevented)return null==t?void 0:t(r)}}function i(...e){return t=>e.forEach((e=>function(e,t){"function"==typeof e?e(t):null!=e&&(e.current=t)}(e,t)))}function c(...e){return(0,o.useCallback)(i(...e),e)}function u(e,t=[]){let n=[];const r=()=>{const t=n.map((e=>(0,o.createContext)(e)));return function(n){const r=(null==n?void 0:n[e])||t;return(0,o.useMemo)((()=>({[`__scope${e}`]:{...n,[e]:r}})),[n,r])}};return r.scopeName=e,[function(t,r){const s=(0,o.createContext)(r),a=n.length;function i(t){const{scope:n,children:r,...i}=t,c=(null==n?void 0:n[e][a])||s,u=(0,o.useMemo)((()=>i),Object.values(i));return(0,o.createElement)(c.Provider,{value:u},r)}return n=[...n,r],i.displayName=t+"Provider",[i,function(n,i){const c=(null==i?void 0:i[e][a])||s,u=(0,o.useContext)(c);if(u)return u;if(void 0!==r)return r;throw new Error(`\`${n}\` must be used within \`${t}\``)}]},l(r,...t)]}function l(...e){const t=e[0];if(1===e.length)return t;const n=()=>{const n=e.map((e=>({useScope:e(),scopeName:e.scopeName})));return function(e){const r=n.reduce(((t,{useScope:n,scopeName:r})=>({...t,...n(e)[`__scope${r}`]})),{});return(0,o.useMemo)((()=>({[`__scope${t.scopeName}`]:r})),[r])}};return n.scopeName=t.scopeName,n}const d=(0,o.forwardRef)(((e,t)=>{const{children:n,...s}=e,a=o.Children.toArray(n),i=a.find(m);if(i){const e=i.props.children,n=a.map((t=>t===i?o.Children.count(e)>1?o.Children.only(null):(0,o.isValidElement)(e)?e.props.children:null:t));return(0,o.createElement)(f,(0,r.A)({},s,{ref:t}),(0,o.isValidElement)(e)?(0,o.cloneElement)(e,void 0,n):null)}return(0,o.createElement)(f,(0,r.A)({},s,{ref:t}),n)}));d.displayName="Slot";const f=(0,o.forwardRef)(((e,t)=>{const{children:n,...r}=e;return(0,o.isValidElement)(n)?(0,o.cloneElement)(n,{...v(r,n.props),ref:t?i(t,n.ref):n.ref}):o.Children.count(n)>1?o.Children.only(null):null}));f.displayName="SlotClone";const p=({children:e})=>(0,o.createElement)(o.Fragment,null,e);function m(e){return(0,o.isValidElement)(e)&&e.type===p}function v(e,t){const n={...t};for(const r in t){const o=e[r],s=t[r];/^on[A-Z]/.test(r)?o&&s?n[r]=(...e)=>{s(...e),o(...e)}:o&&(n[r]=o):"style"===r?n[r]={...o,...s}:"className"===r&&(n[r]=[o,s].filter(Boolean).join(" "))}return{...e,...n}}var w=n(8666),E=n(3656);const y=Boolean(null===globalThis||void 0===globalThis?void 0:globalThis.document)?o.useLayoutEffect:()=>{},h=e=>{const{present:t,children:n}=e,r=function(e){const[t,n]=(0,o.useState)(),r=(0,o.useRef)({}),a=(0,o.useRef)(e),i=(0,o.useRef)("none"),c=e?"mounted":"unmounted",[u,l]=function(e,t){return(0,o.useReducer)(((e,n)=>{const r=t[e][n];return null!=r?r:e}),e)}(c,{mounted:{UNMOUNT:"unmounted",ANIMATION_OUT:"unmountSuspended"},unmountSuspended:{MOUNT:"mounted",ANIMATION_END:"unmounted"},unmounted:{MOUNT:"mounted"}});return(0,o.useEffect)((()=>{const e=T(r.current);i.current="mounted"===u?e:"none"}),[u]),y((()=>{const t=r.current,n=a.current;if(n!==e){const r=i.current,o=T(t);e?l("MOUNT"):"none"===o||"none"===(null==t?void 0:t.display)?l("UNMOUNT"):l(n&&r!==o?"ANIMATION_OUT":"UNMOUNT"),a.current=e}}),[e,l]),y((()=>{if(t){const e=e=>{const n=T(r.current).includes(e.animationName);e.target===t&&n&&(0,s.flushSync)((()=>l("ANIMATION_END")))},n=e=>{e.target===t&&(i.current=T(r.current))};return t.addEventListener("animationstart",n),t.addEventListener("animationcancel",e),t.addEventListener("animationend",e),()=>{t.removeEventListener("animationstart",n),t.removeEventListener("animationcancel",e),t.removeEventListener("animationend",e)}}l("ANIMATION_END")}),[t,l]),{isPresent:["mounted","unmountSuspended"].includes(u),ref:(0,o.useCallback)((e=>{e&&(r.current=getComputedStyle(e)),n(e)}),[])}}(t),a="function"==typeof n?n({present:r.isPresent}):o.Children.only(n),i=c(r.ref,a.ref);return"function"==typeof n||r.isPresent?(0,o.cloneElement)(a,{ref:i}):null};function T(e){return(null==e?void 0:e.animationName)||"none"}h.displayName="Presence";const b=["a","button","div","form","h2","h3","img","input","label","li","nav","ol","p","span","svg","ul"].reduce(((e,t)=>{const n=(0,o.forwardRef)(((e,n)=>{const{asChild:s,...a}=e,i=s?d:t;return(0,o.useEffect)((()=>{window[Symbol.for("radix-ui")]=!0}),[]),(0,o.createElement)(i,(0,r.A)({},a,{ref:n}))}));return n.displayName=`Primitive.${t}`,{...e,[t]:n}}),{});function g(e){const t=(0,o.useRef)(e);return(0,o.useEffect)((()=>{t.current=e})),(0,o.useMemo)((()=>(...e)=>{var n;return null===(n=t.current)||void 0===n?void 0:n.call(t,...e)}),[])}var C=n(4644);const R="ToastProvider",[N,x,M]=function(e){const t=e+"CollectionProvider",[n,r]=u(t),[s,a]=n(t,{collectionRef:{current:null},itemMap:new Map}),i=e+"CollectionSlot",l=e+"CollectionItemSlot",f="data-radix-collection-item";return[{Provider:e=>{const{scope:t,children:n}=e,r=o.useRef(null),a=o.useRef(new Map).current;return o.createElement(s,{scope:t,itemMap:a,collectionRef:r},n)},Slot:o.forwardRef(((e,t)=>{const{scope:n,children:r}=e,s=c(t,a(i,n).collectionRef);return o.createElement(d,{ref:s},r)})),ItemSlot:o.forwardRef(((e,t)=>{const{scope:n,children:r,...s}=e,i=o.useRef(null),u=c(t,i),p=a(l,n);return o.useEffect((()=>(p.itemMap.set(i,{ref:i,...s}),()=>{p.itemMap.delete(i)}))),o.createElement(d,{[f]:"",ref:u},r)}))},function(t){const n=a(e+"CollectionConsumer",t);return o.useCallback((()=>{const e=n.collectionRef.current;if(!e)return[];const t=Array.from(e.querySelectorAll(`[${f}]`));return Array.from(n.itemMap.values()).sort(((e,n)=>t.indexOf(e.ref.current)-t.indexOf(n.ref.current)))}),[n.collectionRef,n.itemMap])},r]}("Toast"),[A,P]=u("Toast",[M]),[S,I]=A(R),_=e=>{const{__scopeToast:t,label:n="Notification",duration:r=5e3,swipeDirection:s="right",swipeThreshold:a=50,children:i}=e,[c,u]=(0,o.useState)(null),[l,d]=(0,o.useState)(0),f=(0,o.useRef)(!1),p=(0,o.useRef)(!1);return(0,o.createElement)(N.Provider,{scope:t},(0,o.createElement)(S,{scope:t,label:n,duration:r,swipeDirection:s,swipeThreshold:a,toastCount:l,viewport:c,onViewportChange:u,onToastAdd:(0,o.useCallback)((()=>d((e=>e+1))),[]),onToastRemove:(0,o.useCallback)((()=>d((e=>e-1))),[]),isFocusedToastEscapeKeyDownRef:f,isClosePausedRef:p},i))};_.propTypes={label:e=>e.label&&"string"==typeof e.label&&!e.label.trim()?new Error(`Invalid prop \`label\` supplied to \`${R}\`. Expected non-empty \`string\`.`):null};const D=["F8"],F="toast.viewportPause",L="toast.viewportResume",O=(0,o.forwardRef)(((e,t)=>{const{__scopeToast:n,hotkey:s=D,label:a="Notifications ({hotkey})",...i}=e,u=I("ToastViewport",n),l=x(n),d=(0,o.useRef)(null),f=(0,o.useRef)(null),p=(0,o.useRef)(null),m=(0,o.useRef)(null),v=c(t,m,u.onViewportChange),E=s.join("+").replace(/Key/g,"").replace(/Digit/g,""),y=u.toastCount>0;(0,o.useEffect)((()=>{const e=e=>{var t;s.every((t=>e[t]||e.code===t))&&(null===(t=m.current)||void 0===t||t.focus())};return document.addEventListener("keydown",e),()=>document.removeEventListener("keydown",e)}),[s]),(0,o.useEffect)((()=>{const e=d.current,t=m.current;if(y&&e&&t){const n=()=>{if(!u.isClosePausedRef.current){const e=new CustomEvent(F);t.dispatchEvent(e),u.isClosePausedRef.current=!0}},r=()=>{if(u.isClosePausedRef.current){const e=new CustomEvent(L);t.dispatchEvent(e),u.isClosePausedRef.current=!1}},o=t=>{!e.contains(t.relatedTarget)&&r()},s=()=>{e.contains(document.activeElement)||r()};return e.addEventListener("focusin",n),e.addEventListener("focusout",o),e.addEventListener("pointermove",n),e.addEventListener("pointerleave",s),window.addEventListener("blur",n),window.addEventListener("focus",r),()=>{e.removeEventListener("focusin",n),e.removeEventListener("focusout",o),e.removeEventListener("pointermove",n),e.removeEventListener("pointerleave",s),window.removeEventListener("blur",n),window.removeEventListener("focus",r)}}}),[y,u.isClosePausedRef]);const h=(0,o.useCallback)((({tabbingDirection:e})=>{const t=l().map((t=>{const n=t.ref.current,r=[n,...J(n)];return"forwards"===e?r:r.reverse()}));return("forwards"===e?t.reverse():t).flat()}),[l]);return(0,o.useEffect)((()=>{const e=m.current;if(e){const t=t=>{const n=t.altKey||t.ctrlKey||t.metaKey;if("Tab"===t.key&&!n){const n=document.activeElement,a=t.shiftKey;var r;if(t.target===e&&a)return void(null===(r=f.current)||void 0===r||r.focus());const i=h({tabbingDirection:a?"backwards":"forwards"}),c=i.findIndex((e=>e===n));var o,s;Q(i.slice(c+1))?t.preventDefault():a?null===(o=f.current)||void 0===o||o.focus():null===(s=p.current)||void 0===s||s.focus()}};return e.addEventListener("keydown",t),()=>e.removeEventListener("keydown",t)}}),[l,h]),(0,o.createElement)(w.lg,{ref:d,role:"region","aria-label":a.replace("{hotkey}",E),tabIndex:-1,style:{pointerEvents:y?void 0:"none"}},y&&(0,o.createElement)(k,{ref:f,onFocusFromOutsideViewport:()=>{Q(h({tabbingDirection:"forwards"}))}}),(0,o.createElement)(N.Slot,{scope:n},(0,o.createElement)(b.ol,(0,r.A)({tabIndex:-1},i,{ref:v}))),y&&(0,o.createElement)(k,{ref:p,onFocusFromOutsideViewport:()=>{Q(h({tabbingDirection:"backwards"}))}}))})),k=(0,o.forwardRef)(((e,t)=>{const{__scopeToast:n,onFocusFromOutsideViewport:s,...a}=e,i=I("ToastFocusProxy",n);return(0,o.createElement)(C.s,(0,r.A)({"aria-hidden":!0,tabIndex:0},a,{ref:t,style:{position:"fixed"},onFocus:e=>{var t;const n=e.relatedTarget;(null===(t=i.viewport)||void 0===t||!t.contains(n))&&s()}}))})),U="Toast",K=(0,o.forwardRef)(((e,t)=>{const{forceMount:n,open:s,defaultOpen:i,onOpenChange:c,...u}=e,[l=!0,d]=function({prop:e,defaultProp:t,onChange:n=()=>{}}){const[r,s]=function({defaultProp:e,onChange:t}){const n=(0,o.useState)(e),[r]=n,s=(0,o.useRef)(r),a=g(t);return(0,o.useEffect)((()=>{s.current!==r&&(a(r),s.current=r)}),[r,s,a]),n}({defaultProp:t,onChange:n}),a=void 0!==e,i=a?e:r,c=g(n);return[i,(0,o.useCallback)((t=>{if(a){const n="function"==typeof t?t(e):t;n!==e&&c(n)}else s(t)}),[a,e,s,c])]}({prop:s,defaultProp:i,onChange:c});return(0,o.createElement)(h,{present:n||l},(0,o.createElement)(V,(0,r.A)({open:l},u,{ref:t,onClose:()=>d(!1),onPause:g(e.onPause),onResume:g(e.onResume),onSwipeStart:a(e.onSwipeStart,(e=>{e.currentTarget.setAttribute("data-swipe","start")})),onSwipeMove:a(e.onSwipeMove,(e=>{const{x:t,y:n}=e.detail.delta;e.currentTarget.setAttribute("data-swipe","move"),e.currentTarget.style.setProperty("--radix-toast-swipe-move-x",`${t}px`),e.currentTarget.style.setProperty("--radix-toast-swipe-move-y",`${n}px`)})),onSwipeCancel:a(e.onSwipeCancel,(e=>{e.currentTarget.setAttribute("data-swipe","cancel"),e.currentTarget.style.removeProperty("--radix-toast-swipe-move-x"),e.currentTarget.style.removeProperty("--radix-toast-swipe-move-y"),e.currentTarget.style.removeProperty("--radix-toast-swipe-end-x"),e.currentTarget.style.removeProperty("--radix-toast-swipe-end-y")})),onSwipeEnd:a(e.onSwipeEnd,(e=>{const{x:t,y:n}=e.detail.delta;e.currentTarget.setAttribute("data-swipe","end"),e.currentTarget.style.removeProperty("--radix-toast-swipe-move-x"),e.currentTarget.style.removeProperty("--radix-toast-swipe-move-y"),e.currentTarget.style.setProperty("--radix-toast-swipe-end-x",`${t}px`),e.currentTarget.style.setProperty("--radix-toast-swipe-end-y",`${n}px`),d(!1)}))})))})),[j,$]=A(U,{onClose(){}}),V=(0,o.forwardRef)(((e,t)=>{const{__scopeToast:n,type:i="foreground",duration:u,open:l,onClose:d,onEscapeKeyDown:f,onPause:p,onResume:m,onSwipeStart:v,onSwipeMove:E,onSwipeCancel:y,onSwipeEnd:h,...T}=e,C=I(U,n),[R,x]=(0,o.useState)(null),M=c(t,(e=>x(e))),A=(0,o.useRef)(null),P=(0,o.useRef)(null),S=u||C.duration,_=(0,o.useRef)(0),D=(0,o.useRef)(S),O=(0,o.useRef)(0),{onToastAdd:k,onToastRemove:K}=C,$=g((()=>{var e;(null==R?void 0:R.contains(document.activeElement))&&(null===(e=C.viewport)||void 0===e||e.focus()),d()})),V=(0,o.useCallback)((e=>{e&&e!==1/0&&(window.clearTimeout(O.current),_.current=(new Date).getTime(),O.current=window.setTimeout($,e))}),[$]);(0,o.useEffect)((()=>{const e=C.viewport;if(e){const t=()=>{V(D.current),null==m||m()},n=()=>{const e=(new Date).getTime()-_.current;D.current=D.current-e,window.clearTimeout(O.current),null==p||p()};return e.addEventListener(F,n),e.addEventListener(L,t),()=>{e.removeEventListener(F,n),e.removeEventListener(L,t)}}}),[C.viewport,S,p,m,V]),(0,o.useEffect)((()=>{l&&!C.isClosePausedRef.current&&V(S)}),[l,S,C.isClosePausedRef,V]),(0,o.useEffect)((()=>(k(),()=>K())),[k,K]);const B=(0,o.useMemo)((()=>R?Y(R):null),[R]);return C.viewport?(0,o.createElement)(o.Fragment,null,B&&(0,o.createElement)(G,{__scopeToast:n,role:"status","aria-live":"foreground"===i?"assertive":"polite","aria-atomic":!0},B),(0,o.createElement)(j,{scope:n,onClose:$},(0,s.createPortal)((0,o.createElement)(N.ItemSlot,{scope:n},(0,o.createElement)(w.bL,{asChild:!0,onEscapeKeyDown:a(f,(()=>{C.isFocusedToastEscapeKeyDownRef.current||$(),C.isFocusedToastEscapeKeyDownRef.current=!1}))},(0,o.createElement)(b.li,(0,r.A)({role:"status","aria-live":"off","aria-atomic":!0,tabIndex:0,"data-state":l?"open":"closed","data-swipe-direction":C.swipeDirection},T,{ref:M,style:{userSelect:"none",touchAction:"none",...e.style},onKeyDown:a(e.onKeyDown,(e=>{"Escape"===e.key&&(null==f||f(e.nativeEvent),e.nativeEvent.defaultPrevented||(C.isFocusedToastEscapeKeyDownRef.current=!0,$()))})),onPointerDown:a(e.onPointerDown,(e=>{0===e.button&&(A.current={x:e.clientX,y:e.clientY})})),onPointerMove:a(e.onPointerMove,(e=>{if(!A.current)return;const t=e.clientX-A.current.x,n=e.clientY-A.current.y,r=Boolean(P.current),o=["left","right"].includes(C.swipeDirection),s=["left","up"].includes(C.swipeDirection)?Math.min:Math.max,a=o?s(0,t):0,i=o?0:s(0,n),c="touch"===e.pointerType?10:2,u={x:a,y:i},l={originalEvent:e,delta:u};r?(P.current=u,z("toast.swipeMove",E,l,{discrete:!1})):Z(u,C.swipeDirection,c)?(P.current=u,z("toast.swipeStart",v,l,{discrete:!1}),e.target.setPointerCapture(e.pointerId)):(Math.abs(t)>c||Math.abs(n)>c)&&(A.current=null)})),onPointerUp:a(e.onPointerUp,(e=>{const t=P.current,n=e.target;if(n.hasPointerCapture(e.pointerId)&&n.releasePointerCapture(e.pointerId),P.current=null,A.current=null,t){const n=e.currentTarget,r={originalEvent:e,delta:t};Z(t,C.swipeDirection,C.swipeThreshold)?z("toast.swipeEnd",h,r,{discrete:!0}):z("toast.swipeCancel",y,r,{discrete:!0}),n.addEventListener("click",(e=>e.preventDefault()),{once:!0})}}))})))),C.viewport))):null}));V.propTypes={type:e=>e.type&&!["foreground","background"].includes(e.type)?new Error(`Invalid prop \`type\` supplied to \`${U}\`. Expected \`foreground | background\`.`):null};const G=e=>{const{__scopeToast:t,children:n,...r}=e,s=I(U,t),[a,i]=(0,o.useState)(!1),[c,u]=(0,o.useState)(!1);return function(e=()=>{}){const t=g(e);y((()=>{let e=0,n=0;return e=window.requestAnimationFrame((()=>n=window.requestAnimationFrame(t))),()=>{window.cancelAnimationFrame(e),window.cancelAnimationFrame(n)}}),[t])}((()=>i(!0))),(0,o.useEffect)((()=>{const e=window.setTimeout((()=>u(!0)),1e3);return()=>window.clearTimeout(e)}),[]),c?null:(0,o.createElement)(E.Z,{asChild:!0},(0,o.createElement)(C.s,r,a&&(0,o.createElement)(o.Fragment,null,s.label," ",n)))},B=(0,o.forwardRef)(((e,t)=>{const{__scopeToast:n,...s}=e;return(0,o.createElement)(b.div,(0,r.A)({},s,{ref:t}))})),q=(0,o.forwardRef)(((e,t)=>{const{__scopeToast:n,...s}=e;return(0,o.createElement)(b.div,(0,r.A)({},s,{ref:t}))})),W=(0,o.forwardRef)(((e,t)=>{const{altText:n,...s}=e;return n?(0,o.createElement)(H,{altText:n,asChild:!0},(0,o.createElement)(X,(0,r.A)({},s,{ref:t}))):null}));W.propTypes={altText:e=>e.altText?null:new Error("Missing prop `altText` expected on `ToastAction`")};const X=(0,o.forwardRef)(((e,t)=>{const{__scopeToast:n,...s}=e,i=$("ToastClose",n);return(0,o.createElement)(H,{asChild:!0},(0,o.createElement)(b.button,(0,r.A)({type:"button"},s,{ref:t,onClick:a(e.onClick,i.onClose)})))})),H=(0,o.forwardRef)(((e,t)=>{const{__scopeToast:n,altText:s,...a}=e;return(0,o.createElement)(b.div,(0,r.A)({"data-radix-toast-announce-exclude":"","data-radix-toast-announce-alt":s||void 0},a,{ref:t}))}));function Y(e){const t=[];return Array.from(e.childNodes).forEach((e=>{if(e.nodeType===e.TEXT_NODE&&e.textContent&&t.push(e.textContent),function(e){return e.nodeType===e.ELEMENT_NODE}(e)){const n=e.ariaHidden||e.hidden||"none"===e.style.display,r=""===e.dataset.radixToastAnnounceExclude;if(!n)if(r){const n=e.dataset.radixToastAnnounceAlt;n&&t.push(n)}else t.push(...Y(e))}})),t}function z(e,t,n,{discrete:r}){const o=n.originalEvent.currentTarget,a=new CustomEvent(e,{bubbles:!0,cancelable:!0,detail:n});t&&o.addEventListener(e,t,{once:!0}),r?function(e,t){e&&(0,s.flushSync)((()=>e.dispatchEvent(t)))}(o,a):o.dispatchEvent(a)}const Z=(e,t,n=0)=>{const r=Math.abs(e.x),o=Math.abs(e.y),s=r>o;return"left"===t||"right"===t?s&&r>n:!s&&o>n};function J(e){const t=[],n=document.createTreeWalker(e,NodeFilter.SHOW_ELEMENT,{acceptNode:e=>{const t="INPUT"===e.tagName&&"hidden"===e.type;return e.disabled||e.hidden||t?NodeFilter.FILTER_SKIP:e.tabIndex>=0?NodeFilter.FILTER_ACCEPT:NodeFilter.FILTER_SKIP}});for(;n.nextNode();)t.push(n.currentNode);return t}function Q(e){const t=document.activeElement;return e.some((e=>e===t||(e.focus(),document.activeElement!==t)))}const ee=_,te=O,ne=K,re=B,oe=q,se=W,ae=X}}]);