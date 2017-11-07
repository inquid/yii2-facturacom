<?php
/**
 * Created by PhpStorm.
 * User: gogl92
 * Date: 28/10/17
 * Time: 12:20 AM
 */

namespace inquid\facturacom\models;


use yii\base\Model;

/**
 * Class Factura33
 * @package inquid\facturacom\models
 */
class Factura33 extends Model
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
     * @var string $Comentarios
     */
    public $Comentarios;
    /**
     * @var boolean $EnviarCorreo
     */
    public $EnviarCorreo;
    /**
     * @var boolean $Abonado
     */
    public $Abonado;
    /**
     * @var boolean $Draft
     */
    public $Draft;
    /**
     * @var DocumentoAbonado $DocumentoAbonado
     */
    public $DocumentoAbonado;
    /**
     * @var integer $Redondeo
     */
    public $Redondeo;
    /**
     * @var string $AppOrigin
     */
    public $AppOrigin;
    /**
     * @var double $Version
     */
    public $Version;
    /**
     * @var string $Serie
     */
    public $Serie;
    /**
     * @var string $Folio
     */
    public $Folio;
    /**
     * @var string $Fecha
     */
    public $Fecha;
    /**
     * @var string $Sello
     */
    public $Sello;
    /**
     * @var integer $FormaPago
     */
    public $FormaPago;
    /**
     * @var string $NoCertificado
     */
    public $NoCertificado;
    /**
     * @var string $Certificado
     */
    public $Certificado;
    /**
     * @var string $CondicionesDePago
     */
    public $CondicionesDePago;
    /**
     * @var float $SubTotal
     */
    public $SubTotal;
    /**
     * @var float $Descuento
     */
    public $Descuento;
    /**
     * @var string $Moneda
     */
    public $Moneda;
    /**
     * @var float $TipoCambio
     */
    public $TipoCambio;
    /**
     * @var float $Total
     */
    public $Total;
    /**
     * @var string $TipoDeComprobante
     */
    public $TipoDeComprobante;
    /**
     * @var string $MetodoPago
     */
    public $MetodoPago;
    /**
     * @var integer $LugarExpedicion
     */
    public $LugarExpedicion;
    /**
     * @var string $Confirmacion
     */
    public $Confirmacion;
    /**
     * @var string $UsoCFDI
     */
    public $UsoCFDI;
    /**
     * @var array $CfdiRelacionados
     */
    public $CfdiRelacionados;
    /**
     * @var array $Emisor
     */
    public $Emisor = [
        "Rfc" => "",
        "Nombre" => "",
        "RegimenFiscal" => ""
    ];
    /**
     * @var array $Receptor
     */
    public $Receptor = [
        "ResidenciaFiscal" => "",
        "UID" => ""
    ];
    /**
     * @var Conceptos $Conceptos
     */
    public $Conceptos = [];

    /**
     * @return array the validation rules.

    public function rules()
    {
        return [
            [['Recpetor', 'TipoDocumento', 'UsoCFDI', 'Serie', 'FormaPago', 'MetodoPago', 'Moneda', 'Conceptos'], 'required'],
            [['metodopago'], 'integer'],
            ['Moneda', 'string', 'max' => 3],
            [['TipoDocumento', 'UsoCFDI', 'Serie', 'FormaPago', 'MetodoPago', 'CondicionesDePago', 'Moneda', 'Comentarios'], 'string'],
            [['EnviarCorreo'], 'boolean'],
            [['TipoCambio', 'Serie', 'NumOrder'], 'number'],
            ['FechaFromAPI', 'date', 'format' => "yyyy-MM-dd'T'HH:mm:ss"]
        ];
    }*/
}