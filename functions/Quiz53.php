<?php 

/*
Given this cod, what change would need to be made to allow the anounymous functino to 
use $tax and to update $total?
*/

function getTotal($tax){
	$total = 0.00;

	$callback = 
		function($quantity, $product)
		{
			$pricePerItem = constant(__CASS__. "::PRICE_".strtolower($product));
			$total += ($pricePerItem * $quantity) * ($tax + 1.0);
		};

	array_walk($this->products, $callback);

	return round($total, 2);
}

/*
A Add ",$tax, &total" after $product in the function signature

B Add "global $tax, $total" in the first line of the anonymous functions

C Add "use($tax, &$tatal)" to the end of the function signature // correta

D It is not possible to access these variables
*/
