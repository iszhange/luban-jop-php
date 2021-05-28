<?php
/**
 * https://union.jd.com/openplatform/api/v2?apiName=jd.union.open.promotion.bysubunionid.get
 *
 * 社交媒体获取的推广链接
 */
namespace LuBan\Jop\Requests;

use LuBan\Jop\Interfaces\Request;
use LuBan\Jop\Libs\RequestParamCheckUtil;

class JdUnionOpenPromotionBysubunionidGetRequest implements Request
{

    private $materialId; // 推广物料url，例如活动链接、商品链接等；不支持仅传入skuid

    private $subUnionId; // 子渠道标识，仅支持传入字母、数字、下划线或中划线，最多80个字符（不可包含空格），
                         // 该参数会在订单行查询接口中展示（需申请权限，申请方法请见https://union.jd.com/helpcenter/13246-13247-46301）

    private $positionId; // 推广位id

    private $pid; // 联盟子推客身份标识（不能传入接口调用者自己的pid）

    private $couponUrl; // 优惠券领取链接，在使用优惠券、商品二合一功能时入参，且materialId须为商品详情页链接

    private $chainType; // 转链类型，1：长链， 2 ：短链 ，3： 长链+短链，默认短链，短链有效期60天

    private $giftCouponKey; // 礼金批次号

    private $apiParas = [];


    public function setMaterialId($val)
    {
        $this->materialId = (string)$val;
        $this->apiParas['materialId'] = (string)$val;
    }

    public function setSubUnionId($val)
    {
        $this->subUnionId = (string)$val;
        $this->apiParas['subUnionId'] = (string)$val;
    }

    public function setPositionId($val)
    {
        $this->positionId = (int)$val;
        $this->apiParas['positionId'] = (int)$val;
    }

    public function setPid($val)
    {
        $this->pid = (string)$val;
        $this->apiParas['pid'] = (string)$val;
    }

    public function setCouponUrl($val)
    {
        $this->couponUrl = (string)$val;
        $this->apiParas['couponUrl'] = (string)$val;
    }

    public function setChainType($val)
    {
        $this->chainType = $val;
        $this->apiParas['chainType'] = $val;
    }

    public function setGiftCouponKey($val)
    {
        $this->giftCouponKey = (string)$val;
        $this->apiParas['giftCouponKey'] = (string)$val;
    }

    public function getVersion()
    {
        return '1.0';
    }

    public function getApiMethodName()
    {
        return 'jd.union.open.promotion.bysubunionid.get';
    }

    public function getApiParas()
    {
        if (!$this->apiParas)
            return '{}';

        return json_encode([
            'promotionCodeReq' => $this->apiParas,
        ], JSON_UNESCAPED_UNICODE);
    }

    public function check()
    {
        RequestParamCheckUtil::checkNotNull($this->materialId, "参数 materialId 必传");
    }

}