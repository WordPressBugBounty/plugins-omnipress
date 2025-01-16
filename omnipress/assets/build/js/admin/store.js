(()=>{"use strict";var t={n:e=>{var r=e&&e.__esModule?()=>e.default:()=>e;return t.d(r,{a:r}),r},d:(e,r)=>{for(var n in r)t.o(r,n)&&!t.o(e,n)&&Object.defineProperty(e,n,{enumerable:!0,get:r[n]})},o:(t,e)=>Object.prototype.hasOwnProperty.call(t,e),r:t=>{"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})}},e={};t.r(e),t.d(e,{fetchFromAPI:()=>O,filterCategoriesBySlugs:()=>T,setMouseState:()=>w,setProductCategories:()=>v,setUserPermission:()=>_});var r={};t.r(r),t.d(r,{FETCH_FROM_API:()=>h});var n={};t.r(n),t.d(n,{canUserEditSettings:()=>j});var o={};t.r(o),t.d(o,{canUserEditSettings:()=>L,getApiData:()=>R,getFilteredCategories:()=>k,getMouseState:()=>I,getProductCategories:()=>U}),window.wp.blocks;const s=window.wp.coreData,i=window.wp.data,a=window.wp.editor,c=window.wp.i18n,u=window.wp.notices,l=window.wp.apiFetch;var y=t.n(l);function p(t,e){(null==e||e>t.length)&&(e=t.length);for(var r=0,n=Array(e);r<e;r++)n[r]=t[r];return n}function d(t){return function(t){if(Array.isArray(t))return p(t)}(t)||function(t){if("undefined"!=typeof Symbol&&null!=t[Symbol.iterator]||null!=t["@@iterator"])return Array.from(t)}(t)||function(t,e){if(t){if("string"==typeof t)return p(t,e);var r={}.toString.call(t).slice(8,-1);return"Object"===r&&t.constructor&&(r=t.constructor.name),"Map"===r||"Set"===r?Array.from(t):"Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r)?p(t,e):void 0}}(t)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function f(t){return f="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},f(t)}function S(t,e,r){return(e=function(t){var e=function(t){if("object"!=f(t)||!t)return t;var e=t[Symbol.toPrimitive];if(void 0!==e){var r=e.call(t,"string");if("object"!=f(r))return r;throw new TypeError("@@toPrimitive must return a primitive value.")}return String(t)}(t);return"symbol"==f(e)?e:e+""}(e))in t?Object.defineProperty(t,e,{value:r,enumerable:!0,configurable:!0,writable:!0}):t[e]=r,t}function g(t,e){var r=Object.keys(t);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(t);e&&(n=n.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),r.push.apply(r,n)}return r}function b(t){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{};e%2?g(Object(r),!0).forEach((function(e){S(t,e,r[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(r)):g(Object(r)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(r,e))}))}return t}var m={categories:[],filteredCategoryList:{},mouseState:"normal",canUserEditSetting:!1,userSettings:{},apiData:{}},E={setCategories:"SET_CATEGORIES",filterCategoriesBySlugs:"FILTER_CATEGORIES_BY_SLUGS",setMouseState:"SET_MOUSE_STATE",fetchFromApi:"FETCH_FROM_API",setUserPermission:"SET_USER_PERMISSION",setUserSettings:"SET_USER_SETTINGS"};var v=function(t){return{type:E.setCategories,categories:t}},T=function(t,e){return{type:E.filterCategoriesBySlugs,blockId:t,slugs:e}},w=function(t){return{type:E.setMouseState,state:t}};function _(t){return{type:E.setUserPermission,canUserEditSetting:t}}function O(){return{type:E.fetchFromApi,path:"omnipress/v1/block-settings/blocks/disabled?action=can-edit"}}function h(t){return y()({path:t.path,method:"POST"})}const A=window.regeneratorRuntime;var C=t.n(A),P=C().mark(j);function j(){var t;return C().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return e.next=2,O();case 2:return t=e.sent,e.abrupt("return",_(t));case 4:case"end":return e.stop()}}),P)}function U(t){var e;return null!==(e=t.categories)&&void 0!==e?e:[]}var k=function(t,e){var r;return null!==(r=t.filteredCategoryList["cat_list_".concat(e)])&&void 0!==r?r:[]},I=function(t){return t.mouseState};function L(t){return t.canUserEditSetting}function R(t){return t.canUserEditSetting}var D,N={reducer:function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:m,e=arguments.length>1?arguments[1]:void 0;switch(e.type){case E.setCategories:return b(b({},t),{},{categories:d(e.categories)});case E.filterCategoriesBySlugs:return Array.isArray(e.slugs)?b(b({},t),{},{filteredCategoryList:b(b({},t.filteredCategoryList),{},S({},e.blockId,d(t.categories.filter((function(t){return e.slugs.includes(t.slug)})))))}):b(b({},t),{},{filteredCategoryList:S({},e.blockId,t.categories.filter((function(t){return t.slug.includes(e.slugs)})))});case"SET_USER_PERMISSION":return b(b({},t),{},{canUserEditSetting:e.canUserEditSetting});case E.setMouseState:return b(b({},t),{},{mouseState:e.state});default:return t}},controls:r,actions:e,selectors:o,resolvers:n};function F(t,e){var r=Object.keys(t);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(t);e&&(n=n.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),r.push.apply(r,n)}return r}function M(t){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{};e%2?F(Object(r),!0).forEach((function(e){S(t,e,r[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(r)):F(Object(r)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(r,e))}))}return t}null===(D=window._omnipress||{})||void 0===D||D.breakpoints;var Y={styles:!1,styleAttributes:null,editedComponents:null},B={fetchStyles:function(){return{type:"FETCH_STYLES"}},fetchStylesAttributes:function(){return{type:"FETCH_STYLES_ATTRIBUTES"}},addNewStyleComponent:function(t){return{type:"SAVE_STYLES",payload:t}},setStyleAttributes:function(t){return{type:"SET_STYLE_ATTRIBUTES",payload:{styleAttributes:t}}},setStateStyles:function(t){return{type:"SET_STYLES_STATE",payload:{style:t}}},deleteStyledComponent:function(t){return{type:"DELETE_STYLE",payload:t}},updateStyledComponent:function(t){return{type:"UPDATE_STYLE",payload:t}},updateEditedComponents:function(t){return{type:"UPDATE_EDITED_COMPONENTS",payload:t}}},G={FETCH_STYLES:function(){return y()({path:"/omnipress/v1/global-styles",method:"GET"})},FETCH_STYLES_ATTRIBUTES:function(){return y()({path:"/omnipress/v1/global-styles/attributes",method:"GET"})}},x={getGlobalComponents:C().mark((function t(){var e;return C().wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return t.next=2,B.fetchStyles();case 2:return e=t.sent,t.abrupt("return",B.setStateStyles(e));case 4:case"end":return t.stop()}}),t)})),getStyleAttributes:C().mark((function t(){var e;return C().wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return t.next=2,B.fetchStylesAttributes();case 2:return e=t.sent,t.abrupt("return",B.setStyleAttributes(e));case 4:case"end":return t.stop()}}),t)}))},H="omnipress/global-styles",V=(0,i.createReduxStore)(H,{actions:B,controls:G,resolvers:x,reducer:function(){var t,e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:Y,r=arguments.length>1?arguments[1]:void 0;switch(r.type){case"SET_STYLES_STATE":return M(M({},e),{},{styles:r.payload.style});case"SET_STYLE_ATTRIBUTES":return M(M({},e),{},{styleAttributes:r.payload.styleAttributes});case"SAVE_STYLES":return e.styles||(e.styles={}),M(M({},e),{},{styles:M(M({},e.styles),{},S({},r.payload.blockName,M(M({},e.styles[r.payload.blockName]),{},S({},r.payload.id,r.payload.style))))});case"DELETE_STYLE":return e.styles||(e.styles={}),M(M({},e),{},{styles:M(M({},e.styles),{},S({},r.payload.blockName,M(M({},e.styles[r.payload.blockName]),{},S({},r.payload.id,void 0))))});case"UPDATE_STYLE":return e.styles||(e.styles={}),M(M({},e),{},{styles:M(M({},e.styles),{},S({},r.payload.blockName,M(M({},null===(t=e.styles)||void 0===t?void 0:t[r.payload.blockName]),{},S({},r.payload.id,r.payload.style))))});default:return e}},selectors:{getGlobalComponents:function(t){return t.styles},getChangedComponents:function(t){return t.updatedStyles},getStyleForBlock:function(t,e){return!!t.styles&&t.styles[e]},getStyleAttributes:function(t,e){return!!t.styleAttributes&&t.styleAttributes[e]},getBlockStyleAttributeNames:function(t,e){return!!t.styleAttributes&&t.styleAttributes[e]},getComponentStyle:function(t,e,r){var n;return!!t.styles&&(null===(n=t.styles[e])||void 0===n?void 0:n[r])},getEditedComponents:function(t){return t.editedComponents}}});(0,i.select)(H)||(0,i.register)(V);var $=!1,q=(0,i.createReduxStore)("omnipress/block-store",N);(0,i.register)(q),(0,i.subscribe)((function(){var t=(0,i.select)(a.store).getCurrentPostId(),e=(0,i.select)(a.store).getCurrentPostType(),r=(0,i.select)("core/editor").isSavingNonPostEntityChanges()||(0,i.select)(s.store).isSavingEntityRecord("postType",e,t),n=(0,i.select)(s.store).isAutosavingEntityRecord("postType","post",t);(0,i.select)(s.store).getEntityRecords("postType","wp_template_part",{}),!$||r||n||setTimeout((function(){var t=(0,i.dispatch)(u.store),e=t.createErrorNotice,r=t.createSuccessNotice,n={},o=(0,i.select)(H);if(o){var s=o.getGlobalComponents();(0,i.dispatch)(H).setStateStyles,Object.assign(n,{styles:s})}y()({path:"/omnipress/v1/global-styles",method:"PUT",data:n}).then((function(t){if(t)return r((0,c.__)("Component Saved Successfully","omnipress"),{type:"snackbar",icon:"🔥"}),t;e((0,c.__)("Something went wrong!","omnipress"),{type:"snackbar",icon:"😔"})})).catch((function(t){e((0,c.__)("Error occurred: ","omnipress")+t.message,{type:"snackbar",icon:"😔"})}))}),0),$=r}))})();