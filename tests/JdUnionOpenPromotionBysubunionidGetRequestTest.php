<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use LuBan\Jop\Client;
use LuBan\Jop\Requests\JdUnionOpenPromotionBysubunionidGetRequest;

final class JdUnionOpenPromotionBysubunionidGetRequestTest extends TestCase
{

    public function testRequest()
    {
        list($appkey, $secret) = include __DIR__ . '/configs.php';

        $c = new Client();
        $c->appKey = $appkey;
        $c->appSecret = $secret;
        $req = new JdUnionOpenPromotionBysubunionidGetRequest();
        $req->setMaterialId('https://item.jd.com/100017745496.html');
        $req->setPositionId('9999');
        $req->setChainType(3);
        $result = $c->execute($req);
        var_dump($result);
        $this->assertArrayHasKey('jd_union_open_promotion_bysubunionid_get_responce', $result);

    }

}