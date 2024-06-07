<template>
    <!-- video-item -->
    <div class="video col-lg-3 col-md-4 col-sm-6">
        <div class="video-item">
            <div class="thumb">
                <div class="hover-efect"></div>
                <small class="time">10:53</small>
                <a :href="href"><img :src="image"/></a>
            </div>
            <div class="video-info">
                <a href="#" class="title">{{ title }}</a>
                <span class="views"><i class="fa fa-eye"></i>{{ views | numFormat }} views</span>
                <span class="date"><i class="fa fa-clock-o"></i>{{ created_at }}</span>
            </div>
        </div>
    </div>
    <!-- // video-item -->
</template>

<script>
    export default {
        computed: {
            image() {
                return `themes/default/demo_img/v5.png`;
            },
            href() {
                return `/vlogger/${this.vlogger_id}/${this.video_id}/`;
            }
        },

        props: ['id', 'title', 'video_id', 'views', 'vlogger_id', 'created_at']
    }
</script>

<!--<style scoped>-->

<!--</style>-->