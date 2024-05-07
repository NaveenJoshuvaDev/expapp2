<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Expense;

class ExpensesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //


        Expense::create([
            'Title' => 'Expense 5',
            'Description' => 'Description for Income 5',
            'Type' => 'Income',
            'Amount' => 450.00,
            'Date' => now(),
        ]);

        Expense::create([
            'Title' => 'Expense 6',
            'Description' => 'Description for Expense 6',
            'Type' => 'Income',
            'Amount' => 150.50,
            'Date' => now(),
        ]);
        Expense::create([
            'Title' => 'Expense 7',
            'Description' => 'Description for Expense 7',
            'Type' => 'Income',
            'Amount' => 50.50,
            'Date' => now(),
        ]);
        Expense::create([
            'Title' => 'Expense 8',
            'Description' => 'Description for Expense 8',
            'Type' => 'Income',
            'Amount' => 150.50,
            'Date' => now(),
        ]);
        Expense::create([
            'Title' => 'Expense 9',
            'Description' => 'Description for Expense 9',
            'Type' => 'Income',
            'Amount' => 250.50,
            'Date' => now(),
        ]);
        Expense::create([
            'Title' => 'Expense 10',
            'Description' => 'Description for Expense 10',
            'Type' => 'Expense',
            'Amount' => 160.50,
            'Date' => now(),
        ]);
        Expense::create([
            'Title' => 'Expense 11',
            'Description' => 'Description for Expense 11',
            'Type' => 'Expense',
            'Amount' => 500.50,
            'Date' => now(),
        ]);
        Expense::create([
            'Title' => 'Expense 12',
            'Description' => 'Description for Expense 12',
            'Type' => 'Expense',
            'Amount' => 450.50,
            'Date' => now(),
        ]);
        Expense::create([
            'Title' => 'Expense 13',
            'Description' => 'Description for Expense 13',
            'Type' => 'Expense',
            'Amount' => 190.50,
            'Date' => now(),
        ]);
        Expense::create([
            'Title' => 'Expense 14',
            'Description' => 'Description for Expense 14',
            'Type' => 'Expense',
            'Amount' => 350.50,
            'Date' => now(),
        ]);
    }
}
