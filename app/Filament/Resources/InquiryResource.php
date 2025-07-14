<?php

namespace App\Filament\Resources;

use App\Models\Inquiry;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DateTimePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
//use Filament\Tables\Columns\DateTimeColumn;
use App\Filament\Resources\InquiryResource\Pages;
//use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BooleanColumn;

class InquiryResource extends Resource
{
    protected static ?string $model = Inquiry::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';
    protected static ?string $navigationLabel = 'Form Masuk';
    protected static ?string $navigationGroup = 'Komunikasi';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')
                ->label('Nama')
                ->required(),

            TextInput::make('email')
                ->label('Email')
                ->email()
                ->required(),

            Select::make('type')
                ->options([
                    'join_craftsman' => 'Permintaan Gabung',
                    'general_inquiry' => 'Pertanyaan Umum',
                ])
                ->label('Jenis Pesan')
                ->required(),

            Textarea::make('message')
                ->label('Pesan')
                ->rows(5)
                ->required(),

            DateTimePicker::make('read_at')
                ->label('Dibaca Pada')
                ->nullable()
                ->disabled()
                ->visibleOn('edit'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('email')->sortable()->searchable(),
                BadgeColumn::make('type')
                    ->colors([
                        'primary' => 'general_inquiry',
                        'success' => 'join_craftsman',
                    ])
                    ->formatStateUsing(fn (string $state) => $state === 'join_craftsman' ? 'Gabung Pengrajin' : 'Pertanyaan Umum'),

                //DateTimeColumn::make('created_at')->label('Tanggal Masuk')->sortable(),
                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y'),
                BooleanColumn::make('read_at')
                    ->label('Status Dibaca')
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-eye-slash')
                    ->trueColor('success')
                    ->falseColor('gray'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make()
                    ->label('Tandai Dibaca')
                    ->visible(fn ($record) => $record->read_at === null),
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
            'index' => Pages\ListInquiries::route('/'),
            'edit' => Pages\EditInquiry::route('/{record}/edit'),
        ];
    }
}
