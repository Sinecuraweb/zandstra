<?php

namespace App\ObjectsAndDesign\Handler;

abstract class ParamHandler
{
    /**
     * @var string
     */
    protected $source;

    /**
     * @var array
     */
    protected $params = [];

    public function __construct(string $source)
    {
        $this->source = $source;
    }

    /**
     * @return bool
     */
    abstract public function write(): bool;

    /**
     * @return bool
     */
    abstract public function read(): bool;

    /**
     * @param string $fileName
     * @return ParamHandler|XmlParamHandler|TextParamHandler
     */
    public static function getInstance(string $fileName): ParamHandler
    {
        return preg_match('/\.xml$/i', $fileName)
            ? new XmlParamHandler($fileName)
            : new TextParamHandler($fileName);
    }

    /**
     * @param string $key
     * @param string $val
     */
    public function addParam(string $key, string $val): void
    {
        $this->params[$key] = $val;
    }

    /**
     * @return array
     */
    public function toAllParams(): array
    {
        return $this->params;
    }
}
