<!-- SCRIPTS -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>

<script>

  $(document).ready(function(){

  	
  	$("p").hide();
	

	$("button.hide").click(function(){
    	$("p").hide(1000);
  	});
  	

  	$("button.show").click(function(){
    	$("p").toggle(1000);
  	});

  	$("button.reset").click(function(){
  		$("p2").hide(500);
  	})

  	$("input.lanceur").click(function(){
  		$("p2").show(50000);
  	})



  	$("p3").hide();
  	

  	$("input.show").click(function(){
    	$("p3").toggle();
  	});

  	function confirmSubmit()
	{
	var ok=confirm("vous etes sur ?");
	if (ok){
	       location.href = 'supprimer.php'; 	
	}
		return ok ;
	 
	}

  	

  });
 </script>