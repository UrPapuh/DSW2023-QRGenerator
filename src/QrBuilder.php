<?php
namespace UrPapuh\QrGenerator;

require_once ('../vendor/autoload.php');

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Label\LabelAlignment;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;

abstract class QrBuilder{
    public static function create(string $data, string $label, string $filename) {
        $code = Builder::create()
            ->writer(new PngWriter())
            ->writerOptions([])
            ->data($data)
            ->encoding(new Encoding('UTF-8'))
            ->errorCorrectionLevel(ErrorCorrectionLevel::High)
            ->size(300)
            ->margin(5)
            ->roundBlockSizeMode(RoundBlockSizeMode::Margin)
            // ->logoPath(__DIR__.'/assets/symfony.png')
            // ->logoResizeToWidth(50)
            // ->logoPunchoutBackground(true)
            ->labelText($label)
            ->labelFont(new NotoSans(20))
            ->labelAlignment(LabelAlignment::Center)
            ->validateResult(false)
            ->build();
        $code->saveToFile(__DIR__."/../public/img/{$filename}.png");
    }
}