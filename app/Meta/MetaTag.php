<?php

namespace App\Meta;


class MetaTag {
    
    private $meta = [];

    public function __construct(array $meta) {
        $this->meta = $meta;
    }

    public function setTitle(string $title) {
        $this->meta['title'] = $title;
    }

    public function setDescription($description) {
        $this->meta['description'] = $description;
    }

    public function setKeyword($keyword) {
        $this->meta['keyword'] = $keyword;
    }


    public function getTitle() : string {
        return $this->meta['title'];
    }

    public function getDescription() : string {
        return $this->meta['description'];
    }

    public function getKeyword() : string {
        return $this->meta['keyword'];
    }

    public function getMeta() : array {
        return $this->meta;
    }

    public function __get($name) {
        if(array_key_exists($name, $this->meta)) {
            return $this->meta[$name];
        }

        return null;
    }
}
