<?php

namespace App\Services;

use App\Services\Piece;

class Run {
    public static function createRuns(float $orthogonalLength, float $orthogonalSpacing, float $length, float $maxPieceLength = 240, float $lap = 20): array {
        if ($orthogonalLength <= 0 || $orthogonalSpacing <= 0) {
            return [];
        }

        $runs = [];
        $runCount = floor($orthogonalLength / $orthogonalSpacing) + 1;
        $start = ($orthogonalLength - ($runCount - 1) * $orthogonalSpacing) / 2;

        for ($i = 1; $i <= $runCount; $i++) {
            $offset = $start + ($i - 1) * $orthogonalSpacing;

            $piece = Piece::createPieces($length, $maxPieceLength, $lap);

            $runs[] = [
                'offset' => $offset,
                'pieces' => $piece,
            ];
        }

        return $runs;
    }
}
