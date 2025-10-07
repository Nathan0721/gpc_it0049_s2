<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class HoneyCombController extends Controller {

    public function index() {
        $data = [
            'rows' => null,
            'cols' => null,
            'output' => null
        ];

        if ($this->request->is('post')) {
            $rows = (int) $this->request->getPost('row');
            $cols = (int) $this->request->getPost('column');

            $data['rows'] = $rows;
            $data['cols'] = $cols;
            $data['output'] = $this->generate_honeycomb($rows, $cols);
        }

        return view('honey_comb', $data);
    }

    private function generate_honeycomb($rows, $cols) {
        $hex = [
            "  **  ",
            " *  * ",
            "*    *",
            "*    *",
            " *  * ",
            "  **  "
        ];

        $result = "";

        for ($r = 0; $r < $rows; $r++) {
            foreach ($hex as $lineIndex => $line) {
                if ($r > 0 && $lineIndex < 2) {
                continue;
                }

                for ($c = 0; $c < $cols; $c++) {
                    if ($c > 0) {
                        $lineToAdd = substr($line, 1);
                    } else {
                        $lineToAdd = $line;
                    }
                    $result .= $lineToAdd;
                }
                $result .= "\n";
            }
        }

        return $result;
    }

}

