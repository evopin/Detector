<h3><?= (Detector::$foundIn == 'archive') ? 'Archived' : 'Your'; ?> Detector Feature Profile</h3>
<p>
	The following feature profile was primarily created using <a href="http://www.modernizr.com/docs/#s2">Modernizr's core tests</a>. The left column, <strong>Browser</strong>, is populated by JavaScript using a copy of Modernizr that is loaded with this page. The right column, <strong>Server</strong>, is populated by PHP using the profile created by Detector for your browser.
	In addition to the core tests
	I've added an extended test that checks for emoji support as well as a per request test to check the device pixel ratio. Both were added using the <a href="http://www.modernizr.com/docs/#addtest">Modernizr.addTest() Plugin API</a>.
	To learn more about core, extended, and per request tests please <a href="https://github.com/dmolsen/Detector">review the README</a>.  To access any of these options in your PHP app you'd simply type <code>$ua->featureName</code>.
	<br /><br />
</p>

<?php 
	
	// organize what features show up in which section
	$css3Features       = "/(fontface|backgroundsize|borderimage|borderradius|boxshadow|flexbox|flexbox-legacy|hsla|multiplebgs|opacity|rgba|textshadow|cssanimations|csscolumns|generatedcontent|cssgradients|cssreflections|csstransforms|csstransforms3d|csstransitions|overflowscrolling)/";
	$html5Features      = "/(applicationcache|canvas|canvastext|draganddrop|hashchange|history|audio|video|indexeddb|input|inputtype|localstorage|postmessage|sessionstorage|websockets|websqldatabase|webworkers)/";
	$miscFeatures       = "/(geolocation|inlinesvg|smil|svg|svgclippaths|touch|webgl|json)/";
	$mqFeatures         = "/(desktop|mobile|tablet)/";
	$extendedFeatures   = "/(emoji)/";
	$perRequestFeatures = "/(hirescapable|screenattributes)/";
	
	// create separate tables
	createFT($ua,$css3Features,"CSS3 Features");
	createFT($ua,$html5Features,"HTML5 Features");
	createFT($ua,$miscFeatures,"Misc. Features");
	createFT($ua,$mqFeatures,"Browser Class via Media Queries","core-","This feature needs some love as it's not always returning information correctly.");
	createFT($ua,$extendedFeatures,"Detector Extended Test Features","extended-","To learn more about extended tests and their purpose please <a href=\"https://github.com/dmolsen/Detector\">review the README.</a>");
	if (Detector::$foundIn != 'archive') {
		createFT($ua,$perRequestFeatures,"Detector Per Request Test Features","pr-","To learn more about per request tests and their purpose please <a href=\"https://github.com/dmolsen/Detector\">review the README.</a> If this section isn't populated hit \"refresh\". Attributes are captured via a cookie.");	
	}
?>