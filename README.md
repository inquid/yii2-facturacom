yii2-facturacom
=====================

Librería para usar el API de http://docs.facturacom.apiary.io/#

## Instalación

La forma preferida para instalar esta extensión es a través de [composer](http://getcomposer.org/download/).

Para instalar, ejecutar

```
$ php composer.phar require inquid/yii2-facturacom
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
