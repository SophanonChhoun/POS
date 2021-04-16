<template>
    <div class="custom-multi-select">
        <multiselect
            :value="selectOptions"
            :options="options"
            :custom-label="customLabel"
            :label="label"
            :track-by="trackBy"
            @select="updateValues"
            @remove="removeValues"
            multiple="multiple"
        ></multiselect>
    </div>
</template>

<script>
import Multiselect from 'vue-multiselect'

export default {
    name: "MultipleSelect",

    components: { Multiselect },

    props: [
        'value',
        'options',
        'label',
        'trackBy',
        'multiple',
        'customLabelFields',
        'afterString'
    ],

    data: function () {
        return {
            selectOptions: [],
        }
    },

    watch: {
        value: [{
            handler: 'mapSelectOptions'
        }]
    },

    mounted() {
        this.mapSelectOptions()
    },

    methods: {
        mapSelectOptions() {
            this.selectOptions = []
            if (this.value) {
                this.value.map(item => {
                    let index = this.options.findIndex(x => x.id === item)
                    this.selectOptions.push(this.options[index])
                })
            }
        },

        customLabel (value) {
            let label = ''
            this.customLabelFields.map(item => {
                let fields = item.split('.')
                if (fields.length < 2) {
                    label += value[fields]
                } else {
                    label += label ? ` - ${fields.reduce((a, v) => a[v], value)}`: fields.reduce((a, v) => a[v], value);
                }

                if(this.afterString) label += this.afterString;

                return
            })
            return label
        },

        updateValues: function (value) {
            this.value.push(value[this.trackBy])
            this.$emit('input', this.value)
        },

        removeValues: function (value) {
            let index = this.value.indexOf(value[this.trackBy])
            this.value.splice(index, 1);
            this.$emit('input', this.value)
        },
    }
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

<style lang="scss">
.custom-multi-select {
    .multiselect__tags {
        background-color: #fff;
        border: 1px solid #c2cad8;
        min-height: 34px;
        padding: 6px 12px 0 12px;
    }
}
</style>
