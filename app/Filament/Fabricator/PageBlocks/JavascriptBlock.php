<?php

namespace App\Filament\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Textarea;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class JavascriptBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('javascript-block')
            ->schema([
                Textarea::make('javascript')
                    ->label('JavaScript Content')
                    ->required(),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
