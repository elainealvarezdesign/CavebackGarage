/**
 * Caveback one-page interactions (prototype).
 * - Card sliders: prev/next arrows scroll the track one card.
 * - "Add to quote" toggles: shared selection between service cards and form chips.
 * - Before/after comparison.
 * - Catalog and 2-step quote forms: native validation, simulated submit.
 */
( function () {
	'use strict';

	var SERVICE_NAMES = {
		reset: 'Caveback Reset',
		keep: 'Keep Clear',
		tote: 'Tote System',
		wall: 'Wall System',
		floor: 'Floor Finish'
	};

	// Sliders.
	document.querySelectorAll( '[data-cb-slider]' ).forEach( function ( wrap ) {
		var track = wrap.querySelector( '.cb-slider' );
		if ( ! track ) {
			return;
		}
		function step() {
			var card = track.querySelector( 'li' );
			return card ? card.getBoundingClientRect().width + 16 : 280;
		}
		var prev = wrap.querySelector( '[data-cb-prev]' );
		var next = wrap.querySelector( '[data-cb-next]' );
		if ( prev ) {
			prev.addEventListener( 'click', function () {
				track.scrollBy( { left: -step(), behavior: 'smooth' } );
			} );
		}
		if ( next ) {
			next.addEventListener( 'click', function () {
				track.scrollBy( { left: step(), behavior: 'smooth' } );
			} );
		}
	} );

	// Service selection, shared by the cards and the form chips.
	var selected = { reset: true };
	var summary = document.querySelector( '[data-cb-summary]' );

	function renderServices() {
		document.querySelectorAll( '[data-cb-svc]' ).forEach( function ( btn ) {
			var on = !! selected[ btn.getAttribute( 'data-cb-svc' ) ];
			btn.setAttribute( 'aria-pressed', on ? 'true' : 'false' );
			var label = btn.querySelector( '[data-cb-label]' );
			if ( label ) {
				label.textContent = on ? 'Added to quote' : 'Add to quote';
			}
		} );
		if ( summary ) {
			var picked = Object.keys( SERVICE_NAMES ).filter( function ( k ) {
				return selected[ k ];
			} ).map( function ( k ) {
				return SERVICE_NAMES[ k ];
			} );
			summary.textContent = picked.length === 0
				? 'No services selected yet. Pick any that fit, or just tell us about your garage.'
				: ( picked.length === 1 ? '1 service added to your quote: ' : picked.length + ' services added to your quote: ' ) + picked.join( ', ' ) + '.';
		}
	}
	document.addEventListener( 'click', function ( e ) {
		var btn = e.target.closest( '[data-cb-svc]' );
		if ( ! btn ) {
			return;
		}
		var key = btn.getAttribute( 'data-cb-svc' );
		selected[ key ] = ! selected[ key ];
		renderServices();
	} );
	renderServices();

	// Before / after.
	document.querySelectorAll( '[data-cb-ba]' ).forEach( function ( ba ) {
		var range = ba.querySelector( 'input[type="range"]' );
		function set() {
			ba.style.setProperty( '--split', range.value + '%' );
		}
		range.addEventListener( 'input', set );
		set();
	} );

	// Catalog form (simulated).
	var catalog = document.querySelector( '[data-cb-catalog]' );
	var catalogDone = document.querySelector( '[data-cb-catalog-done]' );
	if ( catalog && catalogDone ) {
		catalog.addEventListener( 'submit', function ( e ) {
			e.preventDefault();
			if ( ! catalog.reportValidity() ) {
				return;
			}
			catalog.hidden = true;
			catalogDone.hidden = false;
		} );
	}

	// Quote form: two steps (simulated submit).
	var quote = document.querySelector( '[data-cb-quote]' );
	if ( quote ) {
		var steps = quote.querySelector( '[data-cb-quote-steps]' );
		var done = quote.querySelector( '[data-cb-quote-done]' );
		var step1 = quote.querySelector( '[data-cb-step="1"]' );
		var step2 = quote.querySelector( '[data-cb-step="2"]' );
		var label = quote.querySelector( '[data-cb-step-label]' );
		var bars = quote.querySelectorAll( '[data-cb-progress]' );
		var files = quote.querySelector( '#cb-files' );
		var filesLabel = quote.querySelector( '[data-cb-files-label]' );

		var show = function ( n ) {
			step1.hidden = n !== 1;
			step2.hidden = n !== 2;
			label.textContent = 'Step ' + n + ' of 2';
			bars.forEach( function ( bar ) {
				var i = Number( bar.getAttribute( 'data-cb-progress' ) );
				bar.classList.toggle( 'is-active', i === n );
				bar.classList.toggle( 'is-done', i < n );
				if ( i === n ) {
					bar.setAttribute( 'aria-current', 'step' );
				} else {
					bar.removeAttribute( 'aria-current' );
				}
			} );
			var first = ( n === 1 ? step1 : step2 ).querySelector( 'input, select, textarea' );
			if ( first ) {
				first.focus( { preventScroll: true } );
			}
		};

		step1.addEventListener( 'submit', function ( e ) {
			e.preventDefault();
			if ( step1.reportValidity() ) {
				show( 2 );
			}
		} );
		quote.querySelector( '[data-cb-back]' ).addEventListener( 'click', function () {
			show( 1 );
		} );
		step2.addEventListener( 'submit', function ( e ) {
			e.preventDefault();
			if ( ! step2.reportValidity() ) {
				return;
			}
			steps.hidden = true;
			done.hidden = false;
			done.focus();
		} );
		quote.querySelector( '[data-cb-again]' ).addEventListener( 'click', function () {
			step1.reset();
			step2.reset();
			done.hidden = true;
			steps.hidden = false;
			show( 1 );
		} );
		if ( files && filesLabel ) {
			files.addEventListener( 'change', function () {
				if ( files.files.length ) {
					filesLabel.textContent = files.files.length + ( files.files.length === 1 ? ' file selected' : ' files selected' );
				}
			} );
		}
	}
}() );
