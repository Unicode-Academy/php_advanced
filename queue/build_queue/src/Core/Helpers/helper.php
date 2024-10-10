<?php
function dispatch($job) {}

function env($key)
{
    return $_ENV[$key] ?? null;
}
