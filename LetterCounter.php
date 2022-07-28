<?php

class LetterCounter {
	// Write your code here
	 public function countLettersInString($word){
	     $word = strtolower($word);


	     $wcount =  strlen($word);
	     $acount = $wcount - 1;

	     $occur = array();

	     while($acount >= 0){

	         $occur[$acount] = $word[$acount];

	         $acount--;
	     }

	     $occur = array_reverse($occur);
	     $reoccur = array();

	     foreach($occur as $x => $y){
	         $freq = array_keys($occur, $y);
	         $count = count($freq);

	         $chk= array_key_exists($y, $reoccur);
	         if(!$chk){
	             $reoccur[$y] = $count;
	         }
	     }

	     $ncount= count($reoccur);
	     $num= 1;

	     foreach($reoccur as $a => $b){

	         $ast = '*';
	         while($b > 1){
	             $ast = $ast . '*';
	             $b--;
	         }
	         $tots = $a . ':' . $ast;
	         if($num !== $ncount){
	             $tots = $tots . ',';
	             $num++;
	         }
	         if($a !== ' '){
	             echo $tots;
	         }
	     }

	 }
}

$check = new LetterCounter();
$check-> countLettersInString('lol');





    ?>


