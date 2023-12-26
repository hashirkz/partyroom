<?php
// non side effect functions and generic behaviours


function read_resp(SQLite3Result $resp): array {
    $rows = array();
    while ($row = $resp->fetchArray(SQLITE3_ASSOC)) {
        $rows[] = $row;
    }
    return $rows;
}

?>