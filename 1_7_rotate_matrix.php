<?php
//given an image represented by an NxN matrix, where each pixel in the image is 4 bytes. Write a method to rotate the image
//by 90 degrees. Can you do thi sin place?
//from
//1 2 3
//4 5 6
//7 8 9
//to
//7 4 1
//8 5 2
//9 6 3

$n = $argv[1];

class Matrix {
    public function build($n) {
        $matrix = [];
        for($ii = 0; $ii < $n; $ii++) {
            for($jj = 0; $jj < $n; $jj++) {
                $matrix[$ii][$jj] = $ii.$jj;
            }
        }

        return $matrix;
    }

    //in a 3x3 matrix, the indexes are
    // 00 01 02
    // 10 11 12
    // 20 21 22
    //it has to become
    // 20 10 00
    // 21 11 01
    // 22 12 02
    //so we need to position ourselves in the last "row"
    //TODO do it in place (this means do not build a new array, replace the original array
    public function rotate90($matrix) {
        $newMatrix = [];
        $row = count($matrix) - 1;
        $column = 0;
        for($ii = 0; $ii < count($matrix); $ii++) {
            for($jj = 0; $jj < count($matrix); $jj++) {
                $newMatrix[$ii][$jj] = $matrix[$row][$column];
                $row--;
            }
            $column++;
            $row = count($matrix) - 1;
        }

        return $newMatrix;
    }

    public function printIt($matrix) {
        $rows = count($matrix); //The number of rows is the same as the number of columns
        for($ii = 0; $ii < $rows; $ii++) {
            for($jj = 0; $jj < $rows; $jj++) {
                echo $matrix[$ii][$jj]." ";
            }
            echo PHP_EOL;
        }
    }


}

$matrix = new Matrix();

$originalMatrix = $matrix->build($n);
$rotatedMatrix = $matrix->rotate90($originalMatrix);

$matrix->printIt($originalMatrix);
echo PHP_EOL;
$matrix->printIt($rotatedMatrix);

