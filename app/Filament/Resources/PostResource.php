<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Forms\Components\MentionsRichEditor;
use App\Models\Post;
use App\Models\User;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
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

                Select::make('user_id')
                    ->label('Author')
                    ->options(fn () => User::all()->pluck('email', 'id'))
                    ->searchable()
                    ->required()
                    ->allowHtml(),

                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('Tab 1')
                            ->schema([
                                RichEditor::make('content')
                                    ->mentionsItems(),
                            ]),
                        Tabs\Tab::make('Tab 2')
                            ->schema([
                                RichEditor::make('content2')
                                    ->mentionsItems(),
                            ]),
                        Tabs\Tab::make('Tab 3')
                            ->schema([
                                RichEditor::make('content3')
                                    ->mentionsItems(),
                            ]),
                    ])
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
