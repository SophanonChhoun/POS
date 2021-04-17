import SingleImageUploader from "../components/SingleImageUploader";

new Vue({
    el: '#editAvatar',
    data: {
        data: data,
        id: data.id,
        is_submit: false,
        error: '',
        error_image: '',
        image: '',
    },
    components: {SingleImageUploader},
    mounted() {
    },
    methods: {
        submit() {
            this.$validator.validateAll().then((result) => {
                this.is_submit = true
                let save = true;

                if(result && save) {
                    axios.post('/admin/profile/avatar',this.data).then(response => {
                        if(response.data.success){
                            window.location.href = '/admin/profile/show';
                        }else{
                            this.error = response.data;
                        }
                    }).catch(error => {
                        console.log(error.data);
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

    }
});
