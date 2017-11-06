<?php
/**
 * Created by PhpStorm.
 * User: gogl92
 * Date: 6/11/17
 * Time: 11:34 AM
 */

namespace inquid\facturacom\models;


use yii\base\Model;

/**
 * Class DocumentoAbonado
 * @package inquid\facturacom\models
 */
class DocumentoAbonado extends Model
{

    public $Cuenta;
    public $PagarTotal;
    public $Monto;
    public $Fecha;
    public $Estado;
    public $Referencia;
    public $Nota;

    /**
     * DocumentoAbonado constructor.
     * @param string $Cuenta
     * @param boolean $PagarTotal
     * @param float $Monto
     * @param string $Fecha
     * @param string $Estado
     * @param string $Referencia
     * @param string $Nota
     */
    public function __construct($Cuenta, $PagarTotal, $Monto, $Fecha, $Estado, $Referencia, $Nota)
    {
        $this->Cuenta = $Cuenta;
        $this->PagarTotal = $PagarTotal;
        $this->Monto = $Monto;
        $this->Fecha = $Fecha;
        $this->Estado = $Estado;
        $this->Referencia = $Referencia;
        $this->Nota = $Nota;
    }

}