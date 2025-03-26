<?php

class CollatzStatz {
    public $n;
    public $m;
    const multiplier = 3;
    const addition = 1;

    public function __construct($n, $m) {
        $this->n = $n;
        $this->m = $m;
    }
    
    public function calculateCollatz($num) {
        $sequence = [];

        while ($num != 1) {
            $sequence[] = $num;
            if ($num % 2 == 0) {
                $num = $num / 2;
            } else {
                $num = $num * self::multiplier + self::addition;
            }
        }
        $sequence[] = 1; // Add 1 at the end of the sequence
        return $sequence;
    }
}

class HistogramGen extends CollatzStatz {
    public function __construct($n, $m) {
        parent::__construct($n, $m);
    }

    public function calculateHistogram() {
        $histogram = [];

        for ($i = $this->n; $i <= $this->m; $i++) {
            $sequence = $this->calculateCollatz($i);
            $histogram[] = [
                'num' => $i,
                'iteration' => count($sequence),
                'max' => max($sequence),
                'steps' => $sequence,
            ];
        }
        return $histogram;
    }
}

$startNumber = isset($_GET['start']) ? $_GET['start'] : 2;
$lastNumber = isset($_GET['last']) ? $_GET['last'] : 100;
$collatz = new HistogramGen($startNumber, $lastNumber);
$histogram = $collatz->calculateHistogram();

?>
