<?php

namespace RudyOnfroy\DBViewerCleanerBundle\ValueObject;

/**
 * Class Viewer.
 */
class Viewer
{
    /** @var  int $id */
    private $id;

    /** @var  string $name */
    private $name;

    /** @var Parameter[] $params*/
    private $params;

    /** @var Query[] $queries*/
    private $queries;

    /**
     * Viewer constructor.
     *
     * @param int         $id
     * @param string      $name
     * @param Parameter[] $params
     * @param Query[]     $queries
     */
    public function __construct($id, $name, array $params, array $queries)
    {
        $this->id      = $id;
        $this->name    = $name;
        $this->params  = $params;
        $this->queries = $queries;
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
     * @return Parameter[]
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @return Query[]
     */
    public function getQueries()
    {
        return $this->queries;
    }
}
