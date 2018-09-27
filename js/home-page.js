var loader = document.querySelector('#loader');
var counter, ctr;
var sr = ScrollReveal();
var srOpts = {
	delay: 500,
	distance: '50px',
	easing: 'cubic-bezier(.31,.03,.47,1)',
	scale: 0.8,
	afterReveal: function (el) {
		slideUp = el.getElementsByClassName('mgblock');
		for(var i=0; i<slideUp.length; i++){
			slideUp[i].classList.remove('margin-top');
		}
	}
};

function scrollUp(){
	document.body.scrollTop = 0;
	document.documentElement.scrollTop = 0;
}

function callSlider(){

}

function refactorPost(){
	if(document.querySelector('#postContent') && document.querySelector('.wp-block-quote')){
		var contentOrigin = document.querySelector('.wp-block-quote');
		var textWrap = contentOrigin.innerHTML;
		contentOrigin.parentNode.removeChild(contentOrigin);
		document.querySelector('#blockWrapper').querySelector('.content').innerHTML =textWrap;
	}
	if(document.querySelector('#postContent') && document.querySelector('h4.push-top')){
		var contentAuthorOrigin = document.querySelector('h4.push-top');
		var textWrap = contentAuthorOrigin.outerHTML;
		var contentPhotoOrigin = document.querySelector('h5.push-top');
		if(contentPhotoOrigin){
			textWrap = textWrap + contentPhotoOrigin.outerHTML;
			contentPhotoOrigin.parentNode.removeChild(contentPhotoOrigin);
		}
		contentAuthorOrigin.parentNode.removeChild(contentAuthorOrigin);
		document.querySelector('#textbyBlock').innerHTML =textWrap;
	}
	if(document.querySelector('#postContent') && document.querySelector('.wp-block-pullquote')){
		var contentOrigin = document.querySelector('.wp-block-pullquote');
		var innerBlock = contentOrigin.querySelector('blockquote');
		var textWrap;
		if(innerBlock){
			textWrap = contentOrigin.querySelector('blockquote').innerHTML;
		}else{
			textWrap = contentOrigin.innerHTML;
		}
		contentOrigin.parentNode.removeChild(contentOrigin);
		document.querySelector('#introsection').innerHTML =textWrap;
	}
	if(document.querySelector('#postContent') && document.querySelector('ul.references')){
		var contentOrigin = document.querySelector('ul.references');
		var textWrap = contentOrigin.outerHTML;
		contentOrigin.parentNode.removeChild(contentOrigin);
		document.querySelector('#referencesBlock').innerHTML =textWrap;
		var clelems = document.querySelectorAll('.collapsible');
    	M.Collapsible.init(clelems);
	}
}

function ifAlert(){
	var topAlert = document.querySelector('.top-alert');
	if(topAlert){
		if(topAlert.textContent==''){
			return false;
		}else{
			topAlert.classList.add("alert");
			return true;
		}
	}
}

function setCarousel(carouselWrapper, carouselOptions){
	var carouselElem = carouselWrapper.getElementsByClassName('carousel');
	var instances = M.Carousel.init(carouselElem[0], carouselOptions);
	var slides = carouselWrapper.getElementsByClassName('indicator-item').length;

	var prev = document.querySelector('#prev');
	var next = document.querySelector('#next');

	counter = 1;

	prev.addEventListener("click", function(){
		instances.prev();
		window.clearInterval(cycleNext);
	});

	next.addEventListener("click", function(){
		instances.next();
		window.clearInterval(cycleNext);
	});

	if(window.outerWidth > 1024){
		var cycleNext = setInterval(function(){
			if(counter === slides){
				instances.set(0);
			} else {
				instances.next();
			}
		}, 6000);
	}

	//pageLoaded();

}

function pageLoaded() {
	loader.classList.add("fadeOut");
	setTimeout(function(){
		loader.classList.add("hide");
		if(document.querySelector('#postContent')){
			refactorPost();
		}
	},1000);
}

document.addEventListener('DOMContentLoaded', function() {

	var sideNav = document.querySelectorAll('.sidenav');
	M.Sidenav.init(sideNav);

	var figs = document.querySelectorAll('.materialboxed');
	var instances = M.Materialbox.init(figs);

	var carousel1 = document.querySelector('#herosliderwrapper');
	var carouselOptions1 = {
		duration: 50,
		fullWidth: true,
		indicators: true,
		noWrap: true,
		onCycleTo: function(data){
			counter = parseInt(data.getAttribute('data-counter'));
			console.log(counter);
		}
	}
	
	var loaderImg = document.getElementById("loaderImg");
	if(loaderImg===undefined || loaderImg===null){
		pageLoaded();
		sr.reveal('.scrollblock', srOpts);
		document.querySelector('#scroll-down-up').classList.remove('hidden');
		ifAlert();
	}else{
		var loadCheck = setInterval(function(){
			if( document.getElementById("loaderImg").complete ){
				var hideImage = document.querySelector('.hide-on-load');
				if(hideImage===null || hideImage===undefined){}
				else{
					hideImage.classList.add('hide');
				}
				window.scrollTo(0, 0);
				clearInterval(loadCheck);
				pageLoaded();
				setTimeout(function(){
					if(carousel1===undefined || carousel1===null){
						sr.reveal('.scrollblock', srOpts);
					}else{
						setCarousel(carousel1, carouselOptions1);
						sr.reveal('.scrollblock', srOpts);
					}
					document.querySelector('#scroll-down-up').classList.remove('hidden');
					if(document.querySelector('#social-links')){
						document.querySelector('#social-links').classList.remove('hidden');
					}
					ifAlert();
				},1000);
			}
		},100);
	}

	var elems = document.querySelectorAll('.slider');
	var sliderHgt = 450;
	if(window.outerWidth < 1024){
		sliderHgt = 300;
	}
	M.Slider.init(elems,{interval:5000,duration:500,indicators:false,height:sliderHgt});

	window.addEventListener('scroll', function(e) {
		var footerpost = document.querySelector('#pagefooter').offsetTop - window.outerHeight;
		
		if(window.scrollY > 30 && document.querySelector('#page-navigation') && ifAlert()){
			document.querySelector('#page-navigation').classList.add('shift');
		}
		if(window.scrollY <= window.outerHeight/2){
			if(document.querySelector('.controls.prev')){
				document.querySelector('.controls.prev').classList.add('hidden');
			}
			if(document.querySelector('.controls.next')){
				document.querySelector('.controls.next').classList.add('hidden');
			}
			if(document.querySelector('#scroll-down-up')){
				document.querySelector('#scroll-part-down').classList.remove('hide');
				document.querySelector('#scroll-part-up').classList.add('hide');
			}
			
		}else if(window.scrollY > footerpost){
			if(document.querySelector('#social-links')){
				document.querySelector('#social-links').classList.add('hidden');
			}
			if(document.querySelector('.controls.prev')){
				document.querySelector('.controls.prev').classList.add('hidden');
			}
			if(document.querySelector('.controls.next')){
				document.querySelector('.controls.next').classList.add('hidden');
			}
		}
		else{
			if(document.querySelector('#social-links')){
				document.querySelector('#social-links').classList.remove('hidden');
			}
			if(document.querySelector('.controls.prev')){
				document.querySelector('.controls.prev').classList.remove('hidden');
			}
			if(document.querySelector('.controls.next')){
				document.querySelector('.controls.next').classList.remove('hidden');
			}
			if(document.querySelector('#scroll-down-up')){
				document.querySelector('#scroll-down-up').classList.remove('hidden');
				document.querySelector('#scroll-part-down').classList.add('hide');
				document.querySelector('#scroll-part-up').classList.remove('hide');
			}
		}

	});
	
});


