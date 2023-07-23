<?php

namespace App\Traits;

trait Lang {
    function getTransNameAttribute() {
        return json_decode($this->name, true)[app()->currentLocale()]?? $this->name;
    }

    function getEnNameAttribute() {
        return json_decode($this->name, true)['en']?? $this->name;
    }

    function getArNameAttribute() {
        return json_decode($this->name, true)['ar']?? $this->name;
    }
}
