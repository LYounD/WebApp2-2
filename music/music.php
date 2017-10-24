<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Music Library</title>
		<meta charset="utf-8" />
		<link href="http://selab.hanyang.ac.kr/courses/cse326/2017/labs/images/5/music.jpg" type="image/jpeg" rel="shortcut icon" />
		<link href="http://selab.hanyang.ac.kr/courses/cse326/2017/labs/labResources/music.css" type="text/css" rel="stylesheet" />
	</head>

	<body>

		<h1>My Music Page</h1>
		
		<!-- Ex 1: Number of Songs (Variables) -->
		<?php
		$song_count = "5678";
		$news_page = 1;
		$newspages = $_GET["newspages"];

		if (!isset($_GET["newspages"])){
			$newspages = 5;
		}

		$text = file_get_contents("favorite.txt");
		$artists = explode("\n", $text);

		$musices = glob("lab5/musicPHP/songs/*.mp3");

		$playlist_text = array_reverse(glob("lab5/musicPHP/songs/*.m3u")) ;
		

		?>
		<p>
			I love music.
			I have <?= $song_count ?> total songs,
			which is over <?= (int)($song_count/10) ?> hours of music!
		</p>

		<!-- Ex 2: Top Music News (Loops) -->
		<!-- Ex 3: Query Variable -->
		<div class="section">
			<h2>Yahoo! Top Music News</h2>

			<ol>
				<?php for ($news_page = 1 ; $news_page <= $newspages  ; $news_page++) { ?>
				<li><a href="http://music.yahoo.com/news/archive/?page=<?= $news_page ?>">Page <?= $news_page ?></a></li>
				<?php } ?>
			</ol>
		</div>

		<!-- Ex 4: Favorite Artists (Arrays) -->
		<!-- Ex 5: Favorite Artists from a File (Files) -->
		<div class="section">
			<h2>My Favorite Artists</h2>
		
			<ol>
				<?php foreach ($artists as $artist) { ?>
				<li> <a href="http://en.wikipedia.org/wiki/<?= "$artist" ?>">
					<?= $artist  ?></a>
				 </li>
				 <?php } ?>
			</ol>
		</div>
		
		<!-- Ex 6: Music (Multiple Files) -->
		<!-- Ex 7: MP3 Formatting -->
		<div class="section">
			<h2>My Music and Playlists</h2>
			<ul id="musiclist">
				<?php 
					$music_array = array();
					foreach ($musices as $music) { 
						array_push($music_array, array('size'=> filesize($music), 'name'=> $music));
					}
					arsort($music_array);
					foreach ($music_array as $music) {
						?>
				<li class="mp3item">
					<a href="<?= $music['name'] ?>" target="_blank" download><?= basename($music['name']) ?></a> (<?= (int)($music['size']/1024) ?> KB)
				</li>
				<?php } ?>
				<!-- Exercise 8: Playlists (Files) -->
				<?php foreach ($playlist_text as $playlist) {
					$content_playlist = file($playlist);
					shuffle($content_playlist);
				?>

				<li class="playlistitem"><?= basename($playlist); ?> :
					<ul>
						<? foreach ($content_playlist as $con_playlist) {
								$compare = '#';
								$pos = strpos($con_playlist, $compare);
								if ($pos === false){
								
						?>
						<li>
							<? 
								print("$con_playlist"); 
							?>
						</li>
						<?
							}
						}
						?>
					</ul>
					<?
						}
					?>
				</li>
			</ul>
		</div>

		<div>
			<a href="http://validator.w3.org/check/referer">
				<img src="http://selab.hanyang.ac.kr/courses/cse326/2017/labs/images/w3c-html.png" alt="Valid HTML5" />
			</a>
			<a href="http://jigsaw.w3.org/css-validator/check/referer">
				<img src="http://selab.hanyang.ac.kr/courses/cse326/2017/labs/images/w3c-css.png" alt="Valid CSS" />
			</a>
		</div>
	</body>
</html>
