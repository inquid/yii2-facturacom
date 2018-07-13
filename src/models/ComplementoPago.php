<?php
/**
 * Created by PhpStorm.
 * User: gogl92
 * Date: 15/06/18
 * Time: 01:13 PM
 */

namespace inquid\facturacom\models;


use yii\base\Model;

class ComplementoPago extends Model
{
    /**
     * @var string $TipoCfdi
     */
    public $TipoCfdi;
    /**
     * @var string $NumOrder
     */
    public $NumOrder;
    /**
     * @var boolean $EnviarCorreo
     */
    public $EnviarCorreo;
    /**
     * @var double $Version
     */
    public $Version;
    /**
     * @var string $Serie
     */
    public $Serie;
    /**
     * @var string $Fecha
     */
    public $Fecha;
    /**
     * @var string $Folio
     */
    public $Folio;
    /**
     * @var float $SubTotal
     */
    public $SubTotal;
    /**
     * @var float $Total
     */
    public $Total;
    /**
     * @var string $Moneda
     */
    public $Moneda;
    /**
     * @var string $UsoCFDI
     */
    public $UsoCFDI;

    /**
     * @var array $Receptor
     */
    public $Receptor = [
        "ResidenciaFiscal" => "",
        "NumRegIdTrib"=>"",
        "UID" => ""
    ];
    /**
     * @var Conceptos $Conceptos
     */
    public $Conceptos = [];
}