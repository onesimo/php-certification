<?php 
/*
What will the follwing code print out?
*/

echo sprintf('%.4d %.4f', 0xFF, 0XFF);

/*
A 255.0000 255.0000 because the period signifies to always use a floating point number

B 255 255.000 because the period does not signify to always use a floating point number / correta

C 255.0255.0000 because de default padding for a decimal is a zero

D 255 255 because a floating point number with no decimal places is the same as an integer
*/

?>