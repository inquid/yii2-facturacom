<?php
/**
 * Created by PhpStorm.
 * User: Cesar
 * Date: 21/04/2017
 * Time: 12:48 AM
 */

namespace inquid\facturacom;


use yii\base\Component;
use yii\httpclient\Client;

class HttpClient extends Component
{
    const API_VERSION = 'api/v1';
    const URL_FACTURACOM = 'https://factura.com/';
    const URL_FACTURACOM_SANDBOX = 'http://devfactura.in/';

    public $apiKey;
    public $secretKey;
    public $isSandbox = false;

    /**
     * @param string $method
     * @param string $path
     * @param null|array $data
     * @return \yii\httpclient\Response
     */
    protected function sendRequest($method, $path, $data = null)
    {
        $client = new Client(['baseUrl' => $this->getUrl() . '/' . $path]);
        $request = $client->createRequest();
        if ($data) {
            $request->setData($data);
        }
        $request->setHeaders($this->getHeaders());
        $request->setMethod($method);
        $request->setOptions($this->getOptions());
        return $request->send();
    }

    private function getUrl()
    {
        if ($this->isSandbox) {
            return self::URL_FACTURACOM_SANDBOX . self::API_VERSION;
        } else {
            return self::URL_FACTURACOM . self::API_VERSION;
        }
    }

    private function getHeaders()
    {
        return [
            "Content-Type: application/json",
            "F-API-KEY: {$this->apiKey}",
            "F-SECRET-KEY: {$this->secretKey}"
        ];
    }

    private function getOptions()
    {
        return [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
        ];
    }
}