<?php
namespace System\Core;

class Transformer
{
    public function __construct($resources)
    {
        $attributes = get_object_vars($resources);
        foreach ($attributes as $key => $value) {
            $this->{$key} = $value;
        }

    }
}