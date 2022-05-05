<?php

declare(strict_types=1);

namespace PHPUnitForGraphQLAPI\GraphQLAPITesting;

use PHPUnitForGraphQLAPI\GraphQLAPITesting\RESTAPI\Constants\ResponseStatus;
use PHPUnitForGraphQLAPI\GraphQLAPITesting\RESTAPI\RESTResponse;
use Psr\Http\Message\ResponseInterface;

trait ExecuteRESTWebserverRequestTestCaseTrait
{
    /**
     * Assert the REST API call is successful, or already fail the test
     */
    protected function assertRESTGetCallIsSuccessful(
        ResponseInterface $response
    ): void {
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertStringStartsWith('application/json', $response->getHeaderLine('content-type'));
    }

    /**
     * Assert the REST API call is successful, or already fail the test
     */
    protected function assertRESTPostCallIsSuccessful(
        ResponseInterface $response
    ): void {
        $this->assertRESTGetCallIsSuccessful($response);
        $restResponse = RESTResponse::fromClientResponse($response);
        $this->assertEquals(ResponseStatus::SUCCESS, $restResponse->status);
    }
}
