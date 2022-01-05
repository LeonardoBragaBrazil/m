<?php

	if (isset($_GET["s"]))
	{
		$s = $_GET["s"];

		function gameOfThrones($s) 
		{
			if(preg_match("/^[a-z]+$/", $s) == false) //* $ contem apenas letras minúsculas no intervalo ascii[a...z]
				return false;
			
			if (1 <= strlen($s) and strlen($s) <= 100) 
			{
				$aTemp = array();
				$x = 0;
				while ($x < strlen($s)) 
				{
					$char = substr($s,$x,1);
					$qtd = 0;
					if (isset($aTemp[$char])) 
					{
						$qtd = $aTemp[$char];
						unset($aTemp[$char]);
					}
					$qtd++;
					$aTemp[$char] = $qtd;
					$x++;
				}
				$semPar = 0;
				foreach ($aTemp as $qtd) 
				{
					if (($qtd % 2) > 0) 
						$semPar++;
				}
				if ($semPar <= 1)
					return true;
			} 
			else 
				return false;
		}
		
		if (gameOfThrones($s))
			echo "true";
		else 
			echo "false";
	}
?>

<html>
	<head>
	</head>
	<body>
		<form method='get'>
			<input type="text" name='s' required />
			<button type='submit'>OK</button>
		</form>
	</body>	
</form>