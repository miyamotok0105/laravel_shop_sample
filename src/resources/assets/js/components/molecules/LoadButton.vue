<template>
    <div class="container">
        <button class="button is-large" :class="{ 'is-loading': isLoading }" @click="load">
          検索
        </button>
        <button @click="loadData">
        検索
        </button>

        <div v-if="loading" v-cloak>
            <i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>
            <span>Loading...</span>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            c() {
                console.log("clicked!");
            },
            loadData() {
                  this.$http.get('/echo/js/?delay=2&js=', {
                    before: () => {
                      this.loading = true;
                    }
                  }).then(response => {
                    // Deal with response
                  }).then(() => {
                        //set loading flag to false
                        this.loading = false;
                  })
            }
        },
        data: function(){
            return {
                loading: false
            }
        },
    }
</script>

<style scope>


<style>
