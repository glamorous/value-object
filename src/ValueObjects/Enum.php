<?php

namespace Glamorous\ValueObjects;

use MyCLabs\Enum\Enum as VendorEnum;

abstract class Enum extends VendorEnum implements ValueObject
{
    /**
     * {@inheritdoc}
     *
     * @return mixed
     */
    public function toNative()
    {
        return $this->getValue();
    }

    /**
     * {@inheritdoc}
     *
     * @return string
     */
    public function __toString(): string
    {
        return parent::__toString();
    }

    /**
     * {@inheritdoc}
     *
     * @return bool
     */
    public function equalsTo(ValueObject $object): bool
    {
        if (get_class($this) !== get_class($object)) {
            return false;
        }

        return $this->equals($object);
    }
}
