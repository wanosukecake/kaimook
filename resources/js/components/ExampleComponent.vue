<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div>{{ message }}</div>
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                    <div id="app1">
                        app1: {{ message1 }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { ref } from "vue";
    import { defineComponent } from 'vue'

    export default defineComponent({
        setup() {
            const message = ref("Hello Laravel Vue3");
            const message1 = ref("hello");
            return {
              message,
              message1
            };
        },

        mounted() {
            console.log('Component mounted.')
        }
    })

    // export default {
    //     setup() {
    //         const message = ref("Hello Laravel Vue3");
    //         const message1 = ref("hello");
    //         return {
    //           message,
    //           message1
    //         };
    //     },

    //     mounted() {
    //         console.log('Component mounted.')
    //     }
    // }

    // const App1 = {
    //     setup() {
    //         return {
    //             message1: "Hello"
    //         }
    //     }
    // }
    // createApp(App1).mount("#app1")
</script> 