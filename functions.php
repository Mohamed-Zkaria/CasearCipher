<?php

	$AlphapetPlaintext = array( "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M",
                                "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z" );

    $AlphapetCipherdtext = array( "Z", "Y", "X", "W", "V", "U", "T", "S", "R", "Q", "P", "O", "N", 
                                  "M", "L", "K", "J", "I", "H", "G", "F", "E", "D", "C", "B", "A");
	
	function casearCipher( $method, $keyCipher, $text){
		
		global $AlphapetPlaintext;
		global $AlphapetCipherdtext;
		
		$plainText = strtoupper($text);
        $arrayText = str_split($plainText);
		
		$cipheredText = '';
		
		if( $method == "Encrypt" ){
                foreach( $arrayText as $value_plain ){
                    foreach( $AlphapetPlaintext as $key => $value_alphaPet ){
                        if( $value_alphaPet == $value_plain ){

                            $cipheredText .= $AlphapetPlaintext[ ($key +  $keyCipher) % 26  ];
        
                        } else if( $value_plain == " " ){
                        
                            $cipheredText .= " ";
                        
                        }            
                    }
                }
            }
	

            if( $method == "Decrypt" ){
                foreach( $arrayText as $value_plain ){        
                    foreach( $AlphapetCipherdtext as $key => $value_alphaPet ){
                        if( $value_alphaPet == $value_plain ){
                            
                            $cipheredText .= $AlphapetCipherdtext[ ($key +  $keyCipher) % 26  ];
        
                        } else if( $value_plain == " " ){
                        
                            $cipheredText .= " ";
                        
                        }            
                    }
                }
            }
		
		return $cipheredText;
	}
	
	
	
	
	
	function casearCipherAschii($method, $arrayText, $keyCipher){
		
		$cipheredText = '';
		
		if( $method == "Encrypt" ){
            foreach($arrayText as $value){
                $value = ord($value);
                $value = $value + $keyCipher;
                $cipheredText .= chr($value);
            }
        }
    
        if( $method == "Decrypt" ){
            foreach($arrayText as $value){
                
                $value = ord($value);
                $value = $value - $keyCipher;
                $cipheredText .= chr($value);
                
            }
        }
		
		return $cipheredText;
	}