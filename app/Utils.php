<?php

namespace App;

use Mail;
use Swift_Transport;
use Swift_Message;
use Swift_Mailer;
use Swift_SmtpTransport;

class Utils {

    public static function sendEmail($name,$email,$company,$phone,$services="-----",$message="-----",$client_type="-------"){
        $to = "nezkastudio@gmail.com, manuel.alzamoraf@gmail.com";
        $subject = "Cotizacion - ".$company;
        $html = "<html>
        <head>
        </head>
        <body>
            <div>
                <strong>Nombre:</strong>
                <label>".$name."</label>
            </div>
            <div>
                <strong>Correo:</strong>
                <label>".$email."</label>
            </div>
            <div>
                <strong>Empresa:</strong>
                <label>".$company."</label>
            </div>
            <div>
                <strong>Telefono:</strong>
                <label>".$company."</label>
            </div>
            <div>
                <strong>Servicios:</strong>
                <label>".$services."</label>
            </div>
            <div>
                <strong>Tipo de Cliente:</strong>
                <label>".$client_type."</label>
            </div>
            <div>
                <strong>Mensaje:</strong>
                <p>".$message."</p>
            </div>
        </body>
        </html>";


        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <webmaster@example.com>' . "\r\n";
        $headers .= 'Cc: myboss@example.com' . "\r\n";

        $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587))
                        ->setUsername('nezkastudio@gmail.com')
                        ->setPassword('freya2018');

        $mailer = new Swift_Mailer($transport);

        $message = (new Swift_Message('Cotizacion - '.$company))
        ->setFrom(['nezkastudio@gmail.com' => 'Nezka Studio'])
        ->setTo(['nezkastudio@gmail.com', 'manuel.alzamoraf@gmail.com' => 'Manuel'])
        ->setBody($html);

        $result = $mailer->send($message);
    }


    public static function youtube($string,$is_amp,&$clean,$autoplay=0,$width=745,$height=480)
    {
        preg_match_all('#(?:http://)?(?:https://)?(?:www\.)?(?:youtube\.com/(?:v/|watch\?v=)|youtu\.be/)([\w-]+)(?:\S+)?#', $string, $match);
        $mtchs = array_unique($match[0]);
        $ids = array_unique($match[1]);
        $result = $string;
        for($i = 0; $i < count($mtchs);$i++) {
          if($is_amp){
            $embed = sprintf('<amp-youtube width="480" height="270" layout="responsive" data-videoid="%s"></amp-youtube>',$ids[$i]);
          }else{
            $embed = '<iframe style="max-width: 100%;width: 100%;margin: 0 auto;" title="YouTube video player" width="'.$width.'" height="'.$height.'" src="https://www.youtube.com/embed/'.$ids[$i].'?autoplay='.$autoplay.'" frameborder="0" allowfullscreen></iframe>';
          }
          $result = str_replace(strip_tags($mtchs[$i]), $embed, $result);
          $clean = str_replace($mtchs[$i], "", $result);
          $result = str_replace("[embed]", "", $result);
          $result = str_replace("[/embed]", "", $result);
          $clean = str_replace("[embed]", "", $result);
          $clean = str_replace("[/embed]", "", $result);


        }
        
        return $result;
    }

    public static function vimeo($string,$is_amp,&$clean,$autoplay=0,$width=745,$height=480)
    {
        preg_match_all('#(?:http://)?(?:https://)?(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/(?:[^\/]*)\/videos\/|album\/(?:\d+)\/video\/|video\/|)(\d+)(?:[a-zA-Z0-9_\-]+)?#', $string, $match);
        $mtchs = array_unique($match[0]);
        $ids = array_unique($match[1]);
        $result = $string;
        
        for($i = 0; $i < count($mtchs);$i++) {
          if($is_amp){
            $embed = sprintf('<amp-youtube width="480" height="270" layout="responsive" data-videoid="%s"></amp-youtube>',$ids[$i]);
          }else{
            $embed = '<iframe src="https://player.vimeo.com/video/'.$ids[$i].'" width="'.$width.'" height="'.$height.'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
          }
          $result = str_replace(strip_tags($mtchs[$i]), $embed, $result);
          $clean = str_replace($mtchs[$i], "", $result);
          $result = str_replace("[embed]", "", $result);
          $result = str_replace("[/embed]", "", $result);
          $clean = str_replace("[embed]", "", $result);
          $clean = str_replace("[/embed]", "", $result);
        }
        if(count($ids) == 0)
            $clean = "";
        
        return $result;
    }


    public static function closetags($html) {
        preg_match_all('#<([a-z]+)(?: .*)?(?<![/|/ ])>#iU', $html, $result);
        $openedtags = $result[1];   #put all closed tags into an array
        preg_match_all('#</([a-z]+)>#iU', $html, $result);
        $closedtags = $result[1];
        $len_opened = count($openedtags);
        if (count($closedtags) == $len_opened) {
            return $html;
        }

        $openedtags = array_reverse($openedtags);

        for ($i=0; $i < $len_opened; $i++) {
            if($openedtags[$i] != "img" && $openedtags[$i] != "br"){
                if (!in_array($openedtags[$i], $closedtags)){

                $html .= '</'.$openedtags[$i].'>';

            } else {

                unset($closedtags[array_search($openedtags[$i], $closedtags)]);    }

            }
        }

        return $html;
   }  
    
    public static function instagram($string, $is_amp,&$clean) {
        preg_match_all('#(?:http://)?(?:https://)?(?:www\.)?(?:instagram\.com/|instagr\.am/)(?:p/)([\w-]+)(?:\S+)?#', $string, $match);        
        $mtchs = array_unique($match[0]);
        $ids = array_unique($match[1]);
        $result = $string;
        for($i = 0; $i < count($mtchs);$i++) {
         $embed = 'https://api.instagram.com/oembed?url=http://instagr.am/p/' . $ids[$i];
         try{
           $code = json_decode(file_get_contents($embed));
           if($is_amp){
            $html = sprintf('<amp-instagram data-shortcode="%s" width="1" height="1" layout="responsive"></amp-instagram>',$ids[$i]);
           }else{
            $html = $code->html; 
           }
           $result = str_replace($mtchs[$i], $html, $result);
         }catch(\Exception $e){
          $result = str_replace($mtchs[$i], "", $result);
         }
         $clean = str_replace($mtchs[$i], "", $result);
         
        }
        return $result;
    }
    
    public static function twitter($string,$is_amp,&$clean) {
      $string = str_replace("[embed]", "", $string);
      $string = str_replace("[/embed]", "", $string);
      $change = strip_tags($string);
      preg_match_all('#(?:http://)?(?:https://)?(?:www\.)?(?:twitter\.com/)(?:\S+/)?(?:\status/)?([\w-]+)(?:\S+)?#', $change, $match);

      
      $mtchs = array_unique($match[0]);
      $ids = array_unique($match[1]);
      $result = $string;
      for($i = 0; $i < count($mtchs);$i++) {
       $embed = 'https://publish.twitter.com/oembed?url=https://twitter.com/Interior/status/' . $ids[$i];
        try{
          $code = json_decode(file_get_contents($embed));
          if($is_amp){
            $html = sprintf('<amp-twitter width="375" height="472" layout="responsive" data-tweetid="%s"></amp-twitter>',$ids[$i]);
          }else{
            $html = $code->html;  
          }
          $result = str_replace(strip_tags($mtchs[$i]), $html, $result);
        }catch(\Exception $e){
          $result = str_replace($mtchs[$i], "", $result);   
        }
        $clean = str_replace(strip_tags($mtchs[$i]), "", $result);
      }
      
      return $result;
     }

    public static function getYouTubeIdFromURL($url) {
        $pattern = 
                    '%^# Match any youtube URL
                    (?:https?://)?  # Optional scheme. Either http or https
                    (?:www\.)?      # Optional www subdomain
                    (?:             # Group host alternatives
                    youtu\.be/    # Either youtu.be,
                    | youtube\.com  # or youtube.com
                    (?:           # Group path alternatives
                        /embed/     # Either /embed/
                    | /v/         # or /v/
                    | /watch\?v=  # or /watch\?v=
                    )             # End path alternatives.
                    )               # End host alternatives.
                    ([\w-]{10,12})  # Allow 10-12 for 11 char youtube id.
                    $%x'
                    ;
                $result = preg_match($pattern, $url, $matches);
                if ($result) {
                    return $matches[1];
                }
                return false;
    }

    public static function parseHtml(&$clean,$description,$is_amp=false){
        $description = self::closetags(self::nl2p(self::youtube(self::instagram(self::twitter(self::vimeo(self::facebook($description,$is_amp,$clean),$is_amp,$clean),$is_amp,$clean),$is_amp,$clean),$is_amp,$clean)));
        if($is_amp){
          preg_match_all('/<img[^>]+>/i',$description, $result); 
          if(count($result[0])>0){
              $matchs = $result[0];
              foreach ($matchs as $key => $value) {
                preg_match_all('/(alt|title|src)=("[^"]*")/i',$value, $rest);
                $image = $rest[0][0];
                if(strpos("alt", $rest[0][0]) === false){
                    if(array_key_exists(1, $rest[0])){
                        $image = str_replace('src=', "", $rest[0][1]);
                        $image = str_replace('"', "", $image);
                    }else{
                        $image = str_replace('src=', "", $rest[0][0]);
                        $image = str_replace('"', "", $image);
                    }
                        
                }
                $new_value = sprintf('<amp-img src="%s" width="1" height="1" layout="responsive" alt="AMP"></amp-img>',$image);
                $description = str_replace($value, $new_value, $description);
              }
          }
          preg_match('/<iframe.*src=\"(.*)\".*><\/iframe>/isU', $description, $result);
          if(count($result)>0){
            $new_value = sprintf('<amp-iframe width="500"
            height="281"
            layout="responsive"
            sandbox="allow-scripts allow-same-origin allow-popups"
            allowfullscreen
            frameborder="0"
            src="%s">
            </amp-iframe>',$result[1]);
            $description = str_replace($result[0], $new_value, $description);
          }
          $description = preg_replace('#(<[a-z ]*)(style=("|\')(.*?)("|\'))([a-z ]*>)#', '\\1\\6', $description);
        }
        if($clean==""){
          $clean = $description;
        }
        return $description;
    }

    public static function facebook($string, $is_amp = false, $width = 745, $height = 480) {
      preg_match_all('#(?:http://)?(?:https://)?(?:www\.)?(?:facebook\.com/|fb\.com)(?:\S+)?#', $string, $match);
      $mtchs = $match[0];
      $result = $string;
      for($i = 0; $i < count($mtchs);$i++) {
        if($is_amp){
          $embed = sprintf('<amp-facebook width="552" height="310" layout="responsive" data-href="%s" ></amp-facebook>',$mtchs[$i]);
        }else{

          $embed = '<iframe src="https://www.facebook.com/plugins/post.php?href=' . strip_tags($mtchs[$i]) . '&width=' . $width . '&show_text=true&height=' . $height . '" width="' . $width . '" height="' . $height . '" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>';  
        }
        $result = str_replace(strip_tags($mtchs[$i]), $embed, $result);
      }
      return $result;
    }
    
    public static function get_url_iframe($iframe_string){
        preg_match('/src="([^"]+)"/', $iframe_string, $match);
        $url = $match[1];
        return $url;
    }



    public static function niceTime($date, $includeHour = true) {
        $time = date("N-j-n-H:i-a", strtotime($date));
        $days = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
        $months = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre");
        $explode = explode("-", $time);
        $day = $days[$explode[0] - 1];
        $month = $months[$explode[2] - 1];
        if ($includeHour) {
            $nicetime = sprintf("%s %d de %s - %s", $day, $explode[1], $month, $explode[3]);
        } else {
            $nicetime = sprintf("%s %d de %s", $day, $explode[1], $month);
        }

        return $nicetime;
    } 

    public static function nl2p($str) {
        $arr=explode("\n",$str);
        $out='';

        for($i=0;$i<count($arr);$i++) {
        if(strlen(trim($arr[$i]))>0)
            $out.='<p>'.trim($arr[$i]).'</p>';
        }
        return $out;
      }
}
