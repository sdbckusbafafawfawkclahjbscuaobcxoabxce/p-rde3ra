<?php
 
  function warpedCaptcha($text)
  {
   /*
    this function takes the original captcha text and shuffles
	the vowels + y around in order to deliver more variable 
	captcha text
   */
   if (5 > rand(0,6)) return $text;
   //only parttime warping
   $ltrs = array('b'=>'b','c'=>'c','d'=>'d','f'=>'f','g'=>'g','h'=>'h','j'=>'j',
               'k'=>'k','l'=>'l','m'=>'m','n'=>'n','p'=>'p','q'=>'q','r'=>'r',
			   's'=>'s','t'=>'t','v'=>'v','w'=>'w','x'=>'x','z'=>'z');

  $vkeys = $vltrs = explode(',','a,e,i,o,u,y');
  shuffle($vkeys);
  $vowels = array();
  foreach($vkeys as $ndx=>$vkey) $vowels[$vkey] = $vltrs[$ndx];
  //the vowels + y are now jumbled up
 
  $ltrs = array_merge($ltrs,$vowels);
  //full associative array of alphabet with randomized vowels + y
  $text = str_split($text);
 
  $captcha = '';
  foreach($text as $txt) $captcha .= $ltrs[$txt];
  return $captcha;
 }
 
 /*
  xsixlw.txt is a long string of 6 letter words concatenated together.
  We pick a word at random from this text
 */
 $fp = fopen('xsixlw.txt',"r");
 $count = filesize('xsixlw.txt')/6 - 1;
 $pos = 6*rand(0,$count);
 fseek($fp,$pos);
 $captcha = warpedCaptcha(trim(fread($fp,6)));
 fclose($fp);
 		  
 
 
 session_start();
 $_SESSION['captcha'] = $captcha;
 //store the captcha to check later once the user has solved it
 session_write_close();
 
 $im = imagecreatetruecolor(200,70);//200 x 70 pixel image
 $black = imagecolorallocate($im,0,0,0);
 imagecolortransparent($im,$black);//give it a black background

 switch(rand(0,4))
 {
  case 0:$color = imagecolorallocate($im,34,155,91);break;
  case 1:$color = imagecolorallocate($im,233,26,74);break;
  case 2:$color = imagecolorallocate($im,233,26,195);break;
  case 3:$color = imagecolorallocate($im,244,178,19);break;
  case 4:$color = imagecolorallocate($im,53,125,199);break;
 } 
 //pick a random color for the text

 $x = 20;$y = 47;//the starting position for drawing
 for ($i=0;$i<6;$i++)
 {
  $angle = rand(-8,8) + rand(0,9)/10;
  $fontsize = rand(22,32);//pick a random font size
  $letter = substr($captcha,$i,1);
  $coords = imagettftext($im,$fontsize,$angle,$x,$y,$color,'oldsans.ttf',$letter);
  //draw each letter
  $x += ($coords[2]-$x) + 1;
 }


header('Content-type:image/png');
imagepng($im);
imagedestroy($im);
?>