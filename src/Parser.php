<?php

class Parser
{
    public static function parse($url)
    {
        $yearNumber = preg_replace('/\D+/', '', $url);
        $year       = new Year($yearNumber);

        $options = [
            'http' => [
                'method' => "GET",
                'header' => "Accept-language: ru\r\n" .
                    "User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/78.0.3904.108 Chrome/78.0.3904.108 Safari/537.36\r\n"
            ],
        ];

        $context = stream_context_create($options);

        $html = file_get_contents($url, false, $context);
        $dom  = new DOMDocument();
        @$dom->loadHTML($html);

        $xml       = simplexml_import_dom($dom);
        $rawMonths = $xml->xpath("//table[@class='cal']");

        // Месяцы.
        foreach ($rawMonths as $monthNumber => $rawMonth) {
            $monthName = (string) $rawMonth->thead->tr->th[0];
            $month     = new Month($monthNumber + 1, $monthName);

            // Дни.
            foreach ($rawMonth->tbody->tr as $tr) {
                foreach ($tr->td as $td) {
                    $dayNumber = (int) $td;
                    $dayStatus = (string) $td['class'];

                    // Дни из других месяцев.
                    if ($dayStatus == 'inactively') {
                        continue;
                    }

                    $day = new Day($dayNumber, explode(' ', $dayStatus));
                    $month->addDay($day);
                }
            }

            $year->addMonth($month);
        }

        return $year;
    }
}
