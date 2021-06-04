import SingleSelect from "../components/SingleSelect";
import Multiselect from "vue-multiselect";

new Vue({
    el: '#editUser',
    components: {
        SingleSelect,
        Multiselect,
    },
    data: {
        data: data,
        id: data.id,
        products: products,
        buyers: buyers,
        promotions: promotions,
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
                    axios.post('/admin/sale/update/'+this.id,this.data).then(response => {
                        if(response.data.success){
                            window.location.href = '/admin/sale/list';
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
        setProduct(event, index) {
            this.data.products[index].product_id = event.id;
            this.data.products[index].price = event.price;
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

        getProductPrice(id, index) {
            if(id) {
                return this.products.find(product => product.id === id).price;
                return this.data.products[index].price;
            }
            return '';
        },

        getProductQuantity(id) {
            if(id) {
                return this.products.find(product => product.id === id).quantity;
            }

            return 0;
        },

        getTotal() {
            if(this.data.products[0].price && this.data.products[0].quantity){
                this.data.totalNotDiscount = this.data.products.reduce(function(previous, current) {
                    return previous + (current.price * current.quantity);
                }, 0);
            }
            return this.data.totalNotDiscount;
        },

        getTotalDiscount() {
            if(this.data.promotion_id) {
                var promotion = this.promotions.find(promotion => promotion.id === this.data.promotion_id);
                if(promotion.discount) {
                    this.data.total = this.data.totalNotDiscount - ((this.data.totalNotDiscount * promotion.discount_percentage) / 100)
                }else{
                    this.data.total = this.data.totalNotDiscount - promotion.cost;
                }
            }
            return this.data.total;
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
