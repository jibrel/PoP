<?php

declare(strict_types=1);

namespace PoP\PoP\Config\Symplify\MonorepoBuilder;

class PackageOrganizationConfig
{
    function __construct(protected string $dir)
    {        
    }

    /**
     * @return array<string, string>
     */
    public function getPackagePathOrganizations(): array
    {
        return [
            'layers/Engine/packages' => 'getpop',
            'layers/API/packages' => 'getpop',
            'layers/Schema/packages' => 'PoPSchema',
            'layers/GraphQLByPoP/packages' => 'GraphQLByPoP',
            'layers/GraphQLAPIForWP/packages' => 'GraphQLAPI',
            'layers/GraphQLAPIForWP/plugins' => 'GraphQLAPI',
            'layers/SiteBuilder/packages' => 'getpop',
            'layers/Wassup/packages' => 'PoPSites-Wassup',
        ];
    }

    /**
     * @return array<string>
     */
    public function getPackageDirectories(): array
    {
        return array_map(
            fn (string $packagePath) => $this->dir . '/' . $packagePath,
            array_keys($this->getPackagePathOrganizations())
        );
    }

    /**
     * @return array<string>
     */
    public function getPackageDirectoryExcludes(): array
    {
        return [
            'graphql-api-for-wp/wordpress',
        ];
    }
}
