/*
 * jQuery Cycle Plugin
 * Examples and documentation at: http://malsup.com/jquery/cycle/
 * Copyright (c) 2007-2008 M. Alsup
 * Version 2.25
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 */
;(function(G){var A="2.25";var B=G.browser.msie&&/MSIE 6.0/.test(navigator.userAgent);function D(){if(window.console&&window.console.log){window.console.log("[cycle] "+Array.prototype.join.call(arguments,""))}}G.fn.cycle=function(I){return this.each(function(){if(I===undefined||I===null){I={}}if(I.constructor==String){switch(I){case"stop":if(this.cycleTimeout){clearTimeout(this.cycleTimeout)}this.cycleTimeout=0;G(this).data("cycle.opts","");return ;case"pause":this.cyclePause=1;return ;case"resume":this.cyclePause=0;return ;default:I={fx:I}}}else{if(I.constructor==Number){var N=I;I=G(this).data("cycle.opts");if(!I){D("options not found, can not advance slide");return }if(N<0||N>=I.elements.length){D("invalid slide index: "+N);return }I.nextSlide=N;if(this.cycleTimeout){clearTimeout(this.cycleTimeout);this.cycleTimeout=0}E(I.elements,I,1,1);return }}if(this.cycleTimeout){clearTimeout(this.cycleTimeout)}this.cycleTimeout=0;this.cyclePause=0;var Q=G(this);var O=I.slideExpr?G(I.slideExpr,this):Q.children();var K=O.get();if(K.length<2){D("terminating; too few slides: "+K.length);return }var J=G.extend({},G.fn.cycle.defaults,I||{},G.metadata?Q.metadata():G.meta?Q.data():{});if(J.autostop){J.countdown=J.autostopCount||K.length}Q.data("cycle.opts",J);J.container=this;J.elements=K;J.before=J.before?[J.before]:[];J.after=J.after?[J.after]:[];J.after.unshift(function(){J.busy=0});if(J.continuous){J.after.push(function(){E(K,J,0,!J.rev)})}if(B&&J.cleartype&&!J.cleartypeNoBg){C(O)}var S=this.className;J.width=parseInt((S.match(/w:(\d+)/)||[])[1])||J.width;J.height=parseInt((S.match(/h:(\d+)/)||[])[1])||J.height;J.timeout=parseInt((S.match(/t:(\d+)/)||[])[1])||J.timeout;if(Q.css("position")=="static"){Q.css("position","relative")}if(J.width){Q.width(J.width)}if(J.height&&J.height!="auto"){Q.height(J.height)}if(J.random){J.randomMap=[];for(var L=0;L<K.length;L++){J.randomMap.push(L)}J.randomMap.sort(function(U,T){return Math.random()-0.5});J.randomIndex=0;J.startingSlide=J.randomMap[0]}else{if(J.startingSlide>=K.length){J.startingSlide=0}}var M=J.startingSlide||0;O.css({position:"absolute",top:0,left:0}).hide().each(function(T){var U=M?T>=M?K.length-(T-M):M-T:K.length-T;G(this).css("z-index",U)});G(K[M]).css("opacity",1).show();if(G.browser.msie){K[M].style.removeAttribute("filter")}if(J.fit&&J.width){O.width(J.width)}if(J.fit&&J.height&&J.height!="auto"){O.height(J.height)}if(J.pause){Q.hover(function(){this.cyclePause=1},function(){this.cyclePause=0})}var R=G.fn.cycle.transitions[J.fx];if(G.isFunction(R)){R(Q,O,J)}else{if(J.fx!="custom"){D("unknown transition: "+J.fx)}}O.each(function(){var T=G(this);this.cycleH=(J.fit&&J.height)?J.height:T.height();this.cycleW=(J.fit&&J.width)?J.width:T.width()});J.cssBefore=J.cssBefore||{};J.animIn=J.animIn||{};J.animOut=J.animOut||{};O.not(":eq("+M+")").css(J.cssBefore);if(J.cssFirst){G(O[M]).css(J.cssFirst)}if(J.timeout){if(J.speed.constructor==String){J.speed={slow:600,fast:200}[J.speed]||400}if(!J.sync){J.speed=J.speed/2}while((J.timeout-J.speed)<250){J.timeout+=J.speed}}if(J.easing){J.easeIn=J.easeOut=J.easing}if(!J.speedIn){J.speedIn=J.speed}if(!J.speedOut){J.speedOut=J.speed}J.slideCount=K.length;J.currSlide=M;if(J.random){J.nextSlide=J.currSlide;if(++J.randomIndex==K.length){J.randomIndex=0}J.nextSlide=J.randomMap[J.randomIndex]}else{J.nextSlide=J.startingSlide>=(K.length-1)?0:J.startingSlide+1}var P=O[M];if(J.before.length){J.before[0].apply(P,[P,P,J,true])}if(J.after.length>1){J.after[1].apply(P,[P,P,J,true])}if(J.click&&!J.next){J.next=J.click}if(J.next){G(J.next).bind("click",function(){return F(K,J,J.rev?-1:1)})}if(J.prev){G(J.prev).bind("click",function(){return F(K,J,J.rev?1:-1)})}if(J.pager){H(K,J)}J.addSlide=function(U){var T=G(U),V=T[0];if(!J.autostopCount){J.countdown++}K.push(V);if(J.els){J.els.push(V)}J.slideCount=K.length;T.css("position","absolute").appendTo(Q);if(B&&J.cleartype&&!J.cleartypeNoBg){C(T)}if(J.fit&&J.width){T.width(J.width)}if(J.fit&&J.height&&J.height!="auto"){O.height(J.height)}V.cycleH=(J.fit&&J.height)?J.height:T.height();V.cycleW=(J.fit&&J.width)?J.width:T.width();T.css(J.cssBefore);if(J.pager){G.fn.cycle.createPagerAnchor(K.length-1,V,G(J.pager),K,J)}if(typeof J.onAddSlide=="function"){J.onAddSlide(T)}};if(J.timeout||J.continuous){this.cycleTimeout=setTimeout(function(){E(K,J,0,!J.rev)},J.continuous?10:J.timeout+(J.delay||0))}})};function E(N,I,M,O){if(I.busy){return }var L=I.container,Q=N[I.currSlide],P=N[I.nextSlide];if(L.cycleTimeout===0&&!M){return }if(!M&&!L.cyclePause&&((I.autostop&&(--I.countdown<=0))||(I.nowrap&&!I.random&&I.nextSlide<I.currSlide))){if(I.end){I.end(I)}return }if(M||!L.cyclePause){if(I.before.length){G.each(I.before,function(R,S){S.apply(P,[Q,P,I,O])})}var J=function(){if(G.browser.msie&&I.cleartype){this.style.removeAttribute("filter")}G.each(I.after,function(R,S){S.apply(P,[Q,P,I,O])})};if(I.nextSlide!=I.currSlide){I.busy=1;if(I.fxFn){I.fxFn(Q,P,I,J,O)}else{if(G.isFunction(G.fn.cycle[I.fx])){G.fn.cycle[I.fx](Q,P,I,J)}else{G.fn.cycle.custom(Q,P,I,J,M&&I.fastOnEvent)}}}if(I.random){I.currSlide=I.nextSlide;if(++I.randomIndex==N.length){I.randomIndex=0}I.nextSlide=I.randomMap[I.randomIndex]}else{var K=(I.nextSlide+1)==N.length;I.nextSlide=K?0:I.nextSlide+1;I.currSlide=K?N.length-1:I.nextSlide-1}if(I.pager){G.fn.cycle.updateActivePagerLink(I.pager,I.currSlide)}}if(I.timeout&&!I.continuous){L.cycleTimeout=setTimeout(function(){E(N,I,0,!I.rev)},I.timeout)}else{if(I.continuous&&L.cyclePause){L.cycleTimeout=setTimeout(function(){E(N,I,0,!I.rev)},10)}}}G.fn.cycle.updateActivePagerLink=function(I,J){G(I).find("a").removeClass("activeSlide").filter("a:eq("+J+")").addClass("activeSlide")};function F(I,J,M){var L=J.container,K=L.cycleTimeout;if(K){clearTimeout(K);L.cycleTimeout=0}if(J.random&&M<0){J.randomIndex--;if(--J.randomIndex==-2){J.randomIndex=I.length-2}else{if(J.randomIndex==-1){J.randomIndex=I.length-1}}J.nextSlide=J.randomMap[J.randomIndex]}else{if(J.random){if(++J.randomIndex==I.length){J.randomIndex=0}J.nextSlide=J.randomMap[J.randomIndex]}else{J.nextSlide=J.currSlide+M;if(J.nextSlide<0){if(J.nowrap){return false}J.nextSlide=I.length-1}else{if(J.nextSlide>=I.length){if(J.nowrap){return false}J.nextSlide=0}}}}if(J.prevNextClick&&typeof J.prevNextClick=="function"){J.prevNextClick(M>0,J.nextSlide,I[J.nextSlide])}E(I,J,1,M>=0);return false}function H(J,K){var I=G(K.pager);G.each(J,function(L,M){G.fn.cycle.createPagerAnchor(L,M,I,J,K)});G.fn.cycle.updateActivePagerLink(K.pager,K.startingSlide)}G.fn.cycle.createPagerAnchor=function(K,L,I,J,M){var N=(typeof M.pagerAnchorBuilder=="function")?G(M.pagerAnchorBuilder(K,L)):G('<a href="#">'+(K+1)+"</a>");if(N.parents("body").length==0){N.appendTo(I)}N.bind(M.pagerEvent,function(){M.nextSlide=K;var P=M.container,O=P.cycleTimeout;if(O){clearTimeout(O);P.cycleTimeout=0}if(typeof M.pagerClick=="function"){M.pagerClick(M.nextSlide,J[M.nextSlide])}E(J,M,1,M.currSlide<K);return false})};function C(K){function J(L){var L=parseInt(L).toString(16);return L.length<2?"0"+L:L}function I(N){for(;N&&N.nodeName.toLowerCase()!="html";N=N.parentNode){var L=G.css(N,"background-color");if(L.indexOf("rgb")>=0){var M=L.match(/\d+/g);return"#"+J(M[0])+J(M[1])+J(M[2])}if(L&&L!="transparent"){return L}}return"#ffffff"}K.each(function(){G(this).css("background-color",I(this))})}G.fn.cycle.custom=function(T,N,I,K,J){var S=G(T),O=G(N);O.css(I.cssBefore);var L=J?1:I.speedIn;var R=J?1:I.speedOut;var M=J?null:I.easeIn;var Q=J?null:I.easeOut;var P=function(){O.animate(I.animIn,L,M,K)};S.animate(I.animOut,R,Q,function(){if(I.cssAfter){S.css(I.cssAfter)}if(!I.sync){P()}});if(I.sync){P()}};G.fn.cycle.transitions={fade:function(J,K,I){K.not(":eq("+I.startingSlide+")").css("opacity",0);I.before.push(function(){G(this).show()});I.animIn={opacity:1};I.animOut={opacity:0};I.cssBefore={opacity:0};I.cssAfter={display:"none"}}};G.fn.cycle.ver=function(){return A};G.fn.cycle.defaults={fx:"fade",timeout:4000,continuous:0,speed:1000,speedIn:null,speedOut:null,next:null,prev:null,prevNextClick:null,pager:null,pagerClick:null,pagerEvent:"click",pagerAnchorBuilder:null,before:null,after:null,end:null,easing:null,easeIn:null,easeOut:null,shuffle:null,animIn:null,animOut:null,cssBefore:null,cssAfter:null,fxFn:null,height:"auto",startingSlide:0,sync:1,random:0,fit:0,pause:0,autostop:0,autostopCount:0,delay:0,slideExpr:null,cleartype:0,nowrap:0,fastOnEvent:0}})(jQuery);

;(function($) {
Drupal.behaviors.views_rotator = function(context) {
  $.each(Drupal.settings.views_rotator, function(id) {
    $('#' + id).cycle(this);
    if (this.next != undefined || this.prev != undefined) {
      var settings = this;
      $(settings.prev).addClass('views-rotator-prev');
      $(settings.next).addClass('views-rotator-next');
      $('.' + id).hover(function() {
        $(settings.prev).addClass('views-rotator-prev-hover');
        $(settings.next).addClass('views-rotator-next-hover');
      }, function() {
        $(settings.prev).removeClass('views-rotator-prev-hover');
        $(settings.next).removeClass('views-rotator-next-hover');
      });
    }
    if (this.auto_height == 1) {
      var height = null;
      $('#' + id + ' .views-rotator-item').each(function() {
        var item_height = $(this).height();
        if (item_height > height) height = item_height;
      });
      $('#' + id).height(height);
    }
  });
};
})(jQuery);