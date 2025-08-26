<?php

namespace App\Filament\Resources\Posts\Schemas;

use Illuminate\Support\Str;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DateTimePicker;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('author_id')
                    ->relationship('author', 'name'),
                Select::make('category_id')
                    ->relationship('category', 'name'),
                TextInput::make('title')
                    ->required()
                    ->live(onBlur: true)
                    ->maxLength(255)
                    ->afterStateUpdated(fn($state, callable $set) =>
                    $set('slug', Str::slug($state))),
                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->disabled() // biar user nggak bisa edit
                    ->dehydrated(), // tetap tersimpan ke DB walau disabled
                Textarea::make('content')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('thumbnail')
                    ->disk('public')
                    ->directory('thumbnails')
                    ->image()
                    ->preserveFilenames()
                    ->nullable()
                    ->columnSpanFull(),
                DateTimePicker::make('published_at')
                    ->nullable()
                    ->label('Published At')
                    ->seconds(false)
                    ->default(now())
                    ->columnSpanFull(),
            ]);
    }
}
