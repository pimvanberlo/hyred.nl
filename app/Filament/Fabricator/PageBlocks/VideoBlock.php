<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class VideoBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('video-block')
            ->schema([
                FileUpload::make('video')
                    ->label('Video')
                    ->acceptedFileTypes(['video/*'])
                    ->required(),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
