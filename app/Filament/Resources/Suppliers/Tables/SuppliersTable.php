<?php

namespace App\Filament\Resources\Suppliers\Tables;

use Filament\Tables\Table;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

use Filament\Actions\EditAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\BulkActionGroup;

class SuppliersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                ImageColumn::make('image')
                    ->disk('public')
                    ->label('Logo'),

                TextColumn::make('nama_perusahaan')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('nama_kontak')
                    ->searchable(),

                TextColumn::make('telepon'),

                TextColumn::make('email')
                    ->searchable(),

                TextColumn::make('alamat')
                    ->limit(30),

                TextColumn::make('created_at')
                    ->dateTime(),

            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
