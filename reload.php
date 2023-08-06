<script>
    postData("/api/admin/register/index.php", {
        name: '<?= $data1['name']; ?>',
        surname: '<?= $data1['surname']; ?>',
        img: '<?= $data1['img']; ?>',
        vk_id: '<?= $data1['vk_id']; ?>',
        lvl: '<?= $data1['lvl'] ?>',
        last_ip: '<?= $_SERVER['REMOTE_ADDR']; ?>',
    });
    console.log(6);
    postData("/api/admin/setToken.php", {
        vk_id: '<?= $data1['vk_id']; ?>',
        token: '<?= $tokenData1['token']; ?>'
    });
    console.log(7);
    tokenStorage.set('<?= $token['access_token']; ?>');
    location.href = "/";
</script>