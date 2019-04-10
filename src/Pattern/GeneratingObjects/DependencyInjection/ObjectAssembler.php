<?php

namespace App\Pattern\GeneratingObjects\DependencyInjection;

class ObjectAssembler
{
    /**
     * @var array
     */
    private $components = [];

    public function __construct(string $configuration)
    {
        $this->configure($configuration);
    }

    /**
     * @param string $configuration
     */
    private function configure(string $configuration): void
    {
        $data = yaml_parse_file($configuration);

        foreach ($data['objects'] as $name => $args) {
            $args = $args['arguments'];
            $this->components[$name] = function () use ($name, $args) {
                $expandeArgs = [];
                foreach ($args as $arg) {
                    $expandeArgs[] = new $arg();
                }

                return (new \ReflectionClass($name))
                    ->newInstanceArgs($expandeArgs);
            };
        }
    }

    /**
     * @param string $class
     * @return object
     */
    public function toComponent(string $class): object
    {
        if (!isset($this->components[$class])) {
            throw new \RuntimeException("Unknown component '{$class}'.");
        }

        return $this->components[$class]();
    }
}
