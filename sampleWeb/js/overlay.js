$(document).ready(function(){
	//overlay fadein 3 seconds after the page is loaded
	 var t=setTimeout("$('#shadow').fadeIn(600)",3000);
	 t=setTimeout("$('#overlay-msg').fadeIn(600)",3000);

	 //when #shadow is clicked, the overlay disappears
	 $("#shadow").click(function(){
    			$('#shadow').fadeOut(600);
    			$('#overlay-msg').fadeOut(600);
  });

	 //even if #shadow is not clicked, the overlay will eventually disappear at 13 seconds
	 t=setTimeout("$('#shadow').fadeOut(600)",13000);
	 t=setTimeout("$('#overlay-msg').fadeOut(600)",13000);
})
