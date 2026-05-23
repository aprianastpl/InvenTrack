<?php

namespace App\Filament\Resources\Items\Tables;

use Filament\Tables\Table;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

use Filament\Actions\EditAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\BulkActionGroup;

class ItemsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                ImageColumn::make('image')
                    ->disk('public')
                    ->label('Gambar'),

                TextColumn::make('nama_barang')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('kode_barang')
                    ->searchable(),

                TextColumn::make('stok')
                    ->badge(),

                TextColumn::make('harga')
                    ->money('IDR'),

                TextColumn::make('kondisi')
                    ->badge(),

                TextColumn::make('lokasi'),

                TextColumn::make('user.name')
                    ->label('User'),

                TextColumn::make('created_at')
                    ->dateTime('d M Y'),

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
