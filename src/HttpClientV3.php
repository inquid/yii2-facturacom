<?php
/**
 * Created by PhpStorm.
 * User: Cesar
 * Date: 21/04/2017
 * Time: 12:48 AM
 */

namespace inquid\facturacom;


use app\models\Configuration;
use inquid\facturacom\models\Error;
use Yii;
use yii\base\Component;
use yii\base\Model;
use yii\helpers\Json;
use yii\httpclient\Client;

/**
 * Class HttpClient
 * @package inquid\facturacom
 */
class HttpClientV3 extends Component
{
    public $API_VERSION = 'api/v3';
    const URL_FACTURACOM = 'https://factura.com/';
    const URL_FACTURACOM_SANDBOX = 'http://devfactura.in/';

    private $_options = [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER => false,
    ];

    public $apiKey;
    public $secretKey;
    public $fPlugin='9d4095c8f7ed5785cb14c0e3b033eeb8252416ed';
    public $rfc;
    public $isSandbox = false;

    public function init()
    {
        if (!isset($this->apiKey) && isset($this->rfc)) {
            $key = Configuration::find()->where(['system_type' => 'facturacom_api_key', 'param' => $this->rfc])->select('system_value')->one();
            if (isset($key)) {
                $this->apiKey = $key->system_value;
            }

        }
        if (!isset($this->secretKey) && isset($this->rfc)) {
            $secret = Configuration::find()->where(['system_type' => 'facturacom_api_secret', 'param' => $this->rfc])->select('system_value')->one();
            if (isset($secret))
                $this->secretKey = $secret->system_value;
        }
    }

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
        $request->setOptions($this->_options);
        return $request->send();
    }

    /**
     * @param string $method
     * @param string $path
     * @param null|array $data
     * @return \yii\httpclient\Response
     */
    protected function sendRequestPlainJson($method, $path, $data = null)
    {
        $client = new Client(['baseUrl' => $this->getUrl() . '/' . $path]);
        $request = $client->createRequest();
        $request->setFormat(Client::FORMAT_JSON);
        if ($data) {
            $request->setContent($data);
        }
        $request->setHeaders($this->getHeaders());
        $request->setMethod($method);
        $request->setOptions($this->_options);
        return $request->send();
    }

    /**
     * @param \yii\httpclient\Response $response
     * @param string $className
     * @param bool $isList
     * @return array|object|Model|Error
     */
    protected function modelResponse($response, $className, $isList = false)
    {
        Yii::info(json_encode($response));
        if ($response && ($headers = $response->getHeaders())) {
            if ($headers->get('http-code') == 200 || $headers->get('http-code') == 201) {
                $content = Json::decode($response->getContent());
                $response = isset($content['response']) ? $content['response'] : $content['status'];
                if ($response == 'success') {
                    $data = isset($content['Data']) ? $content['Data'] : $content['data'];
                    if ($isList) {
                        $list = [];
                        foreach ($data as $row) {
                            $row['class'] = $className;
                            $list[] = Yii::createObject($row);
                        }
                        return $list;
                    } else {
                        if ($className == null) {
                            return $data;
                        }
                        $data['class'] = $className;
                        return Yii::createObject($data);
                    }
                } elseif ($response == 'error') {
                    return new Error($headers->get('http-code'), $content['message']);
                }
            } else {
                return new Error($headers->get('http-code'));
            }
        }
        return new Error(500);
    }

    /**
     * @param \yii\httpclient\Response $response
     * @return boolean|Error
     */
    protected function booleanResponse($response)
    {
        if ($response && ($headers = $response->getHeaders())) {
            if ($headers->get('http-code') == 200 || $headers->get('http-code') == 201) {
                $content = Json::decode($response->getContent());
                if ($content['response'] == 'success') {
                    return true;
                } elseif ($content['response'] == 'error') {
                    return new Error($headers->get('http-code'), $content['message']);
                }
            }
        }
        return new Error(500);
    }

    /**
     * Gets sandbox or production url endpoint
     * @return string
     */
    private function getUrl()
    {
        if ($this->isSandbox) {
            return self::URL_FACTURACOM_SANDBOX . $this->API_VERSION;
        } else {
            return self::URL_FACTURACOM . $this->API_VERSION;
        }
    }

    /**
     * @return array headers with auth
     */
    private function getHeaders()
    {
        return [
            "Content-Type: application/json",
            "F-API-KEY: {$this->apiKey}",
            "F-SECRET-KEY: {$this->secretKey}",
            "F-PLUGIN: {$this->fPlugin}"
        ];
    }
}
