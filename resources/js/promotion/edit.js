import SingleImageUploader from "../components/SingleImageUploader";

new Vue({
    el: '#editUser',
    components: {

        SingleImageUploader
    },
    data: {
        data: data,
        id: data.id,
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
                    axios.post('/admin/promotion/update/'+this.id,this.data).then(response => {
                        if(response.data.success){
                            window.location.href = '/admin/promotion/list';
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
        uploadAddingImage(event) {
            let image = event.target.files[0];
            let reader = new FileReader();
            reader.readAsDataURL(image);
            reader.onload = event => {
                Vue.set(this.data, 'image', event.target.result)
            }
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
