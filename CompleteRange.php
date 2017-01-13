<?php 

class CompleteRange{

	public function __construct(){

	}

	public function build($elementos){

		$total = count($elementos);
		
		$result = 'Rango ingresado: <br />';
		foreach ($elementos as $key => $value) {
			$result .= '<span>'.$value.'</span>&nbsp;&nbsp;';	
		}

		for ($i=0; $i < $total; $i++) { 
			//if($i > 0 && $i < $total-1){
			if($i < $total-1){
				$dif = $elementos[$i+1] - $elementos[$i];
				if($dif > 1){
					for($j = 0; $j < $dif; $j++){
						if($elementos[$i]+$j != $elementos[$i])
							array_push($elementos, $elementos[$i]+$j);	
					}	
				}
				
			}
		}

		sort($elementos);

		$result .= '<br /><br />Rango obtenido: <br /> ';
		foreach ($elementos as $clave => $valor) {
			$result .= '<span>'.$valor.'</span>&nbsp;&nbsp;';
		}

		return $result;

	}

}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Complete Range</title>
	</head>
	<body>
		<form method="post" action="CompleteRange.php">
			<label>Ingrese el rango de numero separados por comas</label><br />
			<input type="text" size="70" name="rango"><br />
			<input type="submit" name="enviar" value="Enviar número">
			<input type="hidden" name="sw" value="1">
		</form>

		<?php
			$msje = '';

			if(isset($_POST['sw']) == 1){

				$complete = new CompleteRange();	
				$rango = trim($_POST['rango']);
				$elementos = explode(',', $rango);
				
				if($rango != ''){
					for($i = 0; $i < count($elementos); $i++){ 
						if($elementos[$i] != ''){
							if(is_numeric(trim($elementos[$i]))){
								if((integer)$elementos[$i] >= 0){
									//$sw = 1;
									if($i > 0 && $i < count($elementos)-1){
										if($elementos[$i+1] - $elementos[$i] > 0){
											$sw = 1;
										}else{
											echo 'Rango no valido. El rango deberia ser ascendente.';
											break;
										}
									}
								}else{
									echo 'Rango no valido';
									break;	
								}
							}else{
								echo 'Rango no valido';
								break;
							}
						}else{
							echo 'Rango no valido';
							break;
						}
					}
				}else{
					echo 'Ingrese un rango de numeros enteros positivos';
				}
			}else{
				echo '';
			}

			if(isset($sw) == 1){
				$result = $complete->build($elementos);
				echo $result;
			}


		?>

	</body>
</html>