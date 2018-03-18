<?php

namespace App\Tests\PuppyService;

use App\PuppyService\PuppyQuery;
use App\PuppyService\PuppyResult;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

use App\PuppyService\PuppyService;

class PuppyServiceTest extends TestCase
{

    public function testGetRecipesNoConnection()
    {
        $client = $this->getMockBuilder(Client::class)
            ->setMethods(['request'])
            ->getMock();

        $response = new Response(404);
        $puppyQuery = new PuppyQuery('');

        $client->expects($this->once())
            ->method('request')
            ->with($this->anything())
            ->willReturn($response);

        /** @noinspection PhpParamsInspection */
        $puppyService = new PuppyService($client, 'http://www.example.com/');

        $response = $puppyService->getRecipes($puppyQuery);

        $this->assertTrue($response->getStatus() === PuppyResult::STATUS_CONNECTION_KO);
    }


    public function testGetRecipesBadJson()
    {
        $client = $this->getMockBuilder(Client::class)
            ->setMethods(['request'])
            ->getMock();

        $response = new Response(200, [], '{{"foo":"bar"}');
        $puppyQuery = new PuppyQuery('');

        $client->expects($this->once())
            ->method('request')
            ->with($this->anything())
            ->willReturn($response);

        /** @noinspection PhpParamsInspection */
        $puppyService = new PuppyService($client, 'http://www.example.com/');

        $response = $puppyService->getRecipes($puppyQuery);

        $this->assertTrue($response->getStatus() === PuppyResult::STATUS_ENCODING_KO);
    }
}
