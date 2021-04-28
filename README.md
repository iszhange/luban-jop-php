# luban-top (PHP)
鲁班·京东开放平台SDK

#### 使用示例
```php
require __DIR__ . '/vendor/autoload.php';

use LuBan\Jop\Client;
use LuBan\Jop\Requests\JdUnionOpenGoodsQueryRequest;

$c = new Client();
$c->appKey = "You're appkey";
$c->appSecret = "You're appSecret";
$req = new JdUnionOpenGoodsQueryRequest();
$req->setKeyword('上衣');
$result = $c->execute($req);
var_dump($result);
```

#### 贡献代码
如果你想要参与代码开发请`fork`本项目，然后发起`pull request`。在通过代码检查和tests之后会将请求合并到主分支

#### 参考文档
- [京东开放平台](https://union.jd.com/openplatform/api/v2)