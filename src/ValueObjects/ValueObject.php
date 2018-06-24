<?php

namespace Glamorous\ValueObjects;

interface ValueObject
{
    /**
     * Magic method to have a string version of this object.
     *
     * @return string
     */
    public function __toString(): string;

    /**
     * Get the value of the object in a native type.
     *
     * @return mixed
     */
    public function toNative();

    /**
     * Check if given object is the same as current object
     *
     * @param ValueObject $object
     *
     * @return bool
     */
    public function isTheSameAs(ValueObject $object): bool;
}
