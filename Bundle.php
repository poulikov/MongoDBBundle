<?php

namespace Bundle\MongoDBBundle;

use Symfony\Foundation\Bundle\Bundle as BaseBundle;
use Symfony\Components\DependencyInjection\ContainerInterface;
use Symfony\Components\DependencyInjection\Loader\Loader;
use Symfony\Components\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Components\Console\Application;

use Bundle\MongoDBBundle\DependencyInjection\MongoExtension;

class Bundle extends BaseBundle
{
  public function buildContainer(ContainerInterface $container)
  {
    Loader::registerExtension(new MongoExtension());
  }
}
