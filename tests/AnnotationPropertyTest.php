<?php
namespace Terrazza\Component\Tests\Annotation;

use PHPUnit\Framework\TestCase;
use ReflectionClass;
use Terrazza\Component\Annotation\Tests\_Examples\SerializerRealLifeUUID;
use Terrazza\Component\Annotation\Tests\_Mocks\AnnotationFactory;

class AnnotationPropertyTest extends TestCase {
    private ?int $intTypeOptional;
    /** @var int|null */
    private $intOptional;

    private array $arrayTypeRequired;
    /** @var array */
    private $arrayRequired;

    private SerializerRealLifeUUID $classTypeRequired;
    /** @var SerializerRealLifeUUID */
    private $classRequired;

    /** @var int[]  */
    private array $arrayAsBuiltIn;
    /** @var int[]|null  */
    private ?array $arrayAsBuiltInOptional;

    /** @var SerializerRealLifeUUID[]  */
    private array $arrayTypeAsClass;

    /** @var SerializerRealLifeUUID[] */
    private $arrayAsClass;

    function testAnnotationProperty() {
        $ref            = new ReflectionClass($this);
        $property       = AnnotationFactory::get()->getAnnotationProperty($ref->getProperty($name = "intTypeOptional"));
        $this->assertEquals([
            false,
            true,
            true,
            "int"
        ], [
            $property->isArray(),
            $property->isBuiltIn(),
            $property->isOptional(),
            $property->getType(),
        ], $name);
        $property       = AnnotationFactory::get()->getAnnotationProperty($ref->getProperty($name = "intOptional"));
        $this->assertEquals([
            false,
            true,
            true,
            "int"
        ], [
            $property->isArray(),
            $property->isBuiltIn(),
            $property->isOptional(),
            $property->getType(),
        ], $name);

        $property       = AnnotationFactory::get()->getAnnotationProperty($ref->getProperty($name = "arrayTypeRequired"));
        $this->assertEquals([
            true,
            true,
            false,
            "array"
        ], [
            $property->isArray(),
            $property->isBuiltIn(),
            $property->isOptional(),
            $property->getType(),
        ], $name);
        $property       = AnnotationFactory::get()->getAnnotationProperty($ref->getProperty($name = "arrayRequired"));
        $this->assertEquals([
            true,
            true,
            false,
            "array"
        ], [
            $property->isArray(),
            $property->isBuiltIn(),
            $property->isOptional(),
            $property->getType(),
        ], $name);

        $property       = AnnotationFactory::get()->getAnnotationProperty($ref->getProperty($name = "classTypeRequired"));
        $this->assertEquals([
            false,
            false,
            false,
            SerializerRealLifeUUID::class
        ], [
            $property->isArray(),
            $property->isBuiltIn(),
            $property->isOptional(),
            $property->getType(),
        ], $name);
        $property       = AnnotationFactory::get()->getAnnotationProperty($ref->getProperty($name = "classRequired"));
        $this->assertEquals([
            false,
            false,
            false,
            SerializerRealLifeUUID::class
        ], [
            $property->isArray(),
            $property->isBuiltIn(),
            $property->isOptional(),
            $property->getType(),
        ], $name);

        $property       = AnnotationFactory::get()->getAnnotationProperty($ref->getProperty($name = "arrayAsBuiltIn"));
        $this->assertEquals([
            true,
            true,
            false,
            "int"
        ], [
            $property->isArray(),
            $property->isBuiltIn(),
            $property->isOptional(),
            $property->getType(),
        ], $name);
        $property       = AnnotationFactory::get()->getAnnotationProperty($ref->getProperty($name = "arrayAsBuiltInOptional"));
        $this->assertEquals([
            true,
            true,
            true,
            "int"
        ], [
            $property->isArray(),
            $property->isBuiltIn(),
            $property->isOptional(),
            $property->getType(),
        ], $name);


        $property       = AnnotationFactory::get()->getAnnotationProperty($ref->getProperty($name = "arrayAsClass"));
        $this->assertEquals([
            true,
            false,
            false,
            SerializerRealLifeUUID::class
        ], [
            $property->isArray(),
            $property->isBuiltIn(),
            $property->isOptional(),
            $property->getType(),
        ], $name);
        $property       = AnnotationFactory::get()->getAnnotationProperty($ref->getProperty($name = "arrayTypeAsClass"));
        $this->assertEquals([
            true,
            false,
            false,
            SerializerRealLifeUUID::class
        ], [
            $property->isArray(),
            $property->isBuiltIn(),
            $property->isOptional(),
            $property->getType(),
        ], $name);
    }
}