<template>
    <div class="vlogger">
        <vlogger-videos
            v-for="vlogger in vloggers"
            v-bind="vlogger"
            :key="vlogger.id">
        </vlogger-videos>
    </div>
</template>

<script>
    function Vlogger({id, name, videos, created_at}) {
        this.id         = id;
        this.name       = name;
        this.videos     = videos;
        this.created_at = created_at;
    }

    export default {
        data() {
            return {
                vloggers:   [],
                processing: false
            }
        },

        methods: {
            read() {
                this.processing = true;

                window.axios.get('/api/vloggers')
                    .then(({data}) => {
                        data.forEach(vlogger => {
                            this.vloggers.push(new Vlogger(vlogger));
                        });

                        this.processing = false;
                    });
            },
        },

        watch: {
            processing(val) {
                document.getElementById('processing').className = val ? 'on' : '';
            }
        },

        created() {
            this.read();
        }
    }
</script>

<!--<style scoped>-->

<!--</style>-->