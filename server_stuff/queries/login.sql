SELECT u.username, u.hashword
FROM users as u
WHERE u.username = :username;