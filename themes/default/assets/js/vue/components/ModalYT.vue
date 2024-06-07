<template>
    <transition name="modal">
        <div class="modal-mask">
            <div class="modal-wrapper">
                <div class="modal-container">
                    <div class="modal-header">
                        VIDEO Title
                        <button class="close" @click="close">Close</button>
                    </div>
                    <div class="modal-body">
                        <video-player :options="playerOptions"></video-player>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>  // youtube plugin
require('videojs-youtube')

    import { videoPlayer } from 'vue-video-player';

    export default {
        data() {
            return {
                playerOptions: {
                    sources: [{
                        type: "video/youtube",
                        src: "https://www.youtube.com/watch?v=kcTtIEXgWiA"
                    }],
                    techOrder: ['youtube'],
                    autoplay: false,
                    controls: false,
                    youtube: {
                        ytControls: 2,
                        wmode: 'transparent'
                    }
                }
            }
        },

        methods: {
            close() {
                this.$emit('close');
            }
        },

        components: {
            videoPlayer
        }
    }
</script>

<style scoped>
    .modal-mask {
        width: 100%;
        height: 100%;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 9999;
        background-color: rgba(0, 0, 0, 0.7);
        display: table;
        transition: opacity .3s ease;
    }
    .modal-wrapper {
        display: table-cell;
        vertical-align: middle;
    }
    .modal-container {
        width: 800px;
        margin: 0 auto;
        padding: 20px 30px;
        border-radius: 2px;
        background: rgba(0, 0, 0, 1);
        box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
        transition: all .3s ease;
    }

    /** Default vue.js **/
    .modal-enter,
    .modal-leave-active {
        opacity: 0;
    }

    .modal-enter .modal-container,
    .modal-leave-active .modal-container {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }
</style>