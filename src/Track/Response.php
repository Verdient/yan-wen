<?php

declare(strict_types=1);

namespace Verdient\YanWen\Track;

use Verdient\http\Response as HttpResponse;
use Verdient\HttpAPI\AbstractResponse;
use Verdient\HttpAPI\Result;

/**
 * 响应
 * @author Verdient。
 */
class Response extends AbstractResponse
{
    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function normailze(HttpResponse $response): Result
    {
        $result = new Result();
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();
        if ($statusCode >= 200 && 300 > $statusCode) {
            if (isset($body['code'])) {
                $result->isOK = $body['code'] == 0;
            }
        }
        if ($result->isOK) {
            $result->data = $body;
        } else {
            $result->errorCode = $body['code'] ?? $statusCode;
            $result->errorMessage = $body['message'] ?? $response->getStatusMessage();
        }
        return $result;
    }
}
