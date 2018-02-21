<?php
// APIKEY is AIzaSyAHUp32-b_Jv6cYCCiR1vJ5JovvzFyXVn8

// Google API function modified from: https://wordpress.stackexchange.com/questions/224711/integrating-php-into-javascript-to-display-map-markers-with-google-api

namespace App\Controller;

use App\Entity\Location;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class geoController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function initPage(Request $request)
    {

        return $this->render('default/new.html.twig', array());

}

/**
 * @Route("/get", name="get")
 */

public function getLatLong(){
    if (isset($_GET['submitForm'])) {

        $address = urlencode($_GET["address"]);
        //Formatted address
        $formattedAddr = str_replace(' ','+',$address);
        //Send request and receive json data by address
        $geocodeFromAddr = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key=AIzaSyAHUp32-b_Jv6cYCCiR1vJ5JovvzFyXVn8");
        $output = json_decode($geocodeFromAddr, true);
if ($output['status']=='OK') {
        $latitude = isset($output['results'][0]['geometry']['location']['lat']) ? $output['results'][0]['geometry']['location']['lat'] : "";
        $longitude = isset($output['results'][0]['geometry']['location']['lng']) ? $output['results'][0]['geometry']['location']['lng'] : "";

        $lati = (string)$latitude;
        $longi = (string)$longitude;

        if($lati && $longi){
          return new Response(
            $this->render('default/new.html.twig', array(
              'lati' => $lati,
              'longi' => $longi,
            ))
          );
        }else{
          return new Response($output['status']);
        }
      }

        else{
          echo "<strong>ERROR: {$output['status']}</strong>";
         return false;
        }
    }else{
      echo "<strong>ERROR: {$output['status']}</strong>";
         return false;
    }
}

}
