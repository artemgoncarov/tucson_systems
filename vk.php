<?

echo '<script src="/public/js/api.js?v=' . rand() . '"></script>';
echo '<script src="/public/js/postData.js?v=' . rand() . '"></script>';
echo '<script src="/public/js/storage.js?v=' . rand() . '"></script>';
echo '<script src="/public/js/tokenStorage.js?v=' . rand() . '"></script>';

require_once(__DIR__ . '/api.php');
include 'config.php';

if (!$_GET['code']) {
    exit('error code');
}

$token = json_decode(file_get_contents('https://oauth.vk.com/access_token?client_id=' . ID . '&client_secret=' . SECRET . '&redirect_uri=' . URL . '&code=' . $_GET['code']), true);
$query = "SELECT * FROM users WHERE vk_id=:vk_id";
// var_export($token);
$isRegistered = dbRead($query, ["vk_id" => $token['user_id']]);
if ($isRegistered) {
    echo 1;
    $query2 = "DELETE FROM users WHERE vk_id=:vk_id";
    $query3 = "DELETE FROM tokens WHERE vk_id=:vk_id";
    $query4 = "SELECT name, surname, img, vk_id, lvl, last_ip FROM users WHERE vk_id=:vk_id";
    $query5 = "SELECT vk_id, token FROM tokens WHERE vk_id=:vk_id";
    $data1 = dbRead($query4, [
        "vk_id" => $token['user_id']
    ]);
    echo 2;
    $tokenData1 = dbRead($query5, [
        "vk_id" => $token['user_id']
    ]);
    echo 3;
    dbWrite($query2, [
        "vk_id" => $token['user_id']
    ]);
    echo 4;
    dbWrite($query3, [
        "vk_id" => $token['user_id']
    ]);
    echo 5;
    // var_export($data1['0']);
    $query6 = "INSERT INTO users (name, surname, img, vk_id, lvl, last_ip) VALUES (:name, :surname, :img, :vk_id, :lvl, :last_ip)";
    $query7 = "INSERT INTO tokens (vk_id, token) VALUES (:vk_id, :token)";
    dbWrite($query6, [
        "name" => $data1['0']['name'],
        "surname" => $data1['0']['surname'],
        "img" => $data1['0']['img'],
        "vk_id" => $data1['0']['vk_id'],
        "lvl" => $data1['0']['lvl'],
        "last_ip" => $_SERVER['REMOTE_ADDR'],
    ]);
    dbWrite($query7, [
        "vk_id" => $token['user_id'],
        "token" => $token['access_token'],
    ]);
?>
    <script>
        tokenStorage.set('<?= $token['access_token']; ?>');
        location.href = "/";
    </script>
<?php
    echo 8;
} else {
    if (!$token) {
        exit('error token!');
    }

    $data = json_decode(file_get_contents('https://api.vk.com/method/users.get?access_token=' . $token['access_token'] . '&user_ids=' . $token['user_id'] . '&fields=first_name,last_name,photo_200_orig&name_case=nom&v=5.131'), true);
    $name = $data['response']['0']['first_name'];
    $surname = $data['response']['0']['last_name'];
    $img = $data['response']['0']['photo_200_orig'];
    $vk_id = $data['response']['0']['id'];
    $lvl = 0;
    $last_ip = $_SERVER['REMOTE_ADDR'];
    if (!$data) {
        exit('error data!');
    }
    require_once(__DIR__ . '/api.php');

    $query = "INSERT INTO users (name, surname, img, vk_id, lvl, last_ip) VALUES (:name, :surname, :img, :vk_id, :lvl, :last_ip)";
    dbWrite($query, [
        "name" => $name,
        "surname" => $surname,
        "img" => $img,
        "vk_id" => $vk_id,
        "lvl" => $lvl,
        "last_ip" => $_SERVER['REMOTE_ADDR'],
    ]);

    $query1 = "INSERT INTO tokens (vk_id, token) VALUES (:vk_id, :token)";
    dbWrite($query1, [
        "vk_id" => $vk_id,
        "token" => $token['user_id'],
    ]);
    response(["result" => "ok"]);

?>
    <script>
        tokenStorage.set('<?= $token['access_token']; ?>');
        location.href = "/";
    </script>
<?php
}
?>