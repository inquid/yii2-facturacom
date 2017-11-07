<?php
/**
 * Created by PhpStorm.
 * User: gogl92
 * Date: 6/11/17
 * Time: 05:35 PM
 */

namespace inquid\facturacom\models;


use yii\base\Model;

/**
 * Class Conceptos
 * @package inquid\facturacom\models
 */
class Conceptos extends Model
{
    /**
     * @var string
     */
    public $ClaveProdServ;
    /**
     * @var string
     */
    public $NoIdentificacion;
    /**
     * @var integer
     */
    public $Cantidad;
    /**
     * @var string
     */
    public $ClaveUnidad;
    /**
     * @var string
     */
    public $Unidad;
    /**
     * @var string
     */
    public $Descripcion;
    /**
     * @var float
     */
    public $ValorUnitario;
    /**
     * @var float
     */
    public $Importe;
    /**
     * @var float
     */
    public $Descuento;
    /**
     * @var array
     */
    public $Impuestos = [
        "Traslados" => [],
        "Retenidos" => [],
        "Locales" => []
    ];
    /**
     * @var string
     */
    public $NumeroPedimento;
    /**
     * @var string
     */
    public $CuentaPredial;
    /**
     * @var integer
     */
    public $Partes;
    /**
     * @var integer
     */
    public $Complemento;
}