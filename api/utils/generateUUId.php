<?php

function generateUUID(int $id,$symb): string
{
    return $symb . str_pad($id, 4, '0', STR_PAD_LEFT);
}

?>