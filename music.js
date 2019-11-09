$(document).ready(function(e) {
   $(".music").dblclick(function () {
      $(this).children(".box").toggle("slow");
	  /*var k =  $(this).index();
	  var y =$(this).offset().top;
		console.log(y);
	 $('.contenCheck').eq(k).children('.boxy').toggle("slow");*/
    });
	$('.over').click(function(){
		$(this).parent().children('.gchange').slideDown('slow');
		$(this).parent().children('a').slideUp('slow');
		$(this).slideUp('slow');
	});
	$('.category1').mouseleave(function(){
		$(this).children('.gchange').slideUp('slow');
		$(this).children('a').slideDown('slow');
		$(this).children('.over').slideDown('slow');
	});
	$('#cat').click(function(){
		$('.fantom').toggle('slow');
	});
	$('#auto').click(function(){
		$('#circle').show('slow');
	});
	$( "#genres_id" ).change(function() {
		//alert($(this).val());
		$.ajax({
		  type: "POST",
		  url: "ajax.php",
		  data: { genres_id:$(this).val() }
		}).done(function( msg ) {
		if($("#singer_id").val()==0)
		   $("#singer_id").html(msg);
		});
	});
	$( "#singer_id" ).change(function() {
		//alert($(this).val());
		$.ajax({
		  type: "POST",
		  url: "ajax.php",
		  data: { singer_id:$(this).val() }
		}).done(function( msg ) {
			if($("#genres_id").val()==0)
		  $("#genres_id").html(msg);
		});
	});
	$( "#reset_search" ).click(function() {
		//alert($(this).val());
		$.ajax({
		  type: "POST",
		  url: "ajax.php",
		  data: { reset_g:1 }
		}).done(function( msg ) {
		  $("#genres_id").html(msg);
		});
		$.ajax({
		  type: "POST",
		  url: "ajax.php",
		  data: { reset_s:1 }
		}).done(function( msg ) {
		  $("#singer_id").html(msg);
		});
	});
	
});

