<?php

namespace Glamorous\Tests\ValueObjects;

use Glamorous\Tests\ValueObjects\Dummy\EnumChildDummy;
use Glamorous\Tests\ValueObjects\Dummy\EnumDummy;
use Glamorous\ValueObjects\Enum;
use PHPUnit\Framework\TestCase;

class EnumTest extends TestCase
{
    /**
     * Dummy Enum for testing, used in every test.
     *
     * @var Enum
     */
    private $enum;

    public function setUp()
    {
        parent::setUp();

        $this->enum = new EnumDummy(EnumDummy::FOO);
    }

    public function test_that_two_enums_with_same_values_are_equal()
    {
        $equalEnum = new EnumDummy(EnumDummy::FOO);
        $this->assertTrue($this->enum->equalsTo($equalEnum));
        $this->assertTrue($equalEnum->equalsTo($this->enum));
        $this->assertEquals($this->enum, $equalEnum);
    }

    public function test_that_two_enums_from_same_class_with_different_values_are_not_equal()
    {
        $notEqualEnum = new EnumDummy(EnumDummy::BAR);
        $this->assertFalse($this->enum->equalsTo($notEqualEnum));
        $this->assertFalse($notEqualEnum->equalsTo($this->enum));
        $this->assertNotEquals($this->enum, $notEqualEnum);
    }

    public function test_that_a_another_enum_with_same_value_is_not_equal()
    {
        $notEqualEnum = new EnumChildDummy(EnumDummy::FOO);
        $this->assertFalse($this->enum->equalsTo($notEqualEnum));
        $this->assertFalse($notEqualEnum->equalsTo($this->enum));
        $this->assertNotEquals($this->enum, $notEqualEnum);
    }

    public function test_if_to_string_calls_the_parent_and_returns_a_string()
    {
        $this->assertTrue(is_string((string) $this->enum));
    }

    public function test_that_value_is_returned_for_to_native()
    {
        $this->assertEquals($this->enum->toNative(), EnumDummy::FOO);
        $this->assertEquals($this->enum->getValue(), EnumDummy::FOO);
        $this->assertEquals($this->enum->toNative(), $this->enum->getValue());
    }
}
