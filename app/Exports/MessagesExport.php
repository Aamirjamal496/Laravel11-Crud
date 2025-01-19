<?php

namespace App\Exports;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\Contact; // Assuming you have a Message model

class MessagesExport
{
    public function export()
    {
        // Fetch all messages from the database
        $messages = Contact::all(); // Adjust this query as needed

        // Create a new spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set the headers for the columns
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'name');
        $sheet->setCellValue('C1', 'email');
        $sheet->setCellValue('D1', 'Message');
        $sheet->setCellValue('E1', 'Created At');
        $sheet->setCellValue('F1', 'Updated At');

        // Add the message data to the spreadsheet
        $row = 2; // Start adding data from row 2
        foreach ($messages as $message) {
            $sheet->setCellValue('A' . $row, $message->id);
            $sheet->setCellValue('B' . $row, $message->name);
            $sheet->setCellValue('C' . $row, $message->email);
            $sheet->setCellValue('D' . $row, $message->message);
            $sheet->setCellValue('E' . $row, $message->created_at);
            $sheet->setCellValue('E' . $row, $message->updated_at);
            $row++;
        }

        // Write the file to storage
        $writer = new Xlsx($spreadsheet);
        $filePath = storage_path('app/public/messages_export.xlsx');
        $writer->save($filePath);

        return $filePath;
    }
}
