<?php
include ("class/CryptAES.php");
$testCode = "johnny";

$aes = new CryptAES();
$aes->set_key ( $aes->hex2bin("1234"));
$aes->require_pkcs5();
$encrypt_val = $aes->encrypt($testCode);
echo $encrypt_val . PHP_EOL;
$decrypt_val = $aes->decrypt($encrypt_val);
echo $decrypt_val . PHP_EOL;

