<?php

namespace inquid\facturacom\models;

use yii\base\Model;

/**
 * Class EmpresaFacturadora
 * @package inquid\facturacom\models
 */
class EmpresaFacturadora extends Model
{
    public $razons;
    public $rfc;
    public $regimenFiscal;
    public $calle;
    public $numero_exterior;
    public $numero_interior;
    public $colonia;
    public $codpos;
    public $ciudad;
    public $estado;
    public $delegacion;
    public $email;
    public $uuid;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [
                [
                    'email',
                    'rfc',
                    'razons',
                    'calle',
                    'numero_exterior',
                    'codpos',
                    'colonia',
                    'estado',
                    'ciudad'
                ],
                'required'
            ],
            ['email', 'email'],
            ['rfc', 'string', 'length' => [12, 13]],
            ['codpos', 'string', 'length' => [5, 5]],
            [
                [
                    'email',
                    'razons',
                    'calle',
                    'numero_exterior',
                    'colonia',
                    'estado',
                    'ciudad'
                ],
                'string',
            ],
        ];
    }

    /**
     * @param string $uid
     */
    public function setUid($uid)
    {
        $this->uuid = $uid;
    }

    /**
     * @param string $razonSocial
     */
    public function setRazon_social($razonSocial)
    {
        $this->razons = $razonSocial;
    }

    /**
     * @param string $regimenFiscal
     */
    public function setRegimen_fiscal($regimenFiscal)
    {
        $this->regimenFiscal = $regimenFiscal;
    }

    /**
     * @param string $exterior
     */
    public function setExterior($exterior)
    {
        $this->numero_exterior = $exterior;
    }

    /**
     * @param string $interior
     */
    public function setInterior($interior)
    {
        $this->numero_interior = $interior;
    }
}