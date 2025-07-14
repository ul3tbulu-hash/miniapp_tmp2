<?php

namespace App\Filament\Resources;

use App\Models\Order;
use App\Models\Product;
use App\Models\CraftsmanProfile;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use App\Filament\Resources\OrderResource\Pages;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';
    protected static ?string $navigationLabel = 'Pesanan';
    protected static ?string $navigationGroup = 'Transaksi';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('product_id')
                ->relationship('product', 'title')
                ->label('Produk')
                ->required(),

            Select::make('craftsman_profile_id')
                ->relationship('craftsmanProfile.user', 'name')
                ->label('Pengrajin')
                ->required(),

            TextInput::make('customer_name')
                ->required()
                ->label('Nama Pelanggan'),

            TextInput::make('customer_email')
                ->email()
                ->required()
                ->label('Email'),

            TextInput::make('customer_phone')
                ->required()
                ->label('No. HP'),

            Textarea::make('customer_address')
                ->label('Alamat Lengkap')
                ->rows(3)
                ->required(),

            Select::make('status')
                ->options([
                    'pending' => 'Menunggu',
                    'processed' => 'Diproses',
                    'delivered' => 'Dikirim',
                    'cancelled' => 'Dibatalkan',
                ])
                ->label('Status Pesanan')
                ->required(),

            TextInput::make('total_price')
                ->numeric()
                ->required()
                ->label('Total Harga'),

            TextInput::make('payment_method')
                ->label('Metode Pembayaran')
                ->required(),

            Textarea::make('note')
                ->label('Catatan')
                ->rows(2)
                ->nullable(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('customer_name')->label('Nama Pelanggan')->searchable(),
                TextColumn::make('product.title')->label('Produk'),
                TextColumn::make('craftsmanProfile.user.name')->label('Pengrajin'),
                BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'pending',
                        'info' => 'processed',
                        'success' => 'delivered',
                        'danger' => 'cancelled',
                    ])
                    ->label('Status'),
                TextColumn::make('total_price')->money('IDR', true),
                TextColumn::make('created_at')->label('Tanggal')->dateTime('d M Y'),
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
