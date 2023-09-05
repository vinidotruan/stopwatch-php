<?php

class StopWatch {
    CONST FILENAME = 'stopwatch.txt';

    public function initializeTime()
    {
        echo "Quantos minutos voce gostaria no cronometro".PHP_EOL;
        $handle = fopen("php://stdin", "r");
        $line = (int) fgets($handle);

        $this->runTimer($line);
    }

    private function runTimer(int $minutes) {
        $timeInSeconds = $this->minutesToSeconds($minutes);

        while($timeInSeconds > 0){
            file_put_contents(StopWatch::FILENAME, $this->writeTimer($timeInSeconds));
            sleep(1);
            $timeInSeconds--;
        }
    }

    private function writeTimer(int $seconds): string
    {
        $inMinutesComplete = $this->secondsToMinutes($seconds);
        $minutes = floor($inMinutesComplete);
        $fractional = $inMinutesComplete - $minutes;
        $fractionalInSeconds = $fractional*60;
    
        return sprintf('%02d:%02d', $minutes, $fractionalInSeconds);
    }

    private function secondsToMinutes(int $seconds): float
    {
        return (float) ($seconds / 60);
    }

    private function minutesToSeconds(int $minutes): int
    {
        return $minutes * 60;
    }
}

(new StopWatch)->initializeTime();
