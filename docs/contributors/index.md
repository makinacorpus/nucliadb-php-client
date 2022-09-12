# Contributors documentation

## PHP Linting

* Install php-cs-fixer as described in the [php-cs-fixer documentation](https://github.com/FriendsOfPHP/PHP-CS-Fixer/blob/master/README.md)
* Run `composer run lint` for PHP linting
* Run `composer run test:lint` for running PHP linting in dry mode

## Working with Enums

Every NucliaDB web-api properties that allows a specific set of values are implemented in this library as an Enum class.
If new Enum class have to be implemented, please keep doing it this way.

### Make a new Enum class
To implement a new Enum class, please follow next steps

#### Extend a new class from `Nuclia\Enum\EnumAbstract`

```php
<?php

namespace Nuclia\Enum;

/**
 * Enum class for 'extracted' value.
 */
class MyNewPropEnum extends EnumAbstract
{
 // ...
}
```

#### Add every allowed value as a public class constant

```php
<?php

namespace Nuclia\Enum;

/**
 * Enum class for 'extracted' value.
 */
class MyNewPropEnum extends EnumAbstract
{
    public const MY_AVAILABLE_VALUE_1 = 'value_1';
    public const MY_AVAILABLE_VALUE_2 = 'value_2';

    // ...
}
```

#### Implement the required `getAllowedValues` method

```php
<?php

namespace Nuclia\Enum;

/**
 * Enum class for 'extracted' value.
 */
class MyNewPropEnum extends EnumAbstract
{
    public const MY_AVAILABLE_VALUE_1 = 'value_1';
    public const MY_AVAILABLE_VALUE_2 = 'value_2';

    /**
     * @inerhitDoc
     */
    public function getAllowedValues(): array
    {
        return [
        self::MY_AVAILABLE_VALUE_1,
        self::MY_AVAILABLE_VALUE_2,
        ];
    }
}

```
#### Implement a new static method in the EnumRepository class corresponding to your new Enum

```php
public static function myNewProp(string $value): MyNewPropEnum
{
    return new MyNewPropEnum($value);
}
```
### Using Enums

Using Enums in other classes of this library

```php
Use Nuclia\Enum\EnumRepository;
use Nuclia\Enum\MyNewPropEnum;

// ...

// This will return 'value_1':
echo EnumRepository::myNewProp(MyNewPropEnum::MY_AVAILABLE_VALUE_1);

// This will work too but this usage is discouraged : developers would use `MyNewProp` constants :
echo EnumRepository::myNewProp(MyNewPropEnum::MY_AVAILABLE_VALUE_1);

// This will throw a logical exception:
echo EnumRepository::myNewProp('any_unexpected_value');
```

### Enums advantages :
  * Real typed value
  * can only contain a strict set of values
  * Using const allow your IDE to suggest you any available values for a given enum

## Working with EnumArrays

EnumArrays are just a given Enum's list of values.

### Make a new EnumArray class

#### Extend a new class from `Nuclia\Enum\EnumAbstract`
```php
<?php

namespace Nuclia\EnumArray;

use Nuclia\Enum\MyNewPropEnum;

/**
 * Enum array class for 'extracted' value.
 */
class MyNewPropArray extends EnumArrayAbstract
{
    // ...
}
```

#### Implement the required `addValue` method

```php
<?php

namespace Nuclia\EnumArray;

use Nuclia\Enum\MyNewPropEnum;

/**
 * Enum array class for 'extracted' value.
 */
class MyNewPropArray extends EnumArrayAbstract
{
    /**
     * @inerhitDoc
     */
    public function addValue($value)
    {
        return new ExtractedEnum($value);
    }
}
```

#### Implement a new static method in the EnumArrayRepository class corresponding to your new EnumArray

```php
  public static function myNewProp(array $values): MyNewPropArray
  {
      return new MyNewPropArray($values);
  }
```

### Using EnumsArrays

```php
use Nuclia\EnumArray\MyNewPropArray;
use Nuclia\Enum\MyNewProp;

// This will return an array containing 'value_1' and 'value_2' :
EnumArrayRepository::myNewProp([MyNewProp::MY_AVAILABLE_VALUE_1, MyNewProp::MY_AVAILABLE_VALUE_2])

// This will work too but this usage is discouraged : developers would use `MyNewProp` constants :
EnumArrayRepository::myNewProp(['value_1', 'value_2'])

// This will throw a logical exception:
EnumArrayRepository::myNewProp([MyNewProp::MY_AVAILABLE_VALUE_1, 'unexpected_value'])
```









