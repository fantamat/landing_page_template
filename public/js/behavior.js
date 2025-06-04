// public/js/behavior.js
// Handles user reference, behavior buffering, and sending to visits.php

function getUserRef() {
    const cname = 'user_ref=';
    const decodedCookie = decodeURIComponent(document.cookie);
    const ca = decodedCookie.split(';');
    for(let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) === ' ') c = c.substring(1);
        if (c.indexOf(cname) === 0) return c.substring(cname.length, c.length);
    }
    // Generate random ID
    const id = 'u_' + Math.random().toString(36).substr(2, 12);
    document.cookie = 'user_ref=' + id + '; path=/; max-age=' + (60*60*24*365);
    return id;
}
const userRef = getUserRef();

let actionBuffer = [];
let bufferTimeout = null;
function bufferBehavior(event, details) {
    actionBuffer.push({
        event: event,
        timestamp: new Date().toISOString(),
        details: details
    });
    if (!bufferTimeout) {
        bufferTimeout = setTimeout(sendBufferedBehavior, 5000);
    }
}
function sendBufferedBehavior() {
    if (actionBuffer.length === 0) return;
    fetch('visits.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
            user_id: userRef,
            actions: actionBuffer
        })
    });
    actionBuffer = [];
    bufferTimeout = null;
}

window.addEventListener('load', function() {
    bufferBehavior('page_load', window.location.href);
});
document.addEventListener('click', function(e) {
    let target = e.target;
    let desc = target.tagName;
    if (target.id) desc += '#' + target.id;
    if (target.className) desc += '.' + target.className;
    bufferBehavior('click', desc);
});
window.addEventListener('scroll', function() {
    bufferBehavior('scroll', 'scrollY:' + window.scrollY);
}, { passive: true });
window.addEventListener('beforeunload', sendBufferedBehavior);


function changeLanguage(lang) {
    document.cookie = 'lang=' + lang + '; path=/; max-age=' + (60*60*24*365);
    location.reload();
}


document.addEventListener('DOMContentLoaded', function() {
    var toggle = document.querySelector('.dropdown-toggle');
    var menu = document.querySelector('.dropdown-menu');
    toggle.addEventListener('click', function(e) {
        e.stopPropagation();
        menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
    });
    document.addEventListener('click', function() {
        menu.style.display = 'none';
    });
});


function selectClosedBeta() {
    const betaSelect = document.getElementById('closed_beta');
    betaSelect.checked = true;
}