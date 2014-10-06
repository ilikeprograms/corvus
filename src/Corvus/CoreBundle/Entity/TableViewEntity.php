<?php

namespace Corvus\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM,

    Symfony\Component\Validator\Constraints as Assert;

class TableViewEntity implements ITableViewEntity
{
    /**
     * @ORM\Column(type="integer")
     * 
     * @Assert\NotNull()
     */
    protected $row_order;

    public function __construct()
    {
        // Initialise with a row order set, allows the form to be
        // valid on submission, which allows it to be dynamically changes
        // to the approriate row order automatically
        $this->row_order = 0;
    }

    /**
     * Set row_order.
     *
     * @param integer $rowOrder
     */
    public function setRowOrder($rowOrder)
    {
        $this->row_order = $rowOrder;
    }

    /**
     * Get row_order.
     *
     * @return integer 
     */
    public function getRowOrder()
    {
        return $this->row_order;
    }

    /**
     * Returns the name of the Class, usefull when constructing a child Entitie's
     * TableViewController to inherit the functionality.
     * 
     * @return string
     */
    public static function getName()
    {
        return static::ENTITY_NAME;
    }

    /**
     * Gets the Repo Name, returns the name of the Entities' ORM Respository (if it has one).
     * 
     * @return string
     */
    public static function getRepoName()
    {
        // Remove any spaces
        return str_replace(' ','', static::ENTITY_NAME);
    }

    public static function getRouteStem()
    {
        return static::ROUTE_STEM;
    }
}
