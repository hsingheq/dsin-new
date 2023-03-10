<template>
    <span class="currency" :value="value" v-text="priceFormat(currentValue)"></span>
</template>
<script>
export default ({
    name: "currencyformat",
    props: {
        value: {
            required: true
        },
    },
    data() {
        return {
            currentValue: this.value,
        }
    },
    watch: {
        value(val) {
            this.currentValue = val
        }
    },
    methods: {
        priceFormat(price) {
            //var html = "RM";
            return new Intl.NumberFormat('en-MY', { style: 'currency', currency: 'MYR' })
                .format(price)
        }
    }
})
</script>