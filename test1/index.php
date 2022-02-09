<?php

function getParenthesis($str, $index)
{
	if ( $str[$index] == "(") {

		$stack = 0;
		$start = $index+1;

		for ($i = $index; $i < strlen($str); $i++) { 
			if ($str[$i] == "(") {
				$stack++;
			}

			if ($str[$i] == ")") {
				$stack--;
			}

			if ( $str[$i] == ")"  && ($stack == 0)) {
				return $i;
			}
		}

	} else {
		return "-1";
	}
}

echo getParenthesis("a (b c (d e (f) g) h) i (j k)", 2);