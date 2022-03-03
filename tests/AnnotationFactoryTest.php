<?php
namespace Terrazza\Component\Tests\Annotation;

use PHPUnit\Framework\TestCase;
use Terrazza\Component\Annotation\AnnotationFactory;
use Terrazza\Component\Annotation\IAnnotationFactory;
use Terrazza\Component\Annotation\Tests\_Mocks\LoggerMock;
use Terrazza\Component\ReflectionClass\ClassNameResolver;

class AnnotationFactoryTest extends TestCase {
    /**
     * @param bool $log
     * @return IAnnotationFactory
     */
    private function get(bool $log=false) : IAnnotationFactory {
        return new AnnotationFactory(
            LoggerMock::get($log), new ClassNameResolver()
        );
    }

    function testWithBuiltInAndIsBuiltInType() {
        $factory = $this->get()->withBuiltInTypes(["x"]);
        $this->assertTrue($factory->isBuiltInType("x"));
    }
}