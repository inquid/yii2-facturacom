<?php
/**
 * Created by PhpStorm.
 * User: gogl92
 * Date: 6/11/17
 * Time: 12:06 PM
 */

namespace inquid\facturacom\models;


use yii\base\Model;

/**
 * Class DataCatalogos
 * @package inquid\facturacom\models
 */
class DataCatalogos extends Model
{
    /**
     * @var string
     */
    public $key;
    /**
     * @var string
     */
    public $name;
    /**
     * @var string
     */
    public $use = "";
    /**
     * @var string
     */
    public $decimals;
}
