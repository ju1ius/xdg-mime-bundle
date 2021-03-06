<?php declare(strict_types=1);

namespace ju1ius\XdgMimeBundle\Mime;

use ju1ius\XdgMime\MimeDatabaseInterface;
use Symfony\Component\Mime\MimeTypeGuesserInterface;

final class XdgMimeTypeGuesser implements MimeTypeGuesserInterface
{
    public function __construct(
        private readonly MimeDatabaseInterface $mimeDatabase,
    ) {
    }

    public function isGuesserSupported(): bool
    {
        return true;
    }

    public function guessMimeType(string $path): ?string
    {
        return (string) $this->mimeDatabase->guessType($path);
    }
}
