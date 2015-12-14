<?php

namespace models;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity @Table(name="category", options={"charset"="utf8"})
 **/
class Category
{
    /**
     * @var string
     * @Id @Column(type="string", name="code_category_id") @GeneratedValue
     */
    protected $idCodeCategory;

    /**
     * @var string
     * @Column(type="string", name="code_category")
     */
    protected $codeCategory;

    /**
     * @var string
     * @Column(type="string", name="name")
     */
    protected $name;

    /**
     * @OneToMany(targetEntity="Product", mappedBy="idCodeCategory", cascade={"persist", "remove"})
     */
    private $products;

    /**
     * Category constructor.
     */
    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getIdCodeCategory()
    {
        return $this->idCodeCategory;
    }

    /**
     * @return mixed
     */
    public function getCodeCategory()
    {
        return $this->codeCategory;
    }

    /**
     * @param mixed $codeCategory
     */
    public function setCodeCategory($codeCategory)
    {
        $this->codeCategory = $codeCategory;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param mixed $products
     */
    public function addProducts(Product $products)
    {
        $this->products->add($products);
    }
}