<?php
/**
 * CryptAES class: copy from http://bluehua.org/2010/03/20/1039.html
 *
 * 使用 PHP 內建的 mcrypt 對稱式加密演算法（加解密用同一把秘密金鑰），來加解密敏感資料。
 *
 * 支援AES / ECB / PKCS5 Padding加解密
 *
 * <samp>
 * // 解密 
 * require ("CryptAES.php");
 *
 * $encStr = "DD30ADAE7E7941274482B64A32E632A4163B5930FD9192990DEFF8B8CFE7125B";
 * $key = "5A54516870797A3765584658544A5070";
 *
 * $aes = new CryptAES();
 * $aes->set_key ($aes->hex2bin($key));
 * $aes->require_pkcs5();
 * echo str_replace ("\x00", "", $aes->decrypt($encStr)); # Result is 0988303906
 * </samp>
 *
 * - Dependence:
 *      PHP build-in Mcrypt Encryption Functions.
 *
 * - Reference:
 *      DoubleService EIP
 *      Website: http://eip.doubleservice.com/smf/index.php?topic=4946.msg15055#msg15055
 *
 *      php實現AES/ECB/PKCS5Padding加密
 *      http://bluehua.org/2010/03/20/1039.html
 *
 * @since     PHP 5
 * @author    Kang-Min Fan <kmfung@doubleservice.com>
 * @copyright Copyright (c) 2010- DoubleService.com
 * @version   1.0
 *
 * - Change Log:
 *      1.0:    2010/06/01 - Initial release.
 */
 
class CryptAES
{
    protected $cipher     = MCRYPT_RIJNDAEL_128;
    protected $mode       = MCRYPT_MODE_ECB;
    protected $pad_method = NULL;
    protected $secret_key = '';
    protected $iv         = ''; 
    
    public function set_cipher($cipher)
    {
        $this->cipher = $cipher; 
    }

    public function set_mode($mode)
    {
        $this->mode = $mode;
    }

    public function set_iv($iv)
    {
        $this->iv = $iv;
    }
    
    public function set_key($key)
    {
        $this->secret_key = $key;
    }
    
    public function require_pkcs5()
    {
        $this->pad_method = 'pkcs5';
    }

    protected function pad_or_unpad($str, $ext)
    {
        if ( is_null($this->pad_method) )
        {
            return $str;
        }
        else 
        {
            $func_name = __CLASS__ . '::' . $this->pad_method . '_' . $ext . 'pad';
            if ( is_callable($func_name) )
            {
                $size = mcrypt_get_block_size($this->cipher, $this->mode);
                return call_user_func($func_name, $str, $size);
            }
        }

        return $str; 
    }

    protected function pad($str)
    {
        return $this->pad_or_unpad($str, ''); 
    }

    protected function unpad($str)
    {
        return $this->pad_or_unpad($str, 'un'); 
    }

    public function encrypt($str)
    {
        $str = $this->pad($str);
        $td = mcrypt_module_open($this->cipher, '', $this->mode, '');

        if ( empty($this->iv) )
        {
            $iv = @mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
        }
        else
        {
            $iv = $this->iv;
        }

        mcrypt_generic_init($td, $this->secret_key, $iv);
        $cyper_text = mcrypt_generic($td, $str);
        $rt = bin2hex($cyper_text);
        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);

        return $rt;
    } 
    
    public function decrypt($str){
        $td = mcrypt_module_open($this->cipher, '', $this->mode, '');

        if ( empty($this->iv) )
        {
            $iv = @mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
        }
        else
        {
            $iv = $this->iv;
        }
        
        mcrypt_generic_init($td, $this->secret_key, $iv);
        $decrypted_text = mdecrypt_generic($td, self::hex2bin($str));
        $rt = $decrypted_text;
        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);

        return $this->unpad($rt);
    }
 
    public static function hex2bin($hexdata) {
        $bindata = '';
        $length = strlen($hexdata); 
        for ($i=0; $i < $length; $i += 2)
        {
            $bindata .= chr(hexdec(substr($hexdata, $i, 2)));
        }
        return $bindata;
    }

    public static function pkcs5_pad($text, $blocksize)
    {
        $pad = $blocksize - (strlen($text) % $blocksize);
        return $text . str_repeat(chr($pad), $pad);
    }

    public static function pkcs5_unpad($text)
    {
        $pad = ord($text{strlen($text) - 1});
        if ($pad > strlen($text)) return false;
        if (strspn($text, chr($pad), strlen($text) - $pad) != $pad) return false;
        return substr($text, 0, -1 * $pad);
    }
}
?>
