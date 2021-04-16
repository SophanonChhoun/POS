import Multiselect from "vue-multiselect";
import SingleSelect from "../components/SingleSelect";
import SingleImageUploader from "../components/SingleImageUploader";

new Vue({
    el: '#editUser',
    components: {
        Multiselect,
        SingleSelect,
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
                    axios.post('/admin/template/update/'+this.id,this.data).then(response => {
                        if(response.data.success){
                            window.location.href = '/admin/template/list';
                        }else{
                            alert(response.data.data)
                            this.error = response.data.message;
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

    }
});
