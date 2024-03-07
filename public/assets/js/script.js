
    $(document).ready(function(){

        $('#reload').click(function(){
			$.ajax({
				type: 'GET',
				url: 'reload-captcha',
				success:function(data){
					$('.captcha span').html(data.captcha)
				}
			});
		});

         // Show password
        $('#flexCheckDefault').click(function(){
            if($(this).is(':checked')){
                $('#password-login').attr('type', 'text');
            }else{
                $('#password-login').attr('type', 'password');
            }
        });
        
    })

    // Logout function
    document.addEventListener('DOMContentLoaded', function () {
        var logoutBtn = document.getElementById('logoutBtn');
        logoutBtn.addEventListener('click', function (e) {
            e.preventDefault(); // Mencegah tindakan default link

            Swal.fire({
                text: 'Anda yakin ingin keluar?',
                // title: 'Apakah anda yakin ingin keluar?',
                // icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal',
            }).then(function (result) {
                if (result.isConfirmed) {
                    window.location.href = logoutBtn.getAttribute('href');
                }
            });
        });
    });

        //Delete opd 
        function deleteOpd(url) {
        Swal.fire({
            text: 'Anda yakin ingin hapus data?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }

    //Delete uptd
    function deleteUptd(url) {
        Swal.fire({
            text: 'Anda yakin ingin hapus data?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }

    //Delete account
    function deleteAccount(url) {
        Swal.fire({
            text: 'Anda yakin ingin hapus data?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }

    // deleteDataPendukungInovasiDaerah
    function deleteDataPendukungInovasiDaerah(url) {
        Swal.fire({
            text: 'Anda yakin ingin hapus data?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }

    // delete inovasi daerah
    function deleteInovasiDaerah(url) {
        Swal.fire({
            text: 'Anda yakin ingin hapus data?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }

    // deleteDataPendukungInovasiMasyarakat
    function deleteDataPendukungInovasiMasyarakat(url) {
        Swal.fire({
            text: 'Anda yakin ingin hapus data?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }

    // delete inovasi daerah
    function deleteInovasiMasyarakat(url) {
        Swal.fire({
            text: 'Anda yakin ingin hapus data?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }

     // delete data hitung mundur
     function deleteHitung(url) {
        Swal.fire({
            text: 'Anda yakin ingin hapus data?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }

    // delete pengumuman
    function deletePengumuman(url) {
        Swal.fire({
            text: 'Anda yakin ingin hapus data?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }

    // delete pengumuman
    function deleteManualBook(url) {
        Swal.fire({
            text: 'Anda yakin ingin hapus data?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }

     // delete petunjuk teknis
     function deletePetunjukTeknis(url) {
        Swal.fire({
            text: 'Anda yakin ingin hapus data?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }

// delete petunjuk teknis
function deleteBanner(url) {
    Swal.fire({
        text: 'Anda yakin ingin hapus data?',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal',
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    });
}

// delete Tematik
function deleteTematik(url) {
    Swal.fire({
        text: 'Anda yakin ingin hapus data?',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal',
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    });
}

// Role pepmbuatan akun
$(document).ready(function(){
    $('#role').change(function(){
        var selectedRole = $(this).val();

        // Sembunyikan semua formulir
        $('#adminForm, #userForm').hide();

        // Tampilkan formulir sesuai dengan pilihan peran
        if(selectedRole === 'Kepala Daerah' || selectedRole === 'Anggota DPRD' || selectedRole === 'ASN' || selectedRole === 'Masyarakat') {
            $('#adminForm').show();
        } else if(selectedRole === 'Opd' || selectedRole === 'Upt') {
            $('#userForm').show();
        }
    });
});

// Nama inisiator pada create inovasi dan update
 // Ambil elemen radio button dengan kelas 'radio-item'
 var radioButtons = document.querySelectorAll('.form-check-input');
 var inisiatorForm = document.getElementById('inisiatorForm');

 radioButtons.forEach(function(radioButton) {
     radioButton.addEventListener('change', function() {
         // Ambil id inisiator dari atribut data
         var inisiatorId = this.getAttribute('data-inisiator-id');

         // Tampilkan/menyembunyikan form inisiator berdasarkan ID radio button
         inisiatorForm.style.display = inisiatorId == 1 || inisiatorId == 2 || inisiatorId == 4 || inisiatorId == 5 && this.checked ? 'block' : 'none';
     });
 });
 
 


    
    

        