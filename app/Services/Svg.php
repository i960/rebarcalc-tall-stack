<?php

namespace App\Services;

class Svg {
    const ZOOM_FACTOR = 0.90;
    const MIN_X = 0;
    const MIN_Y = 0;

    public static function render(array $grid, float $x, float $y): string {
        $pieces = static::getPiecesFromGrid($grid);

        $xMargin = $x * (1.0 - self::ZOOM_FACTOR);
        $yMargin = $y * (1.0 - self::ZOOM_FACTOR);

        $viewBoxMinX = self::MIN_X - ($xMargin / 2.0);
        $viewBoxMinY = self::MIN_Y - ($yMargin / 2.0);
        $viewBoxWidth = intval($x) + $xMargin;
        $viewBoxHeight = intval($y) + $yMargin;

        $svgHeader = 
            '<svg viewBox="' .
                $viewBoxMinX . ' ' .
                $viewBoxMinY . ' ' .
                $viewBoxWidth . ' ' .
                $viewBoxHeight . '" ' .
            'preserveAspectRatio="xMidYMid meet" ' .
            'width="50%" ' .
            '>' . "\n";  

        $svgBody = '';

        foreach ($pieces as $piece) {
            $svgBody .= static::renderLine($piece);
        }

        $svgFooter = '</svg>' . "\n";

        return $svgHeader . $svgBody . $svgFooter;
    }

    private static function renderLine(array $piece): string {
        return
            '<line stroke="black" stroke-width="0.375"' .
            ' x1=' . $piece['x1'] .
            ' y1=' . $piece['y1'] .
            ' x2=' . $piece['x2'] .
            ' y2=' . $piece['y2'] .            
            ' />' . "\n";
    }

    private static function getPiecesFromGrid(array $grid): array {
        $pieces = [];

        $xRuns = $grid['runSets'][0]['runs'];
        $yRuns = $grid['runSets'][1]['runs'];

        foreach ($xRuns as $run) {
            $offset = $run['offset'];
            $runPieces = $run['pieces'];

            foreach ($runPieces as $piece) {
                $start = $piece['start'];
                $end = $piece['end'];
    
                $pieces[] = [
                    'x1' => $start,
                    'y1' => $offset,
                    'x2' => $end,
                    'y2' => $offset
                ];
            }
        }

        foreach ($yRuns as $run) {
            $offset = $run['offset'];
            $runPieces = $run['pieces'];

            foreach ($runPieces as $piece) {
                $start = $piece['start'];
                $end = $piece['end'];
    
                $pieces[] = [
                    'x1' => $offset,
                    'y1' => $start,
                    'x2' => $offset,
                    'y2' => $end
                ];
            }
        }

        return $pieces;
    }    
}
