<?php

require './common.php';

$openstack = createOpenStack(true);

$objectStore = $openstack->objectStoreV1([
    'identityService' => $openstack->identityV2(),
]);

testDownload($objectStore);
