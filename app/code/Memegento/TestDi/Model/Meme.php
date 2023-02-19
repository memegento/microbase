<?php

declare(strict_types=1);

namespace Memegento\TestDi\Model;

use Memegento\TestDi\Api\MemeInterface;

class Meme implements MemeInterface
{
    public function memeIt(string $content): string
    {
        return sprintf(
          '<strong>%s</strong> from inside <strong>%s</strong>',
          $content,
            __CLASS__
        );
    }
}
