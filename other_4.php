<?php
require('customCurl.php');

CustomCurl::setCurlOptConf(CURLOPT_SSL_VERIFYPEER, true);   // CURLOPT_SSL_VERIFYPEER，默认值 False
CustomCurl::setCurlOptConf(CURLOPT_SSL_VERIFYHOST, true);   // CURLOPT_SSL_VERIFYHOST，默认值 False
CustomCurl::setCurlOptConf(CURLOPT_ENCODING, 'gzip');       // CURLOPT_ENCODING，默认值 ''
// 以上为所有可修改的全局 CurlOpt 配置项

$curlObj0 = CustomCurl::init('http://lab.imjs.work/server.php')
            ->setCurlOpt(CURLOPT_ENCODING, '') // 在当前会话中覆盖预设值
            ->exec();

if ($curlObj0->getStatus()) {
    var_dump($curlObj0->getHeader(), $curlObj0->getCookies(), $curlObj0->getBody(), $curlObj0->getInfo());
} else {
    var_dump($curlObj0->getCurlErrNo());
}

$curlObj1 = CustomCurl::init('http://lab.imjs.work/server.php')->exec();

if ($curlObj1->getStatus()) {
    var_dump($curlObj1->getHeader(), $curlObj1->getCookies(), $curlObj1->getBody(), $curlObj1->getInfo());
} else {
    var_dump($curlObj1->getCurlErrNo());
}

CustomCurl::resetCurlOptConf(CURLOPT_ENCODING); // 恢复 CURLOPT_ENCODING 为默认值

$curlObj2 = CustomCurl::init('http://lab.imjs.work/server.php')->exec();

if ($curlObj2->getStatus()) {
    var_dump($curlObj2->getHeader(), $curlObj2->getCookies(), $curlObj2->getBody(), $curlObj2->getInfo());
} else {
    var_dump($curlObj2->getCurlErrNo());
}

CustomCurl::resetCurlOptConf(); // 恢复全部 CurlOpt 配置为默认值

$curlObj3 = CustomCurl::init('http://lab.imjs.work/server.php')->exec();

if ($curlObj3->getStatus()) {
    var_dump($curlObj3->getHeader(), $curlObj3->getCookies(), $curlObj3->getBody(), $curlObj3->getInfo());
} else {
    var_dump($curlObj3->getCurlErrNo());
}