<?php

namespace dao;

use models;

class DaoProductImpl implements DaoProductInterface
{
    private $entityManager;

    /**
     * DaoProductImpl constructor.
     */
    public function __construct()
    {
        $this->entityManager = DaoFactory::getFactory()->getEntityManager();
    }

    /**
     * The function create product in database
     *
     * @param $attributes
     */
    public function createProduct($attributes)
    {
        $product = new models\Product();

        $product->setCode($attributes['Code']);
        $product->setArticle($attributes['Article']);
        $product->setName($attributes['Name']);
        $product->setBasicMeasure($attributes['Basic_measure']);
        $product->setMeasure($attributes['Measure']);
        $product->setCost($attributes['Cost']);
        $product->setCurrency($attributes['Currency']);

        //checking existence of the category in the database
        $category = $this->entityManager->getRepository('models\Category')->findBy(array('name' => $attributes['Code_category']));
        if ($category == null) {
            $dao_category = new DaoCategoryImpl();
            $category = $dao_category->createCategory($attributes['Category'], $attributes['Code_category']);
            $product->setIdCodeCategory($category);
            $category->addProducts($product);
            $this->entityManager->persist($category);
        } else {
            $product->setIdCodeCategory($category[0]);
            $category[0]->addProducts($product);
            $this->entityManager->persist($category[0]);
        }

        $this->entityManager->flush();
    }

    /**
     * The function return array of product attributes by product code
     *
     * @param $productCode
     * @return array
     */
    public function readProductParameters($productCode)
    {
        return $this->entityManager->getRepository('models\Product')->findBy(array('code' => $productCode));
    }

    /**
     * The function update product attribute
     */
    public function updateProduct($attributes, models\Category $category)
    {
        $product = new models\Product();

        $product->setCode($attributes['Code']);
        $product->setArticle($attributes['Article']);
        $product->setName($attributes['Name']);
        $product->setBasicMeasure($attributes['Basic_measure']);
        $product->setMeasure($attributes['Measure']);
        $product->setCost($attributes['Cost']);
        $product->setCurrency($attributes['Currency']);
        $product->setIdCodeCategory($category);

        $this->entityManager->merge($product);
        $this->entityManager->flush();
    }

    /**
     * Delete product in database
     *
     * @param models\Product $product
     */
    public function deleteProduct(models\Product $product)
    {
        $this->entityManager->remove($product);
        $this->entityManager->flush();
    }
}