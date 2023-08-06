let tokenStorage = {
    ...Storage,
    token: '',
    set: function (token) {
        this.load('token');
        this.token = token;
        this.save('token');
        this.token = token;
    },
}