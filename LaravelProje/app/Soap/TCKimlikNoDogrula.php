<?php
namespace App\Soap;

/**
 *
 */
class TCKimlikNoDogrula
{

  protected $TCKimlikNo;
  protected $Ad;
  protected $Soyad;
  protected $DogumYili;

  function __construct($TCKimlikNo,$Ad,$Soyad,$DogumYili)
  {
  $this->TCKimlikNo   = $TCKimlikNo;
  $this->Ad           = $Ad;
  $this->Soyad        = $Soyad;
  $this->DogumYili    = $DogumYili;
  }

  public function getTCKimlikNo()
    {
      return $this->TCKimlikNo;
    }
  public function getAd()
    {
      return $this->Ad;
    }
  public function getSoyad()
    {
      return $this->Soyad;
    }
  public function getDogumYili()
    {
      return $this->DogumYili;
    }


}
