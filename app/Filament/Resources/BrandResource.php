<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Brand;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\BrandResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BrandResource\RelationManagers;

class BrandResource extends Resource
{
	protected static ?string $model = Brand::class;

	protected static ?string $navigationIcon = 'heroicon-o-device-phone-mobile';

	protected static ?string $navigationLabel = 'Brands';

	protected static ?string $modelLabel = 'Brands';

	protected static ?string $navigationGroup = 'Master Data';

	public static function form(Form $form): Form
	{
		return $form
			->schema([
				Forms\Components\TextInput::make('name')
					->required()
					->maxLength(255),

				Forms\Components\FileUpload::make('logo')
					->image()
					->required(),

				Repeater::make('brandCategories')
					->relationship()
					->schema([
						Select::make('category_id')
							->relationship('category', 'name')
							->required(),
					]),
			]);
	}

	public static function table(Table $table): Table
	{
		return $table
			->columns([
				Tables\Columns\TextColumn::make('name')
					->searchable(),

				Tables\Columns\TextColumn::make('slug'),
				Tables\Columns\ImageColumn::make('logo'),
			])
			->filters([
				//
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
			'index' => Pages\ListBrands::route('/'),
			'create' => Pages\CreateBrand::route('/create'),
			'edit' => Pages\EditBrand::route('/{record}/edit'),
		];
	}
}
