<!DOCTYPE html>
<html>
	<head>
	<title>index</title>
	<meta charset="utf-8">
	<link href="stylesheet.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Exo+2&display=swap" rel="stylesheet">
	</head>
	
	<body>
		<div id="a1">
			<p>Дни недели:</p><br>		
			<?php
	
				$lang;
				$arr;

				if (isset($_GET['ru'])) {
					$lang = 'ru';
				}
				else {
					$lang = 'en';
				}

				if ($lang == 'en') {
					$arr = ['1st' => 'sunday', '2nd' => 'monday', '3rd' => 'tuesday', '4th' => 'wednesday', 
				'5th' => 'thursday', '6th' => 'friday', '7th' => 'saturday.'];
				echo "The week is: ".$arr['1st'].", ".$arr['2nd'].", ".$arr['3rd'].", ".$arr['4th'].", ".$arr['5th'].", ".$arr['6th'].", ".$arr['7th']."</br>";
				}
				elseif ($lang == 'ru'){
					$arr = ['1st' => 'понелельник', '2nd' => 'вторник', '3rd' => 'среда', '4th' => 'четверг', 
				'5th' => 'пятница', '6th' => 'суббота', '7th' => 'воскресенье.'];
				echo "Неделя: ".$arr['1st'].", ".$arr['2nd'].", ".$arr['3rd'].", ".$arr['4th'].", ".$arr['5th'].", ".$arr['6th'].", ".$arr['7th']."</br>";
				}
				else {
					echo "Значение не задано";
				}

				
				
			?>

			<br>

			<form>
				<input type="submit" name="eng" id="eng" value="Английский">
				<input type="submit" name="ru" id="ru" value="Русский"></br>
			</form>
			</div>
			
			<div id="a2">
				<p>Массивы:</p><br>

			<?php 

				$arr2[1] = rand(1,50);
				$arr2[2] = rand(1,50);
				$arr2[3] = rand(1,50);
				$arr2[4] = rand(1,50);
				$arr2[5] = rand(1,50);
				$arr2[6] = rand(1,50);
				$arr2[7] = rand(1,50);
				$arr2[8] = rand(1,50);
				$arr2[9] = rand(1,50);
				$arr2[10] = rand(1,50);

				echo "Массив случайных чисел: ".$arr2[1].", ".$arr2[2].", ".$arr2[3].", ".$arr2[4].", ".$arr2[5].", ".$arr2[6].", ".$arr2[7]. ", ".$arr2[8]. ", ".$arr2[9].", ".$arr2[10]."</br>";
				$j = 0;
				$k = 0;
				for( $i = 1; $i < 11; $i++ )
				{
					if(($arr2[$i]%2)==0)
						{
							$arr22[$j]=$arr2[$i];
							$j++;
						}
					else
					{
						$arr23[$k]=$arr2[$i];
						$k++;
					}
						
				}
				echo "Массив четных чисел: ";
				for( $i = 0; $i < count($arr22); $i++ )
				{
					echo $arr22[$i]." ";
				}

				echo "</br>Массив нечетных чисел: ";
				for( $i = 0; $i < count($arr23); $i++ )
				{
					echo $arr23[$i]." ";
				}			

			?>
			</div>
		
			<div id="a3">
				<p>Введите текст:</p><br>
			<form action="index.php" method="get">
				<input type="text" id='inputtxt' name="txt" placeholder="Put some text here">
				<input type="submit" value="Вывести результат">
			</form>

			<?php 

				if ($_SERVER['REQUEST_METHOD'] == 'GET') {
					if (!empty($_GET['txt'])) {
						$value = $_GET['txt'];
						if (strlen($value) > 5) {
							echo "".$value[0]."".$value[1]."".$value[2]."".$value[3]."".$value[4]."...";
						}
						else {
							echo $value;
						}
					}					
				}
			?>
			</div>
			<div id="a4">
				<p>Введите свои данные:</p><br>
			<form action="index.php" method="post">
				<p>Имя: <input name="name" type="text" size="10" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>"></p><br>
				<p>Фамилия: <input name="surname" type="text" size="10" value="<?php if(isset($_POST['surname'])) echo $_POST['surname']; ?>"></p><br>
				<p>Возраст: <input name="age" type="number" size="10" value="<?php if(isset($_POST['age'])) echo $_POST['age']; ?>"></p><br>
				<input type="submit" value="Отправить">
			</form>
			
			
				
			<?php

				if ($_SERVER['REQUEST_METHOD'] == 'POST') {

					$name;
					$surname;
					$age;

					if (!empty($_POST['name'])) {
						$name = $_POST['name'];
					}
					if (!empty($_POST['surname'])) {
						$surname = $_POST['surname'];
					}
					if (!empty($_POST['age'])) {
						$age = $_POST['age'];
					}

					function clean($value =""){
						$value = trim($value);
						$value = stripslashes($value);
						$value = strip_tags($value);
						$value = htmlspecialchars($value);

						return $value;
					}

					if (!empty($_POST['name'])) {
						$name = clean($name);
					}
					if (!empty($_POST['surname'])) {
						$surname = clean($surname);
					}
					if (!empty($_POST['age'])) {
						$age = clean($age);
					}
				
					if(!empty($name) && !empty($surname) && !empty($age)){
						
						echo "<br>Спасибо за предоставление выших данных! Обещаем, что они не будут переданы третьим лицам.<br><br>";	
						echo "Ваше имя: ".$name."<br>";
						echo "Ваша фамилия: ".$surname."<br>";	
						echo "Ваш возраст: ".$age."<br>";				
					}
					else {
						echo "Неправильно, попробуй еще раз";
					}
				}

			?>
			</div>
	</body>
</html>