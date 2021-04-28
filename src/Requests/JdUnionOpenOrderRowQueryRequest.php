<?php
/**
 * https://union.jd.com/openplatform/api/v2?apiName=jd.union.open.order.row.query
 *
 * 查询推广订单及佣金信息
 */
namespace LuBan\Jop\Requests;

use LuBan\Jop\Interfaces\Request;
use LuBan\Jop\Libs\RequestParamCheckUtil;

class JdUnionOpenOrderRowQueryRequest implements Request
{

    private $pageIndex; // 页码

    private $pageSize; // 每页包含条数，上限为500

    private $type; // 订单时间查询类型(1：下单时间，2：完成时间（购买用户确认收货时间），3：更新时间

    private $startTime; // 开始时间 格式yyyy-MM-dd HH:mm:ss，与endTime间隔不超过1小时

    private $endTime; // 结束时间 格式yyyy-MM-dd HH:mm:ss，与startTime间隔不超过1小时

    private $childUnionId; // 子推客unionID，传入该值可查询子推客的订单，注意不可和key同时传入。（需联系运营开通PID权限才能拿到数据）

    private $key; // 工具商传入推客的授权key，可帮助该推客查询订单，注意不可和childUnionid同时传入。（需联系运营开通工具商权限才能拿到数据）

    private $fields; // 支持出参数据筛选，逗号','分隔，目前可用：goodsInfo（商品信息）,categoryInfo(类目信息）

    private $apiParas = [];


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

    public function setType($val)
    {
        $this->type = (int)$val;
        $this->apiParas['type'] = (int)$val;
    }

    public function setStartTime($val)
    {
        $this->startTime = (string)$val;
        $this->apiParas['startTime'] = (string)$val;
    }

    public function setEndTime($val)
    {
        $this->endTime = (string)$val;
        $this->apiParas['endTime'] = (string)$val;
    }

    public function setChildUnionId($val)
    {
        $this->childUnionId = (int)$val;
        $this->apiParas['childUnionId'] = (int)$val;
    }

    public function setKey($val)
    {
        $this->key = (string)$val;
        $this->apiParas['key'] = (string)$val;
    }

    public function setFields($val)
    {
        $this->fields = (string)$val;
        $this->apiParas['fields'] = (string)$val;
    }

    public function getVersion()
    {
        return '1.0';
    }

    public function getApiMethodName()
    {
        return 'jd.union.open.order.row.query';
    }

    public function getApiParas()
    {
        if (!$this->apiParas)
            return '{}';

        return json_encode([
            'orderReq' => $this->apiParas,
        ], JSON_UNESCAPED_UNICODE);
    }

    public function check()
    {
        RequestParamCheckUtil::checkNotNull($this->pageIndex, "参数 pageIndex 必传");
        RequestParamCheckUtil::checkNotNull($this->pageSize, "参数 pageSize 必传");
        RequestParamCheckUtil::checkNotNull($this->type, "参数 type 必传");
        RequestParamCheckUtil::checkNotNull($this->startTime, "参数 startTime 必传");
        RequestParamCheckUtil::checkNotNull($this->endTime, "参数 endTime 必传");
    }

}