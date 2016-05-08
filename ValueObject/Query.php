<?php

namespace RudyOnfroy\DBViewerCleanerBundle\ValueObject;

/**
 * Class Query.
 */
class Query
{
    /** @var  int $id */
    private $id;

    /** @var  string $name */
    private $name;

    /** @var  string $sql */
    private $sql;

    /**
     * Query constructor.
     *
     * @param int    $id
     * @param string $name
     * @param string $sql
     */
    public function __construct($id, $name, $sql)
    {
        $this->id    = $id;
        $this->name = $name;
        $this->sql  = $sql;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSql()
    {
        return $this->sql;
    }
}
