<template>
    <draggable class="vloggers" v-model="vloggers" @start="drag=true" @end="drag=false" @change="updateOrder">
        <div class="vlogger-row" v-for="vlogger in vloggers" :key="vlogger.id" :order="vlogger.order" >
            <h1 class="new-video-title">
                <i class="fa fa-bolt"></i>{{ vlogger.name }}
            </h1>
        </div>
    </draggable>
</template>

<script>
    function Vlogger({id, name, order}) {
        this.id         = id;
        this.name       = name;
        this.order      = order;
    }

    export default {
        data() {
            return {
                vloggers:   [],
                processing: false
            }
        },

        computed: {
            vloggersList() {
                return this.vloggers.map((vlogger, index) => {
                    vlogger.order = index + 1;

                    return {
                        id: vlogger.id,
                        name: vlogger.name,
                        order: vlogger.order
                    };
                });
            },
        },

        methods: {
            read() {
                this.processing = true;

                window.axios.get('/api/favorites')
                            .then(({data}) => {
                                data.forEach(vlogger => {
                                    // pre-set model data.
                                    vlogger.order = vlogger.pivot.order;

                                    // Add vlogger to vlogger list.
                                    this.vloggers.push(new Vlogger(vlogger));
                                });

                                this.processing = false;
                            });
            },
            updateOrder() {
                this.processing = true;

                window.axios.post('/api/favorites', this.vloggersList)
                            .then((response) => {
                                console.log(response);
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

<style scoped>
.vloggers .new-video-title {
    padding-top: 10px;
}

.vloggers .vlogger-row {
    cursor: grab;
}

.vloggers .vlogger-row:first-child .new-video-title {
    padding-top: 30px;
}
</style>