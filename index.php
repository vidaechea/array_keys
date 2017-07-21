<?php 

/**
 * index.php
 *
 * Implement in PHP an alternative version of the standard function array_keys
 * 
 * @package    array_keys
 * @author     Luis Vidaechea <vidaechea.luis@gmail.com>
 * @copyright  2017 Luis Vidaechea
 */

/**
 * Return all the keys or a subset of the keys of an array
 * @param array $array An array containing keys to return.  
 * @param string $search_value If specified, then only keys containing these values are returned. 
 * @return array
 * @throws Exception when the first parameter is not an array
 */
function array_keys_custom($array, $search_value=false)
{
    //Declare the response
    $array_response = array();
    
    try {
        if (!is_array($array)){
            throw new Exception("Expects parameter 1 to be array. <br\>");
        }
        //Loop into the array
        foreach ($array as $key => $value) {
            if (!$search_value){
                //if we don't have a string, introduce the key in the aux array
                array_push($array_response, $key);
            }
            elseif ($search_value == $value){ 
                //if we have a string, introduce the key in the aux array,
                //if and only if the value entered coincides with the value of the key
                array_push($array_response, $key);
            }           
        } 
    } catch (Exception $exc) {
        echo $exc->getMessage();
    }
    
    return $array_response;
}

//Test 0 
echo '<pre>';
print_r(array_keys_custom('array'));
echo '</pre>';

//Test 1
$array = array(0 => 100, "color" => "red");
echo '<pre>';
print_r(array_keys_custom($array));
echo '</pre>';

//Test 2
$array = array("blue", "red", "green", "blue", "blue");
echo '<pre>';
print_r(array_keys_custom($array,"blue"));
echo '</pre>';

//Test 3
$array = array("color" => array("blue", "red", "green"),
               "size"  => array("small", "medium", "large"));
echo '<pre>';
print_r(array_keys_custom($array));
echo '</pre>';

?>
