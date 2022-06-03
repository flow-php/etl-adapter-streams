# ETL Adapter: Streams

[![Minimum PHP Version](https://img.shields.io/badge/php-~8.1-8892BF.svg)](https://php.net/)

## Description

ETL Adapter that provides streams implementation to support remote files.  

Following protocols are supported
- `flow-aws-s3` - implementations: [Flysystem](https://flysystem.thephpleague.com/docs/)
- `flow-azure-blob` - implementations: [Flysystem](https://flysystem.thephpleague.com/docs/)

## Usage

### Local

```php 

use Flow\ETL\DSL\Stream;

$localFile = Stream::local_file("./some.json");
$localFiles = Stream::local_directory("./nested/directory", "json");

```

### Flysystem - AWS S3 

Before using Azure AWS S3 stream please install dependencies:

```
composer require league/flysystem
composer require league/flysystem-aws-s3-v3
```

```php

use Flow\ETL\DSL\Stream;

$s3_client_option = [
    'credentials' => [
        'key' => '...',
        'secret' => '...',
    ],
    'region' => 'eu-west-2',
    'version' => 'latest',
];

$remoteFile = Stream::aws_s3_file('flow-php', 'dataset.json', $s3_client_option);
$remoteFiles = Stream::aws_s3_directory('flow-php', 'folder', 'json', $s3_client_option);
```

### Flysystem - Azure Blob 

Before using Azure AWS S3 stream please install dependencies:

```
composer require league/flysystem
composer require league/flysystem-azure-blob-storage
```

```php

use Flow\ETL\DSL\Stream;

$azure_blob_connection_string = 'DefaultEndpointsProtocol=https;AccountName=...;AccountKey=...';


$remoteFile = Stream::azure_blob_file('flow-php', 'dataset.json', $azure_blob_connection_string);
$remoteFiles = Stream::azure_blob_directory('flow-php', 'folder', 'json', $azure_blob_connection_string);

```

## Development

In order to install dependencies please, launch following commands:

```bash
composer install
```

## Run Tests

In order to execute full test suite, please launch following command:

```bash
composer build
```

It's recommended to use [pcov](https://pecl.php.net/package/pcov) for code coverage however you can also use
xdebug by setting `XDEBUG_MODE=coverage` env variable.
