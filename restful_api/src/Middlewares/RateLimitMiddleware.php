<?php
namespace App\Middlewares;

use App\Models\RateLimit;
use App\Models\RequestLog;
use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

class RateLimitMiddleware implements IMiddleware
{
    private $requestNumber;
    private $requestPer;
    public function __construct()
    {
        $this->requestNumber = env('RATE_LIMIT_REQUEST');
        $this->requestPer = env('RATE_LIMIT_PER');
    }
    public function handle(Request $request): void
    {

        $rateLimitModel = new RateLimit();
        $ip = request()->getIp();
        $rateLimit = $rateLimitModel->find($ip);

        if ($rateLimit && $rateLimit->request_number >= $this->requestNumber) {
            $seconds = time() - strtotime($rateLimit->start_time);
            if ($seconds >= $this->requestPer) {
                $this->resetRateLimit();
            } else {
                errorResponse(status: 429, message: "Rate Limit");
            }
        } else {
            $this->addRequest();
            $this->updateRateLimit();
        }
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
