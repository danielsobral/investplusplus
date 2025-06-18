<?php

namespace App\Enums\Reit;

enum ReitType: string
{
    case BRICK = 'brick_reit';
    case PAPER = 'paper_reit';
    case MIXED = 'mixed_reit';
}
