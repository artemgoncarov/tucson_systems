if (localStorage.token && JSON.parse(localStorage.token).token) {
    Api.post("/api/admin/getImg.php", {
        token: JSON.parse(localStorage.token).token,
    }).then((data) => {
        document.querySelector(".nav-btn-1").style.display = "none";
        document.querySelector(".nav-btn-2").style.display = "none"
        // document.querySelector(".name-surname").style.display = "inline-block";
        document.querySelector(".lk").style.display = "inline-block";

        // console.log(data);
        document.querySelector(".image").setAttribute("src", data['img']);
        document.querySelector(".name-surname").innerText = data['name'] + " " + data['surname'];
    });
}
