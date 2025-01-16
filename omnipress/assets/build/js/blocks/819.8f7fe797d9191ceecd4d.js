"use strict";(globalThis.webpackChunkomnipress=globalThis.webpackChunkomnipress||[]).push([[819],{4819:(e,t,r)=>{r.r(t),r.d(t,{default:()=>k});var o=r(4467),s=r(42),a=r(7438),n=r(1821),i=r(4715),c=r(4997),l=r(7143),u=r(6087),p=r(2619),d=r(7723),g=r(9644),m=r(6427),b=r(9016),f=r(4182),y=r(2900);const _=JSON.parse('{"y":{"image":false,"title":false,"ratings":false,"price":false,"regularPrice":false,"discountPercent":false,"addToCart":false,"badge":false}}');var j=r(790);function h(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(e);t&&(o=o.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,o)}return r}function w(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?h(Object(r),!0).forEach((function(t){(0,o.A)(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):h(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}const v=(0,u.memo)((function(e){var t=e.attributes,r=e.setAttributes,s=e.clientId,n=(0,y.k)(),i=t.sortType,c=t.columns,l=(t.rows,t.offset),p=(t.order,t.orderby,t.smColumns),g=t.mdColumns,h=(0,u.useCallback)((function(e){r({sortType:e})}),[i]),v=(0,u.useMemo)((function(){var e=(0,b.I)("columns",n);return{columnsCount:t[e],columnsCountPropertyName:e}}),[n,c,p,g]),x=v.columnsCount,O=v.columnsCountPropertyName;return(0,j.jsxs)(f.G,{clientId:s,group:"general",children:[(0,j.jsxs)(m.PanelBody,{title:(0,d.__)("Content","omnipress"),children:[(0,j.jsx)(a.mo,{onChange:function(e){r({category:e})},value:t.category,url:"/omnipress/v1/categories"}),(0,j.jsx)(a.u8,{value:i,onChange:h}),(0,j.jsxs)(b.j,{children:[(0,j.jsx)(m.RangeControl,{max:12,min:1,label:(0,d.__)("Per Page","omnipress"),value:t.perPage,onChange:function(e){r({perPage:e})}}),(0,j.jsx)(m.RangeControl,{min:0,max:6,label:"Offset",onChange:function(e){return r({offset:e})},value:l||0}),(0,j.jsx)(y.Qg,{label:"Columns"}),(0,j.jsx)(m.RangeControl,{max:12,min:1,label:(0,d.__)("","omnipress"),value:x,onChange:function(e){r((0,o.A)({},O,e))}}),(0,j.jsx)(b.fN,{attributes:t,setAttributes:r,label:"Column Gap",min:0,max:150,attributeObj:"grid",propertyName:"columnGap"}),(0,j.jsx)(b.fN,{label:"Row Gap",attributes:t,setAttributes:r,min:0,max:150,attributeObj:"grid",propertyName:"rowGap"})]})]}),(0,j.jsx)(m.PanelBody,{title:(0,d.__)("Toggle Content"),initialOpen:!1,children:(0,j.jsx)(b.j,{children:Object.keys(_.y).map((function(e){var s=e.charAt(0).toUpperCase()+e.slice(1);return(0,j.jsx)(b.T_,{checked:t.toggle[e],label:s,onChange:function(){r({toggle:w(w({},t.toggle),{},(0,o.A)({},e,!t.toggle[e]))})}},e)}))})})]})}));function x(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(e);t&&(o=o.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,o)}return r}function O(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?x(Object(r),!0).forEach((function(t){(0,o.A)(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):x(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}function C(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(e);t&&(o=o.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,o)}return r}function P(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?C(Object(r),!0).forEach((function(t){(0,o.A)(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):C(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}wp.blocks.getCategories().some((function(e){return"woocommerce"===e.slug})),(0,p.addAction)("omnipress.block.registered.woogrid","omnipress",(function(){(0,c.registerBlockVariation)("omnipress/slider",{name:"product_carousel",title:(0,d.__)("Products Carousel","omnipress"),description:(0,d.__)("Products carousel."),attributes:{sliderType:"product_carousel",slidePerView:4},scope:["inserter"],innerBlocks:[["omnipress/woogrid",{}]],isActive:function(e){return"product_carousel"===e.sliderType},icon:(0,j.jsx)(g.fYS,{style:{color:"var(--op-clr-primary, blue)"}}),category:"omnipress-woo",templateLock:"all"})}));const k=P(P({edit:function(e){var t=e.attributes,r=e.setAttributes,o=e.clientId,s=e.context,c=e.children,p=t.blockId,d=t.rows,g=t.columns,m=t.sortType,b=t.category,f=t.offset,y=t.columnGap,_=t.smColumnGap,h=t.mdColumnGap,w=t.rowGap,x=t.mdRowGap,C=t.smRowGap,P=t.perPage,k=(0,u.useMemo)((function(){var e={};return y&&(e["--op-layout-column-gap"]="".concat(y,"px")),_&&(e["--op-layout-column-gap-sm"]="".concat(_,"px")),h&&(e["--op-layout-column-gap-md"]="".concat(h,"px")),w&&(e["--op-layout-row-gap"]="".concat(w,"px")),C&&(e["--op-layout-row-gap-sm"]="".concat(C,"px")),x&&(e["--op-layout-row-gap-md"]="".concat(x,"px")),e}),[y,_,h,w,C,x]),N=(0,i.useBlockProps)({className:"op-woo-grid-".concat(p||""," op-").concat(p||""),"data-type":"omnipress/product-grid",style:k}),S=(0,u.useMemo)((function(){t.rows&&r({perPage:t.rows*t.columns,rows:void 0});var e={posts_per_page:P||6,offset:f||0};if(m){var o,s=m.split(",");Object.assign(e,{orderby:null!==(o=s[0].trim())&&void 0!==o?o:"date",order:s[1]?s[1].trim():"desc"})}return b&&Object.assign(e,{category:b}),e}),[m,d,g,b,P]),A=((0,l.useSelect)((function(e){return(0,e("core").getEntityRecords)("postType","product",S)}),[S]),(0,n.A)("/omnipress/v1/wc/products",S)),T=A.data,R=A.error,D=A.loading;return"swiper-slide"===s.classNames?(0,j.jsxs)(j.Fragment,{children:[(0,j.jsx)(a.ho,{columns:g,attributes:t,setAttributes:r,products:T,offset:f,isLoading:D,hasError:R,layout:t.layout,context:s}),(0,j.jsx)(v,{clientId:o,attributes:t,setAttributes:r})]}):(0,j.jsxs)("div",O(O({},N),{},{children:[c,(0,j.jsx)(a.ho,{columns:g,attributes:t,setAttributes:r,products:T,offset:f,isLoading:D,hasError:R,layout:t.layout,context:s}),(0,j.jsx)(v,{clientId:o,attributes:t,setAttributes:r})]}))},save:function(){return null}},JSON.parse('{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":2,"name":"omnipress/woogrid","version":"1.0.0","title":"Products Grid","category":"omnipress-woo","icon":"","description":"Display WooCommerce products in a grid layout","supports":{"anchor":true},"attributes":{"blockId":{"type":"string"},"carousel":{"type":"boolean","default":false},"options":{"type":"string","default":"arrow"},"arrowNext":{"type":"string","default":"fa fa-angle-right"},"arrowPrev":{"type":"string","default":"fa fa-angle-left"},"layout":{"type":"string"},"toggle":{"type":"object","default":{"title":true,"image":true,"addToCart":true,"price":true,"regularPrice":true,"badge":true,"ratings":true,"discountPercent":true}},"rows":{"type":"number"},"offset":{"type":"number","default":0},"columns":{"type":"number","default":3},"mdColumns":{"type":"number","default":3},"smColumns":{"type":"number","default":2},"perPage":{"type":"number","default":6},"grid":{"type":"object","default":{}},"orderBy":{"type":"string","default":"popularity"},"category":{"type":"string"},"gridWrapper":{"type":"object","default":{}},"mediaWrapper":{"type":"object","default":{}},"mediaWrapperImg":{"type":"object","default":{}},"card":{"type":"object","default":{}},"title":{"type":"object","default":{}},"price":{"type":"object","default":{}},"sale":{"type":"object","default":{}},"discountedPrice":{"type":"object","default":{}},"discount":{"type":"object","default":{}},"ratings":{"type":"object","default":{}},"addToCart":{"type":"object","default":{}},"sortType":{"type":"string"},"content":{"type":"object","default":{}},"outstock":{"type":"object","default":{}}},"opSettings":{"content":{"group":"design","selector":".op-product-item__details.op-woo__content","label":"Content","fields":{"spacing":{"margin":true,"padding":true},"color":{"background":true},"border":{"border":true,"borderRadius":true}}},"grid":{"group":"design","selector":"[class*=\'op-grid-col\']","label":"Content","fields":{}},"mediaWrapperImg":{"group":"design","selector":".op-woo__media-wrapper-img","label":"Image","fields":{"spacing":{"margin":true,"padding":true},"dimension":{"height":true,"width":true},"border":{"border":true,"borderRadius":true},"image":true}},"title":{"group":"design","selector":".op-woo__card .op-woo__title","label":"Title","fields":{"spacing":{"padding":true},"border":{"border":true,"borderRadius":true},"typography":true}},"discount":{"group":"design","selector":".op-woo__discount","label":"Discount","fields":{"spacing":{"padding":true},"border":{"border":true,"borderRadius":true},"typography":true}},"ratings":{"group":"design","selector":".op-woo__ratings","label":"Ratings","fields":{"spacing":{"padding":true},"border":{"border":true,"borderRadius":true},"typography":true}},"addToCart":{"group":"design","selector":".op-woo__add-to-cart","label":"Add to cart","fields":{"spacing":{"padding":true},"color":{"background":true},"border":{"border":true,"borderRadius":true},"typography":true}},"outstock":{"group":"design","selector":".op-woo__outstock","label":"Out of stock","fields":{"spacing":{"padding":true},"color":{"background":true},"border":{"border":true,"borderRadius":true},"typography":true}},"sale":{"group":"design","selector":".op-woo__sale","label":"Sale Tag","fields":{"spacing":{"padding":true},"color":{"background":true},"border":{"border":true,"borderRadius":true},"typography":true}}},"viewScriptModule":["omnipress/woogrid"],"usesContext":["classNames"],"textdomain":"product_grid","style":["omnipress/block/layout"],"keywords":["grid","layout","woogrid","woo","woo Layout"]}')),{},{icon:s.cR})},7438:(e,t,r)=>{r.d(t,{mo:()=>_,ho:()=>h,u8:()=>c});var o=r(6427),s=r(6087),a=r(7723),n=r(790),i=[{id:12,label:"Default sorting",value:"menu_order,ASC"},{id:1,label:"Popularity",value:"popularity,ASC"},{id:2,label:"Average ratings",value:"rating,ASC"},{id:3,label:"Latest",value:"date,DESC"},{id:4,label:"Price: low to high",value:"price,ASC"},{id:14,label:"Sort By Slug",value:"slug,ASC"},{id:5,label:"Price: high to low",value:"price,DESC"}],c=(0,s.memo)((0,s.forwardRef)((function(e,t){var r=e.onChange,s=e.value;return(0,n.jsxs)("div",{className:"op-woo-order__settings",children:[(0,n.jsx)("h2",{className:"op-woo-order__settings-title op-heading mb-15",children:(0,a.__)("Sort By:","omnipress")}),(0,n.jsx)(o.SelectControl,{name:"megamenu-sort",ref:t,onChange:function(e){return r(e)},value:s,options:i})]})})));r(9280),r(1296);var l=r(6942),u=r.n(l),p=r(4263),d=r(6710),g=function(e){var t=e.split("."),r=[];if(0!=+e){for(var o=0;o<+t[0];o++)r.push((0,n.jsx)(p.T4g,{}));+t[1]>5?r.push((0,n.jsx)(p.T4g,{})):r.push((0,n.jsx)(d.vOy,{}))}else r=[(0,n.jsx)(p.b_i,{}),(0,n.jsx)(p.b_i,{}),(0,n.jsx)(p.b_i,{}),(0,n.jsx)(p.b_i,{}),(0,n.jsx)(p.b_i,{})];return r};function m(e){var t,r,o,s=e.attributes,a=(e.setAttributes,e.singleProd),i=e.className,c=(a.id,a.regular_price,a.sale_price,a.currency_symbol,a.permalink,a.add_to_cart,a.thumbnail),l=a.is_on_sale,p=a.name,d=a.images,m=a.average_rating,b=(a.review_count,a.type,a.discount_percentage),f=a.price_html,y=a.is_in_stock,_=s.toggle,j=_.image,h=_.title,w=_.ratings,v=(_.price,_.regularPrice,_.discountPercent,_.addToCart),x=_.badge,O=u()("op-product-item op-woo__card ".concat(i));return(0,n.jsx)("div",{className:O,children:(0,n.jsxs)("div",{className:"op-product-item__content",children:[j&&(0,n.jsxs)("figure",{className:"op-product-item__media op-woo__media-wrapper",children:[c?(0,n.jsx)("div",{className:"op-product-link",dangerouslySetInnerHTML:{__html:d[1]?"".concat(c,' <img alt="').concat(d[1].alt,'" src="').concat(null===(t=d[0])||void 0===t?void 0:t.src,'" class="op-product-thumbnail op-woo__media-wrapper-img" />'):c}}):(0,n.jsx)("div",{className:"op-product-link",children:(0,n.jsx)("img",{src:null!==(r=null===(o=d[0])||void 0===o?void 0:o.src)&&void 0!==r?r:"../assets/images/placeholder_category.webp",className:"op-product-thumbnail op-woo__media-wrapper-img",alt:p,loading:"lazy"})}),l&&x?(0,n.jsx)("div",{className:"op-product-item__onsale-badge",children:(0,n.jsxs)("span",{className:"onsale-badge-default op-woo__sale",children:[" ","Sale"," "]})}):"",!y&&x?(0,n.jsx)("div",{className:"op-product-item__stock-alert-badge op-woo__outstock",children:(0,n.jsxs)("span",{className:"out-of-stock-badge-default op-woo__out-of-stock",children:[" ","Out of stock"," "]})}):"",v&&y&&(0,n.jsx)("div",{className:"op-product-item__add-to-cart",children:(0,n.jsxs)("button",{type:"button",className:"op-woo__add-to-cart",children:[(0,n.jsx)("span",{children:(0,n.jsx)("i",{className:"fas fa-cart-shopping"})}),"Add to cart"]})})]}),(0,n.jsxs)("div",{className:"op-product-item__details op-woo__content",children:[h&&(0,n.jsx)("h3",{dangerouslySetInnerHTML:{__html:p},className:"op-product-loop-title op-woo__title"}),w&&(0,n.jsxs)("div",{className:"op-product__rating-wrapper op-woo__ratings",children:[g(m).map((function(e,t){return(0,n.jsx)("span",{style:{cursor:"pointer"},children:e},t)})),(0,n.jsx)("span",{style:{marginLeft:"10px"},children:m>0?m:""})]}),(0,n.jsx)("div",{className:"op-product-rating"}),(0,n.jsxs)("div",{className:"op-product-price",children:[(0,n.jsx)("div",{className:"price",dangerouslySetInnerHTML:{__html:f}}),0!==b&&(0,n.jsxs)("span",{className:"discount op-woo__discount",children:["-",b,"%"]})]})]})]})})}var b=r(3453),f=r(7143),y=r(3582),_=(0,s.memo)((function(e){var t=e.onChange,r=e.value,i=e.args,c=(0,s.useState)(!1),l=(0,b.A)(c,2),u=l[0],p=l[1],d=function(e){var t=(0,f.useSelect)((function(t){var r,o=t(y.store),s=o.getEntityRecords,a=o.hasFinishedResolution;return{categories:null!==(r=s("taxonomy","product_cat",e))&&void 0!==r?r:[],isLoading:!a("getEntityRecords",["taxonomy","product_cat",e])}}),[e]);return{categories:t.categories,isLoading:t.isLoading}}(i),g=d.categories;return d.isLoading,(0,s.useEffect)((function(){g&&p(!1)}),[g]),(0,n.jsx)("div",{className:"op-woo__category-list",children:u?(0,n.jsx)(o.Spinner,{}):(0,n.jsxs)("div",{className:"op-woo__category-wrapper",children:[(0,n.jsx)("h2",{className:"op-heading op-woo__category-title mb-15",children:(0,a.__)("Categories:","omnipress")}),(0,n.jsx)(o.SelectControl,{name:"op-woo__category-names",onChange:t,value:r,id:"op-woo__category-select-control",options:g.map((function(e){return{label:e.name,value:e.id}}))})]})})})),j=r(4467);function h(e){var t=e.attributes,r=e.setAttributes,s=(e.columns,e.products),a=(e.offset,e.isLoading),i=e.layout,c=(e.hasError,e.context);if(s){var l=u()((0,j.A)((0,j.A)({},"swiper swiper-".concat(t.blockId),t.carousel),"op-block-product-grid",!t.carousel)),p=u()("op-woo__grid-wrapper op-grid-col-".concat(t.columns," op-grid-col-").concat(t.mdColumns,"-md op-grid-col-").concat(t.smColumns,"-sm"));return"swiper-slide"===c.classNames?(0,n.jsx)(n.Fragment,{children:s&&s.map((function(e,o){return(0,n.jsx)(m,{attributes:t,singleProd:e,setAttributes:r,layout:i,className:"swiper-slide"},e.id||o)}))}):(0,n.jsx)("div",{id:"op-grid-".concat(t.blockId),className:l,children:(0,n.jsx)("div",{className:p,children:a?(0,n.jsx)(o.Spinner,{}):s&&s.map((function(e,o){return(0,n.jsx)(m,{attributes:t,singleProd:e,setAttributes:r,layout:i},e.id||o)}))})})}}}}]);