<?php
/**
 * https://union.jd.com/openplatform/api/v2?apiName=jd.union.open.promotion.common.get
 *
 * 网站/APP来获取的推广链接
 */
namespace LuBan\Jop\Requests;

use LuBan\Jop\Interfaces\Request;
use LuBan\Jop\Libs\RequestParamCheckUtil;

class JdUnionOpenPromotionCommonGetRequest implements Request
{

    private $materialId; // 推广物料url，例如活动链接、商品链接等；不支持仅传入skuid

    private $siteId; // 网站ID/APP ID，入口：京东联盟-推广管理-网站管理/APP管理-查看网站ID/APP ID
                     // （1、接口禁止使用导购媒体id入参；2、投放链接的网址或应用必须与传入的网站ID/AppID备案一致，否则订单会判“无效-来源与备案网址不符”）

    private $positionId; // 推广位id

    private $subUnionId; // 子渠道标识，仅支持传入字母、数字、下划线或中划线，最多80个字符（不可包含空格），
                         // 该参数会在订单行查询接口中展示（需申请权限，申请方法请见https://union.jd.com/helpcenter/13246-13247-46301）

    private $ext1; // 系统扩展参数（需申请权限，申请方法请见https://union.jd.com/helpcenter/13246-13247-46301），最多支持40字符，
                   // 参数会在订单行查询接口中展示

    private $pid; // 联盟子推客身份标识（不能传入接口调用者自己的pid）

    private $couponUrl; // 优惠券领取链接，在使用优惠券、商品二合一功能时入参，且materialId须为商品详情页链接

    private $giftCouponKey; // 礼金批次号

    private $apiParas = [];


    public function setMaterialId($val)
    {
        $this->materialId = (string)$val;
        $this->apiParas['materialId'] = (string)$val;
    }

    public function setSiteId($val)
    {
        $this->siteId = (string)$val;
        $this->apiParas['siteId'] = (string)$val;
    }

    public function setPositionId($val)
    {
        $this->positionId = (int)$val;
        $this->apiParas['positionId'] = (int)$val;
    }

    public function setSubUnionId($val)
    {
        $this->subUnionId = (string)$val;
        $this->apiParas['subUnionId'] = (string)$val;
    }

    public function setExt1($val)
    {
        $this->ext1 = (string)$val;
        $this->apiParas['ext1'] = (string)$val;
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
        return 'jd.union.open.promotion.common.get';
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
        RequestParamCheckUtil::checkNotNull($this->siteId, "参数 siteId 必传");
    }

}