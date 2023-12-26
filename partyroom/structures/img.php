<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/structures/conf.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/structures/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/structures/saveable.php';


class img implements saveable {
    // foreign key pid references posts.pid
    private int $pid;

    private string $name;
    private string $path;
    private string $fmt;
    private int $size;
    private int $w;
    private int $h;
    private ?SQLite3 $conn;

    public function __construct(int $pid, string $name, string $path, string $fmt, int $size, int $w=0, int $h=0) {
        $this->pid = $pid;
        $this->name = $name;
        $this->path = $path;
        $this->fmt = $fmt;
        $this->size = $size;
        $this->w = $w;
        $this->h = $h;
        $this->conn = db::conn();
    }

    public function __toString(): string {
        $__repr__ = sprintf(
            "img:\n\tpid: %d\n\tname: %s\n\tpath: %s\n\tfmt: %s\n\tw: %d\n\th: %d\n\tsize: %d\n",
            $this->pid, $this->name, $this->path, $this->fmt, $this->w, $this->h, $this->size
        );
        return $__repr__;
    }

    // save img to imgs table
    public function save(): void {
        $q = "INSERT INTO imgs (pid, img_name, img_path, fmt, w, h) VALUES (:pid, :img_name, :img_path, :fmt, :w, :h);";
        $stmn = $this->conn->prepare($q);
        $stmn->bindValue(':pid', $this->pid, SQLITE3_INTEGER);
        $stmn->bindValue(':img_name', $this->name, SQLITE3_TEXT);
        $stmn->bindValue(':img_path', $this->path, SQLITE3_TEXT);
        $stmn->bindValue(':fmt', $this->fmt, SQLITE3_TEXT);
        $stmn->bindValue(':w', $this->w, SQLITE3_INTEGER);
        $stmn->bindValue(':h', $this->h, SQLITE3_INTEGER);
        $stmn->execute();
    }
}

?>