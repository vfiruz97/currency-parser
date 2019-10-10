<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{ 
  protected $fillable = ['name', 'english_name', 'alphabetic_code', 'digit_code', 'rate'];   

  public function updateCurrencies()
  {
  	$today = date('d/m/Y');
  	$url = "http://www.cbr.ru/scripts/XML_daily.asp?date_req=".$today;
  	$xml = file_get_contents($url, false);

  	$array_currencies = simplexml_load_string($xml);

  	if(empty($array_currencies))
  		return;
  	
  	static::query()->truncate();
    foreach ($array_currencies as $currency) 
    {
    	$currencies = [];
    	$currencies["name"]			= $currency->Name;
    	$currencies["english_name"]	= $currency->Name;
    	$currencies["alphabetic_code"]= $currency->CharCode;
    	$currencies["digit_code"] 	= $currency->NumCode;
    	$currencies["rate"] 		= $currency->Value;

      static::create($currencies);
    }
  }
}
?>