<?php

namespace inquid\facturacom;

use inquid\facturacom\models\Cliente;
use inquid\facturacom\models\EmpresaFacturadora;
use inquid\facturacom\models\Factura;
use inquid\facturacom\models\Producto;
use inquid\facturacom\models\Serie;
use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\helpers\Json;


class Facturacom extends HttpClient
{

    /**
     * @param string $rfc
     * @return null|Cliente
     */
    public function getCliente($rfc)
    {
        return $this->formatResponse($this->sendRequest('get', "clients/$rfc"), Cliente::className());
    }

    /**
     * @param Model|ActiveRecord $cliente
     * @return boolean
     */
    public function createCliente($cliente)
    {
        $model = new Cliente();
        $model->setAttributes($cliente->getAttributes());
        if ($cliente->validate()) {
            return $this->booleanResponse($this->sendRequest('post', 'clients/create', $model->getAttributes()));
        }
        return false;
    }

    /**
     * @param Model|ActiveRecord $cliente
     * @param string $uuid
     * @return boolean
     */
    public function updateCliente($cliente, $uuid)
    {
        $model = new Cliente();
        $model->setAttributes($cliente->getAttributes());
        if ($cliente->validate()) {
            return $this->booleanResponse($this->sendRequest('post', "clients/$uuid/update", $model->getAttributes()));
        }
        return false;
    }

    /**
     * @return static[] Cliente|null
     */
    public function getClientes()
    {
        return $this->formatResponse($this->sendRequest('get', "clients"), Cliente::className(), true);
    }

    /**
     * @return EmpresaFacturadora|null
     */
    public function getCurrentEmpresa()
    {
        return $this->formatResponse($this->sendRequest('get', "current/account"), EmpresaFacturadora::className());
    }

    /**
     * @param string $uuid
     * @return EmpresaFacturadora|null
     */
    public function getEmpresa($uuid)
    {
        return $this->formatResponse($this->sendRequest('get', "account/$uuid"), EmpresaFacturadora::className());
    }

    /**
     * @param Model|ActiveRecord $empresaFacturadora
     * @param string $uuid
     * @return boolean
     */
    public function updateEmpresa($empresaFacturadora, $uuid)
    {
        $model = new Cliente();
        $model->setAttributes($empresaFacturadora->getAttributes());
        if ($empresaFacturadora->validate()) {
            return $this->booleanResponse($this->sendRequest('post', "account/$uuid/update", $model->getAttributes()));
        }
        return false;
    }

    public function getSeries()
    {
        return $this->formatResponse($this->sendRequest('get', "series"), Serie::className(), true);
    }

    /**
     * @param Model|ActiveRecord $factura
     * @return boolean
     */
    public function createFactura($factura)
    {
        $model = new Factura();
        $model->setAttributes($factura->getAttributes());
        if ($factura->validate()) {
            return $this->booleanResponse($this->sendRequest('post', 'invoice/create', $model->getAttributes()));
        }
        return false;
    }

    /**
     * @param string $rfc
     * @param int $month
     * @param integer $year
     * @return static[] Factura|null
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
        return $this->formatResponse($this->sendRequest('post', 'invoices' . $params), Factura::className(), true);
    }

    /**
     * @param string $uid
     * @return bool
     */
    public function cancelFactura($uid)
    {
        return $this->booleanResponse($this->sendRequest('get', "invoice/$uid/cancel"));
    }

    public function getPdfXmlFiles($format, $uid)
    {
        return $this->formatResponse($this->sendRequest('get', "invoice/$uid/($format)"), Factura::className(), true);
    }

    /**
     * @param \yii\httpclient\Response $response
     * @param string $className
     * @param bool $isList
     * @return array|Cliente|EmpresaFacturadora|Factura|Producto|Serie|Object|null
     */
    private function formatResponse($response, $className, $isList = false)
    {
        if ($response && ($headers = $response->getHeaders())) {
            if ($headers->get('http-code') == 200 || $headers->get('http-code') == 201) {
                $content = Json::decode($response->getContent());
                if ($content['status'] == 'success') {
                    $data = isset($content['Data']) ? $content['Data'] : $content['data'];
                    if ($isList) {
                        $list = [];
                        foreach ($data as $row) {
                            $row['class'] = $className;
                            $list[] = Yii::createObject($row);
                        }
                        return $list;
                    } else {
                        $data['class'] = $className;
                        return Yii::createObject($data);
                    }
                }
            }
        }
        return null;
    }

    /**
     * @param \yii\httpclient\Response $response
     * @return boolean
     */
    private function booleanResponse($response)
    {
        if ($response && ($headers = $response->getHeaders())) {
            if ($headers->get('http-code') == 200 || $headers->get('http-code') == 201) {
                $content = Json::decode($response->getContent());
                if ($content['status'] == 'success') {
                    return true;
                }
            }
        }
        return false;
    }
}