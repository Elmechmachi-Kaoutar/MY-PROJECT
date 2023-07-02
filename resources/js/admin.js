


   import "https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js";
   import "https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js";
   import "https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js";
   
        window.addEventListener('DOMContentLoaded', event => {
  
        // Toggle the side navigation
        const sidebarToggle = document.body.querySelector('#sidebarToggle');
        if (sidebarToggle) {
            // Uncomment Below to persist sidebar toggle between refreshes
            // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
            //     document.body.classList.toggle('sb-sidenav-toggled');
            // }
            sidebarToggle.addEventListener('click', event => {
                event.preventDefault();
                document.body.classList.toggle('sb-sidenav-toggled');
                localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
            });
        }
  
        });
  
        window.addEventListener('DOMContentLoaded', event => {
            // Simple-DataTables
            // https://github.com/fiduswriter/Simple-DataTables/wiki
  
            const datatablesSimple = document.getElementById('datatablesSimple');
            if (datatablesSimple) {
                new simpleDatatables.DataTable(datatablesSimple);
            }
        });
  
            