$(function () {
	    var $sel = $('#ithika');
	    var $tab = $('#ithika_new');
	    function fadeInOut () {
	    	$tab.hide( function () {
	            $tab.show(function () {
	                $tab.hide( function () {
	                    setTimeout(fadeInOut, 500);
	                });
	            });
	        });
	        $sel.show( function () {
	            $sel.hide( function () {
	                $sel.show( function () {
	                    setTimeout(fadeInOut, 500);
	                });
	            });
	        });
	        
	    }

	    fadeInOut();
	});

$(document).ready(
	
	function(){


	    $("#ithika").hover(
	    	function(){
	        	$("#ithika").hide();
	        	$("#sindesi").show();
	        	$("#epipleon").show();
	        	$("#analisi").show();
	        	$("#gramatiki").show();

	        	$("#ithika_new").show();
	        	$("#sindesi_new").hide();
	        	$("#epipleon_new").hide();
	        	$("#analisi_new").hide();
	        	$("#gramatiki_new").hide();
	    	}
	    );

	     $("#sindesi").hover(
	    	function(){
	        	$("#ithika").show();
	        	$("#sindesi").hide();
	        	$("#epipleon").show();
	        	$("#analisi").show();
	        	$("#gramatiki").show();
	        	
	        	$("#ithika_new").hide();
	        	$("#sindesi_new").show();
	        	$("#epipleon_new").hide();
	        	$("#analisi_new").hide();
	        	$("#gramatiki_new").hide();
	    	}
	    );

	     $("#epipleon").hover(
	    	function(){
	    		$("#ithika").show();
	        	$("#sindesi").show();
	        	$("#epipleon").hide();
	        	$("#analisi").show();
	        	$("#gramatiki").show();
	        	
	        	$("#ithika_new").hide();
	        	$("#sindesi_new").hide();
	        	$("#epipleon_new").show();
	        	$("#analisi_new").hide();
	        	$("#gramatiki_new").hide();
	        	
	    	}
	    );

	     $("#analisi").hover(
	    	function(){
	    		$("#ithika").show();
	        	$("#sindesi").show();
	        	$("#epipleon").show();
	        	$("#analisi").hide();
	        	$("#gramatiki").show();
	        	
	        	$("#ithika_new").hide();
	        	$("#sindesi_new").hide();
	        	$("#epipleon_new").hide();
	        	$("#analisi_new").show();
	        	$("#gramatiki_new").hide();
	        	
	    	}
	    );

	    $("#gramatiki").hover(
	    	function(){
	    		$("#ithika").show();
	        	$("#sindesi").show();
	        	$("#epipleon").show();
	        	$("#analisi").show();
	        	$("#gramatiki").hide();
	        	
	        	$("#ithika_new").hide();
	        	$("#sindesi_new").hide();
	        	$("#epipleon_new").hide();
	        	$("#analisi_new").hide();
	        	$("#gramatiki_new").show();
	        	
	    	}
	    );


	    $("#ithika_new").hover(
	    	function(){
	    		$(".book_img").css("background", "url(assets/images/book.png) no-repeat center");
	    		$(".book_img").css("background-size", "100% 100%");
	    		$("#first_table").hide();
        	   	$("#ithika_table").show();
	        	$("#sindesi_table").hide();
	        	$("#epipleon_table").hide();
	        	$("#analisi_table").hide();
	        	$("#gramatiki_table").hide();
	        	
	    	}
	    );


	   	$("#sindesi_new").hover(
	    	function(){
	    		$(".book_img").css("background", "url(assets/images/book.png) no-repeat center");
	    		$(".book_img").css("background-size", "100% 100%");
	    		$("#first_table").hide();
        	   	$("#ithika_table").hide();
	        	$("#sindesi_table").show();
	        	$("#epipleon_table").hide();
	        	$("#analisi_table").hide();
	        	$("#gramatiki_table").hide();
	        	
	    	}
	    );


	    $("#epipleon_new").hover(
	    	function(){
	    		$(".book_img").css("background", "url(assets/images/book.png) no-repeat center");
	    		$(".book_img").css("background-size", "100% 100%");
	    		$("#first_table").hide();
        	   	$("#ithika_table").hide();
	        	$("#sindesi_table").hide();
	        	$("#epipleon_table").show();
	        	$("#analisi_table").hide();
	        	$("#gramatiki_table").hide();
	        	
	    	}
	    );


	    $("#analisi_new").hover(
	    	function(){
	    		$(".book_img").css("background", "url(assets/images/book.png) no-repeat center");
	    		$(".book_img").css("background-size", "100% 100%");
	    		$("#first_table").hide();
        	   	$("#ithika_table").hide();
	        	$("#sindesi_table").hide();
	        	$("#epipleon_table").hide();
	        	$("#analisi_table").show();
	        	$("#gramatiki_table").hide();
	        	
	    	}
	    );

	    $("#gramatiki_new").hover(
	    	function(){
	    		$(".book_img").css("background", "url(assets/images/book.png) no-repeat center");
	    		$(".book_img").css("background-size", "100% 100%");
	    		$("#first_table").hide();
        	   	$("#ithika_table").hide();
	        	$("#sindesi_table").hide();
	        	$("#epipleon_table").hide();
	        	$("#analisi_table").hide();
	        	$("#gramatiki_table").show();
	        	
	    	}
	    );

	    var top = $('header').offset().top - parseFloat($('header').css('marginTop').replace(/auto/, 0));
    	$(window).scroll(function (event) {
	        var y = $(this).scrollTop();
	        //if y > top, it means that if we scroll down any more, parts of our element will be outside the viewport
	        //so we move the element down so that it remains in view.
	        if (y >= top) {
	           var difference = y - top;
	           $('header').css("top",difference);
	       }
   		});


   		 $("#ithiki_tab").click(
	    	function(){
	    		$("#ithiki_box").show();
	        	$("#sindesi_box").hide();
	        	$("#epipleon_box").hide();
	        	$("#gramatiki_box").hide();
	        	$("#analisi_box").hide();
	        	$("#drastiriotites_box").hide();
	        	
	   
	        	
	    	}
	    );

   		  $("#sindesi_tab").click(
	    	function(){
	    		$("#ithiki_box").hide();
	        	$("#sindesi_box").show();
	        	$("#epipleon_box").hide();
	        	$("#gramatiki_box").hide();
	        	$("#analisi_box").hide();
	        	$("#drastiriotites_box").hide();
	  	    	}
	    );

   		 $("#epipleon_tab").click(
	    	function(){
	    		$("#ithiki_box").hide();
	        	$("#sindesi_box").hide();
	        	$("#epipleon_box").show();
	        	$("#gramatiki_box").hide();
	        	$("#analisi_box").hide();
	   			$("#drastiriotites_box").hide();
	        	
	    	}
	    );

   		 $("#gramatiki_tab").click(
	    	function(){
	    		$("#ithiki_box").hide();
	        	$("#sindesi_box").hide();
	        	$("#epipleon_box").hide();
	        	$("#gramatiki_box").show();
	        	$("#analisi_box").hide();
	   			$("#drastiriotites_box").hide();
	        	
	    	}
	    );

   		 $("#analisi_tab").click(
	    	function(){
	    		$("#ithiki_box").hide();
	        	$("#sindesi_box").hide();
	        	$("#epipleon_box").hide();
	        	$("#gramatiki_box").hide();
	        	$("#analisi_box").show();
	   			$("#drastiriotites_box").hide();
	        	
	    	}
	    );

 		 $("#drastiriotites_tab").click(
	    	function(){
	    		$("#ithiki_box").hide();
	        	$("#sindesi_box").hide();
	        	$("#epipleon_box").hide();
	        	$("#gramatiki_box").hide();
	        	$("#analisi_box").hide();
	   			$("#drastiriotites_box").show();
	        	
	    	}
	    ); 



	}

	
	
);