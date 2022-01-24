<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FirmaModel;
use App\Models\MusteriModel;
use Artisaninweb\SoapWrapper\SoapWrapper;
use App\Soap\TCKimlikNoDogrula;
use App\Soap\TCKimlikNoDogrulaResponse;

class Uyelikislemleri extends Controller
{
    protected $soapWrapper;

    public function __construct(SoapWrapper $soapWrapper)
    {
     $this->soapWrapper = $soapWrapper;
    }


    public function form()
    {
      $firmalar=FirmaModel::get();
      //echo $firmalar;
      return view('uyelik',['firmalar'=>$firmalar]);
    }


    public function mernisKontrol($tckn,$ad,$soyad,$yil)
    {
      $this->soapWrapper->add('Mernis', function ($service) {
      $service
        ->wsdl('https://tckimlik.nvi.gov.tr/service/kpspublic.asmx?wsdl')
        ->trace(true)
        ->classmap([
          TCKimlikNoDogrula::class,
          TCKimlikNoDogrulaResponse::class,
        ]);
      });



      $response = $this->soapWrapper->call('Mernis.TCKimlikNoDogrula', [
        new TCKimlikNoDogrula($tckn,$ad,$soyad,$yil)
       ]);

       return $response->getTCKimlikNoDogrulaResult();

    }


    public function uyekayit(Request $uyebilgileri)
    {

      $firma=FirmaModel::find($uyebilgileri->input('firma'));

      $uyebilgileri->validate([
        "kimlikno"=>"required|min:11|max:11",
        "ad"=>"required|min:3|max:50",
        "soyad"=>"required|min:3|max:50",
        "dogumYili"=>"required",
        "telefon"=>"required|min:10|max:10",
        "mail"=>"required|email"
      ]);

        if($firma->mernis_kontrol==1)
        {
          $bdate = strtotime($uyebilgileri->input("dogumYili"));
          $year = date('Y', $bdate);
        $sonuc=$this->mernisKontrol($uyebilgileri->input("kimlikno"),$uyebilgileri->input("ad"),$uyebilgileri->input("soyad"),$year);
        if($sonuc==false)
        {
          echo "hatalı tc girişi";
          return;
        }
        }



      // ["id","tc","firma_id","ad","soyad","date","mail","telefon"]
      MusteriModel::create([

        "firma_id"=>$uyebilgileri->input('firma'),
        "tc"=>$uyebilgileri->input('kimlikno'),
        "ad"=>$uyebilgileri->input('ad'),
        "soyad"=>$uyebilgileri->input('soyad'),
        "telefon"=>$uyebilgileri->input('telefon'),
        "date"=>$uyebilgileri->input('dogumYili'),
        "mail"=>$uyebilgileri->input('mail'),

      ]);


      echo " bilgiler kayıt edildi";
    }
}
