https://github.com/php-opencloud/openstack/issues/292

## Setup
```shell script
composer install
cp .env .env.local && nano .env.local
nano common.php # if you need a different configuration
```

## Usage

#### Regular download
```shell script
php download_object.php
```

#### Tentative with Guzzle's `'stream'` option
```shell script
php download_object_stream_bug.php
```

#### Fix to make Guzzle's `'stream'` option working
```shell script
php download_object_stream_fixed.php
```
