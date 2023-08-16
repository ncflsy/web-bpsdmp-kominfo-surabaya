const navLine = document.querySelector("#nav-button");
var nav = document.querySelector('nav');

navLine.addEventListener('click', function(){
    navLine.classList.toggle('nav-active');
    nav.classList.toggle('hidden');
});

window.addEventListener('scroll', function() {
    var header = document.querySelector('header');
    var scrollTop = window.scrollY;

    if (scrollTop > 0) {
        header.classList.add('navbar-fixed'); 
        
    } else {
        header.classList.remove('navbar-fixed');
    }
});

// delete card sekaligus data di database
const deleteButtons = document.querySelectorAll('.delete-button');

    deleteButtons.forEach(button => {
        button.addEventListener('click', () => {
            const kegiatanItem = button.closest('.kegiatan-item');
            const id = kegiatanItem.getAttribute('data-id');

            if (confirm('Apakah Anda yakin ingin menghapus kegiatan ini?')) {
                // Kirim permintaan penghapusan ke server menggunakan AJAX
                const xhr = new XMLHttpRequest();
                xhr.open('POST', '/public/crud/hapus_kegiatan.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onload = function () {
                    if (xhr.status === 200) {
                        // Berhasil dihapus, hapus elemen dari tampilan
                        kegiatanItem.remove();
                    } else {
                        alert('Gagal menghapus kegiatan.');
                    }
                };
                xhr.send(`id=${id}`);
            }
        });
    });