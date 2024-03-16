<?php

namespace App\Filament\Resources\StudentsResource\Pages;

use App\Filament\Resources\StudentsResource;
use App\Models\User;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateStudents extends CreateRecord
{
    protected static string $resource = StudentsResource::class;
    protected function handleRecordCreation(array $data): Model
    {
        $student = static::getModel()::create($data);
        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt('roll_no');
        $user->save();
        return $student;
    }
}
