<?php

require './common.php';

$openstack = createOpenStack();

$objectStore = $openstack->objectStoreV1([
    'identityService' => $openstack->identityV2(),
]);

testDownload($objectStore);
