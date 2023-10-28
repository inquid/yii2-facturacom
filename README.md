<p align="center">
    <a href="http://www.yiiframework.com/" target="_blank">
        <img src="http://static.yiiframework.com/files/logo/yii.png" width="400" alt="Yii Framework" />
    </a>
</p>

[![Donate](https://img.shields.io/badge/Donate-PayPal-green.svg)](https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=contact@inquid.co&item_name=Yii2+extensions+support&item_number=22+Campaign&amount=5%2e00&currency_code=USD)

yii2-facturacom
=====================

Librería para usar el API de [http://docs.facturacom.apiary.io/#](https://factura.com/apidocs/)


# IMPORTANT: This package has been updated recently and it's working but a new more modern extension is being developed for Laravel
[Laravel Package](https://github.com/inquid/laravel-facturacom)

## Instalación

La forma preferida para instalar esta extensión es a través de [composer](http://getcomposer.org/download/).

Para instalar, ejecutar

```
composer require inquid/yii2-facturacom
```

or agregar

```
"inquid/yii2-facturacom": "*"
```
en la sección "require" de tu composer.json.

## Configuración

Configurar como componente
```php
$config = [
     // ...
    'components' => [
        'facturacom' => [
            'class' => 'inquid\facturacom\Facturacom',
            'apiKey' => 'API_KEY...',
            'secretKey' => 'SECRET_KEY....',
            //'isSandbox' => true
        ],
```

## Uso
```php
// Lista de Clientes
$response = Yii::$app->facturacom->getClientes();

// Se debe enviar objetos ya sea como Model o ActiveRecord, con el mismo nombre de los parametros 
// que usa el API de Facturacom, o a través los modelos de la extensión

    $cliente = new \inquid\facturacom\models\Cliente();
    $cliente->setAttributes([
        "nombre" => "Prueba",
        "apellidos" => "Test Demo",
        "email" => "demo@test.com",
        "telefono" => "33 3877 7741",
        "razons" => "PRUEBA SA DE CV.",
        "rfc" => "XUXX020111001",
        "calle" => "Av. Juarez",
        "numero_exterior" => "1234",
        "numero_interior" => "",
        "codpos" => "54473",
        "colonia" => "Centro",
        "estado" => "Estado Mexico",
        "ciudad" => "Nicolas Romero",
        "delegacion" => ""
    ]);
  $response = Yii::$app->facturacom->createCliente($cliente);
```
Iniciativa Programa México: 
![Iniciativa Programa México](https://lh5.googleusercontent.com/k6u-DepqdgZzTk15Kxx6UPuZJ0ldiv6EPuhhJYRp8QfB89kLxU-D1D7YdYST-gGXnSxl9LFixzn5sYg=w1920-h990)

SUPPORT
-----
[![paypal](https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif)](https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=contact@inquid.co&item_name=Yii2+extensions+support&item_number=22+Campaign&amount=5%2e00&currency_code=USD)
