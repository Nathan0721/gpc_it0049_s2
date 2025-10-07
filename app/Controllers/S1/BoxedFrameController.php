<?php

namespace App\Controllers;

class BoxedFrameController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'BoxedFrame',
            'frameOutput' => '',
            'rowSize' => '',
            'columnSize' => ''
        ];
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['generate'])) {
            $rowSize = (int) $_POST['rowsize'];
            $columnSize = (int) $_POST['columnsize'];
            
            if ($rowSize > 0 && $columnSize > 0 && $rowSize <= 50 && $columnSize <= 100) {
                $data['rowSize'] = $rowSize;
                $data['columnSize'] = $columnSize;
                $data['frameOutput'] = $this->generateFrame($rowSize, $columnSize);
            } else {
                $data['error'] = 'Please enter valid numbers (Row: 1-50, Column: 1-100)';
                $data['rowSize'] = $rowSize;
                $data['columnSize'] = $columnSize;
            }
        } else {

        }
        
        return view('boxed_frame', $data);
    }
    
    private function generateFrame($rowSize, $columnSize)
    {
        $output = '';
        $frameSymbol = '*';
        
        for ($row = 1; $row <= $rowSize; $row++) {
            $line = '';
            
            if ($row === 1 || $row === $rowSize) {
                $line = str_repeat($frameSymbol, $columnSize);
            } elseif ($rowSize > 4 && ($row === 2 || $row === $rowSize - 1)) {
                if ($columnSize === 1) {
                    $line = $frameSymbol;
                } elseif ($columnSize === 2) {
                    $line = $frameSymbol . $frameSymbol;
                } else {
                    $line = $frameSymbol . str_repeat(' ', $columnSize - 2) . $frameSymbol;
                }
            } else {
                if ($columnSize === 1) {
                    $line = $frameSymbol;
                } elseif ($columnSize === 2) {
                    $line = $frameSymbol . $frameSymbol;
                } elseif ($columnSize === 3) {
                    $line = $frameSymbol . ' ' . $frameSymbol;
                } elseif ($columnSize === 4) {
                    $line = $frameSymbol . '  ' . $frameSymbol;
                } else {
                    $middleAsterisks = $columnSize - 4;
                    $line = $frameSymbol . ' ' . str_repeat($frameSymbol, $middleAsterisks) . ' ' . $frameSymbol;
                }
            }
            
            $output .= $line;
            if ($row < $rowSize) {
                $output .= "\n";
            }
        }
        
        return $output;
    }
}