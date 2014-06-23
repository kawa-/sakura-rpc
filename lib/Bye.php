<?php

class Bye {

	static function ifInvalidMethod() {
		self::outputFailure(40000, 'Invalid Method.');
	}

	static function ifInvalidParams() {
		self::outputFailure(40001, 'Invalid Params.');
	}

	static function ifSuccess($result) {
		self::outputSuccess(20000, 'OK', $result);
	}

	private static function outputFailure($code, $message) {
		//header('Access-control-allow-origin: *');
		header('Content-Type: application/json; charset=utf-8');
		header('X-Content-Type-Options: nosniff');
		exit(json_encode(array('code' => $code, 'message' => $message)));
	}

	private static function outputSuccess($code, $message, $result) {
		//header('Access-control-allow-origin: *');
		header('Content-Type: application/json; charset=utf-8');
		header('X-Content-Type-Options: nosniff');
		exit(json_encode(array('code' => $code, 'message' => $message, 'result' => $result)));
	}

}
