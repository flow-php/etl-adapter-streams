<?php

declare(strict_types=1);

namespace Flow\ETL\Adapter\Stream\Flysystem;

use Aws\S3\S3Client;
use League\Flysystem\AwsS3V3\AwsS3V3Adapter;
use League\Flysystem\Filesystem;

final class AwsS3Stream extends AbstractStreamWrapper
{
    public const PROTOCOL = 'flow-aws-s3';

    public static function register() : void
    {
        if (!\in_array(self::PROTOCOL, stream_get_wrappers())) {
            \stream_wrapper_register(self::PROTOCOL, self::class);
        }
    }

    public function stream_open(string $path, string $mode, int $options, ?string &$opened_path): bool
    {
        $url = \parse_url($path);

        $options = stream_context_get_options($this->context);

        $adapter = new AwsS3V3Adapter(new S3Client($options[self::PROTOCOL]['client']), $url['host']);

        $this->stream = (new Filesystem($adapter))->readStream($url['path']);

        return true;
    }
}