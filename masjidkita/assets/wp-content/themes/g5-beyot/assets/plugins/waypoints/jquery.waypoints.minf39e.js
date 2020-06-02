(function(){"use strict";var e=0;var n={};function i(t){if(!t){throw new Error("No options passed to Waypoint constructor")}if(!t.element){throw new Error("No element option passed to Waypoint constructor")}if(!t.handler){throw new Error("No handler option passed to Waypoint constructor")}this.key="waypoint-"+e;this.options=i.Adapter.extend({},i.defaults,t);this.element=this.options.element;this.adapter=new i.Adapter(this.element);this.callback=t.handler;this.axis=this.options.horizontal?"horizontal":"vertical";this.enabled=this.options.enabled;this.triggerPoint=null;this.group=i.Group.findOrCreate({name:this.options.group,axis:this.axis});this.context=i.Context.findOrCreateByElement(this.options.context);if(i.offsetAliases[this.options.offset]){this.options.offset=i.offsetAliases[this.options.offset]}this.group.add(this);this.context.add(this);n[this.key]=this;e+=1}i.prototype.queueTrigger=function(t){this.group.queueTrigger(this,t)};i.prototype.trigger=function(t){if(!this.enabled){return}if(this.callback){this.callback.apply(this,t)}};i.prototype.destroy=function(){this.context.remove(this);this.group.remove(this);delete n[this.key]};i.prototype.disable=function(){this.enabled=false;return this};i.prototype.enable=function(){this.context.refresh();this.enabled=true;return this};i.prototype.next=function(){return this.group.next(this)};i.prototype.previous=function(){return this.group.previous(this)};i.invokeAll=function(t){var e=[];for(var i in n){e.push(n[i])}for(var o=0,r=e.length;o<r;o++){e[o][t]()}};i.destroyAll=function(){i.invokeAll("destroy")};i.disableAll=function(){i.invokeAll("disable")};i.enableAll=function(){i.Context.refreshAll();for(var t in n){n[t].enabled=true}return this};i.refreshAll=function(){i.Context.refreshAll()};i.viewportHeight=function(){return window.innerHeight||document.documentElement.clientHeight};i.viewportWidth=function(){return document.documentElement.clientWidth};i.adapters=[];i.defaults={context:window,continuous:true,enabled:true,group:"default",horizontal:false,offset:0};i.offsetAliases={"bottom-in-view":function(){return this.context.innerHeight()-this.adapter.outerHeight()},"right-in-view":function(){return this.context.innerWidth()-this.adapter.outerWidth()}};window.Waypoint=i})();(function(){"use strict";function i(t){window.setTimeout(t,1e3/60)}var e=0;var o={};var g=window.Waypoint;var t=window.onload;function r(t){this.element=t;this.Adapter=g.Adapter;this.adapter=new this.Adapter(t);this.key="waypoint-context-"+e;this.didScroll=false;this.didResize=false;this.oldScroll={x:this.adapter.scrollLeft(),y:this.adapter.scrollTop()};this.waypoints={vertical:{},horizontal:{}};t.waypointContextKey=this.key;o[t.waypointContextKey]=this;e+=1;if(!g.windowContext){g.windowContext=true;g.windowContext=new r(window)}this.createThrottledScrollHandler();this.createThrottledResizeHandler()}r.prototype.add=function(t){var e=t.options.horizontal?"horizontal":"vertical";this.waypoints[e][t.key]=t;this.refresh()};r.prototype.checkEmpty=function(){var t=this.Adapter.isEmptyObject(this.waypoints.horizontal);var e=this.Adapter.isEmptyObject(this.waypoints.vertical);var i=this.element==this.element.window;if(t&&e&&!i){this.adapter.off(".waypoints");delete o[this.key]}};r.prototype.createThrottledResizeHandler=function(){var t=this;function e(){t.handleResize();t.didResize=false}this.adapter.on("resize.waypoints",function(){if(!t.didResize){t.didResize=true;g.requestAnimationFrame(e)}})};r.prototype.createThrottledScrollHandler=function(){var t=this;function e(){t.handleScroll();t.didScroll=false}this.adapter.on("scroll.waypoints",function(){if(!t.didScroll||g.isTouch){t.didScroll=true;g.requestAnimationFrame(e)}})};r.prototype.handleResize=function(){g.Context.refreshAll()};r.prototype.handleScroll=function(){var t={};var e={horizontal:{newScroll:this.adapter.scrollLeft(),oldScroll:this.oldScroll.x,forward:"right",backward:"left"},vertical:{newScroll:this.adapter.scrollTop(),oldScroll:this.oldScroll.y,forward:"down",backward:"up"}};for(var i in e){var o=e[i];var r=o.newScroll>o.oldScroll;var n=r?o.forward:o.backward;for(var s in this.waypoints[i]){var a=this.waypoints[i][s];if(a.triggerPoint===null){continue}var l=o.oldScroll<a.triggerPoint;var h=o.newScroll>=a.triggerPoint;var p=l&&h;var u=!l&&!h;if(p||u){a.queueTrigger(n);t[a.group.id]=a.group}}}for(var f in t){t[f].flushTriggers()}this.oldScroll={x:e.horizontal.newScroll,y:e.vertical.newScroll}};r.prototype.innerHeight=function(){if(this.element==this.element.window){return g.viewportHeight()}return this.adapter.innerHeight()};r.prototype.remove=function(t){delete this.waypoints[t.axis][t.key];this.checkEmpty()};r.prototype.innerWidth=function(){if(this.element==this.element.window){return g.viewportWidth()}return this.adapter.innerWidth()};r.prototype.destroy=function(){var t=[];for(var e in this.waypoints){for(var i in this.waypoints[e]){t.push(this.waypoints[e][i])}}for(var o=0,r=t.length;o<r;o++){t[o].destroy()}};r.prototype.refresh=function(){var t=this.element==this.element.window;var e=t?undefined:this.adapter.offset();var i={};var o;this.handleScroll();o={horizontal:{contextOffset:t?0:e.left,contextScroll:t?0:this.oldScroll.x,contextDimension:this.innerWidth(),oldScroll:this.oldScroll.x,forward:"right",backward:"left",offsetProp:"left"},vertical:{contextOffset:t?0:e.top,contextScroll:t?0:this.oldScroll.y,contextDimension:this.innerHeight(),oldScroll:this.oldScroll.y,forward:"down",backward:"up",offsetProp:"top"}};for(var r in o){var n=o[r];for(var s in this.waypoints[r]){var a=this.waypoints[r][s];var l=a.options.offset;var h=a.triggerPoint;var p=0;var u=h==null;var f,c,d;var w,y;if(a.element!==a.element.window){p=a.adapter.offset()[n.offsetProp]}if(typeof l==="function"){l=l.apply(a)}else if(typeof l==="string"){l=parseFloat(l);if(a.options.offset.indexOf("%")>-1){l=Math.ceil(n.contextDimension*l/100)}}f=n.contextScroll-n.contextOffset;a.triggerPoint=Math.floor(p+f-l);c=h<n.oldScroll;d=a.triggerPoint>=n.oldScroll;w=c&&d;y=!c&&!d;if(!u&&w){a.queueTrigger(n.backward);i[a.group.id]=a.group}else if(!u&&y){a.queueTrigger(n.forward);i[a.group.id]=a.group}else if(u&&n.oldScroll>=a.triggerPoint){a.queueTrigger(n.forward);i[a.group.id]=a.group}}}g.requestAnimationFrame(function(){for(var t in i){i[t].flushTriggers()}});return this};r.findOrCreateByElement=function(t){return r.findByElement(t)||new r(t)};r.refreshAll=function(){for(var t in o){o[t].refresh()}};r.findByElement=function(t){return o[t.waypointContextKey]};window.onload=function(){if(t){t()}r.refreshAll()};g.requestAnimationFrame=function(t){var e=window.requestAnimationFrame||window.mozRequestAnimationFrame||window.webkitRequestAnimationFrame||i;e.call(window,t)};g.Context=r})();(function(){"use strict";function s(t,e){return t.triggerPoint-e.triggerPoint}function a(t,e){return e.triggerPoint-t.triggerPoint}var e={vertical:{},horizontal:{}};var o=window.Waypoint;function i(t){this.name=t.name;this.axis=t.axis;this.id=this.name+"-"+this.axis;this.waypoints=[];this.clearTriggerQueues();e[this.axis][this.name]=this}i.prototype.add=function(t){this.waypoints.push(t)};i.prototype.clearTriggerQueues=function(){this.triggerQueues={up:[],down:[],left:[],right:[]}};i.prototype.flushTriggers=function(){for(var t in this.triggerQueues){var e=this.triggerQueues[t];var i=t==="up"||t==="left";e.sort(i?a:s);for(var o=0,r=e.length;o<r;o+=1){var n=e[o];if(n.options.continuous||o===e.length-1){n.trigger([t])}}}this.clearTriggerQueues()};i.prototype.next=function(t){this.waypoints.sort(s);var e=o.Adapter.inArray(t,this.waypoints);var i=e===this.waypoints.length-1;return i?null:this.waypoints[e+1]};i.prototype.previous=function(t){this.waypoints.sort(s);var e=o.Adapter.inArray(t,this.waypoints);return e?this.waypoints[e-1]:null};i.prototype.queueTrigger=function(t,e){this.triggerQueues[e].push(t)};i.prototype.remove=function(t){var e=o.Adapter.inArray(t,this.waypoints);if(e>-1){this.waypoints.splice(e,1)}};i.prototype.first=function(){return this.waypoints[0]};i.prototype.last=function(){return this.waypoints[this.waypoints.length-1]};i.findOrCreate=function(t){return e[t.axis][t.name]||new i(t)};o.Group=i})();(function(){"use strict";var i=window.jQuery;var t=window.Waypoint;function o(t){this.$element=i(t)}i.each(["innerHeight","innerWidth","off","offset","on","outerHeight","outerWidth","scrollLeft","scrollTop"],function(t,e){o.prototype[e]=function(){var t=Array.prototype.slice.call(arguments);return this.$element[e].apply(this.$element,t)}});i.each(["extend","inArray","isEmptyObject"],function(t,e){o[e]=i[e]});t.adapters.push({name:"jquery",Adapter:o});t.Adapter=o})();(function(){"use strict";var r=window.Waypoint;function t(o){return function(){var e=[];var i=arguments[0];if(o.isFunction(arguments[0])){i=o.extend({},arguments[1]);i.handler=arguments[0]}this.each(function(){var t=o.extend({},i,{element:this});if(typeof t.context==="string"){t.context=o(this).closest(t.context)[0]}e.push(new r(t))});return e}}if(window.jQuery){window.jQuery.fn.waypoint=t(window.jQuery)}if(window.Zepto){window.Zepto.fn.waypoint=t(window.Zepto)}})();