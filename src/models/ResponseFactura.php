<?php
/**
 * Created by PhpStorm.
 * User=> macbook
 * Date=> 12/4/17
 * Time=> 4=>05 PM
 */

namespace inquid\facturacom\models;


use yii\base\Model;

class ResponseFactura extends Model
{
    public $status = '';
    public $SAT = [
        'UUID' => '',
        'FechaTimbrado' => '',
        'noCertificadoSAT' => '',
        'version' => '',
        'selloSAT' => '',
        'selloCFD' => ''
    ];
    public $INV = [
        'Serie' => '',
        'Folio' => '',
        'UID' => '',
    ];
    public $message = '';
}