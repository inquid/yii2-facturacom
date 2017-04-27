<?php

namespace inquid\facturacom\models;

use yii\base\Model;

/**
 * Class Producto
 * @package inquid\facturacom\models
 */
class Producto extends Model
{
    public $cantidad;
    public $unidad;
    public $concept;
    public $precio;
    public $subtotal;
}