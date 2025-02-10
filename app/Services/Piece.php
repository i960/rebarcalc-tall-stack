<?php

namespace App\Services;

use Exception;

class Piece {
    public static function createPieces(float $length, float $maxPieceLength = 240, float $lap = 20): array {
        if ($maxPieceLength <= $lap) {
            throw new Exception('maxPieceLength must be greater than lap.');
        }

        $pieces = [];
        $currentLength = 0;

        while ($currentLength < $length) {
            $nextPieceLength = min($maxPieceLength, $length - $currentLength);
            $startPosition = $currentLength;
            $endPosition = $startPosition + $nextPieceLength;

            $pieces[] = [
                'start' => $startPosition,
                'end' => $endPosition,
                'length' => $nextPieceLength,
            ];

            $currentLength += $nextPieceLength;

            if ($currentLength < $length) {
                $currentLength -= $lap;
            }

            if ($currentLength < 0) {
                $currentLength = 0;
            }
        }

        return $pieces;
    }
}
