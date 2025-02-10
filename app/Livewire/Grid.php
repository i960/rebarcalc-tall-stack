<?php

namespace App\Livewire;

use App\Services\Grid as RebarGrid;
use App\Services\Svg;
use Livewire\Component;

class Grid extends Component
{
    public $widthFeet;
    public $widthInches;
    public $lengthFeet;
    public $lengthInches;
    public $spacing;

    public $svg = '';

    public function mount() {
        $this->widthFeet = 10;
        $this->widthInches = 0;
        $this->lengthFeet = 10;
        $this->lengthInches = 0;
        $this->spacing = 24;

        $this->calculate();
    }

    public function calculate() {
        $this->validate();
        $this->validateTotalWidth();
        $this->validateTotalLength();

        $width = $this->getTotalInches($this->widthFeet, $this->widthInches);
        $length = $this->getTotalInches($this->lengthFeet, $this->lengthInches);

        $grid = RebarGrid::createGrid(xLength: $width, yLength: $length, xSpacing: $this->spacing, ySpacing: $this->spacing, maxPieceLength: 240);

        $this->svg = Svg::render($grid, $width, $length);
    }

    public function render()
    {
        return view('livewire.grid');
    }

    protected function rules()
    {
        return [
            'spacing' => 'required|numeric|min:6|max:48',
        ];
    }

    protected function validateTotalWidth()
    {
        if ($this->getTotalInches($this->widthFeet, $this->widthInches) > 1200) {
            $this->addError('totalWidth', 'The total width cannot exceed 100 feet.');
        } else {
            $this->resetErrorBag('totalWidth');
        }
    }

    protected function validateTotalLength()
    {
        if ($this->getTotalInches($this->lengthFeet, $this->lengthInches) > 1200) {
            $this->addError('totalLength', 'The total length cannot exceed 100 feet.');
        } else {
            $this->resetErrorBag('totalLength');
        }
    }

    protected function getTotalInches(float $feet, float $inches): float {
        return ($feet * 12) + $inches;
    }
}
