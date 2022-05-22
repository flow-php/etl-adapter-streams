<?php

declare(strict_types=1);

namespace Flow\ETL\Adapter\Stream\Flysystem;

use Flow\ETL\Exception\RuntimeException;
use Flow\ETL\Stream\StreamWrapper;

abstract class AbstractStreamWrapper implements StreamWrapper
{
    /**
     * @var resource|null
     */
    protected $stream = null;

    public function dir_closedir(): bool
    {
        throw new RuntimeException(__METHOD__ . ' not implemented');
    }

    public function dir_opendir(string $path, int $options): bool
    {
        throw new RuntimeException(__METHOD__ . ' not implemented');
    }

    public function dir_readdir(): string
    {
        throw new RuntimeException(__METHOD__ . ' not implemented');
    }

    public function dir_rewinddir(): bool
    {
        throw new RuntimeException(__METHOD__ . ' not implemented');
    }

    public function mkdir(string $path, int $mode, int $options): bool
    {
        throw new RuntimeException(__METHOD__ . ' not implemented');
    }

    public function rename(string $path_from, string $path_to): bool
    {
        throw new RuntimeException(__METHOD__ . ' not implemented');
    }

    public function rmdir(string $path, int $options): bool
    {
        throw new RuntimeException(__METHOD__ . ' not implemented');
    }

    public function stream_cast(int $cast_as)
    {
        throw new RuntimeException(__METHOD__ . ' not implemented');
    }

    public function stream_close(): void
    {
        \fclose($this->stream);
    }

    public function stream_read(int $count): string|false
    {
        return \fread($this->stream, $count);
    }

    public function stream_eof(): bool
    {
        return \feof($this->stream);
    }

    public function stream_flush(): bool
    {
        throw new RuntimeException(__METHOD__ . ' not implemented');
    }

    public function stream_lock(int $operation): bool
    {
        return \flock($this->stream, $operation);
    }

    public function stream_metadata(string $path, int $option, mixed $value): bool
    {
        throw new RuntimeException(__METHOD__ . ' not implemented');
    }

    public function stream_seek(int $offset, int $whence = SEEK_SET): bool
    {
        throw new RuntimeException(__METHOD__ . ' not implemented');
    }

    public function stream_set_option(int $option, int $arg1, int $arg2): bool
    {
        throw new RuntimeException(__METHOD__ . ' not implemented');
    }

    public function stream_stat(): array|false
    {
        return \fstat($this->stream);
    }

    public function stream_tell(): int
    {
        return (int) \ftell($this->stream);
    }

    public function stream_truncate(int $new_size): bool
    {
        throw new RuntimeException(__METHOD__ . ' not implemented');
    }

    public function stream_write(string $data): int
    {
        return \fwrite($this->stream, $data);
    }

    public function unlink(string $path): bool
    {
        throw new RuntimeException(__METHOD__ . ' not implemented');
    }

    public function url_stat(string $path, int $flags): array|false
    {
        throw new RuntimeException(__METHOD__ . ' not implemented');
    }
}