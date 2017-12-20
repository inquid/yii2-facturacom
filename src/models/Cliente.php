<?php

namespace inquid\facturacom\models;

use yii\base\Model;

/**
 * Class Cliente
 * @package inquid\facturacom\models
 */
class Cliente extends Model
{
    public $uuid;
    public $razons;
    public $rfc;
    public $calle;
    public $numero_exterior;
    public $numero_interior;
    public $colonia;
    public $codpos;
    public $ciudad;
    public $delegacion;
    public $estado;
    public $localidad;
    public $NumRegIdTrib;
    public $Pais;
    /* Contacto */
    public $nombre;
    public $apellidos;
    public $email;
    public $telefono;
    /* Extras */
    public $cfdis;
    /* Cuentas de Banco */
    public $cuentas_banco = [];

    /**
     * Cliente constructor.
     * @param $razons
     * @param $rfc
     * @param $calle
     * @param $numero_exterior
     * @param $numero_interior
     * @param $colonia
     * @param $codpos
     * @param $ciudad
     * @param $delegacion
     * @param $estado
     * @param $localidad
     * @param $NumRegIdTrib
     * @param $nombre
     * @param $apellidos
     * @param $email
     * @param $telefono
     * @param array $cuentas_banco
     */
    public function setClient($razons, $rfc, $calle, $numero_exterior, $numero_interior, $colonia, $codpos, $ciudad, $delegacion, $estado, $localidad, $NumRegIdTrib, $nombre, $apellidos, $email, $telefono, array $cuentas_banco, $pais = "México")
    {
        $this->razons = $razons;
        $this->rfc = $rfc;
        $this->calle = $calle;
        $this->numero_exterior = $numero_exterior;
        $this->numero_interior = $numero_interior;
        $this->colonia = $colonia;
        $this->codpos = $codpos;
        $this->ciudad = $ciudad;
        $this->delegacion = $delegacion;
        $this->estado = $estado;
        $this->localidad = $localidad;
        $this->NumRegIdTrib = $NumRegIdTrib;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->cuentas_banco = $cuentas_banco;
        parent::__construct();
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [
                [
                    'nombre',
                    'apellidos',
                    'rfc',
                    'razons',
                    'calle',
                    'numero_exterior',
                    'codpos',
                    'estado',
                    'ciudad'
                ],
                'required'
            ],
            ['uuid', 'number'],
            ['cfdis', 'integer'],
            ['email', 'email'],
            ['rfc', 'string', 'length' => [12, 13]],
            ['codpos', 'string', 'length' => [5, 5]],
            [
                [
                    'nombre',
                    'apellidos',
                    'email',
                    'telefono',
                    'razons',
                    'calle',
                    'numero_exterior',
                    'numero_interior',
                    'colonia',
                    'estado',
                    'ciudad',
                    'delegacion',
                    'localidad'
                ],
                'string',
            ],
        ];
    }

    /**
     * @param $uuid
     */
    public function setUID($uuid)
    {
        $this->uuid = $uuid;
    }

    /**
     * @param $razonSocail
     */
    public function setRazonSocial($razonSocail)
    {
        $this->razons = $razonSocail;
    }

    /**
     * @param $rfc
     */
    public function setRFC($rfc)
    {
        $this->rfc = $rfc;
    }

    /**
     * @param $calle
     */
    public function setCalle($calle)
    {
        $this->calle = $calle;
    }

    /**
     * @param $numero
     */
    public function setNumero($numero)
    {
        $this->numero_exterior = $numero;
    }

    /**
     * @param $interior
     */
    public function setInterior($interior)
    {
        $this->numero_interior = $interior;
    }

    /**
     * @param $colonia
     */
    public function setColonia($colonia)
    {
        $this->colonia = $colonia;
    }

    /**
     * @param $codigoPostal
     */
    public function setCodigoPostal($codigoPostal)
    {
        $this->codpos = $codigoPostal;
    }

    /**
     * @param $ciudad
     */
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;
    }

    /**
     * @param $delegacion
     */
    public function setDelegacion($delegacion)
    {
        $this->delegacion = $delegacion;
    }

    /**
     * @param $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     * @param $numRegIdTrib
     */
    public function setNumRegIdTrib($numRegIdTrib)
    {
        $this->NumRegIdTrib = $numRegIdTrib;
    }

    /**
     * @param $localidad
     */
    public function setLocalidad($localidad)
    {
        $this->localidad = $localidad;
    }

    /**
     * @param CuentasBanco $cuentas_banco
     */
    public function setCuentasBanco($cuentas_banco)
    {
        $this->cuentas_banco = $cuentas_banco;
    }

    /**
     * @param $contacto
     */
    public function setContacto($contacto)
    {
        $this->nombre = $contacto['Nombre'];
        $this->apellidos = $contacto['Apellidos'];
        $this->email = $contacto['Email'];
        $this->telefono = $contacto['Telefono'];
    }

}