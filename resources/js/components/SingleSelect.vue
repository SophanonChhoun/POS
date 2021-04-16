<template>
    <div class="custom-multi-select">
        <multiselect
            :value="selectOption"
            :options="options"
            :custom-label="customLabel"
            :label="isTranslatable ? $t('general.' + label) : label"
            :track-by="trackBy"
            @select="updateValues"
            @remove="removeValues"
            :allow-empty="allowEmpty"
            :multiple="false"
            :placeholder="$t('general.select_option')"
            :selectLabel="hideSelectLabel ? '' : $t('general.select_label')"
            :deselectLabel="''"
        ></multiselect>
    </div>
</template>

<script>
import Multiselect from 'vue-multiselect'

export default {
    name: "SingleSelect",

    components: { Multiselect },

    props: {
        value: {},
        options: {},
        label: {},
        trackBy: {},
        customLabelFields: {},
        isTranslatable: {},
        allowEmpty: {
            type: Boolean,
            default: true
        },
        hideSelectLabel: {
            type: Boolean,
            default: false,
        }
    },

    data: function () {
        return {
            selectOption: '',
        }
    },

    watch: {
        value: [{
            handler: 'mapSelectOption'
        }],
    },

    mounted() {
        this.mapSelectOption()
    },

    methods: {
        mapSelectOption() {
            this.selectOptions = []
            if (this.value) {
                let index = this.options.findIndex(x => x.id == this.value)
                this.selectOption = this.options[index]
            } else {
                this.selectOption = null
            }
        },

        customLabel (value) {
            let label = ''
            this.customLabelFields.map(item => {
                let fields = item.split('.')
                if (fields.length < 1) {
                    label += value[fields]
                } else {
                    label += label ? ` - ${fields.reduce((a, v) => a[v], value)}`: fields.reduce((a, v) => a[v], value);
                }
                return
            })
            if (this.isTranslatable) {
                label = this.$t('general.' + label)
            }
            return label
        },

        updateValues: function (value) {
            this.$emit('input', value[this.trackBy])
        },

        removeValues: function (value) {
            this.$emit('input', '')
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
