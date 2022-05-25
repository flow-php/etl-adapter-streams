<?php declare(strict_types=1);

namespace Flow\ETL\Adapter\Stream\Flysystem;

interface LocalBuffer
{
    public function write(string $data) : void;

    /**
     * @return resource
     */
    public function stream();

    public function release() : void;
}
