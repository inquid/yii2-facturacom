<?php

namespace inquid\facturacom\models;

use yii\base\Model;

/**
 * Class Factura
 * @package inquid\facturacom\models
 */
class Factura extends Model
{

    public $rfc;
    public $items = [];
    public $numerocuenta;
    public $formapago;
    public $metodopago;
    public $currencie;
    public $iva;
    public $num_order;
    public $seriefactura;
    public $descuento;
    public $fecha_cfdi;
    public $send_email;
    public $invoice_comments;
    public $ish;
    public $percentISH;
    public $ieps;
    public $percentIEPS;
    public $exchange_rate;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['rfc', 'metodopago', 'formapago', 'currencie', 'seriefactura', 'items'], 'required'],
            ['numerocuenta', 'integer', 'max' => 9999],
            [['metodopago'], 'integer'],
            ['rfc', 'string', 'length' => [12, 13]],
            [['formapago', 'currencie', 'seriefactura', 'invoice_comments'], 'string'],
            [['iva', 'send_email', 'ish', 'ieps'], 'boolean'],
            [['num_order', 'descuento', 'exchange_rate'], 'number'],
            ['fecha_cfdi', 'date', 'format' => "yyyy-MM-dd'T'HH:mm:ss"],
            [
                'percentISH',
                'required',
                'when' => function ($model) {
                    return $model->ish ? true : false;
                }
            ],
            [
                'percentIEPS',
                'required',
                'when' => function ($model) {
                    return $model->ieps ? true : false;
                }
            ]
        ];
    }
}