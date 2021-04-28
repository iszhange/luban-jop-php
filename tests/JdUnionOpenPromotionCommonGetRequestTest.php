<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use LuBan\Jop\Client;
use LuBan\Jop\Requests\JdUnionOpenPromotionCommonGetRequest;

final class JdUnionOpenPromotionCommonGetRequestTest extends TestCase
{

    public function testRequest()
    {
        list($appkey, $secret, $siteId) = include __DIR__ . '/configs.php';

        $c = new Client();
        $c->appKey = $appkey;
        $c->appSecret = $secret;
        $req = new JdUnionOpenPromotionCommonGetRequest();
        $req->setMaterialId('https://item.jd.com/100017745496.html');
        $req->setSiteId($siteId);
        $req->setPositionId('9999');
        $result = $c->execute($req);
        var_dump($result);
        $this->assertArrayHasKey('jd_union_open_promotion_common_get_responce', $result);

    }

}