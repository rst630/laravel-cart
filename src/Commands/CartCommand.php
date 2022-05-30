<?php

namespace Rst630\Cart\Commands;

use Illuminate\Console\Command;

class CartCommand extends Command
{
    public $signature = 'laravel-cart';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
