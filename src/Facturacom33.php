<?php
/**
 * Created by PhpStorm.
 * User: gogl92
 * Date: 6/11/17
 * Time: 03:51 PM
 */

namespace inquid\facturacom;


use inquid\facturacom\models\Factura33;
use inquid\facturacom\models\Error;

class Facturacom33 extends HttpClientV3
{

    /**
     * @param string $rfc
     * @return array|Cliente|Error
     */
    public function getCliente($rfc)
    {
        $this->API_VERSION = 'api/v1';
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
        $this->API_VERSION = 'api/v1';
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
        $this->API_VERSION = 'api/v1';
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
        $this->API_VERSION = 'api/v1';
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
        $this->API_VERSION = 'api/v1';
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
        $this->API_VERSION = 'api/v1';
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
        $this->API_VERSION = 'api/v1';
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
        $this->API_VERSION = 'api/v1';
        try {
            return $this->modelResponse($this->sendRequest('get', "series"), Serie::className(), true);
        } catch (\Exception $exception) {
            return new Error(500, $exception->getMessage());
        }
    }

    /**
     * @param Factura33
     * @return boolean|Error
     */
    public function createFactura33($factura)
    {
        $model = new Factura33();
        $model->setAttributes($factura->getAttributes());
        if ($factura->validate()) {
            try {
                return $this->booleanResponse($this->sendRequest('post', 'cfdi33/create', $model->getAttributes()));
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