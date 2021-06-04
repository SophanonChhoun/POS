import SingleImageUploader from "../components/SingleImageUploader";
import Multiselect from "vue-multiselect";
import SingleSelect from "../components/SingleSelect";

new Vue({
    el: '#createUser',
    components: {
        SingleImageUploader,
        Multiselect,
        SingleSelect
    },

    data: {
        data: {
            phone_number: '',
            address: '',
            first_name: '',
            last_name: '',
            is_enable: '',
            image: '',
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
                    axios.post('/admin/dealer/create',this.data).then(response => {
                        if(response.data.success){
                            window.location.href = '/admin/dealer/list';
                        }else{
                            this.error = response.data.data;
                        }
                    }).catch(error => {
                        this.error = "Sorry there is something wrong";
                    });
                } else {
                    //set Window location to top
                    window.scrollTo(0, 0)
                }
            })
        },

        uploadImage(event) {
            const input = event.target;
            if (input.files && input.files[0]) {
                var img = new Image();
                img.onload = function() {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        this.image = e.target.result
                    }
                    reader.readAsDataURL(input.files[0])
                }
            }
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
