import SingleSelect from "../components/SingleSelect";

new Vue({
    el: '#editUser',
    components: {
        SingleSelect,
    },
    data: {
        data: data,
        id: data.id,
        categories: categories,
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
                    axios.post('/admin/subcategory/update/'+this.id,this.data).then(response => {
                        if(response.data.success){
                            window.location.href = '/admin/subcategory/list';
                        }else{
                            this.error = response.data.data;
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
