CREATE TABLE users (
    uid INTEGER PRIMARY KEY AUTOINCREMENT,

    username TEXT NOT NULL UNIQUE,
    hashword TEXT NOT NULL
);

CREATE TABLE posts (
    pid INTEGER PRIMARY KEY AUTOINCREMENT,
    uid INTEGER,

    desc TEXT,

    FOREIGN KEY (uid) REFERENCES users(uid)
);

CREATE TABLE imgs (
    iid INTEGER PRIMARY KEY AUTOINCREMENT,
    pid INTEGER UNQIUE,

    img_name TEXT NOT NULL,
    img_path TEXT NOT NULL,
    fmt TEXT,
    w INTEGER,
    h INTEGER,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (pid) REFERENCES posts(pid)
);

CREATE TABLE comments (
    cid INTEGER PRIMARY KEY AUTOINCREMENT,
    uid INTEGER,
    pid INTEGER,

    comment_data TEXT NOT NULL,

    FOREIGN KEY (uid) REFERENCES users(uid),
    FOREIGN KEY (pid) REFERENCES posts(pid)
);