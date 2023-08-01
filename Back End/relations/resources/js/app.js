import './bootstrap';

Echo.channel('App.Models.User.1')
    .listen('Illuminate\\Notifications\\Events\\BroadcastNotificationCreated', (notification) => {
        alert('ddd')
        // console.log(notification);
    });
