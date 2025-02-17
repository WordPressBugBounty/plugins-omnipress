(globalThis.webpackChunkomnipress=globalThis.webpackChunkomnipress||[]).push([[49],{8049:(e,o,t)=>{"use strict";t.r(o),t.d(o,{default:()=>S});var n=t(4467),i=t(42),s=t(3453),r=t(4715),p=t(6427),a=t(7143),l=t(6087),c=t(7723),u=t(6942),d=t.n(u),m=t(7965),g=t.n(m),f=t(8520),b=t(790),_=[{name:"modal",title:(0,c.__)("Modal","omnipress"),description:(0,c.__)("This popup use modal layout."),attributes:{popupType:"modal"},scope:["block"],isActive:function(e){return"modal"===e.popupType},icon:(0,b.jsx)(f.jVX,{})},{name:"floating_bar",title:(0,c._x)("Floating Bar","Floating bar layout popup."),description:(0,c.__)("Floating bar layout popup.","omnipress"),attributes:{popupType:"floating_bar"},scope:["block"],isActive:function(e){return"floating_bar"===e.popupType},icon:(0,b.jsx)(f.R9r,{})},{name:"slide_in",title:(0,c._x)("Drawer","Slide in layout popup."),description:(0,c.__)("Slide in layout popup.","omnipress"),attributes:{popupType:"slide_in"},scope:["block"],isActive:function(e){return"slide_in"===e.popupType},icon:(0,b.jsx)(f.R9r,{})}],h=t(7432),x=t(4182),y={modal:[["omnipress/container",{preview:!1,wrapper:{backgroundColor:"#f3f3f3",padding:"40px 0px"},flex:{flexDirection:"column"}},[["omnipress/icon-box",{wrapper:{backgroundColor:"",padding:"20px"},iconStyle:{justifyContent:"center",fontSize:"44px"}}],["omnipress/button",{buttonAlign:"center",button:{gap:"16px"},icon:"fas fa-arrow-circle-right",content:"Get Started Now"}]]]],floating_bar:[["omnipress/container",{preview:!1,wrapper:{backgroundColor:"#150ed5",padding:"18px"},flex:{alignItems:"center"}},[["omnipress/countdown",{isSeparator:!1,container:{backgroundColor:"#ffffff",borderRadius:"5px",padding:"5px"},wrapper:{width:"32%"}}],["omnipress/heading",{headingType:"h4",content:"Grab The Offer",headingStyles:{color:"#ffffff"}}],["omnipress/button",{buttonAlign:"right"}]]]],slide_in:[["omnipress/heading",{wrapper:{margin:"0 0px 16px 0px"},headingType:"h4",content:"Omnipress Drawer"}],["omnipress/container",{wrapper:{padding:"0px 0px 8px 0px"},flex:{columnGap:"20px",justifyContent:"flex-start",alignItems:"center"},preview:!1},[["omnipress/icons",{iconClassName:"fas fa-home"}],["omnipress/paragraph",{content:"Dashboard",wrapper:{padding:"0px 0px 0px 0px"}}]]],["omnipress/container",{wrapper:{padding:"0px 0px 16px 0px"},flex:{columnGap:"20px",justifyContent:"flex-start",alignItems:"center"},preview:!1},[["omnipress/icons",{iconClassName:"fas fa-search"}],["omnipress/paragraph",{content:"Search"}]]],["omnipress/container",{wrapper:{padding:"0px 0px 16px 0px"},flex:{columnGap:"20px",justifyContent:"flex-start",alignItems:"center"},preview:!1},[["omnipress/icons",{iconClassName:"fas fa-calendar-alt"}],["omnipress/paragraph",{content:"Bookings"}]]],["core/separator",{className:"is-style-wide",style:{color:{background:"#696969"}}}],["omnipress/container",{wrapper:{padding:"0px 0px 0px 0px"},flex:{columnGap:"",justifyContent:"space-between"},preview:!1},[["omnipress/paragraph",{content:"Others Settings",wrapper:{fontWeight:"Regular"}}],["omnipress/icons",{iconClassName:"fas fa-chevron-down"}]]],["omnipress/container",{wrapper:{padding:"0px 0px 0px 10px",borderStyle:"solid",borderWidth:"0px 0px 0px 1px",margin:"12px 0px 0px 30px"},flex:{flexDirection:"column"},preview:!1},[["omnipress/paragraph",{content:"View Available Options",wrapper:{fontWeight:500,color:"#B0B0B0"}}],["omnipress/paragraph",{content:"Others Settings",wrapper:{fontWeight:500,color:"#B0B0B0"}}],["omnipress/paragraph",{content:"Events",wrapper:{fontWeight:500,color:"#B0B0B0"}}],["omnipress/paragraph",{content:"Articles",wrapper:{fontWeight:500,color:"#B0B0B0"}}]]]]},v=[{slug:"on_page_load",name:(0,c.__)("Page Load","omnipress")},{slug:"on_exit_intend",name:(0,c.__)("Exit Intend","omnipress")},{slug:"on_scroll",name:"Scroll"},{slug:"on_inactivity",name:"Inactivity"},{slug:"on_click",name:"On Click"}],w={on_page_load:{help:(0,c.__)("Select the time delay (in seconds) after which the popup should appear once the page is fully loaded.","omnipress"),label:(0,c.__)("Popup Display Delay","omnipress")},on_scroll:{help:(0,c.__)("Display the popup after the user has scrolled a specified percentage of the page.","omnipress"),label:(0,c.__)("Scroll Trigger Percentage","omnipress"),max:200,step:1},on_inactivity:{help:(0,c.__)("Trigger the popup after the user has been inactive for a specified duration.","omnipress"),label:(0,c.__)("Inactivity Trigger Time","omnipress")}},j=[{slug:"top",name:(0,c.__)("Top","omnipress")},{slug:"right",name:(0,c.__)("Right","omnipress")},{slug:"bottom",name:(0,c.__)("Bottom","omnipress")},{slug:"left",name:(0,c.__)("Left","omnipress")}],C=[{slug:"center",name:(0,c.__)("Center","omnipress")},{slug:"top_left",name:(0,c.__)("Top Left","omnipress")},{slug:"top_right",name:(0,c.__)("Top Right","omnipress")},{slug:"bottom_left",name:(0,c.__)("Bottom Left","omnipress")},{slug:"bottom_right",name:(0,c.__)("Bottom Right","omnipress")}],k={slide_in:{label:(0,c.__)("Slide In Position","omnipress"),options:j,name:"slidePosition"},modal:{label:(0,c.__)("Modal Position","omnipress"),options:C,name:"modalPosition"}};function P(e,o){var t=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);o&&(n=n.filter((function(o){return Object.getOwnPropertyDescriptor(e,o).enumerable}))),t.push.apply(t,n)}return t}function D(e){for(var o=1;o<arguments.length;o++){var t=null!=arguments[o]?arguments[o]:{};o%2?P(Object(t),!0).forEach((function(o){(0,n.A)(e,o,t[o])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(t)):P(Object(t)).forEach((function(o){Object.defineProperty(e,o,Object.getOwnPropertyDescriptor(t,o))}))}return e}var T=function(e){var o,t,i,r,a,u=e.attributes,d=e.setAttributes,m=u.maxPopupRepetitions,f=(u.showEveryTime,u.delayBeforePopup),_=u.popupTrigger,x=u.displayAfterVisits,y=u.popupType,j=(u.slidePosition,u.modalPosition,u.autoCloseEnabled),C=u.autoCloseDelay,P=u.isDismissible,D=u.closeButtonDelay,T="on_exit_intend"!==_&&"on_click"!==_,O="floating_bar"!==y,B=k[y],I=(0,l.useState)(),S=(0,s.A)(I,2),A=S[0],N=S[1],R=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"";g()(e,{debug:!0,message:"Copied ID"}),N(e),setTimeout((function(){N(null)}),700)};return(0,b.jsxs)(b.Fragment,{children:[(0,b.jsx)(p.PanelBody,{title:(0,c.__)("General","omnipress"),children:(0,b.jsxs)(h.j,{children:[(0,b.jsx)(p.__experimentalDimensionControl,{__nextHasNoMarginBottom:!0,label:(0,c.__)("Triggered Options"),value:_,sizes:v,onChange:function(e){d({popupTrigger:e})}}),O&&(0,b.jsx)(p.__experimentalDimensionControl,{__nextHasNoMarginBottom:!0,sizes:null==B?void 0:B.options,value:u[null==B?void 0:B.name],label:(0,c.__)(null==B?void 0:B.label,"omnipress"),onChange:function(e){d((0,n.A)({},null==B?void 0:B.name,e))}}),T&&(0,b.jsx)(p.RangeControl,{__nextHasNoMarginBottom:!0,help:null===(o=w[_])||void 0===o?void 0:o.help,initialPosition:0,max:(null===(t=w[_])||void 0===t?void 0:t.max)||20,min:0,step:(null===(i=w[_])||void 0===i?void 0:i.step)||.1,onChange:function(e){d({delayBeforePopup:e})},value:f,label:(null===(r=w[_])||void 0===r?void 0:r.label)||(0,c.__)("Time Delay","omnipress")}),A==="optpop-".concat(u.instanceId)&&(0,b.jsx)("p",{className:"op-mb-3 op-text-green-700",children:(0,c.__)("Copied Text optpop-".concat(u.instanceId),"omnipress")}),"on_click"===_&&(0,b.jsxs)("p",{className:"op-mb-3 op-cursor-copy",onClick:function(){return R("optpop-".concat(u.instanceId))},children:[(0,c.__)("Copy the ID ","omnipress"),(0,b.jsx)("code",{children:(0,c.__)("optpop-".concat(u.instanceId),"omnipress")}),(0,c.__)("then insert it into the class name of any block to trigger this popup.","omnipress")]}),(0,b.jsx)(p.RangeControl,{__nextHasNoMarginBottom:!0,initialPosition:0,max:100,min:0,step:1,onChange:function(e){d({displayAfterVisits:e})},value:x,help:(0,c.__)("Trigger after a user has visited the site a certain number of times.","omnipress"),label:(0,c.__)("After Number of Visits","omnipress")})]})}),(0,b.jsx)(p.PanelBody,{initialOpen:!1,title:(0,c.__)("Close Button","omnipress"),children:(0,b.jsxs)(h.j,{children:[(0,b.jsx)(p.ToggleControl,{label:(0,c.__)("Dismissible","omnipress"),onChange:function(){d({isDismissible:!P})},checked:P}),A==="opcpop-".concat(u.instanceId)&&(0,b.jsx)("p",{className:"op-mb-3 op-text-green-700",children:(0,c.__)("Copied Text opcpop-".concat(u.instanceId),"omnipress")}),!P&&(0,b.jsxs)("span",{className:"op-mb-3 op-cursor-copy op-text-gray-600",onClick:function(){return R("opcpop-".concat(u.instanceId))},children:[(0,c.__)("Copy the ID  ","omnipress"),(0,b.jsx)("code",{children:"opcpop-".concat(u.instanceId)}),(0,c.__)("  then insert it into the class name of any block to close the popup.","omnipress")]}),"1"===(null===(a=window._omnipress)||void 0===a?void 0:a.status)&&(0,b.jsxs)(b.Fragment,{children:[(0,b.jsx)(p.RangeControl,{__nextHasNoMarginBottom:!0,initialPosition:0,max:60,min:0,step:1,onChange:function(e){d({closeButtonDelay:e})},value:D,help:(0,c.__)("Set the number of seconds before the close button appears on the popup. A value of 0 will make the close button visible immediately. This setting allows you to delay the close button to encourage users to engage with the popup content before they can close it.","omnipress"),label:(0,c.__)("Close Button Delay (seconds)","omnipress")}),(0,b.jsx)(p.ToggleControl,{label:(0,c.__)("Auto Close","omnipress"),onChange:function(){d({autoCloseEnabled:!j})},checked:j}),j&&(0,b.jsx)(p.RangeControl,{__nextHasNoMarginBottom:!0,initialPosition:0,max:10,min:0,step:1,onChange:function(e){d({autoCloseDelay:e})},value:C,help:(0,c.__)("Set the number of seconds before the popup automatically closes. This setting is only effective if the 'Enable Auto Close' option is turned on.","omnipress"),label:(0,c.__)("Close Button (seconds)","omnipress")})]})]})}),(0,b.jsx)(p.PanelBody,{title:(0,c.__)("Repetition","omnipress"),initialOpen:!1,children:(0,b.jsxs)(h.j,{children:[(0,b.jsx)(p.ToggleControl,{label:(0,c.__)("Infinite","omnipress"),onChange:function(){d({maxPopupRepetitions:-1!==m?-1:1})},checked:-1==m}),-1!==m&&(0,b.jsx)(p.RangeControl,{__nextHasNoMarginBottom:!0,help:(0,c.__)("Repetition will only count on close popup no in refresh.","omnipress"),initialPosition:0,label:(0,c.__)("Times","omnipress"),max:20,min:0,step:1,onChange:function(e){d({maxPopupRepetitions:e})},value:m})]})})]})},O=function(e){var o=e.onChange;return(0,b.jsxs)(b.Fragment,{children:[(0,b.jsx)("h3",{className:"op-text-center op-text-2xl",children:(0,c.__)("Omnipress Popup Builder","omnipress")}),(0,b.jsx)("p",{className:"op-mb-5 op-text-center",children:(0,c.__)("Select which types of popup you want to use on page.","omnipress")}),(0,b.jsx)("ul",{className:"op-flex op-items-center op-justify-center op-gap-6 op-border op-border-dashed op-border-primary op-p-20",children:_.map((function(e){return(0,b.jsxs)("li",{children:[(0,b.jsx)("button",{className:"op-cursor-pointer op-border op-border-solid op-bg-transparent op-px-6 op-py-3 op-text-54",onClick:function(){return o(e)},children:e.icon}),(0,b.jsx)("h5",{className:"op-mt-3",children:e.title})]},e.name)}))})]})};function B(e,o){var t=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);o&&(n=n.filter((function(o){return Object.getOwnPropertyDescriptor(e,o).enumerable}))),t.push.apply(t,n)}return t}function I(e){for(var o=1;o<arguments.length;o++){var t=null!=arguments[o]?arguments[o]:{};o%2?B(Object(t),!0).forEach((function(o){(0,n.A)(e,o,t[o])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(t)):B(Object(t)).forEach((function(o){Object.defineProperty(e,o,Object.getOwnPropertyDescriptor(t,o))}))}return e}const S=I(I({edit:function(e){var o=e.attributes,t=e.setAttributes,i=e.clientId,s=e.children,p=o.popupType,c=o.modalPosition,u=void 0===c?"center_center":c,m=o.preview,g=o.blockId,f=o.slidePosition,_=void 0===f?"left":f,h=(0,r.useBlockProps)({className:d()("op-block__popup",(0,n.A)((0,n.A)((0,n.A)((0,n.A)({},"op-".concat(g),g),"op-popup-".concat(p),p),"slide-".concat(_," align").concat(_),"slide_in"===p),"modal-".concat(u," align").concat(u),"modal"===p)),style:{maxWidth:"100%",minWidth:"0"}});(0,a.useSelect)((function(e){if(!o.instanceId){var n=e("core/editor").getCurrentPostId();t({instanceId:n})}}),[]);var v=(0,l.useCallback)((function(e){"slide_in"!==e.name?t({popupType:e.name,preview:!1}):t({popupType:e.name,preview:!1,wrapper:{padding:"20px",backgroundColor:"#fff"}})}),[]);return(0,b.jsxs)("div",D(D({},h),{},{children:[s,m&&(0,b.jsx)(O,{onChange:v}),!m&&(0,b.jsxs)(b.Fragment,{children:["modal"===o.popupType&&(0,b.jsx)("style",{children:".op-block__popup.op-popup-modal{max-height:100vh;animation:1s cubic-bezier(.25,1,.3,1) 0s 1 normal both running wipe-in-down;min-height:100vh;width:100%;top:0;left:0;max-width:100%;z-index:10;background:rgba(0,0,0,.7568627451);display:flex;align-items:center;justify-content:center}.op-block__popup.op-popup-modal.modal-top_left{align-items:flex-start;justify-content:flex-start}.op-block__popup.op-popup-modal.modal-top_right{align-items:flex-start;justify-content:flex-end}.op-block__popup.op-popup-modal.modal-bottom_left{align-items:flex-end;justify-content:flex-start}.op-block__popup.op-popup-modal.modal-bottom_right{align-items:flex-end;justify-content:flex-end"}),(0,b.jsxs)("div",{className:"op-popup-builder__wrapper",children:[(0,b.jsx)("button",{"data-wp-on--click":"actions.closePopup",className:"op-popup__close-btn",children:(0,b.jsx)("i",{className:"fas fa-times"})}),(0,b.jsx)(r.InnerBlocks,{template:y[p]})]}),(0,b.jsx)(x.G,{group:"general",clientId:i,children:(0,b.jsx)(T,{attributes:o,setAttributes:t})})]})]}))},save:function(e){return e.attributes,(0,b.jsx)(r.InnerBlocks.Content,{})},variations:_},JSON.parse('{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":2,"name":"omnipress/popup","version":"1.0.0","title":"Popup","category":"omnipress","icon":"","description":"You can create beautiful popup.","supports":{"className":true,"anchor":true,"interactivity":true},"attributes":{"blockId":{"type":"string"},"content":{"type":"string"},"delayBeforePopup":{"type":"number","default":1},"displayAfterVisits":{"type":"number","default":0},"showEveryTime":{"type":"boolean","default":false},"preview":{"type":"boolean","default":true},"isDismissible":{"type":"boolean","default":true},"closeButtonDelay":{"type":"number","default":0},"autoCloseEnabled":{"type":"boolean","default":false},"autoCloseDelay":{"type":"number","default":30},"instanceId":{"type":"number"},"popupType":{"type":"string","default":"floating_bar"},"popupTrigger":{"type":"string","default":"on_page_load"},"popupPosition":{"type":"string"},"modalPosition":{"type":"string"},"slidePosition":{"type":"string"},"maxPopupRepetitions":{"type":"number","default":1}},"opSettings":{"card":{"group":"design","selector":".op-block__post-grid-card-wrap .op-block__post-grid-card.op-block__post-grid-card-items","label":"card","fields":{"color":{"background":true},"dimension":{"width":true,"height":true},"spacing":{"padding":true,"margin":true},"border":{"border":true,"borderRadius":true}}}},"textdomain":"omnipress"}')),{},{icon:i.lY})},7965:(e,o,t)=>{"use strict";var n=t(6426),i={"text/plain":"Text","text/html":"Url",default:"Text"};e.exports=function(e,o){var t,s,r,p,a,l,c=!1;o||(o={}),t=o.debug||!1;try{if(r=n(),p=document.createRange(),a=document.getSelection(),(l=document.createElement("span")).textContent=e,l.ariaHidden="true",l.style.all="unset",l.style.position="fixed",l.style.top=0,l.style.clip="rect(0, 0, 0, 0)",l.style.whiteSpace="pre",l.style.webkitUserSelect="text",l.style.MozUserSelect="text",l.style.msUserSelect="text",l.style.userSelect="text",l.addEventListener("copy",(function(n){if(n.stopPropagation(),o.format)if(n.preventDefault(),void 0===n.clipboardData){t&&console.warn("unable to use e.clipboardData"),t&&console.warn("trying IE specific stuff"),window.clipboardData.clearData();var s=i[o.format]||i.default;window.clipboardData.setData(s,e)}else n.clipboardData.clearData(),n.clipboardData.setData(o.format,e);o.onCopy&&(n.preventDefault(),o.onCopy(n.clipboardData))})),document.body.appendChild(l),p.selectNodeContents(l),a.addRange(p),!document.execCommand("copy"))throw new Error("copy command was unsuccessful");c=!0}catch(n){t&&console.error("unable to copy using execCommand: ",n),t&&console.warn("trying IE specific stuff");try{window.clipboardData.setData(o.format||"text",e),o.onCopy&&o.onCopy(window.clipboardData),c=!0}catch(n){t&&console.error("unable to copy using clipboardData: ",n),t&&console.error("falling back to prompt"),s=function(e){var o=(/mac os x/i.test(navigator.userAgent)?"⌘":"Ctrl")+"+C";return e.replace(/#{\s*key\s*}/g,o)}("message"in o?o.message:"Copy to clipboard: #{key}, Enter"),window.prompt(s,e)}}finally{a&&("function"==typeof a.removeRange?a.removeRange(p):a.removeAllRanges()),l&&document.body.removeChild(l),r()}return c}},6426:e=>{e.exports=function(){var e=document.getSelection();if(!e.rangeCount)return function(){};for(var o=document.activeElement,t=[],n=0;n<e.rangeCount;n++)t.push(e.getRangeAt(n));switch(o.tagName.toUpperCase()){case"INPUT":case"TEXTAREA":o.blur();break;default:o=null}return e.removeAllRanges(),function(){"Caret"===e.type&&e.removeAllRanges(),e.rangeCount||t.forEach((function(o){e.addRange(o)})),o&&o.focus()}}}}]);