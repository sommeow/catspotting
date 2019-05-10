<?php

$file = '/data/locations.csv';
$f = fopen($file, 'r');
$text = fread($f, filesize($file));
fclose($f);

$locationOfNyanCat = str_getcsv($text);
echo checkCoords($locationOfNyanCat);

$locationOfCryCat = str_getcsv($text);
echo checkCoords($locationOfCryCat);

$locationOfGrumpyCat = str_getcsv($text);
echo checkCoords($locationOfGrumpyCat);

$locationOfPusheenCat = str_getcsv($text);
echo checkCoords($locationOfPusheenCat);

$locationOfJijiCat = str_getcsv($text);
echo checkCoords($locationOfJijiCat);

function checkCoords($loC) {
  if (withinRange($loC, 'x') && withinRange($loC, 'y')) {
      return '√ You found a cat!';
    }
    else {
        return wrongCharacter();
    };
};

function withinRange($loC, $xORy) {
    $axis = isItXorY($xORy);
    if ($_POST[$xORy."pos"] > $loW[$axis] - 10 && $_POST[$xORy."pos"] < $loW[$axis] + 10){
		return true;
  }
	else {
		return false;
	};
};

function isItXorY($xy){
	if ($xy == "x"){
		return 0;
	}
	else if ($xy == "y"){
		return 1;
	};
};

function wrongCharacter(){
	$snarks = ['Get away from me!', 'Umm...excuse you.', 'Could you not?'];
	return $snarks[rand(0, 2)];
};

?>
