<?php

namespace Roave\BetterReflection\SourceLocator\Ast\Exception;

use Roave\BetterReflection\SourceLocator\Located\LocatedSource;

class ParseToAstFailure extends \RuntimeException
{
    /**
     * @param LocatedSource $locatedSource
     * @param \Throwable|null $previous
     * @return ParseToAstFailure
     */
    public static function fromLocatedSource(LocatedSource $locatedSource, \Throwable $previous = null) : self
    {
        $additionalInformation = '';
        if (null !== $locatedSource->getFileName()) {
            $additionalInformation = sprintf(' (in %s)', $locatedSource->getFileName());
        }

        if ($additionalInformation === '') {
            $additionalInformation = sprintf(' (first 20 characters: %s)', substr($locatedSource->getSource(), 0, 20));
        }

        return new self(sprintf(
            'AST failed to parse in located source%s',
            $additionalInformation
        ), 0, $previous);
    }
}
