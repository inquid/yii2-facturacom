<?php

namespace inquid\facturacom\models;

use yii\base\Model;

class Serie extends Model
{
    public $serieID;
    public $serieName;
    public $serieType;

    public function setSerieID($serieID)
    {
        $this->serieID = $serieID;
    }

    public function setSerieName($serieName)
    {
        $this->serieName = $serieName;
    }

    public function setSerieType($serieType)
    {
        $this->serieType = $serieType;
    }
}