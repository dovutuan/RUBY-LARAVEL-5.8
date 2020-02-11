<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'id',
            'name',
            'birth',
            'phone',
            'address',
            'gender',
            'email',
            'created_at'
        ];
    }

    public function collection()
    {
        $users = User::all();
        foreach ($users as $row) {
            $user[] = array(
                '0' => $row->id,
                '2' => $row->name,
                '3' => $row->birth,
                '4' => $row->phone,
                '5' => $row->address,
                '6' => $row->gender,
                '7' => $row->email,
                '8' => $row->created_at
            );
        }

        return (collect($user));
    }
}
