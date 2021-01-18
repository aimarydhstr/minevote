<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        {{ user.name }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
    data() {
        return {
            user: {}
        }
    },
        mounted() {
            axios.get('/api/admin').then(response => {
            this.user = response.data;
                console.log(response);
            });
        }
    }
</script>
