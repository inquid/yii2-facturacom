<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 2/23/18
 * Time: 11:04 AM
 */

namespace inquid\facturacom\models;


use yii\base\Model;

/**
 * Class Relacionados
 * @package inquid\facturacom\models
 */
class Relacionados extends Model
{
    /**
     * @var string $IdDocumento
     */
    public $IdDocumento;
    /**
     * @var string $MonedaDR
     */
    public $MonedaDR;
    /**
     * @var string $TipoCambioDR
     */
    public $TipoCambioDR;
    /**
     * @var string $MetodoDePagoDR
     */
    public $MetodoDePagoDR;
    /**
     * @var string $NumParcialidad
     */
    public $NumParcialidad;
    /**
     * @var string $ImpSaldoAnt
     */
    public $ImpSaldoAnt;
    /**
     * @var string $ImpPagado
     */
    public $ImpPagado;
    /**
     * @var string $ImpSaldoInsoluto
     */
    public $ImpSaldoInsoluto;
}