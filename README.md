# luban-top (PHP)
鲁班·京东开放平台SDK

#### 使用示例
```php
require __DIR__ . '/vendor/autoload.php';

use LuBan\Top\Client;
use LuBan\Top\Requests\TbkItemInfoGetRequest;

$c = new Client();
$c->appKey = "You're appkey";
$c->secretKey = "You're appSecret";
$req = new TbkItemInfoGetRequest();
$req->setNumIids('627565398166');
$result = $c->execute($req);
var_dump($result);
```

#### 贡献代码
如果你想要参与代码开发请`fork`本项目，然后发起`pull request`。在通过代码检查和tests之后会将请求合并到主分支

#### 参考文档
- [京东开放平台](https://union.jd.com/openplatform/api/v2)