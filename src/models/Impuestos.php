<?php
/**
 * Created by PhpStorm.
 * User: gogl92
 * Date: 6/11/17
 * Time: 05:43 PM
 */

namespace inquid\facturacom\models;


use yii\base\Model;

class Impuestos extends Model
{
    public $Base;
    public $Impuesto;
    public $TipoFactor;
    public $TasaOCuota;
    public $Importe;
}