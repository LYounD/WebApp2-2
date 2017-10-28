<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Grade Store</title>
		<link href="http://selab.hanyang.ac.kr/courses/cse326/2017/labs/labResources/gradestore.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		
		<?php
			$name = $_POST["Name"];
			$id = $_POST["ID"];
			$cse326 = $_POST["CSE326"];
			$cse107 = $_POST["CSE107"];
			$cse603 = $_POST["CSE603"];
			$cin870 = $_POST["CIN870"];

			$course = processCheckbox($cse326, $cse107, $cse603, $cin870);

			$grade = $_POST["grade"];
			$card = $_POST["card"];
			$credit = $_POST["Credit"];
		# Ex 4 : 
		# Check the existance of each parameter using the PHP function 'isset'.
		# Check the blankness of an element in $_POST by comparing it to the empty string.
		# (can also use the element itself as a Boolean test!)
		 if (!isset($name) or !isset($id) or !isset($card) or !isset($credit)){
		?>

		<!-- Ex 4 : 
			Display the below error message : -->
			<h1>Sorry</h1>
			<p>You didn't fill out the form completely. <a href="gradestore.html">Try again?</a></p>
		
		<?php
		# Ex 5 : 
		# Check if the name is composed of alphabets, dash(-), ora single white space.
		 } elseif (!preg_match('/^[a-zA-Z]+$/', $name) and ( preg_match('/^[a-zA-Z]+[-]{1}[a-zA-Z]+$/', $name) + preg_match('/^[a-zA-Z]+[\s]{1}[a-zA-Z]+$/', $name) <> 1)) { 
		?>

		<!-- Ex 5 : 
			Display the below error message : -->
			<h1>Sorry</h1>
			<p>You didn't provide a valid name. <a href="gradestore.html">Try again?</a></p> 
		

		<?php
		# Ex 5 : 
		# Check if the credit card number is composed of exactly 16 digits.
		# Check if the Visa card starts with 4 and MasterCard starts with 5. 
		 } elseif ( (!preg_match("/\d{16}/", $card)) or ( ( ($credit == 'visa') and !preg_match("/^[4]/", $card) ) or ( ($credit == 'masterCard') and !preg_match("/^[5]/", $card) ) )   ) {
		?>

		<!-- Ex 5 : 
			Display the below error message : -->
			<h1>Sorry</h1>
			<p>You didn't provide a valid credit card number. Try again?</p>
		

		<?php
		# if all the validation and check are passed 
		 } else {
		?>

		<h1>Thanks, looser!</h1>
		<p>Your information has been recorded.</p>
		
		<!-- Ex 2: display submitted data -->
		<ul> 
			<li>Name: <?= $name ?></li>
			<li>ID: <?= $id ?></li>
			<!-- use the 'processCheckbox' function to display selected courses -->
			<li>Course: <?= $course ?></li>
			<li>Grade: <?= $grade ?></li>
			<li>Credit: <?= $card, " (", $credit, ")"?></li>
		</ul>
		
		<!-- Ex 3 : 
			<p>Here are all the loosers who have submitted here:</p> -->
		<?php
			$filename = "loosers.txt";

			$input = array($name, $id, $card, $credit);
			$data = implode(';', $input);
			file_put_contents($filename, "\r\n".$data, FILE_APPEND);

			/* Ex 3: 
			 * Save the submitted data to the file 'loosers.txt' in the format of : "name;id;cardnumber;cardtype".
			 * For example, "Scott Lee;20110115238;4300523877775238;visa"
			 */
		?>
		
		<!-- Ex 3: Show the complete contents of "loosers.txt".
			 Place the file contents into an HTML <pre> element to preserve whitespace -->

		
		<?php
			$content = file_get_contents("loosers.txt");
			$prints = explode("\n", $content);
		}
		?>
		<p>Here are all the loosers who have submitted here:</p>

		<pre>
<?= $content ?>
		</pre>
		
		<?php
			/* Ex 2: 
			 * Assume that the argument to this function is array of names for the checkboxes ("cse326", "cse107", "cse603", "cin870")
			 * 
			 * The function checks whether the checkbox is selected or not and 
			 * collects all the selected checkboxes into a single string with comma seperation.
			 * For example, "cse326, cse603, cin870"
			 */
			function processCheckbox($cse326, $cse107, $cse603, $cin870){ 
				$courses = array();
				if ($cse326 == 'on'){
					$courses[] = 'cse326';
				}
				if ($cse107 == 'on'){
					$courses[] = 'cse107';
				}
				if ($cse603 == 'on'){
					$courses[] = 'cse603';
				}
				if ($cin870 == 'on') {
					$courses[] = 'cin870';
				}

				$course = implode(', ', $courses);

				return $course;
			}
		?>
		
	</body>
</html>
