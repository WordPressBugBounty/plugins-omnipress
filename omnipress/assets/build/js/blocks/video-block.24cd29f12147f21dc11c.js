"use strict";(globalThis.webpackChunkomnipress=globalThis.webpackChunkomnipress||[]).push([[852],{6128:(e,t,r)=>{r.r(t),r.d(t,{default:()=>L});var o=r(4467),n=r(3986),i=r(42),a=r(3453),l=r(6087),c=r(6942),s=r.n(c),p=r(819),u=r(3162),d=r(4715),b=r(6427),m=r(3582),f=r(7143),v=r(7723),y=r(692),g=r(882),h=r(4182),j=r(2227),O=["video"],w=[{name:"autoplay",label:"Autoplay"},{name:"loop",label:"Loop"},{name:"muted",label:"Muted"},{name:"controls",label:"Controls"},{name:"playsInline",label:"Plays inline"}],x=[{label:"Auto",value:"auto"},{label:"Metadata",value:"metadata"},{label:"None",value:"none"}],P=r(9491),k=r(790);function _(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(e);t&&(o=o.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,o)}return r}function S(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?_(Object(r),!0).forEach((function(t){(0,o.A)(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):_(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}var A={class:"className",frameborder:"frameBorder",marginheight:"marginHeight",marginwidth:"marginWidth"};const E=function(e){var t=e.html,r=e.setAttributes,o=(0,l.useRef)(),n=(0,l.useMemo)((function(){var e=(new window.DOMParser).parseFromString(t,"text/html").querySelector("iframe"),o={};return e?(Array.from(e.attributes).forEach((function(e){var t=e.name,r=e.value;"style"!==t&&(o[A[t]||t]=r)})),r({iframe:!0,poster:"",id:void 0,muted:!1,controls:!1,autoplay:!1,playsInline:!1,loop:!1}),o):o}),[t]);function i(e){var t=e.data,r=void 0===t?{}:t,i=r.secret,a=r.message,l=r.value;"height"===a&&i===n["data-secret"]&&(o.current.height=l)}return(0,l.useEffect)((function(){var e=o.current.ownerDocument.defaultView;return e.addEventListener("message",i),function(){e.removeEventListener("message",i)}}),[]),(0,k.jsx)("div",{className:"op-block__video-wrapper op-block__video-embed-wrapper",children:(0,k.jsx)("iframe",S({ref:(0,P.useMergeRefs)([o,(0,P.useFocusableIframe)()]),title:n.title},n))})};var I=r(7881),N=["attributes","setAttributes","clientId","children"];function D(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(e);t&&(o=o.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,o)}return r}function R(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?D(Object(r),!0).forEach((function(t){(0,o.A)(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):D(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}function C(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(e);t&&(o=o.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,o)}return r}function T(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?C(Object(r),!0).forEach((function(t){(0,o.A)(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):C(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}const M=JSON.parse('{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":2,"name":"omnipress/video","version":"1.0.0","title":"Video","category":"omnipress","icon":"","description":"Embed a video from your media library or upload a new one.","supports":{"className":true,"anchor":true},"attributes":{"blockId":{"type":"string"},"content":{"type":"string","source":"html","selector":"figure","default":""},"videoWrapper":{"type":"object","default":{"width":"max(100%, 300px)"}},"iframe":{"type":"boolean","default":false},"height":{"type":"number","source":"attribute","selector":"video","attribute":"height"},"caption":{"type":"rich-text","source":"rich-text","selector":"figcaption","__experimentalRole":"content"},"id":{"type":"number","__experimentalRole":"content"},"loop":{"type":"boolean","source":"attribute","selector":"video","attribute":"loop"},"muted":{"type":"boolean","source":"attribute","selector":"video","attribute":"muted","default":false},"controls":{"type":"boolean","source":"attribute","selector":"video","attribute":"controls","default":true},"autoplay":{"type":"boolean","source":"attribute","selector":"video","attribute":"autoplay","default":false},"playsInline":{"type":"boolean","source":"attribute","selector":"video","attribute":"playsinline","default":true},"preload":{"type":"string","source":"attribute","selector":"video","attribute":"preload","default":"auto"},"poster":{"type":"string","source":"attribute","selector":"video","attribute":"poster"},"src":{"type":"string"},"width":{"type":"number","source":"attribute","selector":"video"},"tracks":{"__experimentalRole":"content","type":"array","items":{"type":"object"},"default":[]}},"opSettings":{"videoWrapper":{"group":"design","selector":".op-block__video-wrapper","label":"Video Wrapper","fields":{"dimension":{"width":true,"height":true},"border":{"border":true,"borderRadius":true}}}},"textdomain":"omnipress"}');function B(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(e);t&&(o=o.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,o)}return r}function U(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?B(Object(r),!0).forEach((function(t){(0,o.A)(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):B(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}var F=M.opSettings;const L=U(U({name:M.name,edit:function(e){var t=e.attributes,r=e.setAttributes,c=e.clientId,P=e.children,_=(0,n.A)(e,N).className,S=(0,l.useState)(null),A=(0,a.A)(S,2),D=A[0],C=A[1],T=t.id,M=t.isCaption,B=t.height,U=t.width,F=t.preload,L=t.blockId,z=t.title,V=t.src,W=t.iframe,G=t.size,q=t.poster,K=t.autoplay,H=t.loop,J=t.muted,$=t.playsInline,Q=(t.controls,t.allowfullscreen,t.referrerpolicy,t.posterSrc,t.alt,(0,f.useDispatch)(y.store).createErrorNotice),X=(0,f.useSelect)((function(e){var t,r=e(m.store),o=r.getEmbedPreview,n=r.isPreviewEmbedFallback,i=r.isRequestingEmbedPreview,a=r.getThemeSupports;if(!V)return{fetching:!1,cannotEmbed:!1};var l=o(V),c=n(V),s=!1===(null==l?void 0:l.html)&&void 0===(null==l?void 0:l.type),p=404===(null==l||null===(t=l.data)||void 0===t?void 0:t.status),u=!(V.includes(".mp4")||!l||s||p);return{preview:u?l:void 0,fetching:i(V),themeSupportsResponsive:a()["responsive-embeds"],cannotEmbed:!u||c}}),[V]),Y=X.preview,Z=X.fetching,ee=X.cannotEmbed,te=function(e){e&&r({src:e})},re=function(e){if(e&&e.url)if((0,u.isBlobURL)(e.url))C(e.url);else if(C(),e){var t=function(e){var t,r=Object.fromEntries(Object.entries(e).filter((function(e){var t=(0,a.A)(e,1)[0];return["id","alt","title","caption"].includes(t)})));return r.src=e.url||(null===(t=e.media_details)||void 0===t||null===(t=t.sizes)||void 0===t||null===(t=t[G])||void 0===t?void 0:t.source_url)||e.url,r}(e);r(R(R({},t),{},{iframe:!1}))}},oe=function(e){Q(e,{type:"snackbar"}),e&&r({src:void 0,alt:void 0,caption:void 0,id:void 0}),C()};return(0,l.useEffect)((function(){ee&&r({iframe:!1})}),[ee]),V?Z?(0,k.jsx)(I.A,R(R({className:s()("op-block op-".concat(L," op-block__video ").concat(_),{uploading:D})},e),{},{children:(0,k.jsx)(b.Spinner,{})})):(0,k.jsxs)(k.Fragment,{children:[(0,k.jsxs)(I.A,R(R({className:s()("op-block op-".concat(L," op-block__video ").concat(_),{uploading:D})},e),{},{children:[P,e.isSelected&&(0,k.jsxs)(d.BlockControls,{group:"other",children:[(0,k.jsx)(b.Tooltip,{placement:"top",delay:200,text:M?"Remove caption":"Add caption",children:(0,k.jsx)(p.Gcc,{onClick:function(){return r({isCaption:!M})},style:{margin:"10px",cursor:"pointer",fontSize:"32px",color:M?"var(--op-clr-primary)":""}})}),V?(0,k.jsx)(b.ToolbarItem,{title:"Image",children:(0,k.jsx)(d.MediaReplaceFlow,{mediaId:T,mediaURL:V,allowedTypes:O,accept:"video/*",onSelect:re,onSelectURL:te,onError:oe})}):(0,k.jsx)("div",{role:"toolbar",children:(0,k.jsx)(d.MediaUpload,{onSelect:re,allowedTypes:O,value:V,render:function(e){var t=e.open;return(0,k.jsx)(b.Button,{onClick:t,className:"components-toolbar__control",children:V?"Change Image":"Upload Image"})}})})]}),ee?(0,k.jsx)("figure",{children:(0,k.jsx)("div",{className:"op-block__video-wrapper",children:(0,k.jsx)("video",{title:z,height:B,width:U,poster:q,controls:!0,autoPlay:K,loop:H,muted:J,preload:F,src:V,playsInline:$})})}):(0,k.jsx)("figure",{children:(0,k.jsx)(E,{setAttributes:r,html:null==Y?void 0:Y.html})})]})),e.isSelected&&(0,k.jsx)(h.G,{group:"general",clientId:c,children:!W&&(0,k.jsxs)(k.Fragment,{children:[(0,k.jsxs)(g.nM,{panelName:"general",initialOpen:!0,label:(0,v.__)("General","omnipress"),children:[(0,k.jsx)("h2",{className:"op-mb-0",children:(0,v.__)("Video Poster","omnipress")}),(0,k.jsx)(d.MediaUpload,{onSelect:function(e){r({poster:e.url})},allowedTypes:["image"],value:V,render:function(e){var t=e.open;return q?(0,k.jsx)("div",{onClick:t,style:{position:"relative",width:"100%",cursor:"pointer",height:"150px",backgroundImage:"url(".concat(q,")"),backgroundSize:"cover",backgroundPosition:"center",backgroundRepeat:"no-repeat",borderRadius:"5px",overflow:"hidden",marginBottom:"10px"},children:(0,k.jsx)(b.Tooltip,{placement:"top",text:(0,v.__)("Remove Poster","omnipress"),children:(0,k.jsx)(j.j55,{style:{cursor:"pointer",fontSize:"17px",color:"var(--op-clr-primary)",position:"absolute",zIndex:99,background:"var(--op-clr-white,",borderRadius:"1px"},onClick:function(e){e.stopPropagation(),r({poster:""})}})})}):(0,k.jsx)("button",{type:"button",className:"op-bg-image-uploader",onClick:t,children:(0,v.__)("Upload Poster","omnipress")})}})]}),(0,k.jsxs)(g.nM,{panelName:"video",label:(0,v.__)("Video Controls Toggle","omnipress"),children:[(0,k.jsx)(b.SelectControl,{label:(0,v.__)("Preload Options","omnipress"),options:x,value:F,onChange:function(e){return r({preload:e})}}),w&&w.map((function(e){var n=e.name,i=e.label;return(0,k.jsx)(g.T_,{label:i,checked:t[n],style:{marginBottom:"10px"},onChange:function(){return r((0,o.A)({},n,!t[n]))}},n)}))]})]})})]}):(0,k.jsx)(I.A,R(R({className:s()("op-block op-".concat(L," op-block__video ").concat(_),{uploading:D})},e),{},{children:(0,k.jsx)(d.MediaPlaceholder,{icon:i.Ki,allowedTypes:O,onSelect:re,accept:"video/*",onSelectURL:te,onError:oe})}))},save:function(e){var t=e.attributes,r=t.blockId,o=t.src,n=t.title,i=t.height,a=t.width,l=t.preload,c=t.poster,s=t.autoplay,p=t.loop,u=t.muted,b=t.controls,m=t.playsInline,f=t.iframe,v=t.isCaption,y=d.useBlockProps.save({className:"op-block op-".concat(r," op-block__video"),"data-type":"omnipress/video"});return o?(0,k.jsx)("div",T(T({},y),{},{children:(0,k.jsxs)("figure",{children:[f?(0,k.jsx)("div",{className:"op-block__video-wrapper op-block__video-embed-wrapper",children:"\n".concat(o,"\n")}):(0,k.jsx)("div",{className:"op-block__video-wrapper",children:(0,k.jsx)("video",{title:n,height:i,width:a,controls:b,autoPlay:s,loop:p,muted:u,preload:l,poster:c,src:o,playsInline:m})}),v&&n&&(0,k.jsx)("figcaption",{children:n})]})})):null},category:"omnipress",keywords:["video","media"],opSettings:F},(0,n.A)(M,["opSettings","name"])),{},{icon:i.Ki})},7881:(e,t,r)=>{r.d(t,{A:()=>v});var o=r(4467),n=r(3986),i=r(4715),a=r(2619),l=r(6087),c=r(6942),s=r.n(c),p=r(4987),u=r(7143),d=r(790),b=["className","isSelected","context","attributes","clientId","setAttributes","tagName","children"];function m(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(e);t&&(o=o.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,o)}return r}function f(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?m(Object(r),!0).forEach((function(t){(0,o.A)(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):m(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}const v=function(e){var t,r,c=e.className,m=(e.isSelected,e.context,e.attributes),v=(e.clientId,e.setAttributes,e.tagName),y=e.children,g=(0,n.A)(e,b),h=(0,u.select)(p.n).getMouseState(),j=s()((0,o.A)((0,o.A)((0,o.A)((0,o.A)((0,o.A)({},"op-".concat(m.blockId),m.blockId),"is-layout-flex","flex"===(null===(t=m.layout)||void 0===t?void 0:t.display)),"is-layout-grid","grid"===(null===(r=m.layout)||void 0===r?void 0:r.display)),"is-layout-".concat(m.layoutType),!!m.layoutType),"hover-state","hover"===h)),O=(0,l.useRef)(null),w=(0,i.useBlockEditContext)().name,x=v||"div";return(0,d.jsx)(x,f(f(f({},(0,i.useBlockProps)(f({className:"".concat(c," ").concat(j),ref:O,"data-type":w},(0,a.applyFilters)("omnipress.edit.props.".concat(w.split("/")[1]),{})))),g),{},{children:y}))}}}]);