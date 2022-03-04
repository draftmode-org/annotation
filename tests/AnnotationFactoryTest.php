<?php
namespace Terrazza\Component\Tests\Annotation;

use PHPUnit\Framework\TestCase;
use Terrazza\Component\Annotation\Tests\_Mocks\AnnotationFactory;

class AnnotationFactoryTest extends TestCase {

    function testWithBuiltInAndIsBuiltInType() {
        $factory = AnnotationFactory::get()->withBuiltInTypes(["x"]);
        $this->assertTrue($factory->isBuiltInType("x"));
    }
}