let Storage = {
    load: function (name) {
        k = localStorage.getItem(name);
        if (k !== null) {
            k = JSON.parse(k);
            for (i in k) {
                this[i] = k[i];
            }
        }
    },
    save: function (name) {
        localStorage.setItem(name, JSON.stringify(this));
    }
}