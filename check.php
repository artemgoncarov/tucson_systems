<script>
    class Api {
    static post(url, obj = {}) {
        return new Promise((resolve) => {
                let x = new XMLHttpRequest;
                x.open('POST', url, true);
                x.setRequestHeader('Content-Type', 'application/json; charset=utf-8');
                x.send(JSON.stringify(obj));
                x.addEventListener('load', () => {
                    if (x.status < 400 && x.status >= 200) {
                        console.log(x.response);
                        resolve(JSON.parse(x.responseText));
                    }
                    else {
                        console.log("Error");
                    };
                });
            })
        };
    };
    let data = [];
    Api.post("/vk.php").then((el) => {
        data.push(el);
    });
    console.log(data);
    Api.post("/api/admin/isRegistered.php", {vk_id: data[0][0]["user_id"]}).then((data_) => {
        if (data_.result == "false") {
            Api.post("/api/admin/register/index.php", {
                name: data[1]["response"][0]["first_name"],
                surname: data[1]["response"][0]["last_name"],
                img: data[1]["response"][0]["photo_200_orig"],
                vk_id: data[1]["response"][0]["id"],
                lvl: 0,
                last_ip: data[2],
            });
            tokenStorage.set(data[0]["access_token"]);
            location.href="/";
        }
    })
</script>