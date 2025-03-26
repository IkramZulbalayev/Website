
<?php
class CollatzConjecture {
    public $startNumber;
    public $iterations;
    public $highestValue;

    public function __construct($startNumber) {
        $this->startNumber = $startNumber;
        $this->iterations = 0;
    }

    public function performCalculation($startNumber) {
        $currentNumber = $startNumber;
        $this->iterations = 0;
        $this->highestValue = $currentNumber;

        while ($currentNumber != 1) {
            if ($currentNumber % 2 == 0) {
                $currentNumber = $currentNumber / 2;
            } else {
                $currentNumber = 3 * $currentNumber + 1;
            }
            $this->iterations++;
            $this->highestValue = max($this->highestValue, $currentNumber);  
        }
    }

    public function getIterations() {
        return $this->iterations;
    }

    public function statistics($startRange, $endRange) {
        $maxIterations = 0;
        $minIterations = PHP_INT_MAX;
        $maxValue = 0;
        $minValue = 0;

        for ($i = $startRange; $i <= $endRange; $i++) {
            $this->performCalculation($i);

            if ($this->iterations > $maxIterations) {
                $maxIterations = $this->iterations;
                $maxValue = $i;
            }

            if ($this->iterations < $minIterations) {
                $minIterations = $this->iterations;
                $minValue = $i;
            }
        }

        return [
            'numberWithMaxIterations' => $maxValue,
            'maxIterations' => $maxIterations,
            'numberWithMinIterations' => $minValue,
            'minIterations' => $minIterations
        ];
    }
}
?>

