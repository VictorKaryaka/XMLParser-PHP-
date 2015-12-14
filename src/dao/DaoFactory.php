<?php

namespace dao;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class DaoFactory
{
    private static $instance;

    private $entityManager;

    /**
     * DaoFactory constructor.
     */
    private function __construct()
    {
        // Create a Doctrine ORM configuration for Annotations
        $isDevMode = true;
        $model = Setup::createAnnotationMetadataConfiguration(array(__DIR__ . "/src/models"), $isDevMode);

        //load config file
        $config = null;
        try {
            $path_to_config = __DIR__ . '\config.ini';
            $config = parse_ini_file(str_replace('\src\dao', '', $path_to_config));
        } catch (\Exception $exception) {
            $exception->getMessage();
        }

        // database configuration parameters
        $conn = array(
            'driver' => $config['db_driver'],
            'host' => $config['db_host'],
            'user' => $config['db_user'],
            'password' => $config['db_pass'],
            'dbname' => $config['db_name'],
            'charset' => 'UTF8',
        );

        // obtaining the entity manager
        $this->entityManager = EntityManager::create($conn, $model);
    }

    /**
     * Get a factory instance.
     *
     * @return DaoFactory
     */
    public static function getFactory()
    {
        if (!self::$instance)
            self::$instance = new self;

        return self::$instance;
    }

    /**
     * Get a Product DAO
     *
     * @return DaoProductImpl
     */
    public function getDaoProductImpl()
    {
        return new DaoProductImpl();
    }

    /**
     * Get a DaoCategoryImpl
     *
     * @return DaoCategoryImpl
     */
    public function getDaoCategoryImpl()
    {
        return new DaoCategoryImpl();
    }

    /**
     * Get entity manager
     *
     * @return EntityManager
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }
}