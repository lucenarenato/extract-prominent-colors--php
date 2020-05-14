<!DOCTYPE html>
<html lang="en-us" class="no-js" dir="ltr">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width" />
<title>Color Contrast Tester: Color contrast comparison tool.</title>
<meta name="description" content="A free online color contrast comparison tool to compare colors under WCAG 2. (With support for alpha transparency.)" />
<link href='contrast-compare.css' id='highContrastStylesheet' rel='stylesheet' type='text/css' />
<script src="https://www.joedolson.com/articles/wp-includes/js/jquery/jquery.js"></script>
<script src="https://www.joedolson.com/tools/inc/scripts.js"></script>
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="@joedolson" />
<meta name="twitter:url" content="https://www.joedolson.com/tools/color-contrast.php" />
<meta name="twitter:title" content="Color Contrast Tester" />
<meta name="twitter:description" content="Test colors against the WCAG 2.0 accessibility guidelines for contrast." />
<meta name="twitter:image" content="https://www.joedolson.com/favicon-192x192.png" />
</head>
<body>
	<div id="head">
		<h1><a href="http://www.joedolson.com/tools/color-contrast.php">Color Contrast Tester</a></h1>
	</div>
	<div id="outer">
		<div id="inner">
				<div>
			<ul class='tabs'>
								<li class="hex-on active"><a href='#hex'>Hex</a></li>
				<li class="rgb-on"><a href='#rgb'>RGB</a></li>
				<li class="hsl-on"><a href='#hsl'>HSL</a></li>
			</ul>
			<form method="get" action="color-contrast.php">
				<div class="values">
					<div class='hex' id="hex">
						<input type='hidden' name='type' value='hex' />
						<p>
							<label for="color_hex">Foreground Color (hexadecimal)</label><br /><input type="text" name="color" value="#FFFFFF" id="color_hex" class="color" />
						</p>
						<p>
							<label for="color2_hex">Background Color (hexadecimal)</label><br /><input type="text" name="color2" value="#333333" id="color2_hex" class="color" />
						</p>
					</div>
					<div class='rgb inactive' id="rgb">
						<input type='hidden' name='type' value='rgb' />
						<p>
							<label for="color_rgb">Foreground Color (RGB)</label><br /><input type="text" name="color" placeholder="0,0,255" value="" id="color_rgb" class="color" />
						</p>
						<p>
							<label for="color2_rgb">Background Color (RGB)</label><br /><input type="text" name="color2" placeholder="255,0,0" value="" id="color2_rgb" class="color" />
						</p>
					</div>
					<div class='hsl inactive' id="hsl">
						<input type='hidden' name='type' value='hsl' />
						<p>
							<label for="color_hsl">Foreground Color (HSL)</label><br /><input type="text" name="color" placeholder="120,1,.5" value="" id="color_hsl" class="color" />
						</p>
						<p>
							<label for="color2_hsl">Background Color (HSL)</label><br /><input type="text" name="color2" placeholder="240,.5,1" value="" id="color2_hsl" class="color" />
						</p>
					</div>
					<p>
						<label for="alpha">Alpha transparency (foreground)</label><br /><input type="number" name="alpha" min='0' max='1' step='.01' value="" id="alpha" class="alpha" />
					</p>
				</div>
				<p>
					<input type="submit" value="Compare Colors" class="button" />
				</p>
			</form>
		</div>

			<p>&laquo; <a href="http://www.joedolson.com/articles/2008/05/testing-color-contrast/">Testing Color Contrast</a> | <a href="/color-contrast-tester.php">Color Spectrum Test</a> | <a href="http://www.joedolson.com/articles/">Accessible Design Blog</a> | <a href="/">Joe Dolson Accessible Web Design</a></p>
	</div>
</body>
</html>