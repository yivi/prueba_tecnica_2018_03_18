<?php

namespace App\PuppyService;

class PuppyRecipeFactory
{

    public static function recipeFromArray(array $array): PuppyRecipe
    {

        return new PuppyRecipe(
            $array['title'],
            $array['href'],
            explode(',', $array['ingredients']),
            $array['thumbnail']
        );
    }

}