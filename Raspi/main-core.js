document.addEventListener('DOMContentLoaded', function () {
    fetch('/api/data')
        .then(response => response.json())
        .then(data => {
            const tableBody = document.getElementById('data-table').getElementsByTagName('tbody')[0];
            data.forEach(row => {
                const tr = document.createElement('tr');
                tr.innerHTML = `<td>${row.id}</td>
                                <td>${row.date}</td>
                                <td>${row.time}</td>
                                <td>${row.name_panel}</td>
                                <td>${row.data_kwh_meter}</td>`;
                tableBody.appendChild(tr);
            });
        })
        .catch(error => console.error('Error loading the data:', error));
});


function reloadPage() {
    location.reload();
}
setInterval(reloadPage, 5000);
