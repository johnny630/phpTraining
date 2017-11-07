<?php

$hash_string = 'test';

$hash = hash('SHA384', $hash_string , true);
echo $hash .PHP_EOL;
$app_cc_aes_key = substr($hash, 0, 32);
echo $app_cc_aes_key .PHP_EOL;
$app_cc_aes_iv = substr($hash, 32, 16);
echo $app_cc_aes_iv .PHP_EOL;

$data = 'cola is bear';

$padding = 16 - (strlen($data) % 16);
$data .= str_repeat(chr($padding), $padding);
$encrypt = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $app_cc_aes_key, $data, MCRYPT_MODE_CBC, $app_cc_aes_iv);

$encrypt_text = base64_encode($encrypt);

echo $encrypt_text . PHP_EOL;