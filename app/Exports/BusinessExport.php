<?php

namespace App\Exports;

use App\Models\Business;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class BusinessExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    protected $businesses;

    public function __construct($businesses)
    {
        $this->businesses = $businesses;
    }

    public function collection()
    {
        return $this->businesses;
    }

    public function headings(): array
    {
        return [
            'Nama Pemilik',
            'Nama Usaha',
            'Lokasi',
            'Telepon',
            'Deskripsi',
            'Customer Segments',
            'Value Propositions',
            'Channels',
            'Customer Relationships',
            'Revenue Streams',
            'Key Resources',
            'Key Activities',
            'Key Partnerships',
            'Cost Structure',
            'Tanggal Dibuat',
            'Tanggal Diupdate'
        ];
    }

    public function map($business): array
    {
        return [
            $business->owner_name,
            $business->business_name,
            $business->location,
            $business->phone_number,
            $business->business_description,
            implode('; ', $business->bmcData->customer_segments ?? []),
            implode('; ', $business->bmcData->value_propositions ?? []),
            implode('; ', $business->bmcData->channels ?? []),
            implode('; ', $business->bmcData->customer_relationships ?? []),
            implode('; ', $business->bmcData->revenue_streams ?? []),
            implode('; ', $business->bmcData->key_resources ?? []),
            implode('; ', $business->bmcData->key_activities ?? []),
            implode('; ', $business->bmcData->key_partnerships ?? []),
            implode('; ', $business->bmcData->cost_structure ?? []),
            $business->created_at->format('d/m/Y H:i'),
            $business->updated_at->format('d/m/Y H:i')
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
