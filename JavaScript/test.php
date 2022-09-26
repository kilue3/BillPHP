<html>
<head>
<meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1"> 
	<!----------------------------------- BootStrap CSS ----------------------------------->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!---------------------------------- BootStrap JAVA ----------------------------------->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!--------------------------------- End Of BootStrap ---------------------------------->
<title>Untitled Document</title>
	<script src="JavaScript/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
	<div class="container">
		<h1>Content jQuery</h1>
		<p class="txt1">HI</p>
		<p class="txt2">HI</p>
		<p class="txt3">HI</p>
		<button class="btn btn-danger">Show/Hide</button>
		<div style="background:#98bf21;height:100px;width:100px;position:absolute;" id="test1"></div>

		<script>
			$(document).ready(function(){
					alert("Hi");

				$("h1").css("color","blue");
				$("p.txt1").css("color","red");
				$("p.txt2").css("color","yellow");
				$("p.txt3").css("color","green");
				
			});
			
			$(document).ready(function(){
			  $("button").click(function(){
				$("#test1").animate({
				  height: 'toggle'
				});
			  });
			});
			
			
		</script>
	</div>
</body>
</html>
