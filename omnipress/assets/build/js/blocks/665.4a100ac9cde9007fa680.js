"use strict";(globalThis.webpackChunkomnipress=globalThis.webpackChunkomnipress||[]).push([[665],{665:(e,t,n)=>{n.r(t),n.d(t,{default:()=>re});var o=n(3986),l=n(42),r=n(7723);const a=JSON.parse('{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":2,"name":"omnipress/heading","version":"1.0.0","title":"Heading","category":"omnipress","description":"Create advanced heading with title, subtitle and separator controls.","icon":"","supports":{"className":true,"anchor":true},"attributes":{"condition":{"type":"object","default":{"enable":true,"options":[{"type":"user_rules","status":"logged_in","user_roles":["administrator"],"user_ids":[]}]}},"headingStyles":{"type":"object","default":{}},"css":{"type":"string"},"blockLink":{"type":"string","default":""},"dataAttributes":{"type":"string","default":""},"variation":{"type":"string"},"isLink":{"type":"boolean","default":false},"mdIsLink":{"type":"boolean","default":false},"smIsLink":{"type":"boolean","default":false},"href":{"type":"string"},"newTab":{"type":"boolean","default":false},"content":{"type":"string","source":"html","selector":".op-block__heading-content, [data-type=\'omnipress/heading\'] > h1, [data-type=\'omnipress/heading\'] > h2,[data-type=\'omnipress/heading\'] > h3,[data-type=\'omnipress/heading\'] > h4,[data-type=\'omnipress/heading\'] > h5,[data-type=\'omnipress/heading\'] > h6,[data-type=\'omnipress/heading\'] > a,[data-type=\'omnipress/heading\'] > p"},"blockId":{"type":"string"},"seperatorIsActive":{"type":"boolean","default":false},"seperator":{"type":"object","default":{"smDisplay":"block","mdDisplay":"block"}},"subHeading":{"type":"string","default":""},"subheadingTagName":{"type":"string","default":"p"},"isOpenSubHeading":{"type":"boolean","default":false},"headingType":{"type":"string","default":"h2"},"linkStyles":{"type":"object","default":{}},"subHeadingStyling":{"type":"object","default":{"smDisplay":"block","mdDisplay":"block"}},"headingWrapper":{"type":"object","default":{}}},"opSettings":{"headingStyles":{"group":"design","selector":".op-block__heading-content","label":"Heading","fields":{"typography":true,"spacing":{"padding":true,"margin":true},"border":{"border":true,"borderRadius":true}}},"subHeadingStyling":{"group":"design","toggleAttribute":"isOpenSubHeading","selector":".op-block__heading-sub","label":"Sub Heading","fields":{"typography":true,"spacing":{"padding":true,"margin":true},"color":{"background":true},"border":{"border":true,"borderRadius":true},"transform":true}},"seperator":{"group":"design","selector":".op-block__heading-separator","label":"Separator","toggleAttribute":"seperatorIsActive","fields":{"spacing":{"padding":true,"margin":true},"color":{"background":true},"border":{"border":true,"borderRadius":true},"transform":true}}},"textdomain":"omnipress"}');var i=n(4467),s=n(3029),c=n(2901),u=n(388),p=n(3954),d=n(5361),b=n(7143),g=n(6087),h=(0,g.createContext)(null);function f(){return{open:function(){document.getElementById("wpwrap").style.minHeight="unset",document.getElementById("omnipress").style.display="block",window.location.href="".concat(window.location.href.split("#")[0],"#/libraries/patterns")},close:function(){window.history.replaceState({},document.title,window.location.href.split("#")[0]),document.getElementById("omnipress").style.display="none",document.getElementById("wpwrap").removeAttribute("style")},insertContent:function(e){var t=(0,b.select)("core/block-editor");if(t){var n=t.getSelectedBlockClientId(),o=t.getBlockInsertionPoint(n),l=o.index,r=o.rootClientId,a=wp.blocks.parse(e),i=m(a);(0,b.dispatch)("core/block-editor").insertBlocks(i,l,r)}},OmnipressContext:h,lockMouseInteraction:function(){var e;document.body.style.cursor="wait",null===(e=document.getElementById("omnipress"))||void 0===e||e.classList.add("op-pointer-events-none")},unlockMouseInteraction:function(){var e;document.body.style.cursor="default",null===(e=document.getElementById("omnipress"))||void 0===e||e.classList.remove("op-pointer-events-none")}}}var m=function(e){if(Array.isArray(e))return e.map((function(e){return e.innerBlocks&&(e.innerBlocks=m(e.innerBlocks)),!0!==e.isValid||e.name.includes("omnipress")?wp.blocks.createBlock(e.name,e.attributes,e.innerBlocks):e}))},y=n(790);function x(e){var t=e.children,n=e.openFilter,o=function(){var e=f().OmnipressContext;return(0,g.useContext)(e)}(),l=o.isFullScreen;return(0,y.jsx)("div",{className:"app-content-wrap op-relative op-mt-[60px] op-h-[100vh] op-max-h-[calc(100vh-120px)] op-overflow-y-auto op-bg-gray-100 op-scrollbar-thin op-scrollbar-track-slate-200 op-scrollbar-thumb-slate-700 op-scrollbar-track-rounded-full op-scrollbar-thumb-rounded-full dark:op-bg-dark-bg-color dark:op-scrollbar-track-slate-500",children:(0,y.jsx)("div",{style:l?{padding:0}:{},className:"op-relative ".concat(n?"op-gap-small":"op-gap-0"," op-mx-auto op-ml-auto op-items-start op-justify-between op-px-small op-py-small op-pt-12"),children:t})})}function k(){try{var e=!Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){})))}catch(e){}return(k=function(){return!!e})()}const v=function(e){function t(e){var n,o,l,r;return(0,s.A)(this,t),o=this,l=t,r=[e],l=(0,p.A)(l),(n=(0,u.A)(o,k()?Reflect.construct(l,r||[],(0,p.A)(o).constructor):l.apply(o,r))).state={error:null,errorInfo:null},n}return(0,d.A)(t,e),(0,c.A)(t,[{key:"componentDidCatch",value:function(e,t){this.setState({error:e,errorInfo:t})}},{key:"render",value:function(){return this.state.errorInfo?(0,y.jsx)(x,{children:(0,y.jsxs)("div",{className:"op-error-boundary op-h-full op-flex-1 op-overflow-hidden op-rounded-lg op-bg-white op-p-small dark:op-bg-gray-800",children:[(0,y.jsx)("h2",{className:"op-font-poppins op-text-18 op-font-semibold dark:op-text-light-text",children:(0,r.__)("Something went wrong.","omnipress")}),(0,y.jsx)("hr",{className:"op-my-2"}),(0,y.jsxs)("details",{className:"op-cursor-pointer dark:op-text-light-text",style:{whiteSpace:"pre-wrap"},children:[(0,y.jsx)("summary",{className:"op-mb-4",children:(0,r.__)("Click here to view details")}),(0,y.jsxs)("pre",{children:[this.state.error&&this.state.error.toString(),(0,y.jsx)("br",{}),this.state.errorInfo.componentStack]})]}),(0,y.jsx)("a",{href:(t=window.location.href.split("#")[0],t+=-1===t.indexOf("?")?"?force_cold_boot=true":"&force_cold_boot=true","".concat(t,"&op_nonce=").concat(null===(e=window._omnipress)||void 0===e?void 0:e.nonce)),className:"button dark:op-bg-gray-800 dark:op-text-light-text",children:(0,r.__)("Force Reload","omnipress")})]})}):this.props.children;var e,t}}])}(g.Component);var j=n(4182),O=n(4715),w=n(9016),_=n(2900),S=n(6427),P=(0,g.memo)((function(e){var t=e.tags,n=e.onClick,o=e.attributes,l=e.tagAttributeName;return t&&t.length>0&&t.map((function(e,t){return(0,y.jsx)("span",{onClick:function(){return n(e)},className:"".concat(o[l]===e?"op-block-settings-tag active":"op-block-settings-tag"),children:e},t)}))}));const A=function(e){var t=e.attributes,n=e.setAttributes,o=e.tagAttributeName,l=e.tags,a=e.label,s=(0,g.useCallback)((function(e){n((0,i.A)({},o,e))}),[o]);return(0,y.jsxs)("div",{className:"op-advanced-setting-wrap op-advanced-setting__tag op-flex op-flex-col op-gap-3",children:[(0,y.jsx)("div",{className:"op-advanced-setting__title",children:(0,y.jsx)("span",{className:"op-text-[13px] op-font-medium op-text-muted-foreground",children:(0,r.__)(a||"","omnipress")})}),(0,y.jsx)("div",{className:"op-advanced-setting__tag-container",children:(0,y.jsx)(P,{tags:l,onClick:s,attributes:t,tagAttributeName:o})})]})},N=(0,g.memo)((function(e){var t=e.onChange,n=e.label,o=e.value,l=e.attribute;return(0,y.jsxs)("div",{className:"op-flex op-items-center op-justify-between",children:[(0,y.jsx)("span",{className:"op-text-[13px] op-font-medium op-text-muted-foreground",children:(0,r.__)(n,"omnipress")}),(0,y.jsx)(S.ToggleControl,{className:"op-toggle-setting",label:"",checked:o,onChange:function(){return t(l)}})]})}));function H(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(e);t&&(o=o.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,o)}return n}function T(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?H(Object(n),!0).forEach((function(t){(0,i.A)(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):H(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}function I(e){var t=e.attributes,n=e.setAttributes,o=(e.isActive,e.context,(0,_.k)()),l=(0,g.useCallback)((function(e){n((0,i.A)({},(0,w.I)(e,o),!t[(0,w.I)(e,o)]))}),[t]);return(0,y.jsxs)(y.Fragment,{children:[(0,y.jsx)(S.PanelBody,{title:(0,r.__)("Content","omnipress"),children:(0,y.jsx)(w.j,{children:(0,y.jsxs)("div",{className:"op-grid op-gap-3",children:[(0,y.jsx)(A,{attributes:t,setAttributes:n,tagAttributeName:"headingType",label:(0,r.__)("Heading Tag","omnipress"),tags:["h1","h2","h3","h4","h5","h6","p","div"]}),(0,y.jsx)(S.ToggleControl,{type:"checkbox",label:(0,r.__)("Separator","omnipress"),checked:t.seperatorIsActive,labelPosition:"left",onChange:function(){n({seperatorIsActive:!t.seperatorIsActive})}})]})})}),(0,y.jsx)(S.PanelBody,{title:(0,r.__)("Link","omnipress"),initialOpen:!1,className:"op-additional__setting",children:(0,y.jsxs)(w.j,{children:[(0,y.jsx)(N,{label:(0,r.__)("Add Link","omnipress"),attribute:"isLink",value:t.isLink,onChange:function(){n({isLink:!t.isLink})}}),t.isLink&&(0,y.jsxs)("div",{className:"op-additional__setting",children:[(0,y.jsx)(S.TextControl,{type:"text",name:"heading-text",label:(0,r.__)("Link Text","omnipress"),placeholder:(0,r.__)("Enter Text","omnipress"),value:t.href||"",onChange:function(e){return n({href:e})}}),(0,y.jsx)(S.ToggleControl,{type:"checkbox",label:(0,r.__)("Open link in new tab","omnipress"),checked:t.newTab,onChange:function(){n({newTab:!t.newTab})},labelPosition:"right"})]})]})}),(0,y.jsx)(S.PanelBody,{initialOpen:!1,title:(0,r.__)("Sub Heading","omnipress"),children:(0,y.jsxs)(y.Fragment,{children:[(0,y.jsx)(w.j,{children:(0,y.jsx)(N,{label:(0,r.__)("Show Sub Heading","omnipress"),onChange:l,value:t.isOpenSubHeading,attribute:"isOpenSubHeading"})}),t.isOpenSubHeading&&(0,y.jsx)(w.j,{children:(0,y.jsx)(A,T({label:"Tag Name",tagAttributeName:"subheadingTagName",tags:["div","p","span"]},e))})]})})]})}function C(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(e);t&&(o=o.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,o)}return n}function D(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?C(Object(n),!0).forEach((function(t){(0,i.A)(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):C(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}function B(e){return(0,y.jsx)("div",{className:"op-block-settings-tabs__content-wrap",children:(0,y.jsx)(I,D({},e))})}var L=n(4997);function E(e){var t=e.attributes,n=t.blockId,o=t.content,l=t.subheadingTagName,r=t.subHeading,a=t.seperatorIsActive,i=(t.subHeadingStyling,t.headingStyles,t.headingType),s=t.isOpenSubHeading,c=e.setAttributes;return e.clientId,e.context,(0,y.jsxs)(y.Fragment,{children:[(0,y.jsx)(O.RichText,{className:"op-block__heading-content heading-".concat(n),value:o&&o.trim(),placeholder:"Wonderful heading",tagName:i,onKeyDown:function(e){if("Enter"===e.key){var t=(0,b.select)("core/block-editor");if(!t)return;var n=t.getSelectedBlockClientId(),o=t.getBlockInsertionPoint(n),l=o.index,r=o.rootClientId,a=(0,L.createBlock)("omnipress/paragraph");(0,b.dispatch)("core/block-editor").insertBlocks(a,l,r)}},onChange:function(e){c({content:e.trim()})}}),a&&(0,y.jsx)("div",{className:"op-block__heading-separator"}),s&&(0,y.jsx)(O.RichText,{value:r&&r.trim(),onChange:function(e){return c({subHeading:e.trim()})},placeholder:"Secondary heading",className:"op-block__heading-sub",tagName:l})]})}function R(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(e);t&&(o=o.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,o)}return n}function F(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?R(Object(n),!0).forEach((function(t){(0,i.A)(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):R(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}function M(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(e);t&&(o=o.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,o)}return n}function z(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?M(Object(n),!0).forEach((function(t){(0,i.A)(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):M(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}const W=function(e){var t=e.attributes,n=e.clientId,o=t.blockId,l=(t.seperator,t.headingStyles,t.subHeadingStyling,t.wrapper,t.seperatorIsActive),r=t.href,a=t.content,i=t.headingType,s=t.newTab,c=t.isLink,u=t.isOpenSubHeading,p=t.subheadingTagName,d=t.subHeading,b=O.useBlockProps.save({className:"op-block__heading-wrapper--".concat(o," op-").concat(o," op-block__heading-wrapper"),"data-type":"omnipress/heading"});return(0,y.jsxs)("div",z(z({id:n},b),{},{children:[(0,y.jsx)(O.RichText.Content,{className:"op-block__heading-content heading-".concat(o),value:a.trim(),tagName:i}),c&&(0,y.jsx)("a",{href:r,className:"op-heading__link","aria-label":"".concat(a,"-link"),rel:"noopener noreferrer",target:s?"_blank":"_self"}),l&&(0,y.jsx)("div",{role:"heading","aria-label":a,"aria-level":0,className:"op-block__heading-separator"}),u&&(0,y.jsx)(O.RichText.Content,{value:d,tagName:p,className:"op-block__heading-sub"})]}))};var $=n(2284);function V(e){return(e=e.charAt(0).toLowerCase()+e.slice(1)).replace(/([A-Z])/g,"-$1").toLowerCase()}var q=function(e,t){if(e){var n=Object.keys(e),o="".concat(t," {"),l="",r="",a="",i="",s=function(e,t,n){if("transform"==t){if(!e.translate.x&&!e.translate.y)return;"lg"===n?o+="".concat(t,":translate(").concat(e.translate.x||0,",  ").concat(e.translate.y||0,");"):"md"===n?l+="".concat(t,":translate(").concat(e.translate.x||0,",  ").concat(e.translate.y||0,");"):r+="".concat(t,":translate(").concat(e.translate.x||0,",  ").concat(e.translate.y||0,");")}else if("text-shadow"==t){if(!e.x||!e.y&&!e.color&&!e.blur)return;"lg"===n?o+="".concat(t,":").concat(e.x||0,"px  ").concat(e.y||0,"px ").concat(e.blur||0,"px ").concat(e.color,";"):"md"===n?l+="".concat(t,":").concat(e.x||0,"px  ").concat(e.y||0,"px ").concat(e.blur||0,"px ").concat(e.color,";"):r+="".concat(t,":").concat(e.x||0,"px  ").concat(e.y||0,"px ").concat(e.blur||0,"px ").concat(e.color,";")}else t.includes("hover")?a+="".concat(t.replace("hover",""),":").concat(e,";"):"object"!==(0,$.A)(e)?"lg"===n?o+="".concat(t,":").concat(e,";"):"md"===n?l+="".concat(t,":").concat(e,";"):r+="".concat(t,":").concat(e,";"):Object.keys(e).map((function(o){var l=V(o);o&&null!==e[o]&&s(e[o],"".concat(t,"-").concat(l),n)}))};return n.map((function(t){if(t&&null!==e[t])if(t.includes("md")){var n=t.replace("md","");n=V(n),s(e[t],n,"md")}else if(t.includes("sm")){var o=t.replace("sm","");o=V(o),s(e[t],o,"sm")}else{var l=V(t);s(e[t],l,"lg")}})),i="".concat(o,"}")+"".concat(t,":hover{\n        ").concat(a||"","\n    }"),0!==l.split().length&&(i+=" @media ( max-width:1024px ) { ".concat(t," { ").concat(l," }}")),0!==r.split().length&&(i+=" @media ( max-width:767px ) { ".concat(t," { ").concat(r," }}")),i}};function G(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(e);t&&(o=o.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,o)}return n}function J(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?G(Object(n),!0).forEach((function(t){(0,i.A)(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):G(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}function K(e){var t=e.attributes,n=t.seperatorIsActive;return t.blockId,n?(0,y.jsx)("div",{role:"heading-seperator",className:"op-advance-heading-seperator"}):null}function U(e){var t=e.attributes,n=t.isOpenSubHeading,o=t.subheadingTagName,l=t.subHeading;return n?(0,y.jsx)(O.RichText.Content,{value:l,tagName:o,className:"op-heading-sub-heading"}):null}function Y(e){var t=e.attributes,n=t.href,o=t.heading,l=t.headingType,r=t.newTab;return t.isLink?(0,y.jsx)("div",{children:(0,y.jsx)(t.headingType,{className:"op-block-heading-".concat(e.attributes.blockId),children:(0,y.jsx)("a",{href:n,style:{display:"block"},target:r?"_blank":"",rel:"noreferrer",children:t.heading})})}):(0,y.jsx)(O.RichText.Content,{value:o,tagName:l})}var Z=n(4122);function Q(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(e);t&&(o=o.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,o)}return n}function X(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?Q(Object(n),!0).forEach((function(t){(0,i.A)(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):Q(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}var ee=[{attributes:{headingStyles:{type:"object",default:{fontSize:null,mdFontSize:null,smFontSize:null,lineHeight:null,fontWeight:null,fontFamily:null,color:null,hovercolor:null,textAlign:null,mdTextAlign:null,smTextAlign:null,textShadow:{blur:null,color:null,x:null,y:null},padding:{top:null,right:null,bottom:null,left:null},mdPadding:{top:null,right:null,bottom:null,left:null},smPadding:{top:null,right:null,bottom:null,left:null},margin:{top:null,right:null,bottom:null,left:null},mdMargin:{top:null,right:null,bottom:null,left:null},smMargin:{top:null,right:null,bottom:null,left:null},background:null,hoverbackground:null,textDecoration:null,textTransform:null,border:{top:{width:null,style:null,color:null},right:{width:null,style:null,color:null},bottom:{width:null,style:null,color:null},left:{width:null,style:null,color:null}},mdBorder:{top:{width:null,style:null,color:null},right:{width:null,style:null,color:null},bottom:{width:null,style:null,color:null},left:{width:null,style:null,color:null}},smBorder:{top:{width:null,style:null,color:null},right:{width:null,style:null,color:null},bottom:{width:null,style:null,color:null},left:{width:null,style:null,color:null}},borderRadius:{topRight:null,topLeft:null,bottomRight:null,bottomLeft:null},zIndex:null,transform:{translate:{x:null,y:null}},mdTransform:{translate:{x:null,y:null}},smTransform:{translate:{x:null,y:null}},position:"relative",mdPosition:"relative",smPosition:"relative"}},isLink:{type:"boolean",default:!1},href:{type:"string"},newTab:{type:"boolean",default:!1},heading:{type:"string",default:"Discover the Secret to a Powerful Headline!"},blockId:{type:"string"},seperatorIsActive:{type:"boolean",default:!1},seperator:{type:"object",default:{height:"10px",mdHeight:"10px",smHeight:"10px",background:"green",width:"200px",mdWidth:"200px",smWidth:"200px",zIndex:null,color:null,hovercolor:null,position:null,display:"block",mdPosition:null,smPosition:null,margin:{top:null,right:null,bottom:null,left:null},mdMargin:{top:null,right:null,bottom:null,left:null},smMargin:{top:null,right:null,bottom:null,left:null},padding:{top:null,right:null,bottom:null,left:null},mdPadding:{top:null,right:null,bottom:null,left:null},smPadding:{top:null,right:null,bottom:null,left:null},transform:{translate:{x:null,y:null}},mdTransform:{translate:{x:null,y:null}},smTransform:{translate:{x:null,y:null}}}},subHeading:{type:"string",default:"Unlock the Power of Omnipress: Your WordPress Solution for Endless Possibilities!"},subheadingTagName:{type:"string",default:"p"},isOpenSubHeading:{type:"boolean",default:!1},isHeadingHideOnMobile:{type:"boolean",default:!1},isHeadingHideOnTablet:{type:"boolean",default:!1},isHeadingHideOnDesktop:{type:"boolean",default:!1},isSubHeadingHideOnMobile:{type:"boolean",default:!1},isSubHeadingHideOnTablet:{type:"boolean",default:!1},isSubHeadingHideOnDesktop:{type:"boolean",default:!1},isSeperatorHideOnMobile:{type:"boolean",default:!1},isSeperatorHideOnTablet:{type:"boolean",default:!1},isSeperatorHideOnDesktop:{type:"boolean",default:!1},headingType:{type:"string",default:"h2"},linkStyles:{type:"object",default:{color:null,hover:null}},subHeadingStyling:{type:"object",default:{width:null,color:null,textAlign:null,mobileTextAlign:null,tabletTextAlign:null,transform:{translate:{x:null,y:null}},mdTransform:{translate:{x:null,y:null}},textShadow:{blur:null,color:null,x:null,y:null},smTransform:{translate:{x:null,y:null}},fontWeight:null,margin:{top:null,right:null,bottom:null,left:null},mdMargin:{top:null,right:null,bottom:null,left:null},smMargin:{top:null,right:null,bottom:null,left:null},padding:{top:null,right:null,bottom:null,left:null},mdPadding:{top:null,right:null,bottom:null,left:null},smPadding:{top:null,right:null,bottom:null,left:null},position:"relative",mdPosition:null,smPosition:null,textDecoration:null,textTransform:null,fontSize:null,mdFontSize:null,smFontSize:null,display:"block",mdDisplay:"block",smDisplay:"block",fontFamily:null,zIndex:null,lineHeight:null}}},save:function(e){var t,n,o=e.attributes,l=o.blockId,r=o.seperator,a=o.headingType,i=o.headingStyles,s=o.subHeadingStyling,c=o.isLink,u=o.isHeadingHideOnDesktop,p=o.isHeadingHideOnTablet,d=o.isHeadingHideOnMobile,b=".op-block-heading-".concat(l," .op-advance-heading-seperator"),g=q(r,b),h=q(i,".op-block-heading-".concat(l,"  ").concat(c?"a":a)),f=q(s,".op-block-heading-".concat(l," .op-heading-sub-heading"));return(0,y.jsxs)("div",J(J({style:{background:o.headingStyles.background||"transparent"}},O.useBlockProps.save({className:"op-block-heading-".concat(l)})),{},{children:[(0,y.jsxs)("style",{className:"op-advance-heading-styles",type:"text/css",children:["\n\t\t\t\t\t  .op-block-heading-".concat(l,"{position:relative; } .op-block-heading-").concat(l,":hover{background:").concat(i.hoverbackgroundColor," } a{color:").concat((null===(t=o.linkStyles)||void 0===t?void 0:t.hoverBackgroundColor)||""," a:hover{ color:").concat(null===(n=o.linkStyles)||void 0===n?void 0:n.hover,' || "" }}\n            .op-block-heading-').concat(l,"{\n                display:").concat(u?"none":"block","\n              }\n\n            @media (max-width:1023px) {\n                .op-block-heading-").concat(l," {\n                  display:").concat(p?"none":"block","\n                };\n            }\n            @media (max-width:768px) {\n              .op-block-heading-").concat(l," {\n                display:").concat(d?"none":"block","\n              };\n            }"),g,h,f]}),(0,y.jsxs)("div",{className:"op-block-heading-".concat(o.blockId),style:{background:null==i?void 0:i.background},children:[(0,y.jsx)(Y,J({},e)),(0,y.jsx)(K,J({},e)),(0,y.jsx)(U,J({},e))]})]}))},supports:{className:!1}},{attributes:{headingStyles:{type:"object",default:{}},css:{type:"string"},wrapper:{type:"object",default:{}},blockLink:{type:"string",default:""},dataAttributes:{type:"string",default:""},variation:{type:"string"},isLink:{type:"boolean",default:!1},mdIsLink:{type:"boolean",default:!1},smIsLink:{type:"boolean",default:!1},href:{type:"string"},newTab:{type:"boolean",default:!1},heading:{type:"string",default:""},blockId:{type:"string"},seperatorIsActive:{type:"boolean",default:!1},seperator:{type:"object",default:{smDisplay:"block",mdDisplay:"block"}},subHeading:{type:"string",default:""},subheadingTagName:{type:"string",default:"p"},isOpenSubHeading:{type:"boolean",default:!1},headingType:{type:"string",default:"h2"},linkStyles:{type:"object",default:{}},subHeadingStyling:{type:"object",default:{smDisplay:"block",mdDisplay:"block"}},headingWrapper:{type:"object",default:{}}},save:function(e){var t,n,o=e.attributes,l=e.clientId,r=o.blockId,a=o.seperator,i=o.headingStyles,s=o.subHeadingStyling,c=o.wrapper,u=o.seperatorIsActive,p=o.href,d=o.heading,b=o.headingType,g=o.newTab,h=o.isLink,f=o.isOpenSubHeading,m=o.subheadingTagName,x=o.subHeading,k=".op-block__heading-wrapper--".concat(r,".op-").concat(r," .op-block__heading-separator"),v=O.useBlockProps.save({className:"op-block__heading-wrapper--".concat(r," op-").concat(r)});return(0,y.jsxs)("div",X(X({id:l},v),{},{children:[(0,y.jsx)("style",{className:"op-advance-heading-styles",type:"text/css",children:(n="",n+=null!==(t=o.css)&&void 0!==t?t:"",n+=(0,Z.A)(i,".op-block__heading-wrapper--".concat(r,".op-").concat(r," .op-block__heading-content.heading-").concat(r," "))+(0,Z.A)(s,".op-block__heading-wrapper--".concat(r,".op-").concat(r," .op-block__heading-sub"))+(0,Z.A)(a,k)+(0,Z.A)(c,".op-block__heading-wrapper--".concat(r,".op-").concat(r)))}),(0,y.jsx)(O.RichText.Content,{className:"op-block__heading-content heading-".concat(r),value:d,tagName:b}),h&&(0,y.jsx)("a",{href:p,className:"op-heading__link","aria-label":"".concat(d,"-link"),rel:"noopener noreferrer",target:g?"_blank":""}),u&&(0,y.jsx)("div",{role:"heading","aria-label":d,"aria-level":0,className:"op-block__heading-separator"}),f&&(0,y.jsx)(O.RichText.Content,{value:x,tagName:m,className:"op-block__heading-sub"})]}))},migrate:function(e){return{content:e.heading}},supports:{className:!1}}],te=a.name,ne=a.description,oe=a.opSettings,le=a.attributes;(0,o.A)(a,["name","description","opSettings","attributes"]);const re={name:te,icon:l.R_,title:(0,r.__)("Heading","omnipress"),attributes:le,description:(0,r.__)(ne,"omnipress"),usesContext:["postId","postType","queryId"],__experimentalLabel:function(e,t){var n,o=t.context,l=e.content,a=e.level,i=null==e||null===(n=e.metadata)||void 0===n?void 0:n.name,s=(null==l?void 0:l.trim().length)>0;return"list-view"===o&&(i||s)?i||l:"accessibility"===o?s?sprintf((0,r.__)("Level %1$s. %2$s"),a,l):sprintf((0,r.__)("Level %s. Empty."),a):void 0},example:{attributes:{headingStyles:{color:""},wrapper:{padding:{top:"22px 40px"},borderWidth:"2px",borderColor:"#fcb900",borderStyle:"solid"},heading:"Example Heading",blockId:"24fbeb8d",seperatorIsActive:!0,seperator:{smDisplay:"block",mdDisplay:"block",background:"#ff6900",width:"192px",height:"4px"},subHeading:"Another Secondary Heading",isOpenSubHeading:!0}},deprecated:ee,edit:function(e){var t=e.attributes,n=e.setAttributes,o=e.clientId,l=e.context,r=e.children,a=t.blockId,i=(0,O.useBlockProps)({className:"op-block__heading-wrapper--".concat(a," op-").concat(a),"data-type":"omnipress/heading"});return(0,y.jsx)(v,{children:(0,y.jsxs)("div",F(F({},i),{},{children:[(0,y.jsx)(E,{attributes:t,setAttributes:n,context:l}),r,(0,y.jsx)(j.G,{group:"general",clientId:o,children:(0,y.jsx)(B,F({},e))})]}))})},save:W,category:"omnipress",opSettings:oe}},3029:(e,t,n)=>{function o(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}n.d(t,{A:()=>o})},2901:(e,t,n)=>{n.d(t,{A:()=>r});var o=n(9922);function l(e,t){for(var n=0;n<t.length;n++){var l=t[n];l.enumerable=l.enumerable||!1,l.configurable=!0,"value"in l&&(l.writable=!0),Object.defineProperty(e,(0,o.A)(l.key),l)}}function r(e,t,n){return t&&l(e.prototype,t),n&&l(e,n),Object.defineProperty(e,"prototype",{writable:!1}),e}},3954:(e,t,n)=>{function o(e){return o=Object.setPrototypeOf?Object.getPrototypeOf.bind():function(e){return e.__proto__||Object.getPrototypeOf(e)},o(e)}n.d(t,{A:()=>o})},5361:(e,t,n)=>{function o(e,t){return o=Object.setPrototypeOf?Object.setPrototypeOf.bind():function(e,t){return e.__proto__=t,e},o(e,t)}function l(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function");e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,writable:!0,configurable:!0}}),Object.defineProperty(e,"prototype",{writable:!1}),t&&o(e,t)}n.d(t,{A:()=>l})},388:(e,t,n)=>{n.d(t,{A:()=>l});var o=n(2284);function l(e,t){if(t&&("object"==(0,o.A)(t)||"function"==typeof t))return t;if(void 0!==t)throw new TypeError("Derived constructors may only return object or undefined");return function(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e}(e)}}}]);