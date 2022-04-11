<?php

namespace Terrazza\Component\Annotation;

trait AnnotationTypeTrait {
    private string $name;
    private bool $array=false;
    private bool $builtIn=false;
    private bool $optional=false;
    private ?string $type=null;
    private ?string $declaringClass=null;

    private ?string $patterns=null;
    private ?string $format=null;
    private ?int $minLength=null;
    private ?int $maxLength=null;
    private ?int $minItems=null;
    private ?int $maxItems=null;

    public function __construct (string $name) {
        $this->name = $name;
    }

    public function isArray() : bool {
        return $this->array;
    }
    public function setArray(bool $array) : void {
        $this->array = $array;
    }

    public function getName() : string {
        return $this->name;
    }
    public function __toString() : string {
        return $this->name;
    }

    public function isBuiltIn() : bool {
        return $this->builtIn;
    }
    public function setBuiltIn(bool $builtIn) : void {
        $this->builtIn = $builtIn;
    }

    public function isOptional() : bool {
        return $this->optional;
    }
    public function setOptional(bool $optional) : void {
        $this->optional = $optional;
    }

    public function setType(string $type) : void {
        $this->type = $type;
    }
    public function getType() :?string {
        return $this->type;
    }

    public function setDeclaringClass(?string $declaringClass) : void {
        $this->declaringClass                       = $declaringClass;
    }
    public function hasDeclaringClass() : bool {
        return (bool)$this->declaringClass;
    }
    public function getDeclaringClass() : ?string {
        return $this->declaringClass;
    }

    public function setPatterns(?string $patterns) : void {
        $this->patterns = $patterns;
    }
    public function getPatterns(): ?string {
        return $this->patterns;
    }

    public function setFormat(?string $format) : void {
        $this->format = $format;
    }
    public function getFormat(): ?string {
        return $this->format;
    }

    public function setMinLength(?int $minLength): void {
        $this->minLength = $minLength;
    }
    public function getMinLength(): ?int {
        return $this->minLength;
    }

    public function setMaxLength(?int $maxLength): void {
        $this->maxLength = $maxLength;
    }
    public function getMaxLength(): ?int {
        return $this->maxLength;
    }

    public function setMinItems(?int $minItems): void {
        $this->minItems = $minItems;
    }
    public function getMinItems(): ?int {
        return $this->minItems;
    }

    public function setMaxItems(?int $maxItems): void {
        $this->maxItems = $maxItems;
    }
    public function getMaxItems(): ?int {
        return $this->maxItems;
    }
}