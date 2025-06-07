import 'bootstrap';

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo';

import Pusher from 'pusher-js';
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER ?? 'mt1',
    wsHost: import.meta.env.VITE_PUSHER_HOST ?? `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
    // wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
    wsPort: 6001,
    wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
    // forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
    forceTLS: false,
    disableState: true,
    enabledTransports: ['ws', 'wss'],
});

Pusher.logToConsole = true; // طباعة السجلات إلى الـ Console

const pusher = new Pusher('eee8bc180a7a17f5e5b5', {
    cluster: 'ap2',
    forceTLS: true,
});

pusher.connection.bind('connected', function() {
    console.log('Pusher connected successfully');
});

pusher.connection.bind('disconnected', function() {
    console.log('Pusher disconnected');
});
// Echo.channel('conversation.' + conversationId)
//     .listen('.message.sent', (event) => {
//         console.log('Received new message:', event);
//     })
//     .connector.pusher.connection.bind('connected', function() {
//         console.log('Pusher connected to channel conversation.' + conversationId);
//     })
//     .connector.pusher.connection.bind('disconnected', function() {
//         console.log('Pusher disconnected from channel conversation.' + conversationId);
//     });
//     Echo.channel('conversation.' + conversationId)
//     .listen('.message.sent', (event) => {
//         console.log('Received new message:', event);

//         // استخراج البيانات
//         const message = event.message;
//         const sender = event.sender;
//         const timestamp = event.timestamp;

//         // العثور على المحادثة الصحيحة باستخدام conversation_id
//         const messagesContainer = document.querySelector(`.conversation-wrapper-${event.conversation_id}`);
//         const newMessage = document.createElement('li');
//         newMessage.classList.add('conversation-item', 'me');

//         // إعداد محتوى الرسالة
//         newMessage.innerHTML = `
//             <div class="conversation-item-side">
//                 <img class="conversation-item-image" src="${sender.image}" alt="Sender Image">
//             </div>
//             <div class="conversation-item-content">
//                 <div class="conversation-item-wrapper">
//                     <div class="conversation-item-box">
//                         <div class="conversation-item-text">
//                             <p>${message}</p>
//                             <div class="conversation-item-time">${new Date(timestamp).toLocaleTimeString()}</div>
//                         </div>
//                     </div>
//                 </div>
//             </div>
//         `;

//         // إضافة الرسالة الجديدة فقط دون استبدال المحتوى
//         if (messagesContainer) {
//             messagesContainer.appendChild(newMessage);
//             messagesContainer.scrollTop = messagesContainer.scrollHeight; // التمرير لأسفل لمشاهدة الرسالة الجديدة
//         }
//     });
