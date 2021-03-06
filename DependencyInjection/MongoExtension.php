<?php

namespace Bundle\MongoDBBundle\DependencyInjection;

use Symfony\Components\DependencyInjection\Loader\LoaderExtension;
use Symfony\Components\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Components\DependencyInjection\BuilderConfiguration;

/**
 * MongoExtension is an extension for the MongoDBBundle.
 *
 * @package    MongoDBBundle
 * @subpackage DependencyInjection
 * @author     Sergey Poulikov <sergey@poulikov.ru>
 */
class MongoExtension extends LoaderExtension
{
  protected $resources = array
  (
    'odm' => 'odm.xml',
  );

  public function odmLoad($config)
  {
    $configuration = new BuilderConfiguration();

    $defaultConfiguration = array_merge(
        array(
            'connection' => 'mongodb://localhost:27017',
            'params'     => array('connected' => true)
        ),
        $config
    );

    $loader = new XmlFileLoader(__DIR__.'/../Resources/config');

    $configuration->setParameter('mongo.connection', $defaultConfiguration['connection']);
    $configuration->setParameter('mongo.params', $defaultConfiguration['params']);

    $configuration->merge($loader->load($this->resources['odm']));

    return $configuration;
  }

  public function getNamespace()
  {
    return 'http://www.symfony-project.org/schema/dic/mongo';
  }

  public function getAlias()
  {
    return 'mongo';
  }

  public function getXsdValidationBasePath()
  {
    return __DIR__ . '/../Resources/config/';
  }
}
