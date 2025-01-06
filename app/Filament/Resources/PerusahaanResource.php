<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Perusahaan;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PerusahaanResource\Pages;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Resources\PerusahaanResource\RelationManagers;

class PerusahaanResource extends Resource
{
    protected static ?string $model = Perusahaan::class;
    public static function canCreate(): bool
    {
        return false;
    }
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('status')
                    ->required()
                    ->label('Status')
                    ->options([
                        'terverifikasi' => 'terverifikasi',
                        'pendding' => 'pendding',
                        'ditolak' => 'ditolak',
                    ]),
                TextInput::make('alasan')
                    ->label('Alasan Ditolak'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // TextColumn::make('user_id'),
                TextColumn::make('pemilik_perusahaan')->url(fn($record) => route('profileUser.index', ['id' => $record->user_id]))
                ->searchable(),
                TextColumn::make('nama_perusahaan')->url(fn($record) => route('profilPerusahaan', ['id' => $record->id]))
                ->searchable(),
                TextColumn::make('email_perusahaan')->searchable(),
                TextColumn::make('no_telp'),
                // SpatieMediaLibraryFileUpload::make('image')
                //     ->url(fn($record) => asset('storage/' . $record->foto_ktp))
                //     ->size(100),
                // ImageColumn::make('foto_ktp')
                //     ->url(fn($record) => asset('storage/' . $record->foto_ktp))
                //     ->getStateUsing(fn ($record) => asset('storage/foto_ktp/' . basename($record->foto_ktp)))
                //     ->size(100),
                TextColumn::make('foto_ktp')
                    ->label('Foto KTP')
                    ->html()
                    ->getStateUsing(
                        fn($record) =>
                        "<img src='" . asset('storage/' . $record->foto_ktp) . "' alt='Foto KTP' style='max-width: 100px; max-height: 100px;'>"
                    )->url(fn($record) => asset('storage/' . $record->foto_perusahaan)),
                TextColumn::make('foto_perusahaan')
                    ->label('Logo Perusahaan')
                    ->html()
                    ->getStateUsing(
                        fn($record) =>
                        "<img src='" . asset('storage/' . $record->foto_perusahaan) . "' alt='Foto KTP' style='max-width: 100px; max-height: 100px;'>"
                    )->url(fn($record) => asset('storage/' . $record->foto_perusahaan)),

                // ImageColumn::make('foto_perusahaan')
                //     ->url(fn($record) => asset('storage/' . $record->foto_perusahaan))
                //     ->size(100),
                TextColumn::make('status')
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'pendding' => 'Pendding',
                        'terverifikasi' => 'Terverifikasi',
                        'ditolak' => 'Ditolak',
                    ])->default('pendding')
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPerusahaans::route('/'),
            'create' => Pages\CreatePerusahaan::route('/create'),
            'edit' => Pages\EditPerusahaan::route('/{record}/edit'),
        ];
    }
}
