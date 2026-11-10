<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PostForm
{
    // Must match the directory used by PostObserver to clean up files.
    public const ATTACHMENTS_DIRECTORY = 'posts/attachments';

    public const COVERS_DIRECTORY = 'posts/covers';

    public const DISK = 'public';

    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Select::make('category_id')
                    ->label('Categoria')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('title')
                    ->label('Título')
                    ->required()
                    ->maxLength(255),

                FileUpload::make('cover')
                    ->label('Capa')
                    ->image()
                    ->imageEditor()
                    ->disk(self::DISK)
                    ->directory(self::COVERS_DIRECTORY)
                    ->visibility('public')
                    ->maxSize(5120),

                RichEditor::make('content')
                    ->label('Conteúdo')
                    ->required()
                    ->toolbarButtons([
                        ['bold', 'italic', 'underline', 'strike', 'subscript', 'superscript', 'highlight', 'textColor'],
                        ['h1', 'h2', 'h3', 'lead', 'small'],
                        ['alignStart', 'alignCenter', 'alignEnd', 'alignJustify'],
                        ['blockquote', 'code', 'codeBlock', 'horizontalRule'],
                        ['bulletList', 'orderedList', 'details'],
                        ['link', 'attachFiles', 'table'],
                        ['clearFormatting', 'undo', 'redo'],
                    ])
                    ->fileAttachmentsDisk(self::DISK)
                    ->fileAttachmentsDirectory(self::ATTACHMENTS_DIRECTORY)
                    ->fileAttachmentsVisibility('public')
                    ->columnSpanFull(),

                Toggle::make('is_active')
                    ->label('Ativo')
                    ->default(true),
            ]);
    }
}
