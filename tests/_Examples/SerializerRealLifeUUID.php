<?php

namespace Terrazza\Component\Annotation\Tests\_Examples;

class SerializerRealLifeUUID {
    private ?string $value;

    /**
     * @param string|null $value
     */
    public function __construct(string $value=null) {
        $this->value = $value;
    }

    /**
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }
}