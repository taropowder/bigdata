<?php
/**
 * Created by PhpStorm.
 * User: linlhf
 * Date: 2018/7/14
 * Time: 20:28
 */

function encrypt($sStr){
    $key = md5('bigdata');
    $decrypted = openssl_encrypt($sStr,'AES-256-ECB',$key,OPENSSL_RAW_DATA);
    return base64_encode($decrypted);
}

function decrypt($sStr){
    $key = md5('bigdata');
    $decrypted = openssl_decrypt(base64_decode($sStr), 'AES-256-ECB', $key,OPENSSL_RAW_DATA);
    return $decrypted;
}
//    $data=encrypt('123123');
//    var_dump($data);
//    $res = decrypt($data);
//    var_dump($res);

?>
