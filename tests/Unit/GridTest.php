<?php

use App\Services\Grid;

it('calculates run sets from a given grid spec', function () {
    $grid = [
        'runSets' => [
            [
                'direction' => 0,
                'runs' => [
                    [
                        'offset' => 0,
                        'pieces' => [
                            [ 'start' => 0, 'end' => 60, 'length' => 60 ]
                        ]
                    ],
                    [
                        'offset' => 24,
                        'pieces' => [
                            [ 'start' => 0, 'end' => 60, 'length' => 60 ]
                        ]
                    ],
                    [
                        'offset' => 48,
                        'pieces' => [
                            [ 'start' => 0, 'end' => 60, 'length' => 60 ]
                        ]
                    ],
                    [
                        'offset' => 72,
                        'pieces' => [
                            [ 'start' => 0, 'end' => 60, 'length' => 60 ]
                        ]
                    ],
                    [
                        'offset' => 96,
                        'pieces' => [
                            [ 'start' => 0, 'end' => 60, 'length' => 60 ]
                        ]
                    ],
                    [
                        'offset' => 120,
                        'pieces' => [
                            [ 'start' => 0, 'end' => 60, 'length' => 60 ]
                        ]
                    ],
                ]
            ],
            [
                'direction' => 90,
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
            ]
        ]
    ];

    expect(Grid::createGrid(xLength: 60, yLength: 120, xSpacing: 24, ySpacing: 24, maxPieceLength: 60))
        ->toEqual($grid);
});