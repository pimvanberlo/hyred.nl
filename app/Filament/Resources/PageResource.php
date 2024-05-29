<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use Filament\Resources\Resource;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Z3d0X\FilamentFabricator\Forms\Components\PageBuilder;
use Z3d0X\FilamentFabricator\Enums\BlockPickerStyle;
use App\Filament\PageBlocks\ImageBlock;
use App\Filament\PageBlocks\VideoBlock;
use App\Filament\PageBlocks\TextBlock;
use App\Filament\PageBlocks\HtmlBlock;
use App\Filament\PageBlocks\JavascriptBlock;
use App\Filament\PageBlocks\CssBlock;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Select::make('type')
                    ->options([
                        'client_blog' => 'Client Blog',
                        'creator_blog' => 'Creator Blog',
                        'knowledgebase' => 'Knowledgebase',
                        'page' => 'Page',
                    ])
                    ->required(),
                PageBuilder::make('blocks')
                    ->collapsible()
                    ->blockPickerStyle(BlockPickerStyle::Dropdown)
                    ->blocks([
                        ImageBlock::class,
                        VideoBlock::class,
                        TextBlock::class,
                        HtmlBlock::class,
                        JavascriptBlock::class,
                        CssBlock::class,
                    ]),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->sortable(),
                Tables\Columns\TextColumn::make('category')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'client_blog' => 'Client Blog',
                        'creator_blog' => 'Creator Blog',
                        'knowledgebase' => 'Knowledgebase',
                        'page' => 'Page',
                    ]),
                Tables\Filters\SelectFilter::make('category')
                    ->options([
                        'news' => 'News',
                        'updates' => 'Updates',
                        'tips' => 'Tips',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
