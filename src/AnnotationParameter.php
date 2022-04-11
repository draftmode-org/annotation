<?php

namespace Terrazza\Component\Annotation;

class AnnotationParameter implements IAnnotationType {
    use AnnotationTypeTrait;
    private bool $variadic=false;
    private bool $defaultValueAvailable=false;
    /** @var mixed  */
    private $defaultValue=null;

    public function isVariadic() : bool {
        return $this->variadic;
    }
    public function setVariadic(bool $variadic) : void {
        $this->variadic = $variadic;
    }

    public function setDefaultValueAvailable(bool $available):void {
        $this->defaultValueAvailable=$available;
    }
    public function isDefaultValueAvailable() : bool {
        return $this->defaultValueAvailable;
    }

    public function setDefaultValue($value): void {
        $this->defaultValue = $value;
    }
    public function getDefaultValue() {
        return $this->defaultValue;
    }
}