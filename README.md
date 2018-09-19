# smartline
smartline test
______________

Instalation:
```sh
composer require gradyskyi/smartline
```

Usage

```sh
use gradyskyi\smartline\SmartlineTest;

$test = new SmartlineTest();

var_dump($test->testOne([-1, 10, -9, 5, 6, -10]));

var_dump($test->testTwo([
    [1, 0, 1, 1],
    [1, 1, 1, 1],
    [1, 1, 0, 1],
    [1, 1, 1, 1]
]));

var_dump($test->testThree([3, 4, 5, -2, 10, 11, 12, -1, 0, 7, 8], 10));

```
