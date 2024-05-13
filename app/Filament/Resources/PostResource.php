<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Forms\Components\MentionsRichEditor;
use App\Models\Post;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $slug = 'posts';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('Tab 1')
                            ->schema([
                                MentionsRichEditor::make('content')
                                    ->mentionsItems(),
                            ]),
                        Tabs\Tab::make('Tab 2')
                            ->schema([
                                MentionsRichEditor::make('content2')
                                    ->mentionsItems(),
                            ]),
                        Tabs\Tab::make('Tab 3')
                            ->schema([
                                MentionsRichEditor::make('content3')
                                    ->mentionsItems(),
                            ]),
                    ])->activeTab(2)

                /*Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('Tab 1')
                            ->schema([
                                MarkdownEditor::make('content'),
                            ]),
                        Tabs\Tab::make('Tab 2')
                            ->schema([
                                MarkdownEditor::make('content2'),
                            ]),
                        Tabs\Tab::make('Tab 3')
                            ->schema([
                                MarkdownEditor::make('content3'),
                            ]),
                    ])->activeTab(2)*/
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('content'),
                TextColumn::make('content2'),
                TextColumn::make('content3'),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [];
    }
}
