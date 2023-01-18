<?php
namespace App\Helper;


use App\Models\Cart;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
/**
 *
 */
class TaimHelper
{

   const SECONDS_PER_MINUTE = 60; // секунд в минуте
   const SECONDS_PER_HOUR = 3600; // секунд в часу
   const SECONDS_PER_DAY = 86400;

   public  $peremennaj;
   public $updated_at;



   public function foodButton($updated_at, $peremennaj)
  {
    $provizi = 3;
    $formula = $peremennaj / $provizi;

    // реализация самого таймера

    $timeh = date('H', strtotime($updated_at));
    $timei = date('i', strtotime($updated_at));
    $times = date('s', strtotime($this->updated_at));

    // за основу взята функция mktime
    $s = $times; // переменная секунда
    $x = $timeh;// переменная час
    $r = $timei + $formula;// переменная минуты здесь же мы прибовляем время которая храниться в бд
    $m = date("m", strtotime($updated_at));// переменная месяц
    $e = date("d", strtotime($updated_at));// переменная день
    $i = date("Y", strtotime($updated_at));// переменная год

    $endOfDiscount = mktime($x,$r,$s,$m,$e,$i);
    $niw = time(); // текущее время
    $secondsRemaining = $endOfDiscount - $niw; // оставшееся время

    $minut = self::SECONDS_PER_MINUTE; // секунд в минуте
    $hour = self::SECONDS_PER_HOUR; // секунд в часу
    $day = self::SECONDS_PER_DAY; // секунд в дне

    $tag = floor($secondsRemaining / $day); //дни, до даты
    $secondsRemaining -= ($tag * $day);     //обновляем переменную

    $hou = floor($secondsRemaining / $hour); // часы до даты
    $secondsRemaining -= ($hou * $hour);     //обновляем переменную

    $minu = floor($secondsRemaining / $minut); //минуты до даты
    $secondsRemaining -= ($minu * $minut);     //обновляем переменную

echo $this->peremennaj;

    if ($tag > -1){
      //До окончания

        if($tag > 0){
      echo  $tag;
      echo "дней";
      }
        else{}


        if($hou > 0){
      echo  $hou;
      echo " час ";
      }
        else{}


        if($minu > 0){
      echo   $minu;
      echo " минут";
       }
         else{}

}
         //if($secondsRemaining > 0)
      //   {{$secondsRemaining}} секунда
        // else
  }

   public function foodButtonYon($updated_at, $peremennaj)
  {
    $provizi = 2;
    $formula = $peremennaj / $provizi;

    // реализация самого таймера

    $timeh = date('H', strtotime($updated_at));
    $timei = date('i', strtotime($updated_at));
    $times = date('s', strtotime($this->updated_at));

    // за основу взята функция mktime
    $s = $times; // переменная секунда
    $x = $timeh;// переменная час
    $r = $timei + $formula;// переменная минуты здесь же мы прибовляем время которая храниться в бд
    $m = date("m", strtotime($updated_at));// переменная месяц
    $e = date("d", strtotime($updated_at));// переменная день
    $i = date("Y", strtotime($updated_at));// переменная год

    $endOfDiscount = mktime($x,$r,$s,$m,$e,$i);
    $niw = time(); // текущее время
    $secondsRemaining = $endOfDiscount - $niw; // оставшееся время

    $minut = self::SECONDS_PER_MINUTE; // секунд в минуте
    $hour = self::SECONDS_PER_HOUR; // секунд в часу
    $day = self::SECONDS_PER_DAY; // секунд в дне

    $tag = floor($secondsRemaining / $day); //дни, до даты
    $secondsRemaining -= ($tag * $day);     //обновляем переменную

    $hou = floor($secondsRemaining / $hour); // часы до даты
    $secondsRemaining -= ($hou * $hour);     //обновляем переменную

    $minu = floor($secondsRemaining / $minut); //минуты до даты
    $secondsRemaining -= ($minu * $minut);     //обновляем переменную

echo $this->peremennaj;

    if ($tag > -1){
      //До окончания

        if($tag > 0){
      echo  $tag;
      echo "дней";
      }
        else{}


        if($hou > 0){
      echo  $hou;
      echo " час ";
      }
        else{}


        if($minu > 0){
      echo   $minu;
      echo " минут";
       }
         else{
          //проверка на наличия нуля
          $minu = 0;
          echo $minu;

         }

}
  


  }


}


 ?>
