<template>
    <div class="modal-backdrop">
        <div class="modal">
            <div class="modal-header">
                <slot name="header">
                    Title

                    <button type="button" class="btn-close" @click="close">x</button>
                </slot>
            </div>

            <div class="modal-content">
                <slot name="content">
                    Content
                </slot>
            </div>
            <div class="modal-footer">
                <slot name="footer">
                    Footer

                    <button type="button" class="btn-green" @click="close">Close</button>
                </slot>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'modal',

        methods: {
            close() {
                this.$emit('close');
            }
        }
    };
</script>

<style scoped>
</style>