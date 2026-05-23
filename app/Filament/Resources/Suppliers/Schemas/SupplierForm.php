<?php

namespace App\Filament\Resources\Suppliers\Schemas;

use Filament\Schemas\Schema;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;

class SupplierForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('nama_perusahaan')
                    ->required(),

                TextInput::make('nama_kontak')
                    ->required(),

                TextInput::make('telepon')
                    ->tel()
                    ->required(),

                TextInput::make('email')
                    ->email()
                    ->required(),

                Textarea::make('alamat')
                    ->rows(4)
                    ->required(),

                FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('supplier'),

            ]);
    }
}
