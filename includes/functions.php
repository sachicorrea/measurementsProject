<?php
  //  LENGTH AND DISTANCE
  // Conversions to meters
  define ('LENGTH_TO_METER', array(
      "inches" => 0.0254,
      "feet" => 0.3048,
      "yards" => 0.9144,
      "miles" => 1609.344,
      "millimeters" => 0.001,
      "centimeters" => 0.01,
      "meters" => 1,
      "kilometers" => 1000,
      "acres" => 63.614907234075, // Square root of 4046.8564224
      "hectares" =>  100 // Square root of 10000
  ));

  // FOREACH SELECTS
  function optionize($string){
    return str_replace(' ', '_', strtolower($string));
  }
  
  // VOLUMEN AND CAPACITY
  // Conversions to liters
  define ('VOLUME_TO_LITER', array(
    "cubic_inches" => 0.0163871,
    "cubic_feet" => 28.3168,
    "cubic_centimeters" => 0.001,
    "cubic_meters" => 1000,
    "imperial_gallons" => 4.54609,
    "imperial_quarts" => 1.13652,
    "imperial_pints" => 0.568261,
    "imperial_cups" => 0.284131,
    "imperial_ounces" => 0.0284131,
    "imperial_tablespoons" => 0.0177582,
    "imperial_teaspoons" => 0.00591939,
    "us_gallons" => 3.78541,
    "us_quarts" => 0.946353,
    "us_pints" => 0.473176,
    "us_cups" => 0.24,
    "us_ounces" => 0.0295735,
    "us_tablespoons" => 0.0147868,
    "us_teaspoons" => 0.00492892,
    "liters" => 1,
    "milliliters" => 0.001
  ));

  // MASS AND WEIGHT
  // Conversions to kilograms
  define ('MASS_TO_KILOGRAM', array(
    "ounces" =>	0.0283495,
    "pounds" =>	0.453592,
    "stones" =>	6.35029,
    "long_tons" =>	1016.05,
    "short_tons" =>	907.185,
    "milligrams" =>	0.000001,
    "grams" =>	0.001,
    "kilograms" =>	1,
    "metric_tonnes" =>	1000
  ));

  function float_to_string($float, $precision=20) {
    // Typecast to insure value is a float
    $float = (float) $float;
    $string = number_format($float, $precision, '.', '');
    $string = rtrim($string, '0'); // it removes zeros at the right of the decimal but stops when it finds a decimal different from zeros
    $string = rtrim($string, '.'); // To strip off the decimal if value is left in the rightmost position with no decimal numbers at the right
    return $string;
  }

  // LENGTH CONVERSION
  function convert_to_meters($value, $from_unit) 
  {
    if(array_key_exists($from_unit, LENGTH_TO_METER)) 
    {
      return $value * LENGTH_TO_METER[$from_unit];
    } 
    else 
    {
      return "Unsupported unit.";
    }   
  }
    
  function convert_from_meters($value, $to_unit) 
  {
    if(array_key_exists($to_unit, LENGTH_TO_METER)) 
    {
      return $value / LENGTH_TO_METER[$to_unit];
    } 
    else 
    {
      return "Unsupported unit.";
    } 
  }
    
  function convert_length($value, $from_unit, $to_unit)
  {
    $meter_value = convert_to_meters($value, $from_unit);
    $new_value = convert_from_meters($meter_value, $to_unit);
    return $new_value;
  }

  // AREA CONVERSION
  function convert_to_square_meters($value, $from_unit) 
  {
    $from_unit = str_replace('square_', '', $from_unit);

    if(array_key_exists($from_unit, LENGTH_TO_METER))
    {
      return $value * pow(LENGTH_TO_METER[$from_unit], 2);
    } 
    else 
    {
      return "Unsupported unit.";
    }
  }

  function convert_from_square_meters($value, $to_unit) 
  {
    $to_unit = str_replace('square_', '', $to_unit);
    
    if(array_key_exists($to_unit, LENGTH_TO_METER)) {
      return $value / pow(LENGTH_TO_METER[$to_unit], 2);
    } else {
      return "Unsupported unit.";
    }
  }
  
  function convert_area($value, $from_unit, $to_unit){
    $square_meter_value = convert_to_square_meters($value, $from_unit);
    $new_value = convert_from_square_meters($square_meter_value, $to_unit);
    return $new_value;
  }

  // VOLUME CONVERSION
  function convert_to_liters($value, $from_unit) 
  {
    if(array_key_exists($from_unit, VOLUME_TO_LITER))
    {
      return $value * VOLUME_TO_LITER[$from_unit];
    }
    else
    {
      return "Unsupported unit.";
    }
  }

  function convert_from_liters($value, $to_unit)
  {
    if(array_key_exists($to_unit, VOLUME_TO_LITER))
    {
      return $value / VOLUME_TO_LITER[$to_unit];
    }
    else 
    {
      return "Unsupported unit.";
    }
  }

  function convert_volume($value, $from_unit, $to_unit)
  {
    $volume_value = convert_to_liters($value, $from_unit);
    $new_value = convert_from_liters($volume_value, $to_unit);
    return $new_value;
  }

  // MASS CONVERSION
  function convert_to_kilograms($value, $from_unit)
  {
    if(array_key_exists($from_unit, MASS_TO_KILOGRAM))
    {
      return $value * MASS_TO_KILOGRAM[$from_unit]; 
    }
    else
    {
      return "Unsupported unit.";
    }
  }

  function convert_from_kilograms($value, $to_unit)
  {
    if(array_key_exists($to_unit, MASS_TO_KILOGRAM))
    {
      return $value / MASS_TO_KILOGRAM[$to_unit];
    }
    else {
      return "Unsupported unit.";
    }
  }

  function convert_mass($value, $from_unit, $to_unit)
  {
    $kg_value = convert_to_kilograms($value, $from_unit);
    $new_value = convert_from_kilograms($kg_value, $to_unit);
    return $new_value;
  }

?> 
