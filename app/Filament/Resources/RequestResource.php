<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RequestResource\Pages;
use App\Filament\Resources\RequestResource\RelationManagers;
use App\Models\BergabungPerusahaan;
use App\Models\Request;
use App\Models\RequestBerhenti;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\DB;

class RequestResource extends Resource
{
    protected static ?string $model = RequestBerhenti::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('bisnisman_id')
                    ->required()
                    ->label('Status')
                    ->options([
                        'Setuju' => 'Setuju',
                        'Tidak Setuju' => 'Tidak Setuju',
                        '-' => '-',
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('bisnisman_id')->searchable(),
                TextColumn::make('partner_id')->searchable(),
                TextColumn::make('lowongan_id')->searchable(),
                TextColumn::make('Persetujuan_Bisnisman')->searchable(),
                TextColumn::make('Persetujuan_Partner')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\DeleteAction::make()
                    ->action(function ($record) {
                        // Custom delete logic
                        DB::transaction(function () use ($record) {
                            // Hapus data dari tabel Request
                            // dd($record->id);
                            // dd($record->bisnisman_id);
                            RequestBerhenti::where('id', $record->id)->delete();
                            BergabungPerusahaan::where([['user_id', $record->partner_id],['lowongan_id',$record->lowongan_id]])->delete();
                            $record->delete();
                        });

                        session()->flash('success', 'Data berhasil dihapus dari kedua tabel!');
                    }),
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
            'index' => Pages\ListRequests::route('/'),
            'create' => Pages\CreateRequest::route('/create'),
            'edit' => Pages\EditRequest::route('/{record}/edit'),
        ];
    }
}
