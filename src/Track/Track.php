<?php

namespace Verdient\YanWen\Track;

use Verdient\HttpAPI\AbstractClient;

/**
 * 物流追踪
 * @author Verdient。
 */
class Track extends AbstractClient
{
    /**
     * @var string 授权秘钥
     * @author Verdient。
     */
    public $accessToken;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    public $request = Request::class;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    public function request($path): Request
    {
        /** @var Request */
        $request = parent::request($path);
        $request->accessToken = $this->accessToken;
        return $request;
    }
}
