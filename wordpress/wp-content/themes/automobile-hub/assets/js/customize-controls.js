( function( api ) {

	// Extends our custom "automobile-hub" section.
	api.sectionConstructor['automobile-hub'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );