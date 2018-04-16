<?php

namespace App\Helpers;

class Url
{
	public static $klik    = 0;
	public static $urlLink = "http://localhost/belajarlaravel/laravel-shorturl/";
    public static function shortUrl($length = 5) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
    }

}

?>