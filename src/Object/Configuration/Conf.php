<?php

namespace App\Object\Configuration;

use App\Object\Exception\ConfException;
use App\Object\Exception\FileException;
use App\Object\Exception\XmlException;

class Conf
{
    /**
     * @var string
     */
    private $file;

    /**
     * @var \SimpleXMLElement
     */
    private $xml;

    /**
     * @var
     */
    private $lastMatch;

    /**
     * Conf constructor.
     * @param string $file
     * @throws ConfException
     * @throws FileException
     * @throws XmlException
     */
    public function __construct(string $file)
    {
        if (false === file_exists($file)) {
            throw new FileException(
                sprintf('Файл %s не найден.', basename($file))
            );
        }

        $this->file = $file;
        $this->xml = simplexml_load_file($file, null, LIBXML_NOERROR);

        if (false === \is_object($this->xml)) {
            throw new XmlException(libxml_get_last_error());
        }

        $matches = $this->xml->xpath('/conf');

        if ([] === $matches) {
            throw new ConfException('Корневой элемент conf не найден.');
        }
    }

    /**
     * @throws FileException
     */
    public function write(): void
    {
        if (false === is_writable($this->file)) {
            throw new FileException(
                sprintf(
                    'Файл %s недоступен для записи.',
                    basename($this->file)
                )
            );
        }

        file_put_contents($this->file, $this->xml->asXML());
    }

    /**
     * @param string $str
     * @return null|string
     */
    public function get(string $str): ?string
    {
        $matches = $this->xml->xpath(
            sprintf('/conf/item[@name="%s"]', $str)
        );

        if ([] === $matches) {
            return null;
        }

        $this->lastMatch = $matches[0];

        return (string)$matches[0];
    }

    /**
     * @param string $key
     * @param string $value
     * @throws \Exception
     */
    public function set(string $key, string $value): void
    {
        if (null !== $this->get($key)) {
            $this->lastMatch[0] = $value;

            return;
        }

        $this->xml->addChild('item', $value)
            ->addAttribute('name', $key);
    }
}
