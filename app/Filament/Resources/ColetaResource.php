<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ColetaResource\Pages;
use App\Filament\Resources\ColetaResource\RelationManagers;
use App\Models\Coleta;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ColetaResource extends Resource
{
    protected static ?string $model = Coleta::class;

    protected static ?string $navigationIcon = 'heroicon-o-chevron-double-right';

    protected static ?string $navigationLabel = 'Coletas';

    protected static ?string $navigationGroup = 'Reciclagem';

    protected static ?string $modelLabel = 'Coleta';

    protected static ?string $pluralModelLabel = 'Coletas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Name')
                    ->required(),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label("#")
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('name'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label("Criado em")
                    ->dateTime("d/m/Y H:i:s")
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label("Atualizado em")
                    ->dateTime("d/m/Y H:i:s")
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    //Tables\Actions\DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                /*Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),*/]);
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
            'index' => Pages\ListColetas::route('/'),
            'create' => Pages\CreateColeta::route('/create'),
            'edit' => Pages\EditColeta::route('/{record}/edit'),
        ];
    }
}
