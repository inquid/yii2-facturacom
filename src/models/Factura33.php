<?php
/**
 * Created by PhpStorm.
 * User: gogl92
 * Date: 28/10/17
 * Time: 12:20 AM
 */

namespace inquid\facturacom\models;


use yii\base\Model;

class Factura33 extends Model
{

    public $Recpetor = [];
    public $TipoDocumento;
    public $Conceptos = [];
    public $UsoCFDI;
    public $Serie;
    public $numerocuenta;
    public $FormaPago;
    public $MetodoPago;
    public $CondicionesDePago;
    public $Relacionados;
    public $Moneda;
    public $TipoCambio;
    public $NumOrden;
    public $FechaFromAPI;
    public $Comentarios;
    public $EnviarCorreo;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['Recpetor', 'TipoDocumento', 'UsoCFDI', 'Serie', 'FormaPago','MetodoPago', 'Moneda', 'Conceptos'], 'required'],
            [['metodopago'], 'integer'],
            ['Moneda', 'string', 'max' => 3],
            [['TipoDocumento', 'UsoCFDI','Serie','FormaPago','MetodoPago','CondicionesDePago','Moneda','Comentarios'], 'string'],
            [['EnviarCorreo'], 'boolean'],
            [['TipoCambio','Serie','NumOrder'], 'number'],
            ['FechaFromAPI', 'date', 'format' => "yyyy-MM-dd'T'HH:mm:ss"]
        ];
    }
}