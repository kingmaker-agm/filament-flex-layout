<?php

namespace Kingmaker\FilamentFlexLayout\Infolists;

use Filament\Infolists\Components\Split;
use Kingmaker\FilamentFlexLayout\Concerns\HasGap;
use Kingmaker\FilamentFlexLayout\Concerns\HasHorizontalArrangement;

class Flex extends Split
{
    use HasGap;
    use HasHorizontalArrangement;

    protected string $view = "filament-flex-layout::infolists.flex";
}