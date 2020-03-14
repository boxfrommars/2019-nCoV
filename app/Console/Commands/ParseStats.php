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
            'page' => 'Template:2019–20_coronavirus_pandemic_data',
            'format' => 'json',
            'prop' => 'wikitext',
        ];

        $url = $endPoint . '?' . http_build_query($params);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($output, true);

        $maintxt = $result['parse']['wikitext']['*'];
        $maintxt = preg_replace("/\[\[[^]]+\]\]/","", $maintxt);
        $maintxt = preg_replace('("[^"]*")',"", $maintxt);



//        $this->info($maintxt);

        $totalData = $this->parseString($maintxt, "| '''", 1);
        if ($totalData) {
            $totalData = json_encode($totalData);
            file_put_contents(storage_path('app' . DIRECTORY_SEPARATOR . 'data.json'), $totalData);
            $this->info('OK!');
            Log::debug('OK!');
            $this->info($totalData);
        } else {
            $this->error('NOT OK!');
            Log::error('NOT OK!');
        }

        $countries = ['Sweden', 'Finland', 'Estonia'];
        $cruiseData = [];

        foreach ($countries as $country) {
            $cruiseData[$country] = $this->parseString($maintxt, $country);
        }

        $cruiseData = json_encode($cruiseData);
        file_put_contents(storage_path('app' . DIRECTORY_SEPARATOR . 'cruise.json'), $cruiseData);
        $this->info($cruiseData);
    }

    /**
     * @param $text
     * @param $word
     * @param bool $offset
     * @return null|array
     */
    protected function parseString($text, $word, $offset = 0)
    {
        $txt = mb_substr($text, mb_strpos($text, $word));

        preg_match_all('/\|\s?\'*\s?\d+,?\d*/', $txt, $matches);
        $matches = $matches[0];
        $matches = array_map(function ($elm) { return $this->trim($elm); }, $matches);

        $matches = array_slice($matches, $offset);

        if (count($matches) >= 2 && $matches[0] > 10) {
            return [
                'infected' => (int)$matches[0],
                'deaths' => (int)$matches[1],
                'recovered' => (int)$matches[2],
            ];
        } else {
            $this->info($txt);
            $this->info(json_encode($matches));
        }

        return null;
    }

    protected function trim($str)
    {
        return  (int) str_replace(['\'', ',', '.', '|'], '', $str);
    }
}
