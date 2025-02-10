<?php

use App\Services\RunSet;

it('creates a run set from a given direction, orthogonalLength, orthogonalSpacing, length, and maxPieceLength', function () {
    $runSet = [
        'direction' => 0,
        'runs' => [
            [
                'offset' => 6,
                'pieces' => [
                    [ 'start' => 0, 'end' => 60, 'length' => 60 ],
                    [ 'start' => 40, 'end' => 100, 'length' => 60 ],
                    [ 'start' => 80, 'end' => 120, 'length' => 40 ]
                ]
            ],
            [
                'offset' => 30,
                'pieces' => [
                    [ 'start' => 0, 'end' => 60, 'length' => 60 ],
                    [ 'start' => 40, 'end' => 100, 'length' => 60 ],
                    [ 'start' => 80, 'end' => 120, 'length' => 40 ]
                ]
            ],
            [
                'offset' => 54,
                'pieces' => [
                    [ 'start' => 0, 'end' => 60, 'length' => 60 ],
                    [ 'start' => 40, 'end' => 100, 'length' => 60 ],
                    [ 'start' => 80, 'end' => 120, 'length' => 40 ]
                ]
            ]
        ]
    ];

    expect(RunSet::createRunSet(direction: 0, orthogonalLength: 60, orthogonalSpacing: 24, length: 120, maxPieceLength: 60))
        ->toEqual($runSet);
});
