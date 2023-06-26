import"./WpTable.4d19dc46.js";import"./default-i18n.ab92175e.js";import"./constants.7044c894.js";import{_ as y,o as c,c as f,f as r,d,w as a,h as g,a as _,r as u,e as h,t as n,F,i as M,k as T,g as v}from"./_plugin-vue_export-helper.2d9794a3.js";import"./index.02a5ed9a.js";import"./SaveChanges.bc66cd69.js";import{d as U,a as I,m as P}from"./vuex.esm-bundler.8589b2dd.js";import{c as x}from"./news-sitemap.1ec2e03a.js";import{C as E}from"./index.fd0fcee8.js";import{C as O,S as V,a as z,b as B}from"./SitemapsPro.3876bc6e.js";import{C as D}from"./Index.1fd8fc42.js";import{C as G}from"./Index.a5b2ee90.js";import{G as Y,a as R}from"./Row.5e452de4.js";import{S as q}from"./Caret.42a820e0.js";import{a as H,S as K}from"./ImageSeo.a59eaef0.js";import"./helpers.de7566d0.js";import"./RequiresUpdate.52f5acf2.js";import"./postContent.bb42e0a8.js";import"./cleanForSlug.62b08993.js";import"./isArrayLikeObject.c492f682.js";import"./html.14f2a8b9.js";import"./_commonjsHelpers.f84db168.js";import"./params.597cd0f5.js";import"./Url.c71d5763.js";import"./Tooltip.ae0bcccb.js";const W={computed:{yourLicenseIsText(){let e=this.$t.__("You have not yet added a license key.",this.$td);return this.$aioseo.license.isExpired&&(e=this.$t.__("Your license has expired.",this.$td)),this.$aioseo.license.isDisabled&&(e=this.$t.__("Your license has been disabled.",this.$td)),this.$aioseo.license.isInvalid&&(e=this.$t.__("Your license key is invalid.",this.$td)),e}}},j={},X={xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24",class:"aioseo-code"},J=r("path",{d:"M9.4 16.6L4.8 12l4.6-4.6L8 6l-6 6 6 6 1.4-1.4zm5.2 0l4.6-4.6-4.6-4.6L16 6l6 6-6 6-1.4-1.4z",fill:"currentColor"},null,-1),Q=[J];function Z(e,t){return c(),f("svg",X,Q)}const ee=y(j,[["render",Z]]);const te={components:{CoreAlert:E,CoreFeatureCard:O,CoreModal:D,Cta:G,GridColumn:Y,GridRow:R,SvgClose:q,SvgCode:ee,SvgImageSeo:H,SvgLinkAssistant:V,SvgLocalBusiness:K,SvgRedirect:z,SvgSitemapsPro:B},mixins:[W],data(){return{ctaImg:x,showNetworkModal:!1,maybeActivate:!1,maybeDeactivate:!1,search:null,loading:{activateAll:!1,deactivateAll:!1},strings:{videoNewsSitemaps:this.$t.__("Video and News Sitemaps",this.$td),imageSeoOptimization:this.$t.__("Image SEO Optimization",this.$td),localBusinessSeo:this.$t.__("Local Business SEO",this.$td),advancedWooCommerce:this.$t.__("Advanced WooCommerce",this.$td),customTaxonomies:this.$t.__("SEO for Categories, Tags and Custom Taxonomies",this.$td),andMore:this.$t.__("And many more...",this.$td),activateAllFeatures:this.$t.__("Activate All Features",this.$td),deactivateAllFeatures:this.$t.__("Deactivate All Features",this.$td),searchForFeatures:this.$t.__("Search for Features...",this.$td),ctaHeaderText:this.$t.sprintf(this.$t.__("Upgrade %1$s to Pro and Unlock all Features!",this.$td),"AIOSEO"),ctaButtonText:this.$t.__("Upgrade to Pro and Unlock All Features",this.$td),aValidLicenseIsRequired:this.$t.__("A valid license key is required in order to use our addons.",this.$td),enterLicenseKey:this.$t.__("Enter License Key",this.$td),purchaseLicense:this.$t.__("Purchase License",this.$td),areYouSureNetworkChange:this.$t.__("This is a network-wide change.",this.$td),yesProcessNetworkChange:this.$t.__("Yes, process this network change",this.$td),noChangedMind:this.$t.__("No, I changed my mind",this.$td)},descriptions:{aioseoImageSeo:{description:"<p>"+this.$t.__("Globally control the Title attribute and Alt text for images in your content. These attributes are essential for both accessibility and SEO.",this.$td)+"</p>",version:0},aioseoVideoSitemap:{description:"<p>"+this.$t.__("The Video Sitemap works in much the same way as the XML Sitemap module, it generates an XML Sitemap specifically for video content on your site. Search engines use this information to display rich snippet information in search results.",this.$td)+"</p>",version:0},aioseoNewsSitemap:{description:"<p>"+this.$t.__("Our Google News Sitemap lets you control which content you submit to Google News and only contains articles that were published in the last 48 hours. In order to submit a News Sitemap to Google, you must have added your site to Google’s Publisher Center and had it approved.",this.$td)+"</p>",version:0},aioseoLocalBusiness:{description:"<p>"+this.$t.__("Local Business schema markup enables you to tell Google about your business, including your business name, address and phone number, opening hours and price range. This information may be displayed as a Knowledge Graph card or business carousel.",this.$td)+"</p>",version:0}}}},computed:{...U(["isUnlicensed"]),...I(["addons"]),upgradeToday(){return this.$t.sprintf(this.$t.__("%1$s %2$s comes with many additional features to help take your site's SEO to the next level!",this.$td),"AIOSEO","Pro")},getAddons(){return this.addons.filter(e=>!this.search||e.name.toLowerCase().includes(this.search.toLowerCase()))},networkChangeMessage(){return this.activated?this.$t.__("Are you sure you want to deactivate these addons across the network?",this.$td):this.$t.__("Are you sure you want to activate these addons across the network?",this.$td)}},methods:{...P(["installPlugins","deactivatePlugins"]),closeNetworkModal(e=!1){if(this.showNetworkModal=!1,e){const t=this.maybeActivate?"actuallyActivateAllFeatures":"actuallyDeactivateAllFeatures";this.maybeActivate=!1,this.maybeDeactivate=!1,this[t]()}},getIconComponent(e){return e.startsWith("svg-")?e:"img"},getIconSrc(e,t){return typeof e=="string"&&e.startsWith("svg-")?null:typeof e=="string"?`data:image/svg+xml;base64,${e}`:t},getAddonDescription(e){const t=e.sku.replace(/-./g,m=>m.toUpperCase()[1]);return this.descriptions[t]&&this.descriptions[t].description&&e.descriptionVersion<=this.descriptions[t].version?this.descriptions[t].description:e.description},activateAllFeatures(){if(!this.$isPro||!this.$aioseo.license.isActive)return window.open(this.$links.utmUrl(this.$aioseo.data.isNetworkAdmin?"network-activate-all-features":"activate-all-features"));if(this.$aioseo.data.isNetworkAdmin){this.showNetworkModal=!0,this.maybeActivate=!0;return}this.actuallyActivateAllFeatures()},actuallyActivateAllFeatures(){this.loading.activateAll=!0;const e=this.addons.filter(t=>!t.requiresUpgrade).map(t=>({plugin:t.basename}));this.installPlugins(e).then(t=>{const m=Object.keys(t.body.completed).map(l=>t.body.completed[l]);this.$refs.addons.forEach(l=>{m.includes(l.feature.basename)&&(l.activated=!0)}),this.loading.activateAll=!1})},deactivateAllFeatures(){if(this.$aioseo.data.isNetworkAdmin){this.showNetworkModal=!0,this.maybeDeactivate=!0;return}this.actuallyDeactivateAllFeatures()},actuallyDeactivateAllFeatures(){this.loading.deactivateAll=!0;const e=this.addons.filter(t=>!t.requiresUpgrade).filter(t=>t.installed).map(t=>({plugin:t.basename}));this.deactivatePlugins(e).then(t=>{const m=Object.keys(t.body.completed).map(l=>t.body.completed[l]);this.$refs.addons.forEach(l=>{m.includes(l.feature.basename)&&(l.activated=!1)}),this.loading.deactivateAll=!1})}}},se={class:"aioseo-feature-manager"},ie={class:"aioseo-feature-manager-header"},ae={key:0,class:"buttons"},oe={class:"button-content"},re={class:"search"},ne={class:"aioseo-feature-manager-addons"},le={class:"buttons"},ce=["innerHTML"],de={class:"large"},ue=["src"],he={class:"aioseo-modal-body"},me={class:"reset-description"};function pe(e,t,m,l,s,o){const p=u("base-button"),k=u("base-input"),$=u("core-alert"),w=u("core-feature-card"),A=u("grid-column"),b=u("grid-row"),C=u("cta"),S=u("svg-close"),L=u("core-modal");return c(),f("div",se,[r("div",ie,[o.getAddons.filter(i=>i.canActivate===!0).length>0?(c(),f("div",ae,[r("div",oe,[d(p,{size:"medium",type:"blue",loading:s.loading.activateAll,onClick:o.activateAllFeatures},{default:a(()=>[h(n(s.strings.activateAllFeatures),1)]),_:1},8,["loading","onClick"]),e.isUnlicensed?_("",!0):(c(),g(p,{key:0,size:"medium",type:"gray",loading:s.loading.deactivateAll,onClick:o.deactivateAllFeatures},{default:a(()=>[h(n(s.strings.deactivateAllFeatures),1)]),_:1},8,["loading","onClick"]))])])):_("",!0),r("div",re,[d(k,{modelValue:s.search,"onUpdate:modelValue":t[0]||(t[0]=i=>s.search=i),size:"medium",placeholder:s.strings.searchForFeatures,"prepend-icon":"search"},null,8,["modelValue","placeholder"])])]),r("div",ne,[e.$isPro&&e.isUnlicensed?(c(),g($,{key:0,type:"red"},{default:a(()=>[r("strong",null,n(e.yourLicenseIsText),1),h(" "+n(s.strings.aValidLicenseIsRequired)+" ",1),r("div",le,[d(p,{type:"blue",size:"small",tag:"a",href:e.$aioseo.data.isNetworkAdmin?e.$aioseo.urls.aio.networkSettings:e.$aioseo.urls.aio.settings},{default:a(()=>[h(n(s.strings.enterLicenseKey),1)]),_:1},8,["href"]),d(p,{type:"green",size:"small",tag:"a",target:"_blank",href:e.$links.getUpsellUrl("feature-manager-upgrade","no-license-key","pricing")},{default:a(()=>[h(n(s.strings.purchaseLicense),1)]),_:1},8,["href"])])]),_:1})):_("",!0),d(b,null,{default:a(()=>[(c(!0),f(F,null,M(o.getAddons,(i,N)=>(c(),g(A,{key:N,sm:"6",lg:"4"},{default:a(()=>[d(w,{ref_for:!0,ref:"addons","can-activate":i.canActivate,"can-manage":e.$allowed(i.capability),feature:i},{title:a(()=>[(c(),g(T(o.getIconComponent(i.icon)),{src:o.getIconSrc(i.icon,i.image)},null,8,["src"])),h(" "+n(i.name),1)]),description:a(()=>[r("div",{innerHTML:o.getAddonDescription(i)},null,8,ce)]),_:2},1032,["can-activate","can-manage","feature"])]),_:2},1024))),128))]),_:1})]),e.isUnlicensed?(c(),g(C,{key:0,class:"feature-manager-upsell",type:2,"button-text":s.strings.ctaButtonText,floating:!1,"cta-link":e.$links.utmUrl("feature-manager","main-cta"),"learn-more-link":e.$links.getUpsellUrl("feature-manager","main-cta","home"),"feature-list":e.$constants.UPSELL_FEATURE_LIST},{"header-text":a(()=>[r("span",de,n(s.strings.ctaHeaderText),1)]),description:a(()=>[h(n(o.upgradeToday),1)]),"featured-image":a(()=>[r("img",{alt:"Purchase AIOSEO Today!",src:e.$getAssetUrl(s.ctaImg)},null,8,ue)]),_:1},8,["button-text","cta-link","learn-more-link","feature-list"])):_("",!0),s.showNetworkModal?(c(),g(L,{key:1,"no-header":"",onClose:t[5]||(t[5]=i=>o.closeNetworkModal(!1))},{body:a(()=>[r("div",he,[r("button",{class:"close",onClick:t[2]||(t[2]=v(i=>o.closeNetworkModal(!1),["stop"]))},[d(S,{onClick:t[1]||(t[1]=v(i=>o.closeNetworkModal(!1),["stop"]))})]),r("h3",null,n(s.strings.areYouSureNetworkChange),1),r("div",me,n(o.networkChangeMessage),1),d(p,{type:"blue",size:"medium",onClick:t[3]||(t[3]=i=>o.closeNetworkModal(!0))},{default:a(()=>[h(n(s.strings.yesProcessNetworkChange),1)]),_:1}),d(p,{type:"gray",size:"medium",onClick:t[4]||(t[4]=i=>o.closeNetworkModal(!1))},{default:a(()=>[h(n(s.strings.noChangedMind),1)]),_:1})])]),_:1})):_("",!0)])}const Be=y(te,[["render",pe]]);export{Be as default};