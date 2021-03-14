<?php

namespace App\Page;

use App\Meta\MetaTag;


class Page {

    private $meta;
    private $page;

    public function setPage($page) {
        $this->page = $page;
    }

    public function setMeta(MetaTag $meta) {
        $this->meta = $meta;
    }

    public function getPage() {
        return $this->page;
    }

    public function getMeta() {
        return $this->meta;
    }

}
