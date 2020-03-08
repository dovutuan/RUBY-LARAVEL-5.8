<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
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
        $products = Product::all();
        foreach ($products as $row) {
            $product[] = array(
                '0' => $row->id,
                '1' => $row->name,
                '2' => $row->category->name,
                '5' => $row->likes,
                '6' => $row->views,
                '10' => $row->created_at
            );
        }

        return (collect($product));
    }
}
