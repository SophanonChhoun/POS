new Vue({
    el: '#createUser',
    components: {
    },

    data: {
        data: {
            name: '',
            order: '',
            is_enable: '',
        },
        is_submit: false,
        error: '',
        error_image: '',
    },
    mounted() {
    },
    methods: {
        submit() {
            this.$validator.validateAll().then((result) => {
                this.is_submit = true
                let save = true;
                if(result && save) {
                    axios.post('/admin/faq/create',this.data).then(response => {
                        if(response.data.success){
                            window.location.href = '/admin/faq/list';
                        }else{
                            this.error = response.data.data;
                        }
                    }).catch(error => {
                        this.error = error.data.data;
                    });
                } else {
                    //set Window location to top
                    window.scrollTo(0, 0)
                }
            })
        },
    }
});
