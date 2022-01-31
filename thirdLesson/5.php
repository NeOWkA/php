<?php
function replace($input)
{
    $result = str_replace(" ", "_", $input);
    return $result;
}
echo replace("Привет,   м  и р!");