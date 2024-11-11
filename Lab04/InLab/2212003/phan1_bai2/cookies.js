let originalCookieName = null;

document.getElementById('cookieForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const name = document.getElementById('cookieName').value;
    const value = document.getElementById('cookieValue').value;
    const days = document.getElementById('cookieExpiry').value;
    
    if (name && value && days) {
        setCookie(name, value, days);
        displayCookies();
        document.getElementById('cookieForm').reset();
        document.getElementById('cookieModal').classList.add('hidden');
    }
});

document.getElementById('updateCookieBtn').addEventListener('click', updateCookie);

function updateCookie() {
    const name = document.getElementById('cookieName').value;
    const value = document.getElementById('cookieValue').value;
    const days = document.getElementById('cookieExpiry').value;
    
    if (name && value && days) {
        if (originalCookieName && originalCookieName !== name) {
            deleteCookie(originalCookieName);
        }
        setCookie(name, value, days);
        displayCookies();
        document.getElementById('cookieForm').reset();
        document.getElementById('cookieModal').classList.add('hidden');
        document.getElementById('updateCookieBtn').classList.add('hidden');
        document.querySelector('button[type="submit"]').classList.remove('hidden');
        originalCookieName = null;
    }
}

function setCookie(name, value, days) {
    const date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    const expires = "expires=" + date.toUTCString();
    document.cookie = name + "=" + value + ";" + expires + ";path=/";
}

function getCookies() {
    const cookies = document.cookie.split(';');
    const cookieList = {};
    cookies.forEach(cookie => {
        const [name, value] = cookie.split('=');
        if (name && value) {
            cookieList[name.trim()] = value.trim();
        }
    });
    return cookieList;
}

function displayCookies() {
    const cookieList = getCookies();
    const cookieListElement = document.getElementById('cookieList');
    cookieListElement.innerHTML = '';

    if (Object.keys(cookieList).length === 0) {
        const emptyRow = document.createElement('tr');
        const emptyCell = document.createElement('td');
        emptyCell.textContent = 'No cookies available';
        emptyCell.colSpan = 3;
        emptyCell.classList.add('px-4', 'py-2', 'border-b', 'text-center');
        emptyRow.appendChild(emptyCell);
        cookieListElement.appendChild(emptyRow);
        return;
    }

    for (const name in cookieList) {
        const row = document.createElement('tr');
        
        const nameCell = document.createElement('td');
        nameCell.textContent = name;
        nameCell.classList.add('px-4', 'py-2', 'border-b');
        
        const valueCell = document.createElement('td');
        valueCell.textContent = cookieList[name];
        valueCell.classList.add('px-4', 'py-2', 'border-b');
        
        const actionsCell = document.createElement('td');
        actionsCell.classList.add('px-4', 'py-2', 'border-b');
        
        const deleteButton = document.createElement('button');
        deleteButton.textContent = 'Delete';
        deleteButton.classList.add('ml-2', 'bg-red-500', 'text-white', 'p-1', 'rounded');
        deleteButton.addEventListener('click', function() {
            deleteCookie(name);
            displayCookies();
        });

        const updateButton = document.createElement('button');
        updateButton.textContent = 'Update';
        updateButton.classList.add('ml-2', 'bg-green-500', 'text-white', 'p-1', 'rounded');
        updateButton.addEventListener('click', function() {
            document.getElementById('cookieName').value = name;
            document.getElementById('cookieValue').value = cookieList[name];
            document.getElementById('cookieExpiry').value = 1; // Set a default value for expiry days
            document.getElementById('cookieModal').classList.remove('hidden');
            document.getElementById('updateCookieBtn').classList.remove('hidden');
            document.querySelector('button[type="submit"]').classList.add('hidden');
            originalCookieName = name;
        });
        
        actionsCell.appendChild(deleteButton);
        actionsCell.appendChild(updateButton);
        row.appendChild(nameCell);
        row.appendChild(valueCell);
        row.appendChild(actionsCell);
        cookieListElement.appendChild(row);
    }
}

function deleteCookie(name) {
    document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
}

// Display cookies on page load
document.addEventListener('DOMContentLoaded', displayCookies);