<?php

namespace models;

/**
 * @Entity @Table(name="products", options={"charset"="utf8"})
 **/
class Product
{
    /**
     * @var string
     * @Id @Column(type="string", name="code")
     */
    protected $code;

    /**
     * @var string
     * @ManyToOne(targetEntity="Category", inversedBy="products")
     * @JoinColumn(name="code_category_id", referencedColumnName="code_category_id")
     */
    protected $idCodeCategory;

    /**
     * @var string
     * @Column(type="string", name="article")
     */
    protected $article;

    /**
     * @var string
     * @Column(type="string", name="name")
     */
    protected $name;

    /**
     * @var string
     * @Column(type="string", name="basic_measure")
     */
    protected $basicMeasure;

    /**
     * @var string
     * @Column(type="string", name="measure")
     */
    protected $measure;

    /**
     * @var string
     * @Column(type="string", name="cost")
     */
    protected $cost;

    /**
     * @var string
     * @Column(type="string", name="currency")
     */
    protected $currency;

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getIdCodeCategory()
    {
        return $this->idCodeCategory;
    }

    /**
     * @param mixed $idCodeCategory
     */
    public function setIdCodeCategory($idCodeCategory)
    {
        $this->idCodeCategory = $idCodeCategory;
    }

    /**
     * @return mixed
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * @param mixed $article
     */
    public function setArticle($article)
    {
        $this->article = $article;
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
    public function getBasicMeasure()
    {
        return $this->basicMeasure;
    }

    /**
     * @param mixed $basicMeasure
     */
    public function setBasicMeasure($basicMeasure)
    {
        $this->basicMeasure = $basicMeasure;
    }

    /**
     * @return mixed
     */
    public function getMeasure()
    {
        return $this->measure;
    }

    /**
     * @param mixed $measure
     */
    public function setMeasure($measure)
    {
        $this->measure = $measure;
    }

    /**
     * @return mixed
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @param mixed $cost
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }
}