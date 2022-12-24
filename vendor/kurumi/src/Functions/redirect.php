<?php

function redirect(string $path, array $flash = [])
{
    !empty($flash) ? false :
        header("location: {$path}");
}
