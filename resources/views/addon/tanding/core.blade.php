    <script>
        function calldata() {
                var elemenDiv = document.getElementById("arenaid");
                var arena = elemenDiv.getAttribute("name");
                function data(){
                $.ajax({
                    url: '/call-data/?tipe=tanding&arena='+ arena +'',
                    method: 'GET',
                    success: function (response) {
                        // Perbarui tampilan dengan data yang diperbarui
                        
                        $('#jatuh2').text('x'+' ' + response.jatuh1);
                        $('#jatuh1').text('x'+' ' + response.jatuh2);
                        $('#bina2').text('x'+' ' + response.binaan1);
                        $('#bina1').text('x'+' ' + response.binaan2);
                        $('#teguran2').text('x'+' ' + response.teguran1);
                        $('#teguran1').text('x'+' ' + response.teguran2);
                        $('#peringatan2').text('x'+' ' + response.peringatan1);
                        $('#peringatan1').text('x'+' ' + response.peringatan2);
                        $('#score2').text(response.score1);
                        $('#score1').text(response.score2);
                        console.log(response);
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
            data();
            changebabak();

        }

        calldata();
        setInterval(calldata, 500);
    </script>