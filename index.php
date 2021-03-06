<?php 

	$blue = ['dociekliwy', 'przezorny', 'systematyczny', 'dokładny', 'logiczny', 'konwencjonalny', 'zdystansowany', 'obiektywny', 'perfekcjonista', 'metodyczny', 'sprawdzający', 'przestrzega zasad', 'zorganizowany', 'analityczny', 'krytyczny', 'niezdecydowany', 'wąskie horyzonty umysłowe', 'wybredny', 'moralizator', 'sumienny', 'dużo myślący', 'poważny/uparty', 'wymagający', 'uporządkowany'];
	
	$intBlue = count($blue);
	
	$red = ['pełen zapału', 'ambitny', 'obdarzony silną wolą', 'zdecydowany', 'nastawiony na rozwiązywanie problemów', 'pełen energii', 'lubi rywalizację', 'pełen życia', 'ciekawy', 'bezpośredni', 'prostolinijny', 'wykazuje inicjatywę', 'decyzyjny', 'niecierpliwy', 'stanowczy', 'dominujący', 'natarczywy', 'silny', 'twardy', 'niezależny', 'skuteczny'];
	
	$intRed = count($red);
	
	$green = ['cierpliwy', 'godny zaufania', 'uważny', 'opanowany', 'miły', 'umie słuchać', 'przyjazny', 'ostrożny', 'wspierający', 'pełen inicjatywy', 'pomocny', 'lojalny', 'rozważny', 'stabilny', 'uparty', 'niepewny', 'spełniający wymagania', 'niesamodzielny', 'dziwny', 'godny szacunku', 'uczynny'];
	
	$intGreen = count($green);
	
	$yellow = ['towarzyski', 'przekonujący', 'dobry mówca', 'otwarty', 'pozytywnie nastawiony', 'empatyczny', 'optymistyczny', 'twórczy', 'spontaniczny', 'wrażliwy', 'potrzebuje uwagi', 'inspirujący', 'manipulat', 'porywczy', 'nieproduktywy', 'egoistyczny', 'poruszający'];
	
	$intYellow = count($yellow);
	
	$all = array_merge($blue, $red, $green, $yellow);
	shuffle($all);
	$multiArr = array_chunk($all, count($all));
	$checked = [];
	if($_POST) {
		//echo '<pre>';var_dump($_POST);die;
		foreach($_POST as $cecha => $on) {
			$cecha = str_replace('_', ' ', $cecha);
			$checked[] = $cecha;
		}
		$uncheckedBlue = array_diff($blue, $checked);
		$bluePercentage = 100-count($uncheckedBlue)/count($blue)*100;
		$bluePercentage = round($bluePercentage, 0);
				
		$uncheckedRed = array_diff($red, $checked);
		$redPercentage = 100-count($uncheckedRed)/count($red)*100;
		$redPercentage = round($redPercentage, 0);
		
		$uncheckedGreen = array_diff($green, $checked);
		$greenPercentage = 100-count($uncheckedGreen)/count($green)*100;
		$greenPercentage = round($greenPercentage, 0);
		
		$uncheckedYellow = array_diff($yellow, $checked);
		$yellowPercentage = 100-count($uncheckedYellow)/count($yellow)*100;
		$yellowPercentage = round($yellowPercentage, 0);
		
		$upPercentage = round((($bluePercentage + $redPercentage) / ($greenPercentage + $yellowPercentage + $bluePercentage + $redPercentage)*100), 0);
		
		$downPercentage = round((($greenPercentage + $yellowPercentage) / ($greenPercentage + $yellowPercentage + $bluePercentage + $redPercentage)*100), 0);
		
		$rightPercentage = round((($redPercentage + $yellowPercentage) / ($greenPercentage + $yellowPercentage + $bluePercentage + $redPercentage)*100), 0);
		
		$leftPercentage = round((($greenPercentage + $bluePercentage) / ($greenPercentage + $yellowPercentage + $bluePercentage + $redPercentage)*100), 0);
	}
	
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Test oobowości</title>
  <!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
  <!-- Bootstrap core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
	<link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
	<link href="css/style.css" rel="stylesheet">
	<link rel="Stylesheet" href="main.css">
	
  <!-- dynagraphs -->
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/dygraph/2.1.0/dygraph.min.css" />
  	<script src="//cdnjs.cloudflare.com/ajax/libs/dygraph/2.1.0/dygraph.min.js"></script>
</head>
<body>
<form method="POST">
	<div id="container">
	<div id="main">
		Wybierz cechy, które posiadasz
	</div>
		<div id="middle">
			<div id="middle-container">
				<div id="left-part">
					<p>
						Introwertyk (bierny, wstrzemięźliwy)
						<?php 
							if($_POST) {
								echo '</br><b>'.$leftPercentage.'%</b>';
							}
						?>
					</p>
				</div>
				<div id="chart-container">
					Nastawieni na zadanie i na problem
					<?php 
						if($_POST) {
							echo '<b>'.$upPercentage.'%</b>';
						}
					?>
					<div class="group" id="blue" <?php if($_POST) { echo 'style="opacity: '.(0.4+$bluePercentage/100).';"'; } ?>>
						<p class="colorWord" >
							Melancholik</br>Analityczny
						</p>
						<p class="up">
							<?php
								if($_POST) {
									echo '<b>'.$bluePercentage.'%</b>';
								}
							?>
						</p>
					</div>
					<div class="group" id="red" <?php if($_POST) { echo 'style="opacity: '.(0.4+$redPercentage/100).'"'; } ?>>
						<p class="colorWord">
							Choleryk</br>Dominujący
						</p>
						<p class="up">
							<?php
								if($_POST) {
									echo '<b>'.$redPercentage.'%</b>';
								}
							?>
						</p>
					</div>
					<div class="group" id="green" <?php if($_POST) { echo 'style="opacity: '.(0.4+$greenPercentage/100).'"'; } ?>>
						<p class="colorWord">
							Flegmatyk</br>Zrównoważony
						</p>
						<p class="up">
							<?php
								if($_POST) {
									echo '<b>'.$greenPercentage.'%</b>';
								}
							?>
						</p>
					</div>
					<div class="group" id="yellow" <?php if($_POST) { echo 'style="opacity: '.(0.4+$yellowPercentage/100).'"'; } ?>>
						<p class="colorWord">
							Sangwinik</br>Inspirujący
						</p>
						<p class="up">
							<?php
								if($_POST) {
									echo '<b>'.$yellowPercentage.'%</b>';
								}
							?>
						</p>
					</div>
					
					<p>
						Nastawieni na relacje z otoczeniem
						<?php 
							if($_POST) {
								echo '<b>'.$downPercentage.'%</b>';
							}
						?>
					</p>
				</div>
				<div id="right-part">
					Ekstrawertyk (aktywny, wdrażający)
					<?php 
						if($_POST) {
							echo '</br><b>'.$rightPercentage.'%</b>';
						}
					?>
				</div>
			</div>
			<div id="ukryj">
				<button id="ukryj" type="button" class="btn btn-outline-info" 
				onclick= "$('#wady').hide();
						$('#odkryj').show();
						$('#reset').hide();
						$('#ukryj').hide();
						$('#main').hide();"
				>
					Ukryj cechy
				</button>
			</div>
			<div id="przelicz">
				<button type="submit" class="btn btn-outline-success">
					Przelicz
				</button>
			</div>
		</div>
		
		<div id="right-container">	
			<button style="display: none;" id="odkryj" type="button" class="btn btn-outline-info" 
			onclick="$('#odkryj').hide();
					$('#wady').show();
					$('#reset').show();
					$('#ukryj').show();
					$('#main').show();">
				Odkryj cechy
			</button>
			<div id="wady">
				<?php
					foreach($multiArr[0] as $cecha) {
						$var = '';
						if($_POST) {
							if(in_array($cecha, $checked)) {
								$var = 'checked';
							}
						}
						
						echo 
						'<div class="row">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="'.$cecha.'" name="'.$cecha.'" '.$var.'>
								<label class="custom-control-label" for="'.$cecha.'">'.$cecha.'</label>
							</div>
						</div>';
					}
				?>
			</div>
		</div>
	</div>
</form>	
<form>
	<button id="reset" type="submit" class="btn btn-outline-danger" href="reset.php">
		Zresetuj
	</button>
</form>

	<!-- SCRIPTS -->
  <!-- JQuery -->
	<script src="jquery-3.3.1.js"></script>
  <!-- Bootstrap tooltips -->
	<script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
	<script type="text/javascript" src="js/mdb.min.js"></script>

</body>
</html>