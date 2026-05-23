<?php

namespace App\Filament\Resources\Items\Schemas;

use Filament\Schemas\Schema;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;

class ItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('nama_barang')
                    ->required(),

                TextInput::make('kode_barang')
                    ->required()
                    ->unique(ignoreRecord: true),

                TextInput::make('stok')
                    ->numeric()
                    ->required(),

                TextInput::make('harga')
                    ->numeric()
                    ->prefix('Rp')
                    ->required(),

                Select::make('kondisi')
                    ->options([
                        'Baik' => 'Baik',
                        'Rusak Ringan' => 'Rusak Ringan',
                        'Rusak Berat' => 'Rusak Berat',
                    ])
                    ->required(),

                TextInput::make('lokasi')
                    ->required(),

                FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('barang'),

                Textarea::make('deskripsi')
                    ->rows(4),

                Select::make('users_id')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

            ]);
    }
}
