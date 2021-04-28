<?php


namespace LuBan\Jop\Requests;

use LuBan\Jop\Interfaces\Request;

class JdUnionOpenGoodsQueryRequest implements Request
{

    private $cid1; // 一级类目id

    private $cid2; // 二级类目id

    private $cid3; // 三级类目id

    private $pageIndex; // 页码

    private $pageSize; // 每页数量，单页数最大30，默认20

    private $skuIds; // skuid集合(一次最多支持查询20个sku)，数组类型开发时记得加[]

    private $keyword; // 关键词，字数同京东商品名称一致，目前未限制

    private $pricefrom; // 商品券后价格下限

    private $priceto; // 商品券后价格上限

    private $commissionShareStart; // 佣金比例区间开始

    private $commissionShareEnd; // 佣金比例区间结束

    private $owner; // 商品类型：自营[g]，POP[p]

    private $sortName; // 排序字段(price：单价, commissionShare：佣金比例, commission：佣金， inOrderCount30Days：30天引单量，
    // inOrderComm30Days：30天支出佣金)

    private $sort; // asc,desc升降序,默认降序

    private $isCoupon; // 是否是优惠券商品，1：有优惠券

    private $isPG; // 是否是拼购商品，1：拼购商品，0：非拼购商品

    private $pingouPriceStart; // 拼购价格区间开始

    private $pingouPriceEnd; // 拼购价格区间结束

    private $brandCode; // 品牌code

    private $shopId; // 店铺Id

    private $hasContent; // 1：查询内容商品；其他值过滤掉此入参条件。

    private $hasBestCoupon; // 1：查询有最优惠券商品；其他值过滤掉此入参条件。（查询最优券需与isCoupon同时使用）

    private $pid; // 联盟id_应用iD_推广位id

    private $fields; // 支持出参数据筛选，逗号','分隔，目前可用：videoInfo(视频信息),hotWords(热词),similar(相似推荐商品),
    // documentInfo(段子信息),skuLabelInfo（商品标签）,promotionLabelInfo（商品促销标签）,stockState（商品库存）

    private $forbidTypes; // 10微信京东购物小程序禁售，11微信京喜小程序禁售

    private $jxFlags; // 京喜商品类型，1京喜、2京喜工厂直供、3京喜优选（包含3时可在京东APP购买），入参多个值表示或条件查询

    private $shopLevelFrom; // 支持传入0.0、2.5、3.0、3.5、4.0、4.5、4.9，默认为空表示不筛选评分

    private $isbn; // 图书编号

    private $spuId; // 主商品spuId

    private $couponUrl; // 优惠券链接

    private $deliveryType; // 京东配送 1：是，0：不是

    private $eliteType; // 资源位17：极速版商品

    private $isSeckill; // 是否秒杀商品。1：是

    private $apiParas = [];


    public function setCid1($val)
    {
        $this->cid1 = (int)$val;
        $this->apiParas['cid1'] = (int)$val;
    }

    public function setCid2($val)
    {
        $this->cid1 = (int)$val;
        $this->apiParas['cid2'] = (int)$val;
    }

    public function setCid3($val)
    {
        $this->cid1 = (int)$val;
        $this->apiParas['cid3'] = (int)$val;
    }

    public function setPageIndex($val)
    {
        $this->pageIndex = (int)$val;
        $this->apiParas['pageIndex'] = (int)$val;
    }

    public function setPageSize($val)
    {
        $this->pageSize = (int)$val;
        $this->apiParas['pageSize'] = (int)$val;
    }

    public function setSkuIds(array $val)
    {
        $this->skuIds = json_encode($val);
        $this->apiParas['skuIds'] = json_encode($val);
    }

    public function setKeyword($val)
    {
        $this->keyword = (string)$val;
        $this->apiParas['keyword'] = (string)$val;
    }

    public function setPriceFrom($val)
    {
        $this->pricefrom = (float)$val;
        $this->apiParas['pricefrom'] = (float)$val;
    }

    public function setPriceTo($val)
    {
        $this->priceto = (float)$val;
        $this->apiParas['priceto'] = (float)$val;
    }

    public function setCommissionShareStart($val)
    {
        $this->commissionShareStart = $val;
        $this->apiParas['commissionShareStart'] = $val;
    }

    public function setCommissionShareEnd($val)
    {
        $this->commissionShareEnd = $val;
        $this->apiParas['commissionShareEnd'] = $val;
    }

    public function setOwner($val)
    {
        $this->owner = (string)$val;
        $this->apiParas['owner'] = (string)$val;
    }

    public function setSortName($val)
    {
        $this->sortName = (string)$val;
        $this->apiParas['sortName'] = (string)$val;
    }

    public function setSort($val)
    {
        $this->sort = (string)$val;
        $this->apiParas['sort'] = (string)$val;
    }

    public function setIsCoupon($val)
    {
        $this->isCoupon = (int)$val;
        $this->apiParas['isCoupon'] = (int)$val;
    }

    public function setIsPG($val)
    {
        $this->isPG = (int)$val;
        $this->apiParas['isPG'] = (int)$val;
    }

    public function setPinGouPriceStart($val)
    {
        $this->pingouPriceStart = (float)$val;
        $this->apiParas['pingouPriceStart'] = (float)$val;
    }

    public function setPinGouPriceEnd($val)
    {
        $this->pingouPriceEnd = (float)$val;
        $this->apiParas['pingouPriceEnd'] = (float)$val;
    }

    public function setBrandCode($val)
    {
        $this->brandCode = (string)$val;
        $this->apiParas['brandCode'] = (string)$val;
    }

    public function setShopId($val)
    {
        $this->shopId = (int)$val;
        $this->apiParas['shopId'] = (int)$val;
    }

    public function setHasContent($val)
    {
        $this->hasContent = (int)$val;
        $this->apiParas['hasContent'] = (int)$val;
    }

    public function setHasBestCoupon($val)
    {
        $this->hasBestCoupon = (int)$val;
        $this->apiParas['hasBestCoupon'] = (int)$val;
    }

    public function setPid($val)
    {
        $this->pid = (string)$val;
        $this->apiParas['pid'] = (string)$val;
    }

    public function setFields($val)
    {
        $this->fields = (string)$val;
        $this->apiParas['fields'] = (string)$val;
    }

    public function setForbidTypes($val)
    {
        $this->forbidTypes = (string)$val;
        $this->apiParas['forbidTypes'] = (string)$val;
    }

    public function setJxFlags(array $val)
    {
        $this->jxFlags = json_encode($val);
        $this->apiParas['jxFlags'] = json_encode($val);
    }

    public function setShopLevelFrom($val)
    {
        $this->shopLevelFrom = (float)$val;
        $this->apiParas['shopLevelFrom'] = (float)$val;
    }

    public function setIsbn($val)
    {
        $this->isbn = (string)$val;
        $this->apiParas['isbn'] = (string)$val;
    }

    public function setSpuId($val)
    {
        $this->spuId = (int)$val;
        $this->apiParas['spuId'] = (int)$val;
    }

    public function setCouponUrl($val)
    {
        $this->couponUrl = (string)$val;
        $this->apiParas['couponUrl'] = (string)$val;
    }

    public function setDeliveryType($val)
    {
        $this->deliveryType = (int)$val;
        $this->apiParas['deliveryType'] = (int)$val;
    }

    public function setEliteType(array $val)
    {
        $this->eliteType = json_encode($val);
        $this->apiParas['eliteType'] = json_encode($val);
    }

    public function setIsSecKill($val)
    {
        $this->isSeckill = (int)$val;
        $this->apiParas['isSeckill'] = (int)$val;
    }

    public function getVersion()
    {
        return '1.0';
    }

    public function getApiMethodName()
    {
        return 'jd.union.open.goods.query';
    }

    public function getApiParas()
    {
        if (!$this->apiParas)
            return '{}';
        
        return json_encode([
            'goodsReqDTO' => $this->apiParas,
        ], JSON_UNESCAPED_UNICODE);
    }

    public function check()
    {

    }

}