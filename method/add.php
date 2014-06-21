<?php

function add() {

	if (!isset($_POST[PARAM_NUM1]) or
		!isset($_POST[PARAM_NUM2]) or
		!is_numeric($_POST[PARAM_NUM1]) or
		!is_numeric($_POST[PARAM_NUM2])
	) {
		Bye::ifInvalidParams();
	}

	$num1 = (int) $_POST[PARAM_NUM1];
	$num2 = (int) $_POST[PARAM_NUM2];

	$sum = $num1 + $num2;

	Bye::ifSuccess(array($sum));
}

