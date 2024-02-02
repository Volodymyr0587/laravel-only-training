<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class CreateNewProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:product';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new product through Artisan';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->ask('What is the product name?: ');
        $price = $this->ask('What is the product price?: ');
        $quantity = $this->ask('What is the product quantity?: ');

        Product::create([
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity,
        ]);

        $this->info("Product '$name' has been created");
    }
}
