<?php
/** 
* Convert jSON object to XML
* Source: https://gist.github.com/ontiuk/59d029a8ac4bd3fd4102a357e7ce6e6c
*/

/** 
 * Iterative XML constructor 
 * 
 * @param array $array 
 * @param object|boolean $xml 
 * @return string 
 */
 function array2xml( $array, $xml = false) {
    // Test if iteration
    if ( $xml === false ) {
      $xml = new SimpleXMLElement('<result/>');
    }
    
    // Loop through array
    foreach( $array as $key => $value ) {
        // Another array? Iterate
        if ( is_array( $value ) ) {
          array2xml( $value, $xml->addChild( $key ) );
        } else {
          $xml->addChild( $key, $value );
        }
    }
    
    // Return XML
    return $xml->asXML();
}

// Decode jSON to array
$jSON = json_decode($json, true);

// Process array elements to XML
$xml = array2xml( $jSON, false );

// Do something with the result
echo '<pre>';print_r( $xml );

//end
