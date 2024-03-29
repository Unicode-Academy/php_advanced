<?php
namespace App\Middlewares;

use App\Models\RateLimit;
use App\Models\RequestLog;
use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

class RateLimitMiddleware implements IMiddleware
{

    public function handle(Request $request): void
    {
        $this->addRequest();
        $this->updateRateLimit();

        $rateLimitModel = new RateLimit();
        $ip = request()->getIp();
        $rateLimit = $rateLimitModel->find($ip);
        if ($rateLimit->request_number >= 10) {
            $this->resetRateLimit();
        }

        echo $rateLimit->request_number;

        // $isRate = true;
        // if ($isRate) {
        //     errorResponse(status: 429, message: "Rate Limit");
        // }
    }

    private function addRequest()
    {
        $ip = request()->getIp();
        $requestLogModel = new RequestLog();
        $requestLogModel->create([
            'ip_address' => $ip,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

    private function updateRateLimit()
    {
        $ip = request()->getIp();
        $requestLogModel = new RequestLog();
        $count = $requestLogModel->getCount($ip);
        $rateLimitModel = new RateLimit();
        $rateLimitModel->update($ip, [
            'ip_address' => $ip,
            'request_number' => $count,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

    private function resetRateLimit()
    {
        $requestLogModel = new RequestLog();
        $rateLimitModel = new RateLimit();
        $ip = request()->getIp();
        $requestLogModel->delete($ip);
        $rateLimitModel->delete($ip);
    }
}