<?php

// indexable classes have some pk which is an int users are unaware of
interface indexable {

    public function find_pk(): int;
}

?>