<?php
namespace App\Library\Services;

use Coinbase\Wallet\Resource\Account;
use Coinbase\Wallet\Resource\Address;
use Coinbase\Wallet\Client;
use Coinbase\Wallet\Configuration;
use Coinbase\Wallet\Enum\Param;

class LogSystem
{

	public static function write($mess, $status = "success", $filename = "")
	{
		$pathFile = self::createPath($filename);
		if (is_string($mess)) {
			$mess = "[".date('Y-m-d H:i:s')."] [".$status."] : ". $mess;
		} else {
			$mess = "[".date('Y-m-d H:i:s')."] [".$status."] : ". self::varDumpToString($mess);
		}
		
		if (file_exists($pathFile)) {
			$fh = fopen($pathFile, 'a') or die("can't open file");
		    $stringData = "\n". $mess;
		    fwrite($fh, $stringData);
			fclose($fh);
		} else {
			$myfile = fopen($pathFile, "w");
			fwrite($myfile, $mess);
			fclose($myfile);
			chmod($pathFile, 0777);
		}
	}

	private static function varDumpToString($var) {
	    ob_start();
	    var_dump($var);
	    $result = ob_get_clean();
	    return $result;
	}

	private static function createPath($filename)
	{
		$path = storage_path()."/logs";
		if (!is_dir($path)) {

		}
		$path .= "/carracks";
		if (!is_dir($path)) {
			mkdir($path);
			chmod($path, 0777);
		}
		if (!empty($filename)) {
			$path .= "/".$filename;
			if (!is_dir($path)) {
				mkdir($path);
				chmod($path, 0777);
			}
		}
		$path .= "/".date('Y-m-d').".log";
		return $path;
	}

}