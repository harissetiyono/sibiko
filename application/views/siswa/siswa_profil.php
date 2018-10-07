<?php

class PDF extends FPDF
{
	//Page header

    function Header()
	{
             //   $this->setFont('Arial','',10);
             //   $this->setFillColor(255,255,255);
             //   $this->cell(100,6,"Laporan daftar pegawai gubugkoding.com",0,0,'L',1); 
             //   $this->cell(100,6,"Printed date : " . date('d/m/Y'),0,1,'R',1); 
               
                
                if ($this->PageNo()>1) {
                     # code...
                 } else {
                $this->Image(base_url().'assets/dist/img/logo-smk2-128x128.jpg', 10, 10,'15','20','jpeg');
                $this->setFillColor(255,255,255);
                $this->cell(5,0,'',0,0,'C',0); 
                $this->setFont('Arial','B',18);
                $this->cell(0,8,'SMK NEGERI 2 BOJONEGORO',0,1,'C',0); 
                $this->setFont('Arial','',12);
                $this->cell(5,5,'',0,0,'C',0); 
                $this->cell(0,6,"Jl. Pattimura No.03 Kel. Sumbang Kec. Bojonegoro 62115",0,1,'C',0); 
                $this->cell(5,5,'',0,0,'C',0); 
                $this->cell(0,8,'Telp/Fax. (0353) 881912 Email : smkn2.bojonegoro@yahoo.com',0,1,'C',0); 
                $this->line(10,35,200,35);
                $this->Line(10,35,200,35);
                $this->Line(10,36,200,36);
                

                 }
                
                
	}
 
	function Content($data)
	{      

        $hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu");
        $bulan = array(1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
        //echo $hari[date("w")].", ".date("j")." ".$bulan[date("n")]." ".date("Y");

                foreach ($data as $key) {
                $this->setFillColor(255,255,255);
                $this->Ln(8);
                $this->setFont('Arial','B',14);
                $this->cell(0,8,'BIODATA SISWA',0,1,'C',0); 
                $this->Ln(8);
                $this->setFont('Arial','B',12);
                $this->cell(0,5,'A. KETERANGAN TENTANG DIRI SISWA',0,0,'L',1);
                $this->Ln(8);
                $this->setFont('Arial','',10);
                $this->cell(70,5,'1. Nama Lengkap',0,0,'L',1);
                $this->cell(5,5,':',0,0,'L',1);

                if (file_exists('file:///C:/xampp/htdocs/sibiko/assets/foto/'.$key->nis.'.jpg'))
                {
                    $foto = "$key->nis";
                }
                else {
                    $foto = "default";
                };

                if (strlen($key->nis) != 11) {
                    $nis1 = substr($key->nis, 0,5);
                    $nis2 = substr($key->nis, 5, 4);
                    $nis3 = substr($key->nis, -3);
                } else{
                    $nis1 = substr($key->nis, 0,5);
                    $nis2 = substr($key->nis, 5, 3);
                    $nis3 = substr($key->nis, -3);
                };

                $this->cell(80,5,$key->nama_siswa,0,0,'L',1);
                $this->Image(base_url().'assets/foto/'.$foto.'.jpg', 165, 58,'30','40');
                $this->Ln(5);
                $this->cell(70,5,'2. NIS',0,0,'L',1);
                $this->cell(5,5,':',0,0,'L',1);
                $this->cell(80,5,$nis1.'/'.$nis2.'.'.$nis3,0,0,'L',1);
                $this->Ln(5);
                $this->cell(70,5,'3. Tempat/Tanggal Lahir',0,0,'L',1);
                $this->cell(5,5,':',0,0,'L',1);
                $this->cell(80,5,$key->tempat_lahir_siswa .', '. date('j', strtotime(date($key->tanggal_lahir_siswa))).' '.$bulan[date('n',strtotime(date($key->tanggal_lahir_siswa)))].' '.date('Y', strtotime(date($key->tanggal_lahir_siswa))),0,0,'L',1);
                $this->Ln(5);
                $this->cell(70,5,'4. Agama',0,0,'L',1);
                $this->cell(5,5,':',0,0,'L',1);
                $this->cell(80,5,$key->agama_siswa,0,0,'L',1);
                $this->Ln(5);
                $this->cell(70,5,'5. Jenis Kelamin',0,0,'L',1);
                $this->cell(5,5,':',0,0,'L',1);
                $this->cell(80,5,$key->jenis_kelamin_siswa,0,0,'L',1);
                $this->Ln(5);
                $this->cell(70,5,'6. Kompetensi Keahlian',0,0,'L',1);
                $this->cell(5,5,':',0,0,'L',1);
                $this->cell(80,5,$key->jurusan_siswa,0,0,'L',1);
                $this->Ln(10);
                $this->setFont('Arial','B',12);
                $this->cell(80,5,'B. KETERANGAN TEMPAT TINGGAL & ASAL SEKOLAH',0,0,'L',1);
                $this->Ln(8);
                $this->setFont('Arial','',10);
                $this->cell(70,5,'7. Alamat ',0,0,'L',1);
                $this->cell(5,5,':',0,0,'L',1);
                $this->cell(80,5,$key->alamat_siswa,0,0,'L',1);
                $this->Ln(5);
                $this->cell(70,5,'8. Asal Sekolah',0,0,'L',1);
                $this->cell(5,5,':',0,0,'L',1);
                $this->cell(80,5,$key->asal_sekolah_siswa,0,0,'L',1);
                $this->Ln(5);
                $this->cell(70,5,'9. Tahun Angkatan Masuk',0,0,'L',1);
                $this->cell(5,5,':',0,0,'L',1);
                $this->cell(80,5,$key->tahun_angkatan_siswa,0,0,'L',1);
                $this->Ln(10);
                $this->setFont('Arial','B',12);
                $this->cell(0,5,'C. KETERANGAN ORANG TUA SISWA',0,0,'L',1);
                $this->Ln(8);
                $this->setFont('Arial','',10);
                $this->cell(70,5,'10. Nama Ayah ',0,0,'L',1);
                $this->cell(5,5,':',0,0,'L',1);
                $this->cell(80,5,$key->nama_ayah_siswa,0,0,'L',1);
                $this->Ln(5);
                $this->cell(70,5,'11. Pekerjaan Ayah',0,0,'L',1);
                $this->cell(5,5,':',0,0,'L',1);
                $this->cell(80,5,$key->pekerjaan_ayah_siswa,0,0,'L',1);
                $this->Ln(5);
                $this->cell(70,5,'12. Nama Ibu',0,0,'L',1);
                $this->cell(5,5,':',0,0,'L',1);
                $this->cell(80,5,$key->nama_ibu_siswa,0,0,'L',1);
                $this->Ln(5);
                $this->cell(70,5,'13. Pekerjaan Ibu',0,0,'L',1);
                $this->cell(5,5,':',0,0,'L',1);
                $this->cell(80,5,$key->pekerjaan_ibu_siswa,0,0,'L',1);
                $this->Ln(5);
                $this->cell(70,5,'14. Nomor Telepon',0,0,'L',1);
                $this->cell(5,5,':',0,0,'L',1);
                $this->cell(80,5,$key->no_telepon_ortu,0,0,'L',1);
                }
                
	}

	function Footer()
	{
		//atur posisi 1.5 cm dari bawah
		$this->SetY(-15);
		//buat garis horizontal
		$this->Line(10,$this->GetY(),210,$this->GetY());
		//Arial italic 9
		$this->SetFont('Arial','I',9);
                $this->Cell(0,10,'Bimbingan dan Konseling SMKN 2 Bojonegoro ' . date('Y'),0,0,'L');
		//nomor halaman
		//$this->Cell(0,10,'Halaman '.$this->PageNo().' dari {nb}',0,0,'R');
	}
}
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Content($data);
$pdf->Output('pdf/ddfsf.pdf','I');