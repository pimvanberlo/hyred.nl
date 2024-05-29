<?php

namespace App\Filament\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Textarea;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class CssBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('css-block')
            ->schema([
                Textarea::make('css')
                    ->label('CSS Content')
                    ->required(),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
