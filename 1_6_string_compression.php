<?php
//implement a method to perform basic string compression using the counts of repeated characters
//for example, the string aabcccccaaa would become a2b1c5a3. if the compressed string would not
//become smaller than the original string, your method should return the original string. You can assume the string
//has only uppercase and lowercase letters.

$string = $argv[1];

class StringProperties {
    public $character;
    public $count;

    public function __construct($character) {
        $this->character = $character;
        $this->count = 1;
    }

    public function updateCharCount() {
        $this->count++;
    }
}
class StringCompressor {
    private $compressedArray = [];

    public function compress($string) {
        for($ii =0; $ii < strlen($string); $ii++) {
            $this->createOrUpdateCompressedArray($string, $ii);
        }

        if($this->shouldReturnOriginalString($string)) {
            return $string;
        }

        return $this->getCompressedString();
    }

    private function shouldReturnOriginalString($string) {
        $finalSizeOfCompressedString = count($this->compressedArray) * 2;
        return strlen($string) < $finalSizeOfCompressedString;
    }

    private function getCompressedString() {
        $compressedString = '';
        foreach($this->compressedArray as $item) {
            $compressedString .= $item->character;
            $compressedString .= $item->count;
        }

        return $compressedString;
    }

    private function createOrUpdateCompressedArray($string, $stringIndex) {
        $currentChar = $string[$stringIndex];
        //if previous char index is < 0 it means is the first letter.
        $prevChar = $string[$stringIndex - 1] ?? $string[$stringIndex];

        $compressorIndex = $this->getCompressedArrayIndex();
        if($currentChar !== $prevChar) {
            $compressorIndex++;
        }

        if(!isset($this->compressedArray[$compressorIndex])) {
            $this->compressedArray[$compressorIndex] = new StringProperties($string[$stringIndex]);
        } else {
            $this->compressedArray[$compressorIndex]->updateCharCount();
        }
    }

    private function getCompressedArrayIndex() {
        return count($this->compressedArray) === 0 ? 0 : count($this->compressedArray) -1;
    }
}

$stringCompressor = new StringCompressor();

echo $compressedString = $stringCompressor->compress($string);

