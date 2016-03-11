<?php  
/*
What is the output of this code?
*/
class Me{
	const NAME = "Dr.Evil";
}

class MiniMe extends Me{}

echo MiniMe::NAME;
/*

A Dr. Evil

B MiniMe::NAME

C nothing

D NAME

E Fatal error


A constante é herda a classe filhaphp 	
*/


?>