import SingleImageUploader from "../components/SingleImageUploader";

new Vue({
    el: '#editUser',
    components: { SingleImageUploader },
    data: {
        data: data,
        categories: categories,
        test:[],
        is_submit: false,
        error: '',
    },
    computed: {

    },
    methods: {
        submit() {
            this.$validator.validateAll().then((result) => {
                this.is_submit = true
                let save = true;

                if(result && save) {
                    axios.post('/admin/banner/update',{
                        "data": this.data
                    }).then(response => {
                        if(response.data.success){
                            window.location.href = '/admin/banner/list';
                        }else{
                            this.error = response.data.data;
                        }
                    });
                } else {
                    window.scrollTo(0, 0)
                }
            })
        },

        addBanner() {
            this.data.push({
                name: '',
                image: '',
                category_id: '',
                news_promotion: '',
                is_category: '',
                sort: this.data.length + 1,
            });
        },

        removeBanner(index) {
            this.data.splice(index, 1)
            this.data.forEach(function (item, i) {
                item.sort = i + 1
            })
        },

        updateNews(index) {
            if(this.data[index].is_category)
            {
                this.data[index].is_category = !this.data[index].is_category;
            }
        }
    }
});
