<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

/**
 * Для генерации паролей
 * Class HashPassword
 * @package App\Console\Commands
 */
class HashPassword extends Command
{
    protected $signature = 'hash-password {password}';

    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->line('Hash: '.bcrypt($this->argument('password')));
    }
}
