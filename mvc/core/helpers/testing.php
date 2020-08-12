<?php
function dd($array, $array2 = null, $stop = true)
{
    echo "<pre>";
    var_dump($array);
    echo "</pre>";
    if ($stop) {
        exit();
    }
};
