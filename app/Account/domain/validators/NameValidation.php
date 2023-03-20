<?php

class NameValidation{
    
    public function validate($name){
        if(!(strlen(trim($name))  > 1 && strlen(trim($name)) <= 20 )){
            return false;
        }
        if(!preg_match('/\s/',trim($name))){
            return false;
        }
        if(preg_match('/\d/',trim($name))){
            return false;
        }
        return true;
    }
}