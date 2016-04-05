
<html>
<head>
<title>Quadratic Equation Solver</title>
<style type="text/css">
.form-style-4{
    width: 450px;
    font-size: 16px;
    background: #495C70;
    padding: 30px 30px 15px 30px;
    border: 5px solid #53687E;
}
.form-style-4 input[type=submit],
.form-style-4 input[type=button],
.form-style-4 input[type=text],
.form-style-4 input[type=email],
.form-style-4 textarea,
.form-style-4 label
{
    font-family: Georgia, "Times New Roman", Times, serif;
    font-size: 16px;
    color: #fff;

}
.form-style-4 label {
    display:block;
    margin-bottom: 10px;
}
.form-style-4 label > span{
    display: inline-block;
    float: left;
    width: 150px;
}
.form-style-4 input[type=text],
.form-style-4 input[type=email] 
{
    background: transparent;
    border: none;
    border-bottom: 1px dashed #83A4C5;
    width: 275px;
    outline: none;
    padding: 0px 0px 0px 0px;
    font-style: italic;
}
.form-style-4 textarea{
    font-style: italic;
    padding: 0px 0px 0px 0px;
    background: transparent;
    outline: none;
    border: none;
    border-bottom: 1px dashed #83A4C5;
    width: 275px;
    overflow: hidden;
    resize:none;
    height:20px;
}

.form-style-4 textarea:focus, 
.form-style-4 input[type=text]:focus,
.form-style-4 input[type=email]:focus,
.form-style-4 input[type=email] :focus
{
    border-bottom: 1px dashed #D9FFA9;
}

.form-style-4 input[type=submit],
.form-style-4 input[type=button]{
    background: #576E86;
    border: none;
    padding: 8px 10px 8px 10px;
    border-radius: 5px;
    color: #A8BACE;
}
.form-style-4 input[type=submit]:hover,
.form-style-4 input[type=button]:hover{
background: #394D61;
}
</style>

</head>
<body style="background:#F2F5F6;" >

<h1>Quadratic Equation solver</h1>

<h2>ax<sup>2</sup>+bx+c</h2>

<form class="form-style-4" action="solver.php" >


<label for="a">
<span>Enter a</span><input type="text" value=0 name="a" required="true" />
</label>
<label for="b">
<span>Enter b</span><input type="text" value=0 name="b" required="true" />
</label>
<label for="c">
<span>Enter c</span><input type="text" value=0 name="c" required="true" />
</label>
<label>
<span>&nbsp;</span><input type="submit" value="Solve!" />
</label>
</form>


<div id='roots' style="display:none">
<h4>Roots</h4>
<div id="answer"></div>
<h4>Server IP</h4>
<div id="ip"></div>
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
		  url: 'solver.php',
		  data: data,
		  success: function(response){
			var div = $('#roots');
			div.show()

			$(div.find('#answer')).html('('+response.answer[0]+', '+response.answer[1]+')')
			$(div.find('#ip')).html(response.ip)

			}
		});

	})

</script>
</html>

