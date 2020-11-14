<?php

if (!function_exists('generate_token')) {

    function generate_token() {
        return $_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
    }

}

if (!function_exists('verify_token')) {

    function verify_token($token) {
        if (isset($_SESSION['token']) && $token === $_SESSION['token']) {
            unset($_SESSION['token']);
            return true;
        }
        return false;
    }

}
//Added only as note, don't used here