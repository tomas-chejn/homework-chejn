<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class Task1Controller extends Controller
{
    public function page(): View
    {
        $randomNumbers = $this->getRandomNumbers();
        $duplicates = $this->getDuplicates($randomNumbers);

        return view('task1', [
            'duplicates' => $duplicates
        ]);
    }

    private function getRandomNumbers(): array
    {
        $randomNumbers = [];
        $amount = 1000000;
        $min = 1;
        $max = $amount;

        for ($i = $min; $i <= $amount; $i++) {
            $randomNumbers[] = rand($min, $max);
        }

        return $randomNumbers;
    }

    private function getDuplicates(array $randomNumbers): array
    {
        $lines = [];

        // fill $lines with $number => $occurence
        foreach ($randomNumbers as $randomNumber) {
            if (!isset($lines[$randomNumber])) {
                $lines[$randomNumber] = 1;
            } else {
                $lines[$randomNumber] = $lines[$randomNumber] += 1;
            }
        }

        // remove lines with less than 2 occurences
        foreach ($lines as $number => $occurence) {
            if ($occurence < 2) {
                unset($lines[$number]);
            }
        }

        // sort from highest amount of occurences to lowest
        arsort($lines);

        return $lines;
    }
}
