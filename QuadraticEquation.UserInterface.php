
<html>
<head>
<title>Quadratic Equation Solver</title>

</head>
<body style="background:#2F4F2F;">
<table border="1" align="center" style="width:800px;margin-top:60px;font-size:1.4em">
<tr><td style="background:#CFD784;text-align:center;height:50px;">
<h2>Equation Solver for  ax<sup>2</sup>+bx+c = 0</h2>
</td></tr><tr>
<td valign="top" style="background:#E0EEE0;padding-left:20px;padding-top:10px;height:300px;">
<form method="POST" action="">
a = <input type="text" name="a" value="1" maxlength="10" size="10">
 &nbsp;&nbsp;&nbsp; b= <input type="text" name="b" value="2"  maxlength="10" size="10">
&nbsp;&nbsp;&nbsp; c = <input type="text" name="c" value="1" maxlength="10" size="10">
&nbsp;Significant Figures = <input type="text" name="dec" value="2" maxlength="6" size="6">
<input type="hidden" name="seen" value="t">
<input type="submit" value="Solve">
</form><br/>
<div id='roots' style="display:none">
<h4>Roots</h4>
<div id="answer"></div>
</div>


</td></tr></table>
</body>
<script src='jquery.js'> </script>
<script>

	var form = $('form');
	form.on('submit', function(e){
		e.preventDefault();
		var data = form.serialize();

		$.ajax({
		  url: 'QuadraticEquation.class.php',
		  data: data,
		  success: function(response){
			response= JSON.parse(response);
			var div = $('#roots');
			div.show()

			$(div.find('#answer')).html('('+response.answer[0]+', '+response.answer[1]+')')

			}
		});

	})

</script>
</html>


