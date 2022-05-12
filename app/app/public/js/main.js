'use strict';
const filterStatus = document.getElementsByName('filter-status');

filterStatus.forEach((e) => {
    e.addEventListener('change', () => {
        if (filterStatus[0].checked) {
            window.location.href = '/tasks/all';
        } else if (filterStatus[1].checked) {
            window.location.href = '/tasks/working';
        } else if (filterStatus[2].checked) {
            window.location.href = '/tasks/finished';
        }
    });
});
