<?php
require_once "QuadraticEquation.class.php";
?>
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


<?php
if(isset($_POST['a'])){
$a=$_POST['a'];//or =1
$b=$_POST['b'];//or =3
$c=$_POST['c'];//or =2
$dec=$_POST['dec'];//or =4
}else{
$a=1; $b=2; $c=1;
}
$e=new equation2($a,$b,$c,$dec);
echo "a = ".$e->p['a'].";&nbsp;&nbsp;&nbsp;&nbsp; b = ".$e->p['b'];
echo ";&nbsp;&nbsp;&nbsp;&nbsp; c = ".$e->p['c'].".<br/><hr/>";
$e->roots();
 switch($e->checkD()){
    case 1: {echo "The roots are real:<br/>";
	   $e->printReal();}
        break;
    case 0:{echo "The roots are degenerate:<br/>";
	       $e->printReal();}
	     break;
    case -1:{echo "The roots are complex:<br/>";
	  $e->printComplex();
	}
        break;
	default:
		break;
}

?>
</td></tr></table>
</body>
</html>

