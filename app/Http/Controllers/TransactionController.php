<?php

namespace App\Http\Controllers;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Http\Request;
use App\Models\addData;
use Carbon\Carbon; // Ensure you have Carbon for date handling

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = addData::query();

 
    // Get input values from the request, with default values if not provided
    $user = $request->input('user', '');
    $expence = $request->input('expence', '');
    $location = $request->input('location', '');
    $startdate = $request->input('startdate', '');
    $lastdate = $request->input('lastdate', '');

    // Start building the query
    $query = addData::query();

    // If a user is provided, add a 'where' clause to filter by user
    if (!empty($user)) {
        $query->where('user', 'like', "%$user%");
    }

    // If an expence is provided, add a 'where' clause to filter by expence
    if (!empty($expence)) {
        $query->where('expence', 'like', "%$expence%");
    }

    // If a location is provided, add a 'where' clause to filter by location
    if (!empty($location)) {
        $query->where('location', 'like', "%$location%");
    }

    // If a start date is provided, filter records where the custom_date is greater than or equal to the start date
    if (!empty($startdate)) {
        $query->whereDate('custom_date', '>=', $startdate);
    }

    // If an end date is provided, filter records where the custom_date is less than or equal to the end date
    if (!empty($lastdate)) {
        $query->whereDate('custom_date', '<=', $lastdate);
    }

    // Get the filtered data
    $data = $query->get();

    // Calculate the sum of the 'amount' column
    $sum = $data->sum('amount');

    // Calculate the count of the records
    $count = $data->count();

    // Return the view with the data and additional variables
    return view('admin.addData.allTransaction', compact('data', 'user', 'expence', 'location', 'startdate', 'lastdate', 'sum', 'count'));

    //
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function export(Request $request)
{
    $query = addData::query();
    
    // Retrieve filter parameters from the request
    $user = $request->input('user', '');
    $expence = $request->input('expence', '');
    $location = $request->input('location', '');
    $startdate = $request->input('startdate', '');
    $lastdate = $request->input('lastdate', '');

    // Build the query with filters
    $query = AddData::query();

    if (!empty($user)) {
        $query->where('user', 'like', "%$user%");
    }

    if (!empty($expence)) {
        $query->where('expence', 'like', "%$expence%");
    }

    if (!empty($location)) {
        $query->where('location', 'like', "%$location%");
    }

    if (!empty($startdate)) {
        $query->whereDate('custom_date', '>=', $startdate);
    }

    if (!empty($lastdate)) {
        $query->whereDate('custom_date', '<=', $lastdate);
    }

    // Fetch the filtered data
    $data = $query->get();

    // Calculate the total amount
    $totalAmount = $data->sum('amount');

    // Create a new spreadsheet
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();


// Add company name and date
    $companyName = 'Shafqat & Co. ';
    $currentDate = Carbon::now()->format('Y-m-d');

    $sheet->setCellValue('A1', $companyName);
    $sheet->setCellValue('A2', 'Date: ' . $currentDate);

    // Add header row
    $sheet->setCellValue('A4', 'ID');
    $sheet->setCellValue('B4', 'User');
    $sheet->setCellValue('C4', 'Expense');
    $sheet->setCellValue('D4', 'Payment');
    $sheet->setCellValue('E4', 'Location');
    $sheet->setCellValue('F4', 'Date');
    $sheet->setCellValue('G4', 'Amount');
    // Populate the spreadsheet with data
    $totalCredit = 0;
    $totalDebit = 0;
    $row = 5;
    foreach ($data as $item) {
        // Convert date if it's a string
        $date = $item->custom_date;
        if (is_string($date)) {
            $date = Carbon::parse($date);
        }


        // Set cell values
        $sheet->setCellValue('A' . $row, $item->id);
        $sheet->setCellValue('B' . $row, $item->user);
        $sheet->setCellValue('C' . $row, $item->expence);
        $sheet->setCellValue('D' . $row, $item->paymentType);
        $sheet->setCellValue('E' . $row, $item->location);
        $sheet->setCellValue('F' . $row, $date instanceof Carbon ? $date->format('Y-m-d') : $date);
        $sheet->setCellValue('G' . $row, $item->amount);
        $row++;

        if($item->paymentType == 'credit'){
              $totalCredit += $item->amount; 
        }elseif($item->paymentType == 'debit')
            {     $totalDebit += $item->amount;
            }
    }

    // Add total amount at the bottom
    $row++;
    $sheet->setCellValue('F' . $row, 'Total credit');
    $sheet->setCellValue('G' . $row, $totalCredit);
    $row++;
    $sheet->setCellValue('F' . $row, 'Total debit');
    $sheet->setCellValue('G' . $row, $totalDebit);
    $row++;
    $sheet->setCellValue('F' . $row, 'Total Amount');
    $sheet->setCellValue('G' . $row, $totalAmount);

    // Create a writer and stream the file to the response
    $writer = new Xlsx($spreadsheet);
    $fileName = 'transactions'.$currentDate.'.xlsx';

    return response()->stream(
        function() use ($writer) {
            $writer->save('php://output');
        },
        200,
        [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => "attachment; filename=\"$fileName\"",
        ]
    );
}
}

