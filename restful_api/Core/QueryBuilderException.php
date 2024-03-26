<?php
namespace Requtize\QueryBuilder\Exception;

use Exception as BaseException;

class Exception extends BaseException
{
    public function __construct($message, $code, $previous)
    {
        parent::__construct($message);
    }
}
