    <script>
        function calldata() {
                var babakDiv =   document.getElementById("babakid");
                var IdBabak = babakDiv.getAttribute("name");
            function jatuh1() {
                var elemenDiv = document.getElementById("jatuh1"); // Mendapatkan elemen dengan ID "jatuh1"
                var id = elemenDiv.getAttribute("name"); // Mengambil nilai ID elemen
                $.ajax({
                    url: '/call-data/?tipe=detail&id=' + id + '&kt=jatuh&babak='+ IdBabak +'',
                    method: 'GET',
                    success: function (response) {
                        // Perbarui tampilan dengan data yang diperbarui
                        
                        $('#jatuh1').text('x'+' ' + response.data);
                        console.log(response.data);
                    }
                });
            }
            function jatuh2() {
                var elemenDiv = document.getElementById("jatuh2"); // Mendapatkan elemen dengan ID "jatuh2"
                var id = elemenDiv.getAttribute("name"); // Mengambil nilai ID elemen
                $.ajax({
                    url: '/call-data/?tipe=detail&id=' + id + '&kt=jatuh&babak='+ IdBabak +'',
                    method: 'GET',
                    success: function (response) {
                        // Perbarui tampilan dengan data yang diperbarui
                        
                        $('#jatuh2').text('x'+' ' + response.data);
                        console.log(response.data);

                    }
                });
            }
            function bina1 (){
                var elemenDiv = document.getElementById("bina1"); // Mendapatkan elemen dengan ID "bina1"
                var id = elemenDiv.getAttribute("name"); // Mengambil nilai ID elemen
                $.ajax({
                    url: '/call-data/?tipe=detail&id=' + id + '&kt=binaan&babak='+ IdBabak +'',
                    method: 'GET',
                    success: function (response) {
                        // Perbarui tampilan dengan data yang diperbarui
                        
                        $('#bina1').text('x'+' ' + response.data);
                        console.log(response.data);

                    }
                });
            }
            function bina2 (){
                var elemenDiv = document.getElementById("bina2"); // Mendapatkan elemen dengan ID "bina2"
                var id = elemenDiv.getAttribute("name"); // Mengambil nilai ID elemen
                $.ajax({
                    url: '/call-data/?tipe=detail&id=' + id + '&kt=binaan&babak='+ IdBabak +'',
                    method: 'GET',
                    success: function (response) {
                        // Perbarui tampilan dengan data yang diperbarui
                        
                        $('#bina2').text('x'+' ' + response.data);
                        console.log(response.data);

                    }
                });
            }
            function teguran1 (){
                var elemenDiv = document.getElementById("teguran1"); // Mendapatkan elemen dengan ID "bina2"
                var id = elemenDiv.getAttribute("name"); // Mengambil nilai ID elemen
                $.ajax({
                    url: '/call-data/?tipe=detail&id=' + id + '&kt=teguran&babak='+ IdBabak +'',
                    method: 'GET',
                    success: function (response) {
                        // Perbarui tampilan dengan data yang diperbarui
                        
                        $('#teguran1').text('x'+' ' + response.data);
                        console.log(response.data);
                        // Panggil kembali fungsi untuk polling berikutnya
                    }
                });
            }
            function teguran2 (){
                var elemenDiv = document.getElementById("teguran2"); // Mendapatkan elemen dengan ID "bina2"
                var id = elemenDiv.getAttribute("name"); // Mengambil nilai ID elemen
                $.ajax({
                    url: '/call-data/?tipe=detail&id=' + id + '&kt=teguran&babak='+ IdBabak +'',
                    method: 'GET',
                    success: function (response) {
                        // Perbarui tampilan dengan data yang diperbarui
                        
                        $('#teguran2').text('x'+' ' + response.data);
                        console.log(response.data);
                        // Panggil kembali fungsi untuk polling berikutnya
                    }
                });
            }
            function peringatan1 (){
                var elemenDiv = document.getElementById("peringatan1"); // Mendapatkan elemen dengan ID "bina2"
                var id = elemenDiv.getAttribute("name"); // Mengambil nilai ID elemen
                $.ajax({
                    url: '/call-data/?tipe=detail&id=' + id + '&kt=peringatan&babak='+ IdBabak +'',
                    method: 'GET',
                    success: function (response) {
                        // Perbarui tampilan dengan data yang diperbarui
                        
                        $('#peringatan1').text('x'+' ' + response.data);
                        console.log(response.data);
                        // Panggil kembali fungsi untuk polling berikutnya
                    }
                });
            }
            function peringatan2 (){
                var elemenDiv = document.getElementById("peringatan2"); // Mendapatkan elemen dengan ID "bina2"
                var id = elemenDiv.getAttribute("name"); // Mengambil nilai ID elemen
                $.ajax({
                    url: '/call-data/?tipe=detail&id=' + id + '&kt=peringatan&babak='+ IdBabak +'',
                    method: 'GET',
                    success: function (response) {
                        // Perbarui tampilan dengan data yang diperbarui
                        
                        $('#peringatan2').text('x'+' ' + response.data);
                        console.log(response.data);
                        // Panggil kembali fungsi untuk polling berikutnya
                    }
                });
            }
            function score1 (){
                var elemenDiv = document.getElementById("score1"); // Mendapatkan elemen dengan ID "bina2"
                var id = elemenDiv.getAttribute("name"); // Mengambil nilai ID elemen
                $.ajax({
                    url: '/call-data/?tipe=score&id=' + id + '&kt=score&babak='+ IdBabak +'',
                    method: 'GET',
                    success: function (response) {
                        // Perbarui tampilan dengan data yang diperbarui
                        
                        $('#score1').text(response.data);
                        console.log(response.data);
                        // Panggil kembali fungsi untuk polling berikutnya
                    }
                });
            }
            function updatescore1 (){
                var elemenDiv = document.getElementById("score1"); // Mendapatkan elemen dengan ID "bina2"
                var id = elemenDiv.getAttribute("name"); // Mengambil nilai ID elemen
                $.ajax({
                    url: '/call-data/?tipe=check&id=' + id + '&kt=check&babak='+ IdBabak +'',
                    method: 'GET',
                    success: function (response) {
                        console.log(response.data);
                        // Panggil kembali fungsi untuk polling berikutnya
                    }
                });
            }
            function updatescore2 (){
                var elemenDiv = document.getElementById("score2"); // Mendapatkan elemen dengan ID "bina2"
                var id = elemenDiv.getAttribute("name"); // Mengambil nilai ID elemen
                $.ajax({
                    url: '/call-data/?tipe=check&id=' + id + '&kt=check&babak='+ IdBabak +'',
                    method: 'GET',
                    success: function (response) {
                        console.log(response.data);
                        // Panggil kembali fungsi untuk polling berikutnya
                    }
                });
            }
            function score2 (){
                var elemenDiv = document.getElementById("score2"); // Mendapatkan elemen dengan ID "bina2"
                var id = elemenDiv.getAttribute("name"); // Mengambil nilai ID elemen
                $.ajax({
                    url: '/call-data/?tipe=score&id=' + id + '&kt=score&babak='+ IdBabak +'',
                    method: 'GET',
                    success: function (response) {
                        // Perbarui tampilan dengan data yang diperbarui
                        
                        $('#score2').text(response.data);
                        console.log(response.data);
                        // Panggil kembali fungsi untuk polling berikutnya
                    }
                });
            }
            function babak1() {
                var babaksatu = document.getElementById('babaksatu');
                var babakdua = document.getElementById('babakdua');
                var babaktiga = document.getElementById('babaktiga');
                babakdua.classList.remove('by');
                babaktiga.classList.remove('by');
                babaksatu.classList.add('by');
            }

            function babak2() {
                var babaksatu = document.getElementById('babaksatu');
                var babakdua = document.getElementById('babakdua');
                var babaktiga = document.getElementById('babaktiga');
                babakdua.classList.add('by');
                babaktiga.classList.remove('by');
                babaksatu.classList.remove('by');
            }

            function babak3() {
                var babaksatu = document.getElementById('babaksatu');
                var babakdua = document.getElementById('babakdua');
                var babaktiga = document.getElementById('babaktiga');
                babakdua.classList.remove('by');
                babaktiga.classList.add('by');
                babaksatu.classList.remove('by');
            }

            function changebabak() {
                var elemenDiv = document.getElementById("arenaid");
                var id = elemenDiv.getAttribute("name");
                $.ajax({
                    url: '/call-data/?tipe=checkbabak&id=' + id + '',
                    method: 'GET',
                    success: function (response) {
                        console.log(response.data);
                        var idbabak = response.data;
                        if (idbabak == 1) {
                            babak1();
                        } else if (idbabak == 2) {
                            babak2();
                        } else if (idbabak == 3) {
                            babak3();
                        }
                    }
                });
            }
            function jatuhan1() {
                var elemenDiv = document.getElementById("arenaid");
                var id = elemenDiv.getAttribute("name");
                $.ajax({
                    url: '/call-data/?tipe=checkjatuhan&arena=' + id + '&juri=juri_1',
                    method: 'GET',
                    success: function (response) {
                        console.log(response.data);
                        var color = response.data;
                        if (color == "merah") {
                        var jatuhan = document.getElementById('j1');
                            jatuhan.setAttribute('class', '');
                            jatuhan.classList.add('bg-danger');
                        } else if (color == "biru") {
                            var jatuhan = document.getElementById('j1');
                            jatuhan.setAttribute('class', '');
                                jatuhan.classList.add('bg-primary');
                        } else{
                            var jatuhan = document.getElementById('j1');
                            jatuhan.setAttribute('class', '');
                        }
                    }
                });
            }
                    function jatuhan2() {
                var elemenDiv = document.getElementById("arenaid");
                var id = elemenDiv.getAttribute("name");
                $.ajax({
                    url: '/call-data/?tipe=checkjatuhan&arena=' + id + '&juri=juri_2',
                    method: 'GET',
                    success: function (response) {
                        console.log(response.data);
                        var color = response.data;
                        if (color == "merah") {
                        var jatuhan = document.getElementById('j2');
                            jatuhan.setAttribute('class', '');
                            jatuhan.classList.add('bg-danger');
                        } else if (color == "biru") {
                            var jatuhan = document.getElementById('j2');
                            jatuhan.setAttribute('class', '');
                                jatuhan.classList.add('bg-primary');
                        } else{
                            var jatuhan = document.getElementById('j2');
                            jatuhan.setAttribute('class', '');
                        }
                    }
                });
            }
                    function jatuhan3() {
                        var elemenDiv = document.getElementById("arenaid");
                        var id = elemenDiv.getAttribute("name");
                        $.ajax({
                            url: '/call-data/?tipe=checkjatuhan&arena=' + id + '&juri=juri_3',
                            method: 'GET',
                            success: function (response) {
                                console.log(response.data);
                                var color = response.data;
                                if (color == "merah") {
                                var jatuhan = document.getElementById('j3');
                                    jatuhan.setAttribute('class', '');
                                    jatuhan.classList.add('bg-danger');
                                } else if (color == "biru") {
                                    var jatuhan = document.getElementById('j3');
                                    jatuhan.setAttribute('class', '');
                                        jatuhan.classList.add('bg-primary');
                                } else{
                                    var jatuhan = document.getElementById('j3');
                                    jatuhan.setAttribute('class', '');
                                }
                            }
                        });
            }
            function hukuman1() {
                        var elemenDiv = document.getElementById("arenaid");
                        var id = elemenDiv.getAttribute("name");
                        $.ajax({
                            url: '/call-data/?tipe=checkhukuman&arena=' + id + '&juri=juri_1',
                            method: 'GET',
                            success: function (response) {
                                console.log(response.data);
                                var color = response.data;
                                var jatuhan = document.getElementById('h1');
                                if (color == "merah") {
                                    jatuhan.setAttribute('class', '');
                                    jatuhan.classList.add('bg-danger');
                                } else if (color == "biru") {
                                        jatuhan.setAttribute('class', '');
                                        jatuhan.classList.add('bg-primary');
                                } else{
                                    jatuhan.setAttribute('class', '');
                                }
                            }
                        });
            }
        function hukuman2() {
                        var elemenDiv = document.getElementById("arenaid");
                        var id = elemenDiv.getAttribute("name");
                        $.ajax({
                            url: '/call-data/?tipe=checkhukuman&arena=' + id + '&juri=juri_2',
                            method: 'GET',
                            success: function (response) {
                                console.log(response.data);
                                var color = response.data;
                                var jatuhan = document.getElementById('h2');
                                if (color == "merah") {
                                    jatuhan.setAttribute('class', '');
                                    jatuhan.classList.add('bg-danger');
                                } else if (color == "biru") {
                                        jatuhan.setAttribute('class', '');
                                        jatuhan.classList.add('bg-primary');
                                } else{
                                    jatuhan.setAttribute('class', '');
                                }
                            }
                        });
            }
        function hukuman3() {
                        var elemenDiv = document.getElementById("arenaid");
                        var id = elemenDiv.getAttribute("name");
                        $.ajax({
                            url: '/call-data/?tipe=checkhukuman&arena=' + id + '&juri=juri_3',
                            method: 'GET',
                            success: function (response) {
                                console.log(response.data);
                                var color = response.data;
                                var jatuhan = document.getElementById('h3');
                                if (color == "merah") {
                                    jatuhan.setAttribute('class', '');
                                    jatuhan.classList.add('bg-danger');
                                } else if (color == "biru") {
                                        jatuhan.setAttribute('class', '');
                                        jatuhan.classList.add('bg-primary');
                                } else{
                                    jatuhan.setAttribute('class', '');
                                }
                            }
                        });
            }
            jatuh1();
            jatuh2();
            bina1();
            bina2();
            teguran1();
            teguran2();
            peringatan1();
            peringatan2();
            score1();
            score2();
            updatescore1();
            updatescore2();
            changebabak();
            jatuhan1()
            jatuhan2()
            jatuhan3()
            hukuman1()
            hukuman2()
            hukuman3()

        }

        calldata();
        setInterval(calldata, 500);
    </script>