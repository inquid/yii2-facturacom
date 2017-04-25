<?php

namespace inquid\facturacom\models;

use yii\base\Model;

class Cliente extends Model
{
    public $nombre;
    public $apellidos;
    public $email;
    public $telefono;
    public $rfc;
    public $razons;
    public $calle;
    public $numero_exterior;
    public $numero_interior;
    public $colonia;
    public $codpos;
    public $ciudad;
    public $localidad;
    public $delegacion;
    public $estado;
    public $uuid;


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
                    'email',
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
     * @param $rfc
     */
    public function setRFC($rfc)
    {
        $this->rfc = $rfc;
    }

    /**
     * @param $razonSocail
     */
    public function setRazonSocial($razonSocail)
    {
        $this->razons = $razonSocail;
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
     * @param $contacto
     */
    public function setContacto($contacto)
    {
        $this->nombre = $contacto['Nombre'];
        $this->apellidos = $contacto['Apellidos'];
        $this->email = $contacto['Email'];
        $this->telefono = $contacto['Telefono'];
    }

    /**
     * @param $uuid
     */
    public function setUID($uuid)
    {
        $this->uuid = $uuid;
    }

    /**
     * @param $localidad
     */
    public function setLocalidad($localidad)
    {
        $this->localidad = $localidad;
    }
}