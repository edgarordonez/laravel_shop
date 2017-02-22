<template>
    <div class="chat-message" :class="{me: me}">
        <p>{{ message.message }}</p>
        <small>{{ message.user.name }}</small>
    </div>
</template>

<script>
    export default {
        props: ['message', 'user'],
        data () {
            return {
                me: this.message.user.id === this.user.id
            }
        },
        mounted () {
            document.querySelector('.chat-log').scrollTop = document.querySelector('.chat-log').scrollHeight
        }
    }
</script>

<style lang="css">
    .chat-message {
        padding: 1rem;
        background-color: #fff;
        border-radius: 5px;
        margin-bottom: 10px;
    }
    .chat-message.me {
        text-align: right;
        color: #fff;
        background-color: #54aef2!important;
    }
    .chat-message > p {
        margin-bottom: .5rem;
    }
</style>