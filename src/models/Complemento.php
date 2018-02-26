<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 2/23/18
 * Time: 11:43 AM
 */

namespace inquid\facturacom\models;


use yii\base\Model;

/**
 * Class Complemento
 * @package inquid\facturacom\models
 */
class Complemento extends Model
{
    /**
     * @var string $typeComplement
     */
    public $typeComplement = "";
    /**
     * @var string $FechaPago
     */
    public $FechaPago = "";
    /**
     * @var string $FormaDePagoP
     */
    public $FormaDePagoP = "";
    /**
     * @var string $MonedaP
     */
    public $MonedaP = "";
    /**
     * @var string $TipoCambioP
     */
    public $TipoCambioP = "";
    /**
     * @var string $Monto
     */
    public $Monto = "";
    /**
     * @var string $NumOperacion
     */
    public $NumOperacion = "";
    /**
     * @var string $RfcEmisorCtaOrd
     */
    public $RfcEmisorCtaOrd = "";
    /**
     * @var string $CtaOrdenante
     */
    public $CtaOrdenante = "";
    /**
     * @var string $TipoCadPago
     */
    public $TipoCadPago = "";
    /**
     * @var string $NomBancoOrdExt
     */
    public $NomBancoOrdExt = "";
    /**
     * @var string $RfcEmisorCtaBen
     */
    public $RfcEmisorCtaBen = "";
    /**
     * @var string $CtaBeneficiario
     */
    public $CtaBeneficiario = "";
    /**
     * @var array $relacionados
     */
    public $relacionados = [];


}