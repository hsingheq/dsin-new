<template>
    <span class="currency" :value="value">RM {{ currentValue }}</span>
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
})
</script>