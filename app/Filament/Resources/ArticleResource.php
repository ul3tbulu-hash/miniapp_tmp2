<?php

namespace App\Filament\Resources;

use App\Models\Article;
use App\Models\User;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use App\Filament\Resources\ArticleResource\Pages;
use Filament\Tables\Columns\BooleanColumn;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Artikel';
    protected static ?string $navigationGroup = 'Konten';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('title')
                ->required()
                ->maxLength(255),

            TextInput::make('slug')
                ->required()
                ->unique(ignoreRecord: true),

            Textarea::make('excerpt')
                ->label('Ringkasan')
                ->rows(2),

            Textarea::make('content')
                ->label('Isi Artikel')
                ->rows(6)
                ->required(),

            FileUpload::make('featured_image')
                ->image()
                ->directory('articles')
                ->label('Gambar Utama')
                ->nullable(),

            Select::make('user_id')
                ->relationship('user', 'name')
                ->label('Penulis')
                ->required(),

            Toggle::make('is_published')
                ->label('Terbitkan Artikel?'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->sortable()->searchable(),
                TextColumn::make('user.name')->label('Penulis'),
                BadgeColumn::make('is_published')
                    //->boolean()
                    ->label('Status'),
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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
