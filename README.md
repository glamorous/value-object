# Value Object

[![Build Status](https://travis-ci.org/glamorous/value-object.svg?branch=master)](https://travis-ci.org/glamorous/value-object)
[![Latest Stable Version](https://poser.pugx.org/glamorous/value-object/v/stable)](https://packagist.org/packages/glamorous/value-object)
[![Total Downloads](https://poser.pugx.org/glamorous/value-object/downloads)](https://packagist.org/packages/glamorous/value-object)
[![Latest Unstable Version](https://poser.pugx.org/glamorous/value-object/v/unstable)](https://packagist.org/packages/glamorous/value-object)
[![License](https://poser.pugx.org/glamorous/value-object/license)](https://packagist.org/packages/glamorous/value-object)

PHP Interface to create value objects to use in your project. Abstract Enum class available that uses the same interface.

## Why?

ValueObjects are the ideal way to use in your project. You can force yourself in your project to have data in the way you want.

## The interface

The interface has three methods you need to implement.

### __toString()

This magic method is needed to represent the ValueObject as a string. Is usefull for logging.

### toNative()

This method must return an array, integer, string... This is needed to test if two value objects are the same or not and for serializing.

### equalsTo(ValueObject $object)

The method requires another ValueObject instance. The `toNative()`-method can be used to check if two value objects are the same. In the Enum it uses the `equals` method from the parent.

## The Enum

The included Enum extends the Enum from [MyCLabs](https://github.com/myclabs/php-enum).
Additionally it implements the interface.
This way it's possible to use the functions `toNative()` and `equalsTo()` in your application.
More importantly an enumaration is also a value object, something that can't be changed when created.
When all those classes implements the same interface, its easier for the developer to use them through eachother.

## Examples

### Amount (Interface example)

Most of the people will say: "this is an integer, why do we need a value object?". Then you should read some articles about value objects again.

```

use Glamorous\ValueObject;

final class Amount implements ValueObject
{
    private $amount;

    public __construct(int $amount)
    {
        if ($amount < 0) {
            throw new \InvalidArgumentException('Amount must be above zero or zero');
        }

        $this->amount = $amount;
    }
}
```

### Status (Enum example)

```

use Glamorous\Enum;

final class Status extends Enum
{
    const OPEN = 'open';
    const CLOSED = 'closed';
}
```
