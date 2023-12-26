<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/structures/__utils__.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/structures/conf.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/structures/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/structures/img.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/structures/saveable.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/structures/indexable.php';

class post implements saveable, indexable {
    // foreign key uid references users.uid
    // private int $uid;
    // will need to later change img to array<img> since post can have carousel/cardshow of like pinterest slides
    private string $username;
    private string $desc;
    private img $img;
    private ?SQLite3 $conn;

    public function __construct(string $username, string $desc, img $img) {
        $this->username = $username;
        $this->desc = $desc;
        $this->img = $img;
        $this->conn = db::conn();
    }

    public function __toString(): string {
        $__repr__ = sprintf(
            "post:\n\tusername: %d\n\tdescription: %s\n\t%s\n\t",
            $this->username, $this->desc, $this->img->__toString()
        );
        return $__repr__;
    }

    // void -> this users uid
    // not finished
    public function find_pk(): int {
        $q = "SELECT u.uid FROM users AS u WHERE u.uid == :username;";
        $stmn = $this->conn->prepare($q);
        $stmn->bindValue(':username', $this->username, SQLITE3_TEXT);

        return read_resp($stmn->execute())[0];
    }

    // find imgs related to post and post 
    public function save(): void {
        $uid = $this->find_pk();
        
        $q = "INSERT INTO posts (uid, desc) VALUES (:uid, :desc);";
        $stmn = $this->conn->prepare($q);
        $stmn->bindValue(':uid', $uid, SQLITE3_INTEGER);
        $stmn->bindValue(':desc', $this->desc, SQLITE3_TEXT);
        
        $stmn->execute();
        // save img to imgs
        $this->img->save();
    }

}   

?>