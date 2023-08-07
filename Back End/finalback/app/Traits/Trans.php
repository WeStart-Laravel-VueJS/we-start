<?php

namespace App\Traits;

trait Trans
{
    function getNameTransAttribute() {
        if($this->name) {
            return json_decode($this->name, true)[app()->currentLocale()];
        }

        return $this->name;
    }

    function getNameEnAttribute() {
        if($this->name) {
            return json_decode($this->name, true)['en'];
        }

        return $this->name;
    }

    function getNameArAttribute() {
        if($this->name) {
            return json_decode($this->name, true)['ar'];
        }

        return $this->name;
    }

    // Descriptions
    function getDescriptionTransAttribute() {
        if($this->description) {
            return json_decode($this->description, true)[app()->currentLocale()];
        }

        return $this->description;
    }

    function getDescriptionEnAttribute() {
        if($this->description) {
            return json_decode($this->description, true)['en'];
        }

        return $this->description;
    }

    function getDescriptionArAttribute() {
        if($this->description) {
            return json_decode($this->description, true)['ar'];
        }

        return $this->description;
    }
}
