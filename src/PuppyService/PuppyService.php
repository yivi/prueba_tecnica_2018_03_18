<?php

namespace App\PuppyService;

use GuzzleHttp\Client;

class PuppyService
{

    /**
     * @var Client
     */
    private $httpClient;

    /**
     * @var string
     */
    private $apiEndpoint;

    /**
     * PuppyService constructor.
     * @param Client $httpClient
     * @param string $apiEndpoint
     */
    public function __construct(Client $httpClient, string $apiEndpoint = "http://www.recipepuppy.com/api/")
    {
        $this->httpClient = $httpClient;
        $this->apiEndpoint = $apiEndpoint;
    }

    public function getRecipes(PuppyQuery $recipeQuery): PuppyResult
    {
        $recipes = [];
        $response = $this->httpClient->request('GET', $this->getApiEndpoint(), [
            'query' => [
                'q' => $recipeQuery->getTitle(),
                'i' => implode(',', $recipeQuery->getIngredients()),
                'p' => $recipeQuery->getPage()
            ]
        ]);

        if ($response->getStatusCode() !== 200) {
            return new PuppyResult(PuppyResult::STATUS_CONNECTION_KO, [], $recipeQuery);
        }

        $encodedResponse = json_decode($response->getBody(), true);

        if ($encodedResponse === null) {
            return new PuppyResult(PuppyResult::STATUS_ENCODING_KO, [], $recipeQuery);
        }

        foreach ($encodedResponse['results'] as $result) {
            $recipes[] = PuppyRecipeFactory::recipeFromArray($result);
        }

        return new PuppyResult(PuppyResult::STATUS_OK, $recipes, $recipeQuery);
    }

    /**
     * @return string
     */
    public function getApiEndpoint(): string
    {
        return $this->apiEndpoint;
    }

    /**
     * @param string $apiEndpoint
     */
    public function setApiEndpoint(string $apiEndpoint)
    {
        $this->apiEndpoint = $apiEndpoint;
    }

}