<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class MarioFlagPoleController extends Controller
{
    public function index()
    {
        $data = [
            'size' => null,
            'error' => null,
            'flag' => null
        ];

        if ($this->request->is('post')) {
            $sizeRaw = $this->request->getPost('size');
            $size = filter_var($sizeRaw, FILTER_VALIDATE_INT, ["options" => ["min_range" => 1]]);

            $data['size'] = $sizeRaw;

            if ($size === false) {
                $data['error'] = 'Please enter a positive integer.';
            } else {
                $data['flag'] = $this->generateFlag((int)$size);
            }
        }

        return view('mario_flag_pole', $data);
    }

    private function generateFlag(int $size)
    {
        $num = 1;
        $output = '';

        for ($i = 1; $i <= $size; $i++) {
            $row = '';
            for ($j = 0; $j < $i; $j++) {
                $row .= $num;
                $num++;
            }
            $output .= $row . "\n";
        }

        return $output;
    }
}
