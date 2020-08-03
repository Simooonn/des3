<?php
namespace HashyooDes3;

/**
 * Class Des3
 * @package des3
 */
class DES3 {
    /**
     * @var string
     */
    var $key = '';

    /**
     * @var string
     */
    var $iv = '';

    /**
     * DES3 constructor.
     *
     * @param \HashyooDes3\string|null $key
     * @param \HashyooDes3\string|null $iv
     *
     * @throws \Exception
     */
    public function __construct(string $key=null, string $iv=null)
    {
        if(!is_null($key)){
            $this->key = $key;
        }
        if(!is_null($iv)){
            $this->iv = $iv;
        }

        if (strlen($this->key) != 24){
            throw new \Exception("DES3_KEY长度错误，长度为24");
        }
        if (strlen($this->iv) != 8){
            throw new \Exception("DES3_IV长度错误，长度为8");
        }

    }

    public function encrypt($input, $key='', $iv=''){
        $this->key = $key ? $key : $this->key;
		$this->iv = $iv ? $iv : $this->iv;
        return base64_encode(openssl_encrypt($input, "des-ede3-cbc", $this->key, OPENSSL_RAW_DATA, $this->iv));
    }

    public function decrypt($encrypted, $key='', $iv=''){
        $this->key = $key ? $key : $this->key;
		$this->iv = $iv ? $iv : $this->iv;
        return openssl_decrypt(base64_decode($encrypted), 'des-ede3-cbc', $this->key, OPENSSL_RAW_DATA, $this->iv);
    }

}
