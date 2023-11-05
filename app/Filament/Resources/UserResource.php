<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use RalphJSmit\Filament\Components\Forms\Sidebar;
use RalphJSmit\Filament\Components\Forms\Timestamps;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $slug = 'users';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Sidebar::make([
                Section::make([
            TextInput::make('name')
                ->required(),

            TextInput::make('last_name'),

            TextInput::make('phone'),

            TextInput::make('email')
                ->required(),

//            DatePicker::make('email_verified_at')
//                ->label('Email Verified Date'),

            TextInput::make('password')
                ->required(),
                    ])
            ],[
                Section::make()
                    ->schema([
                        ...Timestamps::make(),
                    ])
            ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name')
                ->searchable()
                ->sortable(),

            TextColumn::make('last_name'),

            TextColumn::make('phone'),

            TextColumn::make('email')
                ->searchable()
                ->sortable(),

            TextColumn::make('email_verified_at')
                ->label('Email Verified Date')
                ->date(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'email'];
    }
}
