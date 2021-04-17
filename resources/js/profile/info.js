new Vue({
    el: '#editInfo',
    data: {
        data: data,
        is_submit: false,
        error: '',
    },
    mounted() {
    },
    methods: {
        submit() {
            this.$validator.validateAll().then((result) => {
                this.is_submit = true
                let save = true;
                if(result && save) {
                    axios.post('/admin/profile/update',this.data).then(response => {
                        if(response.data.success){
                            window.location.href = '/admin/profile/show';
                        }else{
                            this.error = 'Sorry, this email already existed. Please input a new one.';
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
