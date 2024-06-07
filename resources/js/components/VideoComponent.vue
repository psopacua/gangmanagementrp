<template>
    <div class="video">
        <div class="overlay" v-on:click="show"></div>
        <h3>{{title}}</h3>
        <img :src="image"/>
        <ul>
            <li>{{ views }} times viewed</li>
            <li>Added on {{ created_at }}</li>
        </ul>
    </div>
</template>

<script>
    export default {
        computed: {
            image() {
                return `images/videos/${this.video_id}.png`;
            }
        },

        methods: {
            show() {
                this.$emit('show', this.id);
            }
        },

        props: ['id', 'title', 'video_id', 'views', 'created_at']
    }
</script>

<style scoped>
    .video {
        width: 50%;
        /*padding: 0 5px;*/
        display: inline-block;
        position: relative;
    }
    .video:hover .overlay {
        position: absolute;
        z-index: 1000;
        width: 100%;
        height: 100%;
        background: black;
        opacity: 0.7;
        cursor: pointer;
    }
</style>