<?php
//Write an algorithm such that if an element in an MxN matrix is 0, its entire row and column are set to 0

//input
//1 2 3
//3 2 1
//1 2 0
//
//output
//1 2 0
//3 2 0
//0 0 0 [2, 2] has to turn [0, 2] [1, 2] [2, 2] and [2, 0] [2, 1] [2, 2]
//

$nn = $argv[1];
$mm = $argv[2];

/**
 * Class Matrix
 */
class Matrix {
    /**
     * @var array
     */
    private $matrix = [];

    /**
     * Matrix constructor.
     * @param $nn
     * @param $mm
     */
    public function __construct($nn, $mm) {
        for($ii = 0; $ii < $nn; $ii++) {
            for($jj = 0; $jj < $mm; $jj++) {
                $this->matrix[$ii][$jj] = mt_rand(0, 5);
            }
        }
        $this->matrix = [
            [0, 2, 3],
            [0, 2, 2],
            [1, 2, 0],
        ];

        return $this->matrix;
    }

    /**
     * This works because the foreach is keeping the original values of the row/column (like a copy of the array),
     * otherwise without that copy we'd end up with a matrix of all 0's
     */
    public function convertRowsAndColumnsTo0() {
        foreach($this->matrix as $keyRow => $row) {
            //Even if we change the value of $this->matrix[][], $column still references its original value.
            foreach ($row as $keyColumn => $column) {
                if($column !== 0) {
                    continue;
                }

                for($ii = 0; $ii < count($this->matrix); $ii++) {
                    $this->matrix[$ii][$keyColumn] = 0;
                }

                for($ii = 0; $ii < count($row); $ii++) {
                    $this->matrix[$keyRow][$ii] = 0;
                }
            }
        }
    }

    /**
     * @return array
     */
    public function getMatrix(){
        return $this->matrix;
    }

    /**
     *
     */
    public function printMatrix(){
        foreach($this->matrix as $keyRow => $row) {
            foreach ($row as $keyColumn => $column) {
                echo $column;
            }
            echo PHP_EOL;
        }
    }
}

$matrix = new Matrix($nn, $mm);
$matrix->printMatrix();
$matrix->convertRowsAndColumnsTo0();
$matrix->printMatrix();
