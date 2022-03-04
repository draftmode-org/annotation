<?php

namespace Terrazza\Component\Annotation\Tests\_Mocks;

use Terrazza\Component\Annotation\AnnotationFactory as Factory;
use Terrazza\Component\Annotation\IAnnotationFactory;

class AnnotationFactory {
    /**
     * @param null $stream
     * @return IAnnotationFactory
     */
    public static function get($stream=null) : IAnnotationFactory {
        return new Factory(
            Logger::get($stream)
        );
    }

}