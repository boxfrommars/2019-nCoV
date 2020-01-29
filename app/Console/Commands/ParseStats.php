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
            'page' => 'Template:2019_coronavirus_pandemic_data',
            'format' => 'json',
            'prop' => 'wikitext',
//            'section' => 6,
        ];

        $url = $endPoint . '?' . http_build_query($params);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($output, true);

        $txt = $result['parse']['wikitext']['*'];
        $txt = mb_substr($txt, mb_strpos($txt, 'Total'));

        preg_match_all('/\d+,?\d+/', $txt, $matches);
        $matches = $matches[0];
        $matches = array_map(function ($elm) { return $this->trim($elm); }, $matches);

//        $lastData = json_decode(file_get_contents(storage_path('app') . DIRECTORY_SEPARATOR . 'data.json'), true);
        if (count($matches) >= 2 && $matches[0] > 5500) {
            $result = json_encode([
                'infected' => (int)$matches[0],
                'deaths' => (int)$matches[1],
                'recovered' => 79,
                'countries' => 18,
            ]);

            file_put_contents(storage_path('app' . DIRECTORY_SEPARATOR . 'data.json'), $result);

            $this->info('OK!');
            Log::debug('OK!');
            $this->info($result);
        } else {
            $this->error('NOT OK!');
            $this->warn($txt);
            $this->warn(json_encode($matches));
            Log::error('NOT OK!');
            Log::debug($txt);
            Log::debug(json_encode($matches));
        }
    }

    protected function trim($str)
    {
        return  (int) str_replace(['\'', ',', '.'], '', $str);
    }
}
