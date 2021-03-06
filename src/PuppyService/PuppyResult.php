<?php

namespace App\PuppyService;


class PuppyResult
{
    private $status;

    private $recipes;

    private $query;

    private $timestamp;

    const STATUS_OK = 'STATUS_OK';
    const STATUS_CONNECTION_KO = 'STATUS_CONNECTION_KO';
    const STATUS_ENCODING_KO = 'STATUS_ENCODING_KO';

    /**
     * PuppyResult constructor.
     * @param $status
     * @param array $recipes
     * @param $query
     */
    public function __construct(string $status, array $recipes, PuppyQuery $query)
    {

        $this->status = $status;
        $this->recipes = $recipes;
        $this->query = $query;
        $this->timestamp = (int)date('U');
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     * @return PuppyResult
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRecipes()
    {
        return $this->recipes;
    }

    /**
     * @param mixed $recipes
     * @return PuppyResult
     */
    public function setRecipes($recipes)
    {
        $this->recipes = $recipes;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @param mixed $query
     * @return PuppyResult
     */
    public function setQuery($query)
    {
        $this->query = $query;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }


}