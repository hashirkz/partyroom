CREATE TABLE users (
    uid INTEGER PRIMARY KEY,

    username TEXT NOT NULL UNIQUE,
    hashword TEXT NOT NULL,
    salt TEXT NOT NULL
);

CREATE TABLE posts (
    pid INTEGER PRIMARY KEY,
    uid INTEGER,

    description TEXT,

    FOREIGN KEY (uid) REFERENCES users(uid)
);

CREATE TABLE imgs (
    iid INTEGER PRIMARY KEY,
    pid INTEGER UNQIUE,

    img_name TEXT NOT NULL,
    img_data BLOB NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (pid) REFERENCES posts(pid)
);

CREATE TABLE comments (
    cid INTEGER PRIMARY KEY,
    uid INTEGER,
    pid INTEGER,

    comment_data TEXT NOT NULL,

    FOREIGN KEY (uid) REFERENCES users(uid),
    FOREIGN KEY (pid) REFERENCES posts(pid)
);