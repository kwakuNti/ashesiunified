// Add this JavaScript code to your existing search.js file or a new JavaScript file included in your page

$(document).ready(function() {
    $('#searchInput').keyup(function() {
        let searchTerm = $(this).val();
        if (searchTerm.length > 0) {
            autocomplete(searchTerm);
        } else {
            $('#searchResults').empty();
        }
    });
});

function autocomplete(term) {
    $.ajax({
        url: '../actions/dashsearch.php',
        type: 'GET',
        dataType: 'json',
        data: { term: term },
        success: function(response) {
            displayResults(response);
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });
}
function displayResults(data) {
    let departments = data.departments;
    let users = data.users;
    let events = data.events;
    let resultsList = $('#searchResults');
    resultsList.empty();
    if (departments.length > 0 || users.length > 0 || events.length > 0) {
        departments.forEach(function(department) {
            resultsList.append(`<li data-type="department" data-id="${department.department_id}">${department.department_name}</li>`);
        });
        users.forEach(function(user) {
            resultsList.append(`<li data-type="user" data-id="${user.user_id}">${user.first_name}</li>`);
        });
        events.forEach(function(event) {
            resultsList.append(`<li data-type="event" data-id="${event.event_id}">${event.event_title}</li>`);
        });
        resultsList.show();
    } else {
        resultsList.hide();
    }

    // Handle click event on search results
    resultsList.on('click', 'li', function() {
        let type = $(this).data('type');
        let id = $(this).data('id');
        if (type === 'department') {
            // Redirect to department page
            window.location.href = `../templates/department.php?id=${id}`;
        } else if (type === 'user') {
            // Display error using SweetAlert
            swal("Error", "Sorry, this is an admin feature", "error");
        } else if (type === 'event') {
            // Redirect to event page
            window.location.href = `../templates/event.php?id=${id}`;
        }
    });
}
