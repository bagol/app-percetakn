<?php

function cekPdf($string){
	if(preg_match("/\.pdf/", $string,$hasil)) return "default.png";
	return $string;
}