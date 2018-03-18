<?php

namespace App\Controller;

use App\PuppyService\PuppyQuery;
use App\PuppyService\PuppyService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RecipeRestfulController extends Controller
{
    /**
     * @param PuppyService $recipeService
     * @param Request $request
     * @return Response
     */
    public function getRecipesAction(PuppyService $recipeService, Request $request)
    {
        $title = $request->query->get('title', '');
        $ingredients = explode(',', $request->query->get('ingredients', ''));
        $page = (int)$request->query->get('page', 1);

        $query = new PuppyQuery($title, $ingredients, $page);

        $result = $recipeService->getRecipes($query);

        return $this->json($result, 200);

    }
}