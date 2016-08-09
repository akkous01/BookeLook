$(function () {
    var $ithika = $('#ithika');
    var $ithika_new = $('#ithika_new');

    var $sindesi = $('#sindesi');
    var $sindesi_new = $('#sindesi_new');

    var $epipleon = $('#epipleon');
    var $epipleon_new = $('#epipleon_new');

    var $analisi = $('#analisi');
    var $analisi_new = $('#analisi_new');

    var $gramatiki = $('#gramatiki');
    var $gramatiki_new = $('#gramatiki_new');

   loop_interval = setInterval(function () {
        $ithika.fadeIn(0).delay(2000).fadeOut(0).delay(2000).fadeIn(0);
        $ithika_new.fadeOut(0).delay(2000).fadeIn(0).delay(2000).fadeOut(0);

        $sindesi.fadeIn(0).delay(10000).fadeOut(0).delay(2000).fadeIn(0);
        $sindesi_new.fadeOut(0).delay(10000).fadeIn(0).delay(2000).fadeOut(0);

        $epipleon.fadeIn(0).delay(6000).fadeOut(0).delay(2000).fadeIn(0);
        $epipleon_new.fadeOut(0).delay(6000).fadeIn(0).delay(2000).fadeOut(0);

        $analisi.fadeIn(0).delay(8000).fadeOut(0).delay(2000).fadeIn(0);
        $analisi_new.fadeOut(0).delay(8000).fadeIn(0).delay(2000).fadeOut(0);

        $gramatiki.fadeIn(0).delay(4000).fadeOut(0).delay(2000).fadeIn(0);
        $gramatiki_new.fadeOut(0).delay(4000).fadeIn(0).delay(2000).fadeOut(0);

    }, 12000);
});

$(document).ready(
	
	function(){


	    $("#ithika").hover(
	    	function(){
	    		// clearInterval(loop_interval);
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
	    		// clearInterval(loop_interval);
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
	    		// clearInterval(loop_interval);
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
	    		// clearInterval(loop_interval);
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
	    		clearInterval(loop_interval);

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
	    		clearInterval(loop_interval);

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
	    		clearInterval(loop_interval);
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
	    		clearInterval(loop_interval);
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
	    		clearInterval(loop_interval);
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