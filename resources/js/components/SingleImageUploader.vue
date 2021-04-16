<template>
    <div>
        <img id="thumb-image"
             :width="pw"
             :height="ph"
             :src="value ? value :  (image ? image : defaultImage)"
             alt=""/>
        <br/>
        <div class="btn default btn-file" v-if="!isDisable">
            <input type="file"
                   name="image"
                   :data-width="150"
                   :data-height="150"
                   accept=".jpg,.png"
                   @change="uploadImage">
        </div>
    </div>
</template>

<script>
    export default {
        name: "SingleImageUploader",

        data: function () {
            return {

            }
        },

        props: {
            image: {},
            value: {},
            size: {},
            pw: {},
            ph: {},
            defaultImage: {},
            isDisable: {
                type: Boolean,
                default: false,
            },
        },

        methods: {
            uploadImage(event) {
                const that = this
                const input = event.target;

                if (input.files && input.files[0]) {
                        var img = new Image();
                        img.onload = function(e) {

                            var reader = new FileReader()
                            reader.onload = (e) => {
                                that.$emit('input', e.target.result)
                            }
                            reader.readAsDataURL(input.files[0])
                        }
                        img.src = URL.createObjectURL(input.files[0]);
                    }
            }
        }
    }
</script>

<style scoped>

</style>
