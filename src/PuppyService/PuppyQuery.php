<?php

namespace App\PuppyService;


class PuppyQuery
{
    /**
     * @var string
     */

    protected $title;

    /**
     * @var array
     */
    protected $ingredients;


    /**
     * @var int
     */
    protected $page;


    public function __construct(string $title, array $ingredients = [], int $page = 1)
    {
        $this->title = $title;
        $this->ingredients = $ingredients;
        $this->page = $page;
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
     * @return $this
     */
    public function setTitle(string $title)
    {
        $this->title = $title;

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
     *
     * @return $this
     */
    public function setIngredients(array $ingredients)
    {
        $this->ingredients = $ingredients;

        return $this;
    }

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;

    }

    /**
     * @param int $page
     * @return $this
     */
    public function setPage(int $page)
    {
        $this->page = $page;
        return $this;
    }

    public function nextPage()
    {
        $this->page++;

        return $this;


    }


}