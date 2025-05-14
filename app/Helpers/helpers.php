<?php
use Illuminate\Support\Facades\Crypt;

if (!function_exists('encrypt_id')) {
    function encrypt_id($id)
    {
        return Crypt::encryptString($id);
    }
}

if (!function_exists('decrypt_id')) {
    function decrypt_id($encryptedId)
    {
        try {
            return Crypt::decryptString($encryptedId);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            return null;
        }
    }
}
?>