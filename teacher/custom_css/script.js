$(document).ready(function () {

    InitMisc ();
    
    InitCufon ();	

    InitEvents ();

    InitBoxSlide ();

	InitGraphs ();
			
	InitNotifications ();
	
	InitContentBoxes ();
	
	InitTables ();	
	
	InitFancybox ();
	
	InitWYSIWYG ();
        
   	InitQuickEdit ();
    
	InitMenuEffects ();
    
});

/* *********************************************************************
 * Misc
 * *********************************************************************/
function InitMisc () {
     $('.onFocusEmpty').focus(function () {
        $(this).val('');
    });
    
    $('.validate-form').validate({
          errorPlacement: function(error, element) {
            placeholder = $('#error-' + element.attr('rel'));
            if (placeholder.length) {
                    placeholder.html(error);
            }
            else {
                error.insertAfter(element);
            }
        }
    });   
}

/* *********************************************************************
 * Events
 * *********************************************************************/
function InitEvents () {
    $('.datepicker-inline').datepicker({
        firstDay: 1,
        dateFormat: 'dd/mm/yy',
        onSelect: function (dateText, inst) {
            id = $(this).attr('id');
            parts = id.split('-');
            id2 = parts[parts.length -1];
            $('#datepicker-target-id-' + id2).val(dateText);
        }
    });
}

/* *********************************************************************
 * Slide Box
 * *********************************************************************/
function InitBoxSlide () {
    $('.box-slide-head').click(function (event) {

        tgt = $(event.target);
        if (tgt.hasClass('clickable')) {
            return;
        }
        
        body = $(this).next();
        
        if (!body.hasClass('box-slide-body')) {
            body = body.find('.box-slide-body');
        }
        //body = $(this).next('.box-slide-body');

        if (body.is(':visible')) {
            body.hide();
        }
        else {
            body.show();
        }
        
        return false;
    });
}

/* *********************************************************************
 * Cufon
 * *********************************************************************/
function InitCufon () {
 	Cufon.replace('.logo .title', { fontFamily: 'Zurich Cn BT', color: '-linear-gradient(#FFFFFF, #FFFFFF, #c0c0c0, rgb(200, 200, 200))', textShadow: '#FFFFFF 0px 1px'});
	Cufon.replace('.user-detail .name', { fontFamily: 'Zurich Cn BT' });
	Cufon.replace('.visualize-title', { fontFamily: 'Zurich Cn BT' });
	Cufon.replace('table caption', { fontFamily: 'Zurich Cn BT' });

	Cufon.replace('h1', { fontFamily: 'Zurich LtCn BT' });
	Cufon.replace('h2', { fontFamily: 'Zurich Cn BT' });
	Cufon.replace('h3', { fontFamily: 'Zurich LtCn BT' });
	Cufon.replace('h4', { fontFamily: 'Zurich Cn BT' });
	Cufon.replace('h5', { fontFamily: 'Zurich Cn BT' });
	Cufon.replace('h6', { fontFamily: 'Zurich LtCn BT' });
	Cufon.replace('h1 .label', { fontFamily: 'Zurich Cn BT' });
}

/* *********************************************************************
 * Menus
 * *********************************************************************/
function InitMenuEffects () {
    $('.menu li').hover(function () {
        			$(this).find('ul:first').css({'visibility': 'visible', 'display': 'none'}).slideDown();
    }, function () {
        $(this).find('ul:first').css({visibility: "hidden"});

    });
    
    // Look for active element
    indexStart = 1;
    
    $('#iconbar li').each( function(index) { 
            if ($(this).hasClass('active')) 
                indexStart = index;
    });
    
    // Initialize carousel plugin
    $('#iconbar').jcarousel({
        start:          indexStart,
        scroll:         7,
        buttonPrevHTML: '<span>&lt;</span>',
        buttonNextHTML: '<span>&gt;</span>',
        initCallback:   function (instance, state) {}
    });    
    instance = $('#iconbar').data('jcarousel')
    // Roll on active element
    if (indexStart >= 7) {
        if (!$.browser.webkit) {
            list = $('#iconbar .jcarousel-list');  
            number = list.css('left');
            list.css({'left': 0});
            list.delay(500).animate({left: '+=' + number}, 750, function () {});
        }
    }

}

/* *********************************************************************
 * Content Boxes
 * *********************************************************************/
function InitContentBoxes () {
	/* Checkboxes */
	$('.content-box .select-all').click(function () {
		if ($(this).is(':checked'))
			$(this).parent().parent().parent().parent().find(':checkbox').attr('checked', true);
		else
			$(this).parent().parent().parent().parent().find(':checkbox').attr('checked', false); 
	});
	
	/* Tabs */
	$('.content-box .tabs').idTabs();
}

/* *********************************************************************
 * Notifications
 * *********************************************************************/
function InitNotifications () {
	$('.notification .close').click(function () {
		$(this).parent().fadeOut(1000, function() {
			$(this).find('p').fixClearType ();
		});		
		return false;
	});
}

/* *********************************************************************
 * Data Tables
 * *********************************************************************/
function InitTables () {
	$('.datatable').dataTable({
		'bLengthChange': true,
		'bPaginate': true,
		'sPaginationType': 'full_numbers',
		'iDisplayLength': 5,
		'bInfo': false,
		'oLanguage': 
		{
			'sSearch': 'Search all columns:',
			'oPaginate': 
			{
				'sNext': '&gt;',
				'sLast': '&gt;&gt;',
				'sFirst': '&lt;&lt;',
				'sPrevious': '&lt;'
			}
		},		
		'aoColumns': [ 
			{ "bSortable": false },
			null,
			null,
			null,
			null,
			null,
			null
		]	
	});
}

/* *********************************************************************
 * Graphs
 * *********************************************************************/
function InitGraphs () {
	$('.visualize1').visualize({
			'type': 'bar',
			'width': '872px',
			'height': '250px'
	});

	$('.visualize2').visualize({
			'type': 'line',
			'width': '872px',
			'height': '250px'
	});

	$('.visualize3').visualize({
			'type': 'area',
			'width': '872px',
			'height': '250px'
	});
	
	$('.visualize4').visualize({
			'type': 'pie',
			'width': '872px',
			'height': '250px'
	});
	
	$('.visualize-T1').visualize({
			'type': 'bar',
			'width': '872px',
			'height': '250px'
	});
	
	$('.visualize-T2').visualize({
			'type': 'line',
			'width': '872px',
			'height': '250px'
	});
	
	$('.visualize-T3').visualize({
			'type': 'area',
			'width': '872px',
			'height': '250px'
	});
	
	$('.visualize_dashboard').visualize({
			'type': 'bar',
			'width': '240px',
			'height': '100px'
	});
}

/* *********************************************************************
 * Fancybox
 * *********************************************************************/
function InitFancybox () {
	$('.modal-link').fancybox({
		'modal' 				: false,
		'hideOnOverlayClick' 	: 'true',
		'hideOnContentClick' 	: 'true',
		'enableEscapeButton' 	: true,
		'showCloseButton' 		: true		
	});
	
	$("a[href$='gif']").fancybox();
	$("a[href$='jpg']").fancybox();
	$("a[href$='png']").fancybox(); 	
}

/* *********************************************************************
 * WYSIWYG
 * *********************************************************************/
function InitWYSIWYG () {
	$('.jwysiwyg').wysiwyg({
		controls: {
			strikeThrough : { visible : true },
			underline     : { visible : true },

			separator00 : { visible : true },

			justifyLeft   : { visible : true },
			justifyCenter : { visible : true },
			justifyRight  : { visible : true },
			justifyFull   : { visible : true },

			separator01 : { visible : true },

			indent  : { visible : true },
			outdent : { visible : true },

			separator02 : { visible : true },

			subscript   : { visible : true },
			superscript : { visible : true },

			separator03 : { visible : true },

			undo : { visible : true },
			redo : { visible : true },

			separator04 : { visible : true },

			insertOrderedList    : { visible : true },
			insertUnorderedList  : { visible : true },
			insertHorizontalRule : { visible : true },

			separator07 : { visible : true },

			cut   : { visible : true },
			copy  : { visible : true },
			paste : { visible : true }
		}
	});
	
	$('textarea.tinymce').tinymce({
		// Location of TinyMCE script
		script_url : 'js/tiny_mce/tiny_mce.js',
		// General options
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		// theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough",
		//theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		//theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
}

/* *********************************************************************
 * Quick Edit
 * *********************************************************************/
function InitQuickEdit () {
	$.editable.addInputType('datepicker', {
                element : function(settings, original) {
                    var input = $('<input>');
                    if (settings.width  != 'none') { input.width(settings.width);  }
                    if (settings.height != 'none') { input.height(settings.height); }
                    input.attr('autocomplete','off');
                    $(this).append(input);
                    return(input);
                },
                plugin : function(settings, original) {
                    var form = this;
                    settings.onblur = 'ignore';
                    $(this).find('input').datepicker({
                        firstDay: 1,
                        dateFormat: 'dd/mm/yy',
                        closeText: 'X',
                        onSelect: function(dateText) { 
                                $(this).hide(); 
                                $(form).trigger('submit'); 
                        },
                        onClose: function(dateText) {
                                original.reset.apply(form, [settings, original]);
                                $(original).addClass(settings.cssdecoration);
                                $(this).hide(); 
                                $(form).trigger('submit'); 
                        }
                    });
                }
        });


		
        $('.quick_edit').click(function () {
                $(this).parent().parent().find('td.edit-field').click();
                return false;
        });
        
        $('.edit-textfield').editable('http://www.google.com', {
                'type': 'text'
        });

        $('.edit-date').editable('date.php', {
             'type' : 'datepicker'
        });
       
        $('.edit-textarea').editable('http://www.google.com', {
                'type': 'textarea'
        });
        
        $('.edit-select').editable('http://www.google.com', {
                'data': "{'true': 'Active', 'false': 'Inactive'}",
                'type': 'select'
        });        
}

jQuery.fn.fixClearType = function(){
    return this.each(function(){
        if( !!(typeof this.style.filter  && this.style.removeAttribute))
            this.style.removeAttribute("filter");
    })

} 
