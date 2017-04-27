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
}