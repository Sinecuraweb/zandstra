<?php

namespace App\ObjectsAndDesign\Handler;

class TextParamHandler extends ParamHandler
{
    /**
     * @return bool
     */
    public function write(): bool
    {
        return false !== file_put_contents($this->source,
                json_encode($this->params, JSON_UNESCAPED_UNICODE));
    }

    /**
     * @return bool
     */
    public function read(): bool
    {
        $this->params = json_decode(file_get_contents($this->source), true);

        return null !== $this->params;
    }
}
