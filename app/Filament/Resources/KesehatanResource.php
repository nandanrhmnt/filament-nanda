<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Kesehatan;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\KesehatanResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\KesehatanResource\RelationManagers;

class KesehatanResource extends Resource
{
    protected static ?string $model = Kesehatan::class;

    protected static ?string $navigationIcon = 'heroicon-o-heart';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    TextInput::make('npm')->required()->unique(ignorable:fn($record)=>$record),
                    TextInput::make('riwayat penyakit')->nullable(),
                    Select::make('golongan darah')->required()->options([
                        'A'=>'A',
                        'AB'=>'AB',
                        'O'=>'O',
                        'B'=>'B'
                    ]),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('npm')->sortable()->searchable(),
                TextColumn::make('riwayat penyakit')->searchable(),
                TextColumn::make('golongan darah'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListKesehatans::route('/'),
            'create' => Pages\CreateKesehatan::route('/create'),
            'edit' => Pages\EditKesehatan::route('/{record}/edit'),
        ];
    }    
}
