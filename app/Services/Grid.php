<?php

namespace App\Services;

use App\Services\RunSet;

class Grid {
    public static function createGrid(float $xLength, float $yLength, float $xSpacing, float $ySpacing, float $maxPieceLength = 240, float $diameter = 0.5, float $lappingFactor = 40): array {
        $lap = $diameter * $lappingFactor;

        $grid['runSets'][] = RunSet::createRunSet(0, $yLength, $ySpacing, $xLength, $maxPieceLength, $lap);
        $grid['runSets'][] = RunSet::createRunSet(90, $xLength, $xSpacing, $yLength, $maxPieceLength, $lap);

        return $grid;
    }
}