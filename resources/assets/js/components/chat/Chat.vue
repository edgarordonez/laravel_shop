<template lang="html">
    <div>
        <h3>On wheels | Soporte en linea</h3>
        <chat-log :messages="messages" :user="user"></chat-log>
        <chat-composer v-on:messagesent="addMessage" :user="user"></chat-composer>
    </div>
</template>

<script>
    Vue.component('chat-message', require('./ChatMessage.vue'))
    Vue.component('chat-log', require('./ChatLog.vue'))
    Vue.component('chat-composer', require('./ChatComposer.vue'))
    export default {
        props: ['room', 'user'],
        data () {
            return {
                messages: [],
                usersInRoom: []
            }
        },
        methods: {
            addMessage (message) {
                this.messages.push(message);
                axios.post(`/messages/${this.room}`, message).then(response => {
                    //
                })
            }
        },
        created () {
            axios.get(`/messages/${this.room}`).then(response => {
                this.messages = response.data;
            })

            window.Echo.private(`chatroom.${this.room}`)
                .listen('.App.Events.MessagePosted', (event) => {
                    console.log(event)
                    this.messages.push({
                        message: event.message.message,
                        user: event.user
                    })
                })
        }
    }
</script>

<style lang="css">

</style>