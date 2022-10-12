# Working with Enums

Every NucliaDB web-api properties that allows a specific set of values are implemented in this library using
`Enum` classes. As this library must be compatible with PHP 7.4, PHP 8.1 Enum was not available.
Those `Enum` classes are located in `Enum/` directory (namespace `Nuclia\Enum`).

For instance `show` query parameter used in [Get resource](https://docs.nuclia.dev/docs/api#operation/Get_Resource_kb__kbid__resource__rid__get),
or in [Search](https://docs.nuclia.dev/docs/api#operation/Get_Resource_kb__kbid__resource__rid__get) is implemented in [Enum/ShowEnum.php](Enum/ShowEnum.php)

If new enumeration have to be implemented, in order to implement currently missing web-api API calls, please keep doing it this way.

## Make a new Enum class

* Extend a new class from `Nuclia\Enum\EnumAbstract`
* Define class constants

```php
namespace Nuclia\Enum;

/**
 * Enum class for 'myNewVal' value.
 */
class myNewValEnum extends EnumAbstract
{
    public const VALUE_1 = 'value-1';
    public const VALUE_2 = 'value-2';

    /**
     * @inerhitDoc
     */
    public function getAllowedValues(): array
    {
        return [
            self::VALUE_1,
            self::VALUE_2,
        ];
    }
}
```
## Implement a new static method in the Enum repository class corresponding to your new Enum

```php
    public static function myNewVal(string $value): ShowEnum
    {
        return new myNewValEnum($value);
    }
```

## Using Enums

```php

// Enum is a static "repository" class allowing to create any type of Enums
// using a suitable function.
$method = Enum::method(MethodEnum::GET);

// 'value' property (implemented using a magic method __get) returns the real
// Enum value. NB : We do not use here a getter function to keep Enum classes
// usage as close as possible of real PHP8.1 Enums.
var_dump($method->value);

// Example of MethodEnum used in Nuclia\Api\ApiAbstract::request call allowing
// to set the http method used for http request :
return $this->request(Enum::method(MethodEnum::GET), $uri, $options->getArray());

```

# Working with EnumArrays

EnumArrays are just a given enumeration's list of values that can be used when an api call require a multivalued enumeration based value.

For instance, the `show` query parameter in [Get resource](https://docs.nuclia.dev/docs/api#operation/Get_Resource_kb__kbid__resource__rid__get) is multivalued regarding the nuclia's documentation:

| Parameter | Values                                                                 |
|-----------|------------------------------------------------------------------------|
| `show`    | Array of strings (ResourceProperties)                                  |
 |           | Default: ["basic","origin","relations","values","extracted","errors"]  |
 |           | Items Enum: "basic" "origin" "relations" "values" "extracted" "errors" |

Example of `show` param using `ShowEnumArray` :

```php
// $showParam is a multivalued enum value.
// EnumArray is a static "repository" class allowing to create any type of EnumArrays
// using a suitable function.
$show = EnumArray::show([ShowEnum::BASIC, ShowEnum::VALUES]);

var_dump($show->getValues());
// result is an array : ['basic', 'values']

// API function use EnumArrays as often as possible. Here's an example of
// getting a resource using a "show" parameter :
$resourcesApi->getResource($rid,$show);
```

## Make a new EnumArray class

* Extend a new class from `Nuclia\EnumArray\EnumArrayAbstract`
* Implement the required `testValue` method

```php
<?php

namespace Nuclia\EnumArray;

use Nuclia\Enum\MyNewPropEnum;

/**
 * Enum array class for 'extracted' value.
 */
class MyNewPropEnumArray extends EnumArrayAbstract
{
    public function testValue(MyNewPropEnum $value)
    {
        // Most of times, there is nothing to do than returning $value
        // argument with the right enum class defined in the function argument.
        return $value;
    }
}
```

## Implement a new static method in the EnumArray repository class corresponding to your new EnumArray

```php
  public static function myNewProp(array $values): MyNewPropArray
  {
      return new MyNewPropEnumArray($values);
  }
```

## Using EnumArrays

```php
use Nuclia\EnumArray\MyNewPropArray;
use Nuclia\Enum\MyNewProp;

// This will return an array containing 'value_1' and 'value_2' :
EnumArrayRepository::myNewProp([MyNewPropEnum::MY_AVAILABLE_VALUE_1, MyNewPropEnum::MY_AVAILABLE_VALUE_2])

// This will throw a logical exception:
EnumArrayRepository::myNewProp([MyNewPropEnum::MY_AVAILABLE_VALUE_1, 'unexpected_value'])
```
