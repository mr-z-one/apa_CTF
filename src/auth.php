<?php 
function register_user(string $email, string $username, string $password, string $activation_code, int $expiry = 3600): bool
{
    $sql = 'INSERT INTO users(username, email, password, activation_code, activation_expiry)
            VALUES(:username, :email, :password, :activation_code,:activation_expiry)';

    $statement = db()->prepare($sql);

    $statement->bindValue(':username', $username);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', password_hash($password, PASSWORD_BCRYPT));
    $statement->bindValue(':activation_code', password_hash($activation_code, PASSWORD_DEFAULT));
    $statement->bindValue(':activation_expiry', date('Y-m-d H:i:s',  time() + $expiry));

    return $statement->execute();
}

function is_user_exist_by_username(string $username):bool{

    if ($username === '') {
        return false;
    }

    $sql = 'SELECT username FROM users WHERE username =:value';

    $statement = db()->prepare($sql);
    $statement->bindValue(':value', $username);

    $statement->execute();

    return $statement-> fetchColumn();

}

function is_user_exist_by_email(string $email):bool{

    if ($email === '') {
        return false;
    }


    $sql = 'SELECT email FROM users WHERE email = :value';

    $statement = db()->prepare($sql);
    $statement->bindValue(':value', $email);

    $statement->execute();

    return $statement-> fetchColumn() ;

}

function is_user_active($user)
{
    return (int)$user['active'] === 1;
}
function find_user_by_username(string $username)
{
    $sql = 'SELECT username, password, active, email
            FROM users
            WHERE username=:username';

    $statement = db()->prepare($sql);
    $statement->bindValue(':username', $username);
    $statement->execute();

    return $statement->fetch(PDO::FETCH_ASSOC);
}

function is_user_logged_in(): bool
{
    return isset($_SESSION['username']);
}
function require_login(): void
{
    if (!is_user_logged_in()) {
        redirect_to('login.php');
    }
}

function logout(): void
{
    if (is_user_logged_in()) {
        unset($_SESSION['username'], $_SESSION['user_id']);
        session_destroy();
        redirect_to('login.php');
    }
}

function current_user()
{
    if (is_user_logged_in()) {
        return $_SESSION['username'];
    }
    return null;
}

function login(string $username, string $password): bool
{
    $user = find_user_by_username($username);

    if ($user && is_user_active($user) && password_verify($password, $user['password'])) {
        // prevent session fixation attack
        session_regenerate_id();

        // set username in the session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        return true;
    }

    return false;
}