import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Sweet Alert2
import Swal from 'sweetalert2'
window.Swal = Swal

// Delete confirm helper (optional)
document.addEventListener('submit', (e) => {
  const form = e.target
  if (!form.matches('[data-confirm-delete]')) return

  e.preventDefault()
  Swal.fire({
    icon: 'warning',
    title: 'Delete this item?',
    text: 'This can’t be undone.',
    showCancelButton: true,
    confirmButtonText: 'Yes, delete it',
  }).then((r) => {
    if (r.isConfirmed) form.submit()
  })
})
