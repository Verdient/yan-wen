<?php

declare(strict_types=1);

namespace Verdient\YanWen\Track;

use Verdient\http\Request as HttpRequest;

/**
 * 请求
 * @author Verdient。
 */
class Request extends HttpRequest
{
    /**
     * @var string 请求秘钥
     * @author Verdient。
     */
    public $accessToken;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    public function send(): Response
    {
        $this->addHeader('Authorization', $this->accessToken);
        return new Response(parent::send());
    }
}
