<?php
if (!function_exists('fechaActual')) {
    function fechaActual($format)
    {
        return date($format);
    }
}

if (!function_exists('setActivo')) {
    function setActivo($nombreRuta)
    {
        return request()->routeIs($nombreRuta) ? 'active' : '';
    }
}
?>