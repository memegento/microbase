<?php

declare(strict_types=1);

namespace Memegento\TestDi\Api;

interface MemeInterface
{
    public function memeIt(string $content): string;
}
