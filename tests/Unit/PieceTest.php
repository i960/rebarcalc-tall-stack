<?php

use App\Services\Piece;

it('creates pieces from a given length', function () {
    $pieces = [
        ['start' => 0, 'end' => 240, 'length' => 240],
        ['start' => 220, 'end' => 460, 'length' => 240],        
        ['start' => 440, 'end' => 480, 'length' => 40]
    ];

    expect(Piece::createPieces(length: 480))
        ->toEqual($pieces);
});

it('creates pieces with optional parameters', function () {
    $pieces = [
        ['start' => 0, 'end' => 120, 'length' => 120],
        ['start' => 97.5, 'end' => 217.5, 'length' => 120],        
        ['start' => 195, 'end' => 315, 'length' => 120],
        ['start' => 292.5, 'end' => 412.5, 'length' => 120],
        ['start' => 390, 'end' => 480, 'length' => 90]
    ];

    expect(Piece::createPieces(length: 480, maxPieceLength: 120, lap: 22.5))
        ->toEqual($pieces);
});

it('throws if maxPieceLength is equal to or less than lap length', function () {
    expect(fn() => Piece::createPieces(length: 40, maxPieceLength: 20))
        ->toThrow(Exception::class, 'maxPieceLength must be greater than lap.');

    expect(fn() => Piece::createPieces(length: 20, maxPieceLength: 15))
        ->toThrow(Exception::class, 'maxPieceLength must be greater than lap.');
});
