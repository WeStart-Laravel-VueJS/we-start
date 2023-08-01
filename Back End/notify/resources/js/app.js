import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

Echo.private('App.Models.User.' + userId)
    .notification((notification) => {
        // console.log(notification);

    Toast.fire({
        icon: 'success',
        title: notification.data
    })
    });
