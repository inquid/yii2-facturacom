<?php
/**
 * Created by PhpStorm.
 * User: gogl92
 * Date: 28/09/23
 * Time: 20:22 PM
 */

namespace inquid\facturacom\models;


use app\modules\Facturacion\components\MexicoUtilities;
use app\modules\Facturacion\models\ActiveQuery\FacturasQuery;
use app\modules\Facturacion\models\Items;
use mootensai\relation\RelationTrait;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * Class Factura33
 * @package inquid\facturacom\models
 */
class Factura44 extends ActiveRecord
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
     * @var string $Cuenta
     */
    public $Cuenta;
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
    public $relacionados = [

    ];
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
     * @var array $Pagos
     */
    public $Pagos = [];

    // Carta Porte

    public $cartaPorte;

    use RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%factura}}';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rfc' => 'Cliente',
            'numero_cuenta' => 'Número de cuenta',
            'forma_pago' => 'Forma de pago',
            'metodo_pago' => 'Metodo de pago',
            'currencie' => 'Moneda',
            'num_orden' => 'Num Orden',
            'serie_factura' => 'Serie de la factura',
            'fecha_cfdi' => 'Fecha de Emisión',
            'send_email' => 'Enviar email',
            'invoice_comment' => 'Comentarios',
            'cuenta' => 'Cuenta',
            'exchange_rate' => 'Tipo de cambio (Pesos)',
            'status' => 'Status',
            'iva' => 'IVA',
            'Version' => 'Version',
            'TranspInternac' => 'Transporte Internacional',
            'TotalDistRec' => 'Distancia Total Recorrida',
            'NumLicencia' => 'Número de Licencia',
            'RFCFigura' => 'RFC de la Figura',
            'TipoFigura' => 'Tipo de Figura',
            'NumTotalMercancias' => 'Número Total de Mercancías',
            'PesoBrutoTotal' => 'Peso Bruto Total',
            'UnidadPeso' => 'Unidad de Peso',
            'BienesTransp' => 'Bienes Transportados',
            'Cantidad' => 'Cantidad',
            'ClaveUnidad' => 'Clave de Unidad',
            'Descripcion' => 'Descripción',
            'Moneda' => 'Moneda',
            'PesoEnKg' => 'Peso en Kg',
            'ValorMercancia' => 'Valor de la Mercancía',
            'IDDestino' => 'ID de Destino',
            'IDOrigen' => 'ID de Origen',
            'NumPermisoSCT' => 'Número de Permiso SCT',
            'PermSCT' => 'Permiso SCT',
            'AnioModeloVM' => 'Año Modelo del Vehículo',
            'ConfigVehicular' => 'Configuración Vehicular',
            'PlacaVM' => 'Placa del Vehículo',
            'AseguraRespCivil' => 'Aseguradora de Responsabilidad Civil',
            'PolizaRespCivil' => 'Póliza de Responsabilidad Civil',
            'AseguraCarga' => 'Aseguradora de Carga',
            'PlacaRemolque' => 'Placa del Remolque',
            'SubTipoRem' => 'Subtipo de Remolque',
            'FechaHoraSalidaLlegada' => 'Fecha y Hora de Salida/Llegada',
            'IDUbicacion' => 'ID de Ubicación',
            'RFCRemitenteDestinatario' => 'RFC del Remitente/Destinatario',
            'TipoUbicacion' => 'Tipo de Ubicación',
            'Calle' => 'Calle',
            'NumeroExterior' => 'Número Exterior',
            'Colonia' => 'Colonia',
            'Localidad' => 'Localidad',
            'Municipio' => 'Municipio',
            'Estado' => 'Estado',
            'Pais' => 'País',
            'CodigoPostal' => 'Código Postal',
            'DistanciaRecorrida' => 'Distancia Recorrida'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(Items::className(), ['inq_facturas_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return array mixed
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
        ];
    }

    /**
     * @inheritdoc
     * @return FacturasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FacturasQuery(get_called_class());
    }

    /**
     * Returns model name with full namespace
     * @return string
     */
    public function getModelName()
    {
        return __CLASS__;
    }
}
