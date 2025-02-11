<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Opensslencryptdecrypt
{
	public $secret_key = 'vQ6xWRbJ9sYHqCJ0EWVXSOvhal1qsBh5';
	public $secret_iv  = 'vQ6xWRbJ9sYHqCJ0EWVXSOvhal1qsBh5';
	public $method     = "AES-256-CBC";

	public $secret_token = 'TGhndS8W3qwpYadt';
	public $secret_v     = 'TGhndS8W3qwpYadt';

	public $FILE_ENCRYPTION_BLOCKS = 10000;
	public $CHUNK_SIZE = 1024 * 1024;


	function encrypt($string)
	{
		$output = false;
		$key = hash('sha256', $this->secret_key);
		$iv = substr(hash('sha256', $this->secret_iv), 0, 16);
		$output = openssl_encrypt($string, $this->method, $key, 0, $iv);
		$output = base64_encode($output);
		return $output;
	}

	function decrypt($string)
	{
		$output = false;
		$key = hash('sha256', $this->secret_key);
		$iv = substr(hash('sha256', $this->secret_iv), 0, 16);
		$output = openssl_decrypt(base64_decode($string), $this->method, $key, 0, $iv);
		return $output;
	}

	function encryptToken($string)
	{
		$output = false;
		$key = hash('sha256', $this->secret_token);
		$v = substr(hash('sha256', $this->secret_v), 0, 16);
		$output = openssl_encrypt($string, $this->method, $key, 0, $v);
		$output = base64_encode($output);
		return $output;
	}



	public $secret_keyFAKE = 'eh0i6ytf7kktD5sokEtiW45s659sTANf';
	public $secret_ivFAKE  = 'eh0i6ytf7kktD5sokEtiW45s659sTANf';
	function encryptFake($string)
	{
		$output = false;
		$key = hash('sha256', $this->secret_keyFAKE);
		$iv = substr(hash('sha256', $this->secret_ivFAKE), 0, 16);
		$output = openssl_encrypt($string, $this->method, $key, 0, $iv);
		$output = base64_encode($output);
		return $output;
	}

	function decryptFake($string)
	{
		$output = false;
		$key = hash('sha256', $this->secret_keyFAKE);
		$iv = substr(hash('sha256', $this->secret_ivFAKE), 0, 16);
		$output = openssl_decrypt(base64_decode($string), $this->method, $key, 0, $iv);
		return $output;
	}



}