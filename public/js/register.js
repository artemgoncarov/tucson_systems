let name = document.querySelector('.info-div').getAttribute('name-atr');
let surname = document.querySelector('.info-div').getAttribute('surname-atr');
let img = document.querySelector('.info-div').getAttribute('img-atr');
let vk_id = document.querySelector('.info-div').getAttribute('vk_id-atr');
let last_ip = document.querySelector('.info-div').getAttribute('last_ip-atr');
let token = document.querySelector('.info-div').getAttribute('token-atr');

Api.post("/api/admin/register/index.php", {
    name: name,
    surname: surname,
    img: img,
    vk_id: vk_id,
    lvl: 0,
    last_ip: last_ip,
});
tokenStorage.set(token);
location.href = "/";