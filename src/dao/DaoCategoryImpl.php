<?php

namespace dao;

use models;

class DaoCategoryImpl implements DaoCategoryInterface
{
    /**
     * The function create new category in database
     *
     * @param $codeCategory
     * @param $name
     * @return models\Category
     */
    public function createCategory($codeCategory, $name)
    {
        $entityManager = DaoFactory::getFactory()->getEntityManager();
        $category = new models\Category();
        $category->setCodeCategory($codeCategory);
        $category->setName($name);
        $entityManager->persist($category);
        $entityManager->flush();

        return $category;
    }
}