<?php
/**
 * Created by PhpStorm.
 * User: gogl92
 * Date: 6/11/17
 * Time: 05:35 PM
 */

namespace inquid\facturacom\models;


use app\modules\Facturacion\models\ActiveQuery\ItemsQuery;
use mootensai\relation\RelationTrait;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
/**
 * Class Conceptos
 * @package inquid\facturacom\models
 */
class Conceptos extends ActiveRecord
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

    use RelationTrait;

    /**
     * @inheritdoc

    public function rules()
    {
        return [
            [['cantidad', 'unidad', 'concepto', 'precio', 'subtotal', 'inq_facturas_id'], 'required'],
            [['cantidad', 'siaduana', 'iva', 'iva_ret', 'isr', 'ish', 'iesp', 'inq_facturas_id', 'status', 'created_by', 'updated_by'], 'integer'],
            [['unidad'], 'string'],
            [['fecha_aduana', 'created_at', 'updated_at'], 'safe'],
            [['precio', 'subtotal', 'discount'], 'number'],
            [['concepto'], 'string', 'max' => 100],
            [['clave'], 'string', 'max' => 25],
            [['pedimento_aduana'], 'string', 'max' => 20],
            [['locacion_aduana'], 'string', 'max' => 75]
        ];
    }*/

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%conceptos}}';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'clave' => 'Clave',
            'cantidad' => 'Cantidad',
            'unidad' => 'Unidad',
            'concepto' => 'Concepto',
            'siaduana' => 'Aplica aduana',
            'pedimento_aduana' => 'Pedimento aduanal',
            'locacion_aduana' => 'Localización de la aduana',
            'fecha_aduana' => 'Fecha de arribo',
            'iva' => 'IVA',
            'iva_ret' => 'IVA retenido',
            'isr' => 'ISR',
            'ish' => 'ISH',
            'iesp' => 'IESP',
            'discount' => 'Descuento',
            'precio' => 'Precio',
            'subtotal' => 'Subtotal',
            'inq_facturas_id' => 'Inq Facturas ID',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInqFacturas()
    {
        return $this->hasOne(Facturas::className(), ['id' => 'inq_facturas_id']);
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
     * @return ItemsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ItemsQuery(get_called_class());
    }
}