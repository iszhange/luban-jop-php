<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use LuBan\Jop\Client;
use LuBan\Jop\Requests\JdUnionOpenGoodsQueryRequest;

final class JdUnionOpenGoodsQueryRequestTest extends TestCase
{

    public function testRequest()
    {
        list($appkey, $secret) = include __DIR__ . '/configs.php';

        $c = new Client();
        $c->appKey = $appkey;
        $c->appSecret = $secret;
        $req = new JdUnionOpenGoodsQueryRequest();
        $req->setKeyword('上衣');
        $result = $c->execute($req);
        var_dump($result);
        $this->assertArrayHasKey('jd_union_open_goods_query_responce', $result);

    }

}