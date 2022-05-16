<?php

namespace App\Http\Traits;

use Illuminate\Support\Str;

trait Menus
{
    public function getUvarka()
    {
        $result['vitamin_a'] = 0.6;
        $result['vitamin_b1'] = 0.72;
        $result['vitamin_c'] = 0.4;
        $result['vitamin_pp'] = 0.8;
        $result['vitamin_d'] = 1;
        $result['vitamin_b2'] = 0.8;
        $result['mg'] = 0.87;
        $result['p'] = 0.87;
        $result['fe'] = 0.87;
        $result['ca'] = 0.88;
        $result['se'] = 0.88;
        $result['na'] = 0.76;
        $result['k'] = 0.83;
        $result['i'] = 1;
        return $result;
    }

    public function getKoefBJU()
    {
        $result['protein'] = 0.94;
        $result['fat'] = 0.88;
        $result['carbohydrates_total'] = 0.91;
        return $result;
    }

    public function getVitaminList()
    {
        $result['vitamin_a'] = 'vitamin_a';
        $result['vitamin_b1'] = 'vitamin_b1';
        $result['vitamin_c'] = 'vitamin_c';
        $result['vitamin_d'] = 'vitamin_d';
        $result['vitamin_b2'] = 'vitamin_b2';
        $result['mg'] = 'mg';
        $result['p'] = 'p';
        $result['fe'] = 'fe';
        $result['ca'] = 'ca';
        $result['se'] = 'se';
        $result['na'] = 'na';
        $result['k'] = 'k';
        $result['i'] = 'i';
        return $result;
    }
}
