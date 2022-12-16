<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class Create extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'create';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Create new password';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $length = $this->ask('Password Length (default 16)?');
        $useSpecialCharacters = $this->ask('Use special characters (Y/n)?');

        $length = isset($length) ? intval($length) : 16;
        $useSpecialCharacters = $useSpecialCharacters === 'y' || $useSpecialCharacters === 'Y' 
            ? $useSpecialCharacters : true;

        $characters = 'abcdefghiklmnopqrstvxyzABCDEFGHIKLMNOPQRSTVXYZ1234567890';

        if ($useSpecialCharacters) {
            $characters .= '!@#$%^&*()+;';
        }

        $characters = str_split($characters);
        shuffle($characters);

        $password = '';
        for($i = 0; $i < $length; $i++) {
            $password .= $characters[array_rand($characters)];
        }

        $this->info($password);
    }
}
