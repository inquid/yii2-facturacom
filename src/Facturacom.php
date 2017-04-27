<?php

namespace inquid\facturacom;

use inquid\facturacom\models\Cliente;
use inquid\facturacom\models\EmpresaFacturadora;
use inquid\facturacom\models\Error;
use inquid\facturacom\models\Factura;
use inquid\facturacom\models\Serie;
use yii\base\Model;
use yii\db\ActiveRecord;


/**
 * Class Facturacom
 * @package inquid\facturacom
 */
class Facturacom extends HttpClient
{

    /**
     * @param string $rfc
     * @return array|Cliente|Error
     */
    public function getCliente($rfc)
    {
        try {
            return $this->modelResponse($this->sendRequest('get', "clients/$rfc"), Cliente::className());
        } catch (\Exception $exception) {
            return new Error(500, $exception->getMessage());
        }
    }

    /**
     * @param Model|ActiveRecord $cliente
     * @return boolean|Error
     */
    public function createCliente($cliente)
    {
        $model = new Cliente();
        $model->setAttributes($cliente->getAttributes());
        if ($cliente->validate()) {
            try {
                return $this->booleanResponse($this->sendRequest('post', 'clients/create', $model->getAttributes()));
            } catch (\Exception $exception) {
                return new Error(500, $exception->getMessage());
            }
        }
        return new Error(500, $model->getErrors());
    }

    /**
     * @param Model|ActiveRecord $cliente
     * @param string $uuid
     * @return boolean|Error
     */
    public function updateCliente($cliente, $uuid)
    {
        $model = new Cliente();
        $model->setAttributes($cliente->getAttributes());
        if ($cliente->validate()) {
            try {
                return $this->booleanResponse($this->sendRequest('post', "clients/$uuid/update",
                    $model->getAttributes()));
            } catch (\Exception $exception) {
                return new Error(500, $exception->getMessage());
            }
        }
        return new Error(500, $model->getErrors());
    }

    /**
     * @return Error|static[] Cliente
     */
    public function getClientes()
    {
        try {
            return $this->modelResponse($this->sendRequest('get', "clients"), Cliente::className(), true);
        } catch (\Exception $exception) {
            return new Error(500, $exception->getMessage());
        }
    }

    /**
     * @return EmpresaFacturadora|Error
     */
    public function getCurrentEmpresa()
    {
        try {
            return $this->modelResponse($this->sendRequest('get', "current/account"), EmpresaFacturadora::className());
        } catch (\Exception $exception) {
            return new Error(500, $exception->getMessage());
        }
    }

    /**
     * @param string $uuid
     * @return EmpresaFacturadora|Error
     */
    public function getEmpresa($uuid)
    {
        try {
            return $this->modelResponse($this->sendRequest('get', "account/$uuid"), EmpresaFacturadora::className());
        } catch (\Exception $exception) {
            return new Error(500, $exception->getMessage());
        }
    }

    /**
     * @param Model|ActiveRecord $empresaFacturadora
     * @param string $uuid
     * @return boolean|Error
     */
    public function updateEmpresa($empresaFacturadora, $uuid)
    {
        $model = new Cliente();
        $model->setAttributes($empresaFacturadora->getAttributes());
        if ($empresaFacturadora->validate()) {
            try {
                return $this->booleanResponse($this->sendRequest('post', "account/$uuid/update",
                    $model->getAttributes()));
            } catch (\Exception $exception) {
                return new Error(500, $exception->getMessage());
            }
        }
        return new Error(500, $model->getErrors());
    }

    /**
     * @return array|Error
     */
    public function getSeries()
    {
        try {
            return $this->modelResponse($this->sendRequest('get', "series"), Serie::className(), true);
        } catch (\Exception $exception) {
            return new Error(500, $exception->getMessage());
        }
    }

    /**
     * @param Model|ActiveRecord $factura
     * @return boolean|Error
     */
    public function createFactura($factura)
    {
        $model = new Factura();
        $model->setAttributes($factura->getAttributes());
        if ($factura->validate()) {
            try {
                return $this->booleanResponse($this->sendRequest('post', 'invoice/create', $model->getAttributes()));
            } catch (\Exception $exception) {
                return new Error(500, $exception->getMessage());
            }
        }
        return new Error(500, $model->getErrors());
    }

    /**
     * @param string $rfc
     * @param int $month
     * @param integer $year
     * @return Error|static[] Factura
     */
    public function getFacturas($rfc = null, $month = null, $year = null)
    {
        $params = '/?month=';
        if ($month) {
            $params .= $month;
        }
        $params .= '&?year=';
        if ($year) {
            $params .= $year;
        }
        $params .= '&rfc=';
        if ($rfc) {
            $params .= $rfc;
        }
        try {
            return $this->modelResponse($this->sendRequest('post', 'invoices' . $params), Factura::className(), true);
        } catch (\Exception $exception) {
            return new Error(500, $exception->getMessage());
        }
    }

    /**
     * @param string $uid
     * @return bool|Error
     */
    public function cancelFactura($uid)
    {
        try {
            return $this->booleanResponse($this->sendRequest('get', "invoice/$uid/cancel"));
        } catch (\Exception $exception) {
            return new Error(500, $exception->getMessage());
        }
    }

    /**
     * @param $format
     * @param $uid
     * @return string|Error
     */
    public function getPdfXmlFiles($format, $uid)
    {
        try {
            return $this->modelResponse($this->sendRequest('get', "invoice/$uid/($format)"), Factura::className(),
                true);
        } catch (\Exception $exception) {
            return new Error(500, $exception->getMessage());
        }
    }
}