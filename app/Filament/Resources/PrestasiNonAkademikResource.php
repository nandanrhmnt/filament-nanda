<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\PrestasiNonAkademik;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PrestasiNonAkademikResource\Pages;
use App\Filament\Resources\PrestasiNonAkademikResource\RelationManagers;

class PrestasiNonAkademikResource extends Resource
{
    protected static ?string $model = PrestasiNonAkademik::class;

    protected static ?string $navigationIcon = 'heroicon-o-trophy';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    TextInput::make('npm')->required()->unique(ignorable:fn($record)=>$record),
                    TextInput::make('nama prestasi')->required(),
                    Select::make('tingkat')->required()->options([
                        'Lokal'=>'Lokal',
                        'Nasional'=>'Nasional',
                        'Internasional'=>'Internasional'
                    ]),
                    Select::make('juara')->required()->options([
                        'Juara I'=>'Juara I',
                        'Juara II'=>'Juara II',
                        'Juara III'=>'Juara III',
                        'Harapan I'=>'Harapan I',
                        'Harapan II'=>'Harapan II',
                        'Harapan III'=>'Harapan III'
                    ]),
                    DatePicker::make('tahun')->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('npm')->sortable()->searchable(),
                TextColumn::make('nama prestasi')->searchable(),
                TextColumn::make('tingkat'),
                TextColumn::make('juara'),
                TextColumn::make('tahun'),
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
            'index' => Pages\ListPrestasiNonAkademiks::route('/'),
            'create' => Pages\CreatePrestasiNonAkademik::route('/create'),
            'edit' => Pages\EditPrestasiNonAkademik::route('/{record}/edit'),
        ];
    }    
}
