<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 19.09.18
 * Time: 11:03
 */

namespace gradyskyi\smartline;

class SmartlineTest
{
    public function __construct()
    {

    }

    public function testOne(array $array)
    {
        $sumArray = [];
        foreach ($array as $key => $item) {
            if (isset($array[$key + 1])) {
                $sumArray[] = $item + $array[$key + 1];
            }
        }

        return max($sumArray);
    }

    public function testTwo(array $multiArray)
    {

        $allZeroColIndexes = [];
        $resultArray = $multiArray;

        foreach ($multiArray as $rowNum => $row) {

            $zeroColIndexes = array_keys($row, 0);  // Находим колонки с нулями в каждой строке

            $allZeroColIndexes = array_merge($allZeroColIndexes, $zeroColIndexes);  // Сохраняем индексы всех стобцов с нулями

            if (!empty($zeroColIndexes)) {
                $resultArray[$rowNum] = array_fill(0, count($row), 0);  // Обнуляем строки с нулями
            }
        }

        $allZeroColIndexes = array_unique($allZeroColIndexes);

        foreach ($resultArray as $rowNum => $row) {
            foreach ($allZeroColIndexes as $zeroColIndex) {
                $resultArray[$rowNum][$zeroColIndex] = 0;   // Обнуляем столбцы с нулями
            }
        }

        return $resultArray;
    }

    public function testThree(array $array, $sum)
    {
        $validPairs = [];

        $array = array_unique($array);

        foreach ($array as $firstNumberKey => $firstNumber) {
            $secondNumberKey = array_search($sum - $firstNumber, $array);   // Поиск второго слогаемого каждой паре
            if ($secondNumberKey !== false) {
                $validPairs[] = [$firstNumber, $array[$secondNumberKey]];   // Записываем найденную пару
                unset($array[$firstNumberKey]);     // Удаляем пару из входящего массива
                unset($array[$secondNumberKey]);
            }
        }
        return $validPairs;
    }
}