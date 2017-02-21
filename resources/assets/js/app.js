
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap')

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('chat-message', require('./components/ChatMessage.vue'))
Vue.component('chat-log', require('./components/ChatLog.vue'))
Vue.component('chat-composer', require('./components/ChatComposer.vue'))

const app = new Vue({
    el: '#chat',
    data: {
        messages: [],
        usersInRoom: []
    },
    methods: {
        addMessage (message) {
            this.messages.push(message);
            axios.post('/messages', message).then(response => {
                //
            })
        }
    },
    created () {
        axios.get('/messages').then(response => {
            this.messages = response.data;
        })

        window.Echo.join('chatroom')
            .here((users) => {
                this.usersInRoom = users
            })
            .joining((user) => {
                this.usersInRoom.push(user)
            })
            .leaving((user) => {
                this.usersInRoom = this.usersInRoom.filter(u => u != user)
            })
            .listen('.App.Events.MessagePosted', (event) => {
                this.messages.push({
                    message: event.message.message,
                    user: event.user
                })
            })
    }
})
