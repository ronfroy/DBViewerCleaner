<?php

namespace RudyOnfroy\DBViewerCleanerBundle\Builder;

use RudyOnfroy\DBViewerCleanerBundle\ValueObject\Query;

/**
 * Class QueryBuilder.
 */
class QueryBuilder implements BuilderInterface
{
    /** @var  int $id */
    private $id;

    /** @var string $name */
    private $name = '';

    /** @var string $sql */
    private $sql = '';

    /**
     * QueryBuilder constructor.
     */
    public static function create()
    {
        return new self();
    }

    /**
     * @return Query
     */
    public function build()
    {
        return new Query(
            $this->id,
            $this->name,
            $this->sql
        );
    }

    /**
     * @param $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param $sql
     *
     * @return $this
     */
    public function setSql($sql)
    {
        $this->sql = $sql;

        return $this;
    }
}
