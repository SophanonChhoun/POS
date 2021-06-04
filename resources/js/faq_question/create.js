import Multiselect from "vue-multiselect";
import SingleSelect from "../components/SingleSelect";


new Vue({
    el: '#createUser',
    components: {
        Multiselect,
        SingleSelect,
    },

    data: {
        data: {
            question: '',
            answer: '',
            order: '',
            is_enable: '',
        },
        is_submit: false,
        error: '',
        error_image: '',
        faqs: faqs,
    },
    mounted() {
    },
    methods: {
        submit() {
            this.$validator.validateAll().then((result) => {
                this.is_submit = true
                let save = true;
                if(result && save) {
                    axios.post('/admin/faq_question/create',this.data).then(response => {
                        if(response.data.success){
                            window.location.href = '/admin/faq_question/list';
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
