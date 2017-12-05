<?php
/**
 * Created by PhpStorm.
 * User: gogl92
 * Date: 6/11/17
 * Time: 11:56 AM
 */

namespace inquid\facturacom;


use inquid\facturacom\HttpClientV3;
use inquid\facturacom\models\DataCatalogos;
use inquid\facturacom\models\Error;
use yii\base\Component;

class Catalogos extends HttpClientV3
{
    /**
     * @return Error|static[] DataCatalogos
     */
    public function getAduanas()
    {
        try {
            return $this->modelResponse($this->sendRequest('get', "catalogo/Aduana"), DataCatalogos::className(), true);
        } catch (\Exception $exception) {
            return new Error(500, $exception->getMessage());
        }
    }

    /**
     * @return Error|static[] DataCatalogos
     */
    public function getUnidades()
    {
        try {
            return $this->modelResponse($this->sendRequest('get', "catalogo/ClaveUnidad"), DataCatalogos::className(), true);
        } catch (\Exception $exception) {
            return new Error(500, $exception->getMessage());
        }
    }
    /**
     * @return Error|static[] DataCatalogos
     */
    public function getFormasPago()
    {
        try {
            return $this->modelResponse($this->sendRequest('get', "catalogo/FormaPago"), DataCatalogos::className(), true);
        } catch (\Exception $exception) {
            return new Error(500, $exception->getMessage());
        }
    }
    /**
     * @return Error|static[] DataCatalogos
     */
    public function getImpuestos()
    {
        try {
            return $this->modelResponse($this->sendRequest('get', "catalogo/Impuesto"), DataCatalogos::className(), true);
        } catch (\Exception $exception) {
            return new Error(500, $exception->getMessage());
        }
    }
    /**
     * @return Error|static[] DataCatalogos
     */
    public function getMetodosPago()
    {
        try {
            return $this->modelResponse($this->sendRequest('get', "catalogo/MetodoPago"), DataCatalogos::className(), true);
        } catch (\Exception $exception) {
            return new Error(500, $exception->getMessage());
        }
    }
    /**
     * @return Error|static[] DataCatalogos
     */
    public function getMonedas()
    {
        try {
            return $this->modelResponse($this->sendRequest('get', "catalogo/Moneda"), DataCatalogos::className(), true);
        } catch (\Exception $exception) {
            return new Error(500, $exception->getMessage());
        }
    }
    /**
     * @return Error|static[] DataCatalogos
     */
    public function getPaises()
    {
        try {
            return $this->modelResponse($this->sendRequest('get', "catalogo/Pais"), DataCatalogos::className(), true);
        } catch (\Exception $exception) {
            return new Error(500, $exception->getMessage());
        }
    }
    /**
     * @return Error|static[] DataCatalogos
     */
    public function getRegimenesFiscales()
    {
        try {
            return $this->modelResponse($this->sendRequest('get', "catalogo/RegimenFiscal"), DataCatalogos::className(), true);
        } catch (\Exception $exception) {
            return new Error(500, $exception->getMessage());
        }
    }
    /**
     * @return Error|static[] DataCatalogos
     */
    public function getTiposRelaciones()
    {
        try {
            return $this->modelResponse($this->sendRequest('get', "catalogo/Relacion"), DataCatalogos::className(), true);
        } catch (\Exception $exception) {
            return new Error(500, $exception->getMessage());
        }
    }
    /**
     * @return Error|static[] DataCatalogos
     */
    public function getUsosCfdi()
    {
        try {
            return $this->modelResponse($this->sendRequest('get', "catalogo/UsoCfdi"), DataCatalogos::className(), true);
        } catch (\Exception $exception) {
            return new Error(500, $exception->getMessage());
        }
    }
}