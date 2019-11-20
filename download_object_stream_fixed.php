<?php

require './common.php';

$openstack = createOpenStack();
$streamedOpenstack = createOpenStack(true);

$objectStore = $streamedOpenstack->objectStoreV1([
    'identityService' => $openstack->identityV2(),
]);

testDownload($objectStore);
