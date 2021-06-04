import SingleImageUploader from "../components/SingleImageUploader";

new Vue({
    el: '#createUser',
    components: {
        SingleImageUploader,
    },

    data: {
        data: {
            name: '',
            contents: [],
            is_enable: '',
            image: '',
            discount: false,
            discount_percentage: '',
            cost: '',
            code: '',
            is_cost: false,
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
                    axios.post('/admin/promotion/create',this.data).then(response => {
                        if(response.data.success){
                            window.location.href = '/admin/promotion/list';
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

        addContentText() {
            this.data.contents.push({
                content: '',
                is_text: true,
                sort: this.data.contents.length + 1,
            });
        },

        addContentImage() {
            this.data.contents.push({
                image: '',
                is_text: false,
                sort: this.data.contents.length + 1,
            });
        },

        removeContent(index) {
            this.data.contents.splice(index, 1)
            this.data.contents.forEach(function (item, i) {
                item.sort = i + 1
            })
        },
    }
});
