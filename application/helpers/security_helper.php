<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



/**
 * puntoVenta security Helper
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		Enrique Amezcua
 *
 */


// ------------------------------------------------------------------------




    //
    // ENCODE STRING
    //

    function encode( $string , $key = "0" ) {
    	
        $j = 0 ;

    	$hash = "" ;

        $key = sha1($key);

        $strLen = strlen($string);

        $keyLen = strlen($key);

        for ($i = 0; $i < $strLen; $i++) {

            $ordStr = ord(substr($string,$i,1));
            
                if ($j == $keyLen) 
                    $j = 0;
            
            $ordKey = ord(substr($key,$j,1));

            $j++;

            $hash .= strrev(base_convert(dechex($ordStr + $ordKey),16,36));

        }

        return $hash;
        
    }






    //
    // DECODE STRING
    //

    function decode( $string , $key = "0" ) {

    	$j=0; 

    	$hash="";

        $key = sha1($key);

        $strLen = strlen($string);

        $keyLen = strlen($key);

        for ($i = 0; $i < $strLen; $i+=2) {

            $ordStr = hexdec(base_convert(strrev(substr($string,$i,2)),36,16));

            if ($j == $keyLen)
                $j = 0;

            $ordKey = ord(substr($key,$j,1));

            $j++;

            $hash .= chr($ordStr - $ordKey);

        }

        return $hash;

    }





?>