<?php
/**
 * @package Pinoy_Dolly
 * @author Jay Agonoy (tcmanila@gmail.com)
 * @version 3
 */

/*
Plugin Name: Pinoy Ako, Hello Dolly Edition
Plugin URI: http://github.com/assortex/pinoydolly
Description: It has the lyrics of the theme song of Pinoy Big Brother First Edition, which is sung by Orange and Lemons.
Author: Jay Agonoy (tcmanila@gmail.com)
Version: 3.0
Author URI: http://twitter.com/assortex
*/

function pinoy_dolly_get_lyric() {
/** These are the lyrics to 'Pinoy' Dolly */
	$lyrics = "Lahat tayo'y mayroong pagkakaiba, sa tingin pa lang ay makikita na
Iba't ibang kagustuhan ngunit iisang patutunguhan
Gabay at pagmamahal ang hanap mo, magbibigay ng halaga sa iyo
Nais mong ipakilala kung sino ka man talaga
Pinoy, ikaw ay pinoy
Ipakita sa mundo kung ano ang kaya mo
Ibang-iba ang pinoy, wag kang matatakot
(Ipagmalaki mong) Pinoy ako, Pinoy tayo...
Ipakita mo ang tunay at kung sino ka mayro'n mang masama at maganda
Wala naman perpekto basta magpakatotoo
Gabay at pagmamahal ang hanap mo magbibigay ng halaga sa iyo
Nais mong ipakilala kung sino ka man talaga
Talagang ganyan ang buhay, dapat ka nang masanay
Wala rin mangyayari kung laging nakikibagay
Ipakilala ang iyong sarili, ano man sa iyo ay mangyayari
Ang lagi mong iisipin, kayang kayang gawin...";

	$lyrics = explode( "\n", $lyrics );
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function pinoy_dolly() {
	$chosen = pinoy_dolly_get_lyric();
	echo "<p id='pdolly'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'pinoy_dolly' );

// We need some CSS to position the paragraph
function pdolly_css() {
	$x = is_rtl() ? 'left' : 'right';
	echo "
	<style type='text/css'>
	#dolly {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'pdolly_css' );

?>