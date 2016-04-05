<?php
class Solver {
   public $p=array();
   public $x=array();
   public $dec;
    
   public function __construct($a,$b,$c,$dec) {
	
             if($dec==""){$dec="2";}
             if(isset($a) && $a!=""){
                $this->p['a']=(float)$a;
                $this->p['b']=(float)$b;
                $this->p['c']=(float)$c;
                $this->dec=(int)$dec;
                }
             }//construct
  private  function D(){
            if($this->p['a']!=0){
               $delta=pow($this->p['b'],2)-4*$this->p['a']*$this->p['c'];
            return $delta;
            }else{$this->root();}
		         }//D
   public function checkD(){
             if($this->D()>0){     return 1;}
             elseif($this->D()==0){return 0;}
             elseif($this->D()<0) { return -1;}
                      }//checkD
  private function root(){ 
	         if($this->p['b']!=0){ 
			 exit;}
	         elseif($this->p['c']!=0){ exit('The equation does not have a solution.');}
	         else{ exit('The equation has infinity number of solutions. All numbers are the roots.');}
	        }				  
         
   public function roots(){
            switch ($this->checkD()) {
            case 1: {$this->x[0]=(-$this->p['b']-sqrt($this->D()))/(2*$this->p['a']);
                $this->x[1]=(-$this->p['b']+sqrt($this->D()))/(2*$this->p['a']);
                    return $this->x;
            }
                        break;
            case 0:{$this->x[0]=$this->x[1]=-$this->p['b']/(2*$this->p['a']);
                    return $this->x;
            }
                        break;
            case -1:{
			         $this->x[0]=-$this->p['b']/(2*$this->p['a']);
                     $this->x[1]=sqrt(-$this->D())/(2*$this->p['a']);
                    return $this->x;
            }
                        break;
            default:
                        break;
            }//switch    
    
            }//roots
   
  public function printReal(){
 
           return $this->x;
            }//printReal
   
  public function printComplex(){
           if($this->x[1]>0){
          
            return $this->x;
		   }
   
          }//printComplex
       }//equation2


if(isset($_GET['a'])){
$a=$_GET['a'];//or =1
$b=$_GET['b'];//or =3
$c=$_GET['c'];//or =2
$dec=$_GET['dec'];//or =4
}else{
$a=1; $b=2; $c=1;
}
$e=new Solver($a,$b,$c,$dec);
$e->p['a'];
$e->p['b'];
$e->p['c'];
$response = [];
$e->roots();
$response['type'] = $e->checkD();
 switch($response['type']){
    case 1: {
	   $response['answer'] = $e->printReal();
	  }
        break;
    case 0:{
	     $response['answer'] =  $e->printReal();}
	     break;
    case -1:{
	 $response['answer'] =  $e->printComplex();
	}
        break;
	default:
		break;
}

$response['ip'] = $_SERVER['SERVER_ADDR'];
header('Content-Type: application/json');

print_r(json_encode($response))
?>
