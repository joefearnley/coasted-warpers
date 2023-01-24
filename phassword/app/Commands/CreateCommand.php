<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\View;
use LaravelZero\Framework\Commands\Command;
use function Termwind\{render};

class CreateCommand extends Command
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
        $useSpecialCharacters = $this->ask('Use special characters (Y/n)?') === 'y' ? true : false;
        $length = isset($length) ? intval($length) : 16;

        $characters = 'abcdefghiklmnopqrstvxyzABCDEFGHIKLMNOPQRSTVXYZ1234567890';
        if ($useSpecialCharacters ) {
            $characters .= '!@#$%^&*()+;';
        }

        $characters = str_split($characters);
        shuffle($characters);

        $password = '';
        for($i = 0; $i < $length; $i++) {
            $password .= $characters[array_rand($characters)];
        }

        render(view('result', ['password' => $password]));
    }
}
