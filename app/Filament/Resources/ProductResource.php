<?php

namespace App\Filament\Resources;

use App\Models\Product;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use App\Filament\Resources\ProductResource\Pages;
use Filament\Tables\Columns\BooleanColumn;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?string $navigationLabel = 'Produk';
    protected static ?string $navigationGroup = 'Manajemen Produk';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('title')
                ->label('Nama Produk')
                ->required()
                ->maxLength(255),

            TextInput::make('slug')
                ->disabled()
                ->dehydrated()
                ->hint('Akan diisi otomatis dari judul')
                ->maxLength(255),

            Textarea::make('excerpt')
                ->label('Deskripsi Singkat')
                ->rows(2)
                ->nullable(),

            Textarea::make('description')
                ->label('Deskripsi Lengkap')
                ->rows(4)
                ->nullable(),

            TextInput::make('price')
                ->label('Harga')
                ->numeric()
                ->prefix('Rp')
                ->required(),

            FileUpload::make('image')
                ->label('Gambar Utama')
                ->image()
                ->directory('products')
                ->nullable(),

            Select::make('category_id')
                ->label('Kategori')
                ->relationship('category', 'name')
                ->searchable()
                ->preload()
                ->required(),

            Select::make('user_id')
                ->label('Pengrajin')
                ->relationship('user', 'name')
                ->searchable()
                ->preload()
                ->required(),

            Toggle::make('is_published')
                ->label('Dipublikasikan?')
                ->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Nama Produk')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('category.name')
                    ->label('Kategori')
                    ->sortable(),

                TextColumn::make('user.name')
                    ->label('Pengrajin')
                    ->sortable(),

                BadgeColumn::make('is_published')
                    ->label('Status'),
                    //->boolean(),

                TextColumn::make('price')
                    ->label('Harga')
                    ->money('IDR', true)
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y'),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
