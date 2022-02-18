<?php

namespace App\Console\Commands;

use App\Models\Log;
use Illuminate\Console\Command;

class UpdateLogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'logs:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Команда для загрузки логов в базу';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    private function getBrowserFromUserAgent(string $ua): string
    {
        if (str_contains($ua, 'Firefox')) {
            return 'Firefox';
        } elseif (str_contains($ua, 'OPR')) {
            return 'Opera';
        } elseif (str_contains($ua, 'Mobile')) {
            return 'Mobile';
        } elseif (str_contains($ua, 'Edge')) {
            return 'Microsoft Edge';
        } elseif (str_contains($ua, 'Trident')) {
            return 'Internet Explorer';
        } elseif (str_contains($ua, 'YaBrowser')) {
            return 'YaBrowser';
        } elseif (str_contains($ua, 'Kinza')) {
            return 'Kinza';
        } elseif (str_contains($ua, 'Chrome')) {
            return 'Chrome';
        } else {
            return 'Safari';
        }
    }

    private function getOSFromUserAgent(string $ua): string
    {
        if (str_contains($ua, 'Android')) {
            return 'Android';
        } elseif (str_contains($ua, 'Windows')) {
            return 'Windows';
        } elseif (str_contains($ua, 'iPhone')) {
            return 'Mac OS X';
        } elseif (str_contains($ua, 'Linux') or str_contains($ua, 'linux')) {
            return 'Linux';
        } elseif (str_contains($ua, 'Mac OS X')) {
            return 'Mac OS X';
        } else {
            return '-';
        }
    }

    private function getArchitecFromUserAgent(string $ua): string
    {
        if (str_contains($ua, 'Android') or str_contains($ua, 'iPhone')) {
            return 'ARM';
        } elseif (str_contains($ua, 'WOW64') or str_contains($ua, 'Win64')) {
            return 'x64';
        } elseif (str_contains($ua, 'x32') or str_contains($ua, 'x86')) {
            return 'x32';
        } else {
            return '-';
        }
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $filename = 'modimio.access.log.1';
        $filepath = __DIR__.'\\..\\..\\..\\logs\\'.$filename;

        $bar = $this->output->createProgressBar(121157);
        $bar->start();

        if (file_exists($filepath)) {
            $handle = fopen($filepath, "r");

            while(!feof($handle)) {
                $logs = new Log();
                $line = trim(fgets($handle));
                $temp = explode('"', $line);
                $ua = array_slice($temp, -2, 1)[0];


                if (!str_contains($ua, 'compatible')) {
                    $logs->ip = explode(' ', $temp[0])[0];
                    $logs->date = explode(':', mb_substr($temp[0], strripos($temp[0], '[') + 1))[0];
                    $logs->url = $temp[3];
                    $logs->os = $this->getOSFromUserAgent($ua);
                    $logs->architec = $this->getArchitecFromUserAgent($ua);
                    $logs->browser = $this->getBrowserFromUserAgent($ua);
                }

                $bar->advance();
                $logs->save();
            }

        }
    }
}
