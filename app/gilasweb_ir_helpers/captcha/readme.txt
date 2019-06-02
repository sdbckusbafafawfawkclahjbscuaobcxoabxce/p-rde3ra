Shared In: http://daskhat.ir

jReply Simple PHP CAPTCHA
Copyright (c) 2013 jReply LLC, http://jreply.com
Released under the terms of the MIT license: 

http://opensource.org/licenses/MIT

An easy to use CAPTCHA that will not annoy human visitors while at
the same time being hard enough to keep out the bots. The underlying
code is easy to understand and to modify

See the code in the accompanying index.html file
for sample usage.

Files in this distribution

1. readme.txt - this file.
2. index.html - a demo for the CAPTCHA
   along with some basic usage instructions
3. clear_captcha.php - the actual CAPTCHA
   generation script 
4. xsixlw.txt - a list of over 1500 six letter words
   concatenated into a single string
5. oldsans.ttf - the font used by the CAPTCHA. The font comes from
   http://www.dafont.com/manfred-klein.d302
   
This CAPTCHA generator lacks most of the configurability you will find in many
other generators.  This has been done intentionally in order to minimize the 
use of server time for generating the CAPTCHA image.  It should produce 
CAPTCHAs that are, in our view, adequate for most practical purposes. 
For even greater variation try one or more of the following

1. Use a bigger list of words
2. Increase the frequency with which vowels in the 6 letter CAPTCHA are rotated
3. Use a wider range of colors, font-sizes or text rotation angles
4. Use mixed fonts

