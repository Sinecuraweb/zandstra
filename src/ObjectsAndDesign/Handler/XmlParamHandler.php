<?php

namespace App\ObjectsAndDesign\Handler;

class XmlParamHandler extends ParamHandler
{
    /**
     * @return bool
     */
    public function write(): bool
    {
        $xml = new \SimpleXMLElement('<params/>');

        foreach ($this->params as $key => $value) {
            $xml->addChild($key, $value);
        }

        return $xml->asXML($this->source);
    }

    /**
     * @return bool
     */
    public function read(): bool
    {
        try {
            $this->params = (array)new \SimpleXMLElement(
                $this->source,
                null,
                true
            );

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
