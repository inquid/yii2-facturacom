<?php

namespace inquid\facturacom\models;

use yii\base\Model;

/**
 * Class Serie
 * @package inquid\facturacom\models
 */
class Serie extends Model
{
    public $serieID;
    public $serieName;
    public $serieType;
    public $serieDescription;
    public $serieStatus;

    /**
     * @return mixed
     */
    public function getSerieID()
    {
        return $this->serieID;
    }

    /**
     * @return mixed
     */
    public function getSerieName()
    {
        return $this->serieName;
    }

    /**
     * @return mixed
     */
    public function getSerieType()
    {
        return $this->serieType;
    }

    /**
     * @param string $serieID
     */
    public function setSerieID($serieID)
    {
        $this->serieID = $serieID;
    }

    /**
     * @param string $serieName
     */
    public function setSerieName($serieName)
    {
        $this->serieName = $serieName;
    }

    /**
     * @param string $serieType
     */
    public function setSerieType($serieType)
    {
        $this->serieType = $serieType;
    }
    
    /**
     * @return mixed
     */
    public function getSerieDescription()
    {
        return $this->serieDescription;
    }
    
    /**
     * @param string $serieDescription
     */
    public function setSerieDescription($serieDescription){
        $this->serieDescription = $serieDescription;
    }
    
    /**
     * @return mixed
     */
    public function getSerieStatus(){
        return $this->serieStatus;
    }
    
    /**
     * @param string $serieStatus
     */
    public function setSerieStatus($serieStatus)
    {
        $this->serieStatus = $serieStatus;
    }
}