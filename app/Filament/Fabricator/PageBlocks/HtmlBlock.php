<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Textarea;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class HtmlBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('html-block')
            ->schema([
                Textarea::make('html')
                    ->label('HTML Content')
                    ->required(),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
