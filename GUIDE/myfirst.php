<?php

function showCar($cars, $car){
	$ctr=0;
	for($i = 0;$i < count($cars); $i++)
{
	if($cars[$i] == $car)
	{
		$ctr++;
	}
}
if($ctr > 0){
echo "yes we have ".$car;
}
else{
echo "no we don't have ".$car." available";
}

}

$cars = array("honda", "toyota", "ferrari","nissan", "ford", "chevrolet", "mclaren", "lamborghini", "bmw");


showCar($cars,"maseratti");

function add($x,$y){
	return $x + $y;
}

function subtract($x,$y){
	return $x-$y;
}