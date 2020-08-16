Symfony KingHost Mailer
=============

Fornece uma configuração padrão para o Symfony Mailer

```
###> symfony/mailer ###
MAILER_DSN=kinghost+smtp://user:pass@default
###< symfony/mailer ###

```

### Como instalar:

```
composer require jrbarros/symfony-kinghost-mailer
```

### Como configurar:

##### Em config/services.yaml
```
JrBarros\Mailer\Bridge\KingHost\Transport\KingHostTransportFactory:
    tags: [mailer.transport_factory]

```

##### ou config/services.php
```php
<?php declare(strict_types=1);

use JrBarros\Mailer\Bridge\KingHost\Transport\KingHostTransportFactory;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();
 
    // outros serviços
 
    $services->set(KingHostTransportFactory::class)
        ->tag('mailer.transport_factory');
};
```

