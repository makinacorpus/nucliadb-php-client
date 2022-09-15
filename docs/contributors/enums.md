# Working with Enums

Every NucliaDB web-api properties that allows a specific set of values are implemented in this library using
PHP 8.1 ( and more ) [`enum`](https://www.php.net/manual/fr/language.types.enumerations.php) located in `Enum/` directory (namespace `Nuclia\Enum`).

For instance `show` query parameter used in [Get resource](https://docs.nuclia.dev/docs/api#operation/Get_Resource_kb__kbid__resource__rid__get),
or in [Search](https://docs.nuclia.dev/docs/api#operation/Get_Resource_kb__kbid__resource__rid__get) is iplemented in [Enum/ShowEnum.php](Enum/ShowEnum.php)

If new `enum` have to be implemented, while implementing currently missing web-api API calls, please keep doing it this way.

# Working with EnumArrays

EnumArrays are just a given `enum`'s list of values that can used when an api call require a multivalued `enum` based value.

For instance, the `show` query parameter in [Get resource](https://docs.nuclia.dev/docs/api#operation/Get_Resource_kb__kbid__resource__rid__get) is multivalued regarding the nuclia's documentation:

| Parameter | Values                                                                 |
|-----------|------------------------------------------------------------------------|
| `show`    | Array of strings (ResourceProperties)                                  |
 |           | Default: ["basic","origin","relations","values","extracted","errors"]  |
 |           | Items Enum: "basic" "origin" "relations" "values" "extracted" "errors" |

Example of `show` param using `ShowEnumArray` :

```php
$showParam = EnumArrayRepository::show([ShowEnum::BASIC, ShowEnum::VALUES])

var_dump($showParam->getValues());
// -> ['basic', 'values']

// Call get resource using show parameter.
$resourcesApi->getResource($rid,$showParam)

```

## Make a new EnumArray class

* Extend a new class from `Nuclia\Enum\EnumAbstract`
* Implement the required `addValue` method

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
        // Most of times, there is nothing to do than typing correctly $value
        // parameter with the right enum corresponding the enum array.
        return $value;
    }
}
```

### Implement a new static method in the EnumArrayRepository class corresponding to your new EnumArray

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
