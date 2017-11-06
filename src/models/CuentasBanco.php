<?php
/**
 * Created by PhpStorm.
 * User: gogl92
 * Date: 1/11/17
 * Time: 10:15 PM
 */

namespace inquid\facturacom\models;


use yii\base\Model;

class CuentasBanco extends Model
{
    public $banco;
    public $cuenta;

    /**
     * CuentasBanco constructor.
     * @param string $banco
     * @param int $cuenta
     */
    public function __construct($banco, $cuenta)
    {
        $this->banco = $banco;
        $this->cuenta = $cuenta;
        parent::__construct();
    }

    public function rules()
    {
        return [
            ['banco', 'string', 'max' => 200],
            ['cuenta', 'number', 'max' => 4],
        ];
    }

    /**
     * @param string $banco
     */
    public function setBanco($banco)
    {
        $this->banco = $banco;
    }

    /**
     * @param int $cuenta
     */
    public function setCuenta($cuenta)
    {
        $this->cuenta = $cuenta;
    }

}