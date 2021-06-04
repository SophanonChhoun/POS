import SingleSelect from "../components/SingleSelect";
import SingleImageUploader from "../components/SingleImageUploader";

new Vue({
    el: '#editUser',
    components: {
        SingleSelect,
        SingleImageUploader,
    },
    data: {
        data: data,
        id: data.id,
        subcategories: subcategories,
        is_submit: false,
        error: '',
        error_image: '',
        image: '',
    },
    mounted() {
        if(!data.medias) {
            this.data.medias = [];
        }
    },
    methods: {
        submit() {
            this.$validator.validateAll().then((result) => {
                this.is_submit = true
                let save = true;

                if(result && save) {
                    axios.post('/admin/product/update/'+this.id,this.data).then(response => {
                        if(response.data.success){
                            window.location.href = '/admin/product/list';
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
        addMedias() {
            this.data.medias.push({
                image: '',
                error: {
                    image: ''
                },
                sort: this.data.medias.length + 1,
            });
        },

        removeMedias(index) {
            this.data.medias.splice(index, 1)
            this.data.medias.forEach(function (item, i) {
                item.sort = i + 1
            })
        },
    }
});
