import SingleSelect from "../components/SingleSelect";
import {numeric} from "vee-validate/dist/rules.esm";

new Vue({
    el: '#createUser',
    components: {
        SingleSelect
    },

    data: {
        data: {
            total: '',
            dealer_id: '',
            paid: false,
            arrived: false,
            products: [],
            paid_at: '',
            arrived_at: '',
            currency: currency.price,
        },
        products: products,
        dealers: dealers,
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
                    axios.post('/admin/import/create',this.data).then(response => {
                        if(response.data.success){
                            window.location.href = '/admin/import/list';
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

        addProducts() {
            this.data.products.push({
                product_id: '',
                quantity: '',
                price: '',
                sort: this.data.products.length + 1,
            });
        },

        removeProducts(index) {
            this.data.products.splice(index, 1)
            this.data.products.forEach(function (item, i) {
                item.sort = i + 1
            })
        },

        getProductName(id) {
            if(id) {
                return this.products.find(product => product.id === id).name;
            }
            return '';
        },

        getTotal() {
            if(this.data.products[0].price && this.data.products[0].quantity){

                this.data.total= this.data.products.reduce(function(previous, current) {
                    return previous + (current.price * current.quantity);
                }, 0);
                return this.data.total;
            }
            return '';
        },

        getQuantity() {
            if(this.data.products[0].quantity){

                var total = this.data.products.reduce(function(previous, current) {
                    return previous + parseInt(current.quantity);
                }, 0);
                return total;
            }
            return '';
        }
    }
});
