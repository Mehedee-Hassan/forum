<template>
        <li class="dropdown" id="markasread">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">

                <span class="glyphicon glyphicon-bell"> </span> Notifications

                <span class="badge badge-warning small ">
                    {{ unreadNotifications.length }}
                </span>
            </a>

            <ul class="dropdown-menu" role="menu">
                <li>

                </li>
            </ul>
        </li>
</template>

<script>
    export default {
        props:['unreads','userid'],
        data(){
            return {
                unreadNotifications:this.unreads
            }
        },
        mounted() {
            console.log('Component mounted.');
              Echo.private('App.User.' + this.userid)
                .notification((notification) => {
                    console.log(notification);

                    let newUnreadNotifications={
                        data:{
                            thread:notification.thread,
                            user:notification.user
                        }
                    };
                    this.unreadNotifications.push(newUnreadNotifications)

                });
        }
    }
</script>
