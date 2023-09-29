<?php

namespace inquid\facturacom\models;

use yii\base\Model;

/**
 * Class Cliente
 * @package inquid\facturacom\models
 */
class CartaPorte extends Model
{
    public $Version;
    public $TranspInternac;
    public $TotalDistRec;
    public $NumLicencia;
    public $RFCFigura;
    public $TipoFigura;
    public $NumTotalMercancias;
    public $PesoBrutoTotal;
    public $UnidadPeso;
    public $BienesTransp;
    public $Cantidad;
    public $ClaveUnidad;
    public $Descripcion;
    public $PesoEnKg;
    public $ValorMercancia;
    public $IDDestino;
    public $IDOrigen;
    public $NumPermisoSCT;
    public $PermSCT;
    public $AnioModeloVM;
    public $ConfigVehicular;
    public $PlacaVM;
    public $AseguraRespCivil;
    public $PolizaRespCivil;
    public $AseguraCarga;
    public $PlacaRemolque;
    public $SubTipoRem;
    public $FechaHoraSalidaLlegada;
    public $IDUbicacion;
    public $RFCRemitenteDestinatario;
    public $TipoUbicacion;
    public $Calle;
    public $NumeroExterior;
    public $Colonia;
    public $Localidad;
    public $Municipio;
    public $Estado;
    public $Pais;
    public $CodigoPostal;
    public $DistanciaRecorrida;
}
