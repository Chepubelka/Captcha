<?php
 namespace Chepubelka\Captcha;
    class MyCaptcha
    {
        public function get()
        {
            $image = imagecreatetruecolor(200, 100);
            $background_color = imagecolorallocate($image, 255, 255, 255);
            imagefilledrectangle($image, 0, 0, 200, 100, $background_color);
            $line_color = imagecolorallocate($image, 64, 64, 64);
            for ($i = 0; $i < 5; $i++) {
                imageline($image, 0, rand() % 100, 200, rand() % 50, $line_color);
            }
            $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
            $len = strlen($letters);
            $letter = $letters[rand(0, $len - 1)];
            $text_color = imagecolorallocate($image, 0, 0, 0);
            $word = "";
            for ($i = 0; $i < 4; $i++) {
                $letter = $letters[rand(0, $len - 1)];
                imagestring($image, 5, 50 + ($i * 30), 50, $letter, $text_color);
                $word .= $letter;
            }
            $_SESSION['captcha_string'] = $word;
            imagepng($image, $word.".png");
        }
    }
?>