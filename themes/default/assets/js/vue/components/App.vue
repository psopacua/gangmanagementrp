<template>
    <div id="app">
        <vlogger-video-list>

        </vlogger-video-list>
        <video-component
                v-for="video in videos"
                v-bind="video"
                :key="video.id"
                @show="show">
        </video-component>

        <modal v-if="watching" @close="close"></modal>
    </div>
</template>

<script>
    import VideoComponent from "./VideoComponent";
    import Modal from "./Modal";

    function Video({id, title, video_id, views, created_at}) {
        this.id         = id;
        this.title      = title;
        this.video_id   = video_id;
        this.views      = views;
        this.created_at = created_at;
    }

    export default {
        data() {
            return {
                videos:        [],
                processing:    false,
                watching:      false,
                watchingVideo: null
            }
        },

        methods: {
            read() {
                this.processing = true;

                window.axios.get('/api/videos')
                            .then(({data}) => {
                                data.forEach(video => {
                                    this.videos.push(new Video(video));
                                });

                                this.processing = false;
                            });
            },

            show(id) {
                this.watching = true;

                window.axios.get(`/api/videos/${id}`)
                            .then(({data}) => {
                                this.watchingVideo = data;
                            });
            },

            close() {
                this.watching      = false;
                this.watchingVideo = null;
            }
        },

        watch: {
            processing(val) {
                document.getElementById('processing').className = val ? 'on' : '';
            }
        },

        components: {
            VideoComponent,
            Modal
        },

        created() {
            this.read();
        }
    }
</script>

<!--<style scoped>-->

<!--</style>-->