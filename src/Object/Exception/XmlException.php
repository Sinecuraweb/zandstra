<?php

namespace App\Object\Exception;

class XmlException extends \Exception
{
    /**
     * @var \LibXMLError
     */
    private $error;

    public function __construct(\LibXMLError $error)
    {
        $message = sprintf(
            '[%s, строка %s, колонка %s] %s.',
            basename($error->file),
            $error->line,
            $error->column,
            $error->message
        );

        $this->error = $error;

        parent::__construct($message, $error->code);
    }

    /**
     * @return \LibXMLError
     */
    public function toLibXmlError(): \LibXMLError
    {
        return $this->error;
    }
}
