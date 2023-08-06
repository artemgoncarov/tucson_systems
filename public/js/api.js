class Api {
    static post(url, obj = {}) {
        return new Promise((resolve) => {
            let x = new XMLHttpRequest;
            x.open('POST', url, true);
            x.setRequestHeader('Content-Type', 'application/json; charset=utf-8');
            x.send(JSON.stringify(obj));
            x.addEventListener('load', () => {
                if (x.status < 400 && x.status >= 200) {
                    // console.log(x.response);
                    resolve(JSON.parse(x.responseText));
                }
                else {
                    console.log("Error");
                };
            });
        })
    };
}