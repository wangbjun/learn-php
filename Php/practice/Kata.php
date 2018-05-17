<?php

function duplicate_encode(string $word): string
{
    $res = '';
    for ($i = 0, $count = strlen($word); $i < $count; $i++) {
        if (substr_count($word, $word[$i]) == 1) {
            $res .= '(';
            continue;
        }
        $res .= ')';
    }

    return $res;
}

var_dump(duplicate_encode("What is you and you?"));
