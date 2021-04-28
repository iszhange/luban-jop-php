<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use LuBan\Jop\Client;
use LuBan\Jop\Requests\JdUnionOpenOrderRowQueryRequest;

final class JdUnionOpenOrderRowQueryRequestTest extends TestCase
{

    public function testRequest()
    {
        list($appkey, $secret) = include __DIR__ . '/configs.php';
        $startAt = time() - 3600 * 30;

        $c = new Client();
        $c->appKey = $appkey;
        $c->appSecret = $secret;
        $req = new JdUnionOpenOrderRowQueryRequest();
        $req->setPageIndex(1);
        $req->setPageSize(20);
        $req->setType(1);
        $req->setStartTime(date('Y-m-d H:i:00', $startAt));
        $req->setEndTime(date('Y-m-d H:i:00', $startAt + 3500));
        $result = $c->execute($req);
        var_dump($result);
        $this->assertArrayHasKey('jd_union_open_order_row_query_responce', $result);

    }

}