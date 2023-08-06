<?php
require_once('/config.php');
?>

<script>
    location.href = "https://oauth.vk.com/authorize?client_id=<?= ID ?>&display=page&redirect_uri=<?= URL ?>&scope=photos&response_type=code&v=5.131";
</script>