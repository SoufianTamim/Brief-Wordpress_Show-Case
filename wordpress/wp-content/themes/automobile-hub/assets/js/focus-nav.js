( function( window, document ) {
  function automobile_hub_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const automobile_hub_nav = document.querySelector( '.sidenav' );
      if ( ! automobile_hub_nav || ! automobile_hub_nav.classList.contains( 'open' ) ) {
        return;
      }
      const elements = [...automobile_hub_nav.querySelectorAll( 'input, a, button' )],
        automobile_hub_lastEl = elements[ elements.length - 1 ],
        automobile_hub_firstEl = elements[0],
        automobile_hub_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;
      if ( ! shiftKey && tabKey && automobile_hub_lastEl === automobile_hub_activeEl ) {
        e.preventDefault();
        automobile_hub_firstEl.focus();
      }
      if ( shiftKey && tabKey && automobile_hub_firstEl === automobile_hub_activeEl ) {
        e.preventDefault();
        automobile_hub_lastEl.focus();
      }
    } );
  }
  automobile_hub_keepFocusInMenu();
} )( window, document );