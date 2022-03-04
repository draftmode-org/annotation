<?php
namespace Terrazza\Component\Tests\Annotation;

use PHPUnit\Framework\TestCase;
use ReflectionClass;
use Terrazza\Component\Annotation\AnnotationReturnType;
use Terrazza\Component\Annotation\Tests\_Mocks\AnnotationFactory;

class AnnotationReturnTypeTest extends TestCase {
    protected function returnTypeBuiltIn() : int { return 1;}
    protected function returnTypeBuiltInOptional() : ?int { return 1;}
    protected function returnTypeArray() : array { return [];}
    protected function returnTypeArrayOptional() : ?array { return [];}

    /**
     * @return int
     */
    protected function returnBuiltIn() { return 1;}

    /**
     * @return int|null
     */
    protected function returnBuiltInOptional() { return 1;}

    /**
     * @return array
     */
    protected function returnArray() { return [];}

    /**
     * @return array|null
     */
    protected function returnArrayOptional() { return [];}

    /**
     * @return int[]
     */
    protected function returnArrayAsBuiltIn() : array {return [1];}

    /**
     * @return int[]|null
     */
    protected function returnArrayAsBuiltInOptional() {return [1];}

    /**
     * @return AnnotationReturnType[]
     */
    protected function returnTypeArrayAsClass() : array {return [new AnnotationReturnType("name")];}

    /**
     * @return mixed|null
     */
    protected function returnMixedOptional() { return null;}

    function testAnnotationReturnType() {
        $ref            = new ReflectionClass($this);

        $returnType     = AnnotationFactory::get()->getAnnotationReturnType($ref->getMethod("returnTypeBuiltIn"));
        $this->assertEquals([
            false,
            true,
            false,
            "int"
        ], [
            $returnType->isArray(),
            $returnType->isBuiltIn(),
            $returnType->isOptional(),
            $returnType->getType(),
        ], "returnTypeBuiltIn");
        $returnType     = AnnotationFactory::get()->getAnnotationReturnType($ref->getMethod("returnBuiltIn"));
        $this->assertEquals([
            false,
            true,
            false,
            "int"
        ], [
            $returnType->isArray(),
            $returnType->isBuiltIn(),
            $returnType->isOptional(),
            $returnType->getType(),
        ], "returnTypeBuiltIn");

        $returnType     = AnnotationFactory::get()->getAnnotationReturnType($ref->getMethod("returnTypeBuiltInOptional"));
        $this->assertEquals([
            false,
            true,
            true,
            "int"
        ], [
            $returnType->isArray(),
            $returnType->isBuiltIn(),
            $returnType->isOptional(),
            $returnType->getType(),
        ], "returnTypeBuiltInOptional");
        $returnType     = AnnotationFactory::get()->getAnnotationReturnType($ref->getMethod("returnBuiltInOptional"));
        $this->assertEquals([
            false,
            true,
            true,
            "int"
        ], [
            $returnType->isArray(),
            $returnType->isBuiltIn(),
            $returnType->isOptional(),
            $returnType->getType(),
        ], "returnBuiltInOptional");

        $returnType     = AnnotationFactory::get()->getAnnotationReturnType($ref->getMethod("returnTypeArray"));
        $this->assertEquals([
            true,
            true,
            false,
            "array"
        ], [
            $returnType->isArray(),
            $returnType->isBuiltIn(),
            $returnType->isOptional(),
            $returnType->getType(),
        ], "returnTypeArray");
        $returnType     = AnnotationFactory::get()->getAnnotationReturnType($ref->getMethod("returnArray"));
        $this->assertEquals([
            true,
            true,
            false,
            "array"
        ], [
            $returnType->isArray(),
            $returnType->isBuiltIn(),
            $returnType->isOptional(),
            $returnType->getType(),
        ], "returnArray");

        $returnType     = AnnotationFactory::get()->getAnnotationReturnType($ref->getMethod("returnTypeArrayOptional"));
        $this->assertEquals([
            true,
            true,
            true,
            "array"
        ], [
            $returnType->isArray(),
            $returnType->isBuiltIn(),
            $returnType->isOptional(),
            $returnType->getType(),
        ], "returnTypeArrayOptional");
        $returnType     = AnnotationFactory::get()->getAnnotationReturnType($ref->getMethod("returnArrayOptional"));
        $this->assertEquals([
            true,
            true,
            true,
            "array"
        ], [
            $returnType->isArray(),
            $returnType->isBuiltIn(),
            $returnType->isOptional(),
            $returnType->getType(),
        ], "returnArrayOptional");

        $returnType     = AnnotationFactory::get()->getAnnotationReturnType($ref->getMethod("returnArrayAsBuiltIn"));
        $this->assertEquals([
            true,
            true,
            false,
            "int"
        ], [
            $returnType->isArray(),
            $returnType->isBuiltIn(),
            $returnType->isOptional(),
            $returnType->getType(),
        ], "returnArrayAsBuiltIn");
        $returnType     = AnnotationFactory::get()->getAnnotationReturnType($ref->getMethod("returnArrayAsBuiltInOptional"));
        $this->assertEquals([
            true,
            true,
            true,
            "int"
        ], [
            $returnType->isArray(),
            $returnType->isBuiltIn(),
            $returnType->isOptional(),
            $returnType->getType(),
        ], "returnArrayAsBuiltInOptional");

        $returnType     = AnnotationFactory::get()->getAnnotationReturnType($ref->getMethod("returnTypeArrayAsClass"));
        $this->assertEquals([
            true,
            false,
            false,
            AnnotationReturnType::class
        ], [
            $returnType->isArray(),
            $returnType->isBuiltIn(),
            $returnType->isOptional(),
            $returnType->getType(),
        ], "returnTypeArrayAsClass");

        $returnType     = AnnotationFactory::get()->getAnnotationReturnType($ref->getMethod("returnMixedOptional"));
        $this->assertEquals([
            false,
            false,
            true,
            null
        ], [
            $returnType->isArray(),
            $returnType->isBuiltIn(),
            $returnType->isOptional(),
            $returnType->getType(),
        ], "returnMixedOptional");
    }

}