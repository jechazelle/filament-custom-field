<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Forms\Components\MentionsRichEditor;
use Filament\Forms;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostsRelationManager extends RelationManager
{
    protected static string $relationship = 'posts';

    public function form(Form $form): Form
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
                    ])
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('content')
            ->columns([
                Tables\Columns\TextColumn::make('content'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
