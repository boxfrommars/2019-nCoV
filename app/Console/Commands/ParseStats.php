<?php


namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Throwable;
use Illuminate\Support\Facades\Log;


class ParseStats extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'parse:stats';

    protected $description = 'Parse Wikipedia data about infected people';

    /**
     * Execute the console command.
     * @throws Throwable
     */
    public function handle()
    {
        # action=parse&page=2019–20_Wuhan_coronavirus_outbreak&prop=wikitext&section=0&format=json&noimages=true
        $endPoint = 'https://en.wikipedia.org/w/api.php';
        $params = [
            'action' => 'parse',
            'page' => '2019–20_Wuhan_coronavirus_outbreak',
            'format' => 'json',
            'prop' => 'wikitext',
            'section' => 0,
        ];

        $url = $endPoint . '?' . http_build_query($params);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($output, true);

        $resultLines = [$result['parse']['wikitext']['*']];

        foreach ($resultLines as $line) {
            if (strpos($line, "'''Total'''") > 0) {

                preg_match_all('/\'\'\'[^\']+\'\'\'/', $line, $matches);
                if ((count($matches) === 1) && (count($matches[0]) >= 3)) {

                    $matches = $matches[0];
                    $indexOfTotal = array_search("'''Total'''", $matches);

                    $infected = str_replace(['\'', ',', '.'], '', $matches[$indexOfTotal + 1]);
                    $dead = str_replace(['\'', ',', '.'], '', $matches[$indexOfTotal + 2]);
                    $recovered = str_replace(['\'', ',', '.'], '', $matches[$indexOfTotal + 3]);

                    $result = json_encode([
                        'infected' => (int)$infected,
                        'deaths' => (int)$dead,
                        'recovered' => $recovered,
                    ]);

                    file_put_contents(storage_path('app' . DIRECTORY_SEPARATOR . 'data.json'), $result);

                    $this->info('OK!');
                    Log::debug('OK!');
                    $this->info($result);
                    break;
                } else {
                    $this->error('NOT OK!');
                    $this->warn($line);
                    Log::error('NOT OK!');
                    Log::debug($line);
                }
            }
        }
    }
}
