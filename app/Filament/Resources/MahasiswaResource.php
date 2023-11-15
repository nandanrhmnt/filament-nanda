<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Mahasiswa;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Illuminate\Support\Facades\Date;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\MahasiswaResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MahasiswaResource\RelationManagers;

class MahasiswaResource extends Resource
{
    protected static ?string $model = Mahasiswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('npm')->required()->unique(ignorable:fn($record)=>$record),
                        TextInput::make('nama')->required(),
                        FileUpload::make('pas foto')->required(),
                        Select::make('jenis kelamin')->options([
                            'Laki-Laki'=>'Laki-Laki',
                            'Perempuan'=>'Perempuan'
                        ]),
                        TextInput::make('email')->required(),
                        TextInput::make('alamat')->required(),
                        DatePicker::make('tanggal lahir')->required(),
                        Select::make('agama')->options([
                            'Islam'=>'Islam',
                            'Kristen'=>'Kristen',
                            'Katolik'=>'Katolik',
                            'Hindu'=>'Hindu',
                            'Buddha'=>'Buddha',
                            'Konghucu'=>'Konghucu'
                        ]),
                        TextInput::make('nomor telepon')->required(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('pas foto'),
                TextColumn::make('npm')->sortable()->searchable(),
                TextColumn::make('nama')->searchable(),
                TextColumn::make('email'),
                TextColumn::make('nomor telepon'),
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
            'index' => Pages\ListMahasiswas::route('/'),
            'create' => Pages\CreateMahasiswa::route('/create'),
            'edit' => Pages\EditMahasiswa::route('/{record}/edit'),
        ];
    }    
}
