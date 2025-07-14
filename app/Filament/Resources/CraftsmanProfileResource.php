<?php

namespace App\Filament\Resources;

use App\Models\CraftsmanProfile;
use App\Models\User;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\ImageColumn;
use App\Filament\Resources\CraftsmanProfileResource\Pages;

class CraftsmanProfileResource extends Resource
{
    protected static ?string $model = CraftsmanProfile::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    protected static ?string $navigationLabel = 'Profil Pengrajin';
    protected static ?string $navigationGroup = 'Manajemen Pengrajin';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('user_id')
                ->relationship('user', 'name')
                ->label('Pengguna')
                ->required(),

            Textarea::make('bio')
                ->label('Bio')
                ->rows(3),

            TextInput::make('location')
                ->label('Lokasi')
                ->required(),

            FileUpload::make('photo')
                ->image()
                ->directory('craftsmen')
                ->label('Foto')
                ->nullable(),

            Toggle::make('is_approved')
                ->label('Disetujui?')
                ->default(false),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('photo')
                    ->label('Foto')
                    ->circular(),

                TextColumn::make('user.name')
                    ->label('Nama Pengguna'),

                TextColumn::make('location')
                    ->label('Lokasi'),

                BooleanColumn::make('is_approved')
                    ->label('Disetujui'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCraftsmanProfiles::route('/'),
            'create' => Pages\CreateCraftsmanProfile::route('/create'),
            'edit' => Pages\EditCraftsmanProfile::route('/{record}/edit'),
        ];
    }
}
