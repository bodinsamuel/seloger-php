<?php
namespace Seloger;

class Search extends Request
{
    protected $type = 'search';

    static protected $_ORDER = [
        'date_asc'     => 'a_dt_crea',
        'date_desc'    => 'd_dt_crea',
        'price_asc'    => 'a_px',
        'price_desc'   => 'd_px',
        'surface_asc'  => 'a_surface',
        'surface_desc' => 'd_surface'
    ];

    static protected $_TYPE = [
        'rent' => 1,
        'sell' => 2
    ];

    static protected $_PROPERTY = [
        'appartement' => 1,
        'maison'      => 2,
        'parking'     => 3,
        'terrain'     => 4,
        'boutique'    => 6,
        'local'       => 7,
        'bureaux'     => 8,
        'loft'        => 9,
        'immeuble'    => 11,
        'batiment'    => 12,
        'chateau'     => 13,
        'hotel'       => 14,
        'programme'   => 15
    ];

    static protected $_SI = [
        'elevator'  => 'ascensceur',
        'digicode'  => 'digicode',
        'intercom'  => 'interphone',
        'caretaker' => 'gardien',
        'pool'      => 'piscine',
        'balcony'   => 'balcon',
        'parking'   => 'parking',
        'box'       => 'box',
        'cellar'    => 'cave'
    ];

    public function page($value)
    {
        $this->setParams('SEARCHpg', (int)$value);
    }

    public function order($value)
    {
        if (!isset(self::$_ORDER[$value]))
            throw new Exception('[SELOGER] wrong order');

        $this->setParams('tri', self::$_ORDER[$value]);
    }

    public function type($value)
    {
        if (!isset(self::$_TYPE[$value]))
            throw new Exception('[SELOGER] wrong type');

        $this->setParams('idtt', self::$_TYPE[$value]);
    }

    public function property($values)
    {
        $final = [];
        $values = (array)$values;
        foreach ($values as $value)
        {
            if (!isset(self::$_PROPERTY[$value]))
                throw new Exception('[SELOGER] wrong property' . $value);

            $final[] = self::$_PROPERTY[$value];
        }
        $this->setParams('idtypebien', implode(',', (array)$final));
    }

    public function zipcode($values)
    {
        $this->setParams('ci', implode(',', (array)$values));
    }

    public function price($min = null, $max = null)
    {
        if (isset($min))
            $this->setParams('pxmin', ($min > 0 ? (int)$min : 0));
        if (isset($max))
            $this->setParams('pxmax', ($max > 0 ? (int)$max : 0));
    }

    public function surface($min = null, $max = null)
    {
        if (isset($min))
            $this->setParams('surfacemin', ($min > 0 ? (int)$min : 0));
        if (isset($max))
            $this->setParams('surfacemax', ($max > 0 ? (int)$max : 0));
    }

    public function surface_land($min = null, $max = null)
    {
        if (isset($min))
            $this->setParams('surf_terrainmin', ($min > 0 ? (int)$min : 0));
        if (isset($max))
            $this->setParams('surf_terrainmax', ($max > 0 ? (int)$max : 0));
    }

    public function room($values)
    {
        $final = [];
        foreach ($values as $value)
        {
            if(is_int($value))
            {
                if ($values >= 5)
                    $final[] = '+5';
                else
                    $final[] = $value;
            }
            elseif ($value === 'all')
            {
                $final[] = 'all';
            }
        }
        $this->setParams('piece', implode(',', (array)$values));
    }

    public function media($value)
    {
        $this->setParams('photo', (bool)$value == true ? 10 : 0);
    }

    public function si($name, $value)
    {
        if (!isset(self::$_SI[$name]))
            throw new Exception('[SELOGER] wrong si ' . $name);

        $this->setParams('si_'. self::$_SI[$name], (int)$value);
    }
}
