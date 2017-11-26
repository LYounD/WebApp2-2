<!DOCTYPE html>
<html>
<head>
	<title>php with DB</title>
</head>
<body>
	<form action="sql.php" method="post">
		<div>
			DB name :
			<input type="text" name="DB_name" />
			Query :
			<input type="box" name="query" />
		</div>
		<div>
			<input type="submit" name="submit" value="go!" />
		</div>
	</form>

	<?php  
		$name = $_POST['DB_name'];
		$querys = $_POST['query'];
		if(isset($querys)){
			try{
				
				$name = new PDO("mysql:dbname=".$name.";host=localhost", "root", "root");
				$name -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$rows = $name -> query($querys);

				foreach ($rows as $row) {
					for ($i=0; $i < count($row)/2 ; $i++) {
						$str = $str." ".$row[$i];
					}
					?>
					<li> <?=$str ?></li> <?
					$str = '';
				}

			} catch (PDOException $ex ) { ?>
				<p>error</p>
				<?
			}
		}	
		?>

</body>
</html>