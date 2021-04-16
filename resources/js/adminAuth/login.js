new Vue({
    el: '#login-box',
    data: {
        data: {
            email: '',
            password: ''
        },
        is_submit: false,
        error: '',
        error_image: '',
        image: '',
    },
    mounted() {
    },
    methods: {
        submit() {
            this.$validator.validateAll().then((result) => {
                this.is_submit = true
                let save = true;

                if(result && save) {
                    console.log('111')
                    axios.post('/admin/login',this.data).then(response => {
                        if(response.data.success){
                            window.location.href = '/admin/test';
                        }else{
                            console.log(response.data.message);
                            this.error = 'Wrong email/password';
                        }
                    });
                } else {
                    //set Window location to top
                    window.scrollTo(0, 0)
                }
            })
        },

    }
});
