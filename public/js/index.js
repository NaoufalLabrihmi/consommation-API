function data() {

    return {

        isSideMenuOpen: false,
        toggleSideMenu() {
            this.isSideMenuOpen = !this.isSideMenuOpen
        },
        closeSideMenu() {
            this.isSideMenuOpen = false
        },
        isNotificationsMenuOpen: false,
        toggleNotificationsMenu() {
            this.isNotificationsMenuOpen = !this.isNotificationsMenuOpen
        },
        closeNotificationsMenu() {
            this.isNotificationsMenuOpen = false
        },
        isProfileMenuOpen: false,
        toggleProfileMenu() {
            this.isProfileMenuOpen = !this.isProfileMenuOpen
        },
        closeProfileMenu() {
            this.isProfileMenuOpen = false
        },
        isPagesMenuOpen: false,
        togglePagesMenu() {
            this.isPagesMenuOpen = !this.isPagesMenuOpen
        },

    }
}

$(document).ready(function() {
    var apiEndpoint = 'https://jsonplaceholder.typicode.com/posts';

    $.ajax({
        url: apiEndpoint,
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            var sectionsData = response;
            var totalSections = sectionsData.length;
            console.log("Total Number of posts:", totalSections);
            $("#postsTotal").text(totalSections);

            // Calculate keyword frequency (using 'title' as the field)
            var allTokens = [];
            sectionsData.forEach(function(section) {
                var tokens = section.title.toLowerCase().split(/\W+/);
                allTokens = allTokens.concat(tokens);
            });

            var keywordFrequency = {};
            allTokens.forEach(function(token) {
                keywordFrequency[token] = (keywordFrequency[token] || 0) + 1;
            });

            // Filter out keywords occurring less than 5 times
            var filteredKeywords = {};
            Object.keys(keywordFrequency).forEach(function(key) {
                if (keywordFrequency[key] >= 5) {
                    filteredKeywords[key] = keywordFrequency[key];
                }
            });

            // Prepare data for Chart.js
            var chartData = {
                labels: Object.keys(filteredKeywords),
                datasets: [{
                    label: 'Keyword Frequency',
                    data: Object.values(filteredKeywords),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            };

            // Create Line Chart using Chart.js (change type to 'line')
            var ctx = document.getElementById('canvasChart').getContext('2d');
            var myLineChart = new Chart(ctx, {
                type: 'line', // Change type to 'line'
                data: chartData,
                options: {
                    scales: {
                        x: {
                            beginAtZero: true
                        },
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        },
        error: function(error) {
            console.error("Error fetching data:", error);
        }
    });
});

$(document).ready(function() {
    var apiEndpoint = 'https://jsonplaceholder.typicode.com/users';

    $.ajax({
        url: apiEndpoint,
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            var sectionsData = response;
            // Calculate total number of sections
            var totalSections = sectionsData.length;
            console.log("Total Number of users:", totalSections);
            $("#usersTotal").text(totalSections);

         
        },
        error: function(error) {
            console.error("Error fetching data:", error);
        }
    });
});
function generatePDF() {
    var element = document.getElementById('main');
    if (confirm('Do you want to generate PDF?')) {
        var pdf = html2pdf(element, {
            filename: 'dashboard.pdf'
        });;
    }
}