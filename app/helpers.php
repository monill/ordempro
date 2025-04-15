<?php

if (!function_exists('md5_gen')) {
    function md5_gen() {
        return md5(uniqid() . time() . microtime());
    }
}

if (!function_exists('is_enabled')) {
    function is_enabled($status) {
        return $status == 1 ? '<span class="badge badge-light-success">Ativado</span>' : '<span class="badge badge-light-warning">Desativado</span>';
    }
}
