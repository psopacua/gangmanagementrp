<template>
    <div class="vlogger-row">
        <h1 class="new-video-title"><i class="fa fa-bolt"></i> {{ name }}</h1>

        <div class="row">
            <video-component
                v-for="video in videos"
                v-bind="video"
                :key="video.id">
            </video-component>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['id', 'name', 'videos', 'created_at']
    }
</script>

<!--<style scoped>-->

<!--</style>-->