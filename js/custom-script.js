
// EASE FUNCTIONALITY
	
        // $(function() {
        //   $('a[href*=#]:not([href=#]):not([href=#site-nav])').click(function() {
        //     if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
        //       var target = $(this.hash);
        //       target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        //       if (target.length) {
        //         $('html,body').animate({
        //           scrollTop: '0px'
        //         }, 500, 'easeOutExpo');
        //         return false;
        //       }
        //     }
        //   });
        // });



// PROJECTS LISTS FADE IN

            $(function(){
                $(".sample-projects").fadeTo(0,0);//FIRST REMOVE THE TEXT VISIBILITY
            
                    setTimeout(function() {
                        $(".sample-projects").fadeTo(150, 1);
                    }, 200);//END TIMEOUT 1
            });

// CONTACT FORM CONTENT FADE IN

            $(function(){
                $("#contact-text h1").fadeTo(0,0);//FIRST REMOVE THE TEXT VISIBILITY
            
                   setTimeout(function() {

                        $("#contact-text h1").fadeTo(1000, 1);
                    }, 300);//END TIMEOUT 1
            });
        
           $(function(){
                $("#contact-desc").fadeTo(0,0);//FIRST REMOVE THE TEXT VISIBILITY
           
                   setTimeout(function() {
                        $("#contact-desc").fadeTo(1000, 1);
                   }, 400);//END TIMEOUT 1
           });

            $(function(){
                $("#contact-main").fadeTo(0,0);//FIRST REMOVE THE TEXT VISIBILITY
            
                    setTimeout(function() {
                        $("#contact-main").fadeTo(1000, 1);
                    }, 500);//END TIMEOUT 1
            });
        

// SCROLL TO TOP
                
        $("#goUp").css( 'bottom', -200 );
		
		$(window).on("scroll", function(){
			// console.log( $(window).scrollTop() );
			
			if( $(window).scrollTop() > 10 ){
				if( $("#goUp").css( 'bottom' ) >= 50 ){
					// do nothng
				} else {
					$("#goUp").animate({
						 bottom : 50
						},{
							"queue": false,
							"duration" : 600
					});
				}
				
			} else {
				$("#goUp").animate({
						bottom : -200
						},{
							"queue": false,
							"duration" : 600 });
			}
		});
            