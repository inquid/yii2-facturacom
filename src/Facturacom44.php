<?php
/**
 * Created by PhpStorm.
 * User: gogl92
 * Date: 6/11/17
 * Time: 03:51 PM
 */

namespace inquid\facturacom;


use inquid\facturacom\models\Cliente;
use inquid\facturacom\models\EmpresaFacturadora;
use inquid\facturacom\models\Error;
use inquid\facturacom\models\Factura33;
use inquid\facturacom\models\Serie;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\helpers\Json;

class Facturacom44 extends HttpClientV3
{
    
    /**
     * @param string $rfc
     * @return array|Cliente|Error
     */
    public function getCliente($rfc)
    {
        $this->API_VERSION = 'v1';
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
        $this->API_VERSION = 'v1';
        $model = new Cliente();
        $model->setAttributes($cliente->getAttributes());
        
        if ($model->validate()) {
            try {
                $response = $this->booleanResponse($this->sendRequest('post', 'clients/create', $model->getAttributes()));
                return $response;
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
        $this->API_VERSION = 'v1';
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
        $this->API_VERSION = 'v1';
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
        $this->API_VERSION = 'v1';
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
        $this->API_VERSION = 'v1';
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
        $this->API_VERSION = 'v4';
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
        $this->API_VERSION = 'v4';
        try {
            return $this->modelResponse($this->sendRequest('get', "series"), Serie::className(), true);
        } catch (\Exception $exception) {
            return new Error(500, $exception->getMessage());
        }
    }
    
    /**
     * @param Factura33 $factura
     * @return boolean|Error
     */
    public function createFactura44($factura)
    {
        $this->API_VERSION = 'v4';
        if ($factura->validate()) {
            try {
                return $this->sendRequest('post', 'cfdi40/create', $factura);
            } catch (\Exception $exception) {
                file_put_contents('factura.txt', $exception->getMessage());
                return new Error(500, $exception->getMessage());
            }
        }
        return new Error(500, $factura->getErrors());
    }
    
    /**
     * @param $data
     * @return Error|\yii\httpclient\Response
     */
    public function createComplementoPago($data)
    {
        $this->API_VERSION = 'v3';
        try {
            return $this->sendRequestPlainJson('post', 'cfdi44/complemento/pagos/create', $data);
        } catch (\Exception $exception) {
            return new Error(500, $exception->getMessage());
        }
        return new Error(500, $factura->getErrors());
    }
    
    /**
     * @param string $rfc
     * @param int $month
     * @param integer $year
     * @return Error|static[] Factura
     */
    public function getFacturas($rfc = null, $month = null, $year = null)
    {
        $this->API_VERSION = 'v3';
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
        $params.='&per_page=99999';
        try {
            return $this->sendRequestPlainJson('get', 'cfdi44/list' . $params);
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
        $this->API_VERSION = 'v3';
        try {
            return $this->booleanResponse($this->sendRequest('get', "cfdi44/$uid/cancel"));
        } catch (\Exception $exception) {
            return ['code' => 500, 'message' => $exception->getMessage()];
        }
    }
    
    /**
     * @param $format
     * @param $uid
     * @param string $path
     */
    public function getPdfXmlFiles($format, $uid, $path = "files/facturas/xml/")
    {
        file_put_contents($path . $uid . "." . $format, fopen("https://api.factura.com/publica/cfdi44/$uid/$format", 'r'));
    }
}
