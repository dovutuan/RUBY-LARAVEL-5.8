<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'stt',
            'id',
            'name',
            'category_id',
            'likes',
            'views',
            'created_at'
        ];
    }

    public function collection()
    {
        $products = Product::where('created_by', Auth::user()->id)->get();
        foreach ($products as $key => $row) {
            $product[] = [
                '0' => $key + ONE,
                '1' => $row->id,
                '2' => $row->name,
                '3' => $row->categories->name,
                '4' => $row->likes,
                '5' => $row->views,
                '6' => $row->created_at,
            ];
        }

        return (collect($product));
    }
}
