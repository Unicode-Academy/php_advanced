<?php
namespace App\Middlewares;

use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

class RateLimitMiddleware implements IMiddleware
{

    public function handle(Request $request): void
    {
        $isRate = true;
        if ($isRate) {
            errorResponse(status: 429, message: "Rate Limit");
        }

    }
}
