let notifications = document.querySelector('.notifications');
let notificationCount = document.querySelector('.notification-count');
let notificationBadge = document.querySelector('.notification-badge');
let dropdownFooter = document.querySelector('.dropdown-footer');

let token = window.user.token;

let fetchNotifications = () => {
    fetch('/en/dashboard/notifications', {
        headers: {
            'Authorization': `Bearer ${token}`
        }
    })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(json => {
            let data = json;
            // Update notification count and badge
            notificationBadge.innerText = data.length;
            notificationCount.innerHTML = `You have ${data.length} new notifications <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>`;

            // Remove old notification items and dividers
            let notificationItems = document.querySelectorAll('.notification-item, .dropdown-divider');
            notificationItems.forEach(item => item.remove());

            // Add new notifications with dividers
            data.forEach((notification, index) => {
                // Add divider before each notification except the first one
                if (index > 0) {
                    let divider = document.createElement('li');
                    divider.innerHTML = '<hr class="dropdown-divider">';
                    notifications.appendChild(divider);
                }

                // Create notification item
                let li = document.createElement('li');
                li.classList.add('notification-item');
                li.innerHTML = `
                <i class="${getNotificationIcon(notification.data.type)}"></i>
                <div onclick="window.location.href = '${notification.data.action_url}'">
                    <h4>${notification.data.title}</h4>
                    <p>${notification.data.message}</p>
                    <p>${notification.created_at}</p>
                </div>
            `;
                notifications.appendChild(li);
            });

            // Add divider after the last notification
            if (data.length > 0) {
                let finalDivider = document.createElement('li');
                finalDivider.innerHTML = '<hr class="dropdown-divider">';
                notifications.appendChild(finalDivider);
            }

            // Move dropdown footer to the end
            notifications.appendChild(dropdownFooter);
        })
        .catch(error => console.error('Error fetching notifications:', error));
}

function getNotificationIcon(type) {
    switch (type) {
        case 'info':
            return 'bi bi-info-circle text-primary';
        case 'success':
            return 'bi bi-check-circle text-success';
        case 'warning':
            return 'bi bi-exclamation-circle text-warning';
        case 'danger':
            return 'bi bi-x-circle text-danger';
    }
}

// Initial fetch and update every 5 seconds
fetchNotifications();
setInterval(fetchNotifications, 5000);
