<!DOCTYPE html>
<html>
<head>
    <title>content sample</title>
    <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="contentsamplecss.css">
	<link rel="javascript" type="text/js" href="chnage.js">
</head>
<body>
<?php
    session_start();
    $change_num = 1;
    if($change_num===1){
        $lists=file("db.txt");
    } else {
    	$lists=file("dben.txt");
    }


    ?>
	<section class="sections">
		<div class="sec_content"> 
			<h2> <?= $lists[0]; ?> </h2>
			
			<div class="paragraphs" div-cols = "2">
				<div class="left_paragraph">
					<p> <?= $lists[1]; ?> </p>				
					<!-- veriable1 ? -->
				</div>

				<div class="right_paragraph">
					<p>  <?= $lists[2]; ?>.</p>
					<!-- veriable2 ? -->
					<blockquote>
						<q> <?= $lists[3]; ?></q> 
						<br />
						<em>  <?= $lists[4]; ?> </em>
					</blockquote>
					<!-- 일단 있어서 들고오긴 했는데 blockquote가 필요한지는 의문 -->
					<!-- 여기 text는 justfied 적용 예정-->

				</div>
			

				<img class="center_picture" src="contentsample_pic/sp11.jpg">
				<br/>
				<img class="left_picture" src="contentsample_pic/summer03_607.jpg">
				<img class="right_picture" src="contentsample_pic/spring04_607.jpg">

			</div>

		</div>

		<aside class="accomodation">
			<img class="center_picture" src="contentsample_pic/sp21.jpg">
			<br/>
			<img class="left_picture" src="contentsample_pic/summer06_86.gif">
			<img class="right_picture" src="contentsample_pic/sp17.jpg">

			<h3> <?= $lists[5]; ?></h3>
			<ul>
				<li>
					<dl>
						<dt> <?= $lists[6]; ?></dt>
						<dd> <?= $lists[7]; ?></dd>
					</dl>
				</li>
				<li>
					<dl>
					<?php for($i=8;$i<14;$i++){
                        ?>
						<dt> <?= $lists[$i]; ?></dt>
						<?php
                    }?>
						
					</dl>
				</li>
				<li>
					<dl>
						<dt>
							
						</dt>
						<dd>
							<?= $lists[14]; ?>
						</dd>
					</dl>
					
				</li>
			</ul>
			<button onclick="change_kor();">Kor</button>
			<button onclick="change_eng();">Eng</button>
		</aside>
		<?= $change_num; ?>
	</section>
</body>
</html>