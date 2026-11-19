/**
 * Caveback one-page interactions.
 * - Mobile menu, services carousel, "Add to quote" selection (cards + form chips).
 * - Before/after comparison, FAQ accordion.
 * - 2-step quote form and catalog form. The static Netlify copy sets
 *   window.CAVEBACK_FORMS = 'netlify' and posts to Netlify Forms; in WordPress
 *   and Playground the submit is simulated.
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
	var PLUS = 'M12 5v14M5 12h14';
	var CHECK = 'M20 6L9 17l-5-5';
	var MINUS = 'M5 12h14';

	function $( id ) {
		return document.getElementById( id );
	}

	// Mobile menu.
	var menuBtn = $( 'menu-btn' );
	var menu = $( 'mnav-wrap' );
	function setMenu( open ) {
		menu.hidden = ! open;
		menuBtn.setAttribute( 'aria-expanded', open ? 'true' : 'false' );
	}
	menuBtn.addEventListener( 'click', function () {
		setMenu( menu.hidden );
	} );
	document.querySelectorAll( '[data-close-menu]' ).forEach( function ( a ) {
		a.addEventListener( 'click', function () {
			setMenu( false );
		} );
	} );
	document.addEventListener( 'keydown', function ( e ) {
		if ( e.key === 'Escape' && ! menu.hidden ) {
			setMenu( false );
			menuBtn.focus();
		}
	} );

	// Services carousel.
	var track = $( 'svc-track' );
	function step() {
		var card = track.querySelector( 'li' );
		return card ? card.getBoundingClientRect().width + 14 : 300;
	}
	$( 'svc-prev' ).addEventListener( 'click', function () {
		track.scrollBy( { left: -step(), behavior: 'smooth' } );
	} );
	$( 'svc-next' ).addEventListener( 'click', function () {
		track.scrollBy( { left: step(), behavior: 'smooth' } );
	} );

	// Service selection, shared by the cards and the form chips.
	var selected = { reset: true };
	var summary = $( 'svc-summary' );
	function pickedNames() {
		return Object.keys( SERVICE_NAMES ).filter( function ( k ) {
			return selected[ k ];
		} ).map( function ( k ) {
			return SERVICE_NAMES[ k ];
		} );
	}
	function renderServices() {
		document.querySelectorAll( '[data-svc]' ).forEach( function ( btn ) {
			var on = !! selected[ btn.getAttribute( 'data-svc' ) ];
			btn.setAttribute( 'aria-pressed', on ? 'true' : 'false' );
			var path = btn.querySelector( 'path' );
			if ( path && btn.classList.contains( 'svc-add' ) ) {
				path.setAttribute( 'd', on ? CHECK : PLUS );
			}
		} );
		var picked = pickedNames();
		summary.textContent = picked.length === 0
			? 'No services selected yet. Pick any that fit, or just tell us about your garage.'
			: ( picked.length === 1 ? '1 service in your quote: ' : picked.length + ' services in your quote: ' ) + picked.join( ', ' ) + '.';
	}
	document.addEventListener( 'click', function ( e ) {
		var btn = e.target.closest( '[data-svc]' );
		if ( ! btn ) {
			return;
		}
		var key = btn.getAttribute( 'data-svc' );
		selected[ key ] = ! selected[ key ];
		renderServices();
	} );
	renderServices();

	// Before / after.
	var ba = $( 'ba' );
	var range = $( 'ba-v2' );
	function setSplit() {
		ba.style.setProperty( '--split', range.value + '%' );
	}
	range.addEventListener( 'input', setSplit );
	setSplit();

	// FAQ: one row open at a time.
	var rows = document.querySelectorAll( '.faq-row' );
	rows.forEach( function ( row ) {
		row.querySelector( '.faq-q' ).addEventListener( 'click', function () {
			var opening = ! row.classList.contains( 'open' );
			rows.forEach( function ( r ) {
				var open = opening && r === row;
				r.classList.toggle( 'open', open );
				r.querySelector( '.faq-q' ).setAttribute( 'aria-expanded', open ? 'true' : 'false' );
				r.querySelector( '.faq-ico path' ).setAttribute( 'd', open ? MINUS : PLUS );
				r.querySelector( 'p' ).hidden = ! open;
			} );
		} );
	} );

	// Forms: Netlify Forms on the static copy, simulated elsewhere.
	function send( formName, data ) {
		if ( window.CAVEBACK_FORMS !== 'netlify' ) {
			return Promise.resolve();
		}
		data.append( 'form-name', formName );
		return fetch( '/', { method: 'POST', body: data } ).then( function ( res ) {
			if ( ! res.ok ) {
				throw new Error( 'Form submit failed: ' + res.status );
			}
		} );
	}
	function busy( btn, on ) {
		btn.disabled = on;
		btn.setAttribute( 'aria-busy', on ? 'true' : 'false' );
	}

	// Catalog.
	var catForm = $( 'cat-form' );
	var catErr = $( 'cat-error' );
	catForm.addEventListener( 'submit', function ( e ) {
		e.preventDefault();
		if ( ! catForm.reportValidity() ) {
			return;
		}
		var btn = catForm.querySelector( 'button[type="submit"]' );
		busy( btn, true );
		catErr.hidden = true;
		send( 'catalog', new FormData( catForm ) ).then( function () {
			$( 'cat-form-wrap' ).hidden = true;
			$( 'cat-done' ).hidden = false;
		} ).catch( function () {
			catErr.hidden = false;
		} ).then( function () {
			busy( btn, false );
		} );
	} );

	// Quote: two steps, one submission.
	var form1 = $( 'q-form1' );
	var form2 = $( 'q-form2' );
	var qErr = $( 'q-error' );
	var files = $( 'v2-files' );
	function showStep( n ) {
		$( 'q-s1' ).hidden = n !== 1;
		$( 'q-s2' ).hidden = n !== 2;
		$( 'q-stepnum' ).textContent = String( n );
		var p1 = $( 'q-p1' );
		var p2 = $( 'q-p2' );
		p2.style.color = n === 2 ? '#19252C' : '#6B7366';
		p2.querySelector( 'span' ).style.background = n === 2 ? '#566634' : '#DCDFD8';
		if ( n === 1 ) {
			p1.setAttribute( 'aria-current', 'step' );
			p2.removeAttribute( 'aria-current' );
		} else {
			p2.setAttribute( 'aria-current', 'step' );
			p1.removeAttribute( 'aria-current' );
		}
		var first = ( n === 1 ? form1 : form2 ).querySelector( 'input, select, textarea' );
		if ( first ) {
			first.focus( { preventScroll: true } );
		}
	}
	form1.addEventListener( 'submit', function ( e ) {
		e.preventDefault();
		if ( form1.reportValidity() ) {
			showStep( 2 );
		}
	} );
	$( 'q-back' ).addEventListener( 'click', function () {
		showStep( 1 );
	} );
	form2.addEventListener( 'submit', function ( e ) {
		e.preventDefault();
		if ( ! form2.reportValidity() ) {
			return;
		}
		var data = new FormData( form1 );
		new FormData( form2 ).forEach( function ( value, key ) {
			if ( key !== 'photos' ) {
				data.append( key, value );
			}
		} );
		data.append( 'services', pickedNames().join( ', ' ) );
		Array.prototype.slice.call( files.files, 0, 5 ).forEach( function ( file, i ) {
			data.append( 'photo_' + ( i + 1 ), file );
		} );
		var btn = form2.querySelector( 'button[type="submit"]' );
		busy( btn, true );
		qErr.hidden = true;
		send( 'quote', data ).then( function () {
			$( 'q-steps' ).hidden = true;
			$( 'q-done' ).hidden = false;
			$( 'q-done' ).focus();
		} ).catch( function () {
			qErr.hidden = false;
		} ).then( function () {
			busy( btn, false );
		} );
	} );
	$( 'q-again' ).addEventListener( 'click', function () {
		form1.reset();
		form2.reset();
		$( 'q-done' ).hidden = true;
		$( 'q-steps' ).hidden = false;
		showStep( 1 );
	} );
	files.addEventListener( 'change', function () {
		var label = document.querySelector( 'label[for="v2-files"] strong' );
		if ( label && files.files.length ) {
			label.textContent = files.files.length + ( files.files.length === 1 ? ' photo selected' : ' photos selected' );
		}
	} );
}() );
