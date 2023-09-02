<?php
include "koneksi.php";
include "functions.php";

    if($_GET['aksi']=="tambahzakat"){
        if(tambahzak($_POST) > 0 ){
            echo "
                <script>
                    alert('Data berhasil ditambahkan!');
                    document.location.href = 'zakat.php';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('Data gagal ditambahkan!');
                    document.location.href = 'zakat.php';
                </script>
            ";
            }
        }
    
        if($_GET['aksi']=="editzakat"){
            if(editzak($_POST) > 0 ){
                echo "
                    <script>
                        alert('Data berhasil diubah!');
                        document.location.href = 'zakat.php';
                    </script>
                ";
            }else{
                echo "
                    <script>
                        alert('Data gagal diubah!');
                        document.location.href = 'zakat.php';
                    </script>
                ";
                }
            }
    
        if($_GET['aksi']=="hapuszakat"){
            if(hapuszak($_POST) > 0 ){
                echo "
                    <script>
                        alert('Data berhasil dihapus!');
                        document.location.href = 'zakat.php';
                    </script>
                ";
            }else{
                echo "
                    <script>
                        alert('Data gagal dihapus!');
                        document.location.href = 'zakat.php';
                    </script>
                ";
                }
            }

            if($_GET['aksi']=="tambahmuz"){
                if(tambahmuz($_POST) > 0 ){
                    echo "
                        <script>
                            alert('Data berhasil ditambahkan!');
                            document.location.href = 'muzakki.php';
                        </script>
                    ";
                }else{
                    echo "
                        <script>
                            alert('Data gagal ditambahkan!');
                            document.location.href = 'muzakki.php';
                        </script>
                    ";
                }
              }
            
            if($_GET['aksi']=="editmuz"){
                    if(editmuz($_POST) > 0 ){
                        echo "
                            <script>
                                alert('Data berhasil diubah!');
                                document.location.href = 'muzakki.php';
                            </script>
                        ";
                    }else{
                        echo "
                            <script>
                                alert('Data gagal diubah!');
                                document.location.href = 'muzakki.php';
                            </script>
                        ";
                    }
                }
            
                if($_GET['aksi']=="hapusmuz"){
                    if(hapusmuz($_POST) > 0 ){
                        echo "
                            <script>
                                alert('Data berhasil dihapus!');
                                document.location.href = 'muzakki.php';
                            </script>
                        ";
                    }else{
                        echo "
                            <script>
                                alert('Data gagal dihapus!');
                                document.location.href = 'muzakki.php';
                            </script>
                        ";
                    }
                }

                if($_GET['aksi']=="tambahmus"){


                    if(tambahmus($_POST) > 0 ){
                        echo "
                            <script>
                                alert('Data berhasil ditambahkan!');
                                document.location.href = 'mustahik.php';
                            </script>
                        ";
                    }else{
                        echo "
                            <script>
                                alert('Data gagal ditambahkan!');
                                document.location.href = 'mustahik.php';
                            </script>
                        ";
                    }
                  }
                
                if($_GET['aksi']=="editmus"){
                
                
                        if(editmus($_POST) > 0 ){
                            echo "
                                <script>
                                    alert('Data berhasil diubah!');
                                    document.location.href = 'mustahik.php';
                                </script>
                            ";
                        }else{
                            echo "
                                <script>
                                    alert('Data gagal diubah!');
                                    document.location.href = 'mustahik.php';
                                </script>
                            ";
                        }
                    }
                
                    if($_GET['aksi']=="hapusmus"){
                
                
                        if(hapusmus($_POST) > 0 ){
                            echo "
                                <script>
                                    alert('Data berhasil dihapus!');
                                    document.location.href = 'mustahik.php';
                                </script>
                            ";
                        }else{
                            echo "
                                <script>
                                    alert('Data gagal dihapus!');
                                    document.location.href = 'mustahik.php';
                                </script>
                            ";
                        }
                    }

                    if($_GET['aksi']=="tambahdist"){
                        if(tambahdis($_POST) > 0 ){
                            echo "
                                <script>
                                    alert('Data berhasil ditambahkan!');
                                    document.location.href = 'distribusi.php';
                                </script>
                            ";
                        }else{
                            echo "
                                <script>
                                    alert('Data gagal ditambahkan!');
                                    document.location.href = 'distribusi.php';
                                </script>
                            ";
                            }
                        }
                    
                        if($_GET['aksi']=="editdist"){
                            if(editdis($_POST) > 0 ){
                                echo "
                                    <script>
                                        alert('Data berhasil diubah!');
                                        document.location.href = 'distribusi.php';
                                    </script>
                                ";
                            }else{
                                echo "
                                    <script>
                                        alert('Data gagal diubah!');
                                        document.location.href = 'distribusi.php';
                                    </script>
                                ";
                                }
                            }
                    
                        if($_GET['aksi']=="hapusdist"){
                            if(hapusdis($_POST) > 0 ){
                                echo "
                                    <script>
                                        alert('Data berhasil dihapus!');
                                        document.location.href = 'distribusi.php';
                                    </script>
                                ";
                            }else{
                                echo "
                                    <script>
                                        alert('Data gagal dihapus!');
                                        document.location.href = 'distribusi.php';
                                    </script>
                                ";
                                }
                            }
                
?>