<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Field;
use Filament\Forms\Components\RichEditor;

class MentionsRichEditor extends RichEditor
{
    protected string $view = 'forms.components.mentions-rich-editor';

    protected array $mentionsItems = [];

    public function mentionsItems(): static
    {
        $this->mentionsItems = [
            [
                'key' => 'test',
                'link' => 'profil'
            ],
            [
                'key' => 'test2',
                'link' => 'profil2'
            ]
        ];

        return $this;
    }

    public function getMentionsItems(): array
    {
        return $this->mentionsItems;
    }
}
