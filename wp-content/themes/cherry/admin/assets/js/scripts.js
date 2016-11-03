jQuery(document).ready(function() {
	
jQuery(".box_tabs_container").hide();
jQuery(".bd_panel_tabs ul li:first").addClass("active").show();
jQuery(".box_tabs_container:first").show(); 
jQuery(".bd_panel_tabs ul li").click(function() {
	jQuery(".bd_panel_tabs ul li").removeClass("active");
	jQuery(this).addClass("active");
	jQuery(".box_tabs_container").hide();
	var activeTab = jQuery(this).find("a").attr("href");
	jQuery(activeTab).fadeIn();
	return false;
});
// End tabs

jQuery('.bd_option_item a , .titlebuilder a, .navbuilder a').tipsy({
fade: true, 
gravity: 's'
});
//tooltip
jQuery('.bd_panel input:checkbox:not([safari]), .bd_items_panel input:checkbox:not([safari]), .check_radio_content input:radio:not([safari])  , .rwmb-input input:checkbox:not([safari])').checkbox();
jQuery('.bd_panel input[safari]:checkbox, .bd_items_panel input[safari]:checkbox, .check_radio_content input[safari]:radio  , .rwmb-input input[safari]:checkbox').checkbox({cls:'jquery-safari-checkbox'});
jQuery('.bd_panel :checkbox, .bd_items_panel :checkbox, .check_radio_content :radio  , .rwmb-input :checkbox').checkbox();
//checkbox





});



// All custom JS not relating to theme options goes here

jQuery(document).ready(function($) {

/*----------------------------------------------------------------------------------*/
/*	Display post format meta boxes as needed
/*----------------------------------------------------------------------------------*/

    /* Grab our vars ---------------------------------------------------------------*/
	var audioOptions = $('#bd-metabox-post-audio'),
    	audioTrigger = $('#post-format-audio'),
    	videoOptions = $('#bd-metabox-post-video'),
    	videoTrigger = $('#post-format-video'),
    	galleryOptions = $('#bd-metabox-post-image'),
    	galleryTrigger = $('#post-format-gallery'),
    	linkOptions = $('#bd-metabox-post-link'),
    	linkTrigger = $('#post-format-link'),
    	quoteOptions = $('#bd-metabox-post-quote'),
    	quoteTrigger = $('#post-format-quote'),
    	group = $('#post-formats-select input');

    /* Hide and show sections as needed --------------------------------------------*/
    bdHideAll(null);	

	group.change( function() {
	    $that = $(this);
	    
        bdHideAll(null);

        if( $that.val() == 'audio' ) {
			audioOptions.css('display', 'block');
		} else if( $that.val() == 'video' ) {
			videoOptions.css('display', 'block');
		} else if( $that.val() == 'gallery' ) {
		    galleryOptions.css('display', 'block');
		} else if( $that.val() == 'link' ) {
		    linkOptions.css('display', 'block');
		} else if( $that.val() == 'quote' ) {
		    quoteOptions.css('display', 'block');
		}

	});

	if(audioTrigger.is(':checked'))
		audioOptions.css('display', 'block');

	if(videoTrigger.is(':checked'))
		videoOptions.css('display', 'block');

    if(galleryTrigger.is(':checked'))
        galleryOptions.css('display', 'block');

    if(linkTrigger.is(':checked'))
        linkOptions.css('display', 'block');

    if(quoteTrigger.is(':checked'))
        quoteOptions.css('display', 'block');

    function bdHideAll(notThisOne) {
		videoOptions.css('display', 'none');
		audioOptions.css('display', 'none');
		galleryOptions.css('display', 'none');
		linkOptions.css('display', 'none');
		quoteOptions.css('display', 'none');
    }
    
    
});