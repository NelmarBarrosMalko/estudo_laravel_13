<?php

namespace App\Filament\Resources\Posts\Tables;

use App\Filament\Resources\Posts\Schemas\PostForm;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Notifications\Notification;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->columns([
                TextColumn::make('user.name')
                    ->label('Autor')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('category.name')
                    ->label('Categoria')
                    ->searchable()
                    ->sortable(),

                ImageColumn::make('cover')
                    ->label('Capa')
                    ->disk(PostForm::DISK)
                    ->square(),

                TextColumn::make('title')
                    ->label('Título')
                    ->searchable()
                    ->sortable()
                    ->limit(50),

                ToggleColumn::make('is_active')
                    ->label('Ativo')
                    ->onIcon(Heroicon::OutlinedCheck)
                    ->offIcon(Heroicon::OutlinedXMark)
                    ->onColor('success')
                    ->offColor('danger')
                    ->afterStateUpdated(function (): void {
                        Notification::make()
                            ->title('Status atualizado com sucesso')
                            ->success()
                            ->send();
                    }),

                TextColumn::make('views')
                    ->label('Visualizações')
                    ->numeric()
                    ->icon(Heroicon::OutlinedEye)
                    ->sortable(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
