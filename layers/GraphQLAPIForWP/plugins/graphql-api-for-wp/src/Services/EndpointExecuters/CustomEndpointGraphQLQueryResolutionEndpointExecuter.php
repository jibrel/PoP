<?php

declare(strict_types=1);

namespace GraphQLAPI\GraphQLAPI\Services\EndpointExecuters;

use GraphQLAPI\GraphQLAPI\ModuleResolvers\EndpointFunctionalityModuleResolver;
use GraphQLAPI\GraphQLAPI\Services\CustomPostTypes\GraphQLCustomEndpointCustomPostType;
use GraphQLAPI\GraphQLAPI\Services\CustomPostTypes\GraphQLEndpointCustomPostTypeInterface;
use GraphQLByPoP\GraphQLRequest\Execution\QueryRetrieverInterface;
use Symfony\Contracts\Service\Attribute\Required;
use WP_Post;

class CustomEndpointGraphQLQueryResolutionEndpointExecuter extends AbstractGraphQLQueryResolutionEndpointExecuter implements CustomEndpointExecuterServiceTagInterface
{
    protected GraphQLCustomEndpointCustomPostType $graphQLCustomEndpointCustomPostType;
    protected QueryRetrieverInterface $queryRetrieverInterface;

    #[Required]
    final public function autowireCustomEndpointGraphQLQueryResolutionEndpointExecuter(
        GraphQLCustomEndpointCustomPostType $graphQLCustomEndpointCustomPostType,
        QueryRetrieverInterface $queryRetrieverInterface,
    ): void {
        $this->graphQLCustomEndpointCustomPostType = $graphQLCustomEndpointCustomPostType;
        $this->queryRetrieverInterface = $queryRetrieverInterface;
    }

    public function getEnablingModule(): ?string
    {
        return EndpointFunctionalityModuleResolver::CUSTOM_ENDPOINTS;
    }

    protected function getCustomPostType(): GraphQLEndpointCustomPostTypeInterface
    {
        return $this->graphQLCustomEndpointCustomPostType;
    }

    /**
     * Provide the query to execute and its variables
     *
     * @return mixed[] Array of 2 elements: [query, variables]
     */
    protected function getGraphQLQueryAndVariables(?WP_Post $graphQLQueryPost): array
    {
        /**
         * Extract the query from the BODY through standard GraphQL endpoint execution
         */
        return $this->queryRetrieverInterface->extractRequestedGraphQLQueryPayload();
    }
}
