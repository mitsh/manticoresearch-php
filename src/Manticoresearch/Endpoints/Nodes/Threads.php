<?php


namespace Manticoresearch\Endpoints\Nodes;

use Manticoresearch\Endpoints\EmulateBySql;

class Threads extends EmulateBySql
{
    /**
     * @var string
     */
    protected $_index;

    public function setBody($params)
    {
        $options = [];
        if (count($params) > 2) {
            foreach (array_splice($parameters, 2) as $name => $value) {
                $options[] = "$value=$name";
            }
        }

        return parent::setBody(['query' => "SHOW THREADS " . ((count($options)>0)?' OPTION '.implode(",", $options):'')]);
    }
}