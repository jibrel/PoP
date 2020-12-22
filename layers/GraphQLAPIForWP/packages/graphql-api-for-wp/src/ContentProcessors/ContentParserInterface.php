<?php

declare(strict_types=1);

namespace GraphQLAPI\GraphQLAPI\ContentProcessors;

interface ContentParserInterface
{
    /**
     * Parse the file's Markdown into HTML Content
     *
     * @param string $relativePathDir Dir relative to the docs/en/ folder
     * @param array<string, mixed> $options
     */
    public function getContent(
        string $filename,
        string $relativePathDir = '',
        array $options = []
    ): string;

    /**
     * Where the markdown file localized to the user's language is stored
     */
    public function getLocalizedFileDir(): string;

    /**
     * Where the default markdown file (for if the localized language is not available) is stored
     * Default language for documentation: English
     */
    public function getDefaultFileDir(): string;

    /**
     * Default language for documentation
     */
    public function getDefaultDocsLanguage(): string;
}
