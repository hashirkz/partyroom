<?php
// stuff that needs to be saved to database needs implement saveable

interface saveable {
    public function save(): void;
}

?>