
var scrolledWin = 0, winW, winH, winR, screenH, emS, screensI = 0, scrolled = 0, theS = 1, exp = false, trans3D = false, thisL = 0, topL, leftL, sizeL = 1, inBetween = [], aboutOff, about = false, menuH = 0, imprintOff = 0, showLetter, bigL = true;
var $screen = [], $offSet = [], $contentWrapper = [], $navLink = [], $navCount = [], inView = [], $h4 = [];

var $win, $body, $wrapper, $works, $about, $bigL, $bigLc, $aboutW;

var screenZoom = 0.1; // some setting
var imgSize = 960; // max img size

var navH = 20; // height of nav li
var frame = 120; // position of nav item

var vimeoColor = "fff";

// distortion time
var dt1 = 500, dt2 = 8000;

// random big letter
var bigL1 = 50, bigL2 = 100;
var starting = true;
var started = false;
var poolS = '&brvbar; &nabla; &oline; &deg; &Delta; &bull;';
var randomCharS = poolS.split(' '); 


// random special character
var pool = '&brvbar; &nabla; &oline; &otimes; &brvbar; &bull; &deg; &Delta; &mdash; &lang; &loz; &rarr; &there4; &times; | 1 2 3 4 5 6 8 9 START';
var randomChar = pool.split(' '); 

// remove js class
$('html').removeClass("no-js").addClass("js");

$(document).ready(function(){
		
	// Cache objects
	$win = $(window);
	$body = $('body');	
	$wrapper = $('#wrapper');
	$lander = $('#lander');
	$subTilte = $lander.find("h2");
	$about = $("#about");
	$aboutL = $("#aboutLink");
	$bigL = $('#bigLetter');
	$bigLc = $('#bigLetter span');
	cacheScreens();
		
	// init
	init();	

});

$(window).load(function() {
	
	// fade in page
	start();
	
});

// init site functions
/////////////////////////////////////////

function init() {
	
	// start up after 3sec no matter what
  window.setTimeout(function(){
  	start();
  }, 2000);
  
  // start letter animation
	bigLetterR();
	    	
	// get window dimensions
	adjustWindow();
	$win.resize(function() {
		adjustWindow();
	});
  
  // add bigger experience for non-touch devises and other than IE < 10
  if($('html').hasClass("no-touch") && !$('html').hasClass("oldie")) {
  	$('html').addClass("exp");
		exp = true;  
	}
	if($('html').hasClass("csstransforms3d")) {
		trans3D = true;  
	}
	
	// handle scrolling
	$win.scroll(function() {			
		handleScroll();
	});	 
		
	// start rendering image
	animloop();	
	
	// start distroy animation
	disTroy($h4[theS-1],true);
	// disTroy($subTilte,false);
	$subTilte.mouseover(function() {
		disTroy($(this),false);
	});
	
	// navigation 
	initNav();
		
	// show video function
	$('.video a').live( "click", function(e) {
		e.preventDefault();
		showVideo($(this));
	});

}

// fade in experience
function start() {
	
	if(started == false) {
	
		started = true;	
		
		// start off
		window.setTimeout(function() {
		
		  // fade in manuel
		  $(".manuel").addClass("active");
		  
		  // reduce bigL speed
		  bigL1 = 200;
		  bigL2 = 1000;
		  
		  // set full caracter set
		  starting = false;
		  
		  window.setTimeout(function() {			
		  	// fade in rueda
		    $(".rueda").addClass("active");		    		  
		  }, 300);
		  		
		  window.setTimeout(function() {			
		  	// fade in rueda
		    $subTilte.addClass("active");		    		  
		  }, 600);		
		  
		  
		  // fade in showreel etc
		  var landerM = (winH / 2) + 100;
		  // $lander.css({marginBottom: landerM});
		  	
		
		  window.setTimeout(function() {			
		  	// show showreel
		  	$('section.full').css({display: "block", opacity: "0"});
		  	$about.css({display: "block", opacity: "1"});
		  	$('#imprint').css({display: "none", opacity: "1"});
		  	topOffs();
		  	$('section.full').animate({opacity: "1"}, 1400, "easeInOutQuad");	    		  
		    		  		    		  	
		  	// show navi
		  	window.setTimeout(function() {
		  		// reduce bigL speed
					bigL1 = 2000;
					bigL2 = 16000;	
					showNav($("li.navLink").last(),true); 
				}, 800);
		    
		  }, 1000);
		  
		}, 600);
		
	}

}

function showNav(el,about) {

	if(el.prev().length) {
		el.animate({opacity: "1"},300, "easeOutQuad");
	} else {
		window.setTimeout(function() {
			el.animate({opacity: "1"},450, "easeOutQuad");		
		}, 300);		
	}
	
	window.setTimeout(function() {
		if(el.prev().length) {
			showNav(el.prev(),false);
		}		
	}, 100);
	
	if(about == true) {
		$aboutL.animate({opacity: "1"},300, "easeOutQuad");
	}
	
}


function showVideo(el) {
	
	$('body,html').animate({scrollTop: el.parents('section').data("offset")},300, "easeInOutQuad");	
	killPadbug(400);
	el.fadeOut(350, "easeInOutQuad");
	
	window.setTimeout(function(){
	 
		// hide all other videos
		$('.video a').show();			
		$('iframe').remove();				
		
		// get right video
		var vimeoId = el.attr('data-video');
		var video = '<iframe src="http://player.vimeo.com/video/' + vimeoId + '?title=0&amp;byline=0&amp;portrait=0&amp;autoplay=1&amp;badge=0&amp;color=' + vimeoColor + '" width="100%" height="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
		
		// hide preview, show video
		$('section.full').removeClass('playing').removeClass('video16');
		
		// check for video dimension
		// resize box if not 21:9
		if(el.hasClass("video16")) {
			el.parents('section').addClass("video16").addClass("playing");
		  window.setTimeout(function(){
		  	el.hide().parent('.video').append(video);
		  }, 800);		  
		} else {		
			el.hide().parent('.video').append(video).parents('section').addClass("playing");
		}
	 
	}, 360);


}


// set image and window dimensions
function adjustWindow(){

	// get window size
	winW = $(window).width();
	winH = $(window).height();
	winR = winH/winW;
	
	if(winR >= 1) { // portrait
		screenH = Math.floor(winH * 1.05);
	} else if(winR < 1 && winH <= 480) { // small landscape
		screenH = 480;
	} else { // normal landscape
		screenH = Math.floor(winH * 1.25);
	}	
	
	// calculate basis em size
	emS = $body.css('font-size');
	emS = emS.replace('px','');
	
	// adjust lander 	
	var landerH = winH / 2;
	if(landerH < 230) { // portrait
		landerH = 230;
	}
	var landerP = winH * 0.32;
	$lander.css({height: landerH}).find('.landerWrapper').css({paddingTop: landerP});
	
	
	// set fullscreen sizes
	$('section.full').not('#about').css({height: screenH});
	$('#imprint').css({minHeight: winH});
	
	// calculate top offset for every screen
	topOffs();	
			
	// get video height
	var videoH = $('#post1').find('.video').height();
  
  // center content vertically and position subhead
  for (var i=0;i<screensI; i++) { 
		var thisMargin = Math.floor((winH - videoH) / 2);
		if(thisMargin < 0) { thisMargin = 0; }
		if(i != screensI - 1) { 
	    $contentWrapper[i].css({paddingTop: thisMargin + "px"});
	  }
	} 	  			
	
}

function cacheScreens() {

	screensI = $('section.full').length;
		
	$('section.full').each(function(){
		$screen.push($(this));
		$contentWrapper.push($(this).find(".contentWrapper"));
		inView.push(0);
		var h4 = $(this).find("h4");
		$h4.push(h4);
		// destroy first h4s
		if(h4.html()) {
			disTroy(h4,false);
			h4.mouseover(function() {
				disTroy($(this),false);
			});
		}
	});
	
	$('.navLink').each(function(){
		$navLink.push($(this));
		$navCount.push($(this).find(".navCount"));
		inBetween.push(false);
	});
	
}

// calculate top offset for every screen
function topOffs() {

	for (var i=0;i<screensI; i++) { 
		var topOff = $screen[i].position();
		topOff = topOff.top;	 
    $screen[i].data("offset", topOff);			
    if(i == screensI-1) {
   		aboutOff = Math.floor($screen[i].data("offset"));
   	}
	}
	
	imprintOff = $("#imprint").position();
	imprintOff = Math.floor(imprintOff.top + (21 * emS));
		
}

function initNav() {

	$("nav#menu a").live( "click", function(e) {		
		$('body,html').animate({scrollTop: $($(this).attr("href")).data("offset")},800, "easeInOutQuad");
		killPadbug(800);
		$(this).parents(".navLink").addClass("active");
		e.preventDefault();
	});
	
	$("a.button,#aboutLink .aboutLink").live( "click", function(e) {
		$('body,html').animate({scrollTop: $($(this).attr("href")).data("offset")},800, "easeInOutQuad");
		killPadbug(800);
		e.preventDefault();
	});
	
	$("#aboutLink .workLink").live( "click", function(e) {
		$('body,html').animate({scrollTop: $screen[0].data("offset")},1600, "easeInOutQuad");
		killPadbug(1600);
		e.preventDefault();
	});
	
	// position navi 
	if(exp) {
		for (var i=0;i<(screensI-1); i++) {		
			$navLink[i].css({top: (winH - frame - (navH * screensI) + (navH * i)) + "px"});
			// calculate navH
			menuH = menuH + 20;
		}
	}
	
	// info toggle
	$(".infoToggle").live( "click", function(e) {
		if($(this).hasClass("shown")) {
			$(this).removeClass("shown").parents(".contentWrapper").removeClass("infoShown");
		} else {
			$(this).addClass("shown").parents(".contentWrapper").addClass("infoShown").addClass("infoShownDelay");
		}
		e.preventDefault();
	});	
	$(".info").live( "click", function(e) {
		$(this).parent().find(".infoToggle").removeClass("shown").parents(".contentWrapper").removeClass("infoShown");
	});   
	
	// imprint 
	$("#imprintLink a").live( "click", function(e) {
		if($(this).hasClass("shown")) {
			$(this).removeClass("shown");
			$("#imprintWrapper").slideUp(400, "easeInOutQuad");
		} else {
			$(this).addClass("shown");
			$("#imprintWrapper").slideDown(600, "easeInOutQuad");			
			$('body,html').animate({scrollTop: imprintOff},600, "easeInOutQuad");
			killPadbug(600);
		}
		e.preventDefault();
	});	
	
}


// rendering
function render() {
    
	for (var i=0;i<screensI; i++) {	
		// is screen in view?	
		var thisOffset = $screen[i].data("offset");
		if((scrolled + winH) > thisOffset) { // already in view?
			if(scrolled < (thisOffset+ winH)) { // still in view?
				renderScreen(i,thisOffset);
				theS = i;
			}
		} else {
			inView[i] = 0; // prevent from missing inview state
		}
		
		if(exp) {
			if(i<(screensI) && exp) {
			  if($navLink[i]) {
			  	renderNav(i,thisOffset);
			  }
			}
		}
	}
	
	if(exp) {	
		renderNavA();
	}

}

function renderNav(i,thisOffset) {	
	
	var navPos = Math.floor((thisOffset - scrolled));
	var bottomPos = (winH - (frame * 3) - (navH * screensI) + (navH * i));
	var topPos = (frame + (navH * i));
	
	// render only if projects are in view
	if((scrolled + frame + menuH) < aboutOff) {
		
		if (navPos > bottomPos) {
		  navPos = bottomPos;
		}	
		if (navPos < topPos) {
		  navPos = topPos;
		}
		
	} else { // scroll out of view if about comes in view
		
		navPos = Math.floor(aboutOff + (navH * i) - scrolled - frame - menuH);

	}

	$navLink[i].css({top: navPos + "px"});	
	
}

function renderNavA() {	
		
	var bottomPos = 0;
	var topPos = winH - (16 * emS);
		
	// render only if projects are in view
	if((scrolled + (winH * 0.5)) > aboutOff) {
	
		var navPos = Math.floor((scrolled + (winH * 0.5) - aboutOff) * 1.7);
			
		if (navPos < bottomPos) {
		  navPos = bottomPos;
		}	
		if (navPos > topPos) {
		  navPos = topPos;
		}
		
	} else { // scroll out of view if about comes in view
		
		var navPos = 0;

	}

	$aboutL.css({bottom: navPos + "px"});	
	
	
	// set active link
	if((scrolled + 10) > aboutOff) {
		
		if(!about) {
			about = true;
			$body.addClass("about");
		}
		
	} else { // scroll out of view if about comes in view
		
		if(about) {
			about = false;
			$body.removeClass("about");
		}

	}
	
}

// thisOffset = obere ecke section
// scrolled = bei start 0 / zB: ein fullscreen gescrolled 1000 (winH)

function renderScreen(i,thisOffset) {
	
	// render only for big experience
	if(exp) {
	
		// calculate zoom
		var zoom = ((scrolled + winH - thisOffset) / (winH * 1.333)) + 0.25; // +0.5: dont start with 0, 
		if(zoom > 0.999) { zoom = 1; }
		
		// calculate deg
		var deg = (thisOffset - scrolled) / winH * 20;
		if(deg < 0) { deg = 0; }
		
		if(scrolled > thisOffset) {
		
		  // fade out		  
		  var opac = ((thisOffset + (winH * 1.2) - scrolled)) / (winH);	// * 1.2 = trigger later, 
		  opac = Math.pow(opac,4);
		  
		  if(opac < 0.01) { opac = 0; }
			
		} else {
		  // fade in
		  
		  // zoom all frames except the first one (showreel)
			if(i != 0) {
		  	var opac = ((scrolled + winH - thisOffset) / winH);
				opac = Math.pow(opac,4);
				if(opac > 1) { opac = 1; }
				
			} else {
				opac = 1;
			}
		}
		
		if(trans3D) {
			$contentWrapper[i].css('transform', 'rotateX(' + deg + 'deg) scale('+zoom+', '+zoom+')').css({opacity: opac});
		} else {
			$contentWrapper[i].css('transform', 'scale('+zoom+', '+zoom+')').css({opacity: opac});
		}
	
	}
	
	
	// define screen in view
	if((scrolled + (winH * 0.05)) > thisOffset) { // close to centered on viewport
		if(scrolled < (thisOffset + (winH * 0.5))) { // half outside of viewport already
						
			if(inView[i] == 0) {
				$('section').removeClass('inView');
				$screen[i].addClass("inView");
				$('.navLink').removeClass('active');
				if($navLink[i]) {
					$navLink[i].addClass("active");
				}
				inView[i] = 1;
			}
							
		} else {
			
			if(inView[i] == 1) {
				$('section').removeClass('inView');
				$('.navLink').removeClass('active');
				inView[i] = 0;
			}
						
		}
				
	} else {
		inView[i] = 0;		
	}
	
	
}


// main render loop
// render as fast as possible and only when tab is in view
window.requestAnimFrame = (function(){
  return  window.requestAnimationFrame       ||
          window.webkitRequestAnimationFrame ||
          window.mozRequestAnimationFrame    ||
          window.oRequestAnimationFrame      ||
          window.msRequestAnimationFrame     ||
          function(/* function */ callback, /* DOMElement */ element){
    		window.setTimeout(callback, 1000 / 60);
  };
})();

// on every loop render image
function animloop() {
  render();
  requestAnimFrame(animloop);
}

// get window offset / scroll position
function handleScroll() {
	scrolled = $win.scrollTop();	
	if(exp) {
	  bigLetter();
	}
}

function bigLetter() {

	if(bigL == true && !$screen[theS].hasClass("playing")) {	
		
		if(starting == true) {
		 thisL = randomCharS[Math.floor(Math.random()*randomCharS.length)];
		} else {
		 thisL = randomChar[Math.floor(Math.random()*randomChar.length)];
		}		
	  		  
		topL = Math.floor(Math.random() * winH * 0.5) + (winH * 0.05);
		leftL = Math.floor(Math.random() * winW * 0.7) + (winW * 0.05);
		sizeL = Math.random() * 0.4 + 0.8;
		
		if(thisL == "START") {
			sizeL = sizeL * 0.5;
		}
		
		$bigL.hide();
		$bigLc.html(thisL);
		$bigL.css({top: topL+"px", left: leftL+"px", transform: "scale("+sizeL+")"}).show();
		
		// length of appearance
		var outL = Math.floor(Math.random()* 50) + 150;
			
		bigL = false;
		
		// hide
		window.setTimeout(function(){
		  $bigL.hide();		    
		}, outL);
		
		// delay of appearance
		outL = Math.floor(Math.random()* 100) + outL;
		
		window.setTimeout(function(){
			bigL = true;	    
		}, outL);
		
		
	  
	}

}

function bigLetterR() {

	bigLetter();
	
	var outL = Math.floor(Math.random()* bigL2) + bigL1;
			
	window.setTimeout(function(){				 
		bigLetterR();
	}, outL);
		
}


function disTroy(el,repeat) {
	
	if(el && el.html()) {
	
		var content = el.html();
		content = content.replace('<span class="top">', "");
		content = content.replace('<span class="super">', "");
		content = content.replace("</span>", "");
		
		if(Math.floor(Math.random() * 2) == 1) {
		  var spanC = '<span class="top">';
		} else {
		  var spanC = '<span class="super">';
		}
		
		var conL = content.length;
		var conS0 = Math.floor(Math.random() * (content.length / 4)) + 2; 	// max length of distortion // min: 2
		var conS1 = Math.floor(Math.random() * (content.length - conS0));
		var conS2 = conS0 + conS1;
		var conN = content.substring(conS1, conS2);
		
		if(Math.floor(Math.random() * 2) == 1) {
		  content = content.replace(conN, '<span class="top">'+conN+"</span>");
		} else {
		  content = content.replace(conN, '<span class="super">'+conN+"</span>");
		}
			
		// el.hide().html(content).fadeIn("200");
		el.html(content);
				
		
	}
	
	// do it again after random time?
	if(repeat == true) {
	  
	  var outL = Math.floor(Math.random() * (dt2-dt1)) + dt1;

	  window.setTimeout(function() {
	    disTroy($h4[theS-1],true);
	  }, outL);
	  
	}	
	
}

// iPad fixed navigation bug after scrollTo
function killPadbug(time) {
	if(exp == false) {
		time = time + 500;
		$body.addClass('scrolling');
		window.setTimeout(function(){
		    $body.removeClass('scrolling');
		},time);
	}
}



