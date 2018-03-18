<?php

namespace App\PuppyService;


class PuppyRecipe
{

    protected $title;

    protected $url;

    protected $ingredients;

    protected $thumbnail_url;

    /**
     * PuppyRecipe constructor.
     * @param $title
     * @param $url
     * @param $ingredients
     * @param $thumbnail_url
     */
    public function __construct(string $title, string $url, array $ingredients, string $thumbnail_url = '')
    {
        $this->title = $title;
        $this->url = $url;
        $this->ingredients = $ingredients;
        $this->thumbnail_url = $thumbnail_url;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return PuppyRecipe
     */
    public function setTitle(string $title): PuppyRecipe
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return PuppyRecipe
     */
    public function setUrl(string $url): PuppyRecipe
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return array
     */
    public function getIngredients(): array
    {
        return $this->ingredients;
    }

    /**
     * @param array $ingredients
     * @return PuppyRecipe
     */
    public function setIngredients(array $ingredients): PuppyRecipe
    {
        $this->ingredients = $ingredients;
        return $this;
    }

    /**
     * @return string
     */
    public function getThumbnailUrl(): string
    {
        return $this->thumbnail_url;
    }

    /**
     * @param string $thumbnail_url
     * @return PuppyRecipe
     */
    public function setThumbnailUrl(string $thumbnail_url): PuppyRecipe
    {
        $this->thumbnail_url = $thumbnail_url;
        return $this;
    }


}