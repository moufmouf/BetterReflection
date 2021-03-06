<?php

namespace Roave\BetterReflection\SourceLocator\Exception;

class InvalidDirectory extends \RuntimeException
{
    /**
     * @param string $nonDirectory
     *
     * @return InvalidDirectory
     */
    public static function fromNonDirectory(string $nonDirectory) : self
    {
        if (! file_exists($nonDirectory)) {
            return new self(sprintf('"%s" does not exists', $nonDirectory));
        }

        return new self(sprintf('"%s" must be a directory, not a file', $nonDirectory));
    }

    /**
     * @param mixed $nonStringValue
     *
     * @return InvalidDirectory
     */
    public static function fromNonStringValue($nonStringValue) : self
    {
        return new self(sprintf(
            'Expected string, %s given',
            is_object($nonStringValue) ? get_class($nonStringValue) : gettype($nonStringValue)
        ));
    }
}
