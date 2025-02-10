<?php

namespace App\Services;

use App\Services\Run;

class RunSet {
    public static function createRunSet(float $direction, float $orthogonalLength, float $orthogonalSpacing, float $length, float $maxPieceLength = 240, float $lap = 20): array {
        $runs = Run::createRuns($orthogonalLength, $orthogonalSpacing, $length, $maxPieceLength, $lap);

        $runSet = [
            'direction' => $direction,
            'runs' => $runs,
        ];

        return $runSet;
    }
}
