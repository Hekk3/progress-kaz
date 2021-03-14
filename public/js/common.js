'use strict'

$(function () {
	// client map
	let clientMapBtn = document.getElementsByClassName('client-map-btn')[0];
	clientMapBtn.addEventListener('click', () => {
		toggleClientMapvisible();
	});

	function isClientMapvisible() {
		return $('.map-block').hasClass('active');
	}

	function toggleClientMapvisible() {
		let mapBlock = $('.map-block');
		mapBlock.toggleClass('active');
		$('#circleslider3').toggleClass('active');
		clientMapBtn.classList.toggle('active');
	}

	// news block
	let newsBlockvisible = false;
	$('.top-news').click(function (event) {
		toggleNewsBlockvisible();
	});

	closeNewsBlock();
	function toggleNewsBlockvisible() {
		$('.news-block').toggleClass('active');
		if (newsBlockvisible) {
			closeNewsBlock();
			$('.client-map-btn').css('opacity', '1');

			if (!isCircleCarouselvisible()) {
				toggleCircleSlidervisible();
			}

			newsBlockvisible = false;
		}
		else {
			visibleNewsBlock();
			$('.client-map-btn').css('opacity', '0');

			if (isClientMapvisible()) {
				toggleClientMapvisible();
			}
			if (isCircleCarouselvisible()) {
				toggleCircleSlidervisible();
			}

			newsBlockvisible = true;
		}
	}

	function visibleNewsBlock() {
		$('.hidden-block.banner-block').css('transform', 'translateX(0%)');
		$('.hidden-block.exectly-news').css('transform', 'translateX(0%)');
	}

	function closeNewsBlock() {
		$('.hidden-block.banner-block').css('transform', 'translateX(300%)');
		$('.hidden-block.exectly-news').css('transform', 'translateX(-300%)');
	}


	// circle carousel
	function isCircleCarouselvisible() {
		return $('#circleslider3').hasClass('active');
	}

	function toggleCircleSlidervisible() {
		$('#circleslider3').toggleClass('active');
	}

	// make curved text
	new CircleType
		(document.getElementById('client-map-btn-text')).radius(350);
	new CircleType
		(document.querySelector('.news-title')).radius(450);



	class CircleSlider {
		constructor(el, dots, dotPositions, visibleDots, queueDots) {
			this.el = document.getElementById(el);
			this.visible = false;
			this.dots = dots;
			this.queueDots = queueDots;
			this.visibleDots = visibleDots;
			this.dotPositions = dotPositions;

			this._initDots();
			this._prepareOffscreenDots();
		}

		_initDots() {
			// circular carousel dot touch
			this.dots.forEach((dot, i) => {
				dot.addEventListener('click', (evt) => {
					if (evt.currentTarget.classList.contains('dot')) {
						this.setActiveSlide(evt.currentTarget);
						evt.stopPropagation();
					}
				});
			});

			this.visibleDots.forEach((dot, i) => {
				dot.style.top = this.dotPositions[i].top + '%';
				dot.style.left = this.dotPositions[i].left + '%';
			});
		}

		nextDot() {
			let dot = queueDots.pop();
			dot.style.display = 'flex';
			dot.style.opacity = '1';
			visibleDots.unshift(dot);

			dot = visibleDots.pop();
			dot.style.opacity = '0';
			setTimeout(() => {
				dot.style.display = 'none';
			}, 500);
			queueDots.unshift(dot);

			if (window.innerWidth > 650) {
				visibleDots[3].classList.remove('active');
				visibleDots[2].classList.add('active');
			} else {
				visibleDots[2].classList.remove('active');
				visibleDots[1].classList.add('active');
			}

			this.placeVisibleDots();

			this._prepareOffscreenDots();
		}

		previousDot() {
			let dot = queueDots.shift();
			dot.style.display = 'flex';
			dot.style.opacity = '1';
			visibleDots.push(dot);

			dot = visibleDots.shift();
			dot.style.opacity = '0';
			setTimeout(() => {
				dot.style.display = 'none';
			}, 500);
			queueDots.push(dot);

			if (window.innerWidth > 650) {
				visibleDots[1].classList.remove('active');
				visibleDots[2].classList.add('active');
			} else {
				visibleDots[0].classList.remove('active');
				visibleDots[1].classList.add('active');
			}

			this.placeVisibleDots();

			this._prepareOffscreenDots();
		}

		placeVisibleDots() {
			visibleDots.forEach((dot, i) => {
				dot.style.top = dotPositions[i].top + '%';
				dot.style.left = dotPositions[i].left + '%';
			});
		}

		isVisible() {
			return this.visible;
		}

		toggleVisible() {
			this.el.classList.toggle('active');
			this.visible = !this.visible;
		}

		_prepareOffscreenDots() {
			this.queueDots[0].style.top = '3%';
			this.queueDots[0].style.left = '68.3%';

			this.queueDots[this.queueDots.length - 1].style.top = '3%';
			this.queueDots[this.queueDots.length - 1].style.left = '30.3%';
		}

		setActiveSlide(slide) {
			let clickedDotIndex = this.visibleDots.findIndex(dot => dot === slide);
			let activeDotIndex = this.visibleDots.findIndex(dot => dot.classList.contains('active'));

			let distance = 0;
			if (clickedDotIndex > activeDotIndex) {
				distance = clickedDotIndex - activeDotIndex
				for (let i = 0; i < distance; i++) {
					if (!isClientMapvisible() && !newsBlockvisible) {
						slider.next();
					}
				}

				// Make dots transition faster
				if (distance > 1) {
					this.visibleDots.forEach((dot, _) => {
						dot.style.transition = 'all 1s';
					});
				}

				let setSlide = () => {
					this.previousDot();
					setTimeout(() => {
						if (--distance > 0) {
							setSlide();
						}
					}, 700);
				}

				setSlide();

				if (distance > 1) {
					this.visibleDots.forEach((dot, _) => {
						dot.style.transition = 'all 1.3s';
					});
				}
			}
			else if (clickedDotIndex < activeDotIndex) {
				distance = activeDotIndex - clickedDotIndex;
				for (let i = 0; i < distance; i++) {
					slider.prev();
				}

				// Make dots transition faster
				if (dispatchEvent > 1) {
					dots.forEach((dot, _) => {
						dot.style.transition = 'all 1s';
					});
				}

				let setSlide = () => {
					this.nextDot();
					setTimeout(() => {
						if (--distance > 0) {
							setSlide();
						}
					}, 700);
				}

				setSlide();

				if (distance > 1) {
					dots.forEach((dot, _) => {
						dot.style.transition = 'all 1.3s';
					});
				}
			}
		}
	}

	// mobile circle slider
	let dots = document.querySelectorAll('#circleslider3 .dot');

	// Set dot positions
	let dotPositions =
		[{ top: 0.3, left: 38.3 },
		{ top: -0.7, left: 49.3 },
		{ top: 0.3, left: 59.1 }];

	if (window.innerWidth > 650) {
		dotPositions.unshift({ top: 3, left: 30.3 });
		dotPositions.push({ top: 3, left: 68.3 });
	}

	// add visible dots
	let numDotsVisible = window.innerWidth > 650 ? 5 : 3;
	let visibleDots = [];
	for (let i = 0; i < numDotsVisible; i++) {
		dots[i].style.display = 'flex';
		dots[i].style.opacity = '1';
		visibleDots.push(dots[i]);
	}

	// add queue dots
	let queueDots = [];
	for (let i = numDotsVisible; i < dots.length; i++) {
		queueDots.push(dots[i]);
	}


	let circleSlider = new CircleSlider('circleslider3', dots, dotPositions, visibleDots, queueDots);
	if (window.innerWidth > 650) {
		dots[1].classList.remove('active');
		dots[2].classList.add('active');
		circleSlider.nextDot();
	}
	// swipe
	let mainContent = document.querySelector('main .content');
	mainContent.addEventListener('touchstart', handleTouchStart, false);
	mainContent.addEventListener('touchmove', handleTouchMove, false);

	var xDown = null;
	var yDown = null;

	function getTouches(evt) {
		return evt.touches ||             // browser API
			evt.originalEvent.touches; // jQuery
	}

	function handleTouchStart(evt) {
		const firstTouch = getTouches(evt)[0];
		xDown = firstTouch.clientX;
		yDown = firstTouch.clientY;
	};

	function handleTouchMove(evt) {
		if (!xDown || !yDown) {
			return;
		}

		var xUp = evt.touches[0].clientX;
		var yUp = evt.touches[0].clientY;

		var notText = !evt.target.classList.contains('text-mobile') &&
			evt.target.tagName != 'SPAN' && evt.target.tagName != 'P';

		var xDiff = xDown - xUp;
		var yDiff = yDown - yUp;

		let dragThreshold = 1;

		if (Math.abs(xDiff) > Math.abs(yDiff)) {/*most significant*/
			if (xDiff > 0 && xDiff > dragThreshold) {
				/* left swipe */
				if (!isClientMapvisible() && !newsBlockvisible) {
					slider.next();
					circleSlider.previousDot();
				}
			} else if (xDiff < 0 && xDiff < dragThreshold) {
				/* right swipe */
				if (!isClientMapvisible() && !newsBlockvisible) {
					slider.prev();
					circleSlider.nextDot();
				}
			}
		} else {
			if (yDiff > 0 && yDiff > dragThreshold) {
				/* up swipe */
				if (!isClientMapvisible() && notText && !newsBlockvisible) {
					slider.prev();
					circleSlider.nextDot();
				}
			} else if (yDiff < 0 && yDiff < dragThreshold) {
				/* down swipe */
				if (!isClientMapvisible() && notText && !newsBlockvisible) {
					slider.next();
					circleSlider.previousDot();
				}
			}
		}
		/* reset values */
		xDown = null;
		yDown = null;
	};


	//SVG Fallback
	if (!Modernizr.svg) {
		$("img[src*='svg']").attr("src", function () {
			return $(this).attr("src").replace(".svg", ".png");
		});
	};


	$("img, a").on("dragstart", function (event) { event.preventDefault(); });

	function Circular(arr, startIntex) {
		this.arr = arr;
		this.currentIndex = startIntex || 0;
	}

	Circular.prototype.next = function () {
		var i = this.currentIndex, arr = this.arr;
		this.currentIndex = i < arr.length - 1 ? i + 1 : 0;
		return this.current();
	}

	Circular.prototype.prev = function () {
		var i = this.currentIndex, arr = this.arr;
		this.currentIndex = i > 0 ? i - 1 : arr.length - 1;
		return this.current();
	}

	Circular.prototype.current = function () {
		return this.arr[this.currentIndex];
	}

	Circular.prototype.iter = function (i) {
		this.currentIndex = i >= 0 && i < this.arr.length ? i : 0;
		return this.currentIndex;
	}

	Circular.prototype.all = function () {
		return this.arr;
	}

	function Slider(data) {
		this.data = data;
	}

	Slider.prototype.all = function () {
		return this.data;
	}

	Slider.prototype.next = function () {

		this.data.all().removeClass("prev-sl quite-prev-sl");
		this.data.all().removeClass("sl-active");
		$(this.data.current()).addClass("prev-sl quite-prev-sl");
		$(this.data.next()).addClass("sl-active");

		return this.data;
	}

	Slider.prototype.prev = function () {

		this.data.all().removeClass("prev-sl quite-prev-sl");
		this.data.all().removeClass("sl-active");
		$(this.data.prev()).addClass("sl-active");
		$(this.data.prev()).addClass("prev-sl quite-prev-sl");
		this.data.next();

		return this.data;
	}
});
