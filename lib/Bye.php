<?php

class Bye {

	static function ifInvalidMethod() {
		self::echoJsonResponse(40000, 'Invalid Method.', array());
	}

	static function ifInvalidParams() {
		self::echoJsonResponse(40001, 'Invalid Params', array());
	}

	static function ifSuccess(Array $result) {
		self::echoJsonResponse(20000, 'OK', $result);
	}

	private static function echoJsonResponse($code, $message, Array $result) {
		//header('Access-control-allow-origin: *');
		header('Content-Type: application/json; charset=utf-8');
		header('X-Content-Type-Options: nosniff');
		exit(json_encode(array('code' => $code, 'message' => $message, 'result' => $result)));
	}

}
