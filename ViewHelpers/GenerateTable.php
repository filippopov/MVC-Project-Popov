<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 10/2/2015
 * Time: 10:03 PM
 */

namespace MVC\ViewHelpers;


class GenerateTable {
    private $attributes = [];
    private $options;

    private function __construct(){

    }

    public static function create(){
        return new self();
    }

    public function addAttribute($attributeName, $attributeValue){
        $this->attributes[$attributeName]=$attributeValue;

        return $this;
    }

    public function setHeaders($valueContent=[]){
        $this->options="<tr>";
        foreach($valueContent as $v){

            $this->options .= "<th>$v</th>";
        }
        $this->options.="</tr>";
        return $this;
    }

    public function setContent($content)
    {

        foreach($content as $v){
            $price = $v->getPrice();
            $price=number_format((double)$price,2);
            $this->options.="<tr>";
            $this->options .= "<td>{$v->getId()}</td>";
            $this->options .= "<td>{$v->getName()}</td>";
            $this->options .= "<td>{$v->getType()}</td>";
            $this->options .= "<td>{$price}</td>";
            $this->options .= "<td><a href=\"addToCart\">Add To Cart</a></td>";
            $this->options.="</tr>";
        }

        return $this;
    }

    public function render(){
        $output = "<table";
        foreach($this->attributes as $key => $value){
            $output .=" " . $key . "=". '"'.$value. '"';
        }
        $output .=">\n";
        $output .=$this->options;
        $output .="</table>";

        echo $output;
    }
} 