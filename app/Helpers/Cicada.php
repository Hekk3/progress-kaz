<?php

namespace App\Helpers;

class Cicada
{


    public static function rus_date()
    {
        $translate = array(
            "am" => "дп",
            "pm" => "пп",
            "AM" => "ДП",
            "PM" => "ПП",
            "Monday" => "Понедельник",
            "Mon" => "Пн",
            "Tuesday" => "Вторник",
            "Tue" => "Вт",
            "Wednesday" => "Среда",
            "Wed" => "Ср",
            "Thursday" => "Четверг",
            "Thu" => "Чт",
            "Friday" => "Пятница",
            "Fri" => "Пт",
            "Saturday" => "Суббота",
            "Sat" => "Сб",
            "Sunday" => "Воскресенье",
            "Sun" => "Вс",
            "January" => "Января",
            "Jan" => "Янв",
            "February" => "Февраля",
            "Feb" => "Фев",
            "March" => "Марта",
            "Mar" => "Мар",
            "April" => "Апреля",
            "Apr" => "Апр",
            "May" => "Мая",
            "June" => "Июня",
            "Jun" => "Июн",
            "July" => "Июля",
            "Jul" => "Июл",
            "August" => "Августа",
            "Aug" => "Авг",
            "September" => "Сентября",
            "Sep" => "Сен",
            "October" => "Октября",
            "Oct" => "Окт",
            "November" => "Ноября",
            "Nov" => "Ноя",
            "December" => "Декабря",
            "Dec" => "Дек",
            "st" => "ое",
            "nd" => "ое",
            "rd" => "е",
            "th" => "ое"
        );


        if (func_num_args() > 1) {
            $timestamp = func_get_arg(1);
            return strtr(date(func_get_arg(0), $timestamp), $translate);
        } else {
            return strtr(date(func_get_arg(0)), $translate);
        }
    }

    public static function imgSize($fileintm, $size = "1920")
    {
        $fileOut = str_replace(["/storage"], ["/storage/w-" . $size], $fileintm);
        if (file_exists($fileintm)) {
            if (!file_exists($fileOut)) {
                self::resize($fileintm, $fileOut, $size, '', '');
            }
        } else {
            if ($_SERVER['HTTP_HOST'] != "progresskaz.gip-trans-group.kz") {
                return str_replace("./storage/", "", $fileOut);
            } else {
                return str_replace("./storage/", "", $fileintm);
            }
        }

        return str_replace("./storage/", "", $fileOut);
    }

    public static function resize($file_input, $file_output, $w_o, $h_o, $percent = false)
    {


        if (@is_array(getimagesize($file_input))) {

            $minipatchsr = "";
            $counbosa = explode("/", $file_output);
            foreach ($counbosa as $keyx => $value) {

                if ((count($counbosa) - 1) > $keyx) {
                    $minipatchsr .= (($keyx == 0 && $file_output[0] != "/") ? "" : "/") . $value;
                    if (!is_dir($minipatchsr)) {
                        mkdir($minipatchsr);
                    }
                }
            }


            ini_set('memory_limit', '2560M');
            list($w_i, $h_i, $type) = getimagesize($file_input);

            if (!$w_i || !$h_i) {
                echo 'Невозможно получить длину и ширину изображения при уменьшении';
                return;
            }
            $types = array('', 'gif', 'jpeg', 'png');
            $ext = $types[$type];
            if ($ext) {
                $func = 'imagecreatefrom' . $ext;
                $img = $func($file_input);
            } else {
                echo 'Некорректный формат файла';
                return;
            }
            if ($percent) {
                $w_o *= $w_i / 100;
                $h_o *= $h_i / 100;
            }
            if (!$h_o) $h_o = $w_o / ($w_i / $h_i);
            if (!$w_o) $w_o = $h_o / ($h_i / $w_i);
            $img_o = imagecreatetruecolor($w_o, $h_o);

            imagealphablending($img_o, false);
            imagesavealpha($img_o, true);

            imagecopyresampled($img_o, $img, 0, 0, 0, 0, $w_o, $h_o, $w_i, $h_i);
            if ($type == 2) {

                return imagejpeg($img_o, $file_output, 100);

            } else {
                $func = 'image' . $ext;
                return $func($img_o, $file_output);
            }

        }
    }

}


