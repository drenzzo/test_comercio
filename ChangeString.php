<?php 
class ChangeString{

	//var $str;
	public $min;
	public $may; 
	
	public function __construct(){
		$this->min = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'ñ', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');;
		$this->may = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'Ñ', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
	}

	public function build($str){

		$str = trim($str);

		$arr_str = array();
		$arr_str = str_split($str);

		for($i = 0; $i < count($arr_str); $i++){
			if(ctype_alpha($arr_str[$i])){ //Si es caracter alfabetico
				if(ctype_lower($arr_str[$i])){ //si es minuscula
					//encontrar la posicion del elemento en $min
					$pos = array_search($arr_str[$i], $this->min);
					
					//reemplazo el caracter
					$arr_str[$i] = $this->min[$pos+1];
				}elseif(ctype_upper($arr_str[$i])){
					//encontrar la posicion del elemento en $may
					$pos = array_search($arr_str[$i], $this->may);

					//reemplazo el caracter
					$arr_str[$i] = $this->may[$pos+1];
				}
			}
		}

		$result = implode('', $arr_str);
		return $result;
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>ChangeString</title>
	</head>
	<body>
		<form method="post" action="ChangeString.php">
			<label>Ingrese cadena</label><br />
			<input type="text" name="str" /><br />
			<input type="submit" name="enviar" value="Cambiar cadena">
		</form>
		<?php
			if($_POST){
				if($_POST['str'] != ''){
					$change = new ChangeString();
					$str = $_POST['str'];
					echo $change->build($str);	
				}
				else
					echo 'Por favor ingrese información';
			} 
		?>
		
	</body>
</html>
