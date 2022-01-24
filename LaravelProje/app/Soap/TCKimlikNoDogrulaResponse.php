<?php
namespace App\Soap;

class TCKimlikNoDogrulaResponse
{
    protected $TCKimlikNoDogrulaResult;

    function __construct($TCKimlikNoDogrulaResult)
    {
      $this->TCKimlikNoDogrulaResult   = $TCKimlikNoDogrulaResult;
    }

    public function getTCKimlikNoDogrulaResult()
    {
      return $this->TCKimlikNoDogrulaResult;
    }
}
